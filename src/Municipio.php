<?php
namespace Simonetti\MultiCTe;

/**
 * Interface Municipio
 * @package Simonetti\MultiCTe
 */
interface Municipio
{
    public function getCep() : string ;

    public function getNome() : string;

    public function getCodigoIBGE() : int;

    public function getCodigoPais() : int;

}