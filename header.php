<?php
    $options = get_option('sample_theme_options');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/fa/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.quickflip.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/rotate3Di.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-css-transform.js"></script>
    <?php wp_head(); ?>
  </head>
  <body>
      <div class="container">
          <div class="row" style="font-size:11px;">
              <div style="background-color:#ffffff; margin:0 -100% 20px;padding:9px 100%;">
                <ul style="list-style: none;line-height: 26px;">
                    <li style="display:inline;">
                        <span><span class="fa fa-map-marker fa-lg fabutton"></span><?php echo $options['pobox'];?></span>
                    </li>
                    <li style="display:inline; margin-left: 15px;">
                        <span><span class="fa fa-phone fa-lg fabutton"></span><?php echo $options['phonenumber'];?></span>
                    </li>
                    <li style="display:inline; margin-left: 15px;">
                        <span><span class="fa fa-envelope fa-lg fabutton"></span><a href="mailto:<?php echo $options['supportemail'];?>"><?php echo $options['supportemail'];?></a></span>
                    </li>
                    <li style="display:inline; margin-left: 15px;" class="pull-right">
                        <span class="pull-right"><i><?php echo $options['tagline'];?></i></span>
                    </li>
                </ul>
                  
              </div>
          </div>
      </div>
