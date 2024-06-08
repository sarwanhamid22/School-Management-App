<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Models\Payments;
use App\Models\Students;
use Dompdf\Options;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payments::whereNull('deleted_at')->get();
        $trashedPayments = Payments::onlyTrashed()->get();
        return view('payments.index', compact('payments', 'trashedPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        return view('payments.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'academic_year' => 'required|string',
            'payment_type' => 'required|array',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        Payments::create($validated);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = Payments::with('student')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = Payments::findOrFail($id);
        $students = Students::all();
        return view('payments.edit', compact('payment', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'academic_year' => 'required|string',
            'payment_type' => 'required|array',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $payment = Payments::findOrFail($id);
        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = Payments::findOrFail($id);
        $payment->delete(); // Menghapus data secara permanen dari database
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
    public function restore($id)
    {
        $payment = Payments::withTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil direstore');
    
    }
    public function forceDelete($id)
    {
        $payment = Payments::withTrashed()->findOrFail($id);
        $payment->forceDelete();

        return redirect()->route('payments.trashed')->with('success', 'Payment permanently deleted successfully.');
    }
    public function trashed()
    {
        $trashedPayments = Payments::onlyTrashed()->get();
        return view('payments.trashed', compact('trashedPayments'));
    }

    public function print($id)
    {
        $payment = Payments::findOrFail($id);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Render view ke dalam HTML
        $html = view('payments.print', compact('payment'))->render();

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Render PDF (optional: atur ukuran dan orientasi)
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Menampilkan PDF di browser tanpa memaksa unduhan
        return $dompdf->stream('detail_pembayaran.pdf', array("Attachment" => false));
    }
}
