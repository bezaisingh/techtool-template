@extends('layouts.app')

@section('title', 'Accounts List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('users.account') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New Accounts
                    </a>
                </div>
                <!-- <div class="col-md-4">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-1"  onclick="toggleSmartSearch();"> <i class="fa fa-search"
                        aria-hidden="true"></i> Search
                        </a>
                </div> -->
                <!-- <div class="col-md-4">
                    <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div> -->
                
                
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Accounts</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="smartSearchFieldsDiv" style="display: none;">
                       <form class="form-inline" method="GET">
                       <div class="form-group mb-2">
                        <!-- <label for="filter" class="col-sm-2 col-form-label">Name</label> -->
                       
                        </div>
                        <!-- <button type="submit" class="btn btn-sm btn-primary mb-1" style="height: 37px;;">Filter</button> -->
                      </form>
                   </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th >First Name</th>
                                <th >Last Name</th>
                                <th >Date Of Membership</th>
                                <th >Compusory Deposits</th>
                                <th >Interest On CD</th>
                                <th >No. Of Shares Hold</th>                             
                                <th >Dividend On Share</th>
                                <th >Total Balance</th>
                                <th >Final Withdrawal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accountList as $user)
                                <tr>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->date_of_membership_in_the_society }}</td>
                                    <td>{{ $user->compulsory_deposit }}</td>
                                    <td>{{ $user->interest_on_cd }}</td>
                                    <td>{{ $user->no_of_shares_hold }}</td>
                                    <td>{{ $user->dividend_on_share }}</td>
                                    <td>{{ $user->total_balance }}</td>
                                    <td>{{ $user->final_withdrawal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @include('users.delete-modal')

@endsection

@section('scripts')
    
@endsection

<script>
    function toggleSmartSearch() {
    $("#smartSearchFieldsDiv").toggle();
}
 </script>
