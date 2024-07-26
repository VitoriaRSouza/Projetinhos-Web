<?php
include_once "Funcionario.php";
include_once "Conexao.php";

class FuncionarioDao {
function inserir( Funcionario $funcionario ) {
  global $conn;
  $sql = $conn->prepare("INSERT INTO FUNCIONARIOS VALUES(?,?,?,?)");
  $sql->bind_param("issd",$p1,$p2,$p3,$p4);
  $p1 = $funcionario->getRe();
  $p2 = $funcionario->getNome();
  $p3 = $funcionario->getDataNascimento();
  $p4 = $funcionario->getSalario();
  $sql->execute();
  if($sql->affected_rows>0) {
    return true;
  }

}

function excluir( $funcionario ) {
    global $conn;
    $sql = $conn->prepare("DELETE FROM FUNCIONARIOS WHERE RE=?");
    $sql->bind_param("i",$p1);
    $p1 = $funcionario->getRe();
    $sql->execute();
    if($sql->affected_rows>0) {
      return true;
    }
}

function alterar( $funcionario ) {  }

function lista() {
  global $conn;
  $sql = "SELECT re,nome,dataNascimento,salario FROM Funcionarios"
  $result = mysqli_query($conn,$sql);
  $lista = array();
  while ($row = $result ->fetch_assoc())
    array_push($lista, new Funcionario($row["re"],$row["nome"],$row["dataNascimento"],$row["salario"]));
  return $lista;
}

function buscarPeloRe( $re ) { 
  global $conn;
  $nome ="";
  $dataNascimento="";
  $salario=0.0;
  $sql = "SELECT * FROM Funcionarios WHERE re=?";
  $query= $conn->prepare($sql);
  $result=$query->bind_param("i",$re);
  $query->execute();
  $query->bind_result($re,$nome,$dataNascimento,$salario);
  if($query->fetch()) {
    return new Funcionario($re,$nome,$dataNascimento,$salario)
  }
}
}

?>