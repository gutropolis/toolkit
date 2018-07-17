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
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">  
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title">User Plan Packages</h4>
                        <h6 class="card-subtitle">User Plan Packages </h6>
                    </div>
                    <div class="col-sm-7 text-right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addPlan"><i class="fa fa-plus"></i> Add New</button>    
                    </div>
                </div>
                
                                <div class="table-responsive m-t-40">
                                    <table id="plandata" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Package Type</th>
                                                <th>Price</th>
                                                
                                                <th>User Allowed</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    </table>

                                </div>
                <!-- Add Model Start here ------->
                <div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-labelledby="addModel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Create New Plan Packages</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            {!! Form::open(array('route' => 'admin.plan.store','method'=>'POST','name'=>'planform','id'=>'planform')) !!}
                                            <div class="modal-body">
                                                
                                                    <div class="form-group">
                                                        <label for="plan_id" class="control-label">Plan ID:</label>
                                                        <select name="plan_id" class="form-control">
                                                         <option value="">Select Plan ID</option>

                                                         @if(!empty($planTypeID))

                                                         @foreach($planTypeID as $planid)
                                                         <option value='{{$planid->id}}'>{{$planid->title}}</option>
                                                         @endforeach

                                                        @endif
                                                   </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Package Type" class="control-label">Plan ID:</label>
                                                        <select name="package_type" class="form-control">
                                                        <option value="">Select Package Type</option>
                                                         <option value='1'>A</option>
                                                         <option value='2'>B</option>
                                                        <option value='3'>C</option>
                                                        <option value='4'>D</option>
                                                        <option value='5'>E</option>
                                                   </select>

                                                    </div>

                                                     <div class="form-group">
                                                        <label for="price" class="control-label">Price:</label>
                                                        <input type="text" name="price" class="form-control" placeholder="Price" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="price_month" class="control-label">Price Month:</label>
                                                        <input type="text" name="price_month" class="form-control" >
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="price_yearly" class="control-label">Price Yearly:</label>
                                                        <input type="text" name="price_yearly" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="have_trial" class="control-label">Have Trial:</label>
                                                        <div class="demo-radio-button">
                                                            <input name="have_trial" type="radio" id="Yes" value="1" checked />
                                                            <label for="Yes">Yes</label>
                                                            <input name="have_trial" type="radio" id="No" value="0"  />
                                                            <label for="No">No</label>
                                  
                                                     </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="users_allowed" class="control-label">User Allowed:</label>
                                                       <div class="demo-radio-button">
                                                            <input name="users_allowed" type="radio" id="usYes" value="1" checked />
                                                            <label for="usYes">Yes</label>
                                                            <input name="users_allowed" type="radio" id="usNo" value="0"  />
                                                            <label for="usNo">No</label>
                                  
                                                     </div>
                                                     
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="users_allowed" class="control-label">Support Available:</label>
                                                       <div class="demo-radio-button">
                                                            <input name="support_available" type="radio" id="saYes" value="1" checked />
                                                            <label for="saYes">Yes</label>
                                                            <input name="support_available" type="radio" id="saNo" value="0"  />
                                                            <label for="saNo">No</label>
                                  
                                                     </div>
                                                     
                                                    </div>

                                                    
                                                 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                 
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                
                <!-- End Model Here ------------>
                <!-- Edit Model Here ------------>
                <div class="modal fade" id="editPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                       
                         <h4 class="modal-title" id="myModalLabel">Edit Plan Package</h4> 
                          <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×</span><span class="sr-only">Close</span></button>
                      </div>
                      <form id="editPlandata" name="editPlandata" action="/admin/update" method="get" >
                      <div class="modal-body">
                           
                                                    <div class="form-group">
                                                        <label for="plan_id" class="control-label">Plan ID:</label>
                                                        <select name="plan_id" id="plan_id" class="form-control">
                                                         <option value="">Select Plan ID</option>

                                                         @if(!empty($planTypeID))

                                                         @foreach($planTypeID as $planid)
                                                         <option value='{{$planid->id}}'>{{$planid->title}}</option>
                                                         @endforeach

                                                        @endif
                                                   </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Package Type" class="control-label">Plan ID:</label>
                                                        <select name="package_type" id="package_type" class="form-control">
                                                        <option value="">Select Package Type</option>
                                                         <option value='1'>A</option>
                                                         <option value='2'>B</option>
                                                        <option value='3'>C</option>
                                                        <option value='4'>D</option>
                                                        <option value='5'>E</option>
                                                   </select>

                                                    </div>

                                                     <div class="form-group">
                                                        <label for="price" class="control-label">Price:</label>
                                                        <input type="text" name="price" id="price" class="form-control" >
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="price_month" class="control-label">Price Month:</label>
                                                        <input type="text" name="price_month" id="price_month" class="form-control" >
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="price_yearly" class="control-label">Price Yearly:</label>
                                                        <input type="text" id="price_yearly" name="price_yearly" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="have_trial" class="control-label">Have Trial:</label>
                                                        <div class="demo-radio-button">
                                                            <input name="have_trial" type="radio" id="EYes" value="1"  />
                                                            <label for="EYes">Yes</label>
                                                            <input name="have_trial" type="radio" id="ENo" value="0" />
                                                            <label for="ENo">No</label>
                                  
                                                     </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="users_allowed" class="control-label">User Allowed:</label>
                                                        <div class="demo-radio-button">
                                                            <input name="users_allowed" type="radio" id="EusYes" value="1"  />
                                                            <label for="EusYes">Yes</label>
                                                            <input name="users_allowed" type="radio" id="EusNo" value="0"  />
                                                            <label for="EusNo">No</label>
                                  
                                                     </div>
                                                     
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="users_allowed" class="control-label">Support Available:</label>
                                                        <div class="demo-radio-button">
                                                            <input name="support_available" type="radio" id="EsaYes" value="1"/>
                                                            <label for="EsaYes">Yes</label>
                                                            <input name="support_available" type="radio" id="EsaNo" value="0"  />
                                                            <label for="EsaNo">No</label>
                                  
                                                     </div>
                                                     
                                                    </div>
                                                    <input type="hidden" id="planid" name="planid"/>
                                                    
                                                 


                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                
                <!-- Edit Model Here ---------->
                 <!-- Show model Here  -->
                 <div class="modal fade" id="showPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                     
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                               
                                                 <h4 class="modal-title" id="myModalLabel">Show Details</h4> 
                                                  <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×</span><span class="sr-only">Close</span></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-group">
                                                <label >Plan id is : </label>  <strong id="showplanid"> </strong>
                                               </div>
                                               <div class="form-group">
                                                <label >Price is :  </label>  <strong id="showprice"> </strong>
                                               </div>
                                               <div class="form-group">
                                                <label >Price Monthly is : </label>  <strong id="showpricemonth"> </strong>
                                               </div>
                                               <div class="form-group">
                                                <label >User Allow is  is : </label>  <strong id="showusallow"> </strong>
                                               </div>
                                              

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>


                 <!-- Show model Here  -->

                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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
  
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ URL::to('admin/assets/js/module/datatable/planpackagedata.js') }}"></script>
    <!-- start - This is for export functionality only -->
      
    
@endsection 