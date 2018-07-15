<?php 


$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
);
 
$comments_args = array(
    'fields' =>  $fields,
    'title_reply'=>'Please give us your valuable comment',
    'label_submit' => 'Yorum Gönder'
);
 
comment_form($comments_args);



 ?>