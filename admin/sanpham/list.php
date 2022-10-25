<div class="row">
    <h4 class="alert alert-info">DANH SÁCH SẢN PHẨM</h4>
</div>

<div class="row" style="margin-bottom: 15px">
    <form action="index.php?act=listsp" method="post" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" name="kyw">
        </div>
        <div class="form-group">
            <select class="form-control" name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
               ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="listok" value="Go" class="btn btn-primary">
        </div>
    </form>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hình</th>
                <th>Lượt xem</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listsp as $sanpham) {
                extract($sanpham);
                $suasp = "index.php?act=suasp&id=".$id;
                $xoasp = "index.php?act=xoasp&id=".$id;
                $hinhpath = "../upload/".$img;

                if (is_file($hinhpath)) {
                    $hinh = "<img src='".$hinhpath."' height='80' />";
                }
                else {
                    $hinh = "no photo";
                }

                echo '<tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                            </div>
                        </td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$hinh.'</td>
                        <td>'.$luotxem.'</td>
                        <td>
                            <a href='.$suasp.'><input type="button" class="btn btn-success" value="Sửa"></input></a>
                            <a href='.$xoasp.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
                        </td>
                    </tr>';
            }
        ?>
        </tbody>
    </table>
</div>

<div class="row">
    <input type="button" class="btn btn-primary" value="Chọn tất cả"></input>
    <input type="button" class="btn btn-primary" value="Bỏ chọn tất cả"></input>
    <input type="button" class="btn btn-primary" value="Xóa các mục đã chọn"></input>
    <a href="index.php?act=addsp"><input type="button" class="btn btn-primary" value="Nhập thêm"></input></a>
</div>