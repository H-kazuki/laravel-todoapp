<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
	public function index(Request $request)
	{
		$user_id = Auth::id();
		$items = Todos::where('user_id', $user_id)->orderBy('priority', 'desc')->get();
		return view('todo.index', ['items' => $items]);
	}


	public function create(Request $request)
	{
		$user_id = Auth::id();
		return view('todo.create', ['user_id' => $user_id]);
	}


	public function store(TodoRequest $request)
	{
		$todo = new Todos;
		$form = $request->all();
		unset($form['_token']);
		$todo->fill($form)->save();
		return redirect('/todo');
	}


	public function edit(Request $request)
	{
		$todo = Todos::find($request->id);
		return view('todo.edit', ['form' => $todo]);
	}


	public function update(TodoRequest $request)
	{
		$todo = Todos::find($request->id);
		$form = $request->all();
		unset($form['_token']);
		$todo->fill($form)->save();
		return redirect('/todo');
	}


	public function delete(Request $request)
	{
		$todo = Todos::find($request->id);
		return view('todo.del', ['form' => $todo]);
	}
	

	public function remove(Request $request)
	{
		$todo = Todos::find($request->id);
		$todo->delete();
		return redirect('/todo');
	}
}
