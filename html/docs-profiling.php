<?php $title = "Xdebug: Documentation - Profiler"; include "include/header.php"; hits ('xdebug-docs-profiler'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - PROFILER</span><br />

<?php include "include/menu-docs.php"; ?>

<a name="introduction"></a>
<span class="sans">INTRODUCTION</span><br />

<p>Xdebug's Profiler is a powerful tool that gives you the ability to analyze your PHP code
and determine bottlenecks or generally see which parts of your code are slow and could use a speed
boost. The profiler offers a number of output modes, that are suited for a variety of tasks when
analyzing code. Thus allowing you to select the output that would be most suited for your needs.
Even output itself can be retrieved in number of ways to allow for maximum flexibility.</p>

<a name="starting"></a>
<span class="sans">STARTING THE PROFILER</span><br />

<p>The first step in profiling your code is enabling of the profiler, which
will make Xdebug time all subsequent function calls, thus creating a pool of
data from which the reports can be generated. This can be accomplished in two
ways, via the use of the <i>xdebug_start_profiling()</i> function, which will
begin profiling code from that point on, this is particularly useful when you
have very large script and you only want to profile a particular portion of the
script you suspect to be slow.  This function has a single optional parameter
that allows you to specify the file where the profiling data will be written
to. The other way to enable to profiler, is via the xdebug.auto_profile ini
option that should be set to 'On' or '1', this will automatically start the
profiler upon PHP initialization. The one advantage of this method is that it
will allow you to use the profiler without having to modify any of your PHP
code as described in the <a href="#auto_profile">automatic profiling
section</a>.</p>

<a name="retrieve"></a>
<span class="sans">GENERATING RETRIEVING OUTPUT</span><br />
<p>Now that you've enabled the profiler, you undoubtly want to see profile
generated from your code, amazingly Xdebug's profiler can do that too. When
generating a profile you have two functions at your disposal, <i><a
href='docs.php#dump_function_profile'>xdebug_dump_function_profile()</a></i>, which
will output the profiling data to screen or write it to a file if one was
specified in <i>xdebug_start_profiling()</i>. The other function,
<i>xdebug_get_function_profile()</i> will instead return an array of data
containing the profile data. Both of the functions take an optional parameter
that allows you to specify what sort of output would you like to see, if this
parameter is not specified line by line profile mode will be assumed.  Xdebug
supports nine profiling modes, which you can use:<a name="modes"> </a></p>
	<dl>
	<dt>XDEBUG_PROFILER_LBL (0) <i>default</i></dt>
	<dd>
		Line by Line Profile, this is the simplest profiling mode that will
		display the profiling data sorted by line numbers from smallest to
		greatest. This profile mode can be used to give you a quick overview of
		your code's flow as the script progresses, to give you some a general
		idea about which section(s) of the code optimization efforts should
		focus on.
<pre>Execution Time Profile (sorted by line numbers)
-----------------------------------------------------------------------------------
Time Taken    Number of Calls    Function Name    Location
-----------------------------------------------------------------------------------
0.0000340665    2    		explode()    		/home/xdebug/xdebug.php:6
0.0000150350    4    		nl2br()    		/home/xdebug/xdebug.php:12
0.0001199535    4    		rand()    		/home/xdebug/xdebug.php:13
0.0001839586    2    		*test1()    		/home/xdebug/xdebug.php:19
0.0000139773    2    		urldecode()    		/home/xdebug/xdebug.php:20
0.0004100119    1    		*test2()    		/home/xdebug/xdebug.php:25
0.0001000143    1    		*test1()    		/home/xdebug/xdebug.php:26
0.0000079440    1    		urlencode()    		/home/xdebug/xdebug.php:27
0.0003639493    1    		*test1()    		/home/xdebug/xdebug.php:31
0.0004080450    1    		*test2()    		/home/xdebug/xdebug.php:32
0.0011209481    1    		*test3()    		/home/xdebug/xdebug.php:33
0.0000040240    2    		urlencode()    		/home/xdebug/xdebug.php:35
0.0000040759    2    		urldecode()    		/home/xdebug/xdebug.php:35
0.0000989963    1    		*my_class::my_method()  /home/xdebug/xdebug.php:37
0.0000950349    1    		*my_class-&gt;my_method()  /home/xdebug/xdebug.php:40
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006059408
Function Execution:     0.0020950735
Ambient Code Execution: 0.0017508566
Total Execution:                              0.0038459301
-----------------------------------------------------------------------------------
Total Processing:                             0.0044518709
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_CPU (1)</dt>
	<dd>
		Execution Time Profile, this is essentially the same profile as line by
		line, with one notable exception, the function calls are sorted by the
		amount of time they took to execute, from greatest to smallest.
<pre>Execution Time Profile (sorted by execution time)
-----------------------------------------------------------------------------------
Time Taken    Number of Calls    Function Name    Location
-----------------------------------------------------------------------------------
0.0011400494    1    		*test3()    		/home/xdebug/xdebug.php:33
0.0004169873    1    		*test2()    		/home/xdebug/xdebug.php:25
0.0004149413    1    		*test2()    		/home/xdebug/xdebug.php:32
0.0003599648    1    		*test1()    		/home/xdebug/xdebug.php:31
0.0001859359    2    		*test1()    		/home/xdebug/xdebug.php:19
0.0001190009    4    		rand()    		/home/xdebug/xdebug.php:13
0.0001020225    1    		*test1()    		/home/xdebug/xdebug.php:26
0.0001009721    1    		*my_class-&gt;my_method()  /home/xdebug/xdebug.php:40
0.0001000044    1    		*my_class::my_method()  /home/xdebug/xdebug.php:37
0.0000360514    2    		explode()    		/home/xdebug/xdebug.php:6
0.0000180626    4    		nl2br()    		/home/xdebug/xdebug.php:12
0.0000130670    2    		urldecode()    		/home/xdebug/xdebug.php:20
0.0000079719    1    		urlencode()    		/home/xdebug/xdebug.php:27
0.0000050391    2    		urldecode()    		/home/xdebug/xdebug.php:35
0.0000049872    2    		urlencode()    		/home/xdebug/xdebug.php:35
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006799698
Function Execution:     0.0021259584
Ambient Code Execution: 0.0019040309
Total Execution:                              0.0040299892
-----------------------------------------------------------------------------------
Total Processing:                             0.0047099590
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_NC (2)</dt>
	<dd>
		When the profiler encounters the same function being called on the same
		line it will merge the calls to this function on that line into a
		single entry. This profile mode, which is virtually identical to the
		line by line profile will sort the profiler data based on number of
		calls to the same function on the same line. Since it is very rare that
		you would call the same function on the same line more then once and
		usually signifies unnecessary code this profile mode enables you to
		quickly detect and resolve such oversights.
<pre>Execution Time Profile (sorted by number of calls to each function)
-----------------------------------------------------------------------------------
Time Taken    Number of Calls    Function Name    Location
-----------------------------------------------------------------------------------
0.0000159692    4    		nl2br()    		/home/xdebug/xdebug.php:12
0.0001198878    4    		rand()    		/home/xdebug/xdebug.php:13
0.0001859986    2    		*test1()    		/home/xdebug/xdebug.php:19
0.0000120371    2    		urldecode()    		/home/xdebug/xdebug.php:20
0.0000050035    2    		urlencode()    		/home/xdebug/xdebug.php:35
0.0000030289    2    		urldecode()    		/home/xdebug/xdebug.php:35
0.0000349601    2    		explode()    		/home/xdebug/xdebug.php:6
0.0003639730    1    		*test1()    		/home/xdebug/xdebug.php:31
0.0004119959    1    		*test2()    		/home/xdebug/xdebug.php:32
0.0011400576    1    		*test3()    		/home/xdebug/xdebug.php:33
0.0004149689    1    		*test2()    		/home/xdebug/xdebug.php:25
0.0001019578    1    		*test1()    		/home/xdebug/xdebug.php:26
0.0000079801    1    		urlencode()    		/home/xdebug/xdebug.php:27
0.0000990126    1    		*my_class::my_method()	/home/xdebug/xdebug.php:37
0.0000920247    1    		*my_class-&gt;my_method()	/home/xdebug/xdebug.php:40
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006610155
Function Execution:     0.0021150962
Ambient Code Execution: 0.0017679080
Total Execution:                              0.0038830042
-----------------------------------------------------------------------------------
Total Processing:                             0.0045440197
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_FS_AV (3)</dt>
	<dd>
		Average Execution Time Profile, all calls to the same function will be
		merged into a single entry and the output will be sorted based on the
		average time each function took to execute, sorted from greatest to
		smallest. This is probably one of the more useful profiling modes
		because it allows you to immediately see, which functions are slow and
		could use improvement. 
<pre>Function Summary Profile (sorted by avg. execution time)
-----------------------------------------------------------------------------------
Total Time Taken    Avg. Time Taken    Number of Calls    Function Name
-----------------------------------------------------------------------------------
0.0011290550		0.0011290550    1    		*test3
0.0008260127    	0.0004130063    2    		*test2
0.0006610128    	0.0001652532    4    		*test1
0.0000969507    	0.0000969507    1    		*my_class::my_method
0.0000930356    	0.0000930356    1    		*my_class-&gt;my_method
0.0001200305    	0.0000300076    4    		rand
0.0000340019    	0.0000170009    2    		explode
0.0000180922    	0.0000045230    4    		nl2br
0.0000169771    	0.0000042443    4    		urldecode
0.0000108776    	0.0000036259    3    		urlencode
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006699562
Function Execution:     0.0028060668
Ambient Code Execution: 0.0019309527
Total Execution:                              0.0047370195
-----------------------------------------------------------------------------------
Total Processing:                             0.0054069757
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_FS_SUM (4)</dt>
	<dd>
		Total Execution Time Profile is almost identical to the Average
		Execution Time Profile, except this the output is sorted based on the
		total time calls to a certain function took. Once again a very useful
		profile, because it allows you to see the cumulative effect of calling
		a particular function. 
<pre>Function Summary Profile (sorted by total execution time)
-----------------------------------------------------------------------------------
Total Time Taken    Avg. Time Taken    Number of Calls    Function Name
-----------------------------------------------------------------------------------
0.0011480325		0.0011480325    1		*test3
0.0008310004    	0.0004155002    2    		*test2
0.0006590472    	0.0001647618    4    		*test1
0.0001198993    	0.0000299748    4    		rand
0.0001020202    	0.0001020202    1    		*my_class::my_method
0.0000939792    	0.0000939792    1    		*my_class-&gt;my_method
0.0000349618    	0.0000174809    2    		explode
0.0000179582    	0.0000044896    4    		urldecode
0.0000168881    	0.0000042220    4    		nl2br
0.0000140202    	0.0000046734    3    		urlencode
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006710291
Function Execution:     0.0028340796
Ambient Code Execution: 0.0010519048
Total Execution:                              0.0038859844
-----------------------------------------------------------------------------------
Total Processing:                             0.0045570135
-----------------------------------------------------------------------------------
</pre>
	</dd>
	
	<dt>XDEBUG_PROFILER_FS_NC (5)</dt>
	<dd>
		Number of Total Function Calls Profile, will generate a profile similar
		to Average Execution Time Profile, with the one exception of sorting
		the data based on the number of calls to a particular function in the
		entire script. This is very useful in determining, what common
		functions are used, so that you can either optimize their usage or try
		to reduce the number of calls to those functions.
<pre>Function Summary Profile (sorted by number of function calls)
-----------------------------------------------------------------------------------
Total Time Taken    Avg. Time Taken    Number of Calls    Function Name
-----------------------------------------------------------------------------------
0.0006480337		0.0001620084    4		*test1
0.0000170538		0.0000042634    4		nl2br
0.0001189921		0.0000297480    4		rand
0.0000178726		0.0000044682    4		urldecode
0.0000129334		0.0000043111    3		urlencode
0.0008320169		0.0004160085    2		*test2
0.0000360191		0.0000180096    2		explode
0.0011299478		0.0011299478    1		*test3
0.0000999627		0.0000999627    1		*my_class::my_method
0.0000950211		0.0000950211    1		*my_class-&gt;my_method
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006769896
Function Execution:     0.0028049822
Ambient Code Execution: 0.0010719423
Total Execution:                              0.0038769245
-----------------------------------------------------------------------------------
Total Processing:                             0.0045539141
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_SD_LBL (6)</dt>
	<dd>
		Line by Line Stack Profile, this profile allows you to see the
		execution tree of the functions used in the script, allowing you to see
		the 'flow' of the script and how long each portion took.
<pre>Stack-Dump Profile (sorted by line numbers)
-----------------------------------------------------------------------------------
Time Taken    Number of Calls    Function Name    Location
-----------------------------------------------------------------------------------
-&gt; 0.0003680030		1    	*test1    		/home/xdebug/xdebug.php:31
  -&gt; 0.0000080075	1    	nl2br    		/home/xdebug/xdebug.php:12
  -&gt; 0.0000570465	1    	rand    		/home/xdebug/xdebug.php:13
-&gt; 0.0004180456		1    	*test2    		/home/xdebug/xdebug.php:32
  -&gt; 0.0000920291	1    	*test1    		/home/xdebug/xdebug.php:19
    -&gt; 0.0000020409	1    	nl2br    		/home/xdebug/xdebug.php:12
    -&gt; 0.0000210007	1    	rand    		/home/xdebug/xdebug.php:13
  -&gt; 0.0000089724	1    	urldecode    		/home/xdebug/xdebug.php:20
-&gt; 0.0011370147		1    	*test3    		/home/xdebug/xdebug.php:33
  -&gt; 0.0004100254	1    	*test2    		/home/xdebug/xdebug.php:25
    -&gt; 0.0000909565	1    	*test1    		/home/xdebug/xdebug.php:19
      -&gt; 0.0000030213	1    	nl2br    		/home/xdebug/xdebug.php:12
      -&gt; 0.0000210275	1    	rand    		/home/xdebug/xdebug.php:13
    -&gt; 0.0000050053	1    	urldecode    		/home/xdebug/xdebug.php:20
  -&gt; 0.0000990143	1    	*test1    		/home/xdebug/xdebug.php:26
    -&gt; 0.0000030192	1    	nl2br    		/home/xdebug/xdebug.php:12
    -&gt; 0.0000200254	1    	rand    		/home/xdebug/xdebug.php:13
  -&gt; 0.0000089903	1    	urlencode    		/home/xdebug/xdebug.php:27
-&gt; 0.0000050170		2    	urlencode    		/home/xdebug/xdebug.php:35
-&gt; 0.0000039961		2    	urldecode    		/home/xdebug/xdebug.php:35
-&gt; 0.0001009962		1    	*my_class::my_method    /home/xdebug/xdebug.php:37
  -&gt; 0.0000350595	2    	explode    		/home/xdebug/xdebug.php:6
-&gt; 0.0000929551		1    	*my_class-&gt;my_method    /home/xdebug/xdebug.php:40
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006819963
Function Execution:     0.0021260276
Ambient Code Execution: 0.0017579303
Total Execution:                              0.0038839579
-----------------------------------------------------------------------------------
Total Processing:                             0.0045659542
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_SD_CPU (7)</dt>
	<dd>
		Execution Time Stack Profile, nearly identical to Line by Line Stack
		Profile, only now the stack segments are sorted based on the time it
		took to execute each portion of the code. 
<pre>Function Summary Profile (sorted by total execution time)
-----------------------------------------------------------------------------------
Total Time Taken    Avg. Time Taken    Number of Calls    Function Name
-----------------------------------------------------------------------------------
0.0011480325		0.0011480325    1		*test3
0.0008310004    	0.0004155002    2    		*test2
0.0006590472    	0.0001647618    4    		*test1
0.0001198993    	0.0000299748    4    		rand
0.0001020202    	0.0001020202    1    		*my_class::my_method
0.0000939792    	0.0000939792    1    		*my_class-&gt;my_method
0.0000349618    	0.0000174809    2    		explode
0.0000179582    	0.0000044896    4    		urldecode
0.0000168881    	0.0000042220    4    		nl2br
0.0000140202    	0.0000046734    3    		urlencode
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006710291
Function Execution:     0.0028340796
Ambient Code Execution: 0.0010519048
Total Execution:                              0.0038859844
-----------------------------------------------------------------------------------
Total Processing:                             0.0045570135
-----------------------------------------------------------------------------------
</pre>
	</dd>

	<dt>XDEBUG_PROFILER_SD_NC (8)</dt>
	<dd>
		Total Function Calls Stack Profile, same as above, only sorted by
		number of function calls this time.
<pre>Stack-Dump Profile (sorted by number of calls to each function)
-----------------------------------------------------------------------------------
Time Taken    Number of Calls    Function Name    Location
-----------------------------------------------------------------------------------
-&gt; 0.0000039770		2    urlencode    		/home/xdebug/xdebug.php:35
-&gt; 0.0000039561    	2    urldecode    		/home/xdebug/xdebug.php:35
-&gt; 0.0003650197    	1    *test1    			/home/xdebug/xdebug.php:31
  -&gt; 0.0000080243    	1    nl2br    			/home/xdebug/xdebug.php:12
  -&gt; 0.0000560168    	1    rand    			/home/xdebug/xdebug.php:13
-&gt; 0.0004209431    	1    *test2    			/home/xdebug/xdebug.php:32
  -&gt; 0.0000949730    	1    *test1    			/home/xdebug/xdebug.php:19
    -&gt; 0.0000030310    	1    nl2br    			/home/xdebug/xdebug.php:12
    -&gt; 0.0000210372    	1    rand    			/home/xdebug/xdebug.php:13
  -&gt; 0.0000080552    	1    urldecode    		/home/xdebug/xdebug.php:20
-&gt; 0.0011389715    	1    *test3    			/home/xdebug/xdebug.php:33
  -&gt; 0.0004159557    	1    *test2    			/home/xdebug/xdebug.php:25
    -&gt; 0.0000939794    	1    *test1    			/home/xdebug/xdebug.php:19
      -&gt; 0.0000029448	1    nl2br    			/home/xdebug/xdebug.php:12
      -&gt; 0.0000220239	1    rand    			/home/xdebug/xdebug.php:13
    -&gt; 0.0000039751    	1    urldecode    		/home/xdebug/xdebug.php:20
  -&gt; 0.0001020174    	1    *test1    			/home/xdebug/xdebug.php:26
    -&gt; 0.0000030422    	1    nl2br    			/home/xdebug/xdebug.php:12
    -&gt; 0.0000210020    	1    rand    			/home/xdebug/xdebug.php:13
  -&gt; 0.0000079669    	1    urlencode    		/home/xdebug/xdebug.php:27
-&gt; 0.0001040191    	1    *my_class::my_method	/home/xdebug/xdebug.php:37
  -&gt; 0.0000349330    	2    explode    		/home/xdebug/xdebug.php:6
-&gt; 0.0000930509    	1    *my_class-&gt;my_method	/home/xdebug/xdebug.php:40
-----------------------------------------------------------------------------------
Opcode Compiling:                             0.0006530285
Function Execution:     0.0021299374
Ambient Code Execution: 0.0017641532
Total Execution:                              0.0038940907
-----------------------------------------------------------------------------------
Total Processing:                             0.0045471191
-----------------------------------------------------------------------------------
</pre>
	</dd>
</dl>	
<p>
You can use the constant listed above as the parameter to
<i>xdebug_get_function_profile()</i> and <i>xdebug_dump_function_trace()</i>.
</p>

<a name="stopping"></a>
<span class="sans">STOPPING PROFILER</span><br />
<p>
To stop the profiler you can use the <i>xdebug_stop_profiling()</i> this will
make Xdebug stop timing the function execution times and clear all existing
profiling data in memory.
</p>
<!-- MAIN FEATURE END -->

<a name="automatic"></a>
<span class="sans">AUTOMATIC PROFILING</span><br />
<p>
As previously mentioned you can profile your code without having to modify each
one of your script with profiling functions. To do this you need to specify
three options inside your php.ini or inside your virtual host or .htaccess if
you are using Apache web server. These three options are:
</p>
<ul>
<li>xdebug.auto_profile [1|On | 0|Off]</li>
<li>xdebug.auto_profile_mode [profile mode, integer]</li>
<li>xdebug.output_dir [string]</li>
</ul>	

<a name="misc"></a>
<span class="sans">MISCELLANEOUS</span><br />
<p>
You may notice that certain functions have '*' preceding their name, this means
that this function is not a PHP native function, but rather a function
initialized by script itself. Since it is generally easier to optimize PHP code
rather the C source, this will give you a clue as to which functions can be
optimized easily and which may require you to dabble in PHP's C source code.
</p>
<p>
When class methods are displayed they may sometimes appears as
<i>class_name::method()</i> or <i>class_name-&gt;method()</i>. If '-&gt;' is
used to separate the class name from the method name it means that method is
public, otherwise it means that the method is private.
</p>
<p>
If you are profiling your code in a web enviroment then
<i><a href='docs.php#dump_function_trace'>xdebug_dump_function_trace()</a></i> will output the data as HTML rather then
plain text as it would if you were using CLI or told the profiler to write the
data to disk. This will allow the data to be properly displayed in your
browser.
</p>

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
