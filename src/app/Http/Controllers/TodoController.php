<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    private $todo;
    
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        // $todo = new Todo();
        // //dd($todo);
        // $test = $todo->all();
        // //todoをtestに入力しなおして、正しく動かす
        
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
        // return view('todo.index', ['todos' => $test]);
    }

    public function create()
    {
        return view('todo.create');
    }

     public function store(Request $request)
    {
        $inputs = $request->all();

        // $todo = new Todo();
        // $todo->fill($inputs);
        // $todo->save();
        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
        //return redirect()->route('test.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }       



}

