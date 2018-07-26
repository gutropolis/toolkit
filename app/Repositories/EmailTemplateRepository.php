<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\EmailTemplateRepositoryInterface;
use Gutropolis\EmailTemplate;


class EmailTemplateRepository  implements EmailTemplateRepositoryInterface
{
        protected $model;
        
        public function __construct(EmailTemplate $emailtemplate)
        {
                $this->model = $emailtemplate;  
        }
        
		// Get all instances of model
        public function getAll()
        {
            return $this->model->get();
        }
		
      
		 
        // Get all instances of model
        public function getById($id)
        {
			return $this->model->find($id);
             
        }
     
        // create a new record in the database
        public function create(array $data)
        {
            return $this->model->create($data);
        }

        // update record in the database
        public function update(array $data, $id)
        { 
		 return $this->model->find($id)->update($data);
        }

        // remove record from the database
        public function delete($id)
        {
            return $this->model->find($id)->delete();
        }

         // remove record from the database
        public function show($id)
        {
            return '';
        }
 

        
}
?>