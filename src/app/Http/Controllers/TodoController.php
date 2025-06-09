<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
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

     public function store(TodoRequest $request) // 修正
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    
    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->findOrFail($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->findOrFail($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
        //dd($inputs);
    }


}

