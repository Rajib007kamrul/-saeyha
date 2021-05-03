<?php
    if ( post_password_required() ) {
        return;
    }
?>
<div class="commnets-area">
    <h3 class="pb-3"> Comments </h3>
    <?php
    if ( $comments ) {
        wp_list_comments(
            array(
                'avatar_size' => 65,
                'style'       => 'div',
                'format'      => 'html5',
            )
        );
    }

        comment_form(
            array(
                'class_form'         => 'pt-0 pt-md-4',
                'title_reply_before' => '<h3>',
                'title_reply_after'  => '</h3>',
                'label_submit'       => __( 'Submit' ),
                'title_reply'        =>__( 'Write your comment here' ),
                'title_reply_to'        =>__( 'Leave a Comment to %s' )
            )
        );
    ?>
</div>