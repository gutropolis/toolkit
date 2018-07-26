<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;
use Illuminate\Database\Eloquent\Model;
use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\SubscribeUserInterface;
 
use Gutropolis\SubscribeUser; 

class SubscribeUserRepository  implements SubscribeUserInterface
{
        protected $model;
        public $user_id = 0;
        public function __construct(SubscribeUser $suser)
        {
                $this->model = $suser;  
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
            $this->model->create($data);
			return $this->model->id;
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
		
		
		public function subscribeUser($data){
			
			  $query =   $this->model->where('user_id', '=',$data['user_id']);
			  if(intval($data['organization_id']) > 0 ){
				  $query =   $query->where('organization_id', '=',$data['organization_id']);
			  } 
			  $query->update(['status' => '0']);
			  $this->create($data); 
		}
 
		public function checkUserSubscription(){
			
			  $checkSubscription='0';  
			  $query =   $this->model->where('user_id', '=',$this->user_id) ;
			  $query =   $query->where('end_date', '>=',date('Y-m-d'));
			  $query =   $query->where('status','=','1'); 
			  $checkPlanD = $query->get();  
			  
			  //print_r($checkPlanD);
			  
			  if(count($checkPlanD) == '1'){
				   $checkSubscription='1';
			  } 
			  return $checkSubscription;
		} 
		
	 
        
}
?>