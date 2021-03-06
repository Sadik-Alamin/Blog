@extends('master')


@section('content')
	<div class="col-sm-8 blog-main">
	<h1>{{ $post->title }}</h1>

	@if(count($post->tags))
		<ul>
			@foreach($post->tags as $tag)
				<li>
					<a href="/posts/tags/{{ $tag->name }}">
						{{ $tag->name }}
					</a>
				</li>
			@endforeach
		</ul>
	@endif

	{{ $post->body }}

	<div class="comments">
		<ul class="list-group">
			@foreach($post->comments as $comment)
			<li class="list-group-item">
				<strong>
					{{--$comment->created_at->diffForHumans()--}}
				</strong>
				{{$comment->body}}
			</li>
			@endforeach
		</ul>
	</div>
	<hr>
	<div class="card">
		<div class="card-block">
			<form method="POST" action="/posts/{{$post->id}}/comments">
				{{ csrf_field() }}
				  <div class="form-group">
				    <input name="body" type="text" class="form-control" placeholder="Yousr comment here" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Add Comment</button>
				  @include('layouts.errors')
			</form>
		</div>
	</div>
	</div>
@endsection