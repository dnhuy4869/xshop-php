<div class="row">
    <article class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><b>QUÊN MẬT KHẨU</b></div>
            <div class="panel-body nn-panel-body container-fluid">
                <form action="index.php?act=quenmk" method="post">
                    <div class="form-group">
                        <div>Email</div>
                        <input type="email" name="email" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Gửi" class="btn btn-primary" name="guiemail">
                        <input type="reset" value="Nhập lại" class="btn btn-primary">
                    </div>
                    <?php
                        if (isset($thongbao) && $thongbao != "") {
                            echo "<p class='alert alert-success'>$thongbao</p>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </article>
    <?php 
        include "view/boxright.php";
    ?>
</div>