<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert(['nome' => 'Camiseta polo', 'preco'=>100,'estoque' => 4, 'categoria_id' =>1]);
        DB::table('produtos')->insert(['nome' => 'Calça Jeans', 'preco'=>120,'estoque' => 1, 'categoria_id' =>1]);
        DB::table('produtos')->insert(['nome' => 'Camisa manga Longa', 'preco'=>34,'estoque' => 2, 'categoria_id' =>1]);
        DB::table('produtos')->insert(['nome' => 'Pc gamers', 'preco'=>56,'estoque' => 4, 'categoria_id' =>2]);
        DB::table('produtos')->insert(['nome' => 'Impressora', 'preco'=>37,'estoque' => 5, 'categoria_id' =>6]);
        DB::table('produtos')->insert(['nome' => 'Mouse', 'preco'=>37,'estoque' => 6, 'categoria_id' =>6]);
        DB::table('produtos')->insert(['nome' => 'Perfume', 'preco'=>55,'estoque' => 7, 'categoria_id' =>3]);
        DB::table('produtos')->insert(['nome' => 'Cama de casal', 'preco'=>11,'estoque' => 8, 'categoria_id' =>4]);
        DB::table('produtos')->insert(['nome' => 'Móveis', 'preco'=>11,'estoque' => 8, 'categoria_id' =>4]);


    }
}
