<?php

use Illuminate\Database\Seeder;

class User_rolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
     try {
        \DB::beginTransaction();

        \DB::table('user_roles')->delete();

        \DB::table('user_roles')->insert([
          'user_id' => 1,
          'role_id' => 1
        ]);
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
