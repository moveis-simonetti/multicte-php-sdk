<?php

namespace Simonetti\MultiCTe\Soap;


/**
 * Class IntegracaoMDFe
 * @package Simonetti\MultiCTe
 */
class IntegracaoMDFe extends \SoapClient
{
    CONST STATUS_ENVIADO = 'Enviado';
    CONST STATUS_AUTORIZADO = 'Autorizado';
    CONST STATUS_CANCELADO = 'Cancelado';
    CONST STATUS_ENCERRADO = 'Encerrado';
    CONST STATUS_PENDENTE = 'Pendente';
    CONST STATUS_REJEICAO = 'Rejeicao';
    CONST STATUS_EM_DIGITACAO = 'EmDigitacao';
    CONST STATUS_EM_CANCELAMENTO = 'EmCancelamento';
    CONST STATUS_EM_ENCERRAMENTO = 'EmEncerramento';


    /**
     * @param array $parameters
     * @return \stdClass
     */
    public function buscarPorCodigoMDFe(array $parameters)
    {
        return $this->__soapCall('BuscarPorCodigoMDFe', $parameters);
    }
}