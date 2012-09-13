<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Navigation extends Controller_Admin {


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
		$this->view = View::factory('admin/navigation');
	
	}
	
	

} 
