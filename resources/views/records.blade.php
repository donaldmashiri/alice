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
                                <h5 class="m-b-10">Applications Loan</h5>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Records Applicationss</h5>
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Details</th>
                                                <th>Reason</th>
                                                <th>Employment Status</th>
                                                <th>Document</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date Applied</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($loans as $loan)

                                                <tr>
                                                    <td>{{ $loan->id }}</td>
                                                    <td>
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <h6>{{ $loan->user->name }}</h6>
                                                                <h6>{{ $loan->user->email }}</h6>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ $loan->reason }}</td>
                                                    <td>{{ $loan->employment_status }}</td>
                                                    <td>
                                                        <a href="{{ Storage::url($loan->documents) }}" target="_blank">Download Document</a>
                                                    </td>
                                                    <td class="font-weight-bolder">${{ $loan->amount }}.00</td>
                                                    <td class="font-weight-bolder">
                                                        @if($loan->status === "approved")
                                                            <p class="text-success h5"> {{ $loan->status }}</p>
                                                        @else
                                                            <p class="text-danger"> {{ $loan->status }}</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $loan->created_at }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm">Send Email Reminder Of Loan</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>

                                        <h4 class="font-weight-bolder">
                                            Total Amount Loaned: ${{ $totalAmount }}.00
                                        </h4>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
