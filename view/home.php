<div class="row">
    <article class="col-sm-9">
        <div class="row" style="padding: 0 15px !important;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/sliders/01.jpg" alt="#">
                    </div>

                    <div class="item">
                        <img src="images/sliders/02.jpg" alt="#">
                    </div>

                    <div class="item">
                        <img src="images/sliders/03.jpg" alt="#">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <?php
                foreach ($spnew as $sp) {
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
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="'.$id.'">
                            <input type="hidden" name="name" value="'.$name.'">
                            <input type="hidden" name="img" value="'.$img.'">
                            <input type="hidden" name="price" value="'.$price.'">
                            <input type="submit" name="addtocart" class="btn btn-primary" style="width: 100%;" value="Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>';
                } 
            ?>
            
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>