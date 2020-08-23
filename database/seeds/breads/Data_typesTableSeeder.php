<?php

use Illuminate\Database\Seeder;

class Data_typesTableSeeder extends Seeder
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

        \DB::table('data_types')->delete();

        \DB::table('data_types')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'name' => 'users',
                    'slug' => 'users',
                    'display_name_singular' => 'Użytkownik',
                    'display_name_plural' => 'Użytkownicy',
                    'icon' => 'voyager-person',
                    'model_name' => 'TCG\\Voyager\\Models\\User',
                    'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                    'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                    'description' => '',
                    'generate_permissions' => 1,
                    'server_side' => 0,
                    'details' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                1 => 
                array (
                    'id' => 2,
                    'name' => 'menus',
                    'slug' => 'menus',
                    'display_name_singular' => 'Menu',
                    'display_name_plural' => 'Menu',
                    'icon' => 'voyager-list',
                    'model_name' => 'TCG\\Voyager\\Models\\Menu',
                    'policy_name' => NULL,
                    'controller' => '',
                    'description' => '',
                    'generate_permissions' => 1,
                    'server_side' => 0,
                    'details' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                2 => 
                array (
                    'id' => 3,
                    'name' => 'roles',
                    'slug' => 'roles',
                    'display_name_singular' => 'Rola',
                    'display_name_plural' => 'Role',
                    'icon' => 'voyager-lock',
                    'model_name' => 'TCG\\Voyager\\Models\\Role',
                    'policy_name' => NULL,
                    'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                    'description' => '',
                    'generate_permissions' => 1,
                    'server_side' => 0,
                    'details' => NULL,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                ),
                3 => 
                array (
                    'id' => 4,
                    'name' => 'categories',
                    'slug' => 'categories',
                    'display_name_singular' => 'Kategoria',
                    'display_name_plural' => 'Kategorie',
                    'icon' => 'voyager-categories',
                    'model_name' => 'App\\Category',
                    'policy_name' => NULL,
                    'controller' => NULL,
                    'description' => NULL,
                    'generate_permissions' => 1,
                    'server_side' => 0,
                    'details' => '{"order_column":"id","order_display_column":"name","order_direction":"asc","default_search_key":null,"scope":null}',
                    'created_at' => '2020-08-20 17:17:39',
                    'updated_at' => '2020-08-20 17:21:42',
                ),
                4 => 
                array (
                    'id' => 5,
                    'name' => 'products',
                    'slug' => 'products',
                    'display_name_singular' => 'Produkt',
                    'display_name_plural' => 'Produkty',
                    'icon' => 'voyager-shop',
                    'model_name' => 'App\\Product',
                    'policy_name' => NULL,
                    'controller' => NULL,
                    'description' => NULL,
                    'generate_permissions' => 1,
                    'server_side' => 0,
                    'details' => '{"order_column":"id","order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}',
                    'created_at' => '2020-08-20 17:19:51',
                    'updated_at' => '2020-08-20 17:22:39',
                ),
                5 => 
                array (
                    'id' => 6,
                    'name' => 'orders',
                    'slug' => 'orders',
                    'display_name_singular' => 'Zamówienie',
                    'display_name_plural' => 'Zamówienia',
                    'icon' => 'voyager-ticket',
                    'model_name' => 'App\\Order',
                    'policy_name' => NULL,
                    'controller' => NULL,
                    'description' => NULL,
                    'generate_permissions' => 1,
                    'server_side' => 0,
                    'details' => '{"order_column":"id","order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}',
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:48:32',
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
