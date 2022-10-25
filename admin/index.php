<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Online Shopping Center</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/jquery-ui.min.css" rel="stylesheet" />
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
</head>

<body>
    <div class="container">
        <?php 
            include 'header.php';
            include "../model/pdo.php";
            include "../model/danhmuc.php";
            include "../model/sanpham.php";
            include "../model/taikhoan.php";
            include "../model/binhluan.php";
            include "../model/cart.php";

            if (isset($_GET['act'])) {
                $act = $_GET['act'];
                switch ($act) {
                    // danh muc controller
                    case "adddm": {
                        if (isset($_POST["themmoi"]) && $_POST["themmoi"]) {
                            $tenloai = $_POST["tenloai"];
                            insert_danhmuc($tenloai);
                            $thongbao = "Thêm thành công";
                        }

                        include "danhmuc/add.php";
                        break;
                    }
                    case "listdm": {
                        $listdm = loadall_danhmuc();
                        include "danhmuc/list.php";
                        break;
                    }
                    case "xoadm": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            delete_danhmuc($_GET["id"]);
                        }

                        $listdm = loadall_danhmuc();
                        include "danhmuc/list.php";
                        break;
                    }
                    case "suadm": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            $dm = loadone_danhmuc($_GET["id"]);
                        }

                        include "danhmuc/update.php";
                        break;
                    }
                    case "updatedm": {
                        if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                            $tenloai = $_POST["tenloai"];
                            $id = $_POST["id"];
                            update_danhmuc($tenloai, $id);
                            $thongbao = "Cập nhật thành công";
                        }

                        $listdm = loadall_danhmuc();
                        include "danhmuc/list.php";
                        break;
                    }
                    // san pham controller
                    case "addsp": {
                        $listdm = loadall_danhmuc(); 

                        if (isset($_POST["themmoi"]) && $_POST["themmoi"]) {
                            $iddm = $_POST["iddm"];
                            $tensp = $_POST["tensp"];
                            $giasp = $_POST["giasp"];
                            $motasp = $_POST["motasp"];
                            $filename = $_FILES["hinhsp"]["name"];

                            $target_dir = "../upload/";
                            $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
                            if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)) {
                                //echo "The file ". htmlspecialchars( basename( $_FILES["hinhsp"]["name"])). " has been uploaded.";
                              } else {
                                //echo "Sorry, there was an error uploading your file.";
                              }

                            insert_sanpham($tensp, $giasp, $filename, $motasp, $iddm);
                            $thongbao = "Thêm thành công";
                        }

                        include "sanpham/add.php";
                        break;
                    }
                    case "listsp": {
                        if (isset($_POST["listok"]) && $_POST["listok"]) {
                            $kyw = $_POST["kyw"];
                            $iddm = $_POST["iddm"];
                        }
                        else {
                            $kyw = "";
                            $iddm = 0;
                        }

                        $listdm = loadall_danhmuc(); 
                        $listsp = loadall_sanpham($kyw, $iddm); 
                        include "sanpham/list.php";
                        break;
                    }
                    case "xoasp": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            delete_sanpham($_GET["id"]);
                        }

                        $listdm = loadall_danhmuc(); 
                        $listsp = loadall_sanpham("", 0); 
                        include "sanpham/list.php";
                        break;
                    }
                    case "suasp": {
                        $listdm = loadall_danhmuc(); 

                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            $sp = loadone_sanpham($_GET["id"]);
                        }

                        include "sanpham/update.php";
                        break;
                    }
                    case "updatesp": {
                        if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                            $iddm = $_POST["iddm"];
                            $tensp = $_POST["tensp"];
                            $giasp = $_POST["giasp"];
                            $motasp = $_POST["motasp"];
                            $filename = $_FILES["hinhsp"]["name"];
                            $id = $_POST["id"];

                            $target_dir = "../upload/";
                            $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
                            if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)) {
                                //echo "The file ". htmlspecialchars( basename( $_FILES["hinhsp"]["name"])). " has been uploaded.";
                              } else {
                                //echo "Sorry, there was an error uploading your file.";
                              }
                              
                            update_sanpham($id, $tensp, $giasp, $filename, $motasp, $iddm);
                            $thongbao = "Cập nhật thành công";
                        }

                        $listdm = loadall_danhmuc(); 
                        $listsp = loadall_sanpham("", 0); 
                        include "sanpham/list.php";
                        break;
                    }
                    case "dskh": {
                        $list_taikhoan = loadall_taikhoan();
                        include "taikhoan/list.php";
                        break;
                    }
                    case "xoatk": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            delete_taikhoan($_GET["id"]);
                        }

                        $list_taikhoan = loadall_taikhoan();
                        include "taikhoan/list.php";
                        break;
                    }
                    case "suatk": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            $taikhoan = loadone_taikhoan($_GET["id"]);
                        }

                        include "taikhoan/update.php";
                        break;
                    } 
                    case "updatetk": {
                        if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                            $user = $_POST["user"];
                            $pass = $_POST["pass"];
                            $email = $_POST["email"];
                            $address = $_POST["address"];
                            $tel = $_POST["tel"];
                            $id = $_POST["id"];
                            $role = $_POST["role"];

                            update_taikhoan($user, $pass, $email, $address, $tel, $role, $id);
                        }

                        $list_taikhoan = loadall_taikhoan();
                        include "taikhoan/list.php";
                        break;
                    }
                    case "dsbl": {
                        $list_binhluan = loadall_binhluan();
                        include "binhluan/list.php";
                        break;
                    }
                    case "xoabl": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            delete_binhluan($_GET["id"]);
                        }

                        $list_binhluan = loadall_binhluan();
                        include "binhluan/list.php";
                        break;
                    }
                    case "donhang": {
                        if (isset($_POST["billok"]) && $_POST["billok"]) {
                            $kyw = $_POST["kyw"];
    
                        }
                        else {
                            $kyw = "";
                        }

                        $list_bill = loadall_bill($kyw);
                        include "donhang/list.php";
                        break;
                    }
                    case "xoabill": {
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            delete_bill($_GET["id"]);
                        }

                        $list_bill = loadall_bill();
                        include "donhang/list.php";
                        break;
                    }
                    case "thongke": {
                        $list_thongke = loadall_thongke();
                        include "thongke/list.php";
                        break;
                    }
                    case "bieudo": {
                        $list_thongke = loadall_thongke();
                        include "thongke/bieudo.php";
                        break;
                    }
                    default: {
                        include "home.php";
                        break;
                    }
                }
            } else {
                include "home.php";
            }
        ?>
    </div>
</body>

</html>