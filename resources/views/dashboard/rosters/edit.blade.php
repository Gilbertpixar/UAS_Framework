@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3 class="font-weight-bold mb-3">Edit Roster</h3>

                    <form action="{{ route('dashboard.rosters.update', $roster->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Roster</label>
                            <input type="text" class="form-control @error('nama_rooster') is-invalid @enderror" name="nama_rooster" value="{{ old('nama_rooster', $roster->nama_rooster) }}">
                            @error('nama_rooster')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" class="form-control @error('images') is-invalid @enderror" name="images">
                            @error('images')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
