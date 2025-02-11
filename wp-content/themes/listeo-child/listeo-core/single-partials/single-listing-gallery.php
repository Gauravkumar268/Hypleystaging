<!-- Content
================================================== -->
<?php $gallery = get_post_meta( $post->ID, '_gallery', true );
    if( !empty($gallery) ){
    	
    	echo '<div id="listeo_gallery_desktop" class="listeo_gallery_main row margin-bottom-0">';
    	    $gallery_count = 0;
            foreach ( (array) $gallery as $attachment_id => $attachment_url ) {

    	        if($gallery_count < 5){
		            $image = wp_get_attachment_image_src( $attachment_id, 'listeo-gallery' );

		            if($gallery_count == 0 || $gallery_count == 1) {
		                echo '<div class="listeo_gallery_img_row">';
		            }

		            if($gallery_count == 0) {
		                echo '<div class="listeo_gallery_first_full_img listeo_gallery_img_'.$gallery_count.'">
		                    <img src="'.$image[0].'"></img>
            		    </div>';
		            }
		            else {
                        echo '<div class="listeo_gallery_grid_img listeo_gallery_img_'.$gallery_count.'">
		                    <img src="'.$image[0].'"></img>';
		                /*if($gallery_count == 4){
		                    echo '<a class="listeo_gallery_show_all_btn_min" href="#listeo_gallery_show_all_photos" class="button listeo_gallery_show_all_btn popup-with-zoom-anim"> Show all photos </a>';
		                }*/
		                echo '</div>';
		            }

                    if($gallery_count == 0 || $gallery_count == 4) {
		                echo '</div>';
		            }

		            
	            }
	            $gallery_count++;
	        }
	        echo '<div class="listeo_gallery_show_all_btn_min"> <a href="#listeo_gallery_show_all_photos" class="button listeo_gallery_show_all_btn popup-with-zoom-anim"> Show all photos </a></div>';
    	echo '</div>';
        
        echo '<div class="listeo_gallery_mobail_main">';
		echo '<div id="listeo_gallery_mobail" class="listing-slider mfp-gallery-container margin-bottom-0" style="display:none;">';
		$gallery_count2 = 0;
		foreach ( (array) $gallery as $attachment_id => $attachment_url ) {
			$image = wp_get_attachment_image_src( $attachment_id, 'listeo-gallery' );
			echo '<a href="'.esc_url($image[0]).'" data-background-image="'.esc_attr($image[0]).'" class="item mfp-gallery"></a>';
		    $gallery_count2++;
		}
		echo '</div>';
        if($gallery_count2 > 2){
		    echo '<div style="display:none;" class="listeo_gallery_count_photos"> <span class="listeo_gallery_currentslide"> 1 </span>/<span> '.$gallery_count2.' </span> </div>';
        }
		echo '</div>';
    
    ?>
    
    <div id="listeo_gallery_show_all_photos" class="zoom-anim-dialog mfp-hide">
		<div class="row margin-bottom-0" style="margin-top: 30px;">
			<?php
			    $gallery_count = 0;
			    foreach ( (array) $gallery as $attachment_id => $attachment_url ) {
                    $image = wp_get_attachment_image_src( $attachment_id, 'listeo-gallery' );
		           
		            if($gallery_count == 0) {
		                echo '<div style="width: 100%; height: 100%; float: left;">
		                    <img width="100%" height="500px" style="object-fit: cover;" src="'.$image[0].'"></img>
            		    </div>';
		            }
		            else {
                        echo '<div style="width: 50%;float: left; padding:5px;">
		                    <img style="object-fit: cover;" width="100%" height="400px" src="'.$image[0].'"></img>
		                </div>';
		            }

		            $gallery_count++;
                }
			?>
		</div>
	</div>
    <?php
    }

?>