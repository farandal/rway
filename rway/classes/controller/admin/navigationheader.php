<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Navigationheader extends Controller_Admin {

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
		$this->view = View::factory('admin/navigationheader');
	
	}
	
	

} 
