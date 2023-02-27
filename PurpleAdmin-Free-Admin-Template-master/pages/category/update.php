<?php

if (isset($category)) {
  extract($category);
}

?>

<!-- category  -->

<div class="col-md-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Category</h4>
      <p class="card-description"> Update category </p>
      <form class="forms-sample" action="index.php?act=update_categories" method="post">
        <div class="form-group row">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Type name</label>
          <div class="col-sm-9">
            <?php
            if (!empty($error['type_name'])) {
              echo ' <span class="text-white p-1 bg bg-gradient-danger">' . $error['type_name'] . '</span>';
            }
            ?>
            <input type="text" class="form-control" name="type_name" value="<?php if (isset($type_name) && $type_name != "") echo $type_name; ?>" placeholder="Type name">
          </div>
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Avata</label>
          <div class="col-sm-9">
            <?php
            if (!empty($error['image'])) {
              echo ' <span class="text-white p-1 bg bg-gradient-danger">' . $error['image'] . '</span>';
            }
            ?>
            <input type="file" name="image" class="form-control file-upload-info" value="<?php if (isset($image) && $image != "") echo $image; ?>" placeholder="Upload Image">
          </div>
        </div>
        <input type="hidden" name="id" value="<?php if (isset($id) && $id > 0) echo $id; ?>">
        <input type="submit" value="Update" name="update" class="btn btn-gradient-primary me-2 text-uppercase">
        <a class="btn btn-inverse-danger btn-fw text-uppercase" href="index.php?act=list_category">CANCEL</a>
      </form>
    </div>
  </div>
</div>

<!-- category end  -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/chart.js"></script>
<!-- End custom js for this page -->
</body>

</html>