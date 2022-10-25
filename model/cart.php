<?php
    function viewcart($del) {
        global $img_path;
        
        $tongtien = 0;
        $i = 0;
        foreach ($_SESSION["mycart"] as $cart) {
           $hinh = $img_path.$cart[2];
           $xoasp = "index.php?act=delcart&idcart=".$i;
           $tongtien += $cart[5];
           echo '<tr>
                   <td><img src='.$hinh.' style="height: 80px;" /></td>
                   <td>'.$cart[1].'</td>
                   <td>'.$cart[3].'</td>
                   <td>'.$cart[4].'</td>
                   <td>'.$cart[5].'</td>
                   <td>
                       <a href='.$xoasp.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
                   </td>
               </tr>';

           $i++;
        }

        echo '<tr>
             <td colspan="4"><b>Tổng đơn hàng </b></td>
             <td colspan="2">'.$tongtien.'</td>
            </tr>';
    }

    function tongdonhang() {
        $tongtien = 0;
        foreach ($_SESSION["mycart"] as $cart) {
            $tongtien += $cart[5];
        }

        return $tongtien;
    }

    function insert_bill($iduser, $name, $address, $tel, $email, $pttt, $ngaydathang, $tongdonhang) {
        $sql = "insert into bill(iduser, bill_name, bill_address, bill_tel, bill_email, bill_pttt, ngaydathang, total) values ('$iduser', '$name', '$address', '$tel', '$email', '$pttt', '$ngaydathang', '$tongdonhang')";
        return pdo_execute_lastinsertid($sql);
    }

    function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill) {
        $sql = "insert into cart(iduser, idpro, img, name, price, soluong, thanhtien, idbill) values ('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$idbill')";
        pdo_execute($sql);
    }

    function loadone_bill($id) {
        $sql = "select * from bill where id=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function loadone_cart($idbill) {
        $sql = "select * from cart where idbill=".$idbill;
        $dm = pdo_query($sql);
        return $dm;
    }

    function loadone_cart_count($idbill) {
        $sql = "select * from cart where idbill=".$idbill;
        $dm = pdo_query($sql);
        return sizeof($dm);
    }

    function loadall_bill_byuser($iduser) {
        $sql = "select * from bill where iduser='$iduser' order by id desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function loadall_bill($kyw = "") {
        $sql = "select * from bill where 1";
        if ($kyw != "") {
            $sql .= " and id like '%".$kyw."%'";
        }

        $sql .= " order by id desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function get_ttdh($bill_status) {
        switch ($bill_status) {
            case 0:
                return "Đang giao hàng";
            case 1;
                return "Đã giao hàng";
        }
    }

    function delete_bill($id) {
        $sql = "delete from bill where id=".$id;
        pdo_execute($sql);
    }

    function loadall_thongke() {
        $sql = "select danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice from sanpham left join danhmuc on danhmuc.id=sanpham.iddm group by danhmuc.id order by danhmuc.id desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }
?>