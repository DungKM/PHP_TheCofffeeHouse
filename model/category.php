<?php

function insert_category($type_name,$image){
    $sql = "insert into categories(name_ct,image_ct) values('$type_name','$image')";
    pdo_execute($sql);
}
function delete_category($id){
    $sql = "delete from categories where id=" .$id;
    pdo_execute($sql);
}
function loadall_category(){
    $sql ="select * from categories order by id desc";
    $listcategory = pdo_query($sql);
    return $listcategory;
}
function loadone_category($id){
    $sql = "select * from categories where id=" .$id;
    $dm =pdo_query_one($sql);
    return $dm;
}
function update_category($id, $type_name,$image){
    $sql ="update categories set name_ct='".$type_name."',image_ct='".$image."' where  id=".$id;
    pdo_execute($sql);
}

?>