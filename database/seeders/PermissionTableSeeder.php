<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // check if table users is empty
        //  if(DB::table('permissions')->get()->count() == 0){

            DB::table('permissions')->insert([

                [
                    'name' => 'Affiliated List',
                    'slug' => Str::slug('Affiliated List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Affiliated Create',
                    'slug' => Str::slug('Affiliated Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Affiliated Edit',
                    'slug' => Str::slug('Affiliated Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Affiliated Show',
                    'slug' => Str::slug('Affiliated Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Affiliated Delete',
                    'slug' => Str::slug('Affiliated Delete'),
                    'order' => 5,
                ],
                [
                    'name' => 'Album List',
                    'slug' => Str::slug('Album List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Album Create',
                    'slug' => Str::slug('Album Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Album  Edit',
                    'slug' => Str::slug('Album  Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Album  Show',
                    'slug' => Str::slug('Album  Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Album  Delete',
                    'slug' => Str::slug('Album  Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Branch List',
                    'slug' => Str::slug('Branch List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Branch Create',
                    'slug' => Str::slug('Branch Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Branch Edit',
                    'slug' => Str::slug('Branch Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Branch Show',
                    'slug' => Str::slug('Branch Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Branch Delete',
                    'slug' => Str::slug('Branch Delete'),
                    'order' => 5,
                ],  
                [
                    'name' => 'Branch Sort Order',
                    'slug' => Str::slug('Branch Sort Order'),
                    'order' => 5,
                ], 
                [
                    'name' => 'Category List',
                    'slug' => Str::slug('Category List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Category Create',
                    'slug' => Str::slug('Category Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Category Edit',
                    'slug' => Str::slug('Category Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Category Show',
                    'slug' => Str::slug('Category Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Category Delete',
                    'slug' => Str::slug('Category Delete'),
                    'order' => 5,
                ],
                [
                    'name' => 'Category Sort Order',
                    'slug' => Str::slug('Category Sort Order'),
                    'order' => 5,
                ],  
                [
                    'name' => 'Header Setting',
                    'slug' => Str::slug('Header Setting'),
                    'order' => 1,
                ],
                [
                    'name' => 'Footer Setting',
                    'slug' => Str::slug('Footer Setting'),
                    'order' => 2,
                ],
                [
                    'name' => 'Contact List',
                    'slug' => Str::slug('Contact List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Contact Create',
                    'slug' => Str::slug('Contact Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Contact Edit',
                    'slug' => Str::slug('Contact Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Contact Show',
                    'slug' => Str::slug('Contact Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Contact Delete',
                    'slug' => Str::slug('Contact Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Database Table List',
                    'slug' => Str::slug('Database Table List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Database Backup Download',
                    'slug' => Str::slug('Database Backup Download'),
                    'order' => 2,
                ],
                [
                    'name' => 'Database Backup In Server',
                    'slug' => Str::slug('Database Backup In Server'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Data List',
                    'slug' => Str::slug('Data List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Data Create',
                    'slug' => Str::slug('Data Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Data Edit',
                    'slug' => Str::slug('Data Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Data Show',
                    'slug' => Str::slug('Data Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Data Delete',
                    'slug' => Str::slug('Data Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Post File List',
                    'slug' => Str::slug('Post File List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Post File Create',
                    'slug' => Str::slug('Post File Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Post File Edit',
                    'slug' => Str::slug('Post File Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Post File Show',
                    'slug' => Str::slug('Post File Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Post File Delete',
                    'slug' => Str::slug('Post File Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Gallery List',
                    'slug' => Str::slug('Gallery List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Gallery Create',
                    'slug' => Str::slug('Gallery Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Gallery Edit',
                    'slug' => Str::slug('Gallery Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Gallery Show',
                    'slug' => Str::slug('Gallery Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Gallery Delete',
                    'slug' => Str::slug('Gallery Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Language List',
                    'slug' => Str::slug('Language List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Language Create',
                    'slug' => Str::slug('Language Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Language Edit',
                    'slug' => Str::slug('Language Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Language Show',
                    'slug' => Str::slug('Language Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Language Delete',
                    'slug' => Str::slug('Language Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Link List',
                    'slug' => Str::slug('Link List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Link Create',
                    'slug' => Str::slug('Link Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Link Edit',
                    'slug' => Str::slug('Link Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Link Show',
                    'slug' => Str::slug('Link Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Link Delete',
                    'slug' => Str::slug('Link Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Menu List',
                    'slug' => Str::slug('Menu List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Menu Create',
                    'slug' => Str::slug('Menu Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Menu Edit',
                    'slug' => Str::slug('Menu Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Menu Show',
                    'slug' => Str::slug('Menu Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Menu Delete',
                    'slug' => Str::slug('Menu Delete'),
                    'order' => 5,
                ],
                [
                    'name' => 'Menu Sort Order',
                    'slug' => Str::slug('Menu Sort Order'),
                    'order' => 5,
                ],   
                [
                    'name' => 'Popup List',
                    'slug' => Str::slug('Popup List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Popup Create',
                    'slug' => Str::slug('Popup Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Popup Edit',
                    'slug' => Str::slug('Popup Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Popup Show',
                    'slug' => Str::slug('Popup Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Popup Delete',
                    'slug' => Str::slug('Popup Delete'),
                    'order' => 5,
                ],  
                [
                    'name' => 'Page List',
                    'slug' => Str::slug('Page List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Page Create',
                    'slug' => Str::slug('Page Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Page Edit',
                    'slug' => Str::slug('Page Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Page Show',
                    'slug' => Str::slug('Page Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Page Delete',
                    'slug' => Str::slug('Page Delete'),
                    'order' => 5,
                ],
                [
                    'name' => 'Delete Post File',
                    'slug' => Str::slug('Delete File'),
                    'order' => 5,
                ], 
                [
                    'name' => 'Deleted Page',
                    'slug' => Str::slug('Deleted Page'),
                    'order' => 5,
                ],
                [
                    'name' => 'Delete Page/Post Permanently',
                    'slug' => Str::slug('Delete Post Permanently'),
                    'order' => 5,
                ],
                [
                    'name' => 'Restore Page/Post',
                    'slug' => Str::slug('Restore Post'),
                    'order' => 5,
                ], 
                [
                    'name' => 'Post List',
                    'slug' => Str::slug('Post List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Post Create',
                    'slug' => Str::slug('Post Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Post Edit',
                    'slug' => Str::slug('Post Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Post Show',
                    'slug' => Str::slug('Post Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Post Delete',
                    'slug' => Str::slug('Post Delete'),
                    'order' => 5,
                ], 
                [
                    'name' => 'Deleted Post',
                    'slug' => Str::slug('Deleted Post'),
                    'order' => 5,
                ],
                [
                    'name' => 'Role List',
                    'slug' => Str::slug('Role List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Role Create',
                    'slug' => Str::slug('Role Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Role Edit',
                    'slug' => Str::slug('Role Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Role Show',
                    'slug' => Str::slug('Role Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Role Delete',
                    'slug' => Str::slug('Role Delete'),
                    'order' => 5,
                ], 
                [
                    'name' => 'Assign Permission',
                    'slug' => Str::slug('Assign Permission'),
                    'order' => 5,
                ],  
                [
                    'name' => 'Service List',
                    'slug' => Str::slug('Service List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Service Create',
                    'slug' => Str::slug('Service Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Service Edit',
                    'slug' => Str::slug('Service Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Service Show',
                    'slug' => Str::slug('Service Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Service Delete',
                    'slug' => Str::slug('Service Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'General Setting',
                    'slug' => Str::slug('General Setting'),
                    'order' => 1,
                ],
                [
                    'name' => 'Social Setting',
                    'slug' => Str::slug('Social Setting'),
                    'order' => 2,
                ],
                [
                    'name' => 'About Setting',
                    'slug' => Str::slug('About Setting'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Slider List',
                    'slug' => Str::slug('Slider List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Slider Create',
                    'slug' => Str::slug('Slider Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Slider Edit',
                    'slug' => Str::slug('Slider Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Slider Show',
                    'slug' => Str::slug('Slider Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Slider Delete',
                    'slug' => Str::slug('Slider Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'Staff List',
                    'slug' => Str::slug('Staff List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Staff Create',
                    'slug' => Str::slug('Staff Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'Staff Edit',
                    'slug' => Str::slug('Staff Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'Staff Show',
                    'slug' => Str::slug('Staff Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'Staff Delete',
                    'slug' => Str::slug('Staff Delete'),
                    'order' => 5,
                ],  
                [
                    'name' => 'Staff Sort Order',
                    'slug' => Str::slug('Staff Sort Order'),
                    'order' => 5,
                ],
                [
                    'name' => 'Tracker List',
                    'slug' => Str::slug('Tracker List'),
                    'order' => 1,
                ],
                [
                    'name' => 'Tracker Delete',
                    'slug' => Str::slug('Tracker Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'User List',
                    'slug' => Str::slug('User List'),
                    'order' => 1,
                ],
                [
                    'name' => 'User Create',
                    'slug' => Str::slug('User Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'User Edit',
                    'slug' => Str::slug('User Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'User Show',
                    'slug' => Str::slug('User Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'User Delete',
                    'slug' => Str::slug('User Delete'),
                    'order' => 5,
                ],  [
                    'name' => 'User Profile List',
                    'slug' => Str::slug('User Profile List'),
                    'order' => 1,
                ],
                [
                    'name' => 'User Profile Create',
                    'slug' => Str::slug('User Profile Create'),
                    'order' => 2,
                ],
                [
                    'name' => 'User Profile Edit',
                    'slug' => Str::slug('User Profile Edit'),
                    'order' => 3,
                ], 
                [
                    'name' => 'User Profile Show',
                    'slug' => Str::slug('User Profile Show'),
                    'order' => 4,
                ],
                [
                    'name' => 'User Profile Delete',
                    'slug' => Str::slug('User Profile Delete'),
                    'order' => 5,
                ],
                [
                    'name' => 'User Change Password',
                    'slug' => Str::slug('User Change Password'),
                    'order' => 5,
                ],
            ]);

        // } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
