<?php

$host="localhost";
$usuario="root";
$senha="1234";
$banco="arena";

$conexao=mysqli_connect($host,$usuario,$senha,$banco);

if(!$conexao){

die("Erro na conexão");

}

?>