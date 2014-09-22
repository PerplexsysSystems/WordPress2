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
          <div class="row" style="margin-top:20px;">
          <!--slider-->
          <?php
        $args = array('category' => 9 );

                            $myposts = get_posts( $args );
                            $maxcounter=0;
                            $counter=0;
                            $scripts='';
                            foreach ( $myposts as $post ) : setup_postdata( $post );
                                $maxcounter = $maxcounter + 1;
                            endforeach; 
                            wp_reset_postdata();
                            
                            foreach ( $myposts as $post ) : setup_postdata( $post );
                            $title = $post->post_title;
                            if(strlen($title) > 27)
                            {
                                $title = substr($title,0,27).' ...';
                            }
                            $date = date('M d,Y',strtotime($post->post_modified));
                            $id = get_the_ID();
                            $subtitle = get_post_custom_values('Slider - Sub Title');
                            $excerpt = $post->post_excerpt;
                            $visibility = 'display: block;';
                            if($counter > 0)
                            {
                                $visibility = 'display: none;';
                            }
                                ?>
                                    <div id="slide<?php echo $counter;?>-img" class="pull-left" style="height:420px; width: 800px; overflow: hidden; background-color: #fff;<?php echo $visibility;?>">
                                        <?php
                                            if(has_post_thumbnail())
                                            {
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                                ?>
                                                <img src="<?php echo $image[0];?>" style="">
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" style="">    
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div id="slide<?php echo $counter;?>-info" class="pull-right" style="width: 370px; height: 420px; padding-top: 51px; padding-left:31px; padding-right: 30px; background-color: white;<?php echo $visibility;?>">
                                        <h4 style="height: 24px;"><i class="fa fa-arrow-circle-right" style="color:#e5e5e5; font-size:24px; line-height: 24px; margin-right: 9px;"></i><?php echo $title;?></h4>
                                        <h2><?php echo $subtitle[0];?></h2>
                                        <p><?php echo $excerpt;?></p>
                                        <a href="<?php echo $post->guid;?>" class="btn btn-primary btn-large">Read More</a>                 
                                    </div>
                                <?php
                                $counter = $counter + 1;
                                $next_counter = $counter;
                                $prev_counter = $counter -1;
                                $slideID = '$slideID=' . $counter;
                                $l1 = '{';
                                $l2 = '$';
                                if($counter == $maxcounter)
                                {
                                    $slideID = '$slideID=0';
                                    $next_counter = '0';
                                }
                                $scripts = $scripts . <<<EOF
case $prev_counter:
    $('#slide$prev_counter-img').fadeOut(600, function()$l1$('#slide$next_counter-img').fadeIn();});        
    $('#slide$prev_counter-info').fadeOut(900, function()$l1$('#slide$next_counter-info').fadeIn();});

    $slideID;
    break;                                      
EOF;
                            endforeach; 
                            wp_reset_postdata();?>
