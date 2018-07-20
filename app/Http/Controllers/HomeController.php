<?php

namespace Gutropolis\Http\Controllers;

use Illuminate\Http\Request;

use Gutropolis\Repositories\PlanPackageRepository; 
use Gutropolis\Repositories\PlansRepository;

use Gutropolis\PlanPackage;
use Gutropolis\Plans;




class HomeController extends Controller
{
   
   
   
	// space that we can use the repository from
   protected $packagemodel;
	protected $planmodel;

   public function __construct(PlanPackage $package,Plans $plan)
   {
       // set the model
        $this->packagemodel = new PlanPackageRepository($package);
		$this->planmodel = new PlansRepository($plan);
 
   }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$planpkgData =$this->packagemodel->getAll(); 
		
		$slug='abc';
		$pkgid  =$this->packagemodel->getIdBySlug($slug);
		
		return view('front.home.index',compact('planpkgData')); 
    }
}
