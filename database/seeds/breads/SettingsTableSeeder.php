<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
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

        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'key' => 'site.title',
                    'display_name' => 'Tytuł Strony',
                    'value' => 'GoEvents.pl',
                    'details' => '',
                    'type' => 'text',
                    'order' => 1,
                    'group' => 'Site',
                ),
                1 => 
                array (
                    'id' => 2,
                    'key' => 'site.description',
                    'display_name' => 'Opis Strony',
                    'value' => 'Prosty sklep internetowy napisany przy użyciu frameworka Laravel oraz biblioteki jQuery.',
                    'details' => '',
                    'type' => 'text',
                    'order' => 2,
                    'group' => 'Site',
                ),
                2 => 
                array (
                    'id' => 3,
                    'key' => 'site.logo',
                    'display_name' => 'Logo Strony',
                    'value' => 'settings/August2020/TPshDPuP9ysNIg7SLZPG.png',
                    'details' => '',
                    'type' => 'image',
                    'order' => 3,
                    'group' => 'Site',
                ),
                3 => 
                array (
                    'id' => 4,
                    'key' => 'site.google_analytics_tracking_id',
                    'display_name' => 'Google Analytics Tracking ID',
                    'value' => NULL,
                    'details' => '',
                    'type' => 'text',
                    'order' => 6,
                    'group' => 'Site',
                ),
                4 => 
                array (
                    'id' => 5,
                    'key' => 'admin.bg_image',
                    'display_name' => 'Admin Grafika Tła',
                    'value' => '',
                    'details' => '',
                    'type' => 'image',
                    'order' => 5,
                    'group' => 'Admin',
                ),
                5 => 
                array (
                    'id' => 6,
                    'key' => 'admin.title',
                    'display_name' => 'Admin Tytuł',
                    'value' => 'GoEvents.pl',
                    'details' => '',
                    'type' => 'text',
                    'order' => 1,
                    'group' => 'Admin',
                ),
                6 => 
                array (
                    'id' => 7,
                    'key' => 'admin.description',
                    'display_name' => 'Admin Opis',
                    'value' => 'Witaj w Voyagerze. Zaginionym administratorze dla Laravela',
                    'details' => '',
                    'type' => 'text',
                    'order' => 2,
                    'group' => 'Admin',
                ),
                7 => 
                array (
                    'id' => 8,
                    'key' => 'admin.loader',
                    'display_name' => 'Admin Loader',
                    'value' => '',
                    'details' => '',
                    'type' => 'image',
                    'order' => 3,
                    'group' => 'Admin',
                ),
                8 => 
                array (
                    'id' => 9,
                    'key' => 'admin.icon_image',
                    'display_name' => 'Admin Grafika Ikony',
                    'value' => '',
                    'details' => '',
                    'type' => 'image',
                    'order' => 4,
                    'group' => 'Admin',
                ),
                9 => 
                array (
                    'id' => 10,
                    'key' => 'admin.google_analytics_client_id',
                'display_name' => 'Google Analytics Client ID (dla panelu administracyjnego)',
                    'value' => NULL,
                    'details' => '',
                    'type' => 'text',
                    'order' => 1,
                    'group' => 'Admin',
                ),
                10 => 
                array (
                    'id' => 11,
                    'key' => 'site.showtitle',
                    'display_name' => 'Pokaż tytuł strony',
                    'value' => '0',
                    'details' => NULL,
                    'type' => 'checkbox',
                    'order' => 4,
                    'group' => 'Site',
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
