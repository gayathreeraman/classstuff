<?php 
namespace App\Models;


use DB;

class User {

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    /**
     * Save (Call Insert or Update)
     */
    public function save() {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    /**
     * Create
     */
    private function insert() {

        // SQL
        $sql = "
            INSERT INTO user (first_name, last_name, email, phone)
            VALUES (:first_name, :last_name, :email, :phone)
            ";
        DB::insert($sql,['first_name'=> $this->first_name,
            'last_name'=> $this->last_name,
            'email'=>$this->email,
            'phone'=>$this->phone]);






        // Execute
        //DB::insert();
    }

    /**
     * Update User
     */
     private function update() {
        
        $sql = "
          UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone
             
            WHERE id = :id";
        DB::update($sql,[':first_name'=> $this->first_name,
            ':last_name'=> $this->last_name,
            ':email'=>$this->email,
            ':phone'=>$this->phone,
            ':id'=> $this->id]);

    }

    /**
     * Delete
     */
    public static function delete($id) {
        $sql = "
        DELETE from user where id = :id";
        DB::delete($sql,[':id'=> $id]);   
        //$deleted = DB::delete('delete from users');



    }


    /**
     * Get User
     */
    public static function get($id) {

        // SQL
        $sql = "
            SELECT *
            FROM user
            WHERE id = :id";

        // Execute
        $row = DB::selectOne($sql, [':id' => $id]);
        return(User::createUserFromRow($row));

        // // Start a new User Object
        // $user = new User();
        // $user->id=$row['id'];
        // $user->first_name=$row['first_name'];
        // $user->last_name=$row['last_name'];
        // $user->email=$row['email'];
        // $user->phone=$row['phone'];


        // populate the user object here

        return $user;
    }

    // Get All Users
    public static function getAll() {

        $sql = "
            SELECT *
            FROM user";

        $rows=DB::select($sql);
        $users =[];
        foreach($rows as $row) { 

            $users[] = User::createUserFromRow($row);
            // $users[] = self::createUserFromRow($row);
        // $user = new User();
        // $user->id=$rows['id'];
        // $user->first_name=$rows['first_name'];
        // $user->last_name=$rows['last_name'];
        // $user->email=$rows['email'];
        // $user->phone=$rows['phone'];
        // $users[] =$user;

         }
        
        return $users;
    }
    protected static function createUserFromRow($row) {
        $user = new User();
        $user->id=$row['id'];
        $user->first_name=$row['first_name'];
        $user->last_name=$row['last_name'];
        $user->email=$row['email'];
        $user->phone=$row['phone'];
        return $user;
    }

}
