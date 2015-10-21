<?php namespace App\Http\Controllers;

use Request;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Item;
use Carbon\Carbon;
use App\Models\Invoice_Item;


class CustomerController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Item Controller
	|--------------------------------------------------------------------------
	| This controller handles all requests related to Item objects
	| Patterns Demonstrated:
	| - returning views and redirects
	| - passing data to a view
	| - model CRUD operations
	| - using "Controller Validation"
	| - abstracting or refactoring common validation into helper method
	*/

	public function showAll() {
		$customers = Customer::all();
		return view('customer_all', ['customers' => $customers->getArray()]);
	}

	public function create() {
		return view('customer_new');
	}

	public function postCreate() {
		$this->validateForm();

		$customer = new Customer();
		$customer->first_name = Request::input('first_name');
		$customer->last_name = Request::input('last_name');
		$customer->email = Request::input('email');
		$customer->phone = Request::input('phone');
		$customer->customer_since = Carbon::now();
		$customer->save();
		return redirect('customer');
	}

	public function show($id) {
		$customer = new Customer($id);
		return view('customer', ['customer' => $customer]);
	}

	public function edit($id) {
		$customer = new Customer($id);
		return view('customer_edit', ['customer' => $customer]);
	}

	public function postEdit($id) {
		$this->validateForm();

		$customer = new Customer($id);
		$customer->first_name = Request::get('first_name');
		$customer->last_name = Request::get('last_name');
		$customer->email = Request::get('email');
		$customer->phone = Request::get('phone');
		$customer->gender = Request::get('gender');
		$customer->save();
		return redirect('customer/' . $id);
	}

	public function delete($id) {
		$item = new Customer($id);
		$item->delete();
		return redirect('item');
	}

	/*
	 * Validation methods
	 */
	protected function validateForm() {
		$this->validate(Request::instance(), [
			'first_name' => 'required|alpha|min:2|max:50',
			'last_name' => 'alpha|between:2,50',
			'email' => 'email',
			'phone' => 'required|regex:/^\d{3}[-.]\d{3}[-.]\d{4}$/',
			'gender' => 'required|in:m,f,M,F'
		]);
	}

	public function viewInvoices($id) {

		$customer = new Customer($id);

		// Get Invoices for this customer....
		$invoices = Invoice::getByCustomer($customer->id);

		return view("customer_invoices", ["customer"=>$customer, "invoices"=>$invoices]);
	}


	public function createInvoice($customer_id) {

		 $items = Item::getItems();
		 $invoice_id = 0;
		 
		return view("new_invoice",['customer_id'=>$customer_id, 'invoice_id'=>$invoice_id, 'items'=>$items]);
	 }




	public function postInvoice() {
		
		$items = Item::getItems();
		$invoice_id = Request::input('invoice_id');
		$customer_id = Request::input('customer_id');
		$quantity = Request::input('quantity');
		
		//verify quantity > 0 
		// $this->validateForm();

		if($quantity == 0)
		{				
			return view("new_invoice",['customer_id'=>$customer_id, 'invoice_id'=>$invoice_id, 'items'=>$items]);
		}
		else
		{ 
			if($invoice_id == 0)
			{
			$created_at =  Carbon::now();
			 $invoice_id = Invoice::addInvoice(Request::input('customer_id'));
			}
			else
			{

				$invoice_id = Request::input('invoice_id');

				//check if the product is already added for the invoice
				//call method in invoice_item to check if item for invoice exists
				//if getting false from the method, add invoice item
				//else
				return view("new_invoice",['customer_id'=>$customer_id, 'invoice_id'=>$invoice_id, 'items'=>$items]);

			}
		
			// $invoice = new Invoice();
			// $invoice->customer_id = Request::input('customer_id');
			// $invoice->created_at = $created_at;
			
			// $invoice->save();
			// $invoice_id = $invoice->insert($invoice);
		 

			$invoice_item = new Invoice_Item();
			$invoice_item->invoice_id = $invoice_id;
			$invoice_item->item_id = Request::input('product');
			$invoice_item->quantity = Request::input('quantity');

			$invoice_item->save();

			$invoiceRunningTotal = 0;

	

			//generate current invoice
			$addedInvoiceItems = GetItemsForInvoice($invoice_id);	
			foreach ($addedInvoiceItems as $addedItem) 
			{
				$itemDetail = array_search($addedItem->item_id, $items); 
				$totalItemCost = $addedItem->quantity * $itemDetail->price;

				$invoiceRunningTotal += $totalItemCost;
			}

			return view("new_invoice",['customer_id'=>$customer_id, 'invoice_id'=>$invoice_id, 'items'=>$items]);
		}
		
	 }

}
