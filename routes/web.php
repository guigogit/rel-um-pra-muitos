<?php
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/categorias', function () {
    $cat = Categoria::all(); // retornar todas as categorias da base de dados.
    if (count($cat) === 0) {
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";

    }
    else{
        foreach($cat as $c){
            echo "<p>". $c->id . " - " . $c->nome . "</p>";
        }
    }
});


Route::get('/produtos', function () {
    $prods = Produto::all(); // retornar todas as categorias da base de dados.
    if (count($prods) === 0) {
        echo "<h4>Você não possui nenhum produto cadastrado</h4>";

    }
    else{
        echo "<table>";
        echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preco</td><td>Categoria</td><tr></thead>";

        foreach($prods as $p){
            echo "<tr>";
            echo "<td>" . $p->nome . "</td>";
            echo "<td>" . $p->estoque . "</td>";
            echo "<td>" . $p->preco . "</td>";
            echo "<td>" . $p->categoria->nome . "</td>";
            echo "</tr>";
        }
    }
});

Route::get('/categoriasprodutos', function ()
{
    $cats = Categoria::all(); // retornar todas as categorias da base de dados.
    if (count($cats) === 0)
    {
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";

    }
    else
    {
        foreach($cats as $c)
        {
            echo "<p>". $c->id . " - " . $c->nome . "</p>";
            $produtos = $c->produtos;

            if ($produtos->count() > 0)
            {
                echo "<ul>";
                foreach($produtos as $p)
                {
                    echo "<li>". $p->nome . "</li>";
                }
                echo "</ul>";
            }
        }
    }
});


Route::get('/categoriasprodutos/json', function (){
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function (){
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu novo produto";
    $p->estoque =10;
    $p->preco = 100;
    $p->categoria()->associate($cat);
    return $p->toJson();


});


Route::get('/removerprodutocategoria', function (){
    $p = Produto::find(1);
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }




});
Route::get('/adicionarproduto/{catid}', function ($catid){
    $cat = Categoria::with('produtos')->find($catid);
    $p = new Produto();
    $p->nome = "Meu novo produto adicionado 2";
    $p->estoque =40;
    $p->preco = 500;

    if(isset($cat)){
        $cat->produtos()->save($p);
    }
    $cat->load('produtos');
    return $cat->toJson();

});
