<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;
use Illuminate\Database\Eloquent\Model;
use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\SubscribePaymentInterface;
 
use Gutropolis\SubscribePayment; 

class SubscribePaymentRepository  implements SubscribePaymentInterface
{
        protected $model;
        
        public function __construct(SubscribePayment $spayment)
        {
                $this->model = $spayment;  
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
 
		public function getSubPaymentBySlug($slug)
		{
			return $this->model->where('slug', '=', $slug)->first();
		}
		
		
    /**
     * This method saves the record before going to payment method
     * The exact record can be identified by using the slug 
     * By using slug we will fetch the record and update the payment status to completed
     * @param  [type] $item           [description]
     * @param  [type] $payment_method [description]
     * @return [type]                 [description]
     */
    public function preserveBeforeSave( $package, $payment_method , $user_id )
    {
		
	   
	   $this->model->slug 			=  $this->model->makeSlug(getHashCode());
	  
	   $this->model->item_id 		= $package->id;
       $this->model->item_name 		= $package->title;
	   $this->model->item_slug 		= $package->slug;
	   $this->model->paid_by     = $user_id;
	  
	   $this->model->item_type	= 'cart_items';
	   $this->model->plan_type	= 'cart_items';	  
       $this->model->payment_gateway = $payment_method;      
	   $this->model->amount 			= $package->price;
	   $this->model->currency_code	=  '$';	  
       $this->model->payment_status 	= '0';
       $this->model->other_details 	= json_encode($package);
       $this->model->save();
       return  $this->model->slug;
    }
        
}
?>