<?php
class JobApplication extends AppModel {
	public $name = 'JobApplication';
	public $belongsTo = array('JobApplicant', 'Job');
	
	private $uploadDir;					//Directory where to store resumes
	private $uploadField = 'upload';	//The data field where the passed file will be stored
	private $validResumeExtensions = array('doc', 'docx', 'pdf', 'txt');		//The valid extension types
	private $uploadFile;				//Location of temporary uploaded file to be copied
	private $uploadFileExt;				//Extension of file uploaded
	
	public function __construct($id = false, $table = null, $ds = null) {
		//Sets the upload directory for resumes
		$this->uploadDir = APP . 'webroot' . DS . 'files' . DS . 'resumes';
		return parent::__construct($id, $table, $ds);
	}
	
	public function beforeValidate($options = array()) {
		//If a new application is being added, make sure it has an uploaded resume
		if (!empty($this->data[$this->alias])) {
			$data =& $this->data[$this->alias]; //Stores it for easier reading
			if (empty($data[$this->uploadField]['tmp_name'])) {
				if (empty($data['id'])) {
					$this->invalidate('upload', 'Please attach a resume');
					return false;
				}
			} else {
				if (!in_array($this->getFileExtension($data[$this->uploadField]['name']), $this->validResumeExtensions)) {
					$this->invalidate('upload', 'Please attach a valid resume type');
					return false;
				}
			}
		}
		return parent::beforeValidate($options);
	}
	
	public function beforeSave($options = array()) {
		//Finds the data
		if (isset($this->data[$this->alias])) {
			$data =& $this->data[$this->alias];
		} else {
			$data =& $this->data;
		}
		
		//Checks to see if a file has been uploaded
		//If a file has been uploaded, it stores the information and waits until successfully copying the file
		if (!empty($data[$this->uploadField]['tmp_name'])) {
			$this->uploadFileExt = $this->getFileExtension($data[$this->uploadField]['name']);
			$this->uploadFile = $data[$this->uploadField]['tmp_name'];
		}
		parent::beforeSave($options);
	}
	
	public function afterSave($created) {
		$this->copyResumeFile($this->id);		//Looks to see if a resume file was uploaded with the save
		return parent::afterSave($created);
	}
	
	public function beforeDelete($cascade = true) {
		$this->deleteResumeFile($this->id);		//Makes sure to delete the resume file as well
		return parent::beforeDelete($cascade);
	}
	
	//Deletes the resume file stored in the system
	private function deleteResumeFile($id) {
		$result = $this->read('filename', $id);
		if (!empty($result[$this->alias]['filename'])) {
			return unlink($this->uploadDir . DS . $result[$this->alias]['filename']);
		}
		return null;		
	}
	
	//Checks to see if an uploaded file was stored in beforeSave, then renames and copies it
	private function copyResumeFile($id = null) {
		if (!empty($this->uploadFile)) {
			$filename = $id . '.' . $this->uploadFileExt;			//The new filename
			$dst = $this->uploadDir . DS . $filename;				//Upload destination
			if (move_uploaded_file($this->uploadFile, $dst)) {		//Copies the file
				//Updates database entry
				return $this->save(compact('id', 'filename'), array('callbacks' => false, 'validate' => false));
			}
		}
		return null;
	}
	
	private function getFileExtension($file) {
		$parts = pathinfo($file);
		return $parts['extension'];
	}
}