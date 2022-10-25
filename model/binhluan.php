<?php

function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan) {
    $sql = "insert into binhluan(noidung, iduser, idpro, ngaybinhluan) values ('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro = 0) {
    $sql = "select * from binhluan where 1";
    if ($idpro > 0) {
        $sql .= " and idpro='$idpro'";
    }
    $sql .= " order by id desc";

    $listdm = pdo_query($sql);
    return $listdm;
}

function delete_binhluan($id) {
    $sql = "delete from binhluan where id=".$id;
    pdo_execute($sql);
}

?>