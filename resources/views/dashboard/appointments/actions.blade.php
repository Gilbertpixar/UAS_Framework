<a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-delete" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
</form>