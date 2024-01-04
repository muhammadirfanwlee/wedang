<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Master Data',
                'sub_menu' => [
                    'dashboardindex' => [
                        'icon' => '',
                        'route_name' => 'dashboardindex',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Data Produk'
                    ],
                    'sub_menu' => [
                        'icon' => '',
                        'route_name' => 'transaksiindex',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Data Transaksi'
                    ],


                ]


            ]

        ];
    }
}
