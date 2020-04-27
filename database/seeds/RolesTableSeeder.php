<?php

use \App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'admin';
        $admin->description = 'Admin can have all the access';
        $admin->save();

        $author = new Role();
        $author->name = 'author';
        $author->description = 'Author can write blogs and have full access to his own blogs';
        $author->save();

        $subscriber = new Role();
        $subscriber->name = 'subscriber';
        $subscriber->description = 'Subscriber can read the blogs written by authors';
        $subscriber->save();
    }
}
