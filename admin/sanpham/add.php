<div class="row">
    <h4 class="alert alert-info">THÊM MỚi SẢN PHẨM</h4>
</div>

<div class="row">
    <form action="index.php?act=addsp" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="">Mã sản phẩm</label>
            <input type="text" class="form-control" placeholder="Mã sản phẩm" name="masp" disabled>
        </div>
        <div class="form-group">
            <label for="">Danh mục</label>
            <select class="form-control" name="iddm">
               <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
               ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Tên sản phẩm" name="tensp">
        </div>
        <div class="form-group">
            <label for="">Giá</label>
            <input type="text" class="form-control" placeholder="Giá" name="giasp">
        </div>
        <div class="form-group">
            <label for="">Hình</label>
            <input type="file" class="form-control" placeholder="Hình" name="hinhsp">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea cols="30" rows="5" class="form-control" placeholder="Mô tả" name="motasp"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Thêm mới" name="themmoi"></input>
            <input type="reset" class="btn btn-primary" value="Nhập lại"></input>
            <a href="index.php?act=listsp"><input type="button" class="btn btn-primary" value="Danh sách"></a>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo "<p class='alert alert-success'>$thongbao</p>";
        }
    ?>
    </form>
</div>