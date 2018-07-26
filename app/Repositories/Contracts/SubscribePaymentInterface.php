<?php
namespace Gutropolis\Repositories\Contracts;

interface SubscribePaymentInterface
{
    
 
    function getAll();
 
	function getById($id);
 
	function create(array $attributes);
 
	function update( array $attributes,$id);
 
	function delete($id);
	function show($id);
    function preserveBeforeSave( $package, $payment_method , $user_id );
}

?>