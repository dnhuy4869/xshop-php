<?php
    if (is_array($taikhoan)) {
        extract($taikhoan);
    }
?>

<div class="row">
    <h4 class="alert alert-info">CẬP NHẬT TÀI KHOẢN</h4>
</div>

<div class="row">
    <form action="index.php?act=updatetk" method="post">
        <div class="form-group">
            <label for="">Mã tài khoản</label>
            <input type="text" class="form-control" name="matk" disabled value="<?=$id
        ?>">
        </div>
        <div class="form-group">
            <label for="">Tên tài khoản</label>
            <input type="text" class="form-control" name="user" value="<?=$user?>">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="text" class="form-control" name="pass" value="<?=$pass?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="<?=$email?>">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="<?=$address?>">
        </div>
        <div class="form-group">
            <label for="">Điện thoại</label>
            <input type="text" class="form-control" name="tel" value="<?=$tel?>">
        </div>
        <div class="form-group">
            <label for="">Vai trò</label>
            <select class="form-control" name="role">
                <?php 
                    for ($x = 0; $x <= 1; $x++) {
                        if ($x == $role) {
                            echo '<option selected value='.$role.'>'.$role.'</option>';
                        }
                        else {
                            echo '<option value='.$role.'>'.$role.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" class="btn btn-primary" value="Cập nhật" name="capnhat"></input>
            <input type="reset" class="btn btn-primary" value="Nhập lại"></input>
            <a href="index.php?act=dskh"><input type="button" class="btn btn-primary" value="Danh sách"></a>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo "<p class='alert alert-success'>$thongbao</p>";
        }
    ?>
    </form>
</div>