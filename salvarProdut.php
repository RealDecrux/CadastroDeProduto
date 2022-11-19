<?php
	include("conectarDB.php");
	//Aqui vai buscar a ação através do Request
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO produto 
						(nomeProdut, qtdProdut, vlrProdut)
					VALUES
						('".$_POST["nomeProdut"]."','".$_POST["qtdProdut"]."','".$_POST["vlrProdut"]."')";

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Produto cadastrado com sucesso !');</script>";
				print "<script>location.href='listarProdut.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível cadastrar o produto !!!!');</script>";
				print "<script>location.href='listarProdut.php';</script>";
			}
		break;
		
		case 'editar':
			$sql = "UPDATE produto SET
						nomeProdut='".$_POST["nomeProdut"]."',
						qtdProdut='".$_POST["qtdProdut"]."',
						vlrProdut='".$_POST["vlrProdut"]."'
					WHERE
						idProduto=".$_POST["idProduto"];

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Produto editado com Sucesso !');</script>";
				print "<script>location.href='listarProdut.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível editar o Produto !!!!');</script>";
				print "<script>location.href='listarProdut.php';</script>";
			}
		break;

		case 'excluir':
			$sql = "DELETE FROM produto WHERE idProduto=".$_REQUEST["idProduto"];

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Produto excluido com sucesso !');</script>";
				print "<script>location.href='listarProdut.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível excluir o produto !!!!');</script>";
				print "<script>location.href='listarProdut.php';</script>";
			}
		break;
	}
?>
