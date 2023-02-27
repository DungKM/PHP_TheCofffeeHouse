<?php
if (is_array($products)) {
    extract($products);
}


$image_path = "../upload/" . $products['image'];

if (is_file($image_path)) {
    $image = "<img src='" . $image_path . "' width='100' heigth ='80'>";
} else {
    $image = "no photo";
}

?>
<div class="col-9 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-description"> Update products </p>
            <form class="forms-sample" action="index.php?act=update_products" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Product's name</label>
                    <input type="text" name="name_products" value="<?= $products['name_pro'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label>File upload image</label>
                    <div class="input-group col-xs-10">
                        <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                    </div>
                    <div><?= $image ?></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Price</label>
                    <input type="number" name="price" value="<?= $products['price'] ?>" class="form-control" id="exampleInputCity1" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Type product</label>
                    <select name="id_ct" class="form-control" id="exampleSelectGender">
                        <option value="0" selected>Chose</option>
                        <?php



                        foreach ($list_category as $category) {
                            extract($category);
                            if ($id_category == $category['id'])  $s = "selected";
                            else $s = "";
                            echo '<option value="' . $category['id'] . '"' . $s . '> ' . $category['name_ct'] . ' </option>';
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Describe</label>
                    <textarea name="describe" class="form-control" id="exampleTextarea1" rows="4"><?= $products['describe'] ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?= $products['id'] ?>">
                <input type="submit" name="update" class="btn btn-gradient-primary me-2 text-uppercase" value="Update">
                <a class="btn btn-inverse-danger btn-fw text-uppercase" href="index.php?act=list_product">CANCEL</a>


                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>
        </div>
    </div>
</div>



</div>











<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../assets/js/chart.js"></script>
<!-- End custom js for this page -->
</body>

</html>