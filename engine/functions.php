<?php

function prepareVariables($page,$action,$id){

    $params = [
        'login' => 'admin',
        'nav' => getMenu(),
        'count' => getCartCount()

    ];
    switch ($page) {
        case 'auth':
            if ($action == "login") {
                if (isset($_GET['send'])) {
                    $login = $_GET['login'];
                    $pass = $_GET['pass'];

                    if (!auth($login, $pass)) {
                        Die('Не верный логин пароль');
                    } else {
                        if (isset($_GET['save'])) {
                            $hash = uniqid(rand(), true);
                            $db = getDb();
                            $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
                            $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
                            $result = mysqli_query($db, $sql);
                            setcookie("hash", $hash, time() + 3600);

                        }
                        $allow = true;
                        $user = get_user();


                    }
                }
                exit;
            }

            break;
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
        case 'cart':
            $params['cart'] = getCart();
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
            if (!empty($_POST)) {
                $a = $_POST['first'];
                $b = $_POST['second'];
                $operation = $_POST['action'];
                $params['calculate'] = mathOperation($a, $b, $operation);
            } else {
                $params['calculate'] = ['error' => ['Произведите рассчет']];
            }
            break;
        case 'api':
            if ($action == "buy") {
                addToCart($id);

                echo json_encode(["result" => 1, "count" => getCartCount()]);
                exit;
            }
            if ($action == "delete") {
                deleteFromCart($id);

                echo json_encode(["result" => 1, "count" => getCartCount()]);
                exit;
            }

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




