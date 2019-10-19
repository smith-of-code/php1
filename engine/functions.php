<?php

function prepareVariables($page,$action,$id){

    $params = [
        'login' => 'admin',
        'nav' => getMenu()

    ];
    switch ($page) {
        case 'index':
            $params['name'] = 'Клен';
            break;
        case 'catalog':
            $params['catalog'] = getCatalog();
            break;
        case 'product':
            $params['product'] = getProduct($id);
            $params['feedback'] = doFeedbackAction($id);
            break;
        case 'feedback':
            doFeedbackAction($id, $action);
            break;
        case 'gallery':
            $params['gallery'] = getGallery();
            break;
        case 'image':
            incrimentViews($id);
            $content = getGalleryItem($id);
            $params['imageItem'] = $content['name'];
            $params['views'] = $content['views'];
            break;
        case 'calculator':
            $params['calculate'] = mathOperation();
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




