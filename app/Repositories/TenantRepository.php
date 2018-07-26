<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\TenantRepositoryInterface;
use Gutropolis\Tenant; 

class TenantRepository  implements TenantRepositoryInterface
{
        protected $tenant;
        
        public function __construct(Tenant $tenant)
        {
                $this->tenant = $tenant;
        }
        
        // Get all instances of model
        public function getAll()
        {
            return $this->tenant->get();
        }
		
		 
        // Get all instances of model
        public function getById($id)
        {
			return $this->tenant->find($id);
             
        }
     
        // create a new record in the database
        public function create(array $data)
        {
            return $this->tenant->create($data);
        }

        // update record in the database
        public function update(array $data, $id)
        { 
		 return $this->tenant->find($id)->update($data);
        }

        // remove record from the database
        public function delete($id)
        {
            return $this->tenant->find($id)->delete();
        }

        // show the record with the given id
        public function show($id)
        {
            return $this->tenant-findOrFail($id);
        }

        
}
?>