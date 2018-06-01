<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Holo2go
 * @since Holo2go 1.0
 */
?>

</div>
<section class="p-5 footer-subcription-div">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-6 text-right"><h2>Stay up to date with Holo2go</h2></div>
        <div class="col-md-6 col-lg-6 subs-button"><button id="open_footer_form">SUBSCRIBE</button></div>
        <!-- The Modal -->
        <div id="subcription-model" class="subcription-model-div">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <div class="formoffooter"><?php echo do_shortcode("[gravityform id=1 title=false description=false ajax=true]"); ?></div>
          </div>

        </div>
    </div>
</section>
<footer class="p-5 site-footer">
    <div class="footer-bottom"></div>
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-xl">
                <?php wp_nav_menu( array(
                        'menu'        => 'Footer Menu',
                        'menu_class'  => 'navbar-nav'
                    ) ); ?>
            </nav>
        </div>
        <div class="row justify-content-center">
            <?php dynamic_sidebar("footer_social_links"); ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready( function() {
        jQuery('#testimonial_div.carousel').carousel({
            
        });
        jQuery('.video_slider .carousel').carousel({
            
        });
		jQuery('.price-card-slider-content.carousel').carousel({
            
        });
        // Get the modal
        var modal = document.getElementById('subcription-model');

        // Get the button that opens the modal
        var btn = document.getElementById("open_footer_form");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
</body>
</html>
