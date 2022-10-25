<?php 
    function insert_taikhoan($user, $pass, $email) {
        $sql = "insert into taikhoan(user, pass, email) values ('$user', '$pass', '$email')";
        pdo_execute($sql);
    }

    function check_user($user, $pass) {
        $sql = "select * from taikhoan where user='$user' and pass='$pass'";
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function check_email($email) {
        $sql = "select * from taikhoan where email='$email'";
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_taikhoan($user, $pass, $email, $address, $tel, $role, $id) {
        $sql = "update taikhoan set user='$user', pass='$pass', email='$email', address='$address', tel='$tel', role='$role' where id=".$id;
        pdo_execute($sql);
    }

    function loadall_taikhoan() {
        $sql = "select * from taikhoan order by id desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function delete_taikhoan($id) {
        $sql = "delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }

    function loadone_taikhoan($id) {
        $sql = "select * from taikhoan where id=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }
?>