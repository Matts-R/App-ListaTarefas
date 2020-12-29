<?php

class TarefaService {
  private $conexao;

  public function __construct($conexao, $tarefa = null) {
    $this->conexao = $conexao;
  }

  public function inserir($tarefa) {
    $query = "INSERT INTO Tarefas (tarefa) 
    VALUES (?)";
    $statment = $this->conexao->prepare($query);
    $statment->bindValue(1, $tarefa);

    $statment->execute();
  }

  public function recuperar() {
    $query = "SELECT t.id, t.id_status, st.status , t.tarefa 
    FROM Tarefas AS t
    LEFT JOIN Status AS st 
    ON (t.id_status = st.id)";

    $statement = $this->conexao->prepare($query);

    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function atualizar($tarefa, $id) {
    $query = 'UPDATE Tarefas
    SET tarefa = ?
    WHERE id = ? ';

    $statement = $this->conexao->prepare($query);
    $statement->bindValue(1, $tarefa);
    $statement->bindValue(2, $id);

    $statement->execute();
  }

  public function remover($id) {
    $query = 'DELETE 
    FROM Tarefas 
    WHERE id = ?';

    $statement = $this->conexao->prepare($query);
    $statement->bindValue(1, $id);

    $statement->execute();
  }

  public function atualizaStatus($id) {
    $query = 'UPDATE Tarefas
    SET id_status = 2
    WHERE id = ? ';

    $statement = $this->conexao->prepare($query);
    $statement->bindValue(1, $id);

    $statement->execute();
  }
}
