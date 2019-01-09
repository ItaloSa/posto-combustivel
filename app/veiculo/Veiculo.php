<?php

namespace app\veiculo;

use app\pessoa\Pessoa as Pessoa;


class Veiculo {
    private $placa;
    private $marca;
    private $modelo;
    private $pessoaLogin;

    public function json() {
        $this->pessoaLogin = $this->getPessoa().getLogin()->json();
        return get_object_vars($this);
    }

    public function getPlaca(): string {
        return $this->placa;
    }

    public function setPlaca(string $placa) {
        $this->placa = $placa;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function setMarca(string $marca) {
        $this->marca = $marca;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function setModelo(string $modelo) {
        $this->modelo = $modelo;
    }

    public function getPessoaLogin(): string {
        return $this->pessoaLogin;
    }

    public function setPessoaLogin(string $pessoaLogin) {
        $this->pessoaLogin = $pessoaLogin;
    }







}