<?php
/**
 * Template part for displaying search ajax content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vsee
 * @subpackage Vsee_Challenging
 * @since 1.0
 * @version 1.0
 */
?>
<?php
$profilePage = um_get_core_page("user");
?>
<?php if ($searchedUsers): ?>
<?php foreach ($searchedUsers as $user): ?>
<li>
    <div class="user-photo">
        <a href="<?php echo $profilePage . $user->url_slug; ?>"><?php
            echo get_avatar($user->ID, 40, '', $user->fullname, array('class' => 'aligncenter'));
            ?></a>
    </div>
    <div class="user-info">
        <div class="user-name">
            <a href="<?php echo $profilePage . $user->url_slug ?>"><span><?php echo ucwords($user->fullname) . ', ' . $user->degree ?></span></a>
        </div>
        <div class="user-specialization"><?php echo ucwords(strtolower($user->specialization)) ?></div>
        <div class="user-licensed-state"><?php echo $user->licensed_state ?></div>
    </div>
    <div class="clear"></div>
</li>
<?php endforeach; ?>
<?php else: ?>
    <li><div class="no-user-found">No users found!</div></li>
<?php endif; ?>