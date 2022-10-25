<aside class="col-sm-3">
    <!--LOGIN-->
    <div class="panel panel-default nn-panel-login">
        <div class="panel-heading">TÀI KHOẢN</div>
        <div class="panel-body">
            <?php 
                if (isset($_SESSION["user"])) {
                    extract($_SESSION["user"]);
            ?>

            <p>Xin chào <b><?=$user?></b></p>
            <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
            <?php 
                if ($role == 1) {
                    echo '<li><a href="admin/index.php">Đăng nhập admin</a></li>';
                }
            ?>
            <li><a href="index.php?act=thoat">Đăng xuất</a></li>
        
            <?php
                }
                else {
            ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="form-group">
                    <div>Tên đăng nhập</div>
                    <input name="user" class="form-control" value="">
                </div>
                <div class="form-group">
                    <div>Mật khẩu</div>
                    <input name="pass" type="password" class="form-control" value="">
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label class="checkbox-inline">
                            <input name="ghi_nho" type="checkbox" checked>
                            Ghi nhớ tài khoản?
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="dangnhap" class="btn btn-default" value="Đăng nhập"></input>
                </div>
                <div class="form-group">
                    <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                    <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
    <!--CATALOG-->
    <div class="panel panel-default">
        <div class="panel-heading">DANH MỤC</div>
        <div class="list-group">
            <?php
                     foreach ($dsdm as $dm) {
                        extract($dm);
                        $linkdm = "index.php?act=sanpham&iddm=".$id;
                        echo '<a href="'.$linkdm.'" class="list-group-item">'.$name.'y</a>';
                     }
                ?>
        </div>
        <div class="panel-footer">
            <form action="index.php?act=sanpham" method="post" style="display: flex; gap: 10px;">
                <input name="kyw" placeholder="Từ khóa tìm kiếm" class="form-control">
                <input type="submit" name="timkiem" value="Tìm kiếm" class="btn btn-primary">
            </form>
        </div>
    </div>
    <!--FAVORITE-->
    <div class="panel panel-default">
        <div class="panel-heading">TOP 10 YÊU THÍCH</div>
        <div class="panel-body nn-panel-body container-fluid">
            <?php 
                    foreach ($dstop10 as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=".$id;
                        $hinh = $img_path.$img;
                        echo '  <div class="row" style="margin-bottom: 20px !important;">
                        <div class="col-xs-3"><a href="'.$linksp.'"><img src="'.$hinh.'" style="width:50px"></a></div>
                        <div class="col-xs-7"><a href="'.$linksp.'">'.$name.'</a></div>
                    </div>';
                    }                
                ?>
        </div>
    </div>
</aside>