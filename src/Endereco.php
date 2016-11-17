<?php
namespace Simonetti\MultiCTe;

interface Endereco
{
    public function getBairro() : string;

    public function getLogradouro() : string ;

    public function getComplemento() : ?string ;

    public function getNumero() : string;

    public function getMunicipio() : Municipio;
}