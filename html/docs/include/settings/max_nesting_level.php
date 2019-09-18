<p>Controls the protection mechanism for infinite recursion protection.
The value of this setting is the maximum level of nested functions that are
allowed before the script will be aborted.</p>
<p>Before Xdebug 2.6, this would create a fatal exception if exceeded. From
Xdebug 2.6 and later, an "<a href='http://php.net/manual/en/class.error.php'>Error</a>" exception is thrown
instead.</p>
<p>Before Xdebug 2.3, the default value was <code>100</code>.</p>