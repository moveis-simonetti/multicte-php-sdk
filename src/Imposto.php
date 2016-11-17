<?php

namespace Simonetti\MultiCTe;

/**
 * Interface Imposto
 * @package Simonetti\MultiCTe
 */
interface Imposto
{
    public function getAliquota() : float;

    public function getBaseCalculo() : float;

    public function getCST() : string;

    public function getValor() : float;

}