## Extended Resource And Api Resource Router Laravel Restore And Force Delete
It turns out that for many systems, especially using laravel's sfot delete, the commands above are not enough, as at least two more commands are missing, namely:
- restore
- delete (deletes the item from the database)

### How to add new routes to the Route api Resource command

![Imagem](https://raw.githubusercontent.com/Tellys/Extended-Resource-And-Apiresource-Router-Laravel-Restore-And-Force-Delete/master/images/Solucao-Extended-Resource-And-Api-Resource-Router-Laravel-Restore-And-Force-Delete-Acrescentando-Restore-e-Force-Delete-no-Router-Re.JPG)

### Usage

~~~php
Route::customApiResource('produtcs', 'App\Http\Controllers\Api\Products');
~~~

### More info and Document
[More Info click here, go to us web site](https://www.conteudopertinente.com.br/sem-categoria/extended-resource-and-api-resource-router-laravel-restore-and-force-delete/)
