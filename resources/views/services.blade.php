@extends('layouts.app')

@section('content')
    <div class="container mt-5 pb-3 pt-5">
        <div class="col-md-12 text-center md-5 pb-5"> <!-- Add 'text-center' class to center the heading -->
            <h1 class="font-weight-bold"> <strong> OUR SERVICES</strong> </h1>
            <h5>berikut ini adalah service kami</h5>
        </div>       
        
        <div class="row justify-content-center">
            @forelse ($categories as $category)
                <div class="col-md-4 mb-4 ">
                    <div class="card border-0 shadow">
                        <img src="{{ asset('/storage/categories/'.$category->image) }}" class="card-img-top mx-auto d-block" alt="{{ $category->title }}" style="max-width: 300px;"> <!-- Add 'mx-auto' and 'd-block' classes to center the image and set 'max-width' to 300px -->
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $category->title }}</h5>
                            <p class="card-text">{!! $category->content !!}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{ $categories->links() }}
@endsection

@section('styles')
<style>
    .col-md-4 {
        margin-top: 20px;
    }
</style>
@endsection
