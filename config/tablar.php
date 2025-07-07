<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'SIM AHA Right Brain',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'Tablar',
    'current_version' => 'v11.11',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'assets/aha-warna-new.png',
            'alt' => 'SIM AHA Right Brain',
            'class' => 'navbar-brand-image',
            'width' =>  50,
            'height' => 50,
        ],
    ],

    /*
     *
     * Default path is 'resources/views/vendor/tablar' as null. Set your custom path here If you need.
     */

    'views_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'vertical',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => true,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => true,

    /*
    |--------------------------------------------------------------------------
    | Sticky Navbar for Top Nav
    |--------------------------------------------------------------------------
    |
    | Here you can enable/disable the sticky functionality of Top Navigation Bar.
    |
    | For detailed instructions, you can look at the Top Navigation Bar classes here:
    |
    */

    'sticky_top_nav_bar' => false,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => 'profile.edit',

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => 'Beranda',
            'icon' => 'ti ti-layout-dashboard',
            'url' => 'home',
            'active' => ['home'],
        ],

        [
            'text' => 'Lisensi',
            'icon' => 'ti ti-license',
            'url' => '#',
            'active' => ['licenses'],
            'submenu' => [
                [
                    'text' => 'Data Lisensi',
                    'url' => 'licenses',
                    'icon' => 'ti ti-license',
                ],
                [
                    'text' => 'Data Pemilik',
                    'url' => 'license_holders',
                    'icon' => 'ti ti-users',
                ],
            ],
        ],

        [
            'text' => 'Data Karyawan',
            'icon' => 'ti ti-id-badge',
            'url' => 'employees',
            'role' => 'Super-Admin',
        ],

        [
            'text' => 'Data Siswa',
            'icon' => 'ti ti-users-group',
            'url' => '#',
            'role' => 'Super-Admin',
        ],

        [
            'text' => 'Keuangan',
            'url' => '#',
            'icon' => 'ti ti-user-cog',
            'active' => ['support1'],
            'role' => 'Super-Admin',
            'submenu' => [
                [
                    'text' => 'Input Keuangan',
                    'url' => '#',
                    'icon' => 'ti ti-currency-dollar',
                ],
                [
                    'text' => 'Laporan Keuangan',
                    'url' => '#',
                    'icon' => 'ti ti-report-analytics',
                ]
            ],
        ],

        [
            'text' => 'Manajemen User',
            'url' => 'users',
            'icon' => 'ti ti-users',
            'active' => ['users*'],
            'role' => 'Super-Admin',
            
        ],

        [
            'text' => 'Manajemen Role',
            'url' => 'roles',
            'icon' => 'ti ti-users',
            'active' => ['roles'],
            'role' => 'Super-Admin',
            
        ],
    ],

    

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => false,

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://livewire.laravel.com
    |
    */

    'livewire' => false,
];
