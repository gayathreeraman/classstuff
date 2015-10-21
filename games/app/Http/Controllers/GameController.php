<?php

namespace App\Http\Controllers;
use Request;
use App\Models\Game;

class GameController extends Controller{

	public function viewAll(){
		$games = Game::getAll();
		return view('all_games',['games' => $games]);
	}

	public function view($id){
		$game = Game::get($id);
		return view('gamedetail',['game'=>$game]);
	}
	public function create(){
		return view('new_game');

	}
	public function postCreate(){
		$game = new Game();
		$game->id= Request::input('id');
		$game->name= Request::input('name');
		$game->year= Request::input('year');
		$game->save();
		return redirect('games');


	}
	public function edit($id){
		$game = Game::get($id);
		return view('update_game',['game'=> $game,'id' => $id]);

	}
	public function postEdit($id){
		$game = Game::get($id);
		$game->name = Request::input('name');
	 	$game->year = Request::input('year');
	 	$game->save();
		return redirect('games');

	}
	public function Delete($id){
		Game::delete($id);
		return redirect('games');

	}



}
