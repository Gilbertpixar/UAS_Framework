<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Appointment;
use App\Models\Category;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        foreach ($appointments as $appointment) {
            $now = Carbon::now();
            $appointmentDate = Carbon::createFromFormat('Y-m-d', $appointment->appointment_date);
            $diffInDays = $now->diffInDays($appointmentDate);
            $appointment->diffInDays = $diffInDays;
        }

        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.appointments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'category' => 'required|exists:categories,id',
            'message' => 'required|string',
            'appointment_date' => 'required|date',
        ]);

        $category = Category::findOrFail($validatedData['category']);

        $appointmentData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'message' => $validatedData['message'],
            'appointment_date' => $validatedData['appointment_date'],
        ];

        $appointment = new Appointment($appointmentData);
        $appointment->category()->associate($category); // Associate the appointment with the selected category
        $appointment->save();

        return redirect()->route('dashboard.appointments.create')->with('success', 'Appointment berhasil dibuat!');
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('dashboard.appointments.show', compact('appointment'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.appointments.edit', compact('appointment', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'category' => 'required|exists:categories,id',
            'message' => 'required|string',
            'appointment_date' => 'required|date',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);

        return redirect()->route('dashboard.appointments.index')->with('success', 'Appointment berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('dashboard.appointments.index')->with('success', 'Appointment berhasil dihapus!');
    }
    // Jika Anda membutuhkan, Anda bisa menambahkan fungsi untuk edit dan update appointment.

    // Jika Anda membutuhkan, Anda bisa menambahkan fungsi untuk delete appointment.

}
