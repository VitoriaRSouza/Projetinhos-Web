<?php
class Funcionario {
    private $re;
    private $nome;
    private $dataNascimento;
    private $salario;

    function __construct($re,$nome,$dataNascimento,$salario) {
        $this->re = $re;
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->salario = $salario; 
    }

    function getRe() {
        return $this->re;
    }
    function setRe($re) {
        $this->re = $re;
    }
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function getDataNascimento() {
        return $this->dataNascimento;
    }
    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }
    function getSalario() {
        return $this->salario;
    }
    function setSalario($salario) {
        $this->salario = $salario;
    }
}