<?php
    $options = get_option('sample_theme_options');
?>
<footer style="width:100%;">
          <div style="background-color: #3c474d;">
              <div class="container">
              <div class="row">
                  <div class="col-lg-3">
                      <h4 style="color:#fff;">About Us</h4>
                      <div style="padding-right:26px; color: #b6bcc2; font-size: 13px; line-height: 20px;">
                          <?php echo $options['aboutus'];?>
                      </div>
                  </div>
                  <div class="col-lg-3">
                      <h4>Popular Topics</h4>
                      <?php
                      $args = array( 
                                'smallest' => 10, 
                                'largest' => 22,
                                'unit' => 'px',
                                'number' => 15,  
                                'format' => 'array',
                                
                        );
                      ?><div class="tagcloud"><?php
                      if(!wp_tag_cloud())
                      {
                          
                      }
                      else
                      {
                          $tags = wp_tag_cloud( $args );
                      ?>
                      
                          <?php
                            foreach($tags as $tag)
                            {
                                echo $tag;
                            }
                      }
                          ?>
                          
<!--                          <a href="#">Bibend</a>
                          <a href="#">Bidendum</a>
                          <a href="#">Curabitur</a>
                          <a href="#">Loemips</a>
                          <a href="#">Lorem</a>
                          <a href="#">Masa</a>
                          <a href="#">Neque</a>
                          <a href="#">Remorem</a>
                          <a href="#">Tellus</a>-->
                      </div>
                  </div>
                  <div class="col-lg-3">
                      <h4>Recent News</h4>
                      <div>
                          <ul style="list-style:none;margin:0; padding: 0;">
                              <li>
                                  <div class="fa fa-newspaper-o" style="border-color:#fff; color:#fff;border-style: solid; border-radius: 20px; border-width: 0px; height: 20px; width: 20px;line-height: 20px; display:inline-block; padding-left:3px; vertical-align: middle;">
                                    
                                  </div>
                                  <a href="#" style="font-size:13px;margin-left:8px;color:#f86924;">Duis sed odio sit amet nibh vulputate.</a>
                                  <span style="display:block; margin-left: 38px; font-size: 11px;"><i>Sept. 19, 2014 </i></span>
                                  <span style="display:block; margin-left: 10px; font-size: 11px;">quis bibendum auctor, nisi elit consequat ipsum...</span>
                              </li>
                              <li>
                                  <div class="fa fa-newspaper-o" style="border-color:#fff; color:#fff;border-style: solid; border-radius: 20px; border-width: 0px; height: 20px; width: 20px;line-height: 20px; display:inline-block; padding-left:3px; vertical-align: middle;">
                                    
                                  </div>
                                  <a href="#" style="font-size:13px;margin-left:8px;color:#f86924;">Duis sed odio sit amet nibh vulputate.</a>
                                  <span style="display:block; margin-left: 38px; font-size: 11px;"><i>Sept. 19, 2014 </i></span>
                                  <span style="display:block; margin-left: 10px; font-size: 11px;">quis bibendum auctor, nisi elit consequat ipsum...</span>
                              </li>
                              <li>
                                  <div class="fa fa-newspaper-o" style="border-color:#fff; color:#fff;border-style: solid; border-radius: 20px; border-width: 0px; height: 20px; width: 20px;line-height: 20px; display:inline-block; padding-left:3px; vertical-align: middle;">
                                    
                                  </div>
                                  <a href="#" style="font-size:13px;margin-left:8px;color:#f86924;">Duis sed odio sit amet nibh vulputate.</a>
                                  <span style="display:block; margin-left: 38px; font-size: 11px;"><i>Sept. 19, 2014 </i></span>
                                  <span style="display:block; margin-left: 10px; font-size: 11px;">quis bibendum auctor, nisi elit consequat ipsum...</span>
                              </li>
                              <li>
                                  <div class="fa fa-newspaper-o" style="border-color:#fff; color:#fff;border-style: solid; border-radius: 20px; border-width: 0px; height: 20px; width: 20px;line-height: 20px; display:inline-block; padding-left:3px; vertical-align: middle;">
                                    
                                  </div>
                                  <a href="#" style="font-size:13px;margin-left:8px;color:#f86924;">Duis sed odio sit amet nibh vulputate.</a>
                                  <span style="display:block; margin-left: 38px; font-size: 11px;"><i>Sept. 19, 2014 </i></span>
                                  <span style="display:block; margin-left: 10px; font-size: 11px;">quis bibendum auctor, nisi elit consequat ipsum...</span>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3">
                      <h4>Reviews and Whitepapers</h4>
                      <div>
                          <ul style="list-style: none; margin:0; padding: 0;">
                          <?php
                            $args = array( 'posts_per_page' => 4, 'category' => 8 );

                            $myposts = get_posts( $args );
                            foreach ( $myposts as $post ) : setup_postdata( $post );
                            $title = $post->post_title;
                            if(strlen($title) > 25)
                            {
                                $title = substr($title,0,25).' ...';
                            }
                            $date = date('M d,Y',strtotime($post->post_modified));
                            $excerpt = $post->post_excerpt;
                                ?>
                              <li><span style="display:inline-block; margin-right: 8px;" class="fa fa-file-text"></span><a href="<?php echo $post->guid;?>"><?php echo $title;?></a></li>  
                                <?php
                            endforeach; 
                            wp_reset_postdata();
                        ?>
                          </ul>
                      </div>
                  </div>
              </div>
              </div>
          </div>
          <div style="background-color: #282f33;">
              <div class="container">
                  <div class="row">
                      <span style="color:#fff; font-size:11px; display:block; margin-top:8px; margin-bottom: 8px;">Perplexsys Systems &copy; 2014 | <a href="#">Privacy Policy</a></span>
                  </div>
              </div>
              
          </div>
          </footer>
    <?php wp_footer(); ?>
  </body>
</html>
