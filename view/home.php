<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
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
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <!-- <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form> -->
                        <form action="index.php?act=shop-grid" method="post">
                            <div class="hero__search__categories">
                                Search product
                            </div>
                            <input type="text" name="kyw" placeholder="What do you need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 355.7977.46</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="view/img/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>The Coffee house <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="index.php?act=shop-grid" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php
                foreach ($list_category as $category) {
                    extract($category);
                    $link_category = "index.php?act=shop-grid&id_ct=" . $category['id'];
                    echo '
    <div class="col-lg-3">
    <div class="categories__item set-bg" data-setbg="upload/' . $category['image_ct'] . '">
        <h5><a href="' . $link_category . '">' . $category['name_ct'] . '</a></h5>
    </div>
    </div>
    ';
                }
                ?>
            </div>
        </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li data-filter=".All">All</li>
                        <?php
                        foreach ($list_category as $category) {
                            extract($category);
                            echo '
                            <li data-filter=".' . $category['name_ct'] . '">' . $category['name_ct'] . '</li>
                            
                         ';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row featured__filter">
            <?php
            foreach ($list_new_2 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix All">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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

            <?php
            foreach ($list_products_fea_1 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix Coffee">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
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

            <?php

            foreach ($list_products_fea_2 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix  CloudFee">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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
            <?php
            foreach ($list_products_fea_3 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix CloudTea">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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
            <?php
            foreach ($list_products_fea_4 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix Tea">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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
            <?php
            foreach ($list_products_fea_5 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix Hi-Tea-Healthy">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                  
                        <li>  <form action="index.php?act=addtocart" method="post">
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
            <?php
            foreach ($list_products_fea_6 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix Bread-Snack">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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
            <?php
            foreach ($list_products_fea_7 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix At-Home">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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
            <?php
            foreach ($list_products_fea_8 as $products) {
                extract($products);
                $link_product = "index.php?act=shop-detail&id_pro=" . $id;

                echo '
                
            <div class="col-lg-3 col-md-4 col-sm-6 mix Other-Drinks">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="upload/' . $products['image'] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="' . $link_product . '"><i class="fa fa-retweet"></i></a></li>
                        <li>  <form action="index.php?act=addtocart" method="post">
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
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <a href="index.php?act=shop-grid"><img src="https://file.hstatic.net/1000075078/file/banner_app_59792ee4e6074b33aca7f140433e9292.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <a href="index.php?act=shop-grid"> <img src="https://file.hstatic.net/1000075078/file/banner_app_59792ee4e6074b33aca7f140433e9292.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php
                            foreach ($latest_top3 as $top3) {
                                extract($top3);
                                echo '
    <a href="#" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:30%;">
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
    <a href="' . $link_product . '" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:30%;">
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
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php
                            foreach ($list_top3 as $top3) {
                                extract($top3);
                                $link_product = "index.php?act=shop-detail&id_pro=" . $id;
                                echo '
    <a href="' . $link_product . '" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:30%;">
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
                            foreach ($list_top3 as $top3) {
                                extract($top3);
                                $link_product = "index.php?act=shop-detail&id_pro=" . $id;
                                echo '
    <a href="' . $link_product . '" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:30%;">
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
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php
                            foreach ($latest_top3 as $top3) {
                                extract($top3);
                                $link_product = "index.php?act=shop-detail&id_pro=" . $id;
                                echo '
    <a href="' . $link_product . '" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:30%;">
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
    <a href="' . $link_product . '" class="latest-product__item">
    <div class="latest-product__item__pic" style="width:30%;">
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
</section>
<!-- Latest Product Section End -->
<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="upload/group/group-7.jpg" alt="" style="height:250px;">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="upload/group/group-4.jpg" alt="" style="height:250px;">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="upload/group/group-5.jpg" alt="" style="height:250px;">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->