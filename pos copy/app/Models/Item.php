<?php
namespace App\Models;

use DB;

class Item extends Model {
    protected static $table = 'item';

    public function delete() {
        DB::delete('delete from item where id = ?', [$this->id]);
    }

    public static function getItems() {
    
	$rows = DB::select("select * from item");

		$items = [];
		foreach($rows as $row){
			$item = new Item($row->id);
			$items[] = $item;
		}
			
			return $items;
    }


}

