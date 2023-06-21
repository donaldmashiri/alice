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
                                <h5 class="m-b-10">Loans Notifications</h5>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="row">
                                    @foreach($loans as $loan)
                                    <div class="col-md-6">
                                        <div class="card user-card2">
                                            <div class="card-body text-center">
                                                <h6 class="m-b-15">Loans Notifications</h6>
                                                <div class="risk-rate">
                                                    <span><b>$</b></span>
                                                </div>
                                                <h4>${{ $loan->amount }}.00</h4>
                                                <h6 class="m-b-10 m-t-10">{{ $loan->user->name }}</h6>
                                                <a href="#!" class="text-c-green b-b-success">{{ $loan->reason }}</a>
                                                <div class="row justify-content-center m-t-10 b-t-default m-l-0 m-r-0">
                                                    <div class="col m-t-15 b-r-default">
                                                        <h6 class="text-muted">RefNumber</h6>
                                                        <h6>POSB-LA-00{{ $loan->id }}</h6>
                                                    </div>
                                                    <div class="col m-t-15">
                                                        <h6 class="text-muted">Applied On</h6>
                                                        <h6>{{ $loan->created_at }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <a target="_blank"  class="btn btn-primary btn-block" href="https://www.paynow.co.zw/Payment/Link/?q=c2VhcmNoPWRvbmFsZHRvbmRlbWFzaGlyaSU0MGdtYWlsLmNvbSZhbW91bnQ9MC4wMSZyZWZlcmVuY2U9TG9hbitQYXltZW50Jmw9MA%3d%3d">Pay</a>

                                        </div>
                                    </div>


                                        <!-- Include SweetAlert CSS -->
                                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
                                        <!-- Include SweetAlert JS -->
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

                                    @if($loans->count() > 0)
                                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                            <script>
                                                // Example SweetAlert popup
                                                swal({
                                                    title: "Notifications!",
                                                    text: "You Have to Pay For You Loan",
                                                    icon: "info",
                                                });
                                            </script>
                                        @else
                                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                            <script>
                                                // Example SweetAlert popup
                                                swal({
                                                    title: "Info!",
                                                    text: "You Have No Notification",
                                                    icon: "success",
                                                });
                                            </script>
                                        @endif



                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
