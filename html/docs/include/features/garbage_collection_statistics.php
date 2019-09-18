<h2 name="introduction">Introduction</h2>

<p><i>New in Xdebug 2.6</i></p>

<p>Garbage Collection (GC) in PHP can have a serious impact on memory and performance,
so understanding when it is triggered and how efficient each run is, allows
you to optimise your programs. The PHP Engine does not provide a mechanism to
gather statistics about garbage collection, but Xdebug now does.</p>

<p>For the time being, the garbage collection statistics are collected in a human
readable, tabular format only, because there are no tools for this kind of report
that we could generate machine readable output for. Future versions may include
exports in other formats to allow machine processing.</p>

<h2 name="usage">Usage</h2>

<p>There are two approaches to start collecting the GC statistics with two different
use-cases. The first is entirely via INI settings and the primary use-case is to
collect statistics for indiviual CLI script runs (where GC is often an issue).</p>

<p><code>php -dxdebug.gc_stats_enable=1 your_script.php</code></p>

<p>If you wish to collect the garbage collection statistics for every script
that you execute, you can set the [CFG:gc_stats_enable] INI setting on the system
or directory-level. Be aware that activating the collection globally will produce
an output file for <b>every</b> executed script, even if the garbage collector
didn't run.</p>

<p>The second approach to starting collection is to call the function
[FUNC:xdebug_start_gcstats] directly in your PHP script. This gives you
more control over when statistics collection is started.</p>

<p>You can stop collection for both INI and function based approaches by
calling [FUNC:xdebug_stop_gcstats].</p>

<h2 name="output-tabular-text">Tabular Text (Human Readable)</h2>

<p>The default (and only for now) output format of Garbage Collection statistics
is a tabular human readable text output.</p>

<p><code><pre>
Garbage Collection Report
version: 1
creator: xdebug 2.6.0 (PHP 7.2.0)

Collected | Efficiency% | Duration | Memory Before | Memory After | Reduction% | Function
----------+-------------+----------+---------------+--------------+------------+---------
    10000 |    100.00 % |  0.00 ms |       5539880 |       579880 |    79.53 % | bar
    10000 |    100.00 % |  0.00 ms |       5540040 |       580040 |    79.53 % | Garbage::produce
     4001 |     40.01 % |  0.00 ms |       2563048 |       578968 |    77.41 % | gc_collect_cycles
</pre></code></p>

<p>The header contains the version of the report and the version of Xdebug that generated it.</p>

<p>The table itself then contains one row for each garbage collection run each with 7 reported variables:</p>

<ul>
	<li><strong>Collected</strong> &mdash; The number of so called "roots" that have been garbage collected during this run. A "root" is either an PHP object (instance) or an array that is under observation by the Garbage Collector for potential cleanup.</li>
	<li><strong>Efficiency%</strong> &mdash; Is the number of cleared roots divided by 10 000 - a magic number of "roots" when reached triggers PHPs internal garbage collector to run automatically.</li>
	<li><strong>Duration</strong> &mdash; Denotes the duration in milliseconds that this garbage collection run took.</li>
	<li><strong>Memory Before</strong> &mdash; Contains the memory as measured by <code>memory_get_usage()</code> before this GC run was activated.</li>
	<li><strong>Memory After</strong> &mdash; Contains the memory as measured by <code>memory_get_usage()</code> after the GC run was finished.</li>
	<li><strong>Reduction%</strong> &mdash; The percent reduction in memory due to this GC run.</li>
	<li><strong>Function</strong> &mdash; The name of the function or method the GC run was triggered in. If it is <code>gc_collect_cycles()</code> then this means the Garbage Collector was triggered explicitly. All other values indicate the GC was triggered implicitly due to the 10 000 "roots" reached metric of the PHP engine.</li>
</ul>

<p>For details on how PHPs garbage collection works see the <a href="http://php.net/manual/en/features.gc.php">PHP manuals chapter on Garbage Collection</a>.</p>
