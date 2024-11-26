@extends('base')

@section('content')
    <form action="{{ route('comment.update', ['comment' => $comment->id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" required value="" placeholder="Enter your Email to verify the edition">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Comment</label>
            <textarea class="form-control" id="text" name="text" required>{{ old('text', $comment->text) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection