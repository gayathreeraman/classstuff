<?php namespace App\Http\Controllers;

use Request;
use App\Models\User;
use PDO;

class UserController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Customer Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	
		public function viewAll() {

		// try{
		// 	$db = new PDO('mysql:host=localhost;dbname=users;charset=utf8','root','');
		// 	$statement = $db->prepare('SELECT * from user');
		// 	$statement -> execute();
		// 	$users = $statement->fetchAll();
		// 	// print_r($users);
		// 	return view('all_users',['users'=> $users]);
		// }catch(PDOException $e){
		// 	die($e->getmessage());
		// }


			$users = user::getALL();
			return view('all_users',['users'=> $users]);

	}
	

	public function view($id) {
		// try {
		// 	$db = new PDO('mysql:host=localhost;dbname=users;charset=utf8','root','');
		// 	$statement = $db->prepare('SELECT * from user where id = '. $id);
		// 	$statement -> execute();
		// 	$user = $statement->fetch();
		// 	// print_r($users);
		// 	return view('user',['user'=> $user]);
		// } catch(PDOException $e){
		// 	die($e->getmessage());
		// }

		$user = User::get($id);
		// print_r($user);
		return view('user',['user'=> $user]);
	}

	public function create() {
		return view('new_user');
	}

	public function postCreate() {
		$user = new User();
		$user->first_name = Request::input('first_name');
		$user->last_name = Request::input('last_name');
		$user->email = Request::input('email');
		$user->phone = Request::input('phone');
		$user->save();

		return redirect('users');
	}

	public function update($id) {
		$user = User::get($id);
		// print_r($user);
		return view('update_user',['user'=> $user,'id' => $id]);
	}

	 public function postUpdate($id) {
	 	$user = User::get($id);
		$user->first_name = Request::input('first_name');
	 	$user->last_name = Request::input('last_name');
	 	$user->email = Request::input('email');
	 	$user->phone = Request::input('phone');
	 	$user->save();
		return redirect('users');
	 }

	public static function delete($id) {
		User::delete($id);
		return redirect('users');


	}

}
