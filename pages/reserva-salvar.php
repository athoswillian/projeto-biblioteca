<?php
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':

			$atendente = $_POST["atendente_id_atendente"];
            $aluno = $_POST["aluno_id_aluno"];
            $livro= $_POST["livro_id_livro"];
            $datae = $_POST["data_emprestimo"];
            $datad = $_POST["data_devolucao"];

			$sql = "INSERT INTO reserva (atendente_id_atendente,aluno_id_aluno,livro_id_livro,data_emprestimo,data_devolucao) 
			VALUES ('{$atendente}','{$aluno}','{$livro}','{$datae}','{$datad}')";

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Cadastrado com sucesso!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}else{
				print "<script>alert('Não foi possível cadastrar!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}
			break;
		
		case 'editar':
			$atendente = $_POST["atendente_id_atendente"];
			$aluno= $_POST["aluno_id_aluno"];
            $livro = $_POST["livro_id_livro"];
            $datae = $_POST["data_emprestimo"];
            $datad = $_POST["data_devolucao"];

			$sql = "UPDATE reserva SET atendente_id_atendente={$atendente},aluno_id_aluno={$aluno},livro_id_livro={$livro}, data_emprestimo='{$datae}', data_devolucao='{$dated}'WHERE id_reserva=".$_POST["id_reserva"];
			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editado com sucesso!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}else{
				print "<script>alert('Não foi possível editar!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM reserva WHERE id_reserva=".$_REQUEST["id_reserva"];
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<script>alert('Excluído com sucesso!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}else{
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}
			break;
	}