<?php

class Conexao {
  private  static $host = "localhost";
  private static $dbname = "AppListaTarefas";
  private static $user = "root";
  private static $password = "";
  public static ?PDO $conexao = null;

  private static function conectar() {
    try {
      self::$conexao = new \PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
    } catch (\Exception $e) {
      echo "<p>" . $e->getMessage() . "</pre>";
    }
  }

  public static function getConexao() {
    if (self::$conexao === null) {
      self::conectar();
      return self::$conexao;
    }
    echo "<p> Já existe uma conexão com o banco de dados </p>";
    exit;
  }
}
