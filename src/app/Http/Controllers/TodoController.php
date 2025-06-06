<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        //dd($todo);
        $test = $todo->all();

        return view('todo.index', ['todos' => $test]);
        //todonotestに入力しなおして、正しく動かす
    }

    public function create()
    {
        return view('todo.create');
    }

     public function store(Request $request)
    {
        $inputs = $request->all();

        $todo = new Todo();
        $todo->fill($inputs);
    
        $todo->save();

        return redirect()->route('todo.index');
        //return redirect()->route('test.index');
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);
        //dd($todo);

        return view('todo.show', ['todo' => $todo]);
    }       



}

