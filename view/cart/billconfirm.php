<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><b>CẢM ƠN</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <h5 class="alert alert-success" style="text-align: center;">Cảm ơn quý khách đã đặt hàng</h5>
            </div>
        </div>
        <?php 
            if (isset($bill) && is_array($bill)) {
                extract($bill);
            }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading"><b>MÃ ĐƠN HÀNG</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <h5 class="alert alert-success" style="text-align: center;"><b>DAM-<?=$bill["id"]?></b></h5>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>THÔNG TIN ĐẶT HÀNG</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <form action="#" style="padding: 10px">
                    <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Người đặt hàng</p>
                        <p class="col-sm-10">
                        <?=$bill["bill_name"]?>
                        </p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Địa chỉ</p>
                        <p class="col-sm-10">
                        <?=$bill["bill_address"]?>
                        </p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Email</p>
                        <p class="col-sm-10">
                        <?=$bill["bill_email"]?>
                        </p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Điện thoại</p>
                        <p class="col-sm-10">
                        <?=$bill["bill_tel"]?>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>PHƯƠNG THỨC THANH TOÁN</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <h5 style="padding: 10px;">Trả tiền khi nhận hàng</h5>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>THÔNG TIN GIỎ HÀNG</b></div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $tongtien = 0;
                              $i = 0;
                              foreach ($billct as $cart) {
                                 $hinh = $img_path.$cart[3];
                                 $xoasp = "index.php?act=delcart&idcart=".$i;
                                 $tongtien += $cart[7];
                                 echo '<tr>
                                         <td><img src='.$hinh.' style="height: 80px;" /></td>
                                         <td>'.$cart[4].'</td>
                                         <td>'.$cart[5].'</td>
                                         <td>'.$cart[6].'</td>
                                         <td>'.$cart[7].'</td>
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
            </div>
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>