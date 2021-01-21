@extends('layouts.todoapp')

@section('title', 'Todo App')

@section('content')
	<div class="action-container">
		<a href="/todo" style="text-decoration:none;">TOP</a>
	</div>
	<div class="sort-container">
		<p>並べ替え：</p>
		<a href="/todo?sort=priority" style="text-decoration:none;">優先度</a>
		<a href="/todo?sort=id" style="text-decoration:none;">作成日時</a>
	</div>
		<form>
			@foreach($items as $item)
				@if($item->completion == 1)
					<div class="todo-container">
						<h3 class="todo-title">{{$item->title}}</h3>
						<b class="priority priority-value-{{$item->priority}}">{{$item->getPriority()}}</b>
						@if($item->content != null)
							<pre class="todo-content">{{$item->content}}</pre>
						@endif
						<div class="edit-delete-container">
							<!--<a href="todo/edit?id={{$item->id}}" style="text-decoration:none;">更新</a>
							<a href="todo/del?id={{$item->id}}" style="text-decoration:none;">削除</a>-->
						</div>
					</div>
				@endif
			@endforeach
		</form>
@endsection