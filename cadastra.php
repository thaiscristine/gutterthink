<?php
//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:

$host= '160.153.71.96';
$bd= 'gutter_dev';
$senhabd= 'godaddy1020';

$userbd = 'gutter_main';

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	   = $_POST ["nome"];	 //atribuição do campo "nome"
$email	   = $_POST ["email"];	 //atribuição do campo "email"
$interesse   = $_POST ["interesse"]; //atribuição do campo "conhece"

date_default_timezone_set("America/Sao_Paulo");

//ip
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

//conectando com o localhost - mysql
$conexao = mysql_connect($host,$bd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($userbd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());

$query = "INSERT INTO `inscritos` ( `nome` , `email` , `interesse` , `ip` )
VALUES ('$nome', '$email', '$interesse', '$ip')";

mysql_query($query,$conexao);

header("Location: obrigado.html");
//echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
?>
