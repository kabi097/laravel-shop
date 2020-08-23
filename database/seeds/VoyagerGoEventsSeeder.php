<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerGoEventsSeeder extends Seeder
{
    use Seedable;
    
    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedersPath = database_path('seeds').'/breads/';
        $this->seed('Data_typesTableSeeder');
        $this->seed('Data_rowsTableSeeder');
        $this->seed('MenusTableSeeder');
        $this->seed('Menu_itemsTableSeeder');
        $this->seed('SettingsTableSeeder');
        $this->seed('PermissionsGoEventsSeeder');
        $this->seed('RolesTableSeeder');
        $this->seed('User_rolesTableSeeder');
    }
}
