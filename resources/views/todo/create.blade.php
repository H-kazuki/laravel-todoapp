@extends('layouts.todoapp')

@section('title', 'Todo Create')

@section('content')
	<div class="form-wrapper">
		<form action="/todo/create" method="post">
			@csrf
			<input type="hidden" name="user_id" value="{{$user_id}}">
			<h2>title:</h2>
			@error('title')
				<p class="error">{{$message}}</p>
			@enderror
			<div class="title-form">
				<input type="text" name="title" value="{{old('title')}}">(必須)
			</div>
			<p class="limit">20文字まで</p>
			<h2>content:</h2>
			@error('content')
				<p class="error">{{$message}}</p>
			@enderror
			<div class="content-form">
				<textarea name="content" wrap="hard" rows="5" cols="68">{{old('content')}}</textarea>
			</div>
			<p class="limit">100文字まで</p>
			<h3>priority:</h3>
			<p><input type="radio" name="priority" value="0" checked="checked">普通</p>
			<p><input type="radio" name="priority" value="1">優先</p>
			<p><input type="radio" name="priority" value="2">最優先</p>
			<div class="button-container">
				<input class="button" type="submit" value="OK">
			</div>
		</form>
	</div>
@endsection