<?php
class SubmissionsController extends CformsAppController {

	public $name = 'Submissions';
	public $helpers = array('Html', 'Form', 'Cforms.Csv','Js');
	public $components = array(
		'Cforms.Cforms',
		'Search.Prg' => array(
			'presetForm' => array(
				'paramType' => 'querystring',
			),
			'commonProcess' => array(
				'paramType' => 'querystring',
				'filterEmpty' => true,
			),
		),
	);
	public $uses = array('Cforms.Submission', 'Cforms.Cform');

	function admin_export($formId = null){
		if (!$formId) {
			$this->Session->setFlash(__d('cforms', 'Invalid Submission', true));
			$this->redirect(array('action' => 'index'));
		}

		Configure::write('debug', 0);

		$submissions = $this->Submission->getSubmissions($formId);
		$fields = array_keys($submissions[0]);

		$this->set(compact('submissions', 'fields'));
		$this->layout = 'Cforms.csv/default';
		$this->render('Cforms.Submissions/csv/admin_export');

	}

	function admin_index() {
		$this->set('title_for_layout', __d('cforms', 'Submissions'));
		$this->Prg->commonProcess();

		$this->Submission->recursive = 0;
		$this->paginate['Submission']['order'] = 'Submission.id DESC';

		$criteria = $this->Submission->parseCriteria($this->Prg->parsedParams());

		$this->set('cforms', $this->Cform->find('list'));
		$this->set('submissions', $this->paginate($criteria));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__d('cforms', 'Invalid Submission', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('submission', $this->Submission->read(null, $id));
	}


/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Submission->id = $id;
		if (!$this->Submission->exists()) {
			throw new NotFoundException(__d('cforms', 'Invalid Submission'));
		}
		if ($this->Submission->delete()) {
			$this->Session->setFlash(__d('cforms', 'Submission deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('cforms', 'Submission was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	function view_upload($encodedPath = false){
		$file = base64_decode($encodedPath);
		//First, see if the file exists
		  if (!is_file($file)) { die("<b>404 File not found!</b>"); }

		  //Gather relevant info about file
		  $len = filesize($file);
		  $filename = basename($file);
		  $file_extension = strtolower(substr(strrchr($filename,"."),1));

		  //This will set the Content-Type to the appropriate setting for the file
		  switch( $file_extension ) {
			case "pdf": $ctype="application/pdf"; break;
		    case "exe": $ctype="application/octet-stream"; break;
		    case "zip": $ctype="application/zip"; break;
		    case "doc": $ctype="application/msword"; break;
		    case "xls": $ctype="application/vnd.ms-excel"; break;
		    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		    case "gif": $ctype="image/gif"; break;
		    case "png": $ctype="image/png"; break;
		    case "jpeg":
		    case "jpg": $ctype="image/jpg"; break;
		    case "mp3": $ctype="audio/mpeg"; break;
		    case "wav": $ctype="audio/x-wav"; break;
		    case "mpeg":
		    case "mpg":
		    case "mpe": $ctype="video/mpeg"; break;
		    case "mov": $ctype="video/quicktime"; break;
		    case "avi": $ctype="video/x-msvideo"; break;

		    //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
		    case "php":
		    case "htm":
		    case "html":
		    case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

		    default: $ctype="application/force-download";
		  }

		  //Begin writing headers
		  header("Pragma: public");
		  header("Expires: 0");
		  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		  header("Cache-Control: public");
		  header("Content-Description: File Transfer");

		  //Use the switch-generated Content-Type
		  header("Content-Type: $ctype");

		  //Force the download
		  $header="Content-Disposition: attachment; filename=".$filename.";";
		  header($header );
		  header("Content-Transfer-Encoding: binary");
		  header("Content-Length: ".$len);
		  @readfile($file);
		  exit;
	}
	
	function beforeCformsSave($data){
	}	
	function afterCformsSave($data){
	}

}