<?php 
/*template name: archive */
get_header();
?>
<div class="container">
<section class="w3l-homeblock3 py-5">
  <div class="row">
  <?php  
    $arg_post=array(
      'post_type'=>'post',
      'post_per_page'=>3
    );
    $posts=new WP_Query($arg_post);
    while($posts->have_posts()){
      $posts->the_post();?>
      <div class=" col-md-4 card" style="width: 18rem; height:auto;">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <h5 class="card-title"> <a href="<?php the_permalink(); ?>"><?php the_title()?></a></h5>
        <h6><?php the_date()?> / <?php echo get_comments_number()?></h6>
        <p class="card-text"><?php the_excerpt()?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
      <?php
    }
  ?>
  
</div>
</section>
</div>
<?php
get_footer();
?>