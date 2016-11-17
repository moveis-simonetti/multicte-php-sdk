<?php
/**
 * Created by PhpStorm.
 * User: wagner
 * Date: 14/11/16
 * Time: 16:35
 */

namespace Simonetti\MultiCTe\Soap;


class cte
{
    /**
     * @var int
     */
    public $CFOP;

    /**
     * @var int
     */
    public $CodigoIBGECidadeInicioPrestacao;

    /**
     * @var int
     */
    public $CodigoIBGECidadeTerminoPrestacao;

    /**
     * @var ComponentesDaPrestacao
     */
    public $ComponentesDaPrestacao;

    /**
     * @var \DateTime
     */
    public $DataPrevistaEntrega;

    /**
     * @var Cliente
     */
    public $Destinatario;

    /**
     * @var Documentos
     */
    public $Documentos;

    /**
     * @var Empresa
     */
    public $Emitente;

    /**
     * @var Imposto
     */
    public $ICMS;

    /**
     * @var bool
     */
    public $IncluirICMSNoFrete;

    /**
     * @var string
     */
    public $Lotacao;

    /**
     * @var Motorista
     */
    public $Motoristas;

    /**
     * @var int
     */
    public $NumeroCarga;

    /**
     * @var int
     */
    public $NumeroUnidade;

    /**
     * @var string
     */
    public $ObservacoesGerais;

    /**
     * @var string
     */
    public $ProdutoPredominante;

    /**
     * @var QuantidadesCarga
     */
    public $QuantidadesCarga;

    /**
     * @var Cliente
     */
    public $Remetente;

    /**
     * @var String
     */
    public $Retira;

    /**
     * @var Seguro
     */
    public $Seguros;

    /**
     * @var string
     */
    public $TipoCTe;

    /**
     * @var string
     */
    public $TipoImpressao;

    /**
     * @var string
     */
    public $TipoPagamento;

    /**
     * @var string
     */
    public $TipoServico;

    /**
     * @var string
     */
    public $TipoTomador;

    /**
     * @var float
     */
    public $ValorAReceber;

    /**
     * @var float
     */
    public $ValorFrete;

    /**
     * @var float
     */
    public $ValorTotalMercadoria;

    /**
     * @var float
     */
    public $ValorTotalPrestacaoServico;

    /**
     * @var Veiculo
     */
    public $Veiculos;
}