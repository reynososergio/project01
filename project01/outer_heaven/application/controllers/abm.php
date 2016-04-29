<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Abm extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null) {
		$this->load->view('abm_view',$output);
	}

	public function offices() {
		$output = $this->grocery_crud->render();
		$this->_example_output($output);
	}

	public function index() {
		switch ($this->session->userdata('tipo')) {
			
			case '':
				redirect(base_url().'index');
				break;
          
            case 'A':
				$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
				break;
            
            case 'U':
				redirect(base_url().'index');
				break;
        }
	}

	function instrumentos(){
		
		try {
			$crud = new grocery_CRUD();
			$crud->set_table('instrumentos');
			$crud->set_subject('Instrumentos');
			$crud->set_language('spanish');
			$crud->display_as('id_instrumento','Numero de Instrumento');
			$crud->columns('id_instrumento','nombreDeInstrumento','imagen','descripcion','precio');
			$output = $crud->render();
			$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
}

?>
