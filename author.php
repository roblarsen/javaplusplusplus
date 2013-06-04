<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */

get_header();
st_before_content($columns='');
?>


<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h1><?php echo $curauth->display_name; ?></h1>
    <?php echo $curauth->description; ?></p>
<?php

	st_after_content();
	get_sidebar();
	get_footer();
?>