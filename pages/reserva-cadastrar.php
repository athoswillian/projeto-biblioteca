<h1>Cadastrar Reserva</h1>
<form action="?page=reserva-salvar" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Atendente</label>
		
		<select name="atendente_id_atendente" class="form-control">
			<option>Selecione um atendente</option>
		<?php
			$sql = "SELECT * FROM atendente";
			$res = $conn->query($sql) or die($conn->error);
			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_atendente."'>";
					print $row->nome_atendente."</option>";
				}
			}else{
				print "Nenhum atendente cadastrado";
			}
		?>
        </select>
        	<label>Aluno</label>
		<select name="aluno_id_aluno" class="form-control">
			<option>Selecione um aluno</option>
		<?php
			$sql = "SELECT * FROM aluno";
			$res = $conn->query($sql) or die($conn->error);
			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_aluno."'>";
					print $row->nome_aluno."</option>";
				}
			}else{
				print "Nenhum aluno cadastrado";
			}
		?>
		</select>
        <label>Livro</label>
		<select name="livro_id_livro" class="form-control">
			<option>Selecione um livro</option>
		<?php
			$sql = "SELECT * FROM livro";
			$res = $conn->query($sql) or die($conn->error);
			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_livro."'>";
					print $row->titulo_livro."</option>";
				}
			}else{
				print "Nenhum livro cadastrado";
			}
		?>
		</select>
	</div>
	<div class="mb-3">
		<label>Data do Empréstimo</label>
		<input type="date" name="data_emprestimo" class="form-control">
	</div>	
    <div class="mb-3">
		<label>Data da Devolução</label>
		<input type="date" name="data_devolucao" class="form-control">
	</div>
    <div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>