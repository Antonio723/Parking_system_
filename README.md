# Parking System

Este projeto foi desenvolvido para atender um estacionamento, todo o BackEnd desta aplicação é feita em PHP usando o padrão MVC. Já o front end é feita em JavaScript, CSS, e HTML.

## STACK ULTILIZADA
- PHP
- CSS
- JS



## <i class="fa fa-gear fa-spin fa-2x" style="color: firebrick"></i> ROTAS DA API
As rotas ultilizadas são para definir o precos, e a entrada de e saida de um carro.Veja a baixo todas rotas que existem e como as ultilizar.

### PRECOS
|method	| url	                          |action	                                      |body                                    |
|-------|-------------------------------|---------------------------------------------|----------------------------------------|
|get   	|/precos	                      |lista todos os precos existentes	            |none                                    |
|get	  |/precos/:id	                  |retorna o preco buscado	                    |none                                    |
|get   	|/precos?TerminoVingencia=null	|Preco Valido no momento	                    |none                                    |
|Post	  |/precos	                      |Cria um novo preco	                          |"{ <br> "primeira hora"" : "10.00", <br>"demais horas" : "12.00", <br> "inicio vingencia" : "2021-05-06"<br>}"                                    
|delete	|/precos/:id	                  |Torna um registro inativo no banco	          |none                                    |
|put	  |/precos/:id	                  |Edita o preco (em erros de digitação)	      |{ <br>primeira hora : 10.00,  <br>demais horas : 12.00,<br>inicio vingencia : 2021-05-06 <br>}  
