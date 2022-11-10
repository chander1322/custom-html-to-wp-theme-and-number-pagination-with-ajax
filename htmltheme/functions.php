<?php 
add_action('wp_enqueue_scripts','atach_files_css_js');
    function atach_files_css_js(){
        wp_enqueue_style('style',get_stylesheet_uri());
        wp_enqueue_script('jsfile',get_template_directory_uri(). "/assets/js/custom_script.js");
        wp_enqueue_script('jquery',get_template_directory_uri(). "/assets/js/jquery_cdn.js");
        wp_enqueue_script('customjs',get_template_directory_uri(). "/custom.js");
        // ajax
       
            wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );
            wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
   
         }
function custom_theme_support(){
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('home-featured',680,400,array('center','center'));
    add_image_size('single-img',680,550,array('center','center'));
    add_theme_support('automatic-feed-links');
    register_nav_menus(
        array(
          'primary' => __( 'Primary Menu','html_wp_theme' ),
        
         )
        );
}
add_action( 'after_setup_theme', 'custom_theme_support' );

// footer & Widget
function footer_widget(){
    register_sidebar(array(
        'name' =>__('Primary Sidebar','html_wp_theme'),
        'id' => 'main-sidebar',
        'description' =>'main sidebar',
        'before_widget' =>'<li id="%1$s" class="widget %2$s">',
        'after_widget' =>'</li>',
        'before_title' =>'<h2 class="widgettitle">',
        'after_title' =>'</h2>'
    ));
    register_sidebar(array(
        'name' =>__('Footer Widget 1','html_wp_theme'),
        'id' => 'footer-1',
        'description' =>'widget area foooter',
        'before_widget' =>'<li id="%1$s" class="widget %2$s">',
        'after_widget' =>'</li>',
        'before_title' =>'<h2 class="widgettitle">',
        'after_title' =>'</h2>'
    ));
    register_sidebar(array(
        'name' =>__('Footer Widget 2','html_wp_theme'),
        'id' => 'footer-2',
        'description' =>'widget area foooter',
        'before_widget' =>'<li id="%1$s" class="widget %2$s">',
        'after_widget' =>'</li>',
        'before_title' =>'<h2 class="widgettitle">',
        'after_title' =>'</h2>'
    ));
    register_sidebar(array(
        'name' =>__('Footer Widget 3','html_wp_theme'),
        'id' => 'footer-3',
        'description' =>'widget area foooter',
        'before_widget' =>'<li id="%1$s" class="widget %2$s">',
        'after_widget' =>'</li>',
        'before_title' =>'<h2 class="widgettitle">',
        'after_title' =>'</h2>'
    ));
    register_sidebar(array(
        'name' =>__('Footer Widget 4','html_wp_theme'),
        'id' => 'footer-4',
        'description' =>'widget area foooter',
        'before_widget' =>'<li id="%1$s" class="widget %2$s">',
        'after_widget' =>'</li>',
        'before_title' =>'<h2 class="widgettitle">',
        'after_title' =>'</h2>'
    ));
    
}
add_action('widgets_init', 'footer_widget');
?>
<!-- pagination function with ajax -->
<?php
// onchange data of category_post_data and hit ajax to here
 add_action( 'wp_ajax_nopriv_category_post_data', 'category_post_data' );
 add_action( 'wp_ajax_category_post_data', 'category_post_data' );
  function category_post_data(){?>
    <div class="container"><?php
    $cat_id=$_POST['category_id']; // get cat id
    $paged  = !empty($_POST["page"]) ? $_POST["page"] : "";  //get page number from ajax 
     $arg_post=array(
     'post_type'=>'post',
     'paged'=>$paged,
     'posts_per_page' => 3,
     'post_status' => 'publish',
     'cat' => $cat_id
   );
   $posts=new WP_Query($arg_post);
   if($posts->have_posts()){
    ?>

<div class="row postdata">
    <?php
   while($posts->have_posts()){
     $posts->the_post();?>
     <div class=" col-md-4 card" style="width: 18rem;">
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
   <?php wp_reset_postdata(); 
    ?>
</div><?php
    }?></div>
    <?php
    die();
}
//html of template file and make shortcode
add_shortcode('category_listing','first_cat_data');
function first_cat_data(){?>
    <label>Select the Categories</label>
      <!-- <button class="form-control post_category" id="button_cat">tested</button> -->
    <select class="form-control post_category" id="select_cat">
    <?php
        $categories = get_categories();
        foreach($categories as $category) {
        $data_id=$category->term_id;
        ?>
            <option class='all_category select_option' data-cat_id="<?php echo $data_id;?>" value='<?php echo $category->name ?>'><a href="<?php get_category_link($category->term_id)?>"><?php echo $category->name ?></a></option>
        <?php
        }
    ?>
    </select><br><?php 
}
//show code in frontend using shortcode
add_shortcode('posts','row_data_post');
function row_data_post(){?>
    <div class="container">
        <?php
            $arg_post=array(
            'post_type'=>'post',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'cat' =>9
            );
         
            $posts=new WP_Query($arg_post);
        if($posts->have_posts()){?>
            <div class="loader" style="display:none"></div>
            <div class="row postdata"><?php
                while($posts->have_posts()){
                $posts->the_post();?>
                <div class=" col-md-4 card" style="width: 18rem;">
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
                wp_reset_postdata();
                ?>
            </div>
        <?php    
    }
    //function for showing PAGINATION
 
        if (function_exists("post_pagination")) {
            post_pagination($posts->max_num_pages); 
        }
    ?>
    </div>
    <?php 
}
//end short code

//pagination fucntion for main page
function post_pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
    global $paged;
    // print_r($paged);
    //$pagnation_link = site_url().'/page/'.$i;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $posts;
        // print_r($posts);
        $pages = $posts->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        echo "<nav aria-label='Page navigation example' class='main_pagenation'>  <ul class='pagination'> <h5>Page ".$paged." of ".$pages."</h5>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class=\"page-item active\"  id=\"page-item-".$i."\"><a href='#' class='page-link' data-page_id=".$i.">".$i."</a></li>":"<li class='page-item'  id=\"page-item-".$i."\"> <a href='#' class=\"page-link\" data-page_id=".$i.">".$i."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo " <li class='page-item' data-page_id=".$i." id=\"page-item-".$i."\"><a class='page-link' href='#'><i class='flaticon flaticon-back'></i></a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item' data-page_id=".$i." id=\"page-item-".$i."\"><a class='page-link' href='#'><i class='flaticon flaticon-arrow'></i></a></li>";
        echo "</ul></nav>\n";
    }
}
?>