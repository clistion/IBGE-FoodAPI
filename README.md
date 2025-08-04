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
 
 
# 1- Deployment
 - [prepare your deployment environment ](https://laravel.com/docs/12.x/deployment)

# 2 - Execute these commands in powershell / CMD / Terminal:
 - git clone https://github.com/clistion/IBGE-FoodAPI.git
 - cd IBGE-FoodAPI/
 - [mv .env.example .env](https://laravel.com/docs/10.x/configuration#environment-configuration)
 - php artisan key:generate
 - [composer install](https://getcomposer.org/download/)
 - [composer update](https://getcomposer.org/download/)
 - [php artisan migrate](https://laravel.com/docs/10.x/migrations#roll-back-migrate-using-a-single-command)
 - [php artisan db:seed](https://laravel.com/docs/10.x/seeding#main-content)
 - php artisan serve
   http://localhost:8000/api

# Demo
 - http://132.226.248.2/api/foods?paginate=5
 - http://132.226.248.2/api/food/6300101

