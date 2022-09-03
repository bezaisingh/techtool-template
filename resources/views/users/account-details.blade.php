@extends('layouts.app')

@section('title', 'Add Accounts')

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
            <h6 class="m-0 font-weight-bold text-primary">Add Account Details</h6>
        </div>
        <form method="POST" action="{{route('users.saveAccount')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">


                {{-- User --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>User</label>
                        <select class="form-control form-control-user" name="user">
                            <option selected>Select User</option>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                            @endforeach
                        </select>
                        @error('user')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

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
                            type="text" 
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