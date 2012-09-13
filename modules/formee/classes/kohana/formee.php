<?php
 
class Kohana_Formee {


	public $retornar;

				public static function factory() {
								return new Formee();
				}

				protected function __construct() {
					
								$this->retornar = "";
								$this->config = Kohana::$config->load('formee');
								
				}


	public function draw() {
		return $this->retornar;
	}
				
	public function inputText($titulo, $id, $valor, $classe = '', $tamanho = '12', $obrigatorio = 'nao-obrigatorio', $tipo = 'text', $read = 'nao-readonly') {
		
		$obrigatorio_input = $obrigatorio == "required"? "input-req":"";
		$obrigatorio = $obrigatorio == "required"? " <em class=\"formee-req\">*</em>":"";
		$read = $read == "readonly"? "readonly=readonly":"";
			$this->retornar .= "<div class=\"grid-$tamanho-12\">\n";
			$this->retornar .= "<label for=\"$id\">$titulo:$obrigatorio</label>\n";
			$this->retornar .= "<input type=\"$tipo\" name=\"$id\" id=\"$id\" size=\"$tamanho\" class=\"$id $classe $obrigatorio_input\" value=\"$valor\" $read />\n";
			$this->retornar .= "</div>\n\n";
		
	}
	public function inputCheck($titulo, $id, $valor, $tipo, $checked = 'nao-checked', $tamanho = '12', $classe = '', $obrigatorio = 'nao-obrigatorio') {
		$obrigatorio = $obrigatorio == 'required'? " <span class=\"obrigatorio\">*</span>":"";
		$this->retornar .= "<div class=\"grid-$tamanho-12\">\n";
		$this->retornar .= "<label>$titulo:$obrigatorio</label>\n";
		$this->retornar .= "<ul class=\"formee-list\">\n";
		foreach ($valor as $valor => $nome){
			$check = $checked == $valor? "checked":"";
			$this->retornar .= "<li><label><input type=\"$tipo\" name=\"$id\" id=\"$id\" class=\"$id $classe\" value=\"$valor\" $check /> $nome</label></li>\n";
		}
		$this->retornar .= "</ul>\n";
		$this->retornar .= "</div>\n\n";
		
	}
	public function textArea($titulo, $id, $valor, $classe = '', $tamanho = '12', $obrigatorio = 'nao-obrigatorio') {
		$obrigatorio_input = $obrigatorio == "required"? "input-req":"";
		$obrigatorio = $obrigatorio == "required"? " <em class=\"formee-req\">*</em>":"";
	
		$this->retornar .= "<div class=\"grid-$tamanho-12\">\n";
		$this->retornar .= "<label for=\"$id\">$titulo:$obrigatorio</label>\n";
		$this->retornar .= "<textarea name=\"$id\" id=\"$id\" class=\"$id $classe $obrigatorio_input\" />$valor</textarea>\n";
		$this->retornar .= "</div>\n\n";
		
	}
	public function Select($titulo, $id, $valor, $valor_padrao = "", $multiple = "nao-multiple", $classe = '', $tamanho = '12', $obrigatorio = 'nao-obrigatorio') {
		$obrigatorio_input = $obrigatorio == "required"? "input-req":"";
		$obrigatorio = $obrigatorio == "required"? " <em class=\"formee-req\">*</em>":"";
		$valor_padrao_array = $valor_padrao != ""? explode(',',$valor_padrao):"";
		$this->retornar .= "<script>\n\r";
		$this->retornar .= "$(document).ready(function () {\n\r";
		foreach($valor_padrao_array as $value){
			$this->retornar .= "$('#".$id." option[value=\"$value\"]').attr('selected','selected');\n\r";
		}
		$this->retornar .= "})\n\r;";
		$this->retornar .= "</script>";
		$multiple_bool = $multiple == "multiple"? "[]":"";
		$multiple = $multiple == "multiple"? "multiple=\"multiple\"":"";

		$this->retornar .= "<div class=\"grid-$tamanho-12 $id-div\">\n";
		$this->retornar .= "<label for=\"$id\">$titulo:$obrigatorio</label>\n";
		$this->retornar .= "<select name=\"$id$multiple_bool\" id=\"$id\" class=\"$id $classe $obrigatorio_input\" $multiple  >\n";
		foreach ($valor as $valor => $nome){
			if(is_array($nome) && $nome[1]){
				$disabled = "disabled=\"disabled\"";
				$descricao = $nome[0];
			} else {
				$descricao = is_array($nome)? $nome[0]:$nome;
				$disabled = "";
			}
			$this->retornar .= "<option value=\"$valor\" $disabled>".$descricao."</option>\n";
		}
		$this->retornar .= "</select>";
		$this->retornar .= "</div>\n\n";
		
	}


	public function finaliza($titulo, $id, $url_volta = false, $limpar = true) {
		$this->retornar .= "<div class=\"grid-12-12\">\n";
		$this->retornar .= "<input type=\"submit\" value=\"$titulo\" name=\"$id\" id=\"$id\" />\n";
		$this->retornar .= $limpar == true?"<input type=\"reset\" value=\"Limpar\" name=\"limpar\" id=\"limpar\" />\n":"";
		$this->retornar .= $url_volta?"<input type=\"button\" value=\"Voltar\" name=\"voltar\" id=\"voltar\" onClick=\"location.href='$url_volta'\" />\n":"";
		$this->retornar .= "</div>\n\n";
		
	}

				
				
				
				
				
				
				
				
}
