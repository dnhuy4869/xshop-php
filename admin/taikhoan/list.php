<div class="row">
    <h4 class="alert alert-info">DANH SÁCH TÀI KHOẢN</h4>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Mã tài khoản</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Vai trò</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_taikhoan as $taikhoan) {
                extract($taikhoan);
                $suatk = "index.php?act=suatk&id=".$id;
                $xoatk = "index.php?act=xoatk&id=".$id;
                echo '<tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                            </div>
                        </td>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>'.$tel.'</td>
                        <td>'.$role.'</td>
                        <td>
                            <a href='.$suatk.'><input type="button" class="btn btn-success" value="Sửa"></input></a>
                            <a href='.$xoatk.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
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