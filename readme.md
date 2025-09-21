# Sistema de Usuários e Autenticação

* Sistema de autenticação simples aplicando os conceitos que aprendemos em sala. 

### Funcionalidades Implementadas

* **Cadastro de Usuário**: Valida o e-mail (não duplicado e com formato válido), e a senha (forte: mín. 8 caracteres, 1 número, 1 maiúscula). A senha é armazenada com hash seguro (`password_hash`).
* **Login de Usuário**: Autentica o usuário verificando o e-mail e a senha fornecidos, usando `password_verify` para a checagem da senha. Retorna uma mensagem de sucesso ou falha.
* **Reset de Senha**: Permite atualizar a senha de um usuário existente, aplicando as mesmas regras de senha forte e gerando um novo hash.

### Casos de Uso (Testes)

* **Caso 1**: Cadastro de usuário válido.
* **Caso 2**: Tentativa de cadastro com e-mail inválido.
* **Caso 3**: Tentativa de login com senha incorreta.
* **Caso 4**: Reset de senha válido.
* **Caso 5**: Tentativa de cadastro de usuário com e-mail já em uso.


### Como Rodar o Projeto

1.  Clone o repositório ou baixe o código-fonte para o seu computador.
2.  Coloque a pasta do projeto (ex: `usuarios`) dentro do diretório `htdocs` do seu XAMPP.
3.  Inicie o servidor **Apache** no painel de controle do XAMPP.
4.  Abra seu navegador e acesse o projeto através do URL: `http://localhost/nome-da-pasta/index.php`.