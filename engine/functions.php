<?php

function prepareVariables($page){
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
        case 'image':
            $content = getGalleryItem($_GET['id']);
            $params['imageItem'] = $content['name'];
            $params['views'] = $content['views'];
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

    return $params;

}


function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu',$params)
        ]
    );
}
function renderTemplate($page, $params = [])
{
    ob_start();
    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . "$page.php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}

function renderMenu($menu){
    $result = "";
    foreach ($menu as $item) {
            if (isset($item['subitem'])){
                $result .=
                    "<li class='menu__item drop__item'><a href='{$item['link']}'>{$item['title']}</a><ul class='sub__menu'>".
                renderMenu($item['subitem']) ."</ul></li>";
            }else{
                $result .= "<li class='menu__item'><a href='{$item['link']}'>{$item['title']}</a></li>";
            }
    }
    return $result;
}







