<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$navArr = [
  [
      'title' => 'Главная',
      'link' => '/',
  ],
  [
      'title' => 'Каталог',
      'link' => '/?page=catalog',
  ],
    [
        'title' => 'Галлерея',
        'link' => '/?page=gallery',
    ],
    [
        'title' => 'Сабменю1',
        'link' => '#',
        'subitem' => [
            [
                'title' => 'Главная',
                'link' => '/',
            ],
            [
                'title' => 'Каталог',
                'link' => '/?page=catalog',
            ],
            [
                'title' => 'Контакты',
                'link' => '/?page=contacts',
                'subitem' => [
                    [
                        'title' => 'Главная',
                        'link' => '/',
                    ],
                    [
                        'title' => 'Каталог',
                        'link' => '/?page=catalog',
                    ],
                    [
                        'title' => 'Контакты',
                        'link' => '/?page=contacts',
                    ]
                ]
            ]
        ]
    ],
];



$params = [
    'login' => 'admin',
    'nav' => renderMenu($navArr)
];

switch ($page) {
    case 'index':
        $params['name'] = 'Клен';
        break;
    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;
    case 'gallery':
        $params['gallery'] = getGallery(GALLERY_DIR);
        break;
        case 'apicatalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],

            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];

        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        exit;
        break;

}

echo render($page, $params);
