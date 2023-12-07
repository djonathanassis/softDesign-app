# Desafio técnico

## Descrição

Criar uma aplicação web em PHP com acesso restrito, que exiba uma listagem de livros com as opções de ver os detalhes,
editar, deletar e criar um livro, e também exiba o clima atual da sua região.

Após o término da prova, colocar o código em algum repositório público (github, gitlab, bitbucket.. ) 
e então informar nas respostas o caminho onde está a prova para avaliação respondendo o email.

## Requisitos

### Tecnologias:
  * PHP 8.2;
  * Symfony 6.4;
  * Banco de dados MySql;
  * Docker;

### Desafio:
1) Tela de Login
   * A tela inicial deve ser a de login;
   * Não deve ser possível acessar outras telas sem realizar o login;

2) CRUD de Livros
   * Listagem de livros com paginação e filtragem;
   * Adição e Edição de Livros;
   * Dados do Livro
   * Título;
   * Descrição;
   * Autor;
   * Número de Páginas;
   * Data de Cadastro;
   * Exclusão de um livro.

3) Clima da região
   * Integração com API externa para exibir o clima de uma determinada região;
   * Mostrar apenas o Clima atual.
   * API https://hgbrasil.com/status/weather. Consultar documentação https://console.hgbrasil.com/documentation/weather.

    
## Instalando o projeto

O projeto se utiliza de contêineres Docker, através do pacote *Laravel Sail* para facilitar a configuração do ambiente de desenvolvimento. Portanto, é necessário que já possua o Docker e o Docker Compose instalados na máquina.

### Passos para o rodar o projeto localmente:

- Faça um clone do projeto para sua máquina local
```shell
git clone https://github.com/djonathanassis/softDesign-app.git
```

O projeto pode ser instalado e executado usando Docker e docker-compose.
Para instalar o Docker, visite sua [página oficial](https://docs.docker.com/engine/install/). 
E para instalar o docker-compose, siga [estas etapas](https://docs.docker.com/compose/install/). 
Para ajudar a gerenciar o projeto e executar comandos de forma mais rápida, existe um conjunto de alvos [Make](https://www.gnu.org/software/make/)já configurados.

Configure e execute o projeto apenas executando um dos seguintes conjuntos de comandos:

```sh
make start
```

ou

```sh
sh docker/setup.sh
docker-compose build --pull --no-cache
docker-compose up --detach
```

