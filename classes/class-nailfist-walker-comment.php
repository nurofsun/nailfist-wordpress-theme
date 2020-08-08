<?php

class Nailfist_Walker_Comment extends Walker_Comment {
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
     
        $commenter = wp_get_current_commenter();
        if ( $commenter['comment_author_email'] ) {
            $moderation_note = __( 'Your comment is awaiting moderation.' );
        } else {
            $moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
        }
     
        ?>
        <?php if ('div' !== $args['style']): ?>
         <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <?php endif; ?>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <?php
                        if ( 0 != $args['avatar_size'] ) {
                            echo get_avatar( $comment, $args['avatar_size'] );
                        }
                        ?>
                    </p>
                </figure>
                <div class="media-content">
                    <header class="comment-meta">
                        <div class="comment-author vcard">
                            <?php
                                printf(
                                    /* translators: %s: Comment author link. */
                                    __( '%s <span class="says"></span>' ),
                                    sprintf( '<b class="fn is-capitalized">%s</b>', get_comment_author_link( $comment ) )
                                );
                            ?>
                        </div><!-- .comment-author -->
                        <div class="comment-metadata is-size-7 content">
                            <p>
                            <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>" class="has-text-dark is-link">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                    <?php
                                        /* translators: 1: Comment date, 2: Comment time. */
                                        printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                                    ?>
                                </time>
                            </a>
                            </p>
                        </div><!-- .comment-metadata -->
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                        <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                        <?php endif; ?>
                    </header><!-- .comment-meta -->
                    <div class="content">
                        <div class="comment-content">
                            <?php comment_text(); ?>
                        </div><!-- .comment-content -->
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <div class="level-item">
                                <?php
                                comment_reply_link(
                                    array_merge(
                                        $args,
                                        array(
                                            'add_below' => 'div-comment',
                                            'depth'     => $depth,
                                            'max_depth' => $args['max_depth'],
                                            'reply_text' => '<span class="icon is-small"><i class="fas fa-reply"></i></span>'
                                        )
                                    )
                                );
                                ?>
                            </div>
                            <div class="level-item">
                                <?php edit_comment_link( '<span class="icon is-small"><i class="fas fa-pencil-alt"></i></span>', '<span class="edit-comment">', '</span>' ); ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </article> 
        <?php
    }
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
        if ( ! empty( $args['end-callback'] ) ) {
            ob_start();
            call_user_func( $args['end-callback'], $comment, $args, $depth );
            $output .= ob_get_clean();
            return;
        }
        if ( 'div' == $args['style'] ) {
            $output .= "";
        } else {
            $output .= "</li><!-- #comment-## -->\n";
        }
    }
}
