<?php
namespace Gutropolis\Repositories\Contracts;

interface StripeRepositoryInterface
{
    
 
    function makeStripePlan();
 
	function getStripePlan();
 
	function updatePlan(array $attributes);
  
	function deletePlan();
	
	function makeStripePackage();
 
  
}

?>