<?php
namespace Gutropolis\Repositories\Contracts;

interface RazorRepositoryInterface
{
    
 
    function makeRazorPlan();
 
	function getRazorPlan();
 
	function updatePlan(array $attributes);
  
	function deletePlan();
	
	function makeRazorPackage();
 
  
}

?>