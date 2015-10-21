
<?php

namespace App\Models;
use DB;

class Game{

	public $id;
	public $name;
	public $year;


	public function save(){
		if(empty($this->id)){
			$this->insert();
		
	} else {
		$this->update();
	}
}

	private function insert(){

		$sql="INSERT INTO game(name,year) values
		 (:name, :year)";
		DB::insert($sql,['name'=> $this->name,'year'=>$this->year]);

	}

	private function update(){
		$game = Game::get($id);
		return view('update_game',['game'=>$game]);

	}
	public static function delete($id){
$sql = "
        DELETE from game where id = :id";
        DB::delete($sql,[':id'=> $id]);   
	}
	public static function getAll(){
		
		$sql = " SELECT * FROM game";
		$rows = DB::select($sql);
		$games =[];
		foreach($rows as $row){
			$game =new Game();
			$game->id = $row ['id'];
			$game->name = $row ['name'];
			$game->year = $row['year'];
			$games[] = $game;
		}
		return $games;
	}

	public static function get($id){

		$sql = "SELECT * FROM game where id = :id";
		$row = DB::selectOne($sql,[':id'=> $id]);

		$game = new Game();
		$game->id = $row ['id'];
		$game->name = $row ['name'];
		$game->year = $row['year'];
		return $game;
	}
	



}