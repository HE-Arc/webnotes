<?php

use Illuminate\Database\Seeder;

class GroupUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('group_user')->insert(

            array(
                array(
                    'user_id' => '1',
                    'group_id' => '1',
                    'permission' => '1'
                ),

                array(
                    'user_id' => '1',
                    'group_id' => '2',
                    'permission' => '1'
                ),

                array(
                    'user_id' => '1',
                    'group_id' => '3',
                    'permission' =>  '1'
                ),

                array(
                    'user_id' => '2',
                    'group_id' => '1',
                    'permission' => '1'
                ),

                array(
                    'user_id' => '2',
                    'group_id' => '2',
                    'permission' => '1'
                ),

                array(
                    'user_id' => '2',
                    'group_id' => '3',
                    'permission' =>  '1'
                ),

                array(
                    'user_id' => '3',
                    'group_id' => '1',
                    'permission' => '1'
                ),

                array(
                    'user_id' => '3',
                    'group_id' => '2',
                    'permission' => '1'
                ),

                array(
                    'user_id' => '3',
                    'group_id' => '3',
                    'permission' =>  '1'
                )
            )

        );
    }

}
?>
