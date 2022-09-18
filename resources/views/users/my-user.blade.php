@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
@hasrole('Admin')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
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
 @endhasrole
        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Details</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th >Name</th>
                                <th >Designation</th>
                                <th >Date Of Joining</th>
                                <th >Length Of Service</th>
                                <th >Retirement Age</th>
                                <th >Date Of Retirement</th>
                                <th >@sortablelink('email','Email')</th>
                                <th >Mobile</th>                             
                                <th >DOB</th>
                                <th >Role</th>
                                @hasrole('Admin')
                                <th >Status</th>
                                @endhasrole
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td id="nameId">{{ $user->full_name }}</td>
                                    <td>{{ $user->designation }}</td>
                                    <td>{{ $user->date_of_joining }}</td>
                                    <td>{{ $user->length_of_service }}</td>
                                    <td>{{ $user->retirement_age }}</td>
                                    <td>{{ $user->date_of_retirement }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile_number }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td>
                                    @hasrole('Admin')
                                    <td>
                                        @if ($user->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($user->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    @endhasrole
                                    <td style="display: flex">
                                    @hasrole('Admin')
                                        <a class="btn btn-success m-2" href="#" data-toggle="modal" data-target="#viewModal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                      
                                        @if ($user->status == 0)
                                            <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 1]) }}"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($user->status == 1)
                                            <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 0]) }}"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                    @endhasrole
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        @hasrole('Admin')
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @endhasrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('users.delete-modal')
    @include('users.view-modal')

@endsection

@section('scripts')
    
@endsection

<script type="text/javascript">
    function toggleSmartSearch() {
    $("#smartSearchFieldsDiv").toggle();
    }

    function getAndSetName() {
    var name= $("#nameId").html();
    $("#profileNAmeId").html(name);
    console.log(name);

    }
 window.onload = getAndSetName;


 </script>
