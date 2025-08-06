@extends('layouts.app')
@section('content')
    <section>
        <div class="continer my-5">
            
            <div class="card mx-auto bg-white" style="max-width: 600px">
                <div class="card-body">
                    <h3 class="card-title">Create Category</h3>
                    <div class="text-end">
                        <a href="{{ route('home.page') }}" class="btn btn-primary ">View Advert</a>
                    </div>
                    <form action="https://e-library-35a8.onrender.com/advert" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Advert Title</label>
                            <input type="text" class="form-control @error('advertTitle') is-invalid  @enderror"  name="advertTitle">
                            @error('advertTitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Advert Cover</label>
                            <input type="file" accept="image/*" class="form-control @error('advertCover') is-invalid  @enderror"  name="advertCover">
                            @error('advertCover')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Advert Description</label>
                            <textarea type="text" class="form-control @error('advertDescription') is-invalid  @enderror" name="advertDescription" rows="5"></textarea>
                            @error('advertDescription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-warning" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
