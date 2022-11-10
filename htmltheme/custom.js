
jQuery(document).ready(function(){
    //function for ajax
    jQuery('nav.category_pagenation').hide();
        function category_data(category_id,page){
            jQuery.ajax({
                type:'post',
                dataType:'html',
                url:my_ajax_object.ajax_url,
                data:{ 
                    action:'category_post_data',
                    category_id:category_id,
                    page:page
                },
                beforeSend: function() {
                    jQuery(".postdata").css('opacity','0.2');
                 },
                success:function(response){
                // jQuery('.loader').show();
                jQuery(".postdata").css('opacity','1');
                    jQuery('.postdata').html(' ');
                    jQuery('.postdata').html(response);
                } 
            });

        }//end function for ajax
        //for click number pagination
        jQuery('.main_pagenation ul li a').click(function(e){
            e.preventDefault();
            
            var page=jQuery(this).attr('data-page_id');   //get page number value onclick
            var category_id=jQuery("#select_cat option:first").attr('data-cat_id');  //get first category id form select dropdown onclick
            // jQuery('nav.category_pagenation').css('display','none');
            jQuery('.main_pagenation ul li').removeClass('active');
            jQuery(this).parent().addClass('active');

            category_data(category_id,page); //call to ajax fucntion
          
    });
//for on change cetegory data
        jQuery('#select_cat').on('change',function(){
            var category_id=jQuery('#select_cat option:selected').attr('data-cat_id');
            var page=jQuery('.main_pagenation ul li a').attr('data-page_id');
            jQuery('.main_pagenation ul li.active').removeClass('active');
            jQuery('.main_pagenation ul li:first').addClass('active');

            jQuery('.main_pagenation').show();
            category_data(category_id);
        }); 
 });