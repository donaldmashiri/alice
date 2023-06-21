<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users =  User::all();
        return view('home')->with('loans', LoanApplication::all());
    }

    public function notify()
    {
        $user = auth()->user();
        return view('notify')->with('loans', LoanApplication::all());
    }


    public function users()
    {
        return view('users')->with('users', User::orderByDesc('id')->get());
    }

    public function records()
    {
        $loans = LoanApplication::with('user')->get();
        $totalAmount = LoanApplication::where('status', 'approved')->sum('amount');
        return view('records', ['loans' => $loans, 'totalAmount' => $totalAmount]);
    }

    public function all_reports()
    {
        $approvedLoanCount = LoanApplication::where('status', 'approved')
            ->count();

        $rejectedLoanCount = LoanApplication::where('status', 'rejected')->count();

        $totalLoanCount = LoanApplication::count();
        $totalUsers = User::count();

        $loans = LoanApplication::all();

        $totalAmount = LoanApplication::where('status', 'approved')->sum('amount');
//        $totalAmount = LoanApplication::where('status', '=', 'approved')->selectRaw('SUM(amount) as total')->first()->total;




        return view('all_reports', compact('approvedLoanCount', 'totalUsers', 'totalAmount', 'rejectedLoanCount', 'totalLoanCount'));


//
//        return view('all_reports', ['loans' => $loans, 'totalAmount' => $totalAmount]);
    }


    public function reports()
    {
        $user = auth()->user();
        $approvedLoanCount = LoanApplication::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        $rejectedLoanCount = LoanApplication::where('user_id', $user->id)
            ->where('status', 'rejected')
            ->count();

        $totalLoanCount = LoanApplication::where('user_id', $user->id)->count();

        return view('reports', compact('approvedLoanCount', 'rejectedLoanCount', 'totalLoanCount'));
    }


}
