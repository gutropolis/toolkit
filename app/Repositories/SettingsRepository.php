<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\SettingsRepositoryInterface;
use Gutropolis\Settings; 

class SettingsRepository  implements SettingsRepositoryInterface
{
        protected $settings;
        
        public function __construct(Settings $settings)
        {
                $this->settings = $settings;
        }
        
        // Get all instances of model
        public function getAll()
        {
            return $this->settings->get();
        }
		
		 
        // Get all instances of model
        public function getById($id)
        {
			return $this->settings->find($id);
             
        }
     
        // create a new record in the database
        public function create(array $data)
        {
            return $this->settings->create($data);
        }

        // update record in the database
        public function update(array $data, $id)
        { 
		 return $this->settings->find($id)->update($data);
        }

        // remove record from the database
        public function delete($id)
        {
            return $this->settings->find($id)->delete();
        }

        // show the record with the given id
        public function show($id)
        {
            return $this->settings-findOrFail($id);
        }

        
}
?>