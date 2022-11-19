<?php
	include("conectarDB.php");
	//Aqui vai buscar a ação através do Request
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO clientes 
						(cliNome, cliEmail, cliCpf, cliDataNascimento)
					VALUES
						('".$_POST["nomeCli"]."','".$_POST["emailCli"]."','".$_POST["cpfCli"]."','".$_POST["dataNascimentoCli"]."')";

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Cliente Cadastrado com sucesso !!!!');</script>";
				print "<script>location.href='clientes.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível cadastrar o cliente !!!!');</script>";
				print "<script>location.href='clientes.php';</script>";
			}
		break;
		
		case 'editar':
			$sql = "UPDATE clientes SET
						cliNome='".$_POST["nomeCli"]."',
						cliEmail='".$_POST["emailCli"]."',
						cliCpf='".$_POST["cpfCli"]."',
						cliDataNascimento='".$_POST["dataNascimentoCli"]."'
					WHERE
						cliId=".$_POST["idCli"];

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Cliente editado com Sucesso !!!!');</script>";
				print "<script>location.href='clientes.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível editar o cliente !!!!');</script>";
				print "<script>location.href='clientes.php';</script>";
			}
		break;

		case 'excluir':
			$sql = "DELETE FROM clientes WHERE cliId=".$_REQUEST["idCli"];

			$resultado = $conexao->query($sql) or die($conexao->error);

			if($resultado==true)
			{
				print "<script>alert('Cliente Excluido com sucesso !!!!');</script>";
				print "<script>location.href='clientes.php';</script>";
			}
			else
			{
				print "<script>alert('Não foi possível excluir o cliente !!!!');</script>";
				print "<script>location.href='clientes.php';</script>";
			}
		break;
	}
?>
