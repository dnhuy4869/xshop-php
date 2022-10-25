<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><b>CẬP NHẬT TÀI KHOẢN</b></div>
            <div class="panel-body nn-panel-body container-fluid">
            <?php 
                if (isset($_SESSION["user"])) {
                    extract($_SESSION["user"]);
                }
            ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                    <div class="form-group">
                        <div>Email</div>
                        <input type="email" name="email" class="form-control" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <div>Tên đăng nhập</div>
                        <input name="user" type="text" class="form-control" value="<?=$user?>">
                    </div>
                    <div class="form-group">
                        <div>Mật khẩu</div>
                        <input name="pass" type="password" class="form-control" value="<?=$pass?>">
                    </div>
                    <div class="form-group">
                        <div>Địa chỉ</div>
                        <input name="address" type="text" class="form-control" value="<?=$address?>">
                    </div>
                    <div class="form-group">
                        <div>Điện thoại</div>
                        <input name="tel" type="text" class="form-control" value="<?=$tel?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" name="capnhat">
                        <input type="reset" value="Nhập lại" class="btn btn-primary">
                    </div>
                    <?php
                        if (isset($thongbao) && $thongbao != "") {
                            echo "<p class='alert alert-success'>$thongbao</p>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>