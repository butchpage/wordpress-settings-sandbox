<!DOCTYPE html>
<html>
	<head>
		<title>The Complete Guide to the Settings API | Sandbox Theme</title>
	</head>
	<body>
		<?php if( get_option( 'show_header' ) ) { ?>
			<div id="header">
				<h1>Sandbox Header</h1>
				<?php $input_examples = get_option( 'sandbox_theme_input_examples' ); ?>
				<?php echo sanitize_text_field( $input_examples[ 'input_example' ] ); ?>

				<?php if( $input_examples[ 'textarea_example' ] ) {
					echo sanitize_text_field( $input_examples[ 'textarea_example' ] );
				} ?>
			</div> <!-- end header -->
		<?php } // end if ?>

		<?php if( get_option( 'show_content' ) ) { ?>
			<div id="content">
        <?php echo $social_options['twitter'] ? '<a href="' . $social_options['twitter'] . '">Twitter</a>' : ''; ?>
				<?php echo $social_options['facebook'] ? '<a href="' . $social_options['facebook'] . '">Facebook</a>' : ''; ?>
				<?php echo $social_options['googleplus'] ? '<a href="' . $social_options['googleplus'] . '">Google+</a>' : ''; ?>
				<p>This is the content.</p>
			</div><!-- end content -->
		<?php } // end if ?>

		<?php if( get_option( 'show_footer' ) ) { ?>
			<div id="footer">
				<p>&copy; <?php echo date('Y'); ?> All Rights Reserved.</p>
			</div><!-- end footer -->
		<?php } // end if ?>

	</body>
</html>