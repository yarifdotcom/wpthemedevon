<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-site-verification" content="b0B5Zi9C5s_hCp2vgkOl0fUXYF5Y-jrWOQSTlgf8cyY" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
        <!--<link rel="preload" as="font" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/font.woff" type="font/woff" crossorigin="anonymous">-->

        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/defaults.css">
		
		<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TG3RRMK');</script>
        <!-- End Google Tag Manager -->

        <link rel="preconnect" href="https://player.vimeo.com">
        <link rel="preconnect" href="https://i.vimeocdn.com">
        <link rel="preconnect" href="https://f.vimeocdn.com">
        
        <!-- ArchiPro Pixel start -->
        <script>
                window.ApData = window.ApData || [];
                function apa(){
                    window.ApData.push(arguments);
                }
                apa('id','devon');
        </script>
        <script async src="https://pixel.archipro.co.nz/ap-analytics.js"></script>
        <!-- ArchiPro Pixel end -->


		<?php wp_head(); 
        ?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
    
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG3RRMK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    
    
	<div id="barba-wrapper" >
        
        
        <header <?php body_class('main-header');?>>
            <div class="logo-holder svg-logo logo-link">
                <a href="<?php echo get_home_url(); ?>" >
                    <div class="established-logo">
                        <?php include( locate_template( 'snippets/logo-established.php', false, false ) ); ?>
                    </div>
                    <?php include( locate_template( 'snippets/logo.php', false, false ) ); ?>
                </a>
            </div>            
            
            <?php get_template_part( 'fullscreennav');?>
        </header>
        
        

        
        <div id="transition-mask">
            <div class="established-logo">
                <?php include( locate_template( 'snippets/logo-established.php', false, false ) ); ?>
            </div>
            <?php include( locate_template( 'snippets/logo.php', false, false ) ); ?>
        </div>

        
        <?php 
            global $post;
            $post_slug = $post->post_name;
        ?>
        <div id="content-holder" <?php body_class('barba-container');?> data-namespace="<?php echo $post_slug;?>">        
        
       