<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package oStore
 */
$ostore_archive_sidebar_layout = get_theme_mod('archive_page_layout_option','right-sidebar');
get_header(); ?>
<!-- Main Container -->
<!-- Main Container -->
<section class="blog_post bounceInUp animated"><!-- Edted file -->
	<div class="container"> 	
		<!-- row -->
		<div class="row">
		<!-- Center colunm-->
		<?php 
			//Ostore Sidebar Layout 
			if ( $ostore_archive_sidebar_layout == 'left-sidebar' OR $ostore_archive_sidebar_layout == 'both-sidebar' ) : 
				get_sidebar('left'); 
			endif;
		?>
		<div class="<?php echo esc_attr( ostore_main_class() ); ?>" id="center_column">
			<div class="page-title">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>
			<?php
			if ( have_posts() ) : ?>
			
				<ul class="blog-posts">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>
				
				</ul>
				<div class="">
				<?php the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( 'Previous', 'ostore' ),
						'next_text' => __( 'Next', 'ostore' ),
					) ); ?>
				</div>
			<?php else: ?>
				<?php get_template_part( 'template-parts/content','none'); ?>
			<?php endif; ?>
		</div>
			<?php 
				//Ostore Sidebar Layout 
				if ( $ostore_archive_sidebar_layout == 'right-sidebar' OR $ostore_archive_sidebar_layout == 'both-sidebar' ) : 
					get_sidebar(); 
				endif;
			?>
		</div>
		<!-- ./row--> 
	</div>
	</section>
	<!-- Main Container End -->		
<?php
get_footer(); 