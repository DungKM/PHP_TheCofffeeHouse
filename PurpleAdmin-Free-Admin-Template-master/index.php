<?php
session_start();
include "../model/pdo.php";
include "../model/category.php";
include "../model/products.php";
include "../model/account.php";
include "../model/comment.php";
include "../model/cart.php";
include "./pages/header/header.php";
$list_statistical = loadall_statistical();
$list_cart = statistical_most_ordered_products();
$list_date = statistical_Statistics_of_the_number_of_orders_by_day();
$list_sum = statistical_revenue_by_day();
date_default_timezone_set('Asia/Ho_Chi_Minh');
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_SESSION['mycart_bill'])) $_SESSION['mycart_bill'] = [];

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'add_category':
            // kiểm tra xem người dùng có click và nút add hay không 
            if (isset($_POST['add_new']) && ($_POST['add_new'])) {
                $error = [];
                if (empty($_POST['type_name'])) {
                    $error['type_name'] = "Type name is required";
                } else {
                    $type_name = test_input($_POST['type_name']);
                    // check if type_name only contains letters and whitespace
                }
                $upload_dir  = "../upload/";
                $image = $upload_dir . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
                $image_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                $array_file = ['png', 'jpg'];
                if (!in_array($image_type, $array_file)) {
                    $error['image'] = "Invalid file extension";
                }
                if ($_FILES['image']['size'] >= 2000000) {
                    $error['image'] = "Image size is too big";
                }
                if (empty($_FILES['image']['name'])) {
                    $error['image'] = "Image is required";
                }
                if (empty($error)) {
                    insert_category($type_name, $image);
                    $notification = "More success";
                }
            }
            include "./pages/category/add_category.php";
            unset($_SESSION["user_bill"]);
            unset($_SESSION["mycart_bill"]);
            break;
        case 'list_category':
            $list_category = loadall_category();
            include "./pages/category/list_category.php";
            unset($_SESSION["user_bill"]);
            unset($_SESSION["mycart_bill"]);
            break;

        case 'delete_category':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_category($_GET['id']);
            }
            $list_category = loadall_category();
            include "./pages/category/list_category.php";
            break;

        case 'update_category':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $category = loadone_category($_GET['id']);
            }
            include "./pages/category/update.php";
            break;
        case 'update_categories':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $error = [];
                if (empty($_POST['type_name'])) {
                    $error['type_name'] = "Type name is required";
                } else {
                    $type_name = test_input($_POST['type_name']);
                    // check if type_name only contains letters and whitespace
                }
                $image = $_POST['image'];
                if (!empty($error)) {
                    include "./pages/category/update.php";
                }
                if (empty($error)) {
                    update_category($id, $type_name, $image);
                    $list_category = loadall_category();
                    include "./pages/category/list_category.php";
                }
            }
            break;
            // CONTROL SẢN PHẨM
        case 'add_product':
            // kiểm tra xem người dùng có click và nút add hay không 
            if (isset($_POST['add_products']) && ($_POST['add_products'])) {
                $error = [];
                if (empty($_POST['id_ct'])) {
                    $error['id_ct'] = "Type product is required";
                } else {
                    $id_ct = $_POST['id_ct'];
                }
                if (empty($_POST['name_products'])) {
                    $error['name_products'] = "Name products is required";
                } else {
                    $name_products = test_input($_POST['name_products']);
                    // check if name_products only contains letters and whitespace
                }
                if (empty($_POST['price'])) {
                    $error['price'] = "Price is required";
                } else {
                    $price =  test_input($_POST['price']);
                    if ($price > 999) {
                        $error['price'] = "The amount is too big";
                    }
                }

                if (empty($_POST['describe'])) {
                    $error['describe'] = "Describe is required";
                } else {
                    $desc =  test_input($_POST['describe']);
                }

                $upload_dir  = "../upload/";
                $image = $upload_dir . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
                $image_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                $array_file = ['png', 'jpg'];
                if (!in_array($image_type, $array_file)) {
                    $error['image'] = "Invalid file extension";
                }
                if ($_FILES['image']['size'] >= 2000000) {
                    $error['image'] = "Image size is too big";
                }
                if (empty($_FILES['image']['name'])) {
                    $error['image'] = "Image is required";
                }
                if (empty($error)) {
                    insert_product($name_products, $price, $image, $desc, $id_ct);
                    $notification = "More success";
                }
            }
            $list_category = loadall_category();
            unset($_SESSION["user_bill"]);
            unset($_SESSION["mycart_bill"]);
            include "./pages/product/add_product.php";
            break;
        case 'list_product':
            if (isset($_POST['list_ok'])) {
                $kyw = $_POST['kyw'];
                $id_category = $_POST['id_ct'];
            } else {
                $kyw = '';
                $id_category  = 0;
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            $list_Page = all_product();
            $list_category = loadall_category();
            $list_products = loadall_products($kyw, $id_category, $page);
            include "./pages/product/list_product.php";
            unset($_SESSION["user_bill"]);
            break;

        case 'delete_products':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_product($_GET['id']);
            }
            $list_Page = all_product();
            $list_products = loadall_products();
            include "./pages/product/list_product.php";
            break;
        case 'update_product_btn':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $products = loadone_product($_GET['id']);
            }
            $list_category = loadall_category();
            include "./pages/product/update.php";
            break;
        case 'update_products':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $id_ct = $_POST['id_ct'];
                $name_products = $_POST['name_products'];
                $price = $_POST['price'];
                $desc = $_POST['describe'];
                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_product($id, $id_ct, $name_products, $price, $desc, $image);
                $notification = "More success";
            }
            $list_Page = all_product();
            $list_products = loadall_products();
            $list_category = loadall_category();
            include "./pages/product/list_product.php";
            break;
        case 'list_user':
            $list_account = loadall_account();
            include "./pages/account/list_user.php";
            unset($_SESSION["user_bill"]);
            unset($_SESSION["mycart_bill"]);
            break;
        case 'update_user':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $user = loadone_user($_GET['id']);
            }
            include "./pages/account/update.php";
            break;
        case 'update_users':
            if (isset($_POST['update'])) {
                $user = $_POST['user'];
                $first_name = $_POST['firstname'];
                $last_name = $_POST['lastname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone'];
                $role = $_POST['role'];
                $id = $_POST['id'];
                update_account_admin($id, $user, $first_name, $last_name, $email, $address, $phone_number, $role);
            }
            $list_Page = all_product();
            $list_account = loadall_account();
            include "./pages/account/list_user.php";
            break;
        case 'delete_account':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_account($_GET['id']);
            }
            $list_account = loadall_account();
            echo "<script>
            window.location.href='index.php?act=list_user';
            </script>";
            break;
        case 'list_comments':
            $list_comments =  loadall_comments(0);
            include "./pages/comment/cmt_user.php";
            unset($_SESSION["user_bill"]);
            unset($_SESSION["mycart_bill"]);
            break;
        case 'delete_comments':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_comments($_GET['id']);
            }
            $list_comments = loadall_comments(0);
            echo "<script>
            window.location.href='index.php?act=list_comments';
            </script>";
            break;
        case 'list_bill':
            if (isset($_POST['list_ok'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            if (isset($_GET['id_bill']) && ($_GET['id_bill'] > 0)) {
                $load_cart = loadall_cart($_GET['id_bill']);
            }
            $load_all_bill = all_bill();
            $list_bill = loadall_bill($kyw, 0, $page);
            include "./pages/bill/list_bill.php";
            unset($_SESSION["user_bill"]);
            unset($_SESSION["mycart_bill"]);
            break;
        case 'delete_bill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            $load_all_bill = all_bill();
            $list_bill = loadall_bill($kyw, 0);
            echo "<script>
                window.location.href='index.php?act=list_bill';
                </script>";
            break;
        case 'update_bill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $bill = loadone_bill($_GET['id']);
            }
            include "./pages/bill/update.php";
            $load_all_bill = all_bill();
            break;
        case 'addtocart':
            if (isset($_POST['add_to_cart'])) {
                $id = $_POST['id'];
                $number = 1;
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $total = $price * $number;
                $add_products = [$id, $name, $img, $price, $number, $total];
                array_push($_SESSION['mycart_bill'], $add_products);
                if (isset($_POST['list_ok'])) {
                    $kyw = $_POST['kyw'];
                    $id_category = $_POST['id_ct'];
                } else {
                    $kyw = '';
                    $id_category  = 0;
                }
                $list_Page = all_product();
                $list_products = loadall_products($kyw, $id_category);
            }
            include "./pages/bill/add_product_list_bill.php";

            break;
        case 'shop-cart':
            include "./pages/bill/shop_cart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart_bill'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart_bill'] = [];
            }
            echo "<script>
                  window.location.href='index.php?act=shop-cart';
                 </script>";
            break;
        case 'update_bills':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $bill_name = $_POST['bill_name'];
                $bill_country = $_POST['bill_country'];
                $bill_towncity = $_POST['bill_towncity'];
                $bill_address = $_POST['bill_address'];
                $bill_email = $_POST['bill_email'];
                $bill_phone = $_POST['bill_phone'];
                $bill_status = $_POST['bill_status'];
                update_bill($id, $bill_name, $bill_country, $bill_towncity, $bill_address, $bill_phone, $bill_email, $bill_status);
            }
            $list_Page = all_product();
            $list_bill = loadall_bill();
            session_unset();
            include "./pages/bill/list_bill.php";
            break;
        case 'update_bill_stater':
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $bill_status = $_POST['bill_status'];
                update_bill_stater($id, $bill_status);
            }
            $list_Page = all_product();
            $list_bill = loadall_bill();
            echo "<script>
            window.location.href='index.php?act=list_bill';
            </script>";
            break;
        case 'add_bill':
            if (isset($_POST['account']) && ($_POST['account'])) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone'];
                $id = $_POST['id'];
                insert_account_new_bill($user, $email, $address, $phone_number);
                $_SESSION["user_bill"] = check_email($email, $user);
                echo "<script>
                            window.location.href='index.php?act=add_product_bill';
                      </script>";
                $notification = "More success";
            }
            include "./pages/bill/add_bill.php";
            break;
        case 'add_product_bill':
            if (isset($_POST['list_ok'])) {
                $kyw = $_POST['kyw'];
                $id_category = $_POST['id_ct'];
            } else {
                $kyw = '';
                $id_category  = 0;
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            -$list_Page = all_product();
            $list_category = loadall_category();
            $list_products = loadall_products($kyw, $id_category, $page);
            include "./pages/bill/add_product_list_bill.php";
            break;
        case 'checkout_bill':
            include "./pages/bill/checkout_bill_new.php";
            break;
        case 'bill_comfirm':
            if (isset($_POST['agree_to_order'])) {
                if (isset($_SESSION['user_bill'])) $id_user = $_SESSION['user_bill']['id'];
                else $id = 0;
                $bill_name = $_POST['user'];
                $bill_email = $_POST['email'];
                $bill_address = $_POST['address'];
                $bill_phone = $_POST['phone'];
                $bill_payment_methods = $_POST['payment_methods'];
                $order_date = date('h:i:sa');
                $date_order = date('Y/m/d');
                $total = total_bill();
                $id_bill = insert_bill($id_user, $bill_name,  $bill_email, $bill_address, $bill_phone, $bill_payment_methods, $order_date, $date_order, $total);

                foreach ($_SESSION['mycart_bill'] as $cart) {
                    insert_cart($_SESSION['user_bill']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
                }
                $_SESSION['cart'] = [];
            }
            $bill = loadone_bill($id_bill);
            $bill_cart = loadall_cart($id_bill);
            include "./pages/bill/bill_confirm.php";
            break;
        default:
            include "./pages/home/master.php";
            break;
    }
} else {
    include "./pages/home/master.php";
}
