@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Plan Packages</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Plan Packages</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Plan Packages</h4>
            <h6 class="card-subtitle">User Plan Packages </h6>
            <a class=" btn btn-success btn-md pull-right " href="{{ route('admin.plan.create') }}"><i class="fa fa-user"></i> Create Plan Package</a>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>

                            <th>Package Type</th>

                            <th>Price</th>

                            <th>User Allowed</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $plan)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $plan->package_type }}</td>

                            <td>{{ $plan->price }}</td>

                            <td>

                              {{ $plan->users_allowed }}

                            </td>

                            <td>

                                <a class="btn btn-info" href="{{ route('admin.plan.show',$plan->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('admin.plan.edit',$plan->id) }}">Edit</a>

                                {!! Form::open(['method' => 'DELETE','route' => ['admin.plan.destroy', $plan->id],'style'=>'display:inline']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!}

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $data->render() !!}
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@section('footer_js') 
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
@endsection 