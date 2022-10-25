<?php 

    function increase_view($id, $value) {
        $sql = "update sanpham set luotxem=luotxem + '$value' where id=".$id;
        pdo_execute($sql);
    }

    function is_bought($iduser, $idpro) {
        $sql = "select * from cart where iduser='$iduser' and idpro='$idpro'";
        $dm = pdo_query_one($sql);
   
        if (isset($dm) && $dm) {
            return true;
        }

        return false;
    }

    function insert_sanpham($tensp, $giasp, $filename, $motasp, $iddm) {
        $sql = "insert into sanpham(name, price, img, mota, iddm) values ('$tensp', '$giasp', '$filename', '$motasp', '$iddm')";
        pdo_execute($sql);
    }

    function loadall_sanpham($kyw, $iddm) {
        $sql = "select * from sanpham where 1";
        if ($kyw != "") {
            $sql .= " and name like '%".$kyw."%'";
        }
        if (isset($iddm) && $iddm > 0) {
            $sql .= " and iddm =".$iddm;
        }

        $sql .= " order by id desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function loadall_sanpham_home() {
        $sql = "select * from sanpham order by id desc limit 9";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function loadall_sanpham_top10() {
        $sql = "select * from sanpham order by luotxem desc limit 10";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function loadall_sanpham_cungloai($id, $iddm) {
        $sql = "select * from sanpham where id!=".$id." and iddm=".$iddm;
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function delete_sanpham($id) {
        $sql = "delete from sanpham where id=".$id;
        pdo_execute($sql);
    }

    function loadone_sanpham($id) {
        $sql = "select * from sanpham where id=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function load_tendm($iddm) {
        if ($iddm > 0) {
            $sql = "select * from danhmuc where id=".$iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
        }
        
        return "";
    }
    
    function update_sanpham($id, $tensp, $giasp, $filename, $motasp, $iddm) {
        $sql = "update sanpham set name='$tensp', price='$giasp', img='$filename', mota='$motasp', iddm='$iddm' where id=".$id;
        pdo_execute($sql);
    }
?>