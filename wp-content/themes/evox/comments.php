<?php

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area templaza-comment-form ">
    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
        ?>
        <h3 class="comments-title box-title uk-margin-medium-bottom">
            <?php
            $evox_comment_count = get_comments_number();
            if ( '1' === $evox_comment_count ) {
                echo number_format_i18n( $evox_comment_count );
                ?>
            <strong><?php echo esc_html__('Comment','evox')?></strong>
            <?php
            } else {
                echo number_format_i18n( $evox_comment_count );
                ?>
                <strong><?php echo esc_html__('Comments','evox')?></strong>
            <?php
            }
            ?>
        </h3><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
	            'style'      => 'ol',
	            'short_ping' => true,
	            'avatar_size' => 75,
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'evox' ); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().
    ?>

    <div class="CommentForm uk-margin-large-top">
        <?php
        $evox_commenter = wp_get_current_commenter();
        $evox_req      = get_option( 'require_name_email' );
        $evox_aria_req = ( $evox_req ? " aria-required='true'" : '' );
        $evox_comment_title = esc_html__( 'Leave a Comment','evox').'';
        if(!is_user_logged_in()){
            $evox_args = array(
                'fields' => apply_filters( 'comment_form_default_fields',
                    array(
                        '<div class="content-form uk-child-width-1-2@s uk-grid-small " data-uk-grid>',
                        'author' => '<div class=" comment-form-author ">'
                            . '<input id="author" name="author" type="text" value="' . esc_attr( $evox_commenter['comment_author'] ) . '" size="30"' . $evox_aria_req . ' placeholder="'.esc_attr__('Enter your name...','evox').'" /></div>',
                        'email'  => '<div class=" comment-form-email ">'
                            . '<input id="comment-email" name="email" type="text" value="' . esc_attr(  $evox_commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $evox_aria_req . ' placeholder="'.esc_attr__('Email','evox').'" /></div>',
                        '</div>',
                    )
                ),
                'comment_field'        => '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="90" rows="4" required="required" placeholder="'.esc_attr__('Your Comments...','evox').'"></textarea></div>',
                'label_submit'      =>  esc_html__( 'Post Comment','evox'),
                'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title box-title">',
                'title_reply_after' => '</h3>',
                'title_reply'       =>  $evox_comment_title,
                'class_submit'  =>'templaza-btn'
            );
        }else{
            $evox_args = array(
                'fields' => apply_filters( 'comment_form_default_fields',
                    array(
                        '<div class="content-form ">',
                        'author' => '<div class="comment-form-author">'
                            .'<label>'.( $evox_req ? esc_html__('Your Name','evox') : '' ).'</label>'
                            . '<input id="author" name="author" type="text" value="' . esc_attr( $evox_commenter['comment_author'] ) . '" size="30"' . $evox_aria_req . ' /></div>',
                        'email'  => '<div class="comment-form-email">'
                            .'<label>'.( $evox_req ? esc_html__('Your Email','evox') : '' ).'</label>'
                            . '<input id="comment-email" name="email" type="text" value="' . esc_attr(  $evox_commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $evox_aria_req . ' /></div>',
                        '</div>'
                    )
                ),
                'comment_field'        => '<div class="comment-form-comment login"><label>'.esc_html__('Comments','evox').'</label> <textarea id="comment" name="comment" cols="90" rows="4" required="required"></textarea></div>',
                'label_submit'      =>  esc_html__( 'Post Comment','evox'),
                'title_reply'       =>  $evox_comment_title,
                'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title box-title">',
                'title_reply_after' => '</h3>',
                'class_submit'  =>'templaza-btn'
            );
        }

        comment_form( $evox_args ); ?>
    </div>

</div><!-- #comments -->
