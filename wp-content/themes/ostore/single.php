<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package oStore
 */
$ostore_get_layout = ostore_get_layout();

get_header(); ?>
	<!-- Main Container -->
	<section class="blog_post bounceInUp animated">
    <div class="container">
      <div class="row">
        <?php 
          //Ostore Sidebar Layout 
            if ( $ostore_get_layout == 'left-sidebar' OR $ostore_get_layout == 'both-sidebar' ) : 
              get_sidebar('left'); 
            endif;
          ?>
        <div class="<?php echo esc_attr( ostore_main_class() ); ?>">
          <?php while ( have_posts() ) : the_post(); ?>
                <div class="page-title">
                  <h1 class="recent-single-heading"><?php the_title() ; ?></h1>
                </div> 
                <div class="entry-detail">
                  <?php if(has_post_thumbnail()): ?>
                  <div class="entry-photo">
                    <figure><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute();?>"></figure>
                  </div>
                  <?php endif; ?>
                  <div class="ostore-entry-meta-data"> 
                      <span class="author"> 
                        <i class="fa fa-user"></i>&nbsp; <?php esc_attr_e('By:', 'ostore'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'name' ) )); ?>"><?php echo get_the_author(); ?></a>
                      </span> 
                      <span class="cat"> 
                        <i class="fa fa-folder"></i>&nbsp;  <?php  the_category(',',false); ?> 
                      </span> 
                      <span class="comment-count">
                        <a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>">
                        <i class="fa fa-comment"></i>&nbsp;
                        <?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?>
                        </a>
                      </span> 
                      <span class="date">
                        <i class="fa fa-calendar">&nbsp;</i>&nbsp;<?php the_date(get_option('date_format' ));  ?>
                      </span>
                  </div>
                  <div class="content-text slingle-blog-content clearfix">
                    <?php the_content(); ?>
                  </div>
                  <div class="entry-tags"> <span></span> <?php the_tags( 'Tags: ', ', ', '<br />' ); ?></div>
            </div>
          <?php endwhile; ?>
          
          <!-- Related Posts -->
          <div class="single-box">
            <h2><?php esc_html__('Releated Post','ostore'); ?></h2>
            <div class="slider-items-products">
              <div id="related-posts" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 fadeInUp">
                  <?php 
                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
                    if( $related ) foreach( $related as $post ) {
                    setup_postdata($post); 
                  ?>
                  <div class="product-item">
                          <article class="entry">
                            <div class="entry-thumb image-hover2"> <a href="<?php the_permalink(); ?>"> <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" > </a> </div>
                            <div class="entry-info">
                              <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                              <div class="entry-meta-data"> <span class="date"> <i class="fa fa-calendar">&nbsp;</i><?php  $cpost=get_post(); echo esc_html(date(get_option('date_format'), strtotime($cpost->post_date)));  ?> </span> </div>
                              <div class="ostore-recent-entry-more"> <a href="<?php the_permalink(); ?>" class="ostore-recent-btn"><?php echo esc_html__('Read more','ostore'); ?></a> </div>
                            </div>
                          </article>
                        </div>
                        <?php } wp_reset_query(); ?>
				  
                </div>
              </div>
            </div>
          </div>
          <!-- ./Related Posts --> 
          <!-- Comment -->
          <?php 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>
          <!-- ./Comment --> 
          </div>
          <?php 
          
            //Ostore Sidebar Layout 
            if ( $ostore_get_layout == 'right-sidebar' OR $ostore_get_layout == 'both-sidebar' ) : 
              get_sidebar(); 
            endif;
          ?>
      </div>
    </div>
  </section>
  <!-- Main Container End -->

<?php
get_footer();