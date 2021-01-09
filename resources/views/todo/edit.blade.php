@extends('layouts.todoapp')

@section('title', 'Edit Create')

@section('content')
	<div class="form-wrapper">
		<form action="/todo/edit" method="post">
			@csrf
			<input type="hidden" name="id" value="{{$form->id}}">
			<input type="hidden" name="user_id" value="{{$form->user_id}}">
			<h2>title:</h2>
			@error('title')
				<p class="error">{{$message}}</p>
			@enderror
			<div class="title-form">
				<input type="text" name="title" value="{{$form->title}}">(必須)
			</div>
			<p class="limit">20文字まで</p>
			<h2>content:</h2>
			@error('content')
				<p class="error">{{$message}}</p>
			@enderror
			<div class="content-form">
				<textarea name="content" rows="5" cols="68">{{$form->content}}</textarea>
			</div>
			<p class="limit">100文字まで</p>
			<h2>priority:</h2>
			<p><input type="radio" name="priority" value="0" {{$form->getChoicePriority(0)}}>普通</p>
			<p><input type="radio" name="priority" value="1" {{$form->getChoicePriority(1)}}>優先</p>
			<p><input type="radio" name="priority" value="2" {{$form->getChoicePriority(2)}}>最優先</p>
			<div class="button-container">
				<input class="button" type="submit" value="OK">
			</div>
		</form>
	</div>
@endsection