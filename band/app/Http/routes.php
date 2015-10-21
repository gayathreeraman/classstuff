	<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/bands',"BandController@getBand");

Route::get('/bands/{id}',"BandController@getBandDetails");
Route::get('/editor',"BandController@editBandView");
    


// Route::get('/bands', function () {
// try{
// 	$db = new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root', '');
// 	$statement = $db->prepare('SELECT bandId,bandName from band');
// 	$statement->execute();
// 	$bands1 = $statement->fetchAll();
// 	// print_r($bands);
// 	return view('bands',["bandsinfo"=>$bands1]);

	

// 	}catch(PDOException $e){
// 		die($e->getmessage());
// }

    
// });

// Route::get('/bands/{id}', function ($getbandId) {

// 	try{
// 		$db= new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root','');
// 		$statement = $db->prepare('SELECT * from band where bandId ='. $getbandId);
// 		$statement->execute();
// 		$bands2 =$statement->fetch();
// 		// print_r($getb);
		
// 		return view('bandsDetail',["band123"=>$bands2]);

// 	}catch(PDOException $e) {
// 		die($e->getmessage());
// 	}
    
// });

Route::get('/bands/{id}/bandinstrument', function($getbandId) {

try{
	// echo "$getbandId ".$getbandId;
	$db= new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root','');
	$statement = $db->prepare('SELECT instrumentName from instrument as
	 i,bandInstrument as bi where bi.instrumentId = i.instrumentId and bi.bandId ='.$getbandId);
$statement->execute();
$getb =$statement->fetchAll();
 // print_r($getb);
 return view('bandinstrument',['bandinstruments'=>$getb]);


}catch(PDOException $e) {
		die($e->getmessage());
	}





});


Route::get('/instrument',function(){
	try{
		$db = new PDO('mysql:host=localhost;dbname=musicband;charset=utf8','root','');
		$statement = $db->prepare('SELECT instrumentName from instrument');
		$statement->execute();
		$getband = $statement->fetchAll();
		// print_r($getband);

		return view('instrument',['instruments'=>$getband]);


	}catch(PDOException $e) {
		die($e->getmessage());





}

});

