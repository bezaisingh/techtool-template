@extends('layouts.app')

@section('title', 'Add Users')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Account Detail</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add User Details</h6>
        </div>
        <form method="POST" action="{{route('users.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                {{-- Date of Membership in the Society --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date of Membership in the Society</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="date_of_membership_in_the_society"
                            placeholder="Date of Membership in the Society" 
                            name="date_of_membership_in_the_society" 
                            value="{{ old('date_of_membership_in_the_society') }}">

                        @error('date_of_membership_in_the_society')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Compulsory Deposit 5%(Edit) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Compulsory Deposit 5%(Edit)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="compulsory_deposit"
                            placeholder="Compulsory Deposit 5%" 
                            name="compulsory_deposit" 
                            value="{{ old('compulsory_deposit') }}">

                        @error('compulsory_deposit')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Interest on CD 7.5%(Edit) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Interest on CD 7.5%(Edit)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="interest_on_cd"
                            placeholder="Interest on CD 7.5%" 
                            name="interest_on_cd" 
                            value="{{ old('interest_on_cd') }}">

                        @error('interest_on_cd')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- No. Of Shares Hold(Edit) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>No. Of Shares Hold(Edit)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('last_name') is-invalid @enderror" 
                            id="no_of_shares_hold"
                            placeholder="No. Of Shares Hold(Edit)" 
                            name="no_of_shares_hold" 
                            value="{{ old('no_of_shares_hold') }}">

                        @error('no_of_shares_hold')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Dividend on Share --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Dividend on Share</label>
                        <input 
                            type="email" 
                            class="form-control form-control-user @error('email') is-invalid @enderror" 
                            id="dividend_on_share"
                            placeholder="Dividend on Share" 
                            name="dividend_on_share" 
                            value="{{ old('dividend_on_share') }}">

                        @error('dividend_on_share')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Total Balance --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Total Balance</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('mobile_number') is-invalid @enderror" 
                            id="total_balance"
                            placeholder="Total Balance" 
                            name="total_balance" 
                            value="{{ old('total_balance') }}">

                        @error('total_balance')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Final Withdrawal --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Final Withdrawal</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="final_withdrawal"
                            placeholder="Final Withdrawal" 
                            name="final_withdrawal" 
                            value="{{ old('final_withdrawal') }}">

                        @error('final_withdrawal')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

           
                    <!-- Horizontal Line -->
                    <hr style="width:100%", size="3", color="black">
                   
             

                    {{-- Short Term Loan --}}
                    <hr class="bg-danger border-2 border-top border-danger">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Short Term Loan</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="short_term_loan"
                            placeholder="Short Term Loan" 
                            name="short_term_loan" 
                            value="{{ old('short_term_loan') }}">

                        @error('short_term_loan')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Eligibility Criteria(1 Year from the Date of Membership) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Eligibility Criteria(1 Year from the Date of Membership)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="eligibility_criteria"
                            placeholder="Eligibility Criteria" 
                            name="eligibility_criteria" 
                            value="{{ old('eligibility_criteria') }}">

                        @error('eligibility_criteria')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Loan Applied For --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Loan Applied For</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="loan_applied_for"
                            placeholder="Loan Applied For" 
                            name="loan_applied_for" 
                            value="{{ old('loan_applied_for') }}">

                        @error('loan_applied_for')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Admissible Loan(Four times of Basic) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Admissible Loan(Four times of Basic) </label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="admissible_loan"
                            placeholder="Admissible Loan" 
                            name="admissible_loan" 
                            value="{{ old('admissible_loan') }}">

                        @error('admissible_loan')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Actual Admissible Loan(Auto Fetch) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Actual Admissible Loan(Auto Fetch)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="actual_admissible_loan"
                            placeholder="Actual Admissible Loan" 
                            name="actual_admissible_loan" 
                            value="{{ old('actual_admissible_loan') }}">

                        @error('actual_admissible_loan')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                    {{-- Actual Loan To Disbursed(Manual) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Actual Loan To Disbursed(Manual)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="actual_loan_disbursed"
                            placeholder="Actual Loan To Disbursed" 
                            name="actual_loan_disbursed" 
                            value="{{ old('actual_loan_disbursed') }}">

                        @error('actual_loan_disbursed')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Interest 8%(Edit) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Interest 8%(Edit)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="interest_8pc"
                            placeholder="Interest 8%" 
                            name="interest_8pc" 
                            value="{{ old('interest_8pc') }}">

                        @error('interest_8pc')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- No. Of Installment(Maximum 18) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>No. Of Installment(Maximum 18)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="no_of_installment"
                            placeholder="No. Of Installment" 
                            name="no_of_installment" 
                            value="{{ old('no_of_installment') }}">

                        @error('no_of_installment')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Principal(Reducing) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Principal(Reducing)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="principal"
                            placeholder="Principal(Reducing)" 
                            name="principal" 
                            value="{{ old('principal') }}">

                        @error('principal')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Interest --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Interest</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="interest"
                            placeholder="Interest" 
                            name="interest" 
                            value="{{ old('interest') }}">

                        @error('interest')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Total Amount To Be Deducted from Salary --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Total Amount To Be Deducted from Salary</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="total_amt_to_be_deduced_from_salary"
                            placeholder="Total Amount To Be Deducted from Salary" 
                            name="total_amt_to_be_deduced_from_salary" 
                            value="{{ old('total_amt_to_be_deduced_from_salary') }}">

                        @error('total_amt_to_be_deduced_from_salary')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- Outstanding Balance --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Outstanding Balance</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="outstanding_balance"
                            placeholder="Outstanding Balance" 
                            name="outstanding_balance" 
                            value="{{ old('outstanding_balance') }}">

                        @error('outstanding_balance')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Deduction List Print --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Deduction List Print</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="deduction_list_print"
                            placeholder="Deduction List Print" 
                            name="deduction_list_print" 
                            value="{{ old('deduction_list_print') }}">

                        @error('deduction_list_print')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <!-- Horizontal Line -->
                    <hr style="width:100%", size="3", color="black">                   

                    {{-- Long term Loan --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Long term Loan</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="long_term_loan"
                            placeholder="Long term Loan" 
                            name="long_term_loan" 
                            value="{{ old('long_term_loan') }}">

                        @error('long_term_loan')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    
                    {{-- Eligibility Criteria(1 Year from the Date of Membership) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Eligibility Criteria(1 Year from the Date of Membership)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="eligibility_criteria_long_term"
                            placeholder="Eligibility Criteria" 
                            name="eligibility_criteria_long_term" 
                            value="{{ old('eligibility_criteria_long_term') }}">

                        @error('eligibility_criteria_long_term')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Loan Applied For --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Loan Applied For</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="loan_applied_for_long_term"
                            placeholder="Loan Applied For" 
                            name="loan_applied_for_long_term" 
                            value="{{ old('loan_applied_for_long_term') }}">

                        @error('loan_applied_for_long_term')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Admissible Loan(30x of Basic Or 15x of CD whicever is less)(edit) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Admissible Loan(30x of Basic Or 15x of CD whicever is less)(edit)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="admissible_loan_long_term"
                            placeholder="Admissible Loan" 
                            name="admissible_loan_long_term" 
                            value="{{ old('admissible_loan_long_term') }}">

                        @error('admissible_loan_long_term')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Actual Admissible Loan(Auto Fetch) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Actual Admissible Loan(Auto Fetch)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="actual_admissible_loan_long_term"
                            placeholder="Actual Admissible Loan" 
                            name="actual_admissible_loan_long_term" 
                            value="{{ old('actual_admissible_loan_long_term') }}">

                        @error('actual_admissible_loan_long_term')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                    {{-- Actual Loan To Disbursed(Manual) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Actual Loan To Disbursed(Manual)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="actual_loan_to_disbursed_long_term"
                            placeholder="Actual Loan To Disbursed(Manual)" 
                            name="actual_loan_to_disbursed_long_term" 
                            value="{{ old('actual_loan_to_disbursed_long_term') }}">

                        @error('actual_loan_to_disbursed_long_term')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Interest 8%(Edit)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="First Name" 
                            name="first_name" 
                            value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>No. Of Installment(Maximum 150)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="First Name" 
                            name="first_name" 
                            value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Principal(Reducing)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="First Name" 
                            name="first_name" 
                            value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Interest</label>
                        <select class="form-control form-control-user @error('role_id') is-invalid @enderror" name="role_id">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Total Amount To Be Deducted from Salary </label>
                        <select class="form-control form-control-user" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Outstanding Balance</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="First Name" 
                            name="first_name" 
                            value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Deduction List Print</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="First Name" 
                            name="first_name" 
                            value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                  

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection