
<?php

use Illuminate\Database\Seeder;

class NoteUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('note_user')->insert(

            array(
                array(
                    'user_id' => '1',
                    'note_id' => '3',
                    'permission' => '1',
                ),

                array(
                  'user_id' => '2',
                  'note_id' => '1',
                  'permission' => '1',
                ),

                array(
                  'user_id' => '3',
                  'note_id' => '2',
                  'permission' => '1',
                )
            )

        );
    }

}
?>
