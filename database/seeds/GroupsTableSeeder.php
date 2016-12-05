<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->insert(

            array(
                array(
                    'id' => '1',
                    'name' => 'math',
                    'description' => 'group de partage des notes du cours de math',
                    'created_at' => '2016-12-03 12:11:11',
                    'updated_at' => '2016-12-03 19:11:11'
                ),

                array(
                    'id' => '2',
                    'name' => 'conception os',
                    'description' => 'group de partage des notes du cours de conception os',
                    'created_at' => '2012-12-03 11:11:11',
                    'updated_at' => '2012-12-03 16:11:11'
                ),

                array(
                    'id' => '3',
                    'name' => 'dev web',
                    'description' => 'group de partage des notes du cours de developpement web',
                    'created_at' => '2000-12-03 20:11:11',
                    'updated_at' => '2000-12-03 22:12:08'
                )
            )

        );
    }

}
?>
