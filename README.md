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
