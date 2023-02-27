<?php  
function loadall_account(){
    $sql ="select * from account order by id desc";
    $list_account = pdo_query($sql);
    return $list_account;
}
function insert_account($email,$user,$password){
    $sql = "insert into account(email,user,password) values('$email','$user','$password')";
    pdo_execute($sql);
}
function insert_account_new_bill($user,$email,$address,$phone_number){
    $sql = "insert into account(`user`, `address`, `email`, `phone_number`) values('$user','$address','$email','$phone_number')";
    pdo_execute($sql);
}
function check_account($email,$password){
    $sql = "select * from account where email='".$email."' AND password='".$password."'";
    $account =pdo_query_one($sql);
    return $account;
}
function check_email($email,$user){
    $sql = "select * from account where email='".$email."' AND user='".$user."'";
    $email =pdo_query_one($sql);
    return $email;
}
function check_email_account($email){
    $sql = "select * from account where email='".$email."'";
    $email =pdo_query_one($sql);
    return $email;
}
function loadone_user($id_user){
    $sql = "select * from account where id=" .$id_user;
    $user = pdo_query_one($sql);
    return $user;
}
function update_account($id,$user,$first_name,$last_name,$email,$address,$phone_number){
    $sql ="UPDATE `account` SET `user`='$user',`first_name`='$first_name',`last_name`='$last_name',`address`='$address',`email`='$email',`phone_number`='$phone_number' WHERE id=".$id;
    pdo_execute($sql);
}
function update_account_admin($id,$user,$first_name,$last_name,$email,$address,$phone_number,$role){
    $sql ="UPDATE `account` SET `user`='$user',`first_name`='$first_name',`last_name`='$last_name',`address`='$address',`email`='$email',`phone_number`='$phone_number',`role`='$role' WHERE id=".$id;
    pdo_execute($sql);
}
function delete_account($id){
    $sql = "delete from account where id=" .$id;
    pdo_execute($sql);
}
function user_admin($n){
    switch ($n) {
        case '0':
            $tt = "User";
            break;
        case '1':
            $tt = "Admin";
            break;
        default:
        $tt = "User";
            break;
    }
    return $tt;
}

?>