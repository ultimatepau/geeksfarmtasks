<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	"title" => "Curhatan kesekian",
        	"content" => "lorem ipsum dolor sit amet"
        ];
        DB::table('articles')->insert($data);

        $data = [
        	"title" => "Curhatan kesekian",
        	"content" => "lorem ipsum dolor sit amet"
        ];
        DB::table('articles')->insert($data);

        $data = [
        	"title" => "Curhatan kesekian",
        	"content" => "lorem ipsum dolor sit amet"
        ];
        DB::table('articles')->insert($data);
    }
}
