<?php 
get_header();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="md-col-8">
            <div class="img"style="text-align:center;margin-top:30px">
                <?php the_post_thumbnail();?>
            </div>
            <div class="title">
            <h3><?php the_title();?></h3>
            </div>
            <div class="title">
                <?php the_date();?>/<?php echo get_comments_number();?>
                
            </div>
            <div class="description">
                <?php the_content();?>
            </div><br><br>
        </div>
       <?php get_sidebar();?><br><br><br><br>
    </div>
    </div>
</body>
</html><?PHP
get_footer();
?>