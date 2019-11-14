<?php

function prepareVariables($page,$action,$id){
    $params = [
        'login' => get_user(),
        'nav' => getMenu(),
        'count' => getCartCount(),
        'admin' => is_admin(),
        'allow' => is_auth()

    ];
    switch ($page) {
        case 'auth':
            if ($action == "login") {
                if (isset($_POST['send'])) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];

                    if (!auth($login, $pass)) {
                        Die('Не верный логин пароль');
                    } else {

                        if (isset($_POST['save'])) {
                            $hash = uniqid(rand(), true);
                            $id = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_SESSION['id'])));
                            $sql = "UPDATE `users` SET hash = '{$hash}' WHERE `users`.`id` = {$id}";
                            executeQuery($sql);
                            setcookie("hash", $hash, time() + 3600, "/");

                        }else{
                            $hash = uniqid(rand(), true);
                            $id = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_SESSION['id'])));
                            $sql = "UPDATE `users` SET hash = '{$hash}' WHERE `users`.`id` = {$id}";
                            executeQuery($sql);
                        }
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                    }
                }
                exit;
            }
            if ($action == "logout"){
                session_unset();
                session_destroy();
                setcookie("hash", "", time() - 3600, "/");
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }
            header('Location: /');
            break;
        case 'admin':
            $params['carts'] = getConfirmCarts();
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
            if (is_admin()){
                $params['cart'] = getCart($action);
            }else{
                $params['cart'] = getCart();
            }

            break;
        case 'confirmation':
            confirmCart($_POST);
            session_regenerate_id();
            $params['confirmCart'] ='Заказ отправлен на обработку';
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

                echo json_encode(["result" => 1, "count" => getCartCount(), "itemCount" => getItemCount($id)]);
                exit;
            }
            if ($action == "getproducts"){
                $products = getCart($_GET['session']);
               echo json_encode($products);
                exit;
            }
            if ($action == "aprovecart"){
                aproveCart($id);
                echo json_encode(["result" => 1, "cartStatus" => getCartStatus($id)]);
                exit;
            }
            if ($action == "disaprovecart"){
                disaproveCart($id);
                echo json_encode(["result" => 1, "cartStatus" => getCartStatus($id)]);
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




