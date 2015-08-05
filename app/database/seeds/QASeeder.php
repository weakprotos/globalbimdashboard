<?php

use Faker\Factory as Faker;

class QASeeder extends Seeder{

	public function run()
	{
		$faker = Faker::create();

		for($i=1;$i<=20;$i++)
		{
			$post = new Q;
			$post->user_id = mt_rand(1,10);
			$post->category = mt_rand(1,10);
			$post->title = $faker->sentence(5);
			$content = $faker->paragraph(6);
			$post->title = substr($content, 0, 120);
			$post->text = $content;
			$post->save();

			$maxComments = mt_rand(3,15);
			for($j=1;$j<=$maxComments;$j++)
			{
				$comment = new A;
				$comment->user_id = mt_rand(1,10);
				$content2 = $faker->paragraph(6);
				$comment->title = substr($content2,0,120);
				$comment->text = $content2;
				$comment->reference = $faker->paragraph(3);
				$comment->save();
			}
		}
	}
}

