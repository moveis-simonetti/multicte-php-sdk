<?php

namespace Simonetti\MultiCTe\Soap;

/**
 * Class ManifestoEletronicoDeDocumentosFiscais
 * @package Simonetti\MultiCTe\Soap
 */
class ManifestoEletronicoDeDocumentosFiscais extends \SoapClient
{
    /**
     * @param array $parameters
     * @return \stdClass
     * @throws \Exception
     */
    public function integrarMDFePorCTes(array $parameters)
    {
        $retorno = $this->__soapCall('IntegrarMDFePorCTes', $parameters);

        if (!$retorno->IntegrarMDFePorCTesResult->Status) {
            throw new \Exception('Erro ao emitir MDF-e : ' . $retorno->IntegrarMDFePorCTesResult->Mensagem. "\n");
        }

        return $retorno;
    }

    /**
     * @param array $parameters
     * @return \stdClass
     * @throws \Exception
     */
    public function encerrarMDFe(array $parameters)
    {
        $retorno = $this->__soapCall('EncerrarMDFe', $parameters);

        if (!$retorno->EncerrarMDFeResult->Status) {
            throw new \Exception('Erro ao encerrar MDF-e : ' . $retorno->EncerrarMDFeResult->Mensagem. "\n");
        }

        return $retorno;
    }

    /**
     * @param array $parameters
     * @return \stdClass
     * @throws \Exception
     */
    public function cancelarMDFe(array $parameters)
    {
        $retorno = $this->__soapCall('CancelarMDFe', $parameters);

        if (!$retorno->CancelarMDFeResult->Status) {
            throw new \Exception('Erro ao cancelar MDF-e : ' . $retorno->CancelarMDFeResult->Mensagem. "\n");
        }

        return $retorno;
    }

}