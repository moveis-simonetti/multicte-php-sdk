<?php

namespace Tests\IntegracaoMDFe;

use Tests\IntegracaoMDFe\IntegracaoMDFeTest;

require_once dirname(__DIR__) . '/../vendor/autoload.php';

$integracao = new IntegracaoMDFeTest();
$integracao->testIntegrarMDFePorCTes();

//$integracao->testBuscarPorCodigoMDFe();

//$integracao->testEncerrarMDFe();

//$integracao->testCancelarMDFe();