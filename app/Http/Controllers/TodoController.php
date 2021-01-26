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
		$sort = $request->sort;
		$user_id = Auth::id();
		$items = Todos::where('user_id', $user_id)->where('completion', 0)->orderBy($sort, 'desc')->paginate(5);
		$param = [
			'items' => $items,
			'sort' => $sort,
		];
		return view('todo.index', $param);
	}

	public function indexCompletion(Request $request)
	{
		$completion_id_list = $request->completion;
		foreach($completion_id_list as $id)
		{
			$todo = Todos::find($id);
			$todo->update(['completion' => 1]);
		}
		return redirect('/todo');
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
		return redirect('todo');
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


	public function completion(Request $request)
	{
		$sort = $request->sort;
		$user_id = Auth::id();
		$items = Todos::where('user_id', $user_id)->orderBy($sort, 'desc')->get();
		$param = [
			'items' => $items,
			'sort' => $sort,
		];
		return view('todo.completion', $param);
	}

	public function clear(Request $request)
	{
		$clear_id_list = $request->clear;
		foreach($clear_id_list as $id)
		{
			$todo = Todos::find($id);
			$todo->delete();
		}
		return redirect('/todo/completion');
	}
}
