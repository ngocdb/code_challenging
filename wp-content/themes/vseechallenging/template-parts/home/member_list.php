<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vsee
 * @subpackage Vsee_Challenging
 * @since 1.0
 * @version 1.0
 */
?>

<?php $count = 0; $profilePage = um_get_core_page("user"); ?>
<?php foreach (getAllSubscribers() as $user): ?>
    <?php if (!($count%4)): ?><div class="row"><?php endif; ?>
    <div class="col-md-3 columns">
        <h4>
            <a href="<?php echo $profilePage . $user->url_slug; ?>">
                <?php echo get_avatar($user->ID, 200, '', $user->fullname, array('class' => 'aligncenter')); ?>
            </a>
        </h4>
        <h4><a href="<?php echo $profilePage . $user->url_slug; ?>"><?php echo ucwords($user->fullname) . ', ' . $user->degree ?></a></h4>
        <h5><?php echo $user->specialization; ?></h5>
        <p><?php echo $user->licensed_state ?></p>
    </div>
    <?php $count++ ?>
    <?php if (!($count%4)): ?></div>><?php endif; ?>
<?php endforeach; ?>
