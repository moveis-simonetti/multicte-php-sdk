<?php

namespace Simonetti\MultiCTe\Soap;


/**
 * Class IntegracaoCTe
 * @package Simonetti\MultiCTe
 */
class IntegracaoCTe extends \SoapClient
{
    CONST STATUS_PENDENTE = 'P';
    CONST STATUS_ENVIADO = 'E';
    CONST STATUS_REJEICAO = 'R';
    CONST STATUS_AUTORIZADO = 'A';
    CONST STATUS_CANCELADO = 'C';
    CONST STATUS_INUTILIZADO = 'I';
    CONST STATUS_DENEGADO = 'D';
    CONST STATUS_EM_DIGITACAO = 'S';
    CONST STATUS_EM_CANCELAMENTO = 'K';
    CONST STATUS_EM_INUTILIZACAO = 'L';

    /**
     * @param array $parameters
     * @return \stdClass
     */
    public function buscarPorCodigoCTe(array $parameters)
    {
        return $this->__soapCall('BuscarPorCodigoCTe', $parameters);
    }
}