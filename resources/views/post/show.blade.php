@extends('base')

@section('content')
    {!! strip_tags($post->text, env('PERMITTED_TAGS')) !!}

    <hr>

    <div class="text-end">
        <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit Post</a>
    </div>

    <hr>

    @foreach($post->comments as $comment)
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $comment->text }}</p>
            </div>
            <div class="card-footer text-muted text-end">
                @if($comment->created_at->diffInMinutes(now()) < 10)
                    <a href="{{ route('comment.edit', ['comment' => $comment->id]) }}">{{ $comment->nickname }}</a>, {{ $comment->created_at->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y \a \l\a\s H:mm') }}
                @else
                {{ $comment->nickname }}, {{ $comment->created_at->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y \a \l\a\s H:mm') }}
                @endif
            </div>
        </div>
        <hr>
    @endforeach

    <hr>
    
    <!--
    <form action="{{ route('comment.store') }}" method="post">
    @csrf
        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
        
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" minlenght="6" maxlength="100" required value="{{ old('mail') }}" placeholder="Enter your Email">
        </div>
        <div class="mb-3">
            <label for="nickname" class="form-label">Nickname</label>
            <input type="text" class="form-control" id="nickname" name="nickname" minlenght="5" maxlength="40" required value="{{ old('nicknme') }}" placeholder="Enter the nickname">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Comment</label>
            <textarea class="form-control" id="text" minlenght="100" name="text" placeholder="Enter your Comment">{{ old('text') }}</textarea>
        </div>
        <hr>
        <div class="mb-3 float-end">
            <button type="submit" class="btn btn-secondary">Submit Comment</button>
        </div>
    </form>

    <form action="{{ url('post/' . $post->id . '/comment') }}" method="post"></form>
    -->
    <form action="{{ route('post.comment', ['post' => $post->id]) }}" method="post">
    @csrf
        <input type="hidden" id="post_id2" name="post_id" value="{{ $post->id }}">
        
        <div class="mb-3 mt-5">
            <label for="mail2" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail2" name="mail" minlenght="6" maxlength="100" required value="{{ old('mail') }}" placeholder="Enter your Email">
        </div>
        <div class="mb-3">
            <label for="nickname2" class="form-label">Nickname</label>
            <input type="text" class="form-control" id="nickname2" name="nickname" minlenght="5" maxlength="40" required value="{{ old('nicknme') }}" placeholder="Enter the nickname">
        </div>

        <div class="mb-3">
            <label for="text2" class="form-label">Comment</label>
            <textarea class="form-control" id="text2" minlenght="100" name="text" placeholder="Enter your Comment">{{ old('text') }}</textarea>
        </div>
        <hr>
        <div class="mb-3 float-end">
            <button type="submit" class="btn btn-secondary">Submit Comment</button>
        </div>
    </form>
@endsection

@section('titulo')
    {{ $post->title }}
@endsection

@section('entrada')
    {{ $post->enter }}
@endsection

@section('by')
    Published by
    <a href="#">izvserver</a>
    on {{ $post->created_at->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y') }}
@endsection