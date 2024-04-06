<?php

namespace App\controller;

use App\model\Bill;
use App\model\Cart;
use App\model\Product;
use App\model\Category;
use App\model\User;
use App\model\Mailer;


class Controller
{
    public function index()
    {
        include_once('app/view/header.php');
        include_once('app/view/home.php');
        include_once('app/view/footer.php');
    }
    public function shop()
    {
        include_once('app/view/header.php');
        include_once('app/view/shop.php');
        include_once('app/view/footer.php');
    }
    public function productdetail()
    {
        // $one_product = new Product();
        // $one_product = $one_product->get_one_product($_GET['id']);
        include_once('app/view/header.php');
        include_once('app/view/product-detail.php');
        include_once('app/view/footer.php');
    }
    public function blog()
    {
        include_once('app/view/header.php');
        include_once('app/view/blog.php');
        include_once('app/view/footer.php');
    }
    public function blogdetail()
    {
        include_once('app/view/header.php');
        include_once('app/view/blog-detail.php');
        include_once('app/view/footer.php');
    }
    public function about()
    {
        include_once('app/view/header.php');
        include_once('app/view/about.php');
        include_once('app/view/footer.php');
    }
    public function contact()
    {
        include_once('app/view/header.php');
        include_once('app/view/contact.php');
        include_once('app/view/footer.php');
    }
    public function shopingcart()
    {
        // if (isset($_GET['id'])) {
        //     $cart = new Cart();
        //     $product_cart = new Product();

        //     $proId = $_GET['id'];

        //     $product_one = $product_cart->get_one_product($proId);

        //     $array_pro = [
        //         'id' => $product_one[0]['id'],
        //         'name' => $product_one[0]['name'],
        //         'price' => $product_one[0]['price'],
        //         'quantity' => 1,
        //         'img' => $product_one[0]['img']
        //     ];

        //     $position = $cart->checkcart($array_pro['id']);

        //     if ($position == -1) {
        //         $_SESSION['cart'][] = $array_pro;
        //     } else {
        //         $_SESSION['cart'][$position]['quantity']++;
        //     }
        // }
        include_once('app/view/header.php');
        include_once('app/view/shoping-cart.php');
        include_once('app/view/footer.php');
    }
    public function add_cart()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btn-add-cart']) && isset($_POST['quantity'])) {
                $id = $_POST['id'];
                $quantity = $_POST['quantity'];

                $product_cart = new Product();
                $cart = new Cart();

                $product_one = $product_cart->get_one_product($id);

                $array_pro = [
                    'id' => $product_one[0]['id'],
                    'name' => $product_one[0]['name'],
                    'price' => $product_one[0]['price'],
                    'quantity' => $quantity,
                    'img' => $product_one[0]['img']
                ];

                $position = $cart->checkcart($array_pro['id']);

                if ($position == -1) {
                    $_SESSION['cart'][] = $array_pro;
                } else {
                    $_SESSION['cart'][$position]['quantity'] += $quantity;
                    // $_SESSION['cart'][$position]['quantity']++;
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    public function remove_cart()
    {
        if (isset($_REQUEST['delete'])) {
            $cart = new Cart();
            $id_del = $_REQUEST['delete'];
            $position = $cart->checkcart($id_del);

            array_splice($_SESSION['cart'], $position, 1);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    public function checkout()
    {
        include_once('app/view/header.php');
        include_once('app/view/check-out.php');
        include_once('app/view/footer.php');
    }
    public function xl_checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btn-checkout'])) {
                $orderer_code = "CZS" . date('Ymd') . rand(1, 999);
                $iduser = $_POST['iduser'];
                $receiver_name = $_POST['receiver_name'];
                $receiver_email = $_POST['receiver_email'];
                $receiver_address = $_POST['receiver_address'];
                $receiver_tel = $_POST['receiver_tel'];
                $receiver_note = $_POST['receiver_note'];

                $payment = $_POST['payment'];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $bookingDate = date('Y-m-d') . ' ' . date('H:i:s');

                $total = $_POST['total'];

                $bill = new Bill();
                $bill->setOrdererCode($orderer_code);
                $bill->setIduser($iduser);
                $bill->setReceiverName($receiver_name);
                $bill->setReceiverEmail($receiver_email);
                $bill->setReceiverAddress($receiver_address);
                $bill->setReceiverTel($receiver_tel);
                $bill->setNote($receiver_note);
                $bill->setTotal($total);
                $bill->setPayment($payment);
                $bill->setBookingDate($bookingDate);
                $bill->insert_bill();
                $idbill = $bill->get_idBill();

                $cart = new Cart();
                foreach ($_SESSION['cart'] as $item_cart) {
                    $cart->setIdpro($item_cart['id']);
                    $cart->setName($item_cart['name']);
                    $cart->setImg($item_cart['img']);
                    $cart->setPrice($item_cart['price']);
                    $cart->setQuantity($item_cart['quantity']);
                    $cart->setIntoMoney($item_cart['price'] * $item_cart['quantity']);
                    $cart->setIdbill($idbill[0]['id']);
                    $cart->insert_cart();
                    unset($_SESSION['cart']);
                    if ($payment == 1) {
                        echo "<script>window.location.href='/check-out-success?idbill=" . $idbill[0]['id'] . "';</script>";
                    } else if ($payment == 2) {
                        echo "<script>window.location.href='/check-out-payment?idbill=" . $idbill[0]['id'] . "';</script>";
                    }
                }
            } else {
                echo "<script>alert('Đặt hàng thất bại');window.location.href='/checkout';</script>";
            }
        }
    }
    public function checkout_payment()
    {
        include_once('app/view/header.php');
        include_once('app/view/checkout-payment.php');
        include_once('app/view/footer.php');
    }
    public function checkout_success()
    {
        if (isset($_REQUEST['idbill'])) {
            $idbill = $_REQUEST['idbill'];
            $bill = new Bill();
            $bill->setId($idbill);
            $one_bill_id = $bill->get_one_bill();
        }
        include_once('app/view/header.php');
        include_once('app/view/checkout-success.php');
        include_once('app/view/footer.php');
    }
    public function login()
    {
        include_once('app/view/login.php');
    }
    public function xl_login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btn-login']) && ($_POST['btn-login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user_login = new User();
                $user_login->setUsername($username);

