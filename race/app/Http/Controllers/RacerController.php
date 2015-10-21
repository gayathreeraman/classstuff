<?php

namespace App\Http\Controllers;

use PDO;
use Request;

class RacerController extends Controller {
	public function getRacers(){

		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from racers');
			$statement->execute();
			$racers = $statement->fetchALL();

			return view("racers",["racers"=>$racers]);

		} catch (PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function getRacerDetail($racerId) {
		
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare("SELECT * from racers where racerId=$racerId");
			$statement->execute();
			$racer = $statement->fetch();

		return view("racerdetail",["racer"=>$racer, "raceId" => $racerId]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	// public function getRacerDetail($racerId){

	// 	try {

	// 		$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
	// 		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// 		$statement= $db->prepare('SELECT * from racers where racerId '= $racerId);
	// 		$statement->execute();
	// 		$racers = $statement->fetch();

	// 		return view("racers",["racers"=>$racers]);

	// 	} catch (PDOEXception $e) {
	// 		die($e->getmessage());
	// 	}

	// }


public function deleteRacer($id) {
		$racerId = $id;

		echo "Deleted!";

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE from Racers where racerId = :racerId";
		$statement = $db->prepare($sql);
		$statement->execute(["racerId"=>$racerId]);
		
		$sql = "DELETE from raceRacers where racerId = :racerId";
		$statement = $db->prepare($sql);
		$statement->execute(["racerId"=>$racerId]);

		return redirect('/racers');

	}


	public function racerEditorView(){
		return view ('racereditor');
	}

	public function editracer(){
		// $name = "";
		// $age = 0;

		$age = Request::input('age',0);
		$name = Request::input('name','');
		// if(isset($_POST['age'])){
		// 	$age= $_POST['age'];
		// }
		// if(isset($_POST['name'])){
		// 	$name=$_POST['name'];
		// }

		$db = new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql="INSERT into racers(age,name)values(:age,:name)";
		$statement = $db->prepare($sql);
		$statement->execute([":age"=>$age,":name"=>$name]);

		return redirect('/racers');

	}

	public function editRacerView($racerId){
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare("SELECT * from racers where racerId=$racerId");
			$statement->execute();
			$racer = $statement->fetch();
			// print_r($racer);

		return view("edit",["racer"=>$racer]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}
	}

	public function updateRacer($racerId){
		$age = Request::input('age',0);
		$name = Request::input('name','');

		$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "update racers set age = :age, name = :name where racerId = :racerId";
		$statement = $db->prepare($sql);
		$statement->execute([":age" => $age, ":name" => $name,":racerId" => $racerId]);

		return redirect("/racers/$racerId");
	}



}