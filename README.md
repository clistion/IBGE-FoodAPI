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
 

