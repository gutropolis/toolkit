@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
				 
                    <!-- Price Start Here ------------------------------------------>
                                <div class="row pricing-plan">
								@foreach ($planpkgData as $pkg)
                                    <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                                        <div class="pricing-box">
                                            <div class="pricing-body b-l">
                                                <div class="pricing-header">
													<h4 class="price-lable text-white bg-warning"> Popular</h4>
                                                    <h4 class="text-center">{{ $pkg->plan->title }}</h4>
                                                    <h2 class="text-center"><span class="price-sign">$</span>{{ $pkg->price  }}</h2>
                                                    <p class="uppercase">per {{ $pkg->package_type  }}</p>
                                                </div>
                                                <div class="price-table-content">
                                                    <div class="price-row"><i class="icon-user"></i> {{ $pkg->users_limit }} Members</div>
                                                    <div class="price-row"><i class="icon-screen-smartphone"></i> @if($pkg->support_available=='1') 
														Support Available
													@endif</div>
                                                    <div class="price-row"><i class="icon-drawar"></i> 50GB Storage</div>
                                                    <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                                    <div class="price-row">
													    @if (Auth::check())
														  <a class="btn btn-success waves-effect waves-light m-t-20"   href="{{ URL::to('/plan/') }}/{{ $pkg->slug }}">Change</a>
														@else
														  <a class="btn btn-success waves-effect waves-light m-t-20"   href="{{ URL::to('/login') }}">Login to Buy</a>
														@endif
																												
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								@endforeach	
                                     
                                </div>
							 <!-- Price End Here ----------------->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection