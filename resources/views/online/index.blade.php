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
                                                    <th>#</th>
                                                    <th>Reason</th>
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
                                                        <td>{{ $loan->reason }}</td>
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
                                                            @if($loan->status === "approved")
                                                                <a href='https://www.paynow.co.zw/Payment/Link/?q=c2VhcmNoPWRvbmFsZHRvbmRlbWFzaGlyaSU0MGdtYWlsLmNvbSZhbW91bnQ9MC4wMSZyZWZlcmVuY2U9UE9TQitMT0FOK1NZU1RFTSZsPTA%3d' target='_blank'><img src='https://www.paynow.co.zw/Content/Buttons/Medium_buttons/button_pay-now_medium.png' style='border:0' />Pay Loan</a>
                                                            @else
                                                                <p class="text-danger">Loan cant be paid</p>
                                                            @endif
                                                        </td>
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
