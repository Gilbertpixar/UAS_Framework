@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Edit Appointment</h1>
                <form action="{{ route('dashboard.appointments.update', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $appointment->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $appointment->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $appointment->phone_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id === $appointment->category_id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" required>{{ $appointment->message }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">Appointment Date</label>
                        <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Appointment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
