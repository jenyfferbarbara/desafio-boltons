# Desafio - Boltons

Uma aplicação Laravel 8 e banco de dados Postgres. 

Funcionalidades:
1. Integração com a API da arquivei
2. Persistência da Chave de Acesso e valor das NFes retornadas pela API no banco de dados.
3. Consulta do valor da NFe pela chave de acesso.


## Rodando o Projeto com Docker

O projeto inclui um `docker-compose.yml` para que você possa rodar a aplicação em contêineres.


### Pré-Requisitos:

Você vai precisar ter instalado em sua máquina de desenvolvimento:

- [Docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04)
- [Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04)
- [Composer](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04)
- PHP


### Instalação:

Primeiro, clone o projeto com:

```bash
git clone https://github.com/erikaheidi/streamaru.git
```

Para rodar o ambiente:

```bash
docker-compose up -d
```

E a aplicação poderá ser acessada em `localhost:8000`.


### Comandos do Docker Compose

Para parar a execução sem excluir os containers/volumes/networks:

```bash
docker-compose stop
```

Para levantar o ambiente de novo após um `stop`:

```bash
docker-compose start
```

Para destruir o ambiente:

```bash
docker-compose down
```

Para limpar redes, volumes e contêineres no Docker:

```bash
docker system prune
```
