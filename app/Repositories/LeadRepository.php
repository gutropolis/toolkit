<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\LeadRepositoryInterface;
use Gutropolis\Lead; 

class LeadRepository  implements LeadRepositoryInterface
{
        protected $lead;
        
        public function __construct(Lead $lead)
        {
                $this->lead = $lead;
        }
        
        // Get all instances of model
        public function getAll()
        {
            return $this->lead->get();
        }
		
		 
        // Get all instances of model
        public function getById($id)
        {
			return $this->lead->find($id);
             
        }
     
        // create a new record in the database
        public function create(array $data)
        {
            return $this->lead->create($data);
        }

        // update record in the database
        public function update(array $data, $id)
        { 
		 return $this->lead->find($id)->update($data);
        }

        // remove record from the database
        public function delete($id)
        {
            return $this->lead->find($id)->delete();
        }

        // show the record with the given id
        public function show($id)
        {
            return $this->lead-findOrFail($id);
        }

        
}
?>