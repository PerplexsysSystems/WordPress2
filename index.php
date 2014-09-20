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
              <div id="slide1img" class="pull-left" style="height:420px; background-color: #fff;">
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
              </div>
            <script>
                $slideID=1;
                function NextSlide()
                {
                    switch($slideID)
                    {
                        case 1:
                            $('#slide1img').fadeOut(600, function(){$('#slide2img').fadeIn();});        
                            $('#slide1info').fadeOut(900, function(){$('#slide2info').fadeIn();});
                            
                            $slideID=2;
                            break;
                       case 2:
                            $('#slide2img').fadeOut(600, function(){$('#slide3img').fadeIn();});        
                            $('#slide2info').fadeOut(900, function(){$('#slide3info').fadeIn();});
                            $slideID=3;
                            break;
                       case 3:
                            $('#slide3img').fadeOut(600, function(){$('#slide1img').fadeIn();});        
                            $('#slide3info').fadeOut(900, function(){$('#slide1info').fadeIn();});
                            $slideID=1;
                            break;
                    }
                }
                
                $(document).ready(function(){
                   window.setInterval(NextSlide, 5000);
                });
            </script>
        </div>
          <div class="row" style="margin-top: 20px; color:#fff;">
              <div style="width:370px; float:left; background-color: #35bc7a; padding: 27px 30px 30px 32px; height:328px;">
                  <span class="fa fa-leaf fa-5x"></span>
                  <div>
                      <?php echo $options['cta1'];?>
                  </div>
                  <a href="#" class="pull-right" style="color:#fff; text-decoration: none;"><span class="fa fa-arrow-circle-right fa-3x"></span></a>
              </div>
              <div style="width:370px; float:left; margin-left: 30px; background-color: #f86924; padding: 27px 30px 30px 32px; height:328px;">
                  <span class="fa fa-gears fa-5x"></span>
                  <div>
                      <?php echo $options['cta2'];?>
                  </div>
                  <a href="#" class="pull-right" style="color:#fff; text-decoration: none;"><span class="fa fa-arrow-circle-right fa-3x"></span></a>
              </div>
              <div style="width:370px; float:left; margin-left: 30px; background-color: #ff9f00; padding: 27px 30px 30px 32px; height:328px;">
                  <span class="fa fa-comments-o fa-5x"></span>
                  <div>
                      <?php echo $options['cta3'];?>
                  </div>
                  <a href="#" class="pull-right" style="color:#fff; text-decoration: none;"><span class="fa fa-arrow-circle-right fa-3x"></span></a>
              </div>
          </div>
          <div class="row" style="margin-top:20px; background-color: #fff;">
              
              <div class="contentbox" style="background-color: #fff; padding:16px 30px 32px;">
                    <h2 style="font-weight: 300; margin-bottom: 20px;">Latest Projects</h2>
                    <ul id="projectlist" style="list-style: none; margin:0px; padding: 0px;">
                        <li style="float:left;">                            
                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                    <div class="flipper">
                                            <div class="front">
                                                <h5>Image Format</h5>
                                                <figure class="featured-thumbnail thumbnail">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/project-1-264x248.jpg" alt="Image Format">
                                                </figure>
                                            </div>
                                        <div class="back">
                                            <div class="inner">
                                                <h5>Image Format</h5>
                                                <div class="post_meta">
                                                    <span class="post_date">
                                                        <time datetime="2012-07-23T15:00:01">23 July, 2012</time>
                                                    </span>
                                                </div>
                                                <p class="excerpt">This format perfectly fits in case you need only a single image for your post display. Use Featured image option to add image to the post. Pellentesque habitant... </p><a href="http://livedemo00.template-help.com/wordpress_44910/portfolio-view/image-format/" class="btn btn-primary" title="Image Format">read more</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </li>
                        <li style="float:left;">                            
                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                    <div class="flipper">
                                            <div class="front">
                                                <h5>Image Format</h5>
                                                <figure class="featured-thumbnail thumbnail">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/project-2-264x248.jpg" alt="Image Format">
                                                </figure>
                                            </div>
                                        <div class="back">
                                            <div class="inner">
                                                <h5>Image Format</h5>
                                                <div class="post_meta">
                                                    <span class="post_date">
                                                        <time datetime="2012-07-23T15:00:01">23 July, 2012</time>
                                                    </span>
                                                </div>
                                                <p class="excerpt">This format perfectly fits in case you need only a single image for your post display. Use Featured image option to add image to the post. Pellentesque habitant... </p><a href="http://livedemo00.template-help.com/wordpress_44910/portfolio-view/image-format/" class="btn btn-primary" title="Image Format">read more</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </li>
                        <li style="float:left;">                            
                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                    <div class="flipper">
                                            <div class="front">
                                                <h5>Image Format</h5>
                                                <figure class="featured-thumbnail thumbnail">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/project-3-264x248.jpg" alt="Image Format">
                                                </figure>
                                            </div>
                                        <div class="back">
                                            <div class="inner">
                                                <h5>Image Format</h5>
                                                <div class="post_meta">
                                                    <span class="post_date">
                                                        <time datetime="2012-07-23T15:00:01">23 July, 2012</time>
                                                    </span>
                                                </div>
                                                <p class="excerpt">This format perfectly fits in case you need only a single image for your post display. Use Featured image option to add image to the post. Pellentesque habitant... </p><a href="http://livedemo00.template-help.com/wordpress_44910/portfolio-view/image-format/" class="btn btn-primary" title="Image Format">read more</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </li>
                        <li style="float:left;">                            
                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                    <div class="flipper">
                                            <div class="front">
                                                <h5>Image Format</h5>
                                                <figure class="featured-thumbnail thumbnail">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/project-4-264x248.jpg" alt="Image Format">
                                                </figure>
                                            </div>
                                        <div class="back">
                                            <div class="inner">
                                                <h5>Image Format</h5>
                                                <div class="post_meta">
                                                    <span class="post_date">
                                                        <time datetime="2012-07-23T15:00:01">23 July, 2012</time>
                                                    </span>
                                                </div>
                                                <p class="excerpt">This format perfectly fits in case you need only a single image for your post display. Use Featured image option to add image to the post. Pellentesque habitant... </p><a href="http://livedemo00.template-help.com/wordpress_44910/portfolio-view/image-format/" class="btn btn-primary" title="Image Format">read more</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </li>
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
        <footer style="width:100%;">
          <div style="background-color: #3c474d;">
              <div class="container">
              <div class="row">
                  <div class="col-lg-3">
                      <h4 style="color:#fff;">About Us</h4>
                      <div style="padding-right:26px; color: #b6bcc2; font-size: 13px; line-height: 20px;">
                          <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate.</p>
                      </div>
                  </div>
                  <div class="col-lg-3">
                      <h4>Popular Topics</h4>
                      <div class="tagcloud">
                          <a href="#">Bibend</a>
                          <a href="#">Bidendum</a>
                          <a href="#">Curabitur</a>
                          <a href="#">Loemips</a>
                          <a href="#">Lorem</a>
                          <a href="#">Masa</a>
                          <a href="#">Neque</a>
                          <a href="#">Remorem</a>
                          <a href="#">Tellus</a>
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
                      <h4>Flickr</h4>
                      <div>
                          <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate.</p>
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
