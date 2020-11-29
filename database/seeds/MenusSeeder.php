<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Dashboard',
                'path' => '#',
                'icon' => 'fa-dashboard',
                'parent' => 0,
                'is_active' => '1',
                'last_access' => null,
            ],
            [
                'name' => 'Setting Application',
                'path' => '#',
                'icon' => 'fa-gears',
                'parent' => 0,
                'is_active' => '1',
                'last_access' => null,
            ],
            [
                'name' => 'Manajemen Menus',
                'path' => '/menus',
                'icon' => null,
                'parent' => 2,
                'is_active' => '1',
                'last_access' => null,
            ],
            [
                'name' => 'Manajemen Roles',
                'path' => '/roles',
                'icon' => null,
                'parent' => 2,
                'is_active' => '1',
                'last_access' => null,
            ],
            [
                'name' => 'Manajemen Users',
                'path' => '/users',
                'icon' => null,
                'parent' => 2,
                'is_active' => '1',
                'last_access' => null,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
