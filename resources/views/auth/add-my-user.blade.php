@extends('layouts.app')

@section('title', 'Add Users')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
        </div>
        <form method="POST" action="{{route('users.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                {{-- Salutation --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Salutation</label>
                        <!-- <input 
                            type="text" 
                            class="form-control form-control-user @error('salutation') is-invalid @enderror" 
                            id="salutation"
                            placeholder="Salutation" 
                            name="salutation" 
                            value="{{ old('salutation') }}"> -->

                        <select class="form-control form-control-user" name="salutation">
                            <option selected disabled>Select Salutation</option>
                            <option value="Prof." selected>Prof.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss.">Miss.</option>
                        </select>

                        @error('salutation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>First Name</label>
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

                    {{-- Middle Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Middle Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('middle_name') is-invalid @enderror" 
                            id="middle_name"
                            placeholder="Middle Name" 
                            name="middle_name" 
                            value="{{ old('middle_name') }}">

                        @error('middle_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Last Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('last_name') is-invalid @enderror" 
                            id="exampleLastName"
                            placeholder="Last Name" 
                            name="last_name" 
                            value="{{ old('last_name') }}">

                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Designation --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Designation</label>
                        <select class="form-control form-control-user" name="designation" id="designation">
                            <option selected disabled>Select Salutation</option>
                            <option value="VC">Vice Chancellor</option>
                            <option value="DR">Deputy Registrar</option>
                            <option value="AR">Assistant Registrar</option>
                            <option value="PRO">Public Relation Officer</option>
                            <option value="SO">Section Officer</option>
                            <option value="ASST">Assistant</option>
                            <option value="PS">Personal Secretary</option>
                            <option value="UDC">Upper Division Clerk</option>
                            <option value="LDC">Lower Division Clerk</option>
                            <option value="JE">Junior Engineer</option>
                            <option value="DRIVER">Driver</option>
                            <option value="COOK">Cook</option>
                            <option value="MTS">Multi Tasking Staff</option>
                            <option value="G-OPTR">G-OPTR</option>
                            <option value="SAFAI">Safai</option>
                            <option value="MALI">Mali</option>
                            <option value="K-ATTD">K-ATTD</option>
                            <option value="SPA">SPA</option>
                            <option value="PRASSTT">Public Relation Assistant</option>
                            <option value="JLIBASSTT">Junior Library Assistant</option>
                           


                        </select>

                        @error('designation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Email</label>
                        <input 
                            type="email" 
                            class="form-control form-control-user @error('email') is-invalid @enderror" 
                            id="exampleEmail"
                            placeholder="Email" 
                            name="email" 
                            value="{{ old('email') }}">

                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Mobile Number</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('mobile_number') is-invalid @enderror" 
                            id="exampleMobile"
                            placeholder="Mobile Number" 
                            name="mobile_number" 
                            value="{{ old('mobile_number') }}">

                        @error('mobile_number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Date of Birth --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date of Birth</label>
                        <input 
                            type="date" 
                            class="form-control form-control-user @error('dob') is-invalid @enderror" 
                            id="dob"
                            placeholder="First Name" 
                            name="dob" 
                            value="{{ old('dob') }}">

                        @error('dob')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Date Of Joining in AU --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date Of Joining in AU</label>
                        <input onchange="getLenthOfService(this.value)"
                            type="date" 
                            class="form-control form-control-user @error('date_of_joining') is-invalid @enderror" 
                            id="date_of_joining"
                            placeholder="Date Of Joining in AU" 
                            name="date_of_joining" 
                            value="{{ old('date_of_joining') }}">

                        @error('date_of_joining')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Length Of Service(Auto fetch) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Length Of Service(Auto fetch)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('length_of_service') is-invalid @enderror" 
                            id="length_of_service"
                            placeholder="Length Of Service" 
                            name="length_of_service" 
                            value="{{ old('length_of_service') }}" readonly>

                        @error('length_of_service')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Retirement Age</label>
                        <!-- <input 
                            type="text" 
                            class="form-control form-control-user @error('retirement_age') is-invalid @enderror" 
                            id="retirement_age"
                            placeholder="Retirement Age" 
                            name="retirement_age" 
                            value="{{ old('retirement_age') }}"> -->
                            <select class="form-control form-control-user" name="retirement_age"  onchange="getRetirementAge(this.value)">
                            <option selected disabled>Select Age</option>
                            <option value="60" selected>60</option>
                            <option value="62">62</option>
                            <option value="65">65</option>
                        </select>
                            
                        @error('retirement_age')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Date Of Retirement --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date Of Retirement</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('date_of_retirement') is-invalid @enderror" 
                            id="date_of_retirement"
                            placeholder="Date Of Retirement" 
                            name="date_of_retirement" 
                            value="{{ old('date_of_retirement') }}" readonly>

                        @error('date_of_retirement')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Month and Year Of Retirement --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Month and Year Of Retirement</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('month_and_year_of_retirement') is-invalid @enderror" 
                            id="month_and_year_of_retirement"
                            placeholder="Month and Year Of Retirement" 
                            name="month_and_year_of_retirement" 
                            value="{{ old('month_and_year_of_retirement') }}" readonly>

                        @error('month_and_year_of_retirement')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                    {{-- Basic Pay --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Basic Pay</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('basic_pay') is-invalid @enderror" 
                            id="basic_pay"
                            placeholder="Basic Pay" 
                            name="basic_pay" onchange="getIncrementAndCurrentBasic(this.value)"
                            value="{{ old('basic_pay') }}">

                        @error('basic_pay')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Increment 3%(Auto Fetch) --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Increment 3%(Auto Fetch)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('increment_three') is-invalid @enderror" 
                            id="increment_three" readonly
                            placeholder="Increment 3%" 
                            name="increment_three" 
                            value="{{ old('increment_three') }}">

                        @error('increment_three')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Increment Month --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Increment Month</label>
                        <!-- <input 
                            type="text" 
                            class="form-control form-control-user @error('increment_month') is-invalid @enderror" 
                            id="increment_month"
                            placeholder="Increment Month"
                            name="increment_month" 
                            value="{{ old('increment_month') }}"> -->

                            <select class="form-control form-control-user" name="increment_month">
                            <option selected disabled>Select Status</option>
                            <option value="01-01" selected>1st January</option>
                            <option value="01-07">1st July</option>
                        </select>

                        @error('increment_month')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Current Basic --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Current Basic</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('current_basic') is-invalid @enderror" 
                            id="current_basic" readonly
                            placeholder="Current Basic" 
                            name="current_basic" 
                            value="{{ old('current_basic') }}">

                        @error('current_basic')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Role</label>
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
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    {{-- Date of Joining inth The Society --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date of Membership in the Society</label>
                        <input 
                            type="date" 
                            class="form-control form-control-user @error('date_of_membership_in_the_society') is-invalid @enderror" 
                            id="date_of_membership_in_the_society"
                            placeholder="Date of Membership in the Society" 
                            name="date_of_membership_in_the_society" 
                            value="{{ old('date_of_membership_in_the_society') }}">

                        @error('date_of_membership_in_the_society')
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