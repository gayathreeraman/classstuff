<?php namespace App\Http\Controllers;

use Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Invoice;
// use Carbon\Carbon;
// use Validator;

class InvoiceController extends Controller {

// public function showAll() {
// 		$customers = Customer::all();
// 		return view('customer_all', ['customers' => $customers->getArray()]);


// 	}

	public function create($id){
	$invoice = new Invoice;
	$invoice->customer_id = $id;
	$invoice->save();
	return redirect("/invoice/".$invoice->getId());

}


public function showAll() {
	$invoices = Invoice::allInvoicesDetails();
	
	 print_r($invoices);
	return view('invoice_all', ['invoices' => $invoices->getArray()]);
	
}
// public function create() {
// 	return view('invoice_new'); 
// }

public function postCreate() {
		
}
public function show($id) {

	$invoice = Invoice::getInvoiceDetails($id);
	$items = Item::all();
	
	return view('invoice',['invoice'=>$invoice,'id'=> $id,'items'=>$items->getArray() ]);	
}


public function addItemtoInvoice($invoice_id){
	

	$itemId = Request::input('items');
	$quantity = Request::input('quantity');
	Invoice::addItem($invoice_id,$itemId,$quantity);
	return redirect("invoice/$invoice_id");
}



public function edit() {
		
}
public function postEdit() {
		
}


public function deleteItemFromInvoice($invoice_id,$item_id){
	$invoice = Invoice::deleteItem($invoice_id,$item_id);
	return redirect("invoice");
}




// public function postInvoices() {
// 	$this->validateForm();
// 		DB::InsertGetId()

// 		$invoice = new Invoice();
// 		return redirect('invoices');
// 	}
}