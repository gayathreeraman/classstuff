<?php 
namespace App\Models;

use DB;

class Invoice extends Model {

	protected static $table = 'invoice';


	public static function getByCustomer($customerId){

		$rows = DB::select("SELECT * from invoice where customer_id=:x", ["x"=>$customerId]);

		$invoices = [];
		foreach($rows as $row){
			$invoice = new Invoice($row->id);
			$invoices[] = $invoice;
		}

		return $invoices;
	}


 	public static function addInvoice($customer_id){
 		$created_at =  date("Y-m-d H:i:s");
 		 $sql = "INSERT INTO invoice(customer_id,created_at) values (:customer_id,:created_at)";


       $invoice_id = DB::table('invoice')->insertGetId(
    		['customer_id' => $customer_id, 'created_at' => $created_at]);

       return $invoice_id; 
 	}

}