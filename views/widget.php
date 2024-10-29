<?php
/*  The output of the Widget   */
?>

<ul>

<?php	while ($widget_query->have_posts()) :

		$widget_query->the_post();
		$topic_id = bbp_get_topic_id($widget_query->post->ID);
		$author_link = bbp_get_topic_author_link(array('post_id'=>$topic_id, 'type'=>'both', 'size'=>60));
		$forum_id = bbp_get_topic_forum_id($topic_id); ?>
	<li>
		<a class="bbp-forum-title" href="<?php bbp_topic_permalink($topic_id); ?>" title="<?php bbp_topic_title($topic_id); ?>"><?php bbp_topic_title($topic_id); ?></a>

<?php		if ($show_user) :
			echo '<div class="bbp_show_user">by <span class="topic-author">' . $author_link . '</span></div>';
		endif;
		if ($show_forum) :
			echo '<div class="bbp_show_forum">In: <a href="' . bbp_get_forum_permalink($forum_id) . '">' . bbp_get_forum_title($forum_id) . '</a></div>';
		endif;
		if ($show_date) :
			echo '<div class="bbp_show_date">';
			bbp_topic_last_active_time($topic_id);
			echo '</div>';
		endif;
		if ($show_detail) :
			echo '<div class="bbp_show_detail">';
			bbp_topic_excerpt($topic_id);
			echo '</div>';
		endif; ?>
	</li>

<?php	endwhile; ?>

</ul>