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
        <div class="row" style="margin-top:20px; background-color: #fff;">
            <div class="contentbox" style="background-color: #fff; padding:16px 30px 32px;">
                <?php
                
                 $queried_object = get_queried_object();
                
                ?>
                <h3><?php echo $queried_object->name;?></h3>
            </div>
        </div>
          <div class="row" style="margin-top:20px; margin-bottom: 20px; background-color: #fff;">
              <div class="contentbox" style="background-color: #fff; padding:16px 30px 32px;">
                    <?php
                    
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                    ?>
                  <div class="row">
                      <style>
                          .categoryBox
                          {
                              
                          }
                      </style>
                      <div class="thumbnail">
                      <div class="pull-left">
                          <?php
                          if(has_post_thumbnail())
                            {
                                the_post_thumbnail('thumbnail');
                            }
                            else
                            {
                                ?>
                                <img style="height: 150px;" src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg">    
                                <?php
                            }
                          ?>
                      </div>
                      <div style="min-height:132px; padding-left: 185px;">
                          <h3><?php the_title();?></h3>
                          <p><?php the_excerpt();?></p>
                          <a href="#" class="btn btn-success pull-right"><span class="fa fa-arrow-right" style="display:inline-block; margin-right: 10px;"></span>Read More</a>
                      </div>
                  </div>
                  </div>
                    <?php
                        endwhile;
                    endif;
                    
                    ?>
              </div>
          </div>
      </div>
        <?php get_footer();?>
