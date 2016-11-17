<?php

namespace Simonetti\MultiCTe;


interface Empresa
{
    public function getPessoa() : Pessoa;

    public function getRNTRC() : string;

    public function isOptanteSimplesNacional() : bool;
}