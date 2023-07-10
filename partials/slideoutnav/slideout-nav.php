<!-- <i class="fa fa-navicon slideout-navicon"></i> -->

<div class="slideout-nav" hive-type="component">
    <div class="navicon-close">
        <i class="fa fa-navicon"></i>
    </div><!-- .navicon-close -->
    <div class="slideout-nav__inner">
        <nav id="site-navigation" class="mobile-navigation">
			<?php
    			wp_nav_menu( array(
    				'theme_location' => 'menu-1',
                    'menu'           => 'main-nav',
    				'menu_id'        => 'mobile-menu',
    			) );
			?>
        </nav><!-- #site-navigation -->
        <div class="slideout-nav__contact-info">
            <p><a href="https://www.google.com/maps/search/<?php echo preg_replace('/\n/', ' ', strip_tags(get_field('footer_address', 'options'))); ?>" target="_blank"><span class="fas fa-map-marked-alt"></span> <?php the_field('footer_address', 'options'); ?></a></p>
            <?php if (get_field('phone_number', 'options')): ?>
                <a href="tel:<?php the_field('phone_number', 'options'); ?>"><span class="fas fa-phone-alt"></span> <?php the_field('phone_number', 'options'); ?></a>
            <?php endif; ?>
        </div>
    </div> <!-- .slideout-nav__inner -->
</div><!-- .hive slideout-nav -->   