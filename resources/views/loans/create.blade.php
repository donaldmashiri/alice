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
                                <h5 class="m-b-10">Application For A Loan</h5>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Application For A Loan</h5>
                                </div>
                                <div class="card-body">
                                    @include('partials.errors')
                                    <form action="{{ route('loans.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="text-primary"  for="reason">Reason for Loan:</label>
                                                    <select class="form-control" id="reason" name="reason">
                                                        <option value="">Select Reason</option>
                                                        <option value="home_renovation">Home Renovation</option>
                                                        <option value="education_expenses">Education Expenses</option>
                                                        <option value="medical_bills">Medical Bills</option>
                                                        <option value="debt_consolidation">Debt Consolidation</option>
                                                        <option value="business_expansion">Business Expansion</option>
                                                        <option value="car_purchase">Car Purchase</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="text-primary" for="employment_status">Employment Status:</label>
                                                    <select class="form-control" id="employment_status" name="employment_status">
                                                        <option value="">Select Employment Status</option>
                                                        <option value="employed">Employed</option>
                                                        <option value="self_employed">Self-Employed</option>
                                                        <option value="unemployed">Unemployed</option>
                                                        <option value="retired">Retired</option>
                                                        <option value="student">Student</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="text-primary" for="documents">Upload Documents:</label>
                                                    <input type="file" class="form-control" id="documents" name="documents" accept=".pdf,.docx,.doc" required>

                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="text-primary" for="documents">Amount ($):</label>
                                                    <input type="number" class="form-control" id="amount" name="amount" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 mt-2">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                                        <label class="form-check-label" for="gridCheck">Agree to the terms and conditions</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Submit</button>
                                                </div>
                                            </div>
                                            <script>
                                                // Get the checkbox and submit button elements
                                                var checkbox = document.getElementById('gridCheck');
                                                var submitBtn = document.getElementById('submitBtn');

                                                // Add event listener to the checkbox
                                                checkbox.addEventListener('change', function() {
                                                    // Enable or disable the submit button based on the checkbox status
                                                    submitBtn.disabled = !checkbox.checked;
                                                });
                                            </script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
