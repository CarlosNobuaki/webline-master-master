<?php
session_start();
include_once("conexao.php");


if(isset($_POST['editar'])):
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);
	$chassi = filter_input(INPUT_POST, 'chassi', FILTER_SANITIZE_STRING);
	$montadora = filter_input(INPUT_POST, 'montadora', FILTER_SANITIZE_STRING);
	

$id = mysqli_escape_string($conn, $_POST['id']);

$sql = "UPDATE automoveis SET nome='$nome', placa='$placa', chassi='$chassi', montadora='$montadora' WHERE id='$id'";

if (mysqli_query ($conn,$sql)):
	$_SESSION['msg']= "<p style='color:blue; width = '100';>Atualizado com sucesso</p>";
	header("Location: index.php");
else:
	$_SESSION['msg']= "<p style='color:red;'>Erro de edição </p>";
	header("Location: index.php");	
endif;
endif;	
