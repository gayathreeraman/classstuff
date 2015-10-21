<?php

namespace App\Http\Controllers;

use PDO;

class RaceController extends Controller {

	public function getRaces(){

		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from races');
			$statement->execute();
			$races = $statement->fetchALL();

			return view("races",["races"=>$races]);

		} catch(PDOEXception $e){
			die($e->getmessage());
		}

	}

	// public function getRacers(){

	// 	try {

	// 		$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
	// 		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// 		$statement= $db->prepare('SELECT * from racers');
	// 		$statement->execute();
	// 		$getInfo = $statement->fetchALL();

	// 	return view("racers",["getInfo"=>$getInfo]);

	// 	} catch (PDOEXception $e) {
	// 		die($e->getmessage());
	// 	}

	// }

	public function getRaceDetails($raceId) {
		
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from races where raceId='.$raceId);
			$statement->execute();
			$race = $statement->fetch();

		return view("racesdetail",["race"=>$race, "raceId" => $raceId]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	

	public function editRaceView() {

		return view('editor');

	}

	public function editNewRace() {
		$raceName = "";
		$length = 0;
		$location = "";
		$startDate = 0;

		// Validate Input
		if(isset($_POST['raceName'])){
			$raceName = $_POST['raceName'];
		}
		if(isset($_POST['length'])){
			$length = $_POST['length'];
		}
		if(isset($_POST['location'])){
			$location = $_POST['location'];
		}
		if(isset($_POST['startDate'])){
			$startDate = $_POST['startDate'];
		}

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = " INSERT into races(raceName,location,length,startDate) values(:raceName,:location,:length,:startDate)";
		$statement = $db->prepare($sql);
		$statement->execute(["raceName"=>$raceName, "length"=>$length, "location"=>$location, "startDate"=>$startDate]);

		return redirect('/races');
	}

	public function removeRace() {
		$raceId = 0;

		echo "Removed!";

		if(isset($_POST['raceId'])){
			$raceId = $_POST['raceId'];
		}
		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE from Races where raceId = :raceId";
		$statement = $db->prepare($sql);
		$statement->execute(["raceId"=>$raceId]);
		
		$sql = "DELETE from raceRaces where raceId = :raceId";
		$statement = $db->prepare($sql);
		$statement->execute(["raceId"=>$raceId]);

		return redirect('/races');

	}


	public function editRace($raceId){
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare("SELECT * from races where raceId=$raceId");
			$statement->execute();
			$race = $statement->fetch();
			// print_r($racer);

		return view("editRace",["race"=>$race]);
		 
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