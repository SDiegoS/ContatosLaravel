# ContatosLaravel

Este projeto é um sistema de gerenciamento de contatos utilizando **Laravel** no back-end e **Vue.js** no front-end. Ele permite a criação, leitura, atualização e exclusão de contatos, proporcionando uma interface simples para o gerenciamento de informações como nome, e-mail e telefone.

## Tecnologias

- **Laravel**: Framework PHP para o back-end.
- **Vue.js**: Framework JavaScript para o front-end.
- **MySQL**: Banco de dados utilizado.
- **Bootstrap**: Framework CSS para estilização.

## Funcionalidades

- Cadastro, edição, exclusão e listagem de contatos.
- Interface interativa construída com Vue.js.
- Comunicação com o back-end via API RESTful.

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/SDiegoS/ContatosLaravel.git
    ```

2. Navegue até o diretório do projeto e instale as dependências do back-end:

    ```bash
    cd backend
    doker-composer install
    ```

3. Instale as dependências do front-end:

    ```bash
    cd frontend
    npm install
    ```

4. Configure o arquivo `.env` com as credenciais do banco de dados se precisar.


5. Inicie o servidor do backend:

    ```bash
    cd backend
    docker-compose up -d
    ```
   
6. Execute as migrações:

    ```bash
   docker ps
   docker exec -it (coloque aqui o CONTAINER ID) php artisan key:generate
   docker exec -it (coloque aqui o CONTAINER ID) php artisan migrate
    ```

7. Inicie o servidor do frontend:

    ```bash
    npm run serve
    ```

O aplicativo estará disponível em `http://localhost:9002` para o backend e `http://localhost:8080` para o frontend.

## Contribuindo

1. Faça um fork do repositório.
2. Crie uma branch (`git checkout -b feature/nova-feature`).
3. Faça as alterações necessárias e envie uma pull request.

## Licença

Este projeto está licenciado sob a MIT License.
