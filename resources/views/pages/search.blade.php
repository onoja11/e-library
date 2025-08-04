@extends('layouts.app')
@section('content')
    @include('partials.hero', [
        'title' => $title,
        'height' => '10rem',
    ])

    <div class="library_container container mt-5">
        <div class="books">
            <div class="row">
                @forelse ($books as $book)
                    <div class="col-md-4 col-lg-3 mb-5">
                        <a href="{{ route('book.view.page', ['sku' => $book->sku]) }}" class="card border nav-link h-100 rounded-0 book">
                            <div class="box">
                                <img src="{{ asset('uploads/covers/' . $book->cover) }}" class="" alt="cover">
                            </div>
                            <div class="mt-2 card-body">
                                <div class="row mb-2">
                                    <span class="col-1 fa-solid fa-book text-warning"></span>
                                    <span class="col-10">
                                        {{ $book->title }}
                                    </span>
                                </div>
                                <div class="row mb-2">
                                    <span class="col-1 fa-solid fa-user-edit text-warning"></span>
                                    <span class="col-10">
                                        {{ $book->author }}
                                        {{ $book->category->title }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h5 class="h2 text-center text-danger">
                        🔎<br>
                        Search Not Found...</h5>
                @endforelse

                <div class="col-12">
                    {!! $books->links('pagination::bootstrap-5') !!}
                </div>
            </div>


        </div>
    </div>
@endsection
