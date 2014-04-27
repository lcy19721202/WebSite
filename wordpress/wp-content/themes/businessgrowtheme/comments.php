<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');
if (post_password_required()) {
    ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<div id="commentsbox">
    <?php if (have_comments()) : ?>
        <h3 id="comments">
            <?php comments_number('No Responses', 'One Response', '% Responses'); ?>
            so far.</h3>
        <ol class="commentlist">
            <?php wp_list_comments(array('avatar_size' => 70)); ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
                <?php next_comments_link() ?>
            </div>
        </div>
    <?php else : // this is displayed if there are no comments so far ?>
        <?php if (comments_open()) : ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed  ?>
            <!-- If comments are closed. -->
            <p class="nocomments">Comments are closed.</p>
        <?php endif; ?>
    <?php endif; ?>	
    <?php if (comments_open()) : ?>
        <div class="commentform_wrapper">
            <div class="post-info">Leave a Comment</div>
            <div id="comment-form">
                <div id="respond" class="rounded">
                    <div class="cancel-comment-reply"> <small>
                            <?php cancel_comment_reply_link(); ?>
                        </small> </div>
                    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                        <p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
                    <?php else : ?>
                        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                            <?php if ($user_ID) : ?>
                                <p class="comment_message" style="margin-bottom: 10px;"><?php echo Login; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php echo LOGOUT; ?></a></p>
                                <p class="clearfix">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1" placeholder="Your Comment"></textarea>
                                </p>
                            <?php else : ?>
                                <p class="clearfix">					
                                    <input type="text" name="author" id="author" tabindex="2" value="" placeholder="Your Name"/>
                                </p>
                                <p class="clearfix">					
                                    <input type="text" name="email" id="email" tabindex="3" value="" placeholder="Your Email"/>
                                </p>
                                <p class="clearfix">					
                                    <input type="text" name="url" id="url" tabindex="4" value="" placeholder="Your Website"/>
                                </p>
                                <p class="clearfix">
                                    <textarea name="comment" id="comment" cols="50" tabindex="5" rows="7"  placeholder="Leave Your Comment Here"></textarea>
                                </p>
                            <?php endif; ?>
                            <div class="submit">
                                <input name="submit" type="submit" id="submit" tabindex="6" value="Submit Comment" />
                                <p id="cancel-comment-reply">
                                    <?php cancel_comment_reply_link() ?>
                                </p>
                            </div>
                            <div>
                                <?php comment_id_fields(); ?>
                            </div>
                        </form>
                    <?php endif; // If registration required and not logged in  ?>
                </div>
            </div>
        </div>
    <?php endif; // if you delete this the sky will fall on your head  ?>
</div>