<!--              <div id="slide1img" class="pull-left" style="height:420px; background-color: #fff;">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $options['slide1img'];?>"/>
              </div>
              <div id="slide1info" class="pull-right" style="width: 370px; height: 420px; padding-top: 51px; padding-left:31px; padding-right: 30px; background-color: white;">
                <?php echo $options['slide1content'];?>                 
              </div>
          
              <div id="slide2img" class="pull-left" style="height:420px; background-color: #fff; display: none;">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $options['slide2img'];?>"/>
              </div>
              <div id="slide2info" class="pull-right" style="width: 370px; height: 420px; padding-top: 51px; padding-left:31px; padding-right: 30px; background-color: white; display: none;">
                <?php echo $options['slide2content'];?>
              </div>
          
              <div id="slide3img" class="pull-left" style="height:420px; background-color: #fff; display: none;">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $options['slide3img'];?>"/>
              </div>
              <div id="slide3info" class="pull-right" style="width: 370px; height: 420px; padding-top: 51px; padding-left:31px; padding-right: 30px; background-color: white; display: none;">
                <?php echo $options['slide3content'];?>
              </div>-->
            <script>
                $slideID=0;
                function NextSlide()
                {
                    switch($slideID)
                    {
                        <?php echo $scripts;?>
//                        case 1:
//                            $('#slide1img').fadeOut(600, function(){$('#slide2img').fadeIn();});        
//                            $('#slide1info').fadeOut(900, function(){$('#slide2info').fadeIn();});
//                            
//                            $slideID=2;
//                            break;
//                       case 2:
//                            $('#slide2img').fadeOut(600, function(){$('#slide3img').fadeIn();});        
//                            $('#slide2info').fadeOut(900, function(){$('#slide3info').fadeIn();});
//                            $slideID=3;
//                            break;
//                       case 3:
//                            $('#slide3img').fadeOut(600, function(){$('#slide1img').fadeIn();});        
//                            $('#slide3info').fadeOut(900, function(){$('#slide1info').fadeIn();});
//                            $slideID=1;
//                            break;
                    }
                }
                
                $(document).ready(function(){
                   window.setInterval(NextSlide, 5000);
                });
            </script>
        </div>
    <div class="row" style="margin-top: 20px; color:#fff;">
        <?php
        $args = array( 'order' => 'ASC', 'posts_per_page' => 3, 'category' => 7 );

                            $myposts = get_posts( $args );
                            $counter=0;
                            foreach ( $myposts as $post ) : setup_postdata( $post );
                            $title = $post->post_title;
                            if(strlen($title) > 25)
                            {
                                $title = substr($title,0,25).' ...';
                            }
                            $margin_left = "margin-left: 30px;";
                            if($counter == 0)
                            {
                                $margin_left = '';
                            }
                            $date = date('M d,Y',strtotime($post->post_modified));
                            $id = get_the_ID();
                            $color = get_post_custom_values('Call To Action - BG Color');
                            $iconcode = get_post_custom_values('Call To Action - Icon Code');
                            $excerpt = $post->post_excerpt;
                                ?>
                                    <div style="width:370px; float:left; <?php echo $margin_left;?> background-color: <?php echo $color[0];?>; padding: 27px 30px 30px 32px; height:328px;">
                                        <span class="fa <?php echo $iconcode[0];?> fa-5x"></span>
                                        <div>
                                            <h2><?php echo $title;?></h2>
                                            <p><?php echo $excerpt;?></p>
                                        </div>
                                        <a href="<?php echo $post->guid;?>" class="pull-right" style="color:#fff; text-decoration: none;"><span class="fa fa-arrow-circle-right fa-3x"></span></a>
                                    </div>
                                <?php
                                $counter = $counter + 1;
                            endforeach; 
                            wp_reset_postdata();?>
          
          </div>
    
          <div class="row" style="margin-top:20px; background-color: #fff;">
              <div class="contentbox" style="background-color: #fff; padding:16px 30px 32px;">
                    <h2 style="font-weight: 300; margin-bottom: 20px;">Latest Projects</h2>
                    <ul id="projectlist" style="list-style: none; margin:0px; padding: 0px;">
                        <?php
                            $args = array( 'posts_per_page' => 4, 'category' => 3 );

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
                                    <li style="float:left;">                            
                                        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                        <div class="front">
                                                            <h5><?php echo $title;?></h5>
                                                            <figure class="featured-thumbnail thumbnail">
                                                                <?php
                                                                    if(has_post_thumbnail())
                                                                    {
                                                                        the_post_thumbnail();
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="Image Format">    
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </figure>
                                                        </div>
                                                    <div class="back">
                                                        <div class="inner">
                                                            <h5><?php echo $title;?></h5>
                                                            <div class="post_meta">
                                                                <span class="post_date">
                                                                    <time datetime="<?php echo $date;?>"><?php echo $date;?></time>
                                                                </span>
                                                            </div>
                                                            <p class="excerpt"><?php echo $excerpt;?></p><a href="<?php echo $post->guid;?>" class="btn btn-primary" title="Image Format">read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </li>
                                <?php
                            endforeach; 
                            wp_reset_postdata();
                        ?>
                    </ul>
              </div>
              
          </div>
          <div class="row" style="margin-top:20px;">
              <div style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/img.jpg)" class="content_box alt">
                <h2>Professional Management Skills</h2>
                <ul class="recent-posts skills unstyled">
                    <li class="recent-posts_li green fa fa-cloud-download">
                        <h5 style="font-size: 20px; font-weight: 400;">
                            <a title="Lorem ipsum dolor sit" href="http://livedemo00.template-help.com/wordpress_44910/skills-view/lorem-ipsum-dolor-sit/">Lorem ipsum dolor sit</a>
                        </h5>
                        <div class="excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae dui ligula.
                        </div>
                        <div class="clear">
                            
                        </div>
                    </li> 
                    <li class="recent-posts_li blue fa fa-flask">
                        <h5 style="font-size: 20px; font-weight: 400;">
                            <a title="Etiam eget porttitor enim" href="http://livedemo00.template-help.com/wordpress_44910/skills-view/etiam-eget-porttitor-enim/">Etiam eget porttitor enim</a>
                        </h5>
                        <div class="excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae dui ligula.
                        </div>
                        <div class="clear">
                            
                        </div>
                    </li> 
                    <li class="recent-posts_li red fa fa-flag-o">
                        <h5 style="font-size: 20px; font-weight: 400;">
                            <a title="Fusce egestas ultricies" href="http://livedemo00.template-help.com/wordpress_44910/skills-view/fusce-egestas-ultricies/">Fusce egestas ultricies</a>
                        </h5>
                        <div class="excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae dui ligula.
                        </div>
                        <div class="clear">
                            
                        </div>
                    </li> 
                    <li class="recent-posts_li orange nomargin fa fa-lightbulb-o">
                        <h5 style="font-size: 20px; font-weight: 400;">
                            <a title="Donec convallis arcu id lectus" href="http://livedemo00.template-help.com/wordpress_44910/skills-view/donec-convallis-arcu-id-lectus/">Donec convallis arcu id lectus</a>
                        </h5>
                        <div class="excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae dui ligula.
                        </div>
                        <div class="clear">
                            
                        </div>
                    </li> 
                </ul> 
              </div>
          </div>
          
      </div>
        <?php get_footer();?>
