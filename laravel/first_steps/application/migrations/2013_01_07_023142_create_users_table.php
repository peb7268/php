<?php
	/**
	 * 
	 *  Migration Steps
	 *	Install the migrations table: php artisan migrate:install
	 * 	Create a new migration: php artisan migrate:make migration_name_here 
	 * 	Run the migration: php artisan migrate 	(Runs last migration created)
	 * 
	 * 	Revert: php artisan rollback 			(rolls back the previous migration that was preformed)
	 * 	Reset:  php artisan migrate:reset 		(resets all migrations ever run)
	 * 
	 **/

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		//Create a table called users
		Schema::create('users', function($table){
			$table->increments('id');					//Create an auto-incrementing primary key field named ID. 
			$table->string('name', 50)->nullable();		//Create a name field type string (varchar) that is 50 chars that can be null.
			$table->string('username', 15);
			$table->string('email');
			$table->string('password');
			$table->boolean('activated')->default(0);	//Maps to a small int type and sets a default value of 0
			$table->timestamps();						//Inserts a fields called created at and updated at
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}