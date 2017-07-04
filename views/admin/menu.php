<?php

$menuItems = [
    [
        "text" => "Dashboard",
        "icon" => "icon-home",
        "url" => "/admin/dashboard"
    ],
    [
        "text" => "User",
        "icon" => "icon-user",
        "sub" => [
            [
                "text" => "Add new",
                "icon" => "icon-plus",
                "url" => "/admin/user/add-new"
            ]
        ]
    ],
    [
        "text" => "Tour",
        "icon" => "icon-pointer",
        "sub" => [
            [
                "text" => "Add new",
                "icon" => "icon-plus",
                "url" => "/admin/tour/add-new"
            ],
            [
                "text" => "List",
                "icon" => "icon-list",
                "url" => "/admin/tour/list"
            ]
        ]
    ]
];
