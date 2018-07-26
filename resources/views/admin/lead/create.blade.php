
@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Lead Management</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Create Lead</li>
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
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                    
                                        


                       <div class="alert alert-danger print-error-msg" style="display:none">
                              <ul></ul>
                          </div>
                                            
                                            
                                            

                    {!! Form::open(array('route' => 'admin.lead.store','method'=>'POST','name'=>'leadform','id'=>'leadform','class'=>'m-t-40', 'novalidate')) !!}
                                                                        
                                                                                        
                                                                            
                                                                            
                                                                                        

                                        <div class="form-group">
                                            <h5>First Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="first_name" placeholder="First Name" class="form-control" required data-validation-required-message="First Name is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Last Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="last_name"  placeholder="Last Name" class="form-control" required data-validation-required-message="Last name is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Lead Owner<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="lead_owner"  placeholder="Lead Owner" class="form-control" required data-validation-required-message="Lead Owner is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Company<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="company"  placeholder="Company" class="form-control" required data-validation-required-message="Company is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Title / Position<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="title_or_position"  placeholder="Title/Position" class="form-control" required data-validation-required-message="Title.Position  is required"> </div>
                                                                                
                                                </div><div class="form-group">
                                            <h5>Phone<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="phone"  placeholder="Application Name" class="form-control" required data-validation-required-message="phone is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Mobile<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="mobile"placeholder="Mobile" class="form-control" required data-validation-required-message=" Mobile is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Fax<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="fax"  placeholder="Fax" class="form-control" required data-validation-required-message="Fax is required"> </div>
                                                                                
                                                </div>
                                                
                                            <div class="form-group">
                                              <h5>Email<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="email" name="email"  placeholder="Email" class="form-control" required data-validation-required-message="Email is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Lead Status<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="lead_status"  placeholder="Lead Status" class="form-control" required data-validation-required-message="Lead Status is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Rating<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="rating"  placeholder="Rating" class="form-control" required data-validation-required-message="Rating is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Address<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="address"  placeholder="Address" class="form-control" required data-validation-required-message="Address is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Industry<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="Industry"  placeholder="Industry" class="form-control" required data-validation-required-message="Industry is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Lead Source<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="lead_source"  placeholder="Lead Source" class="form-control" required data-validation-required-message="Lead Source is required"> </div>
                                                                                
                                                </div>
                                                
                                                <div class="form-group">
                                              <h5>Annual Revenue<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="annual_revenue"  placeholder="Anual Revenue" class="form-control" required data-validation-required-message="Annual Revenue is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Number of Employees<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="number_of_employees"  placeholder="Number of employees" class="form-control" required data-validation-required-message="Number of Employees is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Website<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="website"  placeholder="Website" class="form-control" required data-validation-required-message="Website is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>System ID<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="system_col_id"  placeholder="System  id" class="form-control" required data-validation-required-message="System id is required"> </div>
                                                                                
                                                </div>
                                               
                                                
                                                                            
                                                                            
                                            <div class="text-xs-right m-b-40">
                                            <button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-inverse" href="{{route('admin.lead.index')}}">Cancel</a>
                                            
                                            </div>
                                            {!! Form::close() !!}
                                                                        
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    

                 </div>
                @endsection
@section('footer_js') 
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
     <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
     <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
     <script src="{{ URL::to('admin/assets/js/module/datatable/leadData.js') }}"></script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection 
 

