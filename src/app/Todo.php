<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
        'content'
    ];
}

//Modelを介することでSQL文を組み立てることなくtodosテーブルを操作することができる
