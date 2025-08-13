<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentBill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = StudentBill::with('student')->latest()->paginate(10);
        return view('student_bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('student_bills.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'student_id' => 'required|uuid|exists:students,id',
            'type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
        ]);

        StudentBill::create([
            'id' => Str::uuid(),
            'student_id' => $request->student_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'is_paid' => false,
        ]);

        return redirect()->route('student-bills.index')->with('success', 'Tagihan berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentBill $studentBill)
    {
        $students = Student::all();
        return view('student_bills.edit', compact('studentBill', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required|uuid|exists:students,id',
            'type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'is_paid' => 'required|boolean',
        ]);

        $studentBill->update($request->only([
            'student_id', 'type', 'amount', 'description', 'due_date', 'is_paid'
        ]));

        return redirect()->route('student-bills.index')->with('success', 'Tagihan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentBill $studentBill)
    {
        $studentBill->delete();
        return redirect()->route('student-bills.index')->with('success', 'Tagihan berhasil dihapus.');
    }
}
