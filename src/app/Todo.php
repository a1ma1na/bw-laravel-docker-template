<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];    

}

//Modelを介することでSQL文を組み立てることなくtodosテーブルを操作することができる
