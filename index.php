<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Online Shopping Center</title>
    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link href="css/jquery-ui.min.css" rel="stylesheet" />
    <script src="js/jquery-ui.min.js"></script>

</head>

<body>
    <div class="container">
        <?php
            session_start();

            include "model/pdo.php";
            include "global.php";
            include "model/sanpham.php";
            include "model/danhmuc.php";
            include "model/taikhoan.php";
            include "model/binhluan.php";
            include "model/cart.php";
            include "view/header.php";

            if (!isset($_SESSION["mycart"])) {
                $_SESSION["mycart"] = [];
            }

            $spnew = loadall_sanpham_home();
            $dsdm = loadall_danhmuc();
            $dstop10 = loadall_sanpham_top10();

            if (isset($_GET["act"]) && $_GET["act"] != "") {
                $act = $_GET["act"];
                switch ($act) {
                    case "sanphamct": {
                        if (isset($_GET["idsp"]) && $_GET["idsp"] > 0) {

                            $idsp = $_GET["idsp"];
                            $onesp = loadone_sanpham($idsp);
                            extract($onesp);
                            $spcungloai = loadall_sanpham_cungloai($idsp, $iddm);

                            include "view/sanphamct.php";
                        }
                        else {
                            include "view/home.php";
                        }
                       
                        break;
                    }
                    case "add_binhluan": {
                        if (isset($_POST["guibinhluan"]) && $_POST["guibinhluan"]) {

                            $idpro = $_POST["idpro"];
                            $iduser = $_POST["iduser"];
                            $noidung = $_POST["msg"];
                            $ngaybinhluan = date("h:i:sa d/m/Y");

                            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);

                            header("Location: index.php?act=sanphamct&idsp=".$idpro);
                        }
                        else {
                            include "view/home.php";
                        }

                        break;
                    }
                    case "sanpham": {
                        if (isset($_POST["kyw"]) && $_POST["kyw"] != "") {
                            $kyw = $_POST["kyw"];
                        }
                        else {
                            $kyw = "";
                        }

                        if (isset($_GET["iddm"]) && $_GET["iddm"] > 0) {
                            $iddm = $_GET["iddm"];
                        }
                        else {
                            $iddm = 0;
                        }

                        $dssp = loadall_sanpham($kyw, $iddm);
                        $tendm = load_tendm($iddm);

                        include "view/sanpham.php";

                        break;
                    }
                    case "dangky": {
                        if (isset($_POST["dangky"]) && $_POST["dangky"]) {
                            $email = $_POST["email"];
                            $user = $_POST["user"];
                            $pass = $_POST["pass"];

                            insert_taikhoan($user, $pass, $email);
                            $thongbao = "Đăng ký thành công";
                        }

                        include "view/taikhoan/dangky.php";
                        break;
                    }
                    case "dangnhap": {
                        if (isset($_POST["dangnhap"]) && $_POST["dangnhap"]) {
                            $user = $_POST["user"];
                            $pass = $_POST["pass"];

                            $checkuser = check_user($user, $pass);
                            if (is_array($checkuser)) {
                                $_SESSION["user"] = $checkuser;
                                $thongbao = "Đăng nhập thành công";
                                header("Location: index.php");
                            }
                            else {
                                $thongbao = "Tài khoản không chính xác";
                            }
                        }

                        include "view/home.php";
                        break;
                    }
                    case "edit_taikhoan": {
                        if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                            $user = $_POST["user"];
                            $pass = $_POST["pass"];
                            $email = $_POST["email"];
                            $address = $_POST["address"];
                            $tel = $_POST["tel"];
                            $id = $_POST["id"];
                            $role = $_POST["role"];

                            update_taikhoan($user, $pass, $email, $address, $tel, $role, $id);
                            $checkuser = check_user($user, $pass);
                            $_SESSION["user"] = $checkuser;
                            header("Location: index.php?act=edit_taikhoan");
                        }

                        include "view/taikhoan/edit_taikhoan.php";
                        break;
                    }
                    case "quenmk": {
                        if (isset($_POST["guiemail"]) && $_POST["guiemail"]) {
                            $email = $_POST["email"];

                            $checkemail = check_email($email);
                            if (is_array($checkemail)) {
                                $thongbao = "Mật khẩu của bạn là: "."<b>".$checkemail["pass"]."</b>";
                            }
                            else {
                                $thongbao = "Email không tồn tại";
                            }
                        }

                        include "view/taikhoan/quenmk.php";
                        break;
                    }
                    case "addtocart": {
                        if (isset($_POST["addtocart"]) && $_POST["addtocart"]) {
                            $id = $_POST["id"];
                            $name = $_POST["name"];
                            $img = $_POST["img"];
                            $price = $_POST["price"];
                            $soluong = 1;
                            $thanhtien = $soluong * $price;

                            $spadd = [ $id, $name, $img, $price, $soluong, $thanhtien ];
                            array_push($_SESSION["mycart"], $spadd); 
                        }

                        include "view/cart/viewcart.php";
                        break;
                    }
                    case "viewcart": {
                        include "view/cart/viewcart.php";
                        break;
                    }
                    case "delcart": {
                        if (isset($_GET["idcart"])) {
                            array_splice($_SESSION["mycart"], $_GET["idcart"], 1);
                        }
                        else {
                            $_SESSION["mycart"] = [];
                        }

                        header("Location: index.php?act=viewcart");
                        break;
                    }
                    case "bill": {

                        include "view/cart/bill.php";
                        break;
                    }
                    case "billconfirm": {
                        if (isset($_POST["dongydathang"]) && $_POST["dongydathang"]) {
                            if (isset($_SESSION["user"])) {
                                $iduser = $_SESSION["user"]["id"];
                            }
                            else {
                                $iduser = 0;
                            }

                            $name = $_POST["name"];
                            $address = $_POST["address"];
                            $email = $_POST["email"];
                            $tel = $_POST["tel"];
                            $pttt = $_POST["pttt"];
                            $ngaydathang = date("h:i:sa d/m/Y");
                            $tongdonhang = tongdonhang();

                            $idbill = insert_bill($iduser, $name, $address, $tel, $email, $pttt, $ngaydathang, $tongdonhang);

                            // insert into cart
                            foreach ($_SESSION["mycart"] as $cart) {
                                insert_cart($_SESSION["user"]["id"], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                            }

                            $_SESSION["mycart"] = [];
                        }
                        else {
                            $idbill = 0;
                        }

                        $bill = loadone_bill($idbill);
                        $billct = loadone_cart($idbill);
                        include "view/cart/billconfirm.php";
                        break;
                    }
                    case "mybill": {
                        $listbill = loadall_bill_byuser($_SESSION["user"]["id"]);
                        include "view/cart/mybill.php";
                        break;
                    }
                    case "thoat": {
                        session_unset();
                        header("Location: index.php");
                        break;
                    }
                    case "gioithieu": {
                        include "view/gioithieu.php";
                        break;
                    }
                    case "lienhe": {
                        include "view/lienhe.php";
                        break;
                    }
                    default: {
                        include "view/home.php";
                        break;
                    }
                }
            }
            else {
                include "view/home.php";
            }
           
            include "view/footer.php";
        ?>
    </div>
</body>

</html>