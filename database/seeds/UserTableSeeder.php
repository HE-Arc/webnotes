
<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => '1',
                    'name' => 'steve',
                    'email' => 'steve.nadalin@he-arc.ch',
                    'password' => bcrypt('root'),
                    'remember_token' => '',
                    'created_at' => '2016-12-03 12:11:11',
                    'updated_at' => '2016-12-03 19:11:11'
                ],

                [
                  'id' => '2',
                  'name' => 'daniel',
                  'email' => 'daniel.rodrigues@he-arc.ch',
                  'password' => bcrypt('root'),
                  'remember_token' => '',
                  'created_at' => '2016-12-03 12:12:11',
                  'updated_at' => '2016-12-03 19:12:11'
                ],

                [
                  'id' => '3',
                  'name' => 'nicolas',
                  'email' => 'nicolas.sommer@he-arc.ch',
                  'password' => bcrypt('root'),
                  'remember_token' => '',
                  'created_at' => '2016-12-03 12:13:11',
                  'updated_at' => '2016-12-03 19:13:11'
                ]
            ]

        );
    }

}
?>
