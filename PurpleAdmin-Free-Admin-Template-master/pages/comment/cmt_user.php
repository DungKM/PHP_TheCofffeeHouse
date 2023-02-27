
        <div class="col-lg-10 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body justify-content-md-center">
                <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">Comments     <i class=" mdi mdi-comment-multiple-outline "></i></h4>
                    <p class="card-description"> List comments
                    </p>
                    <div class="table-responsive"> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Comment content</th>
                                <th class="text-center">Id_User</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Id_Products</th>
                                <th class="text-center">comment date</th>
                                <th class="text-center">manipulation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_comments as $comments) {
                                extract($comments);
                                $delete_comments = "index.php?act=delete_comments&id=" . $id;

                                echo '
                            <tr>
                            <td class="text-center">' . $id . '</td>
                            <td class="text-center">' . $contents . '</td>
                            <td class="text-center">' . $id_user . '</td>
                            <td class="text-center">' . $user . '</td>
                            <td class="text-center">' . $id_pro . '</td>
                            <td class="text-center">' . $comment_date . '</td>
                            <td class="text-center"> <a href="' . $delete_comments . '"  class="btn btn-gradient-danger btn-fw text-uppercase">delete</a></td>
        
                        </tr>
                            ';
                            }
                            ?>


                        </tbody>
                    </table>

                    </div>
                   
                    </div>
                   
                </div>
            </div>
        </div>



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
