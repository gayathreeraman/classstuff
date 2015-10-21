<?php 
namespace App\Models;

use DB;

class Invoice_Item extends Model {

	protected static $table = 'invoice_item';


public static function VerifyProductExistsForInvoice($invoiceId, $itemId)
{
	//$rows = DB::select("select * from invoice_item where invoiceId=:x and itemId=:y", []);
	//check if $rows.length > 0, return true;

}

public static function GetItemsForInvoice($invoiceId)
{
	//$rows = DB::select("select * from invoice_item where invoiceId=:y", ['']);
		$invoice_items = [];
		foreach($rows as $row){
			$invoice_item = new Invoice_Item($row->id);
			$invoice_items[] = $invoice_item;
		}			
		return $invoice_items;
}


}