                $result = $user_login->get_user();
                if ($result) {

                    $hashedPassword = $result[0]['password'];

                    if (password_verify($password, $hashedPassword)) {
                        $_SESSION['role'] = $result[0]['role'];
                        $_SESSION['id'] = $result[0]['id'];
                        $_SESSION['username'] = $result[0]['username'];
                        $_SESSION['firstname'] = $result[0]['firstname'];
                        $_SESSION['lastname'] = $result[0]['lastname'];
                        $_SESSION['img'] = $result[0]['img'];
                        $_SESSION['address'] = $result[0]['address'];
                        $_SESSION['email'] = $result[0]['email'];
                        $_SESSION['phone'] = $result[0]['phone'];

                        header("location: /");
                    } else {
                        echo "Đăng nhập thất bại!";
                    }
                }
            }
        }
    }
    public function log_out()
    {
        if (isset($_SESSION['role'])) {
            unset(
                $_SESSION['role'],
                $_SESSION['id'],
                $_SESSION['username'],
                $_SESSION['firstname'],
                $_SESSION['lastname'],
                $_SESSION['img'],
                $_SESSION['address'],
                $_SESSION['email'],
                $_SESSION['phone']
            );
            session_destroy();
            header("location: /");
        } else {
            header("location: /profile");
        }
    }
    public function register()
    {
        include_once('app/view/register.php');
    }
    public function xl_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btn-register']) && ($_POST['btn-register'])) {

                $username = $_POST['username'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password = $_POST['password'];

                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $user_register = new User();

                $user_register->setUsername($username);
                $user_register->setLastname($lastname);
                $user_register->setEmail($email);
                $user_register->setPhone($phone);
                $user_register->setAddress($address);
                $user_register->setPassword($password_hash);

                try {
                    $user_register->register();
                    header("location: /login");
                    exit();
                } catch (\Exception $e) {
                    die("Registration failed: " . $e->getMessage());
                }
            }
        }
    }

    public function forgot()
    {
        include_once('app/view/forgot.php');
    }

    public function xl_forgot()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btn-forgot']) && ($_POST['btn-forgot'])) {
                $username = $_POST['username'];
                $email = $_POST['mail'];

                $user_forgot = new User();
                $user_forgot->setUsername($username);
                $user_forgot->setEmail($email);

                $result = $user_forgot->checkuser_mail();

                if ($result) {
                    $iduser = $result[0]['id'];
                    $lastname = $result[0]['lastname'];
                    $mailer = $result[0]['email'];

                    $mailer = new Mailer();

                    $mailer->setIduser($iduser);
                    $mailer->setLastname($lastname);
                    $mailer->setEmail($mailer);
                    $mailer->sendMailer();
                } else {
                    echo "Không tìm thấy tài khoản";
                }
            }
        }
    }

    public function profile()
    {
        include_once('app/view/header.php');
        include_once('app/view/profile.php');
        include_once('app/view/footer.php');
    }
    public function profile_edit()
    {
        include_once('app/view/header.php');
        include_once('app/view/profile-edit.php');
        include_once('app/view/footer.php');
    }
    public function xl_profile()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btnsave'])) {
                $id = $_SESSION['id'];
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $img = $_FILES['img']['name'];

                $user_profile = new User();

                $user_profile->setId($id);
                $user_profile->setUsername($username);
                $user_profile->setPassword($firstname);
                $user_profile->setLastname($lastname);
                $user_profile->setPhone($phone);
                $user_profile->setEmail($email);
                $user_profile->setAddress($address);

                try {
                    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                        $img_path = 'public/upload/' . $_FILES['img']['name'];
                        move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
                        $user_profile->updateProfile($username, $firstname, $lastname, $email, $phone, $address, $img_path);
                        $_SESSION['img'] = $img;
                    } else {
                        $user_profile->updateProfile($username, $firstname, $lastname, $email, $phone, $address, null);
                    }

                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['address'] = $address;

                    header("location: /profile");
                } catch (\Exception $e) {
                    echo "Có lỗi xảy ra: " . $e->getMessage();
                }
            }
        }
    }

    // ---------------------------ADMIN CONTROLLER------------------------------
    public function admin()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/home.php');
        include_once('app/view/admin/footer.php');
    }
    public function admin_user()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/user.php');
        include_once('app/view/admin/footer.php');
    }
    public function admin_order()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/order.php');
        include_once('app/view/admin/footer.php');
    }
    public function admin_order_update()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/order-update.php');
        include_once('app/view/admin/footer.php');
    }
    public function xl_order_update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['btnupdate'])) {
                $id = $_POST['idbill'];
                $status = $_POST['status']; // 0: Pending, 1: Processing, 2: Shipping, 3: Delivered

                $order_update = new Bill();
                $order_update->setStatus($status);
                $order_update->setId($id);
                $order_update->update_status();
                // var_dump($order_update);

                header("location: /admin-order");
            }
        }
    }

    public function admin_product()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/product.php');
        include_once('app/view/admin/footer.php');
    }
    public function admin_add_product()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/add-product.php');
        include_once('app/view/admin/footer.php');
    }
    public function xl_add_product()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['submitproduct'])) {
                // Lấy thông tin từ form
                $name_product = $_POST['name_product'];
                $price_product = $_POST['price_product'];
                $view_product = $_POST['view_product'];
                $bestseller_select = $_POST['bestseller_select'];
                $category_select = $_POST['category_select'];

                // Xử lý lưu hình ảnh
                $product_image = $_FILES['product_image']['name'];

                $addProduct = new Product();
                $addProduct->setName($name_product);
                $addProduct->setPrice($price_product);
                $addProduct->setView($view_product);
                $addProduct->setBestseller($bestseller_select);
                $addProduct->setCategoryId($category_select);

                try {
                    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
                        $img_path = 'public/assets/images/product/' . $product_image;
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $img_path);
                        $addProduct->add_product($name_product, $img_path, $price_product, $view_product, $bestseller_select, $category_select);
                        header("location: /admin-product");
                    } else {
                        $addProduct->add_product($name_product, null, $price_product, $view_product, $bestseller_select, $category_select);
                    }
                } catch (\Exception $e) {
                    echo "Có lỗi xảy ra: " . $e->getMessage();
                }
            }
        }
    }
    public function admin_edit_product()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/edit-product.php');
        include_once('app/view/admin/footer.php');
    }
    public function xl_edit_product()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['submitproduct'])) {
                $id = $_POST['id_product'];
                $name_product = $_POST['name_product'];
                $price_product = $_POST['price_product'];
                $view_product = $_POST['view_product'];
                $bestseller_select = $_POST['bestseller_select'];
                $category_select = $_POST['category_select'];
                $product_image = $_FILES['product_image']['name'];


                $editProduct = new Product();
                $editProduct->setName($name_product);
                $editProduct->setPrice($price_product);
                $editProduct->setView($view_product);
                $editProduct->setBestseller($bestseller_select);
                $editProduct->setCategoryId($category_select);

                if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
                    $img_path = 'public/assets/images/product/' . $product_image;
                    move_uploaded_file($_FILES['product_image']['tmp_name'], $img_path);
                    $editProduct->update_product($id, $name_product, $img_path, $price_product, $view_product, $bestseller_select, $category_select);
                    header("location: /admin-product");
                } else {
                    $editProduct->update_product($id, $name_product, null, $price_product, $view_product, $bestseller_select, $category_select);
                }
            }
        }
    }
    public function admin_detele_product()
    {
        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $deleteProduct = new Product();
            $del = $deleteProduct->issetImage($id);

            $img_path = 'public/assets/images/product/' . $del[0]['img'];

            if (file_exists($img_path)) {
                $deleteProduct->delete_product($id);
                unlink($img_path);
                header("location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Không tìm thấy hình ảnh muốn xóa";
            }
        } else {
            echo "Không tìm thấy sẽ muôn xóa";
        }
    }
    public function admin_category()
    {
        include_once('app/view/admin/header.php');
        include_once('app/view/admin/category.php');
        include_once('app/view/admin/footer.php');
    }
    public function admin_detele_category()
    {
        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $deleteCategory = new Category();
            $deleteCategory->delete_category($id);
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }

    // ---------------------------Thi CONTROLLER------------------------------

    public function list()
    {
        include_once('app/view/header.php');
        include_once('app/view/list_moi.php');
        include_once('app/view/footer.php');
    }
}
