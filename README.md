# About
API of the 2008-2009 Family Budget Survey: tables of nutritional composition of foods consumed in Brazil / IBGE, Coordination of Work and Income.

# Research source
- [IBGE (book) ](https://biblioteca.ibge.gov.br/visualizacao/livros/liv50002.pdf)
- [IBGE LIBRARY (book and CD-ROM)](https://biblioteca.ibge.gov.br/index.php/biblioteca-catalogo?view=detalhes&id=250002)

# API Endpoints
 |  URL  |	Verb| Purpose|
 |----------|:-------------:|------:|
 | /foods |	GET | Fetches details for all foods
 | /foods?paginate=10 |	GET | Fetches details for all foods. Retrives an paginated JSON
 | /food/{code}| GET | Fetches details for one food item by code
 
 
# 1- Running this project
 - configure the .env file

# 2 - Execute these commands in powershell / CMD / Terminal:
 - [composer update](https://getcomposer.org/download/)
 - [php artisan migrate](https://laravel.com/docs/9.x/migrations#roll-back-migrate-using-a-single-command)
 - [php artisan db:seed](https://laravel.com/docs/9.x/seeding#main-content)
 - php artisan serve

