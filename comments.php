<?php
const ALLOWED_ELEMENTS = ['b' => [], 'strong' => [], 'i' => [], 'a'=> ['href' => [], 'title' => []], 'blockquote' => [], 'del' => [], 'ins' => [], 'ul' => [], 'ol' => [], 'li' => [], 'code' => []];

$comments = (new WP_Comment_Query(array(
    'status' => 'approve',
    'parent' => 0
)))->get_comments();
$replies = groupById((new WP_Comment_Query(array(
    'status' => 'approve',
    'parent__in' => array_map(function($comment){ return $comment->comment_ID;},  $comments),
    'user_id' => get_the_author_meta( 'ID' )
)))->get_comments());

function groupById($comments){
    $ret = new stdClass();
    foreach ($comments as $comment){
        $id = $comment->comment_parent;
        if (isset($ret->$id)){
            $group =  $ret->$id;
        } else {
            $group = [];
        }
        $group[] = $comment;
        $ret->$id = $group;
    }
    return $ret;
}

if ( $comments ) foreach ( $comments as $comment ) : ?>

<div class="article">
    <?php echo wp_kses($comment->comment_content, ALLOWED_ELEMENTS) ?>
    <div class="article-actions">
        <div class="article-author">
            <a href="<?php echo esc_url($comment->comment_author_url) ?>">
                <h3><?php echo esc_html($comment->comment_author) ?></h3>
                <?php echo get_avatar( $comment->comment_author_email, 50 ); ?>
            </a>
        </div>
    </div>

    <?php $id = $comment->comment_ID ; if (isset($replies->$id)) foreach ($replies->$id as $reply) : ?>
        <div class="article-reply">
            <h3><?php echo esc_html($reply->comment_author) ?>:</h3>
            <?php echo wp_kses($reply->comment_content, ALLOWED_ELEMENTS) ?>
        </div>
    <?php endforeach; ?>
</div>

<?php endforeach; if (comments_open()): ?>

<div class="article">
    <?php
        comment_form([
             'logged_in_as' => '',
             'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'Please <a href="%s">log in</a> to post a comment.*' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
             'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Add your comment" required></textarea>'
        ]);
    ?>
</div>

<?php endif;