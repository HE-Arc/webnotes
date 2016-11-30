<?php

use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder {

    public function run()
    {
        DB::table('notes')->insert(

            array(
                array(
                    'id' => '1',
                    'title' => 'math',
                    'description' => 'notes concernant le cours de math',
                    'auteur' => 'steve',
                    'created_at' => '2016-12-03 12:11:11',
                    'updated_at' => '2016-12-03 19:11:11'
                ),

                array(
                    'id' => '2',
                    'title' => 'conception os',
                    'description' => 'notes concernant le cours de conception os',
                    'auteur' => 'nicolas',
                    'created_at' => '2012-12-03 11:11:11',
                    'updated_at' => '2012-12-03 16:11:11'
                ),

                array(
                    'id' => '3',
                    'title' => 'dev web',
                    'description' => 'notes concernant le cours de developpement web',
                    'auteur' => 'daniel',
                    'created_at' => '2000-12-03 20:11:11',
                    'updated_at' => '2000-12-03 22:12:08'
                )
            )

        );
    }

}
?>
