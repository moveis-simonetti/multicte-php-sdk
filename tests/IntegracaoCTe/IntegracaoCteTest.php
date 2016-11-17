<?php

namespace Tests\IntegracaoCTe;


use Simonetti\MultiCTe\Soap\AlterarCTe;
use Simonetti\MultiCTe\Soap\cte;
use Simonetti\MultiCTe\Soap\IntegracaoCTe;
use Simonetti\MultiCTe\Soap\BuscarPorCodigoCTe;
use Simonetti\MultiCTe\Soap\ConhecimentoDeTransporteEletronico;
use Simonetti\MultiCTe\Soap\Cliente;
use Simonetti\MultiCTe\Soap\ComponentesDaPrestacao;
use Simonetti\MultiCTe\Soap\Documentos;
use Simonetti\MultiCTe\Soap\Empresa;
use Simonetti\MultiCTe\Soap\Imposto;
use Simonetti\MultiCTe\Soap\IntegrarCTe;
use Simonetti\MultiCTe\Soap\Motorista;
use Simonetti\MultiCTe\Soap\QuantidadesCarga;
use Simonetti\MultiCTe\Soap\Seguro;
use Simonetti\MultiCTe\Soap\Veiculo;

class IntegracaoCteTest
{
    public function testIntegrarCTe()
    {
        try {
            $integrarCTe = new IntegrarCTe();

            $integrarCTe->cte = new cte();

            $integrarCTe->cte->CFOP = 6932;
            $integrarCTe->cte->CodigoIBGECidadeInicioPrestacao = 3204104;
            $integrarCTe->cte->CodigoIBGECidadeTerminoPrestacao = 1504422;

            $componentesPrestacao = new ComponentesDaPrestacao();
            $componentesPrestacao->Descricao = 'PEDAGIO';
            $componentesPrestacao->IncluiBaseCalculoICMS = 'true';
            $componentesPrestacao->IncluiValorAReceber = 'true';
            $componentesPrestacao->Valor = 0.0;

            $integrarCTe->cte->ComponentesDaPrestacao = $componentesPrestacao;

            $integrarCTe->cte->DataPrevistaEntrega = '15/11/2016';

            $destinatario = new Cliente();
            $destinatario->Bairro = 'JDIM STA FRANCISCA';
            $destinatario->CEP = '67200000';
            $destinatario->CPFCNPJ = '01838723026355';
            $destinatario->CodigoAtividade = 2;
            $destinatario->CodigoIBGECidade = 1504422;
            $destinatario->CodigoPais = 1058;
            $destinatario->Endereco = 'RUA DO URIBOCA VELHA';
            $destinatario->Exportacao = false;
            $destinatario->NomeFantasia = 'BRF S.A. FILIAL DE VENDAS BELE';
            $destinatario->Numero = '1158';
            $destinatario->IE = '152823697';
            $destinatario->RazaoSocial = 'BRF S.A';

            $integrarCTe->cte->Destinatario = $destinatario;

            $documento = new Documentos();
            $documento->ChaveNFE = '35160207170943004603551000001769801046971548';
            $documento->DataEmissao = '05/02/2016 13:32:33';
            $documento->Numero = 176980;
            $documento->Valor = 72554.04;

            $integrarCTe->cte->Documentos = [$documento];

            $emitente = new Empresa();
            $emitente->Atualizar = false;
            $emitente->CNPJ = '25255622000191';

            $integrarCTe->cte->Emitente = $emitente;

            $icms = new Imposto();
            $icms->Aliquota = 12.00;
            $icms->BaseCalculo = 1540.32;
            $icms->CST = '00';
            $icms->Valor = 184.84;

            $integrarCTe->cte->ICMS = $icms;

            $integrarCTe->cte->IncluirICMSNoFrete = 'Nao';

            $integrarCTe->cte->Lotacao = 'Sim';

            $motorista = new Motorista();
            $motorista->CPF = '03911009550';
            $motorista->Nome = 'FABRICIO BARBOSA';

            $integrarCTe->cte->Motoristas = [$motorista];

            $integrarCTe->cte->NumeroCarga = 5213;
            $integrarCTe->cte->NumeroUnidade = 10;

            $integrarCTe->cte->ObservacoesGerais = 'N.F.: 176980 CNF: 182071 CARGA: 537837 - CTE DE TESTE';
            $integrarCTe->cte->ProdutoPredominante = 'DIVERSOS';

            $quantidadesCarga = new QuantidadesCarga();
            $quantidadesCarga->Descricao = 'Kilogramas';
            $quantidadesCarga->Quantidade = 1000;
            $quantidadesCarga->UnidadeMedida = '01';

            $integrarCTe->cte->QuantidadesCarga = [$quantidadesCarga];

            $remetente = new Cliente();
            $remetente->Bairro = 'CENTRO';
            $remetente->CEP = '29980000';
            $remetente->CPFCNPJ = '31743818000128';
            $remetente->CodigoAtividade = 3;
            $remetente->CodigoIBGECidade = 3204104;
            $remetente->CodigoPais = 1058;
            $remetente->Endereco = 'R CARLOS CASTRO';
            $remetente->Exportacao = 0;
            $remetente->NomeFantasia = 'MOVEIS SIMONETTI';
            $remetente->Numero = '245 A';
            $remetente->IE = '081219199';
            $remetente->RazaoSocial = 'LOJAS SIMONETTI LTDA';

            $integrarCTe->cte->Remetente = $remetente;

            $retira = 'Nao';
            $integrarCTe->cte->Retira = $retira;

            $seguro = new Seguro();
            $seguro->Tipo = 'Remetente';

            $integrarCTe->cte->Seguros = [$seguro];

            $integrarCTe->cte->TipoCTe = 'Normal';
            $integrarCTe->cte->TipoTomador = 'Remetente';
            $integrarCTe->cte->TipoImpressao = 'Retrato';
            $integrarCTe->cte->TipoPagamento = 'Pago';
            $integrarCTe->cte->TipoServico = 'Normal';

            $integrarCTe->cte->ValorAReceber = 1560.32;
            $integrarCTe->cte->ValorFrete = 1540.32;
            $integrarCTe->cte->ValorTotalMercadoria = 72554.04;
            $integrarCTe->cte->ValorTotalPrestacaoServico = 1560.32;

            $veiculo = new Veiculo();
            $veiculo->Placa = 'FON2613';
            $veiculo->Renavam = '12345678911';
            $veiculo->UF = 'SC';

            $integrarCTe->cte->Veiculos = [$veiculo];

            $integrarCTe->cnpjEmpresaAdministradora = '13969629000196';

            $integracaoCTe = new ConhecimentoDeTransporteEletronico('http://homo.multicte.com.br/WebServiceIntegracao/ConhecimentoDeTransporteEletronico.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128, 'trace' => true]);
            $retorno = $integracaoCTe->integrarCTe(['IntegrarCTe' => $integrarCTe]);

            var_dump($retorno);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function testBuscarPorCodigoCTe()
    {
        $busca = new BuscarPorCodigoCTe();
        $busca->codigoCTe = 277303;
        $busca->tipoIntegracao = 'Emissao';
        $busca->tipoRetorno = 'XML_PDF';

        $buscaCTe = new IntegracaoCTe('http://homo.multicte.com.br/WebServiceIntegracao/IntegracaoCTe.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128]);
        $retorno = $buscaCTe->buscarPorCodigoCTe(['BuscarPorCodigoCTe' => $busca]);

        var_dump($retorno);

    }

    public function testReenviarCTe()
    {
        try {
            $alterarCTe = new AlterarCTe();

            $alterarCTe->codigoCTe = 277303;
            $alterarCTe->cnpjEmpresaAdministradora = '13969629000196';

            $integracaoCTe = new ConhecimentoDeTransporteEletronico('http://homo.multicte.com.br/WebServiceIntegracao/ConhecimentoDeTransporteEletronico.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128, 'trace' => true]);
            $retorno = $integracaoCTe->reenviarCTe(['AlterarCTe' => $alterarCTe]);

            var_dump($retorno);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function testAlterarDadosCTe()
    {
        try {
            $alterarCTe = new AlterarCTe();

            $alterarCTe->codigoCTe = 277303;
            $alterarCTe->cnpjEmpresaAdministradora = '13969629000196';

            $cte = new cte();

            $cte->CFOP = 6932;
            $cte->CodigoIBGECidadeInicioPrestacao = 3204104;
            $cte->CodigoIBGECidadeTerminoPrestacao = 1504422;

            $componentesPrestacao = new ComponentesDaPrestacao();
            $componentesPrestacao->Descricao = 'PEDAGIO';
            $componentesPrestacao->IncluiBaseCalculoICMS = 'true';
            $componentesPrestacao->IncluiValorAReceber = 'true';
            $componentesPrestacao->Valor = 0.0;

            $cte->ComponentesDaPrestacao = $componentesPrestacao;

            $cte->DataPrevistaEntrega = '15/11/2016';

            $destinatario = new Cliente();
            $destinatario->Bairro = 'JDIM STA FRANCISCA';
            $destinatario->CEP = '67200000';
            $destinatario->CPFCNPJ = '01838723026355';
            $destinatario->CodigoAtividade = 2;
            $destinatario->CodigoIBGECidade = 1504422;
            $destinatario->CodigoPais = 1058;
            $destinatario->Endereco = 'RUA DO URIBOCA VELHA';
            $destinatario->Exportacao = false;
            $destinatario->NomeFantasia = 'BRF S.A. FILIAL DE VENDAS BELE';
            $destinatario->Numero = '1158';
            $destinatario->IE = '152823697';
            $destinatario->RazaoSocial = 'BRF S.A';

            $cte->Destinatario = $destinatario;

            $documento = new Documentos();
            $documento->ChaveNFE = '35160207170943004603551000001769801046971548';
            $documento->DataEmissao = '05/02/2016 13:32:33';
            $documento->Numero = 176980;
            $documento->Valor = 72554.04;

            $cte->Documentos = [$documento];

            $emitente = new Empresa();
            $emitente->Atualizar = false;
            $emitente->CNPJ = '25255622000191';

            $cte->Emitente = $emitente;

            $icms = new Imposto();
            $icms->Aliquota = 12.00;
            $icms->BaseCalculo = 1540.32;
            $icms->CST = '00';
            $icms->Valor = 184.84;

            $cte->ICMS = $icms;

            $cte->IncluirICMSNoFrete = 'Nao';

            $cte->Lotacao = 'Sim';

            $motorista = new Motorista();
            $motorista->CPF = '03911009550';
            $motorista->Nome = 'FABRICIO BARBOSA';

            $cte->Motoristas = [$motorista];

            $cte->NumeroCarga = 5213;
            $cte->NumeroUnidade = 10;

            $cte->ObservacoesGerais = 'N.F.: 176980 CNF: 182071 CARGA: 537837 - CTE DE TESTE';
            $cte->ProdutoPredominante = 'DIVERSOS';

            $quantidadesCarga = new QuantidadesCarga();
            $quantidadesCarga->Descricao = 'Kilogramas';
            $quantidadesCarga->Quantidade = 1000;
            $quantidadesCarga->UnidadeMedida = '01';

            $cte->QuantidadesCarga = [$quantidadesCarga];

            $remetente = new Cliente();
            $remetente->Bairro = 'CENTRO';
            $remetente->CEP = '29980000';
            $remetente->CPFCNPJ = '31743818000128';
            $remetente->CodigoAtividade = 3;
            $remetente->CodigoIBGECidade = 3204104;
            $remetente->CodigoPais = 1058;
            $remetente->Endereco = 'R CARLOS CASTRO';
            $remetente->Exportacao = 0;
            $remetente->NomeFantasia = 'MOVEIS SIMONETTI';
            $remetente->Numero = '245 A';
            $remetente->IE = '081219199';
            $remetente->RazaoSocial = 'LOJAS SIMONETTI LTDA';

            $cte->Remetente = $remetente;

            $retira = 'Nao';
            $cte->Retira = $retira;

            $seguro = new Seguro();
            $seguro->Tipo = 'Remetente';

            $cte->Seguros = [$seguro];

            $cte->TipoCTe = 'Normal';
            $cte->TipoTomador = 'Remetente';
            $cte->TipoImpressao = 'Retrato';
            $cte->TipoPagamento = 'Pago';
            $cte->TipoServico = 'Normal';

            $cte->ValorAReceber = 1560.32;
            $cte->ValorFrete = 1540.32;
            $cte->ValorTotalMercadoria = 72554.04;
            $cte->ValorTotalPrestacaoServico = 1560.32;

            $veiculo = new Veiculo();
            $veiculo->Placa = 'FON2613';
            $veiculo->Renavam = '12345678911';
            $veiculo->UF = 'SC';

            $cte->Veiculos = [$veiculo];

            $alterarCTe->cte = $cte;



            $integracaoCTe = new ConhecimentoDeTransporteEletronico('http://homo.multicte.com.br/WebServiceIntegracao/ConhecimentoDeTransporteEletronico.svc/definitions?wsdl', ['proxy_host' => "192.168.111.70", 'proxy_port' => 3128, 'trace' => true]);
            $retorno = $integracaoCTe->alterarDadosCTe(['AlterarCTe' => $alterarCTe]);

            var_dump($retorno);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}