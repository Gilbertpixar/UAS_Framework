<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Category</th>
            <th>Message</th>
            <th>Appointment Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $index => $appointment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone_number }}</td>
                <td>{{ $appointment->category_id }}</td>
                <td>{{ $appointment->message }}</td>
                <td>{{ $appointment->appointment_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
