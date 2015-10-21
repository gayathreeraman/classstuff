<?php

namespace App\Http\controllers;

use PDO;

class BandController extends Controller {

	public function getBand(){

		try {
			$db = new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root', '');
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$statement = $db->prepare('SELECT bandId,bandName from band');
			$statement->execute();
			$bands = $statement->fetchAll();
			// print_r($bands);
			return view('bands',["bands"=>$bands]);

	

		}	catch(PDOException $e){
				die($e->getmessage());
	}

	public function getBandDetails($getbandId){

		try {
			$db= new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root','');
			$statement = $db->prepare('SELECT * from band where bandId ='. $getbandId);
			$statement->execute();
			$bands2 =$statement->fetch();
		// print_r($getb);
		
			return view('bandsDetail',["band123"=>$bands2]);

		}catch(PDOException $e) {
			die($e->getmessage());
	}

	public function editBandView(){
		return view('editor');
	}

	public function createNewBand(){

		$bandName="";
		$location=0;
		$startDate =0;
		$isActive ="";

		if(isset($_POST["bandName"])){
			$bandName = $_POST["bandName"];
		}

		if(isset($_POST["location"])){
			$location = $_POST["location"];
		}

		if(isset($_POST["startDate"])){
			$startDate = $_POST["startDate"];
		}

		if(isset($_POST["isActive"])){
			$isActive = $_POST["isActive"];
		}

		$db = new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT into bands(bandName,location,startDate,isActive) values (:bandName,:location,:startDate,:isActive)";
		$statement = $db->prepare($sql);
		$statement->execute(["bandName"=>$bandName,"location"=>$location,"startDate"=>$startDate,"isActive"=>$isActive]);
		
		return redirect('/bands');
		public 



	}



}
	










}