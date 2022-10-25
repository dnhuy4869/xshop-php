<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <?php
                 //extract($onesp);
            ?>
            <div class="panel-heading"><b><?=$tendm?></b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <div class="row">
                    <?php
                foreach ($dssp as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=".$id;
                    $hinh = $img_path.$img;
                    echo '<div class="col-sm-6 col-md-4">
                    <div class="thumbnail text-center">
                        <a href="'.$linksp.'">
                            <img src="'.$hinh.'" style="width: 150px; height: 150px;">
                        </a>
                        <div class="caption text-left">
                            <h3>$ '.$price.' </h3>
                            <a href="'.$linksp.'">
                                '.$name.'
                            </a>
                        </div>
                    </div>
                </div>';
                } 
            ?>
                </div>
            </div>
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>