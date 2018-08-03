<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\PlanPackageRepositoryInterface;
use Gutropolis\PlanPackage;


class PlanPackageRepository  implements PlanPackageRepositoryInterface
{
        protected $model;
        protected  $pkgid=0;
        public function __construct(PlanPackage $package)
        {
                $this->model = $package;  
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
			$data['slug'] = $this->model->makeSlug(getHashCode());
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
 
         // Get all instances of model
        public function getIdBySlug($slug)
        {
			return     $this->model->select('id')->where('status', '=', '1')->where('slug', $slug)->first();
			 
        }
		   // Get all instances of model
        public function getPkgBySlug($slug)
        {  
		 
			return $this->model->where('slug', $slug)->first();
        }
        
}
?>