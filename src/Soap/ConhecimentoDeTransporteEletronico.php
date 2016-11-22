<?php

namespace Simonetti\MultiCTe\Soap;


/**
 * Class ConhecimentoDeTransporteEletronico
 * @package Simonetti\MultiCTe
 */
class ConhecimentoDeTransporteEletronico extends \SoapClient
{
    private static $classmap = [
        "cte" => "CTe"
    ];

    public function __construct($wsdl, array $options = array())
    {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }

        parent::__construct($wsdl, $options);
    }

    /**
     * @param array $parameters
     * @return \stdClass
     * @throws \Exception
     */
    public function integrarCTe(array $parameters)
    {
        $retorno = $this->__soapCall('IntegrarCTe', $parameters);

        if (!$retorno->IntegrarCTeResult->Status) {
            throw new \Exception('Erro ao emitir CT-e : ' . $retorno->IntegrarCTeResult->Mensagem . "\n");
        }

        return $retorno;
    }

    /**
     * @param array $parameters
     * @return \stdClass
     * @throws \Exception
     */
    public function alterarDadosCTe(array $parameters)
    {
        $retorno = $this->__soapCall('AlterarCTe', $parameters);

        if (!$retorno->AlterarCTeResult->Status) {
            throw new \Exception('Erro ao alterar CT-e : ' . $retorno->AlterarCTeResult->Mensagem . "\n");
        }

        return $retorno;
    }

    /**
     * @param array $parameters
     * @return \stdClass
     * @throws \Exception
     */
    public function reenviarCTe(array $parameters)
    {
        $retorno = $this->__soapCall('AlterarCTe', $parameters);

        if (!$retorno->AlterarCTeResult->Status) {
            throw new \Exception('Erro ao reenviar CT-e : ' . $retorno->AlterarCTeResult->Mensagem . "\n");
        }

        return $retorno;
    }
}