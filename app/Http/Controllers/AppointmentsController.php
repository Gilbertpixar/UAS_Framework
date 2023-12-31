<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\AppointmentExport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\confirmDelete;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class AppointmentsController extends Controller
{
    public function index()
    {
        // Get all appointments from the database
        $appointments = Appointment::all();

        // Add WhatsApp message and URL to each appointment
        foreach ($appointments as $appointment) {
            $now = Carbon::now();
            $appointmentDate = Carbon::createFromFormat('Y-m-d', $appointment->appointment_date);
            $diffInDays = $now->diffInDays($appointmentDate);
            $appointment->diffInDays = $diffInDays;

            // Generate WhatsApp message and URL
            $whatsappMessage = "Hi " . $appointment->name . ", I'm inquiring about the appointment. Appointment anda : " . $appointment->diffInDays . " hari lagi ";
            $whatsappNumber = $appointment->phone_number;
            $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($whatsappMessage);
            $appointment->whatsappUrl = $whatsappUrl;
        }
        confirmDelete();

        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function getData(Request $request)
    {
        $appointments = Appointment::with('category');

        if ($request->ajax()) {
            return datatables()->of($appointments)
                ->addIndexColumn()
                ->addColumn('actions', function ($appointment) {
                    return view('dashboard.appointments.actions', compact('appointment'));
                })
                ->addColumn('reminder', function ($appointment) {
                    $whatsappMessage = "Hallo Sobat GIGIKU " . $appointment->name . ", kami dari admin gigiku mau mengingatkan kalau appointment anda : " . $appointment->diffInDays . " hari lagi. Ingat permasalahan gigi ingat GIGIKU ";
                    $whatsappNumber = $appointment->phone_number;
                    $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($whatsappMessage);
                    return '<a href="' . $whatsappUrl . '" class="btn btn-sm btn-success" target="_blank">Send Reminder</a>';
                })
                ->toJson();
        }

        return view('dashboard.appointments.index'); // Jika bukan permintaan Ajax, tampilkan tampilan biasa
    }

    public function create()
    {
        $pageTitle = 'Buat Appointment Baru'; // Set the page title here

        $categories = Category::all();
        return view('dashboard.appointments.create', compact('pageTitle', 'categories'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string|regex:/^0\d+$/',
            'category' => 'required|exists:categories,id',
            'message' => 'required|string',
            'appointment_date' => 'required|date',
        ]);

        // Menghapus angka "0" di awal nomor telepon dan menambahkan prefix "+62"
        $phone_number = '+62' . substr($validatedData['phone_number'], 1);

        $category = Category::findOrFail($validatedData['category']);

        $appointmentData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $phone_number,
            'message' => $validatedData['message'],
            'appointment_date' => $validatedData['appointment_date'],
        ];

        $appointment = new Appointment($appointmentData);
        $appointment->category()->associate($category);
        $appointment->save();

        Alert::success('Added Successfully', 'Appointment berhasil di buat.');

        return redirect()->route('home')->with('success', 'Appointment berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string|regex:/^0\d+$/',
            'category' => 'required|exists:categories,id',
            'message' => 'required|string',
            'appointment_date' => 'required|date',
        ]);

        // Menghapus angka "0" di awal nomor telepon dan menambahkan prefix "+62"
        $phone_number = '+62' . substr($validatedData['phone_number'], 1);

        $appointment = Appointment::findOrFail($id);

        $appointment->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $phone_number,
            'message' => $validatedData['message'],
            'appointment_date' => $validatedData['appointment_date'],
            'category_id' => $validatedData['category'],
        ]);

        Alert::success('Added Successfully', 'Appointment berhasil di Edit.');

        return redirect()->route('appointments.index')->with('success', 'Appointment berhasil diperbarui!');
    }

    public function show($id)
    {
        // Retrieve the appointment from the database using the $id
        $appointment = Appointment::findOrFail($id);
        $categories = Category::all();

        // Return the view to display the appointment details
        return view('dashboard.appointments.show', compact('appointment'));
    }
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.appointments.edit', compact('appointment', 'categories'));
    }

    public function exportExcel()
    {
        return Excel::download(new AppointmentExport, 'appointments.xlsx');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        Alert::success('Added Successfully', 'Appointment  berhasil di Delete.');


        return redirect()->route('appointments.index')->with('success', 'Appointment berhasil dihapus!');
    }
}
