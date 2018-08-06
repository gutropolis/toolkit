@extends('front.layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Payment Status</div>
                   <div class="card-body">
				     
							   @if ( session('data.status') =='1')  
								   <h3 class="card-title">Congratulation!!</h3>
										<h4 class="card-title">{{session('data.msg')}}</h4>
									<p>After a set amount of time, a dialog is shown to the user with the option to 
									either log out now, or stay connected. If log out now is selected, 
									the page is redirected to a logout URL. If stay connected is selected, a keep-alive URL 
									is requested through AJAX. If no options is selected after another set amount of time, 
									the page is automatically redirected to a timeout URL.</p>
							   @else
										<div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                            <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Sorry</h3> {{session('data.msg')}}
											<br />
											<a href="{{ URL::to('/plan/') }}/{{ session('data.slug') }}" class="btn btn-info"  >
													<i class="ti-plus text" aria-hidden="true"></i> Go Back
											</a>
                                        </div>
								 
								@endif
                                
                                
                    </div>
              
				</div> 
			<!-- Column -->
        </div>
    </div>
</div>
@endsection