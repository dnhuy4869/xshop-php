<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <?php
                 extract($onesp);
                 increase_view($id, 1);
            ?>
            <div class="panel-heading"><b><?=$name?></b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <?php
                    $hinh = $img_path.$img;
                    echo '<div style="display: flex; justify-content: center;">
                            <img src="'.$hinh.'" style="display: block; width: 60%;" />
                        </div>';
                    echo '<ul> 
                            <li>MÃ HH: '.$id.'</li>
                            <li>TÊN HH: '.$name.'</li>
                            <li>ĐƠN GIÁ: '.$price.'</li>
                        </ul>';
                    echo $mota;
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>})
            })
        </script>
        <div id="binhluan">
            
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">SẢN PHẨM CÙNG LOẠI</div>
            <div class="panel-body nn-panel-body container-fluid">
                <?php
                 foreach ($spcungloai as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=".$id;
                     echo '<ul> 
                        <li><a href="'.$linksp.'">'.$name.'</a></li>
                        </ul>';
                 }
                ?>
            </div>
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>