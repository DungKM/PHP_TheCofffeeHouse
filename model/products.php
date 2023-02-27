<?php
function insert_product($name_products,$price,$image,$desc,$id_ct){
   $sql= " INSERT INTO `products`(`name_pro`, `price`, `image`, `describe`,`id_ct`) VALUES ('$name_products','$price','$image','$desc','$id_ct')";
//    INSERT INTO `products`(`id`, `name_pro`, `price`, `image`, `describe`, `id_ct`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
    pdo_execute($sql);
}
function delete_product($id){
    $sql = "delete from products where id=" .$id;
    pdo_execute($sql);
}
function loadall_products_top3(){
    $sql ="select * from products where 1 order by view desc limit 0,3";
    $list_products = pdo_query($sql);
    return   $list_products;
}
function loadall_products_home(){
    $sql ="select * from products where 1 order by id desc limit 0,8";
    $list_products = pdo_query($sql);
    return  $list_products;
}
function loadall_products_home_1(){
    $sql ="select * from products where 1 order by id desc limit 0,3";
    $list_products = pdo_query($sql);
    return  $list_products;
}
function load_products_category($id_category){
    $sql ="select * from products where id_ct='".$id_category."'";
    $list_products = pdo_query($sql);
    return  $list_products;
}
function loadall_products_home_2(){
    $sql ="select * from products where 1 order by id desc";
    $list_products = pdo_query($sql);
    return  $list_products;
}
function loadall_products($kyw="",$id_category=0,$page=0){
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
    $sql ="select * from products where 1";
    if($kyw != ""){
        $sql.=" and name_pro like '%".$kyw."%'";
    }
    if($id_category> 0){
        $sql.=" and id_ct ='".$id_category."'";
    }
    $sql.=" order by id desc limit $begin,10";
    $list_products = pdo_query($sql);
    return  $list_products;
}
function load_category($id_ct){
    if($id_ct>0){
        $sql = "select * from categories where id=" .$id_ct;
        $category =pdo_query_one($sql);
        extract($category);
        return $category['name_ct'];
    }else{
        return "";
    }
}
function loadone_product($id){
    $sql = "select * from products where id=" .$id;
    $sp =pdo_query_one($sql);
    return $sp;
}
function all_product(){
    $sql = "select * from products";
    $list_products = pdo_query($sql);
    $number_product= count($list_products)/10;
    return $number_product;
}
function load_similar_products($id,$id_ct){
    $sql = "select * from products where id_ct=".$id_ct." AND id <>" .$id;
    $list_products = pdo_query($sql);
    return $list_products;
}
function update_product($id,$id_ct,$name_products,$price,$desc,$image){
    if($image != "")
        $sql ="UPDATE `products` SET `name_pro`='$name_products',`price`='$price',`image`='$image',`describe`='$desc',`id_ct`='$id_ct' WHERE id=".$id;
    else
    $sql ="UPDATE `products` SET `name_pro`='$name_products',`price`='$price',`describe`='$desc',`id_ct`='$id_ct' WHERE `id`=".$id;
    pdo_execute($sql);
}
function get_all_pd(){
    $sql = "select * from products order by id limit 0,6";
    return pdo_query($sql);
}
function comment_acount_product($id){
    $ko="SELECT * from comments where id_pro=$id";
    return pdo_query($ko);
}
?>