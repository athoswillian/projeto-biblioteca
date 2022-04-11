<h1>Listar Reserva</h1>
<?php
	$sql = "SELECT* FROM reserva as 
	r INNER JOIN aluno AS a ON r.aluno_id_aluno = a.id_aluno INNER JOIN livro 
	AS l ON r.livro_id_livro = id_livro INNER JOIN atendente 
	AS t ON r.atendente_id_atendente = t.id_atendente";

	$res = $conn->query($sql) or die($conn->error);

	$qtd = $res->num_rows;

	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

	if($qtd > 0){
		print "<table class='table table-striped table-hover table-bordered'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Atendente</th>";
		print "<th>Aluno</th>";
        print "<th>Livro</th>";
        print "<th>Data de empréstimo</th>";
        print "<th>Data de devolução</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_reserva."</td>";
			print "<td>".$row->nome_atendente."</td>";
			print "<td>".$row->nome_aluno."</td>";
            print "<td>".$row->titulo_livro."</td>";
            print "<td>".$row->data_emprestimo."</td>";
            print "<td>".$row->data_devolucao."</td>";
			print "<td>
					<button class='btn btn-success' onclick=\"location.href='?page=reserva-editar&id_reserva=".$row->id_reserva."';\">Editar</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=reserva-salvar&acao=excluir&id_reserva=".$row->id_reserva."';}else{false;}\">Excluir</button>
			       </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "<div class='alert alert-danger'>Nenhuma reserva cadastrada</div>";
	}
?>