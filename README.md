# Ambiente Docker com MySQL, API Node.js e Frontend PHP

## Passos para Rodar com Docker

1. Certifique-se de ter o Docker e o Docker Compose instalados e também o Docker Desktop aberto.
2. Clone este repositório.
3. No diretório raiz, execute (OBS: se puder tenta usar o Terminal PowerShell do Visual Studio Code):
   ```bash
   docker-compose up --build
4. Caso queira destruir: apenas vai no diretório raiz, execute:
   ```bash
   docker-compose down --rmi all

### Sobre o Sistema:

1. Resumo do Sistema
Este sistema é uma aplicação completa baseada em contêineres, que combina uma API REST desenvolvida em Node.js, um frontend em PHP e um banco de dados MySQL, orquestrados com Docker Compose. A seguir, destacamos os principais componentes e funcionalidades do projeto:

2. Arquitetura do Sistema
- API Node.js: Desenvolvida com Express e Sequelize para comunicação com o banco de dados.
Oferece endpoints para gerenciar usuários (GET, POST, PUT, DELETE).
Utiliza o ORM Sequelize para abstração e manipulação do banco de dados MySQL.

- Frontend PHP: Interage com a API Node.js utilizando requisições HTTP.
Oferece uma interface amigável para cadastro, atualização e exclusão de usuários.
Desenvolvido com foco em responsividade e boa usabilidade.

- Banco de Dados MySQL: Armazena informações dos usuários (nome e email).
Inicializado com um script SQL que cria a tabela e insere dados de exemplo.

- Docker Compose: Orquestra os três serviços (MySQL, API Node.js e frontend PHP).

Garante fácil configuração e execução do ambiente de desenvolvimento.

3. Como Funciona: O frontend PHP permite que os usuários visualizem e manipulem dados via formulário.
As ações no frontend geram requisições para a API Node.js, que processa as operações e interage com o banco de dados MySQL.
A integração entre os serviços ocorre em uma rede Docker compartilhada, garantindo comunicação entre os contêineres.
Recursos Principais

4. Gerenciamento de Usuários:
- Cadastro de novos usuários.
- Atualização de informações existentes.
- Exclusão de usuários.
- Listagem completa de usuários.

5. Arquitetura Modular: Separação clara entre frontend, backend e banco de dados.

6. Fácil Implantação: Utilização de contêineres Docker para simplificar o setup.

Com esta estrutura, o sistema é flexível, escalável e ideal para aprender sobre integração de tecnologias modernas como Node.js, PHP, MySQL e Docker.
