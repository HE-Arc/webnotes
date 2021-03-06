<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        $this->call('NoteTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('NoteUserTableSeeder');
        $this->call('NoteReleasesTableSeeder');
        $this->call('GroupTableSeeder');
        $this->call('GroupNoteTableSeeder');
        $this->call('GroupUserTableSeeder');
    }
}
