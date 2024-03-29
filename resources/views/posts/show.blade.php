@extends('layouts.app')

@section('content')
	<a href="/posts" class="btn btn-default btn-md">Go Back</a>
	<h1>{{$post->title}}</h1>
	<img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
	<br><br>
	<div>
		{!!$post->body!!}
	</div>
	<hr>
	<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
	<hr>

	@if(!Auth::guest())
		@if(Auth::user()->id == $post->user_id)
			<a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-lg">Edit</a>

			{!!Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
				{{Form::hidden('_method','DELETE')}}
				{{Form::submit('Delete',['class' => 'btn btn-danger'])}}
			{!!Form::close()!!}
			<br><br>
		@endif
	@endif
@endsection