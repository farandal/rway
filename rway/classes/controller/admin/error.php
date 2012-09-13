<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Error extends Controller_Website {

public function before()
     {
                        $this->template ='admin/template';
                        parent::before();
     }

     public function after()
     {
                        parent::after();
     }



	public function action_noencontrado()
	{
		
				$this->view = View::factory('admin/error')
					->set('title','Usuario Deconocido')
					->set('ups','ups')
					->set('msn','Verifique su email o contraseña')
					->set('link','/admin');
					
	}
	
	public function action_enviado()
	{
		
				$this->view = View::factory('admin/error')
					->set('title','Envio Contraseña')
					->set('ups','Ok')
					->set('msn','Hemos generado una nueva contraseña para su cuenta, por favor verifique su casilla de correo.')
					->set('link','/admin');
					
	}	
	
	
}
