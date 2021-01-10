@extends('layouts.todoapp')

@section('title', 'Todo App')

@section('content')
	<div class="create-action-container">
		<a href="todo/create" style="text-decoration:none;">Create</a>
	</div>
	<div class="sort-container">
		<p>並べ替え：</p>
		<a href="/todo?sort=priority" style="text-decoration:none;">優先度</a>
		<a href="/todo?sort=id" style="text-decoration:none;">作成日時</a>
	</div>
	@foreach($items as $item)
	<div class="todo-container">
		<h3 class="todo-title">{{$item->title}}</h3>
		<b class="priority priority-value-{{$item->priority}}">{{$item->getPriority()}}</b>
		@if($item->content != null)
			<pre class="todo-content">{{$item->content}}</pre>
		@endif
		<div class="edit delete action-container">
			<a href="todo/edit?id={{$item->id}}" style="text-decoration:none;">Edit</a>
			<a href="todo/del?id={{$item->id}}" style="text-decoration:none;">Delete</a>
		</div>
	</div>
	@endforeach
	<div class="paginate">
		{{ $items->appends(['sort' => $sort])->links() }}
	</div>
@endsection