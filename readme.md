# Integração com a MultiCTe

Esse SDK é responsável pela integração com o MultiCTe e nele são implemetadas as classes e os métodos para tal.

## Classes Implementadas

Foram implementadas classes para cada objeto necessário descrito nas WSDLs disponbilizadas:
* http://homo.multicte.com.br/WebServiceIntegracao/ConhecimentoDeTransporteEletronico.svc/definitions?wsdl
* http://homo.multicte.com.br/WebServiceIntegracao/IntegracaoCTe.svc/definitions?wsdl
* http://homo.multicte.com.br/WebServiceIntegracao/ManifestoEletronicoDeDocumentosFiscais.svc/definitions?wsdl
* http://homo.multicte.com.br/WebServiceIntegracao/IntegracaoMDFe.svc/definitions?wsdl

Além das classes referentes aos objetos foram implementadas as seguintes classes:
 * ManifestoEletronicoDeDocumentosFiscais
 * ConhecimentoDeTransporteEletronico
 * IntegracaoCTe
 * IntegracaoMDFe

Essas são referentes a cada arquivo WSDL e apresentam os métodos que realizam a comunicação com os servidores de 
integração sendo eles:
1. ManifestoEletronicoDeDocumentosFiscais:
    * integrarMDFePorCTes
    * encerrarMDFe
    * cancelarMDFe
2. ConhecimentoDeTransporteEletronico:
    * integrarCTe
    * alterarDadosCTe
    * reenviarCTe
3. IntegracaoCTe:
    * buscarPorCodigoCTe
4. IntegracaoMDFe:
    * buscarPorCodigoMDFe
    
## Testes

Existem duas classes de teste uma para cada tipo de integração(MDF-e e CT-e) que testam cada método de integração
implementado dentro do diretório /tests.
