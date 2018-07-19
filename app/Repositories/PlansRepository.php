<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\PlanRepositoryInterface;
use Gutropolis\Plans; 

class PlansRepository  implements PlanRepositoryInterface
{
        protected $plan;
        
        public function __construct(Plans $plan)
        {
                $this->plan = $plan;
        }
        
        // Get all instances of model
        public function getAll()
        {
            return $this->plan->get();
        }
		
		 
        // Get all instances of model
        public function getById($id)
        {
			return $this->plan->find($id);
             
        }
     
        // create a new record in the database
        public function create(array $data)
        {
            return $this->plan->create($data);
        }

        // update record in the database
        public function update(array $data, $id)
        { 
		 return $this->plan->find($id)->update($data);
        }

        // remove record from the database
        public function delete($id)
        {
            return $this->plan->find($id)->delete();
        }

        // show the record with the given id
        public function show($id)
        {
            return $this->plan-findOrFail($id);
        }

        
}
?>