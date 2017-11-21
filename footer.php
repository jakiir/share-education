<div id="footer-copyright" style="position: relative;">

                        <div class="footernav">

						<?php wp_nav_menu( array( 'menu' => 'footermenu','menu_id' =>'topnav') );  ?>



						</div>

            

            

				<div class="cp_text">

                    Copyright &copy;2014 by SHARE EDUCATION. <span> All rights reserved. </span>
                        
                </div>
                <div style="width: 220px; height: 60px; position: absolute; right: 14px; bottom: 34px;">
                <?php dynamic_sidebar( 'footer_widgets' ); ?>
                </div>
			</div><!-- end footer-copyright -->

		</div> <!-- end wrapper-footer -shadowline-->

	</div> <!-- end wrapper-footer -->

         </div>

                        </div>

	<script type="text/javascript"> Cufon.now(); </script> <!-- to fix cufon problems in IE browser -->

	<script type="text/javascript">$('#noscript').remove();</script><!-- if javascript disable -->

        <?php wp_footer();?>

</body>



</html>
