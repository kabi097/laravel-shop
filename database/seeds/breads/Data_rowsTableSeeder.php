<?php

use Illuminate\Database\Seeder;

class Data_rowsTableSeeder extends Seeder
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

        \DB::table('data_rows')->delete();

        \DB::table('data_rows')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'data_type_id' => 1,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'ID',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 1,
                ),
                1 => 
                array (
                    'id' => 2,
                    'data_type_id' => 1,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Nazwa',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 2,
                ),
                2 => 
                array (
                    'id' => 3,
                    'data_type_id' => 1,
                    'field' => 'email',
                    'type' => 'text',
                    'display_name' => 'Email',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 3,
                ),
                3 => 
                array (
                    'id' => 4,
                    'data_type_id' => 1,
                    'field' => 'password',
                    'type' => 'password',
                    'display_name' => 'Hasło',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 4,
                ),
                4 => 
                array (
                    'id' => 5,
                    'data_type_id' => 1,
                    'field' => 'remember_token',
                    'type' => 'text',
                    'display_name' => 'Remember Token',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 5,
                ),
                5 => 
                array (
                    'id' => 6,
                    'data_type_id' => 1,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Utworzono',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 6,
                ),
                6 => 
                array (
                    'id' => 7,
                    'data_type_id' => 1,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Zaktualizowano',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 7,
                ),
                7 => 
                array (
                    'id' => 8,
                    'data_type_id' => 1,
                    'field' => 'avatar',
                    'type' => 'image',
                    'display_name' => 'Avatar',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 8,
                ),
                8 => 
                array (
                    'id' => 9,
                    'data_type_id' => 1,
                    'field' => 'user_belongsto_role_relationship',
                    'type' => 'relationship',
                    'display_name' => 'Role',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 0,
                    'details' => '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"display_name","pivot_table":"roles","pivot":0}',
                    'order' => 10,
                ),
                9 => 
                array (
                    'id' => 10,
                    'data_type_id' => 1,
                    'field' => 'user_belongstomany_role_relationship',
                    'type' => 'relationship',
                    'display_name' => 'Roles',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 0,
                    'details' => '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsToMany","column":"id","key":"id","label":"display_name","pivot_table":"user_roles","pivot":"1","taggable":"0"}',
                    'order' => 11,
                ),
                10 => 
                array (
                    'id' => 11,
                    'data_type_id' => 1,
                    'field' => 'settings',
                    'type' => 'hidden',
                    'display_name' => 'Settings',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 12,
                ),
                11 => 
                array (
                    'id' => 12,
                    'data_type_id' => 2,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'ID',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 1,
                ),
                12 => 
                array (
                    'id' => 13,
                    'data_type_id' => 2,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Nazwa',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 2,
                ),
                13 => 
                array (
                    'id' => 14,
                    'data_type_id' => 2,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Utworzono',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 3,
                ),
                14 => 
                array (
                    'id' => 15,
                    'data_type_id' => 2,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Zaktualizowano',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 4,
                ),
                15 => 
                array (
                    'id' => 16,
                    'data_type_id' => 3,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'ID',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 1,
                ),
                16 => 
                array (
                    'id' => 17,
                    'data_type_id' => 3,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Nazwa',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 2,
                ),
                17 => 
                array (
                    'id' => 18,
                    'data_type_id' => 3,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Utworzono',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 3,
                ),
                18 => 
                array (
                    'id' => 19,
                    'data_type_id' => 3,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Zaktualizowano',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => NULL,
                    'order' => 4,
                ),
                19 => 
                array (
                    'id' => 20,
                    'data_type_id' => 3,
                    'field' => 'display_name',
                    'type' => 'text',
                    'display_name' => 'Nazwa Wyświetlana',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 5,
                ),
                20 => 
                array (
                    'id' => 21,
                    'data_type_id' => 1,
                    'field' => 'role_id',
                    'type' => 'text',
                    'display_name' => 'Role',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => NULL,
                    'order' => 9,
                ),
                21 => 
                array (
                    'id' => 22,
                    'data_type_id' => 4,
                    'field' => 'id',
                    'type' => 'text',
                    'display_name' => 'Id',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 1,
                ),
                22 => 
                array (
                    'id' => 23,
                    'data_type_id' => 4,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Nazwa',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 2,
                ),
                23 => 
                array (
                    'id' => 24,
                    'data_type_id' => 4,
                    'field' => 'description',
                    'type' => 'text_area',
                    'display_name' => 'Opis',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 3,
                ),
                24 => 
                array (
                    'id' => 25,
                    'data_type_id' => 4,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Dodano',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 4,
                ),
                25 => 
                array (
                    'id' => 26,
                    'data_type_id' => 4,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Zaktualizowano',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 5,
                ),
                26 => 
                array (
                    'id' => 27,
                    'data_type_id' => 5,
                    'field' => 'id',
                    'type' => 'text',
                    'display_name' => 'Id',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 1,
                ),
                27 => 
                array (
                    'id' => 28,
                    'data_type_id' => 5,
                    'field' => 'title',
                    'type' => 'text',
                    'display_name' => 'Tytuł',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 3,
                ),
                28 => 
                array (
                    'id' => 29,
                    'data_type_id' => 5,
                    'field' => 'price',
                    'type' => 'number',
                    'display_name' => 'Cena',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 4,
                ),
                29 => 
                array (
                    'id' => 30,
                    'data_type_id' => 5,
                    'field' => 'description',
                    'type' => 'text_area',
                    'display_name' => 'Opis',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 5,
                ),
                30 => 
                array (
                    'id' => 31,
                    'data_type_id' => 5,
                    'field' => 'quantity',
                    'type' => 'number',
                    'display_name' => 'Ilość',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 6,
                ),
                31 => 
                array (
                    'id' => 32,
                    'data_type_id' => 5,
                    'field' => 'images',
                    'type' => 'media_picker',
                    'display_name' => 'Obrazy',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"max":10,"min":0,"expanded":true,"show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":[],"hide_thumbnails":false,"quality":90,"thumbnails":[{"type":"fit","name":"cropped","width":"300","height":"250","position":"center"}]}',
                    'order' => 7,
                ),
                32 => 
                array (
                    'id' => 33,
                    'data_type_id' => 5,
                    'field' => 'date',
                    'type' => 'date',
                    'display_name' => 'Data wydarzenia',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 8,
                ),
                33 => 
                array (
                    'id' => 34,
                    'data_type_id' => 5,
                    'field' => 'featured',
                    'type' => 'checkbox',
                    'display_name' => 'Wyróżnienie',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 9,
                ),
                34 => 
                array (
                    'id' => 35,
                    'data_type_id' => 5,
                    'field' => 'category_id',
                    'type' => 'text',
                    'display_name' => 'Category Id',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 2,
                ),
                35 => 
                array (
                    'id' => 36,
                    'data_type_id' => 5,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Dodano',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 10,
                ),
                36 => 
                array (
                    'id' => 37,
                    'data_type_id' => 5,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Zaktualizowano',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 11,
                ),
                37 => 
                array (
                    'id' => 38,
                    'data_type_id' => 5,
                    'field' => 'product_belongsto_category_relationship',
                    'type' => 'relationship',
                    'display_name' => 'Kategoria',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"model":"App\\\\Category","table":"categories","type":"belongsTo","column":"category_id","key":"id","label":"name","pivot_table":"categories","pivot":"0","taggable":"0"}',
                    'order' => 12,
                ),
                38 => 
                array (
                    'id' => 39,
                    'data_type_id' => 6,
                    'field' => 'id',
                    'type' => 'text',
                    'display_name' => 'Id',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 1,
                ),
                39 => 
                array (
                    'id' => 40,
                    'data_type_id' => 6,
                    'field' => 'ticket',
                    'type' => 'text',
                    'display_name' => 'Identyfikator biletu',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 3,
                ),
                40 => 
                array (
                    'id' => 41,
                    'data_type_id' => 6,
                    'field' => 'first_name',
                    'type' => 'text',
                    'display_name' => 'Imię',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 4,
                ),
                41 => 
                array (
                    'id' => 42,
                    'data_type_id' => 6,
                    'field' => 'last_name',
                    'type' => 'text',
                    'display_name' => 'Nazwisko',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 5,
                ),
                42 => 
                array (
                    'id' => 43,
                    'data_type_id' => 6,
                    'field' => 'street',
                    'type' => 'text',
                    'display_name' => 'Ulica',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 6,
                ),
                43 => 
                array (
                    'id' => 44,
                    'data_type_id' => 6,
                    'field' => 'city',
                    'type' => 'text',
                    'display_name' => 'Miasto',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 7,
                ),
                44 => 
                array (
                    'id' => 45,
                    'data_type_id' => 6,
                    'field' => 'postal_code',
                    'type' => 'text',
                    'display_name' => 'Kod pocztowy',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 8,
                ),
                45 => 
                array (
                    'id' => 46,
                    'data_type_id' => 6,
                    'field' => 'phone_number',
                    'type' => 'text',
                    'display_name' => 'Numer telefonu',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 9,
                ),
                46 => 
                array (
                    'id' => 47,
                    'data_type_id' => 6,
                    'field' => 'email',
                    'type' => 'text',
                    'display_name' => 'Email',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 10,
                ),
                47 => 
                array (
                    'id' => 48,
                    'data_type_id' => 6,
                    'field' => 'nip',
                    'type' => 'text',
                    'display_name' => 'NIP',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 11,
                ),
                48 => 
                array (
                    'id' => 49,
                    'data_type_id' => 6,
                    'field' => 'user_id',
                    'type' => 'text',
                    'display_name' => 'User Id',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 2,
                ),
                49 => 
                array (
                    'id' => 50,
                    'data_type_id' => 6,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Dodano',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 12,
                ),
                50 => 
                array (
                    'id' => 51,
                    'data_type_id' => 6,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Zaktualizowano',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 13,
                ),
                51 => 
                array (
                    'id' => 52,
                    'data_type_id' => 6,
                    'field' => 'order_belongstomany_product_relationship',
                    'type' => 'relationship',
                    'display_name' => 'Produkty',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"model":"App\\\\Product","table":"products","type":"belongsToMany","column":"id","key":"id","label":"title","pivot_table":"order_product","pivot":"1","taggable":"0"}',
                    'order' => 14,
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
