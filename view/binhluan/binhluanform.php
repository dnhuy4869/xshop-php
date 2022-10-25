<?php 
    session_start();

    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    include "../../model/sanpham.php";

    $idpro = $_REQUEST["idpro"];

    $ds_binhluan = loadall_binhluan($idpro);
?>
<div class="panel panel-default">
    <div class="panel-heading">BÌNH LUẬN</div>
    <div class="list-group">
        <ul style="list-style: none; padding-left: 0; padding: 10px 20px">
        <?php 
            foreach ($ds_binhluan as $bl) {
                extract($bl);

                echo '<li style="display: flex; justify-content: space-between;">
                    <p>'.$noidung.'</p>
                    <div style="display: flex; gap: 10px;">
                    <p><b>'.$iduser.'</b></p>
                    <p>'.$ngaybinhluan.'</p>
                    </div>
                    </li>';
            }
        ?>
        </ul>
    </div>
    <div class="panel-footer">
        <?php 
                if (!isset($_SESSION["user"])) {
                    echo "<p class='text-danger'>Vui lòng đăng nhập để bình luận</p>";
                }
                else {
                    extract($_SESSION["user"]);

                    if (!is_bought($id, $idpro)) {
                        echo "<p class='text-danger'>Vui lòng mua sản phẩm này để bình luận</p>";
                    }
                    else {
        ?>
        <form action="index.php?act=add_binhluan" method="post" style="display: flex; gap: 10px;">
            <input type="hidden" name="iduser" value="<?=$id?>">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            <input type="text" name="msg" class="form-control">
            <input type="submit" name="guibinhluan" value="Gửi bình luận" class="btn btn-primary">
        </form>
        <?php
                }
            }
        ?>
    </div>
</div>