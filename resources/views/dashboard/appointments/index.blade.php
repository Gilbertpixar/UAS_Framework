@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid py-5">
        <div class="d-flex justify-content-between mb-4">
            <h2>Daftar Appointment</h2>
            <a href="{{ route('dashboard.appointments.create') }}" class="btn btn-primary">Create Appointment</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Category</th>
                        <th>Appointment Date</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>{{ $appointment->phone_number }}</td>
                            <td>{{ $appointment->category->title }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->message }}</td>
                            <td>
                                <a href="{{ route('dashboard.appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('dashboard.appointments.edit', $appointment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('dashboard.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
