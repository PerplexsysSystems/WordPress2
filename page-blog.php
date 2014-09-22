<?php get_header();?>
<?php
    $options = get_option('sample_theme_options');
?>
<?php 
          $items = wp_get_nav_menu_items('Menu 1'); 
          
          ?> 
<div class="container">
          <div class="row">
              <div class="pull-left" style="position: relative; z-index: 99;">
                  <a href="<?php echo $items[0]->url;?>" style=" color:#f86924; outline: medium none; text-decoration: none;">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $options['logopath'];?>" style="width: 350px; border: 0 none; height: auto; max-height: 100%; vertical-align: middle;"/>
                  </a>
              </div>
              
              <div class="pull-right">
                  <nav style="">
                      <ul class="topnavul" style="line-height: 1; list-style: none; margin: 0; padding:0;">
                          <li style="font-size:48px; text-align: center;">
                              <a class="topnavbtn topnavbtn0" style="color: #1e8bc3;" href="<?php echo $items[0]->url;?>">
                                  <div>
                                      <span class="fa <?php echo $items[0]->attr_title;?> fa-lg"></span>
                                      <br/>
                                      <span style="font-size: 16px; text-decoration: none;"><?php echo $items[0]->title;?></span>
                                  </div>
                              </a>
                          </li>
                          <li style="font-size:48px; text-align: center;">
                              <a class="topnavbtn topnavbtn1" style="color: #f86924;" href="<?php echo $items[1]->url;?>">
                                  <div>
                                      <span class="fa <?php echo $items[1]->attr_title;?> fa-lg"></span>
                                      <br/>
                                      <span style="font-size: 16px; text-decoration: none;"><?php echo $items[1]->title;?></span>
                                  </div>
                              </a>
                          </li>
                          <li style="font-size:48px; text-align: center;">
                              <a class="topnavbtn topnavbtn2" style="color: #ff9f00;" href="<?php echo $items[2]->url;?>">
                                  <div>
                                      <span class="fa <?php echo $items[2]->attr_title;?> fa-lg"></span>
                                      <br/>
                                      <span style="font-size: 16px; text-decoration: none;"><?php echo $items[2]->title;?></span>
                                  </div>
                              </a>
                          </li>
                          <li style="font-size:48px; text-align: center;">
                              <a class="topnavbtn topnavbtn3" style="color: #35bc7a;" href="<?php echo $items[3]->url;?>">
                                  <div>
                                      <span class="fa <?php echo $items[3]->attr_title;?> fa-lg"></span>
                                      <br/>
                                      <span style="font-size: 16px; text-decoration: none;"><?php echo $items[3]->title;?></span>
                                  </div>
                              </a>
                          </li>
                          <li style="font-size:48px; text-align: center;">
                              <a class="topnavbtn topnavbtn4" style="color: #f05a49;" href="<?php echo $items[4]->url;?>">
                                  <div>
                                      <span class="fa <?php echo $items[4]->attr_title;?> fa-lg"></span>
                                      <br/>
                                      <span style="font-size: 16px; text-decoration: none;"><?php echo $items[4]->title;?></span>
                                  </div>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          <div class="row" style="margin-top:20px; margin-bottom: 20px; background-color: #fff;">
              <div class="contentbox" style="background-color: #fff; padding:16px 30px 32px;">
                  <style>
                      .attachment-50x50{
                          width:50px;
                      }
                  </style>
                  <ul style="list-style: none;">
                      <?php
                        $args = array( 'category_name' => 'Blog' );

                        $myposts = get_posts( $args );
                        $counter=0;
                        foreach ( $myposts as $post ) : setup_postdata( $post );
                        $title = $post->post_title;
                        if(strlen($title) > 23)
                        {
                            $title = substr($title,0,19).' ...';
                        }
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                        $date = date('M d,Y',strtotime($post->post_modified));
                        $id = get_the_ID();
                        $excerpt = $post->post_excerpt;
                        if(strlen($excerpt) > 40)
                        {
                            $excerpt = substr($excerpt,0,37) . '...';
                        }
                            ?>
                      <li style="display:inline-block; margin-left: 20px; float:left;">
                      <div class="thumbnail" style="max-width: 330px; min-height: 200px;">
                      <div class="pull-left thumbnail">
                          <?php
                          if(has_post_thumbnail())
                            {
                                the_post_thumbnail('50x50');
                            }
                            else
                            {
                                ?>
                                <img class="attachment-thumbnail wp-post-image" style="width: 50px;" src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg">    
                                <?php
                            }
                          ?>
                      </div>
                      <div style="min-height:151px; padding-left: 70px;">
                          <h6><?php the_time('l j F Y');?></h6>
                          <h3><?php echo $title;?></h3>
                          <p><?php the_excerpt();?></p>
                          <a href="#" class="btn btn-success"><span class="fa fa-arrow-right" style="display:inline-block; margin-right: 10px;"></span>Read More</a>
                      </div>
                  </div>
                      </li>
                            <?php
                            $counter = $counter + 1;
                        endforeach; 
                        wp_reset_postdata();?>
                  </ul>
              </div>
          </div>
      </div>
        <?php get_footer();?>
