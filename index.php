<?php
session_start();

// include_once "mail/index.php";
require './PHPMailer/includes/PHPMailer.php';
require './PHPMailer/includes/SMTP.php';
require './PHPMailer/includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "model/pdo.php";
include "model/category.php";
include "model/products.php";
include "model/account.php";
include "model/comment.php";
include "model/cart.php";
include "view/config_php_vnpay.php";


if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$spnew = loadall_products_home();
$latest_top3 = loadall_products_home_1();
$list_new_2 = loadall_products_home_2();
$list_category = loadall_category();
$list_top3 = loadall_products_top3();
$list_products_fea_1 = load_products_category(4);
$list_products_fea_2 = load_products_category(5);
$list_products_fea_3 = load_products_category(6);
$list_products_fea_4 = load_products_category(7);
$list_products_fea_5 = load_products_category(8);
$list_products_fea_6 = load_products_category(9);
$list_products_fea_7 = load_products_category(10);
$list_products_fea_8 = load_products_category(11);
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "blog":
            include "view/intermediary/header.php";
            include "./view/intermediary/blog.php";
            include "view/intermediary/footer.php";
            break;
        case "contact":
            include "view/intermediary/header.php";
            include "./view/intermediary/contact.php";
            include "view/intermediary/footer.php";
            break;
        case 'shop-grid':
            include "view/intermediary/header.php";
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            if (isset($_GET['id_ct']) && ($_GET['id_ct'] > 0)) {
                $id_category = $_GET['id_ct'];
            } else {
                $id_category = 0;
            }
            
            $list_products =  loadall_products($kyw, $id_category);
            $name_category = load_category($id_category);
            include "view/shop-grid.php";
            include "view/intermediary/footer.php";
            break;

        case 'shop-detail':
            include "view/intermediary/header.php";
            if (isset($_GET['id_pro']) && ($_GET['id_pro'] > 0)) {
                $id = $_GET['id_pro'];
                $one_product = loadone_product($id);
                extract($one_product);
                $similar_products =  load_similar_products($id, $id_ct);
                if (isset($_SESSION['user'])) {
                    $list_bill = loadall_bill("", $_SESSION['user']['id']);
                }

                include "view/shop-details.php";
            } else {
                include "view/shop-details.php";
            }

            include "view/intermediary/footer.php";
            break;
        case 'register':
            include "view/intermediary/header.php";
            if (isset($_POST['register']) && ($_POST['register'])) {
                $error = [];
                if (empty($_POST['email'])) {
                    $error['email'] = "Email is required";
                } else {
                    $email = test_input($_POST['email']);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error['email'] = "Invalid email format";
                    }
                }
                if (empty($_POST['user'])) {
                    $error['user'] = "user is required";
                } else {
                    $user = test_input($_POST['user']);
                    // check if user only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $user)) {
                        $error['user'] = "Only letters and white space allowed";
                    }
                }
                if (empty($_POST['password'])) {
                    $error['password'] = "password is required";
                } else {
                    $password = test_input($_POST['password']);
                }
                if (empty($error)) {
                    insert_account($email, $user, $password);
                    echo "<script>
                    window.location.href='index.php?act=login';
                    </script>";
                }
            }
            include "view/account/register.php";
            include "view/intermediary/footer.php";
            break;
        case 'login':
            include "view/intermediary/header.php";
            if (isset($_POST['login']) && ($_POST['login'])) {
                $error = [];
                if (empty($_POST['email'])) {
                    $error['email'] = "Email is required";
                } else {
                    $email = test_input($_POST['email']);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error['email'] = "Invalid email format";
                    }
                }
                if (empty($_POST['password']) || $_POST['password']==" ") {
                    $error['password'] = "password is required";
                } else {
                    $password = test_input($_POST['password']);
                }

                if (empty($error)) {
                    $check_account = check_account($email, $password);
                    if (is_array($check_account)) {
                        $_SESSION['user'] = $check_account;
                        echo "<script>
                        window.location.href='index.php';
                        </script>";
                    } else {
                    }
                }
            }
            include "view/account/login.php";
            include "view/intermediary/footer.php";
            break;
        case 'profile':
            include "view/intermediary/header.php";
            if (isset($_POST['account']) && ($_POST['account'])) {
                $user = $_POST['user'];
                $first_name = $_POST['firstname'];
                $last_name = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];

                $phone_number = $_POST['phone'];
                $id = $_POST['id'];
                update_account($id, $user, $first_name, $last_name, $email, $address, $phone_number);
                $_SESSION["user"] = check_account($email, $password);
                echo "<script>
                            window.location.href='index.php?act=profile';
                            </script>";
            }
            include 'view/profile/profile.php';
            break;
        case 'forgot_password':
            include "view/intermediary/header.php";
            if (isset($_POST['send_email'])) {
                $error = array();
                $email = $_POST['email'];
                $checkemail = check_email_account($email);
                $password = $checkemail['password'];
                $username=$checkemail['user'];
                if ($email == "") {
                    $error['email'] = "cannot be left blank";
                }
                if (empty($error)) {
               
                  //Create instance of PHPMailer
                  $mail = new PHPMailer();
                  //Set mailer to use smtp
                  $mail->isSMTP();
                  //Define smtp host
                  $mail->Host = "smtp.gmail.com";
                  //Enable smtp authentication
                  $mail->SMTPAuth = true;
                  //Set smtp encryption type (ssl/tls)
                  $mail->SMTPSecure = "tls";
                  //Port to connect smtp
                  $mail->Port = "587";
                  //Set gmail username
                  $mail->Username = "thecoffehouse2003@gmail.com";
                  //Set gmail password
                  $mail->Password = "ejpefhlmqujaidee";
                  //Email subject
                  $mail->Subject = "Forgot Password";
                  //Set sender email
                  $mail->setFrom('thecoffehouse2003@gmail.com');
                  //Enable HTML
                  $mail->isHTML(true);
                  //Attachment
                  // $mail->addAttachment('img/attachment.png');
                  //Email body
                  $mail->Body = "<h1>Xin chào, $username</h1></br><p>Mật khẩu của bạn là: $password</p>";
                  //Add recipient
                  $mail->addAddress($email);
                  //Finally send email
                  if ($mail->send()) {
                      echo '
                      <script>
                      alert("Đã gửi mail nhận lại mật khẩu!");
                      window.location.href="index.php?act=login";
                      </script>';
                  } else {
                      echo '
                      <script>
                           alert("Message could not be sent. Mailer Error: " . $mail->ErrorInfo);
                      </script>
                      ';
                  }
                  //Closing smtp connection
                  $mail->smtpClose();
                }
            }
            include "view/account/forgot_password.php";
            include "view/intermediary/footer.php";
            break;
      
        case 'logout':
            session_unset();
            echo "<script>
                         window.location.href='index.php';
                         </script>";
            break;
        case 'addtocart':
            include "view/intermediary/header.php";
            if (isset($_POST['add_to_cart'])) {
                $id = $_POST['id'];
                $number = 1;
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $total = $price * $number;
                $add_products = [$id, $name, $img, $price, $number, $total];
                array_push($_SESSION['mycart'], $add_products);
            }

            include "view/cart/shoping-cart.php";
            include "view/intermediary/footer.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            echo "<script>
                             window.location.href='index.php?act=addtocart';
                             </script>";

            break;
        case 'checkout':
            include "view/intermediary/header.php";
            include "view/cart/checkout.php";
            include "view/intermediary/footer_ad.php";
            break;
        case 'bill_comfirm':
            if (isset($_POST['redirect'])) {
                if (isset($_SESSION['user'])) $id_user = $_SESSION['user']['id'];
                else $id = 0;
                $bill_name = $_POST['user'];
                $bill_email = $_POST['email'];
                $bill_address = $_POST['address'];
                $bill_phone = $_POST['phone'];
                $bill_payment_methods = $_POST['payment_methods'];
                $order_date = date('h:i:sa');
                $date_order = date('Y/m/d');
                $total = total();
                $id_bill = insert_bill($id_user, $bill_name, $bill_email, $bill_address, $bill_phone, $bill_payment_methods, $order_date, $date_order, $total);

                if (isset($_POST['payment_methods']) &&  $bill_payment_methods == 'Receive goods before payment') {

                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
                    }
                    $_SESSION['cart'] = [];
                    $bill = loadone_bill($id_bill);
                    $bill_cart = loadall_cart($id_bill);
                    include "view/cart/bill_comfirm.php";
                } else if (isset($_POST['payment_methods']) &&  $bill_payment_methods == 'Online VnPay') {

                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $vnp_TxnRef = $id_bill; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Thanh toán thành công';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount =   $total * 230000;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    $vnp_ExpireDate = $expire;

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $vnp_ExpireDate

                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if (isset($_POST['redirect'])) {
                        $_SESSION['code_cart'] = $id_bill;
                        foreach ($_SESSION['mycart'] as $cart) {
                            insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
                        }
                        $_SESSION['cart'] = [];
                        $bill = loadone_bill($id_bill);
                        $bill_cart = loadall_cart($id_bill);
                        header('Location: ' . $vnp_Url);
                        include "view/cart/bill_comfirm.php";
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                    // vui lòng tham khảo thêm tại code demo
                    break;
                } else if (isset($_POST['payment_methods']) &&  $bill_payment_methods == 'PayPal') {
                    $_SESSION['code_cart'] = $id_bill;
                    include "view/intermediary/header.php";
                    include "view/cart/checkout.php";
                    include "view/intermediary/footer_ad.php";
                    break;
                } else if (isset($_POST['payment_methods']) &&  $bill_payment_methods == 'momo') {
                    $_SESSION['code_cart'] = $id_bill;
                    include "view/intermediary/header.php";
                    include "view/cart/checkout.php";
                    include "view/intermediary/footer_ad.php";
                    break;
                }
            }
            $bill = loadone_bill($id_bill);
            $bill_cart = loadall_cart($id_bill);

            break;
        case 'unset_cart':
            unset($_SESSION['mycart']);
            include "view/intermediary/header.php";
            include "view/home.php";
            include "view/intermediary/footer.php";

            break;

        case 'orders':
            include "view/intermediary/header.php";
            $list_bill = loadall_bill("", $_SESSION['user']['id']);
            include 'view/profile/orders.php';
            break;


        case 'pay':
            include "view/vnpay.php";
            break;


        default:
            include "view/intermediary/header.php";
            include "view/home.php";
            include "view/intermediary/footer.php";
            break;
    }
} else {
    include "view/intermediary/header.php";
    include "view/home.php";
    include "view/intermediary/footer.php";
}
