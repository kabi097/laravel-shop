<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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

        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'name' => 'admin',
                    'display_name' => 'Administrator',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                1 => 
                array (
                    'id' => 2,
                    'name' => 'user',
                    'display_name' => 'Normalny Użytkownik',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
