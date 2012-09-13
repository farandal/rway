<?php 
defined('SYSPATH') or die('No direct script access.');
class Controller_Default extends Controller_Website
{
	
     public function before()
     {
			$this->template = "admin/template";
			parent::before();
     }
		
     public function after()
     {
			parent::after();
     }

	
     public function action_index()  {
			
		
				$this->view = View::factory('default/index');



				//Estos archivos estan en la carpeta assets.. reemplazar!
				$this->extra_css[] = $this->host . Kohana::$config->load('local')->get('asset_dir') . "/lib/Formee/css/formee-structure.css";
				$this->extra_css[] =  $this->host . Kohana::$config->load('local')->get('asset_dir') . "/lib/Formee/css/formee-style.css";
				$this->extra_js[] =  $this->host . Kohana::$config->load('local')->get('asset_dir') . "/lib/Formee/js/formee.js";
				//$this->extra_code[] = "string_including_script_tags";


			$formee = Formee::factory();
                        $formee->inputText("InputText", "inputtext", "inputText", "inputText", 12, "required", "text", "false");
                        $formee->inputText("InputPassword", "inputtextpassword", "inputText", "inputText", 6, "required", "password", "false");
                        $formee->inputText("InputFile", "inputtext", "inputText", "", 6, "required", "file", "false");
                        $formee->textArea("textArea1", "textarea1", "textArea", "", 6, "required");
                        $formee->textArea("textArea2", "textarea2", "textArea", "", 6, "required");
                        $formee->inputCheck("inputCheck", "inputcheck", array("inputCheck" => "inputCheck","inputCheck2" => "inputCheck2"), "radio", "inputCheck", 12, "", "false");
                        $formee->Select("Select1", "select1", array("Select1" => "Select1","Select2" => "Select2"), "Select2", "false", "", 6, "false");
                        $formee->Select("Select2", "select2", array("Select1" => "Select1","Select2" => "Select2"), "Select1", "true", "", 6, "false");
                        $formee->finaliza("Finaliza", "finaliza", "http://www.google.com/", true);

                        $this->view->formulario = $formee->draw();
				



	 }
	
	
		
}

