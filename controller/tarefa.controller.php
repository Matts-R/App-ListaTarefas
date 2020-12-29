<?php

require '../models/tarefa.model.php';
require '../dataBaseConection/conexao.php';
require '../service/tarefa.service.php';

$conexao = Conexao::getConexao();
$tarefaService = new TarefaService($conexao);
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
$tarefas = $tarefaService->recuperar();

if ($acao == 'inserir') {

  $tarefaService->inserir($_POST['tarefa']);
  header('Location: ../public/nova_tarefa.php?inclusao=1');
} else if ($acao == 'editar') {

  $tarefaService->atualizar($_POST['editarTarefa'], $_POST['id']);

  if ($_POST['pag'] == 1) {
    header('Location: ../public/index.php');
  } else {
    header('Location: ../public/todas_tarefas.php');
  }
} else if ($acao == 'deletar') {

  $ok =   $tarefaService->remover($_GET['id']);

  if ($_GET['pag'] == 1) {
    header('Location: ../public/index.php');
  } else {
    header('Location: ../public/todas_tarefas.php');
  }
} else if ($acao == 'realizada') {

  $tarefaService->atualizaStatus($_GET['id']);

  if ($_GET['pag'] == 1) {
    header('Location: ../public/index.php');
  } else {
    header('Location: ../public/todas_tarefas.php');
  }
}
