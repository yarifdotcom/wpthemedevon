<footer>
	<div class="container-fluid footer-container noMax">
        
        <div class="row p-b-4-em">
            <div class="col col-sm-12 text60">
                <div class="logo-holder svg-logo footer-logo">
                    <a href="<?php echo get_home_url(); ?>" >
                        <div class="established-logo">
                            <?php include( locate_template( 'snippets/logo-established.php', false, false ) ); ?>
                        </div>
                        <?php include( locate_template( 'snippets/logo.php', false, false ) ); ?>
                    </a>
                </div>   
            </div><!-- /col -->    
        </div><!-- /row -->


        <div class="row p-b-0-quarter">
            <div class="col col-sm-3 col-sm-offset-6 text50 ">
                
                
       
                
                
                
                
                
                <!-- Begin Mailchimp Signup Form -->
                <div id="mc_embed_signup">
                    <form action="https://devon.us4.list-manage.com/subscribe/post?u=a2f600b01ff25dee552055c40&amp;id=6e0bcd454a&amp;f_id=003b0ae9f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                        <div id="mc_embed_signup_scroll">
                            <h2>Sign-up to our newsletter</h2>
                            
                            <div class="mc-field-group">
                                <input type="text" value="" name="FNAME" class="required text" id="mce-MMERGE8" required placeholder="Name">
                            </div>                            
                            
                            
                            <div class="mc-field-group">
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required placeholder="Email">
                            </div>
                            
                            <div class="mc-field-group input-group spaceAboveHalfem">
                                <ul>
                                    <li>
                                        <input type="radio" value="Personal" name="MMERGE7" id="mce-MMERGE70" checked>
                                        <label for="mce-MMERGE70" class="weight100">Personal</label>
                                    </li>
                                    <li>
                                        <input type="radio" value="Professional" name="MMERGE7" id="mce-MMERGE71">
                                        <label for="mce-MMERGE71" class="weight100">Professional</label>
                                    </li>
                                </ul>

                            </div>                            

                            

                            
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_a2f600b01ff25dee552055c40_88213331cf" tabindex="-1" value="">
                            </div>


                            <div class="clear">
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                            </div>

                        </div>
                    </form>
                </div>
                <!--End mc_embed_signup-->   
                
                
      
                
                
                
                
            </div><!-- /col -->
        </div><!-- /row -->
        
        <div class="row p-b-0-quarter">
            <div class="col col-sm-6 col-sm-offset-6 text50">
                <?php echo get_field( 'footer_social', 'option' ); ?>
            </div><!-- /col -->
        </div><!-- /row -->        


        <div class="row p-b-0-half">
            <div class="col col-sm-3 col-sm-offset-6 text50 mob-p-b-1-em">
                <?php echo get_field( 'footer_address', 'option' ); ?>
            </div><!-- /col -->

            <div class="col col-sm-3 text50">
                <?php echo get_field( 'footer_links', 'option' ); ?>
            </div><!-- /col -->


        </div><!-- /row -->
        
        
        <div class="row ">
            <div class="col col-sm-6 col-sm-offset-6 text50 copyright-col">
                <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="50px" height="50px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                        <g>
                            <path d="M50,32.7C49.8,43,43,49.8,32.7,50H13.3c-0.1,0-0.2-0.1-0.2-0.2V36.5h19.3c2.2,0,4-1.8,4-4V13.1h13.3c0.1,0,0.2,0.1,0.2,0.2
                                V32.7z M13.1,36.5H0.2c-0.1,0-0.2-0.1-0.2-0.2v-36C0,0.1,0.1,0,0.2,0h36c0.1,0,0.2,0.1,0.2,0.2v12.9H13.1V36.5z"/>
                        </g>
                    </svg></span> © Devon Lifestyle Furniture
            </div><!-- /col -->
        </div><!-- /row -->   
        
        
        
        
        
	</div> <!-- /container -->
</footer>

</div><!-- /contentHolder -->
</div><!-- /#main -->

<?php wp_footer(); ?>

</body>
</html>