@extends('base')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $('#text').summernote({
          placeholder: 'Enter the Article Text',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            //['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            //['table', ['table']],
            //['insert', ['link', 'picture', 'video']],
            //['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>
@endsection

@section('content')
    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" minlength="5" maxlength="60" required value="{{ old('title', $post->title) }}" placeholder="Enter a Article Title">
        </div>
        <div class="mb-3">
            <label for="enter" class="form-label">Entrada</label>
            <input type="text" class="form-control" id="enter" name="enter" maxlength="250" required value="{{ old('enter', $post->enter) }}" placeholder="Enter the Article Intro">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Texto</label>
            <textarea class="form-control" id="text" minlenght="100" name="text" placeholder="Enter the Article Text">{{ old('text', $post->text) }}</textarea>
        </div>
        <hr>
        <div class="mb-3 float-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection