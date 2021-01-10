@extends('layouts.todoapp')

@section('title', 'Delete Create')

@section('content')
<div class="delete-wrapper">
	<form action="/todo/del" method="post">
		@csrf
		<input type="hidden" name="id" value="{{$form->id}}">
		<input type="hidden" name="user_id" value="{{$form->user_id}}">
		<div class="todo-container">
			<h3 class="todo-title">{{$form->title}}</h3>
			<p class="priority priority-value-{{$form->priority}}">{{$form->getPriority()}}</p>
			@if($form->content != null)
				<pre class="todo-content">{{$form->content}}</pre>
			@endif
		</div>
		<p class="delete-message">このタスクを削除しますか？</p>
		<div class="button-container">
			<input class="button" type="submit" value="OK">
		</div>
	</form>
</div>
@endsection