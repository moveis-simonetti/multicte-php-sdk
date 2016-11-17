<?php

namespace Tests\IntegracaoCTe;

require_once dirname(__DIR__) . '/../vendor/autoload.php';

$integracao = new IntegracaoCteTest();
$integracao->testIntegrarCTe();

//$integracao->testBuscarPorCodigoCTe();

//$integracao->testAlterarDadosCTe();