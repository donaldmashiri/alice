<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
//use Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('loans.index')->with('loans', LoanApplication::where('user_id', $user->id)->orderByDesc('id')->get());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        return view('loans.create')->with('loans', LoanApplication::where('user_id', $user->id)->orderByDesc('id')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'reason' => ['required', 'max:255'],
            'employment_status' => ['required', 'max:255'],
            'amount' => ['required', 'max:255'],
            'documents' => 'required|file|mimes:pdf,docx,doc',
        ]);

        $documentsPath = $request->file('documents')->store('documents');
        $statusOptions = ['approved', 'rejected'];

        $documentsPath = $request->file('documents')->store('documents');
//        $statusOptions = ['approved', 'rejected'];

        if ($request->file('documents')->getClientOriginalName() === 'payslip.pdf') {
            $statusOptions = ['approved'];
        } else {
            $statusOptions = ['rejected'];
        }

        LoanApplication::create([
            "user_id" => auth()->user()->id,
            "reason" => request('reason'),
            "amount" => request('amount'),
            "employment_status" => request('employment_status'),
            'documents' => $documentsPath,
            'status' => Arr::random($statusOptions),
        ]);

        return redirect()->back()->with('success', 'Application was Successfully Created.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
