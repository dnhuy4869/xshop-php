<div class="row">
    <h4 class="alert alert-info">DANH SÁCH BÌNH LUẬN</h4>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Mã bình luận</th>
                <th>Nội dung</th>
                <th>Mã người dùng</th>
                <th>Mã sản phẩm</th>
                <th>Ngày bình luận</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_binhluan as $binhluan) {
                extract($binhluan);
                $suabl = "index.php?act=suabl&id=".$id;
                $xoabl = "index.php?act=xoabl&id=".$id;
                echo '<tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                            </div>
                        </td>
                        <td>'.$id.'</td>
                        <td>'.$noidung.'</td>
                        <td>'.$iduser.'</td>
                        <td>'.$idpro.'</td>
                        <td>'.$ngaybinhluan.'</td>
                        <td>
                            <a href='.$xoabl.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
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
</div>