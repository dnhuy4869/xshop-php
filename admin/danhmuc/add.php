<div class="row">
    <h4 class="alert alert-info">THÊM MỚi LOẠI HÀNG</h4>
</div>

<div class="row">
    <form action="index.php?act=adddm" method="post">
        <div class="form-group">
            <label for="">Mã loại</label>
            <input type="text" class="form-control" placeholder="Mã loại" name="maloai" disabled>
        </div>
        <div class="form-group">
            <label for="">Tên loại</label>
            <input type="text" class="form-control" placeholder="Tên loại" name="tenloai">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Thêm mới" name="themmoi"></input>
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