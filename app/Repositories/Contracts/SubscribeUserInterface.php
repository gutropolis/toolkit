<?php
namespace Gutropolis\Repositories\Contracts;

interface SubscribeUserInterface
{
    
 
    function getAll();
 
	function getById($id);
 
	function create(array $attributes);
 
	function update( array $attributes,$id);
 
	function delete($id);
	function show($id); 
}

?>