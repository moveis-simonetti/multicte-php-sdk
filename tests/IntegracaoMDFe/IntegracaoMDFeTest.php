<?php

namespace Tests\IntegracaoMDFe;


use Simonetti\MultiCTe\Soap\BuscarPorCodigoMDFe;
use Simonetti\MultiCTe\Soap\CancelarMDFe;
use Simonetti\MultiCTe\Soap\EncerrarMDFe;
use Simonetti\MultiCTe\Soap\IntegracaoMDFe;
use Simonetti\MultiCTe\Soap\IntegrarMDFePorCTes;
use Simonetti\MultiCTe\Soap\ManifestoEletronicoDeDocumentosFiscais;

class IntegracaoMDFeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ManifestoEletronicoDeDocumentosFiscais
     */
    private $manifestoEletronicoDeDocumentosFiscais;

    /**
     * @var IntegracaoMDFe
     */
    private $integracaoMDFe;

    /**
     * @var string
     */
    private $token;

    public function setUp()
    {
        $this->manifestoEletronicoDeDocumentosFiscais = new ManifestoEletronicoDeDocumentosFiscais('http://191.234.187.10/Homolog/WebServiceIntegracaoCTe/ManifestoEletronicoDeDocumentosFiscais.svc/definitions?singlewsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);
        $this->integracaoMDFe = new IntegracaoMDFe('http://191.234.187.10/Homolog/WebServiceIntegracaoCTe/IntegracaoMDFe.svc/definitions?singlewsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);
        $this->token = '7985b2ad-647c-438e-a6c2-9854d425c49d';
    }

    public function testDeveriaGerarMDFeSemErro()
    {
        $mdfe = new IntegrarMDFePorCTes();

        $mdfe->codigosCTes = [55];
        $mdfe->cnpjEmpresaEmitente = '25255622000191';
        $mdfe->cnpjEmpresaPai = '13969629000196';
        $mdfe->token = $this->token;

        $retorno = $this->manifestoEletronicoDeDocumentosFiscais->integrarMDFePorCTes(['IntegrarMDFePorCTes' => $mdfe]);

        var_dump($retorno);

        $this->assertStringEndsWith('integrado com sucesso! ', $retorno->IntegrarMDFePorCTesResult->Mensagem);
        $this->assertTrue($retorno->IntegrarMDFePorCTesResult->Status);
        $this->assertEquals('integer', gettype($retorno->IntegrarMDFePorCTesResult->Objeto));
    }

    /**
     * @expectedException \Exception
     */
    public function testDeveriaGerarExceptionDevidoCodigoCTe()
    {
        $mdfe = new IntegrarMDFePorCTes();

        $mdfe->codigosCTes = [-1];
        $mdfe->cnpjEmpresaEmitente = '25255622000191';
        $mdfe->cnpjEmpresaPai = '13969629000196';
        $mdfe->token = $this->token;

        $retorno = $this->manifestoEletronicoDeDocumentosFiscais->integrarMDFePorCTes(['IntegrarMDFePorCTes' => $mdfe]);
    }


    public function testDeveriaBuscarPorCodigoMDFeSemErro()
    {
        $busca = new BuscarPorCodigoMDFe();
        $busca->codigoMDFe = 18;
        $busca->tipoIntegracao = 'Emissao';
        $busca->tipoRetorno = 'XML_PDF';
        $busca->token = $this->token;

        $retorno = $this->integracaoMDFe->buscarPorCodigoMDFe(['BuscarPorCodigoMDFe' => $busca]);

        $this->assertInstanceOf(\stdClass::class, $retorno);
        $this->assertTrue($retorno->BuscarPorCodigoMDFeResult->Status);
        $this->assertInstanceOf(\stdClass::class, $retorno->BuscarPorCodigoMDFeResult->Objeto);
        $this->assertEquals(IntegracaoMDFe::STATUS_AUTORIZADO, $retorno->BuscarPorCodigoMDFeResult->Objeto->StatusMDFe);

    }

    public function testDeveriaTrazerStatusMDFeRejeitado()
    {
        $busca = new BuscarPorCodigoMDFe();
        $busca->codigoMDFe = 4;
        $busca->tipoIntegracao = 'Emissao';
        $busca->tipoRetorno = 'XML_PDF';
        $busca->token = $this->token;

        $retorno = $this->integracaoMDFe->buscarPorCodigoMDFe(['BuscarPorCodigoMDFe' => $busca]);

        $this->assertInstanceOf(\stdClass::class, $retorno);
        $this->assertTrue($retorno->BuscarPorCodigoMDFeResult->Status);
        $this->assertInstanceOf(\stdClass::class, $retorno->BuscarPorCodigoMDFeResult->Objeto);
        $this->assertEquals(IntegracaoMDFe::STATUS_REJEICAO, $retorno->BuscarPorCodigoMDFeResult->Objeto->StatusMDFe);

    }

    /**
     * @expectedException \Exception
     */
    public function testDeveriaGerarExceptionAoEncerrarMDFeDevidoStatusMDFe()
    {
        $encerramento = new EncerrarMDFe();
        $encerramento->codigoMDFe = 16;
        $encerramento->cnpjEmpresaAdministradora = '13969629000196';
        $encerramento->codigoIBGEMunicipioEncerramento = 1504422;
        $encerramento->dataHoraEncerramento = '25/11/2016 12:00';
        $encerramento->token = $this->token;

        $retorno = $this->manifestoEletronicoDeDocumentosFiscais->encerrarMDFe(['EncerrarMDFe' => $encerramento]);
    }


    /**
     * @expectedException \Exception
     */
    public function testDeveriaLancasrExceptionAoCancelarMDFeDevidoMDFeJaCancelado()
    {
        $cancelamento = new CancelarMDFe();
        $cancelamento->codigoMDFe = 17;
        $cancelamento->cnpjEmpresaAdministradora = '13969629000196';
        $cancelamento->justificativa = 'TESTE DE CANCELAMENTO DO MDFE';
        $cancelamento->token = $this->token;


        $retorno = $this->manifestoEletronicoDeDocumentosFiscais->cancelarMDFe(['CancelarMDFe' => $cancelamento]);
    }

}