<?php

use Faker\Factory as Faker;

class DogsTableSeeder extends Seeder{

	public function run()
	{
		$faker = Faker::create();

		
		for($i=0;$i<=20;$i++)
		{
			$dog = new Dog;
            		$dog->name = $faker->userName;
           		$dog->age = mt_rand(1,15);
            		$dog->owner = $faker->name;
            		$dog->save();
		}
		
	}
}

