@extends('dashboard.layouts.main')

@section('container')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Detail Appointment</h2>
                        <p><strong>Name:</strong> {{ $appointment->name }}</p>
                        <p><strong>Email:</strong> {{ $appointment->email }}</p>
                        <p><strong>Phone Number:</strong> {{ $appointment->phone_number }}</p>
                        <p><strong>Category:</strong> {{ $appointment->category->name }}</p>
                        <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
                        <p><strong>Message:</strong> {{ $appointment->message }}</p>
                        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
