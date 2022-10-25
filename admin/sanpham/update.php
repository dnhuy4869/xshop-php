<div class="row">
    <h4 class="alert alert-info">CẬP NHẬT SẢN PHẨM</h4>
</div>

<?php
    if (is_array($sp)) {
        extract($sp);
    }

    $hinhpath = "../upload/".$img;
    if (is_file($hinhpath)) {
        $hinh = "<img src='".$hinhpath."' height='80' />";
    }
    else {
        $hinh = "no photo";
    }
?>

<div class="row">
    <form action="index.php?act=updatesp" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="">Mã sản phẩm</label>
            <input type="text" class="form-control" placeholder="Mã sản phẩm" name="masp" disabled value="<?php
            if (isset($id) && $id > 0) {
                echo $id;
            }
        ?>">
        </div>
        <div class="form-group">
            <label for="">Danh mục</label>
            <select class="form-control" name="iddm">
                <?php
                    foreach ($listdm as $danhmuc) {
                        if ($iddm == $danhmuc["id"]) {
                            echo '<option value="'.$danhmuc["id"].'" selected>'.$danhmuc["name"].'</option>';
                        }
                        else {
                            echo '<option value="'.$danhmuc["id"].'">'.$danhmuc["name"].'</option>';
                        }
                    }
               ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Tên sản phẩm" name="tensp" value="<?php
             if (isset($name) && $name != "") {
                echo $name;
            }
        ?>">
        </div>
        <div class="form-group">
            <label for="">Giá</label>
            <input type="text" class="form-control" placeholder="Giá" name="giasp" value="<?php
            if (isset($price) && $price > 0) {
                echo $price;
            }
        ?>">
        </div>
        <div class="form-group" style="display: inline-flex; align-items:center; gap: 10px">
            <label for="">Hình</label>
            <input type="file" class="form-control" placeholder="Hình" name="hinhsp">
            <?=$hinh?>
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea cols="30" rows="5" class="form-control" placeholder="Mô tả" name="motasp">
            <?=$mota?>  
            </textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" class="btn btn-primary" value="Cập nhật" name="capnhat"></input>
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