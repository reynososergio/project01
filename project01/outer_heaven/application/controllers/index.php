<?

	class Index extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form','language'));
			$data['title']= 'Main head for the new site';
			$this->load->view('main_hf/head',$data);
			$this->load->view('main_hf/nav');
			$this->load->model('outer_heaven');
			$this->lang->load('registro','spanish');
			$this->lang->load('form_validation','spanish');
			$this->load->library('form_validation');
		}
		
		public function index(){
			$this->load->view('index');
			$this->load->view('main_hf/footer');
		}	
		
		public function signIn(){
			$this->load->database();
			$this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[4]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
            if($this->form_validation->run() == FALSE) {
                $this->index();
            }
            else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$check_user = $this->outer_heaven->login_user($username,$password);
				if($check_user == TRUE) {
					$data = array(	'logueo'=>TRUE,
									'id_usuario'=>$check_user->id_usuario,
									'tipo'=>$check_user->tipo,
									'password'=>$check_user->clave,
									'username'=>$check_user->nombreDeUsuario,
									'estado'=>$check_user->estado
									);        
					$this->db->close();
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		
		}
		
		public function singUp(){
			
			$this->load->database();
			
			if($this->check()){
				$this->outer_heaven->addUser($this->input->post());
				$this->session->set_flashdata('mensaje_exito','Usted se ha registrado correctamente en el sitio.');
				$this->db->close();
				redirect('index');
			}
			
			$data_reg['reg_form_action'] = base_url().'index/singUp';
			$data_reg['provincias'] = $this->outer_heaven->getProvincias();
			$this->load->view('singUp',$data_reg);
			$this->load->view('main_hf/footer');
		}
		
		public function check(){
			//Configuro validaciones
			$this->form_validation->set_rules('reg_usuario','Nombre de Usuario','trim|required|alpha_numeric|min_length[6]|max_length[40]|callback_usuario_unico');
			$this->form_validation->set_rules('reg_email','Correo','trim|required|valid_email|max_length[80]|callback_email_unico');
			$this->form_validation->set_rules('reg_clave','Contraseña','trim|required|min_length[6]|max_length[20]|matches[reg_confirm]');
			$this->form_validation->set_rules('reg_confirm','Confirmación','trim|required');
			$this->form_validation->set_rules('reg_dni','DNI','trim|required|integer|min_length[6]|max_length[8]|callback_dni_unico');
			$this->form_validation->set_rules('reg_nombre','Nombre/s','trim|required|alpha|max_length[40]');
			$this->form_validation->set_rules('reg_apellido','Apellido/s','trim|required|alpha|max_length[40]');
			$this->form_validation->set_rules('reg_telefono','Télefono','trim|required|numeric|max_length[15]');
			$this->form_validation->set_rules('reg_provincia','Provincia','callback_requerido');
			$this->form_validation->set_rules('reg_ciudad','Ciudad','callback_requerido');
			$this->form_validation->set_rules('reg_calle','Calle','trim|required|alpha_numeric|max_length[50]');
			$this->form_validation->set_rules('reg_numero','Número','trim|required|numeric|max_length[5]');
			$this->form_validation->set_rules('reg_piso','Piso','trim|integer|max_length[2]');
			$this->form_validation->set_rules('reg_depto','Departamento','trim|alpha_numeric|max_length[2]');

			//Ejecuto validaciones
			return $this->form_validation->run();
		}
	
		/**
		* @param String $email
		* @return boolean
		**/
		public function email_unico($email){
			if($this->outer_heaven->email_unico($email)) {
				return true;
			}else{
				$this->form_validation->set_message('email_unico','El %s ya se encuentra registrado.');
				return false;
			}
		}
		
		/**
		* @param String $usuario
		* @return boolean
		**/
		public function usuario_unico($usuario){
			if($this->outer_heaven->usuario_unico($usuario)) {
				return true;
			}else{
				$this->form_validation->set_message('usuario_unico','El %s ya se encuentra registrado.');
				return false;
			}
		}

		/**
		* @param integer $dni
		* @return boolean
		**/
		public function dni_unico($dni){
			if($this->outer_heaven->dni_unico($dni)) {
				return true;
			}else{
				$this->form_validation->set_message('dni_unico','El %s ya se encuentra registrado.');
				return false;
			}
		}
	
		public function requerido($id){
			$valido = !($id == '-1');
			if($valido){
				return true;
			}else{
				$this->form_validation->set_message('requerido','El campo %s es requerido.');
				return false;
			}
		}

		public function ciudades(){
			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$ciudades = $this->outer_heaven->getCiudades($this->input->post('id_provincia'));
				$sel = ($this->input->post('ciu') == '-1')?'selected="selected"':'';
				$html = '<option value="-1" '. $sel .'>--------------</option>';
				foreach ($ciudades as $ciudad){
					$sel = ("$ciudad->id" == $this->input->post('ciu'))?'selected="selected"':'';
					$html .= '<option value="'.$ciudad->id.'" '. $sel .'>'.$ciudad->nombre.'</option>';
				}
				echo $this->input->post('ciu') . $html;
			}
			return false;
		}

		public function test_run(){
			$this-load('salida.php');
	

		}


	
	}

?>
