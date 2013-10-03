<?php
/**
 * 홈 페이지 
 *
 */
?>


<div class="span6">

    <!-- RECENT CODE SNIPPETS -->
    <?php $args = array(
        'numberposts' => 10,
        'category' => 0,
        'orderby' => 'modified',
        'order' => 'DESC',
        'post_type' => 'page',
        'post_status' => 'publish');

        $posts = wp_get_recent_posts( $args, OBJECT );
    ?>
    <div class="the-box-packed the-orenge-box">
    	<div class="box-header-orenge">RECENT CODE SNIPPETS</div>

    	<ul class="unstyled">
    	<?php foreach ($posts as $post) : ?>
    		<li>
    			<div class="post-title">
    			<span class="label label-orenge"><?php echo strtoupper(get_post($post->post_parent)->post_title); ?></span>
    			<small><a href="<?php echo $post->guid; ?>"><?php echo $post->post_title; ?></a></small>
    			<!-- <span class="muted"><small><?php echo Date('y/m/d', strtotime($post->post_modified)); ?></small></span> -->
    	   		</div>
    	   </li>
    	<?php endforeach; ?>
    	</ul>
    </div>


    <!-- POPULAR CODE SNIPPETS -->
    <div class="the-box-packed the-orenge-box">
        <div class="box-header-orenge">POPULAR CODE SNIPPETS</div>

        <?php $posts = get_popular_posts(); ?>

        <ul class="unstyled">
        <?php foreach ($posts as $post) : ?>
            <li>
                <div class="post-title">
                    <?php $parent = get_post(get_post( $post['id'] )->post_parent); ?>
                    <span class="label label-orenge"><?php echo strtoupper($parent->post_title); ?></span>
                    <small><a href="<?php echo $post['permalink']; ?>">
                        <?php echo $post['title']; ?></a></small> 
                    <small><span class=""> (<?php echo $post['count']; ?> views)</span></small>
                </div>
           </li>
        <?php endforeach; ?>
        </ul>
    </div>

</div> <!-- span6 -->


<div class="span6">

    <!-- RECENT BOOK REVIEWS -->
    <?php $args = array(
        'numberposts' => 6,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish');

        $posts = wp_get_recent_posts( $args, OBJECT );
    ?>
    <div class="the-box-packed the-white-box">
    	<div class="box-header-white">RECENT BOOK REVIEWS</div>
    	<?php foreach ($posts as $post) : ?>
    		<div class="the-book">
    			<?php $book_img_url = get_post_meta($post->ID, 'book_img_url', 1); ?>
    			<a href="<?php echo $post->guid; ?>"><img src="<?php echo $book_img_url; ?>" /></a>
    	   </div>
    	<?php endforeach; ?>
    	<div class="clearfix"></div>
    </div>

    <!-- 통계 -->
    <div class="the-white-box">
        <div class="box-header-white">BLOG STATISTICS</div>
        <div class="the-box">
            <table class="table  table-condensed">
                <tr><td>BOOK REIVEWS</td><td><span class="label"><?php echo wp_count_posts()->publish; ?> posts</span></td></tr>
                <tr><td>CODE SNIPPETS</td><td><span class="label"><?php echo $codesnum = count_leaf_pages('code snippet'); ?> posts</span></td></tr>

                <?php $sub_pages = get_sub_page_titles( get_page_by_title('code snippet')->ID ); ?>
                <?php if ( count($sub_pages) ) : ?>
                    <?php foreach($sub_pages as $page): ?>
                        <tr><td>&ensp;&ensp;<?php echo strtoupper($page); ?></td>
                            <?php $subcodenum = count_leaf_pages($page); ?>
                            <td><span class="badge"><?php echo round($subcodenum/$codesnum*100); ?>%</span></td></tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>

</div> <!-- span6 -->














