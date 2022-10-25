<div class="row">
    <h4 class="alert alert-info">DANH SÁCH LOẠI HÀNG</h4>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listdm as $danhmuc) {
                extract($danhmuc);
                $suadm = "index.php?act=suadm&id=".$id;
                $xoadm = "index.php?act=xoadm&id=".$id;
                echo '<tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                            </div>
                        </td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>
                            <a href='.$suadm.'><input type="button" class="btn btn-success" value="Sửa"></input></a>
                            <a href='.$xoadm.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
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
    <a href="index.php?act=adddm"><input type="button" class="btn btn-primary" value="Nhập thêm"></input></a>
</div>