<?php 
/*
-- Faz o carregamento (auto load) automaticamente das classes;
-- Desenvolvida por Edevaldo
* $class_name = Nome da classe que vai ser Chamada no momento que é declarada no arquivo;
*/
spl_autoload_register(function($class_name){
	$fileName = "funcoes". DIRECTORY_SEPARATOR . $class_name . ".php";
	if(file_exists($fileName)){
		require_once($fileName);
	}
});
?>