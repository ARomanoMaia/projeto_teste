# projeto_teste

API de Locação de Veículos, desenvolvido em PHP 7.4 e Laravel 7, banco de dados MySQL.

Rotas de chamadas das apis:

+--------+-----------+----------------------------+-----------------+----------------------------------------------------+------------+
| Domain | Method    | URI                        | Name            | Action                                             | Middleware |
+--------+-----------+----------------------------+-----------------+----------------------------------------------------+------------+
|        | GET|HEAD  | /                          | site.index      | App\Http\Controllers\PrincipalController@principal | web        |
|        | POST      | api/cliente                | cliente.store   | App\Http\Controllers\ClienteController@store       | api        |
|        | GET|HEAD  | api/cliente                | cliente.index   | App\Http\Controllers\ClienteController@index       | api        |
|        | GET|HEAD  | api/cliente/create         | cliente.create  | App\Http\Controllers\ClienteController@create      | api        |
|        | GET|HEAD  | api/cliente/{cliente}      | cliente.show    | App\Http\Controllers\ClienteController@show        | api        |
|        | PUT|PATCH | api/cliente/{cliente}      | cliente.update  | App\Http\Controllers\ClienteController@update      | api        |
|        | DELETE    | api/cliente/{cliente}      | cliente.destroy | App\Http\Controllers\ClienteController@destroy     | api        |
|        | GET|HEAD  | api/cliente/{cliente}/edit | cliente.edit    | App\Http\Controllers\ClienteController@edit        | api        |
|        | GET|HEAD  | api/locacao                | locacao.index   | App\Http\Controllers\LocacaoController@index       | api        |
|        | POST      | api/locacao                | locacao.store   | App\Http\Controllers\LocacaoController@store       | api        |
|        | GET|HEAD  | api/locacao/create         | locacao.create  | App\Http\Controllers\LocacaoController@create      | api        |
|        | GET|HEAD  | api/locacao/{locacao}      | locacao.show    | App\Http\Controllers\LocacaoController@show        | api        |
|        | PUT|PATCH | api/locacao/{locacao}      | locacao.update  | App\Http\Controllers\LocacaoController@update      | api        |
|        | DELETE    | api/locacao/{locacao}      | locacao.destroy | App\Http\Controllers\LocacaoController@destroy     | api        |
|        | GET|HEAD  | api/locacao/{locacao}/edit | locacao.edit    | App\Http\Controllers\LocacaoController@edit        | api        |
|        | GET|HEAD  | api/user                   |                 | Closure                                            | api        |
|        |           |                            |                 |                                                    | auth:api   |
|        | GET|HEAD  | api/veiculo                | veiculo.index   | App\Http\Controllers\VeiculoController@index       | api        |
|        | POST      | api/veiculo                | veiculo.store   | App\Http\Controllers\VeiculoController@store       | api        |
|        | GET|HEAD  | api/veiculo/create         | veiculo.create  | App\Http\Controllers\VeiculoController@create      | api        |
|        | GET|HEAD  | api/veiculo/{veiculo}      | veiculo.show    | App\Http\Controllers\VeiculoController@show        | api        |
|        | PUT|PATCH | api/veiculo/{veiculo}      | veiculo.update  | App\Http\Controllers\VeiculoController@update      | api        |
|        | DELETE    | api/veiculo/{veiculo}      | veiculo.destroy | App\Http\Controllers\VeiculoController@destroy     | api        |
|        | GET|HEAD  | api/veiculo/{veiculo}/edit | veiculo.edit    | App\Http\Controllers\VeiculoController@edit        | api        |
|        | GET|HEAD  | teste/{p1}/{p2}            | teste           | App\Http\Controllers\TesteController@teste         | web        |
|        | GET|HEAD  | {fallbackPlaceholder}      |                 | Closure                                            | web        |
+--------+-----------+----------------------------+-----------------+----------------------------------------------------+------------+


