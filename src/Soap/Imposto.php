<?php

namespace Simonetti\MultiCTe\Soap;

/**
 * Class Imposto
 * @package Simonetti\MultiCTe\Soap
 */
class Imposto
{
    /**
     * @var float
     */
    public $Aliquota;

    /**
     * @var float
     */
    public $BaseCalculo;

    /**
     * @var string
     */
    public $CST;

    /**
     * @var float
     */
    public $PercentualReducaoBaseCalculo;

    /**
     * @var float
     */
    public $Valor;

    /**
     * @var float
     */
    public $ValorCreditoPresumido;

    /**
     * @var float
     */
    public $ValorDevido;
}