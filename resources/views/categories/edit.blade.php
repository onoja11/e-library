@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto bg-white" style="max-width: 600px;">
                <div class="card-body">
                    <h3 class="card-title mb-3">Edit Category</h3>

                    <div class="text-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary mb-4">
                            All Categories
                        </a>
                    </div>

                    <form action="https://e-library-35a8.onrender.com/categories/{{$category->id}}/edit" method="post">
                        @csrf 
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $category->title }}" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5">{{ $category->description }}</textarea>
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
