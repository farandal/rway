
<?php
defined('SYSPATH') or die('No direct script access.');
class Controller_Admin extends Controller_Website {





     public function before()
     {
                        $this->template ='admin/template';
                        parent::before();


		if (!Auth::instance()->logged_in('admin')) $this->request->redirect('admin');





     }

     public function after()
     {
                        parent::after();
     }






}



