<?php
function insert_comments($content,$user,$id_user,$id_pro,$comment_date){
    $sql = "INSERT INTO `comments`(`contents`,`user`, `id_user`, `id_pro`, `comment_date`) VALUES ('$content','$user','$id_user','$id_pro','$comment_date')";
    pdo_execute($sql);
}
function loadall_comments($id_pro){
    $sql ="select * from comments where 1";
    if($id_pro > 0) $sql .= " AND id_pro='".$id_pro."'";
    else
    $sql .= " order by id desc";
    $list_comments = pdo_query($sql);
    return $list_comments;
}
function delete_comments($id){
    $sql = "delete from comments where id=" .$id;
    pdo_execute($sql);
}
?>