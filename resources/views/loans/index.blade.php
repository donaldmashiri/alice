@extends('layouts.header')

@section('content')
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Your Applications Loan</h5>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Your Applications</h5>
                                </div>
                                <div class="card-body table-border-style">
                                   @if($loans->count() >0 )
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>ref#</th>
                                                    <th>Reason</th>
                                                    <th>Employment Status</th>
                                                    <th>Document</th>
                                                    <th>Amount</th>
                                                    <th>Total Interest</th>
                                                    <th>Status</th>
                                                    <th>Date Applied</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($loans as $loan)
                                                    <tr>
                                                        <td>LA-00{{ $loan->id }}</td>
                                                        <td>{{ $loan->reason }}</td>
                                                        <td>{{ $loan->employment_status }}</td>
                                                        <td>{{ $loan->documents }}</td>
                                                        <td class="font-weight-bolder">${{ $loan->amount }}.00</td>
                                                        <td>
                                                            @php
                                                                if ($loan->amount > 100) {
                                                                    $interestRate = 0.20; // 20% interest rate
                                                                } else {
                                                                    $interestRate = 0.05; // 5% interest rate
                                                                }

                                                                $totalAmount = $loan->amount + ($loan->amount * $interestRate);
                                                            @endphp
                                                            ${{ $totalAmount }}
                                                        </td>

                                                        <td class="font-weight-bolder">
                                                            @if($loan->status === "approved")
                                                                <p class="text-success h5"> {{ $loan->status }}</p>
                                                            @else
                                                                <p class="text-danger"> {{ $loan->status }}</p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $loan->created_at }}</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                       <h4 class="alert alert-danger">You have no Applications made</h4>
                                   @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
