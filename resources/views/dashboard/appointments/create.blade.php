@extends('layouts.app')

@section('content')

<div class="container mt-5 py-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 py-5">
            <h2>Buat Appointment Baru</h2>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('appointments.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    @if (Auth::check())
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required readonly>
                    @else
                        <!-- Input for non-authenticated users -->
                        <input type="text" name="name" class="form-control" required>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    @if (Auth::check())
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required readonly>
                    @else
                        <input type="email" name="email" class="form-control" required>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number:</label>
                    <input type="number" name="phone_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="appointment_date" class="form-label">Appointment Date:</label>
                    <input type="date" name="appointment_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Appointment</button>
            </form>
        </div>
    </div>
</div>

@endsection
