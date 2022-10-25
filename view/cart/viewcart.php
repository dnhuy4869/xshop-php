<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><b>GIỎ HÀNG</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <div class="row" style="padding: 0 10px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hình</th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             
        $tongtien = 0;
        $i = 0;
        foreach ($_SESSION["mycart"] as $cart) {
           $hinh = $img_path.$cart[2];
           $xoasp = "index.php?act=delcart&idcart=".$i;
           $tongtien += $cart[5];
           echo '<tr>
                   <td><img src='.$hinh.' style="height: 80px;" /></td>
                   <td>'.$cart[1].'</td>
                   <td>'.$cart[3].'</td>
                   <td>'.$cart[4].'</td>
                   <td>'.$cart[5].'</td>
                   <td>
                       <a href='.$xoasp.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
                   </td>
               </tr>';

           $i++;
        }

        echo '<tr>
             <td colspan="4"><b>Tổng đơn hàng </b></td>
             <td colspan="2">'.$tongtien.'</td>
            </tr>';
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="row" style="padding: 0 10px">
                    <a href="index.php?act=bill"><input type="button" class="btn btn-primary"
                            value="Tiếp tục đặt hàng"></input></a>
                    <a href="index.php?act=delcart"><input type="button" class="btn btn-primary"
                            value="Xóa giỏ hàng"></a>
                </div>
            </div>
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>