<?php

use Illuminate\Database\Seeder;

class GroupNoteTableSeeder extends Seeder {

    public function run()
    {
        DB::table('group_note')->insert(

            array(
                array(
                    'group_id' => '1',
                    'note_id' => '1',
                    'permission' => '1'
                ),

                array(
                    'group_id' => '2',
                    'note_id' => '2',
                    'permission' => '1'
                ),

                array(
                    'group_id' => '3',
                    'note_id' => '3',
                    'permission' =>  '1'
                )
            )

        );
    }

}
?>
