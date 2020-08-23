<?php

use Illuminate\Database\Seeder;

class PermissionsGoEventsSeeder extends Seeder
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

        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'key' => 'browse_admin',
                    'table_name' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                1 => 
                array (
                    'id' => 2,
                    'key' => 'browse_bread',
                    'table_name' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                2 => 
                array (
                    'id' => 3,
                    'key' => 'browse_database',
                    'table_name' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                3 => 
                array (
                    'id' => 4,
                    'key' => 'browse_media',
                    'table_name' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                4 => 
                array (
                    'id' => 5,
                    'key' => 'browse_compass',
                    'table_name' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                5 => 
                array (
                    'id' => 6,
                    'key' => 'browse_menus',
                    'table_name' => 'menus',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                6 => 
                array (
                    'id' => 7,
                    'key' => 'read_menus',
                    'table_name' => 'menus',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                7 => 
                array (
                    'id' => 8,
                    'key' => 'edit_menus',
                    'table_name' => 'menus',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                8 => 
                array (
                    'id' => 9,
                    'key' => 'add_menus',
                    'table_name' => 'menus',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                9 => 
                array (
                    'id' => 10,
                    'key' => 'delete_menus',
                    'table_name' => 'menus',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                10 => 
                array (
                    'id' => 11,
                    'key' => 'browse_roles',
                    'table_name' => 'roles',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                11 => 
                array (
                    'id' => 12,
                    'key' => 'read_roles',
                    'table_name' => 'roles',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                12 => 
                array (
                    'id' => 13,
                    'key' => 'edit_roles',
                    'table_name' => 'roles',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                13 => 
                array (
                    'id' => 14,
                    'key' => 'add_roles',
                    'table_name' => 'roles',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                14 => 
                array (
                    'id' => 15,
                    'key' => 'delete_roles',
                    'table_name' => 'roles',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                15 => 
                array (
                    'id' => 16,
                    'key' => 'browse_users',
                    'table_name' => 'users',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                16 => 
                array (
                    'id' => 17,
                    'key' => 'read_users',
                    'table_name' => 'users',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                17 => 
                array (
                    'id' => 18,
                    'key' => 'edit_users',
                    'table_name' => 'users',
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                18 => 
                array (
                    'id' => 19,
                    'key' => 'add_users',
                    'table_name' => 'users',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                19 => 
                array (
                    'id' => 20,
                    'key' => 'delete_users',
                    'table_name' => 'users',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                20 => 
                array (
                    'id' => 21,
                    'key' => 'browse_settings',
                    'table_name' => 'settings',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                21 => 
                array (
                    'id' => 22,
                    'key' => 'read_settings',
                    'table_name' => 'settings',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                22 => 
                array (
                    'id' => 23,
                    'key' => 'edit_settings',
                    'table_name' => 'settings',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                23 => 
                array (
                    'id' => 24,
                    'key' => 'add_settings',
                    'table_name' => 'settings',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                24 => 
                array (
                    'id' => 25,
                    'key' => 'delete_settings',
                    'table_name' => 'settings',
                    'created_at' => '2020-08-20 17:12:53',
                    'updated_at' => '2020-08-20 17:12:53',
                ),
                25 => 
                array (
                    'id' => 26,
                    'key' => 'browse_hooks',
                    'table_name' => NULL,
                    'created_at' => '2020-08-20 17:13:44',
                    'updated_at' => '2020-08-20 17:13:44',
                ),
                26 => 
                array (
                    'id' => 27,
                    'key' => 'browse_products',
                    'table_name' => 'products',
                    'created_at' => '2020-08-20 17:21:34',
                    'updated_at' => '2020-08-20 17:21:34',
                ),
                27 => 
                array (
                    'id' => 28,
                    'key' => 'read_products',
                    'table_name' => 'products',
                    'created_at' => '2020-08-20 17:21:34',
                    'updated_at' => '2020-08-20 17:21:34',
                ),
                28 => 
                array (
                    'id' => 29,
                    'key' => 'edit_products',
                    'table_name' => 'products',
                    'created_at' => '2020-08-20 17:21:34',
                    'updated_at' => '2020-08-20 17:21:34',
                ),
                29 => 
                array (
                    'id' => 30,
                    'key' => 'add_products',
                    'table_name' => 'products',
                    'created_at' => '2020-08-20 17:21:34',
                    'updated_at' => '2020-08-20 17:21:34',
                ),
                30 => 
                array (
                    'id' => 31,
                    'key' => 'delete_products',
                    'table_name' => 'products',
                    'created_at' => '2020-08-20 17:21:34',
                    'updated_at' => '2020-08-20 17:21:34',
                ),
                31 => 
                array (
                    'id' => 32,
                    'key' => 'browse_categories',
                    'table_name' => 'categories',
                    'created_at' => '2020-08-20 17:21:42',
                    'updated_at' => '2020-08-20 17:21:42',
                ),
                32 => 
                array (
                    'id' => 33,
                    'key' => 'read_categories',
                    'table_name' => 'categories',
                    'created_at' => '2020-08-20 17:21:42',
                    'updated_at' => '2020-08-20 17:21:42',
                ),
                33 => 
                array (
                    'id' => 34,
                    'key' => 'edit_categories',
                    'table_name' => 'categories',
                    'created_at' => '2020-08-20 17:21:42',
                    'updated_at' => '2020-08-20 17:21:42',
                ),
                34 => 
                array (
                    'id' => 35,
                    'key' => 'add_categories',
                    'table_name' => 'categories',
                    'created_at' => '2020-08-20 17:21:42',
                    'updated_at' => '2020-08-20 17:21:42',
                ),
                35 => 
                array (
                    'id' => 36,
                    'key' => 'delete_categories',
                    'table_name' => 'categories',
                    'created_at' => '2020-08-20 17:21:42',
                    'updated_at' => '2020-08-20 17:21:42',
                ),
                36 => 
                array (
                    'id' => 37,
                    'key' => 'browse_orders',
                    'table_name' => 'orders',
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:46:30',
                ),
                37 => 
                array (
                    'id' => 38,
                    'key' => 'read_orders',
                    'table_name' => 'orders',
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:46:30',
                ),
                38 => 
                array (
                    'id' => 39,
                    'key' => 'edit_orders',
                    'table_name' => 'orders',
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:46:30',
                ),
                39 => 
                array (
                    'id' => 40,
                    'key' => 'add_orders',
                    'table_name' => 'orders',
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:46:30',
                ),
                40 => 
                array (
                    'id' => 41,
                    'key' => 'delete_orders',
                    'table_name' => 'orders',
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:46:30',
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
