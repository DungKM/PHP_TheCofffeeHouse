<?php
function total(){
    $sum = 0;
    foreach ($_SESSION['mycart'] as $cart) {
       $total = $cart[3]*$cart[4];
        $sum += $total;
    ;
}
return $sum;
}
function total_bill(){
    $sum = 0;
    foreach ($_SESSION['mycart_bill'] as $cart) {
       $total = $cart[3]*$cart[4];
        $sum += $total;
    ;
}
return $sum+22+7;
}
function insert_bill($id_user,$bill_name,$bill_email,$bill_address,$bill_phone,$bill_payment_methods,$order_date,$date_order,$total){
    $sql = "INSERT INTO `bill`(`id_user`, `bill_name`, `bill_address`, `bill_phone`, `bill_email`, `bill_payment_methods`, `order_date`,`date_order`,`total`) VALUES ('$id_user','$bill_name','$bill_address','$bill_phone','$bill_email','$bill_payment_methods','$order_date','$date_order','$total')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$number,$into_money,$id_bill){
    $sql = "INSERT INTO `cart`(`id_user`, `id_products`, `image`, `name`, `price`, `number`, `into_money`, `id_bill`) VALUES ('$iduser','$idpro','$img','$name','$price','$number','$into_money','$id_bill')";
    return pdo_execute($sql);
}
function loadone_bill($id_bill){
    $sql = "select * from bill where id=" .$id_bill;
    $bill =pdo_query_one($sql);
    return $bill;
}
function loadall_cart($id_bill){
    $sql = "select * from cart where id_bill=" .$id_bill;
    $bill =pdo_query($sql);
    return $bill;
}
function loadone_cart($id_bill){
    $sql = "select * from cart where id_bill=" .$id_bill ;
    $dm =pdo_query($sql);
    return $dm;
}
function loadall_cart_count($id_bill){
    $sql = "select * from cart where id_bill=" .$id_bill;
    $cart =pdo_query($sql);
    return sizeof($cart);
}

function loadall_bill($kyw="",$id_user){
    if(isset($_GET['page'])){
        $page =$_GET['page'];
    }else{
        $page=1;
    }
    if($page =='' || $page == 1){
        $begin = 0;
    } else{
        $begin = ($page*10)-10;
    }
    $sql = "select * from bill where 1";
    if($id_user > 0) $sql .= " AND id_user=" .$id_user;
    if($kyw != "") $sql .= " AND id like '%" .$kyw."%'";
    $sql.=" order by id desc limit $begin,10";
    $list_bill =pdo_query($sql);
    return $list_bill;
}
function all_bill(){
    $sql = "select * from bill";
    $list_bill = pdo_query($sql);
    $number_bill= count($list_bill)/10;
    return $number_bill;
}
function update_bill($id,$bill_name,$bill_address,$bill_phone,$bill_email,$bill_status){
    $sql ="UPDATE `bill` SET `bill_name`='$bill_name',`bill_address`='$bill_address',`bill_phone`='$bill_phone',`bill_email`='$bill_email',`bill_status`='$bill_status' WHERE `id`=".$id;
    pdo_execute($sql);
}
function update_bill_stater($id,$bill_status){
    $sql ="UPDATE `bill` SET `bill_status`='$bill_status' WHERE `id`=".$id;
    pdo_execute($sql);
}
function delete_bill($id){
    $sql = "delete from bill where id=" .$id;
    pdo_execute($sql);
}
function get_completion_time($n){
    switch ($n) {
        case '0':
            $tt = "New orders";
            break;
        case '1':
            $tt = "Processing";
            break;
        case '2':
            $tt = "cancel";
            break;
        case '3':
            $tt = "completed";
            break;
        
        default:
        $tt = "New orders";
            break;
    }
    return $tt;
}

function loadall_statistical(){
    $sql = "select categories.id as code_category, categories.name_ct as name_catgteory,count(products.id) as count_products, min(products.price) as min_price, max(products.price) as max_price, avg(products.price) as avg_price";
    $sql.=" from products left join categories on categories.id=products.id_ct";
    $sql .= " group by categories.id order by categories.id desc";
    $list_statistical =pdo_query($sql);
    return  $list_statistical;
}
function statistical_most_ordered_products(){
   $sql = "select cart.name as name_products, count(cart.id_products) as count_pro";
   $sql.=" from cart";
   $sql.=" group by cart.name";
   $sql.=" having count(cart.id_products)  >= all(select count(cart.id_products) from cart group by cart.name)";
//    $sql.=" group by cart.name order by count(cart.id_products) desc";
   $list_cart = pdo_query($sql);
   return $list_cart;
}
function statistical_Statistics_of_the_number_of_orders_by_day(){
   $sql = "select date_order  as date, count(id) as count_pro";
   $sql.=" from bill";
   $sql.=" group by  date_order order by date_order desc ";
//    $sql.=" group by cart.name order by count(cart.id_products) desc";
   $list_date = pdo_query($sql);
   return $list_date;
}
function statistical_revenue_by_day(){
   $sql = "select date_order as date , sum(total) as total";
   $sql.=" from bill";
   $sql.=" group by  date_order  order by date_order desc ";
//    $sql.=" group by cart.name order by count(cart.id_products) desc";
   $list_sum = pdo_query($sql);
   return $list_sum;
}

function pay_vnpay($vnp_Amount,$vnp_BankCode,$vnp_BankTranNo,$vnp_CardType,$vnp_OrderInfo,$vnp_PayDate,$vnp_TmnCode,$vnp_TransactionNo,$id_bill){
    $sql = "INSERT INTO `bill_vnpay`(`vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionstatus`, `code_cart`) VALUES ('$vnp_Amount',' $vnp_BankCode','$vnp_BankTranNo','$vnp_CardType','$vnp_OrderInfo','$vnp_PayDate','$vnp_TmnCode','$vnp_TransactionNo','$id_bill')";
   return pdo_execute($sql);
}
function pay_momo($partnerCode,$orderId,$amount,$orderInfo,$orderType,$transId,$payType,$id_bill){
    $sql = "INSERT INTO `bill_momo`(`partnercode`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`,`code_cart`) VALUES ('$partnerCode','$orderId','$amount','$orderInfo',' $orderType','$transId','$payType','$id_bill')";
    return pdo_execute($sql);
}
?> 
