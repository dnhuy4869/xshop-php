<div class="row">
    <form class="col-sm-9" action="index.php?act=billconfirm" method="post">
        <div class="panel panel-default">
            <div class="panel-heading"><b>THÔNG TIN ĐẶT HÀNG</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <?php 
                    if (isset($_SESSION["user"])) {
                        $name = $_SESSION["user"]["user"];
                        $address = $_SESSION["user"]["address"];
                        $email = $_SESSION["user"]["email"];
                        $tel = $_SESSION["user"]["tel"];
                    }
                    else {
                        $name = "";
                        $address = "";
                        $email = "";
                        $tel = "";
                    }
                ?>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label">Người đặt hàng</p>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?=$name?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label">Địa chỉ</p>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="<?=$address?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label">Email</p>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?=$email?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label">Điện thoại</p>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tel" value="<?=$tel?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><b>PHƯƠNG THỨC THANH TOÁN</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <label class="radio-inline">
                    <input type="radio" name="pttt" checked value="1">Trả tiền khi nhận hàng
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pttt" value="2">Chuyển khoản ngân hàng
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pttt" value="3">Thanh toán online
                </label>
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

        <div class="row" style="padding: 0 10px">
            <input type="submit" class="btn btn-primary" name="dongydathang" value="Đồng ý đặt hàng"></input>
        </div>
    </form>
    <?php 
        include "view/boxright.php";
    ?>
</div>