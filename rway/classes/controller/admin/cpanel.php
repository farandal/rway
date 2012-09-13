<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Cpanel extends Controller_Admin {

   public function before()
     {
                        parent::before();
			 if (!Auth::instance()->logged_in('admin')) { echo "no es admin";  $this->request->redirect('admin');  }			
     }

     public function after()
     {
                        parent::after();
     }





public function action_index() {


  $this->view = View::factory('admin/inicio');
                                $this->view->navigation = Request::factory('admin/navigation')->execute()->body();
                                $this->view->navigationtop = Request::factory('admin/navigationtop')->execute()->body();
                                $this->view->navigationheader  = Request::factory('admin/navigationheader')->execute()->body();




}


} 
