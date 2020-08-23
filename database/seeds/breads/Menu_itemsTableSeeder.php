<?php

use Illuminate\Database\Seeder;

class Menu_itemsTableSeeder extends Seeder
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

        \DB::table('menu_items')->delete();

        \DB::table('menu_items')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'menu_id' => 1,
                    'title' => 'Panel',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-boat',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 1,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.dashboard',
                    'parameters' => NULL,
                ),
                1 => 
                array (
                    'id' => 2,
                    'menu_id' => 1,
                    'title' => 'Media',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-images',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 5,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.media.index',
                    'parameters' => NULL,
                ),
                2 => 
                array (
                    'id' => 3,
                    'menu_id' => 1,
                    'title' => 'Uzytkownicy',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-person',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 3,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.users.index',
                    'parameters' => NULL,
                ),
                3 => 
                array (
                    'id' => 4,
                    'menu_id' => 1,
                    'title' => 'Role',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-lock',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 2,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.roles.index',
                    'parameters' => NULL,
                ),
                4 => 
                array (
                    'id' => 5,
                    'menu_id' => 1,
                    'title' => 'Narzędzia',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-tools',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 9,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => NULL,
                    'parameters' => NULL,
                ),
                5 => 
                array (
                    'id' => 6,
                    'menu_id' => 1,
                    'title' => 'Edytor Menu',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-list',
                    'color' => NULL,
                    'parent_id' => 5,
                    'order' => 10,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.menus.index',
                    'parameters' => NULL,
                ),
                6 => 
                array (
                    'id' => 7,
                    'menu_id' => 1,
                    'title' => 'Baza Danych',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-data',
                    'color' => NULL,
                    'parent_id' => 5,
                    'order' => 11,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.database.index',
                    'parameters' => NULL,
                ),
                7 => 
                array (
                    'id' => 8,
                    'menu_id' => 1,
                    'title' => 'Komaps',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-compass',
                    'color' => NULL,
                    'parent_id' => 5,
                    'order' => 12,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.compass.index',
                    'parameters' => NULL,
                ),
                8 => 
                array (
                    'id' => 9,
                    'menu_id' => 1,
                    'title' => 'BREAD',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-bread',
                    'color' => NULL,
                    'parent_id' => 5,
                    'order' => 13,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.bread.index',
                    'parameters' => NULL,
                ),
                9 => 
                array (
                    'id' => 10,
                    'menu_id' => 1,
                    'title' => 'Ustawienia',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-settings',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 14,
                    'created_at' => '2020-08-20 17:12:52',
                    'updated_at' => '2020-08-20 17:12:52',
                    'route' => 'voyager.settings.index',
                    'parameters' => NULL,
                ),
                10 => 
                array (
                    'id' => 11,
                    'menu_id' => 1,
                    'title' => 'Hooks',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-hook',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 13,
                    'created_at' => '2020-08-20 17:13:44',
                    'updated_at' => '2020-08-20 17:13:44',
                    'route' => 'voyager.hooks',
                    'parameters' => NULL,
                ),
                11 => 
                array (
                    'id' => 12,
                    'menu_id' => 1,
                    'title' => 'Kategorie',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-categories',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 15,
                    'created_at' => '2020-08-20 17:17:39',
                    'updated_at' => '2020-08-20 17:17:39',
                    'route' => 'voyager.categories.index',
                    'parameters' => NULL,
                ),
                12 => 
                array (
                    'id' => 13,
                    'menu_id' => 1,
                    'title' => 'Produkty',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-shop',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 16,
                    'created_at' => '2020-08-20 17:19:51',
                    'updated_at' => '2020-08-20 17:19:51',
                    'route' => 'voyager.products.index',
                    'parameters' => NULL,
                ),
                13 => 
                array (
                    'id' => 14,
                    'menu_id' => 1,
                    'title' => 'Zamówienia',
                    'url' => '',
                    'target' => '_self',
                    'icon_class' => 'voyager-ticket',
                    'color' => NULL,
                    'parent_id' => NULL,
                    'order' => 17,
                    'created_at' => '2020-08-20 17:46:30',
                    'updated_at' => '2020-08-20 17:46:30',
                    'route' => 'voyager.orders.index',
                    'parameters' => NULL,
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
