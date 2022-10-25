<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><b>ĐƠN HÀNG CỦA TÔI</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <div class="row" style="padding: 0 10px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Số lượng</th>
                                <th>Tổng giá trị</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             
        $tongtien = 0;
        $i = 0;
        foreach ($listbill as $bill) {
            $ttdh = get_ttdh($bill[9]);
            $count = loadone_cart_count($bill[0]);
           echo '<tr>
                   <td>DAM-'.$bill[0].'</td>
                   <td>'.$bill[7].'</td>
                   <td>'.$count.'</td>
                   <td>'.$bill[8].'</td>
                   <td>'.$ttdh.'</td>
               </tr>';

           $i++;
        }
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