@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h1 class="font-weight-bold mb-3 text-center">Daftar Roster</h1>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('rosters.create') }}" class="btn btn-primary">Tambah Roster</a>
                    </div>

                    <div class="row">
                        @foreach($rosters as $roster)
                        <div class="col-md-4 mb-3">
                            <div class="card" style="width: 18rem;">
                                @if($roster->images)
                                <img src="{{ Storage::url($roster->images) }}" class="card-img-top" alt="{{ $roster->nama_rooster }}">
                                @else
                                <div class="card-img-top bg-secondary text-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                    No Image
                                </div>
                                @endif
                                <div class="card-body">
                                    <p class="card-text">{{ $roster->nama_rooster }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
