<div class="row">
    <h4 class="alert alert-info">DANH SÁCH ĐƠN HÀNG</h4>
</div>

<div class="row" style="margin-bottom: 15px">
    <form action="index.php?act=donhang" method="post" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" name="kyw">
        </div>
        <div class="form-group">
            <input type="submit" name="billok" value="Go" class="btn btn-primary">
        </div>
    </form>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_bill as $bill) {
                extract($bill);
                $xoabill = "index.php?act=xoabill&id=".$id;
                $ttdh = get_ttdh($bill[9]);
                $count = loadone_cart_count($bill[0]);
                echo '<tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                            </div>
                        </td>
                        <td>DAM-'.$id.'</td>
                        <td>'.$bill_name.'</td>
                        <td>'.$count.'</td>
                        <td>'.$total.'</td>
                        <td>'.$ttdh.'</td>
                        <td>
                            <a href='.$xoabill.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
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