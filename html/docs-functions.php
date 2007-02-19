<?php $title = "Xdebug: Documentation - Functions"; include "include/header.php"; hits ('xdebug-docs-functions'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - FUNCTION REFERENCE</span><br />

<?php include "include/menu-docs.php"; ?>

<span class="sans">INTRODUCTION</span>
<p>
This page lists all available functions in Xdebug. First a short description of
each function per section is shown, with links to the full description of a
functions, and in some cases examples.
</p>
<p>
Functions marked with <b>[1]</b> in the following index are only available in
Xdebug 1.3 and all functions marked with <b>[2]</b> are only available in
Xdebug 2.x. All unmarked functions are available in both Xdebug 1.3 and Xdebug
2.x.
</p>

<span class="sans"><a href="#stack">ACTIVATION RELATED FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_disable">xdebug_disable()</a></dt>
<dd>disables displaying stacktraces on errors</dd>

<dt><a href="#xdebug_enable">xdebug_enable()</a></dt>
<dd>enables displaying stacktraces on errors</dd>

<dt><a href="#xdebug_is_enabled">xdebug_is_enabled()</a></dt>
<dd>returns whether stacktraces would be shown in case of errors</dd>

</dl>


<span class="sans"><a href="#coverage">CODE COVERAGE FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_get_code_coverage">xdebug_get_code_coverage()</a></dt>
<dd>returns an array containing information on which lines are touched while executing the script</dd>

<dt><a href="#xdebug_get_function_count">xdebug_get_function_count()</a> [2]</dt>
<dd>returns the number of functions called since the beginning of the script</dd>

<dt><a href="#xdebug_start_code_coverage">xdebug_start_code_coverage()</a></dt>
<dd>starts collecting information on which lines are touched while executing the script</dd>

<dt><a href="#xdebug_stop_code_coverage">xdebug_stop_code_coverage()</a></dt>
<dd>stops collecting information on which lines are touched while executing the script</dd>

</dl>


<span class="sans"><a href="#tracing">EXECUTION RELATED FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_dump_function_trace">xdebug_dump_function_trace()</a> [1]</dt>
<dd>displays all functions called since <a href='#xdebug_start_trace'>xdebug_start_trace()</a> as an HTML table</dd>

<dt><a href="#xdebug_get_function_trace">xdebug_get_function_trace()</a> [1]</dt>
<dd>returns all functions called since <a href='#xdebug_start_trace'>xdebug_start_trace()</a> as an array</dd>

<dt><a href="#xdebug_get_tracefile_name">xdebug_get_tracefile_name()</a> [2]</dt>
<dd>returns the name of the file to which the current script is traced to</dd>

<dt><a href="#xdebug_memory_usage">xdebug_memory_usage()</a></dt>
<dd>returns the current amount of script memory in use</dd>

<dt><a href="#xdebug_peak_memory_usage">xdebug_peak_memory_usage()</a> [2]</dt>
<dd>returns the maximum amount of memory used at one point</dd>

<dt><a href="#xdebug_start_trace">xdebug_start_trace()</a></dt>
<dd>starts tracing all function calls to a file</dd>

<dt><a href="#xdebug_stop_trace">xdebug_stop_trace()</a></dt>
<dd>stops tracing all function calls to a file</dd>

<dt><a href="#xdebug_time_index">xdebug_time_index()</a></dt>
<dd>returns the time since the start of the script</dd>

</dl>


<span class="sans"><a href="#superglobals">INFORMATION DUMPING RELATED FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_debug_zval">xdebug_debug_zval()</a> [2]</dt>
<dd>prints the contents of a variable including reference count information</dd>

<dt><a href="#xdebug_debug_zval">xdebug_debug_zval_stdout()</a> [2]</dt>
<dd>outputs the contents of a variable including reference count information</dd>

<dt><a href="#xdebug_dump_superglobals">xdebug_dump_superglobals()</a></dt>
<dd>dumps values of elements of superglobals</dd>

<dt><a href="#xdebug_var_dump">xdebug_var_dump()</a></dt>
<dd>displays an HTML colourized representation of one or more variables</dd>

</dl>


<span class="sans"><a href="#profiling">PROFILING RELATED FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_dump_function_profile">xdebug_dump_function_profile()</a> [1]</dt>
<dd>displays two tables with profiling information</dd>

<dt><a href="#xdebug_get_function_profile">xdebug_get_function_profile()</a> [1]</dt>
<dd>return the profiling profile nformation on which lines are touched while executing the script</dd>

<dt><a href="#xdebug_get_profiler_filename">xdebug_get_profiler_filename()</a> [2]</dt>
<dd>returns the name of the file to which the current script is being profiled to</dd>

<dt><a href="#xdebug_start_profiling">xdebug_start_profiling()</a> [1]</dt>
<dd>returns an array containing information on which lines are touched while executing the script</dd>

<dt><a href="#xdebug_stop_profiling">xdebug_stop_profiling()</a> [1]</dt>
<dd>returns an array containing information on which lines are touched while executing the script</dd>

</dl>


<span class="sans"><a href="#debug">REMOTE DEBUGGING RELATED FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_break">xdebug_break()</a> [2]</dt>
<dd>makes the remote debugger break as if a breakpoint was set on this line</dd>

</dl>


<span class="sans"><a href="#stack">STACK RELATED FUNCTIONS</a></span>
<dl class="functionlist">
<dt><a href="#xdebug_call_class">xdebug_call_class()</a></dt>
<dd>returns the class from which the current function was called</dd>

<dt><a href="#xdebug_call_file">xdebug_call_file()</a></dt>
<dd>returns the file name from which the current function was called</dd>

<dt><a href="#xdebug_call_function">xdebug_call_function()</a></dt>
<dd>returns the function from which the current function was called</dd>

<dt><a href="#xdebug_call_line">xdebug_call_line()</a></dt>
<dd>returns the line number from which the current function was called</dd>

<dt><a href="#xdebug_get_declared_vars">xdebug_get_declared_vars()</a> [2]</dt>
<dd>returns an array of variable names which are defined (and used) in the current stack</dd>

<dt><a href="#xdebug_get_function_stack">xdebug_get_function_stack()</a></dt>
<dd>returns an array representing the current stack</dd>

<dt><a href="#xdebug_get_stack_depth">xdebug_get_stack_depth()</a> [2]</dt>
<dd>returns the stack depth</dd>

</dl>

<br /><br />

<a name="stack"></a>
<span class="sans">STACK RELATED</span><br />

<dl>
<a name='xdebug_get_declared_vars'></a>
<dt>array xdebug_get_declared_vars()</dt>
<dd>Returns an array where each element is a variable name which is defined and
<b>used</b> in the current scope:
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     class strings {
 3         static function fix_strings(\$a, \$b) {
 4             foreach (\$b as \$item) {
 5             }
 6             var_dump(xdebug_get_declared_vars());
 7         }
 8     }
 9     strings::fix_strings(array(1,2,3), array(4,5,6));
10 ?>
SCRIPT;
highlight_string($script);
?></pre>
Returns:
<pre class='example'>
array(2) {
  [0]=&gt;
  string(1) "b"
  [1]=&gt;
  string(4) "item"
}
</pre>
The variable name "a" is not returned here, as it is not used in that scope.
</dd>

<a name='xdebug_get_function_stack'></a>
<dt>array xdebug_get_function_stack()</dt>
<dd>Returns an array which resembles the stack trace up to this point. The example script:
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     class strings {
 3         function fix_string(\$a)
 4         {
 5             var_dump (xdebug_get_function_stack());
 6         }
 7
 8         function fix_strings(\$b) {
 9             foreach (\$b as \$item) {
10                 \$this->fix_string(\$item);
11             }
12         }
13     }
14
15     \$s = new strings();
16     \$ret = \$s->fix_strings(array('Derick'));
17 ?>
SCRIPT;
highlight_string($script);
?></pre>
Returns:
<pre class='example'>
array(3) {
  [0]=&gt;
  array(4) {
    ["function"]=&gt;
    string(6) "{main}"
    ["file"]=&gt;
    string(38) "/home/httpd/html/test/xdebug_error.php"
    ["line"]=&gt;
    int(0)
    ["params"]=&gt;
    array(0) {
    }
  }
  [1]=&gt;
  array(5) {
    ["function"]=&gt;
    string(11) "fix_strings"
    ["class"]=&gt;
    string(7) "strings"
    ["file"]=&gt;
    string(38) "/home/httpd/html/test/xdebug_error.php"
    ["line"]=&gt;
    int(16)
    ["params"]=&gt;
    array(1) {
      [0]=&gt;
      string(21) "array (0 =&gt; 'Derick')"
    }
  }
  [2]=&gt;
  array(5) {
    ["function"]=&gt;
    string(10) "fix_string"
    ["class"]=&gt;
    string(7) "strings"
    ["file"]=&gt;
    string(38) "/home/httpd/html/test/xdebug_error.php"
    ["line"]=&gt;
    int(10)
    ["params"]=&gt;
    array(1) {
      [0]=&gt;
      string(8) "'Derick'"
    }
  }
}
</pre>
</dd>

<a name='xdebug_get_stack_depth'></a>
<dt>integer xdebug_get_stack_depth() (Xdebug 2)</dt>
<dd>Returns the stack depth level. The main body of a script is level 0 and
each include and/or function call adds one to the stack depth level.</dd>

<a name='xdebug_call_class'></a>
<a name='xdebug_call_function'></a>
<a name='xdebug_call_file'></a>
<a name='xdebug_call_line'></a>
<dt>string xdebug_call_class()<br />
string xdebug_call_function()<br />
string xdebug_call_file()<br />
int xdebug_call_line()</dt>
<dd>These four functions return information about the function that called the
current one, or FALSE when there was no previous function.  This example
script:
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     function fix_string(\$a)
 3     {
 4         echo "Called @ ".
 5             xdebug_call_file().
 6             ":".
 7             xdebug_call_line().
 8             " from ".
 9             xdebug_call_function();
10     }
11
12     \$ret = fix_string(array('Derick'));
13 ?>
SCRIPT;
highlight_string($script);
?>
</pre>
prints:
<pre class='example'>
Called @ /home/httpd/html/test/xdebug_caller.php:12 from {main}
</pre>
</dd>
</dl>

<br />
<a name="activation"></a>
<span class="sans">ACTIVATION RELATED</span><br />
<dl>
<a name='xdebug_enable'></a>
<dt>void xdebug_enable()</dt>
<dd>Enable showing stacktraces on error conditions.</dd>

<a name='xdebug_disable'></a>
<dt>void xdebug_disable()</dt>
<dd>Disable showing stacktraces on error conditions.</dd>

<a name='xdebug_is_enabled'></a>
<dt>bool xdebug_is_enabled()</dt>
<dd>Return whether stacktraces would be shown in case of an error or not.</dd>
</dl>


<br />
<a name="tracing"></a>
<span class="sans">TRACING AND EXECUTING RELATED</span><br />
<dl>
<a name='xdebug_start_trace'></a>
<dt>void xdebug_start_trace([string trace_file]) (Xdebug 1)</dt>
<dd>Start tracing function calls from this point. If the trace_file parameter
is specified the function calls will also be logged to this file. Please note
that all function calls are stored in memory here; with large scripts this will
definitely exhaust memory on your machine. In order for this functionality to
be useful it is strongly recommended to turn off the <a
href='docs-settings.php#collect_params'>xdebug.collect_params</a> setting.</dd>

<dt>void xdebug_start_trace(string trace_file [, integer options]) (Xdebug 2)</dt>
<dd>Start tracing function calls from this point to the file in the <i>trace_file</i> parameter.
The trace file will be placed in the directory as configured by the
<a href="docs-settings.php#trace_output_dir">trace_output_dir</a> setting.
The name of the trace file is "{trace_file}.xt". If <a href='docs-settings.php#auto_trace'>auto tracing</a> then the format of the filename is 
"trace.{hash}.xt" where the "{hash}" part depends on the <a
href="docs-settings.php#trace_output_name">trace_output_name</a> setting. The
<i>options</i> parameter is a bitfield; currently there are two options:
"XDEBUG_TRACE_APPEND" (1) makes the trace file open in append mode rather than
overwrite mode and "XDEBUG_TRACE_COMPUTERIZED" (2) creates a trace file with
the format as described under <i>1</i> <a
href='docs-settings.php#trace_format'>here</a>. Unlike Xdebug 1, Xdebug 2 will
not store function calls in memory, but always only write to disk to relieve
the pressure on used memory. The settings <a
href='docs-settings.php#collect_includes'>collect_includes</a>, <a
href='docs-settings.php#collect_params'>collect_params</a> and <a
href='docs-settings.php#collect_return'>collect_return</a> influence what
information is logged to the trace file and the setting <a
href='docs-settings.php#trace_format'>trace_format</a> influences the format of
the trace file.</dd>

<a name='xdebug_stop_trace'></a>
<dt>void xdebug_stop_trace() (Xdebug 1)</dt>
<dd>Stop tracing function calls and destroys the trace currently in memory.</dd>

<dt>void xdebug_stop_trace() (Xdebug 2)</dt>
<dd>Stop tracing function calls and closes the tracefile.</dd>

<a name='xdebug_get_function_trace'></a>
<dt>array xdebug_get_function_trace() (Xdebug 1)</dt>
<dd>Returns all function calls since <i>xdebug_start_trace()</i>. For the
following script:
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     xdebug_start_trace();
 3     function fix_string(\$a)
 4     {
 5         echo "Called @ ".
 6             xdebug_call_file().
 7             ":".
 8             xdebug_call_line().
 9             " from ".
10             xdebug_call_function();
11     }
12 
13     \$ret = fix_string(array('Derick'));
14     var_dump(xdebug_get_function_trace());
15 ?>
SCRIPT;
highlight_string($script);
?>
</pre>
returns an array in which each element represents one function call (much like
the stack trace) above. Each element contains the following information:
<pre class='example'>
  array(6) {
    ["function"]=&gt;
    string(10) "fix_string"
    ["file"]=&gt;
    string(39) "/home/httpd/html/test/xdebug_caller.php"
    ["line"]=&gt;
    int(13)
    ["time_index"]=&gt;
    float(0)
    ["memory_usage"]=&gt;
    int(37720)
    ["params"]=&gt;
    array(1) {
      [1]=&gt;
      string(21) "array (0 =&gt; 'Derick')"
    }
  }
</pre>
</dd>

<a name='dump_function_trace'></a>
<dt>void xdebug_dump_function_trace() (Xdebug 1)</dt>
<dd>If you don't want to return the information in an array, but simply want to
display the trace information you can use this function.  If we modify line 14
of the example above to say
<pre>
<?php
$script = <<<SCRIPT
 1 <?php
14     xdebug_dump_function_trace();
15 ?>
SCRIPT;
highlight_string($script);
?>
</pre>
the following table with information is shown:
<table border='1' cellspacing='0'>
<tr><th bgcolor='#aaaaaa' colspan='5'>Function trace</th></tr>
<tr><th bgcolor='#cccccc'>Time</th><th bgcolor='#cccccc'>#</th><th bgcolor='#cccccc'>Function</th><th bgcolor='#cccccc'>Location</th><th bgcolor='#cccccc'>Memory</th></tr>
<tr><td bgcolor='#ffffff' align='center'>0</td><td bgcolor='#ffffff' align='left'><pre>  -></pre></td><td bgcolor='#ffffff'>fix_string(array (0 =&gt; &#039;Derick&#039;))</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_caller.php<b>:</b>13</td><td bgcolor='#ffffff' align='right'>37352</td></tr>

<tr><td bgcolor='#ffffff' align='center'>0.000096</td><td bgcolor='#ffffff' align='left'><pre>    -></pre></td><td bgcolor='#ffffff'><a href='http://uk.php.net/xdebug_call_file' target='_new'>xdebug_call_file</a>
()</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_caller.php<b>:</b>6</td><td bgcolor='#ffffff' align='right'>37408</td></tr>
<tr><td bgcolor='#ffffff' align='center'>0.000117</td><td bgcolor='#ffffff' align='left'><pre>    -></pre></td><td bgcolor='#ffffff'><a href='http://uk.php.net/xdebug_call_line' target='_new'>xdebug_call_line</a>
()</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_caller.php<b>:</b>8</td><td bgcolor='#ffffff' align='right'>37464</td></tr>

<tr><td bgcolor='#ffffff' align='center'>0.000137</td><td bgcolor='#ffffff' align='left'><pre>    -></pre></td><td bgcolor='#ffffff'><a href='http://uk.php.net/xdebug_call_function' target='_new'>xdebug_call_function</a>
()</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_caller.php<b>:</b>10</td><td bgcolor='#ffffff' align='right'>37472</td></tr>
</table>

<a name='xdebug_get_tracefile_name'></a>
<dt>string xdebug_get_tracefile_name() (Xdebug 2)</dt>
<dd>Returns the name of the file which is used to trace the output of this
script too. This is useful when <a href='docs-settings.php#auto_trace'>auto
tracing</a> is used.</dd>

<a name="xdebug_memory_usage"></a>
<dt>int xdebug_memory_usage()</dt>
<dd>Returns the current amount of memory the script uses. (Only works when PHP
was compiled with --enable-memory-limit).</dd>

<a name="xdebug_peak_memory_usage"></a>
<dt>int xdebug_peak_memory_usage() (Xdebug 2)</dt>
<dd>Returns the maximum amount of memory the script used up til now. (Only
works when PHP was compiled with --enable-memory-limit).</dd>

<a name="xdebug_time_index"></a>
<dt>float xdebug_time_index()</dt>
<dd>Returns the current time index since the starting of the script in
seconds.</dd>
</dl>
</p>

<br />
<a name="coverage"></a>
<span class="sans">CODE COVERAGE RELATED</span><br />
<dl>
<a name='xdebug_start_code_coverage'></a>
<dt>void xdebug_start_code_coverage([int options])</dt>
<dd><p>This function starts gathering the information for code coverage. The
information that is collected constists of an two dimensional array with as
primairy index the executed filename and as secondairy key the line number. The
value in the elements represents the total number of execution units on this
line have been executed.</p>
<p>Options to this function are:
<dl>
<dt>XDEBUG_CC_UNUSED</dt>
<dd>Enables scanning of code to figure out which line has executable code.</dd>
<dt>XDEBUG_CC_DEAD_CODE</dt>
<dd>Enables branch analyzation to figure out whether code can be executed.</dd>
</dl>
</p>
</dd>

<a name='xdebug_stop_code_coverage'></a>
<dt>void xdebug_stop_code_coverage()</dt>
<dd>This function stops collecting information, the information in memory will
not be destroyed so that you can resume the gathering of information with the
<i>xdebug_start_code_coverage()</i> function again.</dd>

<a name='xdebug_get_code_coverage'></a>
<dt>array xdebug_get_code_coverage()</dt>
<dd>Returns a structure which contains information about how many times an
execution units were executed on the specified line in your script (including
include files). The following example:
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     xdebug_start_code_coverage();
 3 
 4     function a(\$a) {
 5         echo \$a * 2.5;
 6     }
 7 
 8     function b(\$count) {
 9         for (\$i = 0; \$i < \$count; \$i++) {
10             a(\$i + 0.17);
11         }
12     }
13 
14     b(6);
15     b(10);
16 
17     var_dump(xdebug_get_code_coverage());
18 ?>  
SCRIPT;
highlight_string($script);
?>
</pre>
returns this array:
<pre class='example'>
array(1) {
  ["/home/httpd/html/test/xdebug_coverage.php"]=&gt;
  array(10) {
    [4]=&gt;
    int(1)
    [5]=&gt;
    int(16)
    [6]=&gt;
    int(16)
    [8]=&gt;
    int(1)
    [9]=&gt;
    int(20)
    [10]=&gt;
    int(16)
    [12]=&gt;
    int(2)
    [14]=&gt;
    int(1)
    [15]=&gt;
    int(1)
    [17]=&gt;
    int(1)
  }
}</pre>
</dd>

<a name='xdebug_get_function_count'></a>
<dt>int xdebug_get_function_count()</dt>
<dd>This function returns the number of functions called since the beginning of
the script, including the call to <i>xdebug_get_function_count()</i> itself.
</dl>

<br />
<a name="profile"></a>
<a name='xdebug_dump_function_profile'></a>
<a name='xdebug_get_function_profile'></a>
<a name='xdebug_start_profiling'></a>
<a name='xdebug_stop_profiling'></a>
<span class="sans">PROFILING RELATED</span><br />
<dl>
<dt>void xdebug_start_profiling() (Xdebug 1)<br />
void xdebug_stop_profiling() (Xdebug 1)<br />
void xdebug_dump_function_profile([int profiling_mode]) (Xdebug 1)<br />
array xdebug_get_function_profile([int profiling_mode]) (Xdebug 1)</dt>
<dd>Please see the section on <a href='docs-profiling.php'>Profiling (Xdebug
1)</a> for information about these functions or <a
href='docs-profiling2.php'>Profiling (Xdebug 2)</a>.

<a name='xdebug_get_profiler_filename'></a>
<dt>string xdebug_get_profiler_filename() (Xdebug 2)</dt>
<dd>Returns the name of the file which is used to save profile information to.
script too.</dd>

</dl>

<a name="superglobals"></a>
<span class="sans">INFORMATION DUMPING RELATED</span><br />
<dl>
<a name="xdebug_debug_zval"></a>
<dt>void xdebug_debug_zval([string varname [, ...]])</dt>
<dd>This function displays structured information about one or more expressions
that includes its type, value and refcount information. Arrays are explored
recursively with values.
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     \$a = array(1, 2, 3);
 3     \$b =& \$a;
 4     \$c =& \$a[2];
 5
 6     xdebug_debug_zval('a');
 7 ?>
SCRIPT;
highlight_string($script);
?>
</pre>
displays (in a browser):
<br />
<br />
<img src='images/debug_zval.png' align='center' border='0'/>
<br />
<br />
On the command line it displays:
<pre class="example">
a: (refcount=2, is_ref=1)=array (
	0 =&gt; (refcount=1, is_ref=0)=1, 
	1 =&gt; (refcount=1, is_ref=0)=2, 
	2 =&gt; (refcount=2, is_ref=1)=3)
</pre>
</dd>

<a name="xdebug_debug_zval_stdout"></a>
<dt>void xdebug_debug_zval_stdout([string varname [, ...]])</dt>
<dd>This function displays structured information about one or more expressions
that includes its type, value and refcount information. Arrays are explored
recursively with values. Differences with <a
href="#xdebug_debug_zval">xdebug_debug_zval()</a> are that information is not
displayed through a webserver API layer, but directly shown on stdout (so that
when you run it with apache in single process mode it ends up on the console).
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     \$a = array(1, 2, 3);
 3     \$b =& \$a;
 4     \$c =& \$a[2];
 5
 6     xdebug_debug_zval_stdout('a');
 7 ?>
SCRIPT;
highlight_string($script);
?>
</pre>
displays (on the command line):
<pre class="example">
a: (refcount=2, is_ref=1)=array (
	0 =&gt; (refcount=1, is_ref=0)=1, 
	1 =&gt; (refcount=1, is_ref=0)=2, 
	2 =&gt; (refcount=2, is_ref=1)=3)
</pre>
</dd>

<dt>void xdebug_dump_superglobals()</dt>
<dd>This function dumps the values of the elements of the superglobals as
specifed with the 'xdebug.dump.' php.ini settings as decribed in the section <a
href='docs-settings.php#superglobal'>settings</a>. An example output might look like (the
only ini setting that is made for this is 'xdebug.dump.SERVER = REMOTE_ADDR'):
<table border='1' cellspacing='0'>
<tr><th colspan='3' bgcolor='#aaaaaa'>Dump $_SERVER</th></tr>
<tr><td colspan='2' bgcolor='#ffffff'>$_SERVER['REMOTE_ADDR']</td><td bgcolor='#ffffff'>'127.0.0.1'</td></tr>
</table>
</dd>

<a name="xdebug_var_dump"></a>
<dt>void xdebug_var_dump([mixed var [, ...]])</dt>
<dd>This function displays structured information about one or more expressions
that includes its type and value. Arrays are explored recursively with values
<pre class='example'><?php
$script = <<<SCRIPT
 1 <?php
 2     var_dump(
 3         array(
 4             array(TRUE, FALSE, 3), 
 5             'twee' => array('4', NULL, '6')
 6         )
 7     );
 8 ?>  
SCRIPT;
highlight_string($script);
?>
</pre>
displays:
<br />
<br />
<img src='images/vardump.png' align='center' border='0'/>
</dd>

</dl>

<br />
<a name="debug"></a>
<span class="sans">REMOTE DEBUGGING RELATED</span><br />
<dl>
<a name='xdebug_break'></a>
<dt>bool xdebug_break() (Xdebug 2)</dt>
<dd>This function makes the debugger break on the specific line as if a normal
file/line breakpoint was set on this line.</dd>
</dl>

</dl>

<br /><br />

<!-- MAIN FEATURE END -->

			</span></td>
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>
<?php include "include/side.php"; ?>
						</td>
					</tr>
				</table>
			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
