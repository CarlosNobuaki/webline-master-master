<?php
session_start();
include_once("conexao.php");


if(isset($_POST['deletar'])):

$id = mysqli_escape_string($conn, $_POST['id']);

$sql = "DELETE FROM automoveis WHERE id=$id";

if (mysqli_query ($conn,$sql)):
	$_SESSION['msg']= "<p style='color:blue; width = '100';>Deletado com sucesso</p>";
	header("Location: index.php");
else:
	$_SESSION['msg']= "<p style='color:red;'>Erro ao deletar </p>";
	header("Location: index.php");	
endif;
endif;	
