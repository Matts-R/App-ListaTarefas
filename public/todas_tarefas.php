<?php
$acao = 'recuperar';
require '../controller/tarefa.controller.php';
?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="../Style/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="../JS/funcoesApp.js" defer></script>

	<script>
		window.addEventListener('load', () => {
			if (window.location.search === '?edicao=1') {
				setTimeout(() => {
					window.location.href = 'http://localhost/App_ListaTarefas/public/todas_tarefas.php';
				}, 5000);
			}
		})
	</script>

</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="../Images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Lista Tarefas
			</a>
		</div>
	</nav>


	<? if(isset($_GET['edicao']) && $_GET['edicao'] == 1 ){ ?>
	<div class="bg-success pt-2 text-white d-flex justify-content-center">
		<h5>Tarefa Atualizada com sucesso</h5>
	</div>
	<? } ?>


	<div class="container app">
		<div class="row">
			<div class="col-sm-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
					<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
					<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Todas tarefas</h4>
							<hr />

							<? foreach ($tarefas as $key => $tarefa ) {?>
							<div class="row mb-3 d-flex align-items-center tarefa" id="div_<?= $tarefa['id'] ?>">
								<div class="col-sm-9" id="tarefa_<?= $tarefa['id'] ?>">
									<?= $tarefa['tarefa'] ?>
									<?= ' (' . ucfirst($tarefa['status']) . ')'; ?>
								</div>
								<div class="col-sm-3 mt-2 d-flex justify-content-between">
									<i class="fas fa-trash-alt fa-lg text-danger" onclick='deletar(<?= $tarefa["id"] ?>)'>
									</i>

									<? if ($tarefa['id_status'] == 1) { ?>
									<i class="fas fa-edit fa-lg text-info " id=' test_<?= $tarefa['id'] ?>' onclick='editar(<?= $tarefa["id"] ?>,"<?= $tarefa["tarefa"] ?>")'>
									</i>
									<i class="fas fa-check-square fa-lg text-success" onclick='realizada(<?= $tarefa["id"] ?>)'>
									</i>
									<? } ?>

								</div>
							</div>
							<?	}?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>