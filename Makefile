serve:
	cd html && php -derror_reporting=-1 -ddisplay_errors=1 -S 0.0.0.0:9874 -dxdebug.mode=develop,debug router.php
