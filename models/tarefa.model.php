<?php

class Tarefa {
  private $id;
  private $idStatus;
  private $tarefa;
  private $dataCadastro;

  public function __get($attribute) {
    return $this->$attribute;
  }

  public function __set($attribute, $value) {
    return $this->$attribute = $value;
  }
}
