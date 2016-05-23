<?php 
/**
 * Top of page for University of Leeds Responsive Wordpress theme
 * this contains the menus and sidebars
 * 
 * @author Peter Edwards <p.l.edwards@leeds.ac.uk> Steve Honeyman <s.honeyman@leeds.ac.uk>
 * @version 1.2.2
 * @package UoL_theme
 */

 
$theme_options = get_uol_theme_options();
?>

<body <?php body_class(); ?>>

<!--======= header and logo =============-->

    <div class="header"> 
        <a id="logo" href="http://www.leeds.ac.uk/" title="University of Leeds Homepage"><img src="<?php echo get_template_directory_uri(); ?>/img/logo/logo_black.png" class="hidden" alt="University of Leeds" /></a>
        <?php if ((isset($theme_options["header_link"]) && trim($theme_options["header_link"]) != "") && (isset($theme_options["header_title"]) && trim($theme_options["header_title"]) != "")) : ?>
                
                <h2><a href="<?php echo $theme_options["header_link"]; ?>" title="<?php echo esc_attr($theme_options["header_title"]); ?>"><?php echo $theme_options["header_title"]; ?></a></h2>
                
        <?php endif; ?>
    </div>

<!--========= main site wrapper =========-->

    <div class="content">

        <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span><?php bloginfo( 'name' ); ?></span></a></h1>
 
<!--=============== nav =================-->

    <div id="primary-nav">

        <div class="responsive-nav"><!-- wrapper to tidy nav height up -->
            <label for="toggle-1"><span class="hamburger-dev">&#9776;</span></label> 
            <input type="checkbox" id="toggle-1">   
        
            <?php wp_nav_menu( array(
                'theme_location' => 'tabs',
                'menu_class' => 'nav-main',
                'depth' => 1
            ) ); ?>
        </div>
   
    </div><!-- close primary-nav -->   
    
<!--================ search ===============================-->

    <div class="search-bar-container">
        <label for="search-toggle"><span class="search-toggle-dev"><!--uses background image for icon--></span></label>
                <input type="checkbox" id="search-toggle">  

        <div class="search-bar">    
            <form class="search-demo">
                <label for="search"></label>
                <input type="text" id="search" class="search-demo-input" placeholder="Enter search term here..">
            </form>
        </div>
     </div> 

<!--=================== main content loop, ie stuff between sidebars ===================-->

   <!-- <?php insert_breadcrumbs(); ?> -->

    <div class="toggle-temp-wrapper clearfix">    
        <label for="nav-trigger"><h2 class="quick-links">Quick Links Menu</h2></label> 
        <input type="checkbox" id="nav-trigger">   

        <div class="section-sidebar nav">
            <div class="section-sidebar-content">
                <?php dynamic_sidebar('left-menu'); ?>
            </div>
        </div>
  
    
    <div class="content-main">
          
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
            <h2><?php the_title(); ?></h2> 
            <?php the_content(); ?>
                   
        <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
           
    </div>
    
   
    <!--=============== site sidebar (moved from in original place in doc flow) ======================-->        
    
    <div class="site-sidebar">
        <div class="site-sidebar-content">
    
        <!--
            <form class="search-demo">
                <label for="search"></label>
                <input type="text" id="search" class="search-demo-input" placeholder="Enter search term here..">
            </form>
        -->
        
        <?php dynamic_sidebar('right-menu'); ?>
        </div>
    </div>
