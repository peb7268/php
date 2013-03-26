<?php

class Create_User_Profiles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('starting_weight');
			$table->string('current_weight');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profiles');
	}

}