<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>RE</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Salário</th>
        </tr>
    </table>

<?php

include_once "FuncionarioDao.php";
include_once "Funcionario.php";
$dao = new FuncionarioDao();
$lista = $dao->lista();
$formato = "Y-m-d";
$formatter = new NumberFormatter('pt-BR', NumberFormatter::CURRENCY);
foreach($lista as $f){
    $dataNascimento=DateTime::createFromFormat($formato, $f->getDataNascimento());
    echo "<tr><td>".$f->getRe(). "</td>";
    echo "<td>".$f->getNome(). "<td>";
    echo "<td>".$dataNascimento->format("d/m/Y"). "</td>";
    echo "<td>".$formatter->formatCurrency($f->getSalario(), "BRL").
        "</td></tr>"
}

?>

</body>
</html>