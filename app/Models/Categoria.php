<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    function produtos() {
        return $this->hasmany('App\Models\Produto'); // relacionamento criado para selecionar um pra muitos. Ex: Um categoria com vários produtos.
    }
}
