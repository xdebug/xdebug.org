serve:
	cd html && php -derror_reporting=-1 -ddisplay_errors=1 -S localhost:9874 -dxdebug.mode=develop,debug router.php
