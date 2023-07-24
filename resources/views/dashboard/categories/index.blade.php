@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
        </div>
        @forelse ($categories as $category)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/storage/categories/'.$category->image) }}" alt="Category Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->title }}</h5>
                        <div class="card-text">{!! $category->content !!}</div>
                        <div class="card-body">
                            <a href="{{ route('dashboard.categories.show', $category->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
@endsection
