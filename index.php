<?php
session_start();
ob_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

require_once(__DIR__ . '/public/router.php');
require_once(__DIR__ . '/app/controller/index.php');

require_once realpath('vendor/autoload.php');

use App\controller\Controller;

$router = new Router();
$router
    ->get('/', [Controller::class, 'index'])
    ->get('/index.php', [Controller::class, 'index'])
    ->get('/shop', [Controller::class, 'shop'])
    ->get('/product-detail', [Controller::class, 'productdetail'])
    ->get('/blog', [Controller::class, 'blog'])
    ->get('/blog-detail', [Controller::class, 'blogdetail'])
    ->get('/about', [Controller::class, 'about'])
    ->get('/contact', [Controller::class, 'contact'])
    ->get('/shoping-cart', [Controller::class, 'shopingcart'])
    ->post('/add-cart', [Controller::class, 'add_cart'])
    ->get('/remove-cart', [Controller::class, 'remove_cart'])
    ->get('/check-out', [Controller::class, 'checkout'])
    ->post('/xl-checkout', [Controller::class, 'xl_checkout'])
    ->get('/check-out-payment', [Controller::class, 'checkout_payment'])
    ->get('/check-out-success', [Controller::class, 'checkout_success'])
    ->get('/login', [Controller::class, 'login'])
    ->post('/xl-login', [Controller::class, 'xl_login'])
    ->get('/logout', [Controller::class, 'log_out'])
    ->get('/register', [Controller::class, 'register'])
    ->post('/xl-register', [Controller::class, 'xl_register'])
    ->get('/forgot', [Controller::class, 'forgot'])
    ->post('/xl-forgot', [Controller::class, 'xl_forgot'])
    ->get('/profile', [Controller::class, 'profile'])
    ->get('/profile-edit', [Controller::class, 'profile_edit'])
    ->post('/xl-profile', [Controller::class, 'xl_profile'])
    // ADMIN 
    ->get('/admin', [Controller::class, 'admin'])
    ->get('/admin-user', [Controller::class, 'admin_user'])
    ->get('/admin-order', [Controller::class, 'admin_order'])
    ->get('/admin-order-update', [Controller::class, 'admin_order_update'])
    ->post('/xl-order-update', [Controller::class, 'xl_order_update'])
    ->get('/admin-product', [Controller::class, 'admin_product'])
    ->get('/admin-product-add', [Controller::class, 'admin_add_product'])
    ->post('/xl-product-add', [Controller::class, 'xl_add_product'])
    ->get('/admin-product-edit', [Controller::class, 'admin_edit_product'])
    ->post('/xl-product-edit', [Controller::class, 'xl_edit_product'])
    ->get('/admin-product-delete', [Controller::class, 'admin_detele_product'])
    ->get('/admin-category', [Controller::class, 'admin_category'])

    //Thi
    ->get('/list', [Controller::class, 'list']);

try {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    echo $router->resolve($uri, $method);
} catch (\Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
