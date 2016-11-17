<?php

namespace Simonetti\MultiCTe;


interface Pessoa
{
    public function getCpfCnpj() : string;

    public function getIE() : ?string;

    public function getRazaoSocial() : string;

    public function getTelefones() : array;

    public function getEndereco() : Endereco;

    public function isExportacao() : bool;

    public function getCodigoAtividade() : int;
}