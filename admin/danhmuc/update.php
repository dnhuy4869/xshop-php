<?php
    if (is_array($dm)) {
        extract($dm);
    }
?>

<div class="row">
    <h4 class="alert alert-info">CẬP NHẬT LOẠI HÀNG</h4>
</div>

<div class="row">
    <form action="index.php?act=updatedm" method="post">
        <div class="form-group">
            <label for="">Mã loại</label>
            <input type="text" class="form-control" placeholder="Mã loại" name="maloai" disabled value="<?php
            if (isset($id) && $id > 0) {
                echo $id;
            }
        ?>">
        </div>
        <div class="form-group">
            <label for="">Tên loại</label>
            <input type="text" class="form-control" placeholder="Tên loại" name="tenloai" value="<?php 
            if (isset($name) && $name != "") {
                echo $name;
            }
        ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" class="btn btn-primary" value="Cập nhật" name="capnhat"></input>
            <input type="reset" class="btn btn-primary" value="Nhập lại"></input>
            <a href="index.php?act=listdm"><input type="button" class="btn btn-primary" value="Danh sách"></a>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo "<p class='alert alert-success'>$thongbao</p>";
        }
    ?>
    </form>
</div>