<!DOCTYPE html>
<html>
	<head>
		<title>The Complete Guide to the Settings API | Sandbox Theme</title>
	</head>
	<body>
		<?php if( get_option( 'show_header' ) ) { ?>
			<div id="header">
				<h1>Sandbox Header</h1>
			</div> <!-- end header -->
		<?php } // end if ?>

		<?php if( get_option( 'show_content' ) ) { ?>
			<div id="content">
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