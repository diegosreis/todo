### Rodando o projeto
1) docker-compose -f docker-compose.yml up
2) docker exec -it php-fpm bash
3) composer install
4) php artisan migrate --force

aplicação rodando na porta 3333
http://localhost:3333/api/todo/