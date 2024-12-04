@extends('base')

@section('content')
@foreach($posts as $post)
        <div class="post-preview">
            <a href=@if($post->id == 0) "#" @else "{{ url('post/' . $post->id) }}" @endif">
                <h2 class="post-title">
                    {{-- Str::limit($post->texto, 50, ' ...') --}}
                    {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                    {{-- Str::limit(Str::substr($post->entrada, 50) . $text, 80, ' ...', preserveWords: true) --}}
                    {{ $post->enter }}
                </h3>
            </a>
            <p class="post-meta">
                Publicado por
                <a href="#">izvserver</a>
                el {{ $post->created_at->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y') }}
            </p>
        </div>
        <hr class="my-4" />
    @endforeach

   <!-- {{ $posts->links() }} 
    <hr>
    {{ $posts->onEachSide(2)->links() }}
    <hr>
    {{ $posts->onEachSide(1)->links() }}
    <hr> -->
     <!-- << < first ... -2 -1 0 1 2 ... last > >> -->

     <nav>
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=1') }}" rel="prev" aria-label="&laquo; Previous">&lsaquo;&lsaquo;</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ url('·?page=' . ($posts->currentPage() - 1)) }}" rel="prev" aria-label="&laquo; Previous">&lsaquo;</a>
            </li>
            @if($posts->currentPage() > 3)
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif
            @if($posts->currentPage() - 2 > 0)
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=' . ($posts->currentPage() - 2)) }}" rel="prev" aria-label="&laquo; Previous">{{ $posts->currentPage() - 2 }}</a>
            </li>
            @endif
            @if($posts->currentPage() - 1 > 0)
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=' . ($posts->currentPage() - 1)) }}" rel="prev" aria-label="&laquo; Previous">{{ $posts->currentPage() - 1 }}</a>
            </li>
            @endif
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $posts->currentPage() }}</span></li>
            @if($posts->currentPage() + 1 <= $posts->lastPage())
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=' . ($posts->currentPage() + 1)) }}" rel="prev" aria-label="&laquo; Previous">{{ $posts->currentPage() + 1 }}</a>
            </li>
            @endif
            @if($posts->currentPage() + 2 <= $posts->lastPage())
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=' . ($posts->currentPage() + 2)) }}" rel="prev" aria-label="&laquo; Previous">{{ $posts->currentPage() + 2 }}</a>
            </li>
            @endif
            @if($posts->currentPage() < $posts->lastPage() - 2)
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=' . ($posts->currentPage() + 1)) }}" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ url('?page=' . ($posts->lastPage())) }}" rel="next" aria-label="Next &raquo;">&rsaquo;&rsaquo;</a>
            </li>
        </ul>
    </nav>
    
@endsection