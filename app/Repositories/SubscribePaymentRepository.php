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
		
		public $_start_date='';
		public $_end_date ='';
		
        
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
	   $this->model->paid_by     	= $user_id;
	  
	   $this->model->item_type	= 'cart_items';
	   $this->model->plan_type	= $package->package_type;	  
       $this->model->payment_gateway = $payment_method;      
	   $this->model->payment_status 	= '0';
       $this->model->other_details 	= json_encode($package);
       $this->model->save();
       return  $this->model->slug;
    }
	
	public function saveInvoice($package,$data){
		
	   $this->model->slug 			=  $this->model->makeSlug(getHashCode()); 
	   $this->model->item_id 		= $package->id;
       $this->model->item_name 		= $package->plan->title;
	   $this->model->item_slug 		= $package->slug;
	   $this->model->user_id     	= $data['paid_by'];
	  
	   $this->model->item_type	= 'cart_items';
	   $this->model->plan_type	= $package->package_type;	 
        
		
		$daysToAdd = '+'.$package->interval.' days';

		$start_date =   date('Y-m-d');
		$end_date   =  date('Y-m-d', strtotime($daysToAdd));
							 
		 
		if($this->_start_date != '' && $this->_end_date != '' ){

		     $this->model->start_date	= $this->_start_date;
			 $this->model->end_date	    = $this->_end_date;
		}else{
             $this->model->start_date	= $start_date;
			 $this->model->end_date	= $end_date;
		}		
	  
	    
	   
	   $this->model->payment_gateway	= $data['payment_gateway'];
	   $this->model->transaction_id	=  $data['transaction_id'];;
	   $this->model->paid_by	= $data['paid_by'];
	   $this->model->amount	=  $data['amount'];
	   $this->model->currency_code	= $data['currency_code'];
	   $this->model->coupon_code_applied	= $data['coupon_code_applied'];
	   $this->model->coupon_id	= $data['coupon_id'];
	   $this->model->actual_cost	= $data['actual_cost'];
	   $this->model->discount_amount	= $data['discount_amount'];
	   $this->model->after_discount	= $data['after_discount'];
	   $this->model->paid_amount	= $data['paid_amount'];
	   $this->model->payment_status 	= $data['payment_status'];
	   
	   $this->model->other_details 	= $data['other_details'];
	   $this->model->transaction_record	= $data['transaction_record']; 
	   $this->model->notes	= $data['notes']; 
	   $this->model->recurring_subscription_response	= $data['recurring_subscription_response']; 
	   $this->model->description	= $data['description'];  
	   $this->model->status	= $data['status']; 
	   $this->model->payment_mode	= $data['payment_mode']; 
	   $this->model->created_by	= $data['created_by'];  
	    
       $this->model->save();
       return  $this->model->id;
	}
        
}
?>