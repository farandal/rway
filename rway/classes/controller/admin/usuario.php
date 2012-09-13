<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Usuario extends Controller_Admin {



 public function before()
     {
                        $this->template ='admin/template';
                        parent::before();
     }

     public function after()
     {
                        parent::after();
     }


	private static $ERRORS = array(
            "EMAIL_EXISTS" => "Ya existe una cuenta asociada a este correo", 
			"NO_USERS" => "No encontramos usuario con su email y contraseña"
    );



	public function action_index()
	{
			
				
				$results = Model_User::get_all();
				
				$this->view = View::factory('admin/usuario')->set('users',$results);
				$this->view->navigation  = Request::factory('admin/navigation')->execute()->body();
				$this->view->navigationtop  = Request::factory('admin/navigationtop')->execute()->body();
				$this->view->navigationheader  = Request::factory('admin/navigationheader')->execute()->body();
				
	
			
		
		
	}
	
	
	
	
	
	

} 
