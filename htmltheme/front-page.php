<?php 
/*template name: Home */
get_header();?>
<!-- banner main-slider -->
<section>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<div class="container">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php
        $arg_post=array(
          'post_type'=>'post',
          'post_per_page'=>3
        );
        $posts=new WP_Query($arg_post);
        while($posts->have_posts()){
            $id=$posts->ID;
            $image=get_the_post_thumbnail_url($id);
            $posts->the_post();?>
            <div class="item <?php if($posts->current_post==0){echo'active';}?>">
            <img src="<?php echo $image;?>" alt="Los Angeles" style="width:100%;height:500px"> </div>
            
        <?php } 
      ?>
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
</section>
<!-- home slider-2 -->
<section class="w3l-main-slider" id="home">
     <div class="companies20-content">
         <div class="owl-one owl-carousel owl-theme">
             <div class="item">
                 <li>
                     <div class="slider-info  banner-view banner-top1 bg bg2">
                         <div class="banner-info">
                             <div class="container">
                                 <div class="banner-info-bg">
                                     <h5>Best Home Decoration agency. The best Interior Solution</h5>
                                     <a class="btn btn-style btn-primary mt-sm-5 mt-4" href="#services"> Our
                                         Services</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </li>
             </div>
             
             <div class="item">
                 <li>
                     <div class="slider-info banner-view banner-top3 bg bg2">
                         <div class="banner-info">
                             <div class="container">
                                 <div class="banner-info-bg">
                                     <h5>Get your Personalized interior & Home design services</h5>
                                     <a class="btn btn-style btn-primary mt-sm-5 mt-4" href="services.html"> Our
                                         Services</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </li>
             </div>
         </div>
     </div>
 </section>
 <!-- // banner main-slider -->

<!-- home page block1 -->
<section id="services" class="home-services py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="box-wrap">
          <div class="icon">
            <span class="fa fa-pencil-square-o"></span>
          </div>
          <h4><a href="#url">Stylish Home decor</a></h4>
          <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
            doloret quas saepe autem, dolor set.</p>
          <a href="#read" class="read">Read more</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
        <div class="box-wrap">
          <div class="icon">
            <span class="fa fa-shower"></span>
          </div>
          <h4><a href="#url">Interior Decor</a></h4>
          <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
            doloret quas saepe autem, dolor set.</p>
          <a href="#read" class="read">Read more</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
        <div class="box-wrap">
          <div class="icon">
            <span class="fa fa-bed"></span>
          </div>
          <h4><a href="#url">Home Decoration</a></h4>
          <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
            doloret quas saepe autem, dolor set.</p>
          <a href="#read" class="read">Read more</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- //home page block1 -->

 <!-- home page block2 grids -->
  <section class="w3l-grids-3 py-md-5 pb-5" id="about">
    <div class="container py-lg-5 py-md-3">
      <div class="row bottom-ab-grids">

        <div class="col-lg-6 bottom-ab-left">
          <!-- <h6 class="title-small">About Our Company</h6> -->
          <h3 class="title-big mb-4">We are very proud of the service we provide and stand by every product we carry.</h3>
          <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hic odio voluptatem
            tenetur consequatur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. </p>
          <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4">Read More</a>
        </div>
        <div class="col-lg-6 img-grids mt-lg-0 mt-5 pl-lg-4">
            <img src="assets/images/p1.jpg" alt="" class="img-fluid radius-image" />
            <img src="assets/images/p2.jpg" alt="" class="img-fluid radius-image" />
            <img src="assets/images/p3.jpg" alt="" class="img-fluid radius-image" />
            <img src="assets/images/p4.jpg" alt="" class="img-fluid radius-image" />
            <img src="assets/images/p5.jpg" alt="" class="img-fluid radius-image" />
            <img src="assets/images/p6.jpg" alt="" class="img-fluid radius-image" />
        </div>

      </div>
    </div>
  </section>
  <!-- //home page block2 grids -->
  
<!-- home page block3 -->
<section class="w3l-aboutblock py-5" id="about">
    <div class="midd-w3">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6 align-self">
                    <h3 class="title-big">What makes us different?</h3>
                    <p class="mt-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Non quae, fugiat ad libero ut justo lorem dolor.</p>
                    <ol class="w3l-right mt-lg-5 mt-4">
                        <li>Wall painting designs</li>
                        <li>Interior design Solutions</li>
                        <li>Personalized design services</li>
                        <li>Interior Decoration</li>
                        <li>Home Decorating</li>
                        <li>Stylish living home</li>
                    </ol>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4">
                    <div class="position-relative">
                        <img src="assets/images/s1.jpg" alt="" class="img-fluid">
                        <a href="#small-dialog" class="popup-with-zoom-anim play-view text-center position-absolute">
                            <span class="video-play-icon">
                                <span class="fa fa-play"></span>
                            </span>
                        </a>
                        <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                            <iframe src="https://www.youtube.com/embed/v3B8DWbTkaM" allow="autoplay; fullscreen"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // home page block3 -->

<!-- category filter and post -->
<?php echo do_shortcode("[category_listing]"); ?>
<?php echo do_shortcode("[posts]"); ?>


<!-- home page block4 -->
<section class="w3l-homeblock3 py-5">
    <div class="container py-lg-5 py-md-4">
        <div class="row">
            <div class="col-lg-6 ">
                <img src="assets/images/s2.jpg" class="img-fluid radius-image" alt="">
            </div>
            <div class="col-lg-6 align-self mt-lg-0 mt-4">
                <div class="row mb-sm-4 mb-2 pb-3">
                    <div class="col-sm-3 col-4">
                        <span>125</span>
                        <h4>Designers</h4>
                    </div>
                    <div class="col-sm-3 col-4">
                        <span>350+</span>
                        <h4>Projects</h4>
                    </div>
                    <div class="col-sm-3 col-4">
                        <span>1200+</span>
                        <h4>Clients</h4>
                    </div>
                </div>
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi voluptatibus repellat
                    voluptate nobis praesentium inventore est cupiditate labore exercitationem adipisci consequuntur
                    corrupti tenetur, omnis ratione cumque.</p>
                <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4">Read More</a>
            </div>
        </div>
    </div>
</section>
<!-- //home page block4 -->

<!-- home page block5 -->
<div class="w3l-homeblock4 py-5" id="quote">
    <div class="container py-xl-5 py-lg-3">
        <div class="welcome-left text-center py-md-5 py-3">
            <h3>Let your designer find the right pieces for you, your space and budget. Give us a call or get in touch!</h3>
            <a href="about.html" class="btn btn-style transparent-btn mt-sm-5 mt-4 mr-2">Read More</a>
            <a href="contact.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Contact Us</a>
        </div>
    </div>
</div>
<!-- //home page block5 -->

<!-- home page block6 -->
<section class="w3l-bottom py-5">
  <div class="container py-md-4 py-3 text-center">
    <div class="row">
      <div class="col-lg-9 col-md-10 mx-auto">
        <div class="subscribe mx-auto">
          <div class="header-section text-center mx-auto">
            <h3 class="title-big">Stay Updated! </h3>
            <p class="my-3"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
              Nulla mollis dapibus nunc, ut rhoncus turpis sodales quis.</p>
          </div>
          <form action="#" method="post" class="subscribe-wthree pt-2 mt-md-5">
            <div class="d-md-flex flex-wrap subscribe-wthree-field">
              <input class="form-control" type="email" placeholder="Enter your email..." name="email" required="">
              <button class="btn btn-style btn-primary" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- //home page block6 -->

<?php 

get_footer();?>