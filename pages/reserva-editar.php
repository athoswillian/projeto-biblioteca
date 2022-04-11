<h1>Editar Reserva</h1>
<?php
	$sql= "SELECT * FROM reserva WHERE id_reserva=".$_REQUEST["id_reserva"];
	$res = $conn->query($sql) or die($conn->error);
	$row = $res->fetch_object();
?>
<form action="?page=reserva-salvar" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_reserva" value="<?php print $row->id_reserva; ?>">
	<div class="mb-3">
		<label>Atendente</label>
		<select name="atendente_id_atendente" class="form-control">
			<option>Selecione um atendente</option>
		<?php
			$sql_1 = "SELECT * FROM atendente";
			$res_1 = $conn->query($sql_1) or die($conn->error);
			if($res_1->num_rows > 0){
				while($row_1 = $res_1->fetch_object()){
					if($row_1->id_atendente == $row->atendente_id_atendente){
						print "<option value='".$row_1->id_atendente."' selected>";
						print $row_1->nome_atendente."</option>";
					}else{
						print "<option value='".$row_1->id_atendente."'>";
						print $row_1->nome_atendente."</option>";
					}					
				}
			}else{
				print "Não possui esse atendente cadastrado";
			}
		?>
		</select>
	</div>
    <div class="mb-3">
		<label>Aluno</label>
		<select name="aluno_id_aluno" class="form-control">
			<option>Selecione um aluno</option>
		<?php
			$sql_2 = "SELECT * FROM aluno";
			$res_2= $conn->query($sql_2) or die($conn->error);
			if($res_2->num_rows > 0){
				while($row_2 = $res_2->fetch_object()){
					if($row_2->id_aluno == $row->aluno_id_aluno){
						print "<option value='".$row_2->id_aluno."' selected>";
						print $row_2->nome_aluno."</option>";
					}else{
						print "<option value='".$row_2->id_aluno."'>";
						print $row_2->nome_aluno."</option>";
					}					
				}
			}else{
				print "Não possui esse aluno cadastrado";
			}
		?>
		</select>
	</div>
    <div class="mb-3">
		<label>Livro</label>
		<select name="livro_id_livro" class="form-control">
			<option>Selecione um livro</option>
		<?php
			$sql_3 = "SELECT * FROM livro";
			$res_3 = $conn->query($sql_3) or die($conn->error);
			if($res_3->num_rows > 0){
				while($row_3= $res_3->fetch_object()){
					if($row_3->id_livro == $row->livro_id_livro){
						print "<option value='".$row_3->id_livro."' selected>";
						print $row_3->titulo_livro."</option>";
					}else{
						print "<option value='".$row_3->id_livro."'>";
						print $row_3->nome_livro."</option>";
					}					
				}
			}else{
				print "Não possui esse livro cadastrado";
			}
		?>
		</select>
	</div>
    <div class="mb-3">
		<label>Data da emprestimo</label>
		<input type="date" name="data_emprestimo" value="<?php print $row->data_emprestimo; ?>" class="form-control">
	</div>
    <div class="mb-3">
		<label>Data da devolução</label>
		<input type="date" name="data_devolucao" value="<?php print $row->data_devolucao; ?>" class="form-control">
	</div>
	<div class="mb-3">
		<button class="btn btn-success" type="submit">Enviar</button>
	</div>
</form>