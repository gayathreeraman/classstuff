<?php 
namespace App\Models;

use DB;
use Carbon\Carbon;

class Invoice extends Model {

	protected static $table = 'invoice';


	public static function getByCustomer($customerId){

		$rows = DB::select("SELECT * from invoice where customer_id=:customerId", ["customerId"=>$customerId]);
																//customer_id=:customerId", ["customerId"=>$customerId]to prevent sql injection

		$invoices = [];
		foreach($rows as $row){
		$invoice = new Invoice($row->id);
			$invoices[] = $invoice;
		}

		return $invoices;
	}


	public static function getInvoiceDetails($id){


		$sql = "SELECT  item.id as itemId, quantity,price,name,(price * quantity) as subtotal FROM item,invoice,invoice_item where item.id = invoice_item.item_id AND invoice.id = invoice_item.invoice_id  and invoice.id = :id";
			//this is not an invoice object
			$invoiceDetails = DB::select($sql,["id"=>$id]);
			return $invoiceDetails;
	}

	public static function allInvoicesDetails(){
		
        
        
        $sql = "SELECT customer.id as c_id,first_name,last_name,invoice.id,invoice.created_at,sum(item.price*invoice_item.quantity) as total  FROM invoice,customer ,item,invoice_item where customer.id = invoice.customer_id and invoice.id = invoice_item.invoice_id and item.id = invoice_item.item_id group by invoice.id";
       	$results = DB::select($sql);
        // Make Collection
        $collection = new Collection();
        foreach($results as $row) {
        // Create new Model
            $model = new static();
            $model->setData($row->{static::$key}, (array)$row);
            // Add Model to Collection
            $collection->add($model);
        }
        return $collection;
        
    }


    public static function addItem($invoice_id,$itemId,$quantity){

     	$sql = "INSERT INTO invoice_item (invoice_id,item_id,quantity) values (:invoice_id,:item_id,:quantity)";
		DB::insert($sql,['invoice_id'=>$invoice_id,'item_id'=>$itemId,'quantity'=>$quantity]);
 }


public static function deleteItem($invoice_id,$item_id){
	DB::delete('delete from invoice_item where invoice_id = :invoice_id  and item_id = :item_id',['invoice_id'=>$invoice_id,'item_id'=>$item_id]);
}



public static function createNewInvoicesDetails(){
		
        
        
       
        
    }



}


// }