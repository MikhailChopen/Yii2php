<?php
$this->title = 'HOME';
?>

<div class="container">

	<h1 align="center">FrameWork Yii2 PHP</h1>

	<h2 align="center">Listado Estudiantes-Cursos Asignados</h2>
	<table class="table table-bordered">
		<tr>
			<th><center><B>CARNET</B></center></th>
			<th><center><B>NOMBRE</B></center></th>
			<th><center><B>APELLIDO</B></center></th>
			<th><center><B>ID ASIGNACION</B></center></th>
			<th><center><B>CURSO</B></center></th>
			<th><center><B>CICLO</B></center></th>
		</tr>
		<?php foreach ($model as $row): ?>
			<tr>	
				<td><?= $row->estudiante->carnet ?></td>

				<td><?= $row->estudiante->nombre ?></td>
				<td><?= $row->estudiante->apellido ?></td>
				<td><?= $row->id_asignacion ?></td>
				<td><?= $row->nombre_curso ?></td>
				<td><?= $row->ciclo ?></td>			
			</tr>
		<?php endforeach ?>
	</table>

</div>