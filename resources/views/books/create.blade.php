@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto bg-white" style="max-width: 600px;">
                <div class="card-body">
                    <h3 class="card-title mb-3"> Upload book </h3>

                    <div class="text-end">
                        <a href="{{ route('books.index') }}" class="btn btn-primary mb-4">
                            All Books
                        </a>
                    </div>

                    <form enctype="multipart/form-data" action="https://e-library-35a8.onrender.com/books" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Author</label>
                            <input type="text" name="author" value="{{ old('author') }}" class="form-control">
                            @error('author')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="" class="form-select">
                                <option value="" hidden></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cover</label>
                            <input type="file" accept="image/*" name="cover" class="form-control">
                            @error('cover')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">File (pdf)</label>
                            <input type="file" accept=".pdf" name="file" class="form-control">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
