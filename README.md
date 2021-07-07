# Parking System

Este projeto foi desenvolvido para atender um estacionamento, todo o BackEnd desta aplicação é feita em PHP usando o padrão MVC. Já o front end é feita em JavaScript, CSS, e HTML.





###PRECOS
|method	| url	                          |action	                                      |body                                    |
|-------|-------------------------------|---------------------------------------------|----------------------------------------|
|get   	|/precos	                      |lista todos os precos existentes	            |none                                    |
|get	  |/precos/:id	                  |retorna o preco buscado	                    |none                                    |
|get   	|/precos?TerminoVingencia=null	|Preco Valido no momento	                    |none                                    |
|Post	  |/precos	                      |Cria um novo preco	                          |"{                                      |
|       |                               |                                             |  "primeira hora"" : "10.00",           |
|       |                               |                                             |  "demais horas" : "12.00",             |
|       |                               |                                             |  "inicio vingencia" : "2021-05-06"     |
|       |                               |                                             |}"                                      |
|delete	|/precos/:id	                  | |Torna um registro inativo no banco	        |none                                    |
|put	  |/precos/:id	                  |Edita o preco (em erros de digitação)	      |"{                                      |
|       |                               |                                             |   "primeira hora"" : ""10.00",         |
|       |                               |                                             |   "demais horas"" : ""12.00",          |
|       |                               |                                             |   "inicio vingencia" : "2021-05-06"    |
|       |                               |                                             |}"                                      |
