# PerfectPay Challenge

## Desafio DEV Sênior

### Objetivo

Processar pagamentos no ambiente de homologação do Mercado Pago.


### Documentação

- https://www.mercadopago.com.br/developers/pt/guides/payments/api/introduction/


### Credenciais de teste

- Public Key
- Access Token


### Descrição

- basicamente, o sistema deve ter um formulário com inputs necessários para processar o pagamento
e um botão 'finalizar pagamento', e se o pagamento der certo direcionar para uma página de obrigado
- utilizar Laravel para o desenvolvimento
- não precisa de banco de dados
- processamento de pagamentos com boleto e cartão de crédito
- se o pagamento for boleto mostrar um botão com o link do boleto na página de obrigado
- não é necessário se importar com a qualidade do front, usar um bootstrap bem básico
- utilizar a biblioteca PHP desenvolvida pelo Mercado Pago
  - https://www.mercadopago.com.br/developers/pt/guides/sdks/official/php/

### Problemas Encontrados com a SDK do Mercado Livre
> Devido a problemas no código fonte do SDK, o comando "composer install" apresenta vários _warnings_

- Não atendimento do PRS-4 (_autoloading standard_)
- Incompatibilidade com Composer 2
- Discussions relacionadas
  - https://github.com/mercadopago/sdk-php/discussions/332
    - SDK does not comply with PSR4 standard
	  - _"It is on the roadmap and we are working on it, but we currently don't have an ETA for launching the new version"_
    - segundo esta _discussion_ o problema será resolvido na versão 3 do SDK, que não tem data de previsão de lançamento
  - https://github.com/mercadopago/sdk-php/discussions/400
    - Ao requisitar via composer da essa notificação de erro de classes
  - https://github.com/mercadopago/sdk-php/discussions/320
    - Warnings no Composer - PSR4
  - https://github.com/mercadopago/sdk-php/discussions/352
    - Integração com Laravel?
