<?php
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$nome 	 = $_POST["nome_aluno"];
			$email 	 = $_POST["email_aluno"];
			$end	 = $_POST["end_aluno"];
			$fone	 = $_POST["fone_aluno"];
			$dt_nasc = $_POST["data_nasc_aluno"];
			$genero  = $_POST["genero_aluno"];

			$sql = "INSERT INTO aluno (nome_aluno, email_aluno, end_aluno, fone_aluno, data_nasc_aluno, genero_aluno) VALUES ('{$nome}', '{$email}', '{$end}','{$fone}','{$dt_nasc}','{$genero}')";

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Cadastrado com sucesso!');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}else{
				print "<script>alert('Não foi possível cadastrar');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}
			break;
		
		case 'editar':
			$nome 	 = $_POST["nome_aluno"];
			$email 	 = $_POST["email_aluno"];
			$end	 = $_POST["end_aluno"];
			$fone	 = $_POST["fone_aluno"];
			$dt_nasc = $_POST["data_nasc_aluno"];
			$genero  = $_POST["genero_aluno"];

			$sql = "UPDATE aluno SET nome_aluno='{$nome}', email_aluno='{$email}', end_aluno='{$end}', fone_aluno='{$fone}', data_nasc_aluno='{$dt_nasc}', genero_aluno='{$genero}' WHERE id_aluno=".$_POST["id_aluno"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editado com sucesso!');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}else{
				print "<script>alert('Não foi possível editar');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM aluno WHERE id_aluno=".$_REQUEST["id_aluno"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluído com sucesso!');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}else{
				print "<script>alert('Não foi possível excluir');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}
			break;
	}