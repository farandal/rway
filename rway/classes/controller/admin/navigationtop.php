<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Navigationtop extends Controller_Admin {


 public function before()
     {
                        parent::before();
                         $this->template = false;
     }

     public function after()
     {
                        parent::after();
     }




	public function action_index()
	{
	
		$this->template = false;
		$usuario = Auth::instance()->get_user();
		$this->view = View::factory('admin/navigationtop')->set('logeado',$usuario);
	
	}
	
	

} 
