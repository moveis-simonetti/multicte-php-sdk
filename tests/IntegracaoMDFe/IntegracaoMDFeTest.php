<?php

namespace Tests\IntegracaoMDFe;


use Simonetti\MultiCTe\Soap\BuscarPorCodigoMDFe;
use Simonetti\MultiCTe\Soap\CancelarMDFe;
use Simonetti\MultiCTe\Soap\EncerrarMDFe;
use Simonetti\MultiCTe\Soap\IntegracaoMDFe;
use Simonetti\MultiCTe\Soap\IntegrarMDFePorCTes;
use Simonetti\MultiCTe\Soap\ManifestoEletronicoDeDocumentosFiscais;

class IntegracaoMDFeTest
{
    public function testIntegrarMDFePorCTes()
    {
        try {
            $mdfe = new IntegrarMDFePorCTes();

            $mdfe->codigosCTes = [277303];
            $mdfe->cnpjEmpresaEmitente = '25255622000191';
            $mdfe->cnpjEmpresaPai = '13969629000196';


            $integrarMDFe = new ManifestoEletronicoDeDocumentosFiscais('http://homo.multicte.com.br/WebServiceIntegracao/ManifestoEletronicoDeDocumentosFiscais.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);

            $retorno = $integrarMDFe->integrarMDFePorCTes(['IntegrarMDFePorCTes' => $mdfe]);

            var_dump($retorno);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function testBuscarPorCodigoMDFe()
    {
        $busca = new BuscarPorCodigoMDFe();
        $busca->codigoMDFe = 66450;
        $busca->tipoIntegracao = 'Emissao';
        $busca->tipoRetorno = 'XML_PDF';

        $buscaMDFe = new IntegracaoMDFe('http://homo.multicte.com.br/WebServiceIntegracao/IntegracaoMDFe.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);
        $retorno = $buscaMDFe->buscarPorCodigoMDFe(['BuscarPorCodigoMDFe' => $busca]);

        var_dump($retorno);

    }

    public function testEncerrarMDFe()
    {
        try{
            $encerramento = new EncerrarMDFe();
            $encerramento->codigoMDFe = 66450;
            $encerramento->cnpjEmpresaAdministradora = '13969629000196';
            $encerramento->codigoIBGEMunicipioEncerramento = 1504422;
            $encerramento->dataHoraEncerramento = '25/11/2016 12:00';

            $encerrarMDFe = new ManifestoEletronicoDeDocumentosFiscais('http://homo.multicte.com.br/WebServiceIntegracao/ManifestoEletronicoDeDocumentosFiscais.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);

            $retorno = $encerrarMDFe->encerrarMDFe(['EncerrarMDFe' => $encerramento]);

            var_dump($retorno);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function testCancelarMDFe()
    {
        try {
            $cancelamento = new CancelarMDFe();
            $cancelamento->codigoMDFe = 66451;
            $cancelamento->cnpjEmpresaAdministradora = '13969629000196';
            $cancelamento->justificativa = 'TESTE DE CANCELAMENTO DO MDFE';

            $integrarMDFe = new ManifestoEletronicoDeDocumentosFiscais('http://homo.multicte.com.br/WebServiceIntegracao/ManifestoEletronicoDeDocumentosFiscais.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);
            $retorno = $integrarMDFe->cancelarMDFe(['CancelarMDFe' => $cancelamento]);

            var_dump($retorno);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}