@extends('layouts.app')

@section('title', 'Report')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-1"  onclick="toggleSmartSearch();"> <i class="fa fa-search"
                        aria-hidden="true"></i> Search
                        </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>
                
                
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Report</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="smartSearchFieldsDiv" style="display: none;">
                       <form class="form-inline" method="GET">
                       <div class="form-group mb-2">
                        <label for="filter" class="col-sm-2 col-form-label">Name</label>

                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mb-1" style="height: 37px;;">Filter</button>
                      </form>
                   </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th >@sortablelink('first_name','Name')</th>
                                <th >Designation</th>
                                <th >Deposits</th>
                                <th >Previous Balance</th>
                                <th >Interest On CD</th>
                                <th >Interest On Share</th>
                                <th >Total</th>
                                <th >Share Capital</th>                             
                                <th >Long Term Loan</th>
                                <th >Short Term Loan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->designation }}</td>
                                    <td>{{ $user->compulsory_deposit }}</td>
                                    <td></td>
                                    <td>{{ $user->interest_on_cd }}</td>
                                    <td>{{ $user->no_of_shares_hold }}</td>
                                    <td>{{ $user->total_balance }}</td>
                                    <td></td>
                                    <td>{{ $user->SHORT }}</td>
                                    <td>{{ $user->LONG }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('users.delete-modal')
    @include('users.view-modal')

@endsection

@section('scripts')
    
@endsection

<script>
    function toggleSmartSearch() {
    $("#smartSearchFieldsDiv").toggle();
}
 </script>
