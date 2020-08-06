<?php

if (! function_exists('nailfist_comment_form')):
    function nailfist_comment_form() {
        $comment_fields = array(
            'author' => '<div class="field comment-author">
                             <input class="input" name="author" type="text" placeholder="Name" required>
                        </div>',
            'email' => '<div class="field comment-email">
                            <input class="input" name="email" type="email" placeholder="Example@mail.com" required>
                        </div>',
            'url' => '<div class="field comment-url">
                        <input class="input" name="url" type="url" placeholder="https://yourwebsite.com">
                     </div>',
            'cookies' => '<div class="field">
                <label for="wp-comment-cookies-consent">
                    <input type="checkbox" class="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes">
                    <small>Save my name, email, and website in this browser for the next time I comment.</small>
                </label>
            </div>'        
        );
        $args = array(
            'fields' => $comment_fields,
            'title_reply_before' => '<h3 class="is-size-5 has-text-weight-bold" id="reply-title">',
            'title_reply_after' => '</h3>',
            'comment_notes_before' => '<div class="field"><small class="has-text-gray">Your email address will not be published</small></div>',
            'comment_field' => '<div class="field comment-field">
            <textarea class="textarea" name="comment" aria-required="true" required placeholder="Say Something..."></textarea>
            </div>',
            'submit_field' => '<div class="field">%1$s %2$s</div>',
            'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s button is-primary" value="%4$s" />'
            );
        return comment_form($args);
    }
endif;
