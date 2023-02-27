
        <div class="col-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update</h4>
                    <p class="card-description"> Update </p>
                    <form class="forms-sample" action="index.php?act=update_bills" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Bill - Name</label>
                            <input type="text" name="bill_name" value="<?= $bill['bill_name'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Bill - Country</label>
                            <input type="text" name="bill_country" value="<?= $bill['bill_country'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Bill - Town/City</label>
                            <input type="text" name="bill_towncity" value="<?= $bill['bill_towncity'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Bill - Address</label>
                            <input type="text" name="bill_address" value="<?= $bill['bill_address'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Bill - Phone</label>
                            <input type="number" name="bill_phone" value="<?= $bill['bill_phone'] ?>" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Bill - Email</label>
                            <input type="text" name="bill_email" value="<?= $bill['bill_email'] ?>" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Bill - Status</label>
                            <select name="bill_status" id="" class="form-control" >
                              
                                <option <?php if (isset($bill['bill_status'] ) && $bill['bill_status'] == '0') echo "selected=\"selected\"";  ?> value="0">New orders</option>
                                <option  <?php if (isset($bill['bill_status'] ) && $bill['bill_status'] == '1') echo "selected=\"selected\"";  ?> value="1">Processing</option>
                                <option  <?php if (isset($bill['bill_status'] ) && $bill['bill_status'] == '2') echo "selected=\"selected\"";  ?> value="2">cancel</option>
                                <option  <?php if (isset($bill['bill_status'] ) && $bill['bill_status'] == '3') echo "selected=\"selected\"";  ?> value="3">completed</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?= $bill['id'] ?>">
                        <input type="submit" name="update" class="btn btn-gradient-primary me-2 text-uppercase" value="Update"></input>
                    </form>
                </div>
            </div>
        </div>



    </div>










  

<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->

<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- End custom js for this page -->
</body>

</html>