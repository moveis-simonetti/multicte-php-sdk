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
     * @return mixed
     * @throws \Exception
     */
    public function buscarPorCodigoCTe(array $parameters)
    {
        $retorno = $this->__soapCall('BuscarPorCodigoCTe', $parameters);

        if (!$retorno->BuscarPorCodigoCTeResult->Status) {
            throw new \Exception('Erro ao buscar CT-e : ' . $retorno->BuscarPorCodigoCTeResult->Mensagem . "\n");
        }

        return $retorno;
    }
}