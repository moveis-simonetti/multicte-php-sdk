<?php
namespace Simonetti\MultiCTe;

/**
 * Interface Motorista
 * @package Simonetti\MultiCTe
 */
interface Motorista
{
    public function getCpf();

    public function getNome() : string;
}