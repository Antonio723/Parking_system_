# Parking System

Este projeto foi desenvolvido para atender um estacionamento, todo o BackEnd desta aplicação é feita em PHP usando o padrão MVC. Já o front end é feita em JavaScript, CSS, e HTML.

## STACK ULTILIZADA
- PHP
- CSS
- JS

## ROTAS DA API
As rotas ultilizadas são para definir o precos, e a entrada de e saida de um carro.Veja a baixo todas rotas que existem e como as ultilizar.

### ROTAS
|method	| url	                          |action	                                      |body                                    |
|-------|-------------------------------|---------------------------------------------|----------------------------------------|
|get   	|/precos	                      |lista todos os precos existentes	            |none                                    |
|get	  |/precos/:id	                  |retorna o preco buscado	                    |none                                    |
|Post	  |/precos	                      |Cria um novo preco	                          |"{ <br> "primeira hora"" : "10.00", <br>"demais horas" : "12.00"<br>}" 
|alo    |/carros                        |


