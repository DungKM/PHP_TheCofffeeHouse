<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="upload/coffee-beans-top-view-white-background-space-text.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Coffee Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            <?php
                            foreach ($list_category as $category) {
                                extract($category);
                                $link_category = "index.php?act=shop-grid&id_ct=" . $category['id'];
                                echo '
                            <li><a href="' . $link_category . '">' . $category['name_ct'] . '</a></li>
                         ';
                            }
                            ?>
                        </ul>
                    </div>


                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    foreach ($latest_top3 as $top3) {
                                        extract($top3);
                                        $link_product = "index.php?act=shop-detail&id_pro=" . $id;
                                        echo '
    <a href="'.$link_product.'" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:40%;">
        <img src="upload/' . $top3['image'] . '" alt="">
    </div>
    <div class="latest-product__item__text">
        <h6>' . $top3['name_pro'] . '</h6>
        <span>$' . $top3['price'] . '</span>
    </div>
    </a>
    ';
                                    }

                                    ?>

                                </div>


                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    foreach ($latest_top3 as $top3) {
                                        extract($top3);
                                        $link_product = "index.php?act=shop-detail&id_pro=" . $id;
                                        echo '
    <a href="'.$link_product.'" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:40%;">
        <img src="upload/' . $top3['image'] . '" alt="">
    </div>
    <div class="latest-product__item__text">
        <h6>' . $top3['name_pro'] . '</h6>
        <span>$' . $top3['price'] . '</span>
    </div>
    </a>
    ';
                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-7">

                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__found">
                                <div class="hero__search__form">
                                    <form action="index.php?act=shop-grid" method="post">
                                        <div class="hero__search__categories">
                                            Search product
                                        </div>
                                        <input type="text" name="kyw" placeholder="What do you need?">
                                        <button type="submit" class="site-btn">SEARCH</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">

                        </div>
                    </div>
                </div>
                <di class="row">
                    <?php
                    foreach ($list_products as $products) {
                        extract($products);
                        $link_product = "index.php?act=shop-detail&id_pro=" . $id;
                        echo '
            <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>
                        <form action="index.php?act=addtocart" method="post">
                         <input type="hidden" name="id" value="' . $id . '">
                         <input type="hidden" name="name" value="' . $name_pro . '">
                         <input type="hidden" name="img" value="' . $image . '">
                         <input type="hidden" name="price" value="' . $price . '">
                         <button type="submit" class="button" name="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
                        </form>
                        </li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="#">' . $products['name_pro'] . '</a></h6>
                    <h5>$' . $products['price'] . '</h5>
                </div>
            </div>
        </div>
      </a>
';
                    }
                    ?>
            </div>
        </div>

    </div>

</section>
<!-- Product Section End -->