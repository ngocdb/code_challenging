<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?> um-role-<?php echo um_user('role'); ?> ">

	<div class="um-form">

		<?php do_action('um_profile_before_header', $args ); ?>

		<?php if ( um_is_on_edit_profile() ) { ?><form method="post" action=""><?php } ?>

            <?php $currentUser = $ultimatemember->user->profile; ?>

			<?php do_action('custom_um_profile_header', $args ); ?>

            <?php if ( um_is_on_edit_profile() ) { ?>
                <?php
                $nav = $ultimatemember->profile->active_tab;
                $subnav = ( get_query_var('subnav') ) ? get_query_var('subnav') : 'default';
                ?>
                <div class='um-profile-body $nav $nav-$subnav'>
                <?php
                    // Custom hook to display tabbed content
                    do_action("um_profile_content_{$nav}", $args);
                    do_action("um_profile_content_{$nav}_{$subnav}", $args);
                ?>
                </div>
            <?php } ?>

		<?php if ( um_is_on_edit_profile() ) { ?></form><?php } ?>

	</div>

</div>