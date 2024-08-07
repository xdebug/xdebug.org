serve:
	cd html && php -derror_reporting=-1 -dxdebug.cloud_id=${XDEBUG_CLOUD_KEY} -ddisplay_errors=1 -S 0.0.0.0:9874 -dxdebug.mode=develop,debug router.php
