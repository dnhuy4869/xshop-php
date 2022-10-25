<div class="row">
    <h4 class="alert alert-info">DANH SÁCH THỐNG KÊ</h4>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Loại hàng</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_thongke as $tk) {
                extract($tk);
                echo '<tr>
                        <td>'.$tendm.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$maxprice.'</td>
                        <td>'.$minprice.'</td>
                        <td>'.$avgprice.'</td>
                    </tr>';
            }
        ?>
        </tbody>
    </table>
</div>

<div class="row">
    <a href="index.php?act=bieudo"><input type="button" class="btn btn-primary" value="Xem biểu đồ"></input></a>
</div>