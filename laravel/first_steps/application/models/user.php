<?php
class User extends Eloquent {
	public static $timestams = true;

	public function create_user($user)
	{
		$id = DB::table('users')->insert_get_id(array(
			'name' 		=> $user['name'],
			'email' 	=> $user['username'],
			'password' 	=> Hash::make($user['password']),
			'activated' => 1
		));

		return $id;
	}
}