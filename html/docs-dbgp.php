<?php $title = "Xdebug: Documentation - Protocol for version 2"; include "include/header.php"; hits ('xdebug-docs-protocol'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - PROTOCOL</span><br />

<?php include "include/menu-docs.php"; ?>

<div class="document" id="dbgp-a-common-debugger-protocol-for-languages-and-debugger-ui-communication">
<h1 class="title">DBGp - A common debugger protocol for languages and debugger UI communication</h1>
<table class="docinfo" frame="void" rules="none">
<col class="docinfo-name" />
<col class="docinfo-content" />
<tbody valign="top">
<tr><th class="docinfo-name">Version:</th>
<td>1.0</td></tr>
<tr><th class="docinfo-name">Status:</th>
<td>draft 13</td></tr>
<tr><th class="docinfo-name">Author:</th>
<td>Shane Caraveo, ActiveState &lt;<a class="reference" href="mailto:shanec&#64;ActiveState.com">shanec&#64;ActiveState.com</a>&gt;</td></tr>
<tr><th class="docinfo-name">Author:</th>
<td>Derick Rethans &lt;<a class="reference" href="mailto:derick&#64;derickrethans.nl">derick&#64;derickrethans.nl</a>&gt;</td></tr>
</tbody>
</table>
<div class="contents topic" id="contents">
<p class="topic-title"><a name="contents">Contents</a></p>
<ul class="simple">
<li><a class="reference" href="#description" id="id28" name="id28">1. Description</a></li>
<li><a class="reference" href="#issues" id="id29" name="id29">1.1 Issues</a></li>
<li><a class="reference" href="#changes" id="id30" name="id30">1.2 Changes</a><ul>
<li><a class="reference" href="#id1" id="id31" name="id31">2003-12-16</a></li>
<li><a class="reference" href="#id2" id="id32" name="id32">2003-12-09</a></li>
<li><a class="reference" href="#id3" id="id33" name="id33">2003-12-05</a></li>
<li><a class="reference" href="#id4" id="id34" name="id34">2003-12-02</a></li>
<li><a class="reference" href="#id5" id="id35" name="id35">2003-11-25</a></li>
<li><a class="reference" href="#id6" id="id36" name="id36">2003-11-24</a></li>
<li><a class="reference" href="#id7" id="id37" name="id37">2003-11-20</a></li>
<li><a class="reference" href="#id8" id="id38" name="id38">2003-11-18</a></li>
<li><a class="reference" href="#id9" id="id39" name="id39">2003-11-12</a></li>
<li><a class="reference" href="#id10" id="id40" name="id40">2003-11-09</a></li>
<li><a class="reference" href="#id11" id="id41" name="id41">2003-11-05</a></li>
<li><a class="reference" href="#id12" id="id42" name="id42">2003-10-15</a></li>
<li><a class="reference" href="#id13" id="id43" name="id43">2003-10-09</a></li>
<li><a class="reference" href="#id14" id="id44" name="id44">2003-10-07</a></li>
<li><a class="reference" href="#id15" id="id45" name="id45">2003-10-06</a></li>
<li><a class="reference" href="#id16" id="id46" name="id46">2003-10-02</a></li>
<li><a class="reference" href="#id17" id="id47" name="id47">2003-09-30</a></li>
</ul>
</li>
<li><a class="reference" href="#requirements" id="id48" name="id48">2. Requirements</a></li>
<li><a class="reference" href="#terminology" id="id49" name="id49">3. Terminology</a></li>
<li><a class="reference" href="#security" id="id50" name="id50">4. Security</a></li>
<li><a class="reference" href="#initiating-a-debugging-session" id="id51" name="id51">5. Initiating a debugging session</a><ul>
<li><a class="reference" href="#just-in-time-debugging-and-debugger-proxies" id="id52" name="id52">5.1 Just in time debugging and debugger proxies</a></li>
<li><a class="reference" href="#multiple-processes-or-threads" id="id53" name="id53">5.2 Multiple Processes or Threads</a></li>
<li><a class="reference" href="#feature-negotiation" id="id54" name="id54">5.3 Feature Negotiation</a><ul>
<li><a class="reference" href="#data-packet-negotiation" id="id55" name="id55">Data packet negotiation</a></li>
<li><a class="reference" href="#asynchronous-communications" id="id56" name="id56">Asynchronous Communications</a></li>
</ul>
</li>
</ul>
</li>
<li><a class="reference" href="#message-packets" id="id57" name="id57">6. Message Packets</a><ul>
<li><a class="reference" href="#why-not-xml-both-ways" id="id58" name="id58">6.1 Why not XML both ways?</a></li>
<li><a class="reference" href="#packet-communications" id="id59" name="id59">6.2 Packet Communications</a></li>
<li><a class="reference" href="#ide-to-debugger-engine-communications" id="id60" name="id60">6.3 IDE to debugger engine communications</a></li>
<li><a class="reference" href="#debugger-engine-to-ide-communications" id="id61" name="id61">6.4 debugger engine to IDE communications</a></li>
<li><a class="reference" href="#debugger-engine-errors" id="id62" name="id62">6.5 debugger engine errors</a></li>
<li><a class="reference" href="#error-codes" id="id63" name="id63">6.5.1 Error Codes</a></li>
<li><a class="reference" href="#file-paths" id="id64" name="id64">6.6 file paths</a></li>
<li><a class="reference" href="#dynamic-code-and-virtual-files" id="id65" name="id65">6.7 Dynamic code and virtual files</a></li>
</ul>
</li>
<li><a class="reference" href="#core-commands" id="id66" name="id66">7. Core Commands</a><ul>
<li><a class="reference" href="#status" id="id67" name="id67">7.1 status</a></li>
<li><a class="reference" href="#feature-get" id="id68" name="id68">7.2 feature_get</a></li>
<li><a class="reference" href="#feature-set" id="id69" name="id69">7.3 feature_set</a></li>
<li><a class="reference" href="#continuation-commands" id="id70" name="id70">7.5 continuation commands</a></li>
<li><a class="reference" href="#breakpoints" id="id71" name="id71">7.6 breakpoints</a><ul>
<li><a class="reference" href="#id18" id="id72" name="id72">7.6.1 breakpoint_set</a></li>
<li><a class="reference" href="#id19" id="id73" name="id73">7.6.2 breakpoint_get</a></li>
<li><a class="reference" href="#id20" id="id74" name="id74">7.6.3 breakpoint_update</a></li>
<li><a class="reference" href="#id21" id="id75" name="id75">7.6.4 breakpoint_remove</a></li>
<li><a class="reference" href="#id22" id="id76" name="id76">7.6.5 breakpoint_list</a></li>
</ul>
</li>
<li><a class="reference" href="#stack-depth" id="id77" name="id77">7.7 stack_depth</a></li>
<li><a class="reference" href="#stack-get" id="id78" name="id78">7.8 stack_get</a></li>
<li><a class="reference" href="#context-names" id="id79" name="id79">7.9 context_names</a></li>
<li><a class="reference" href="#context-get" id="id80" name="id80">7.10 context_get</a></li>
<li><a class="reference" href="#properties-variables-and-values" id="id81" name="id81">7.11 Properties, variables and values</a></li>
<li><a class="reference" href="#data-types" id="id82" name="id82">7.12 Data Types</a><ul>
<li><a class="reference" href="#common-data-types" id="id83" name="id83">7.12.1 Common Data Types</a></li>
<li><a class="reference" href="#typemap-get" id="id84" name="id84">7.12.2 typemap_get</a></li>
</ul>
</li>
<li><a class="reference" href="#property-get-property-set-property-value" id="id85" name="id85">7.13 property_get, property_set, property_value</a></li>
<li><a class="reference" href="#source" id="id86" name="id86">7.14 source</a></li>
<li><a class="reference" href="#stdout-stderr" id="id87" name="id87">7.15 stdout, stderr</a></li>
</ul>
</li>
<li><a class="reference" href="#extended-commands" id="id88" name="id88">8. Extended Commands</a><ul>
<li><a class="reference" href="#stdin" id="id89" name="id89">8.1 stdin</a></li>
<li><a class="reference" href="#break" id="id90" name="id90">8.2 break</a></li>
<li><a class="reference" href="#eval" id="id91" name="id91">8.3 eval</a></li>
<li><a class="reference" href="#spawnpoints" id="id92" name="id92">8.4 spawnpoints</a><ul>
<li><a class="reference" href="#id23" id="id93" name="id93">8.4.1 spawnpoint_set</a></li>
<li><a class="reference" href="#id24" id="id94" name="id94">8.4.2 spawnpoint_get</a></li>
<li><a class="reference" href="#id25" id="id95" name="id95">8.4.3 spawnpoint_update</a></li>
<li><a class="reference" href="#id26" id="id96" name="id96">8.4.4 spawnpoint_remove</a></li>
<li><a class="reference" href="#id27" id="id97" name="id97">8.4.5 spawnpoint_list</a></li>
</ul>
</li>
</ul>
</li>
</ul>
</div>
<div class="section" id="description">
<h1><a class="toc-backref" href="#id28" name="description">1. Description</a></h1>
<p>This document describes a simple protocol for use with language tools
and engines for the purpose of debugging applications.  It does not
describe user interfaces or interactions with the debugger.  The
protocol provides a means of communication between a debugger
engine (scripting engine, vm, etc.) and a debugger IDE (IDE, etc.).
Any references to the debugger IDE UI are recommendations only, and are
provided for additional explanation or as reasoning for specific
design decisions.</p>
</div>
<div class="section" id="issues">
<h1><a class="toc-backref" href="#id29" name="issues">1.1 Issues</a></h1>
<p>1. The handling of proxy errors needs to be clarified.  Without both
IDE and debugger engine supporting commands to be received at
arbitrary times, the proxy may have problems sending error or status
information to either one.  See section 5.1.  We should think a bit
more about what a proxy might need to do.</p>
<p>2. Need to look at specific behaviours and document them.  eg. what
does the debugger engine do once connected?  It should break at the
first possible point, send the init then wait for debugger commands.</p>
</div>
<div class="section" id="changes">
<h1><a class="toc-backref" href="#id30" name="changes">1.2 Changes</a></h1>
<div class="section" id="id1">
<h2><a class="toc-backref" href="#id31" name="id1">2003-12-16</a></h2>
<ul class="simple">
<li>7.6, 8.4 re-write the breakpoint and spawnpoint sections to be clearer</li>
</ul>
</div>
<div class="section" id="id2">
<h2><a class="toc-backref" href="#id32" name="id2">2003-12-09</a></h2>
<ul class="simple">
<li>6.7 new section describing dbgp file protocol</li>
<li>7.6 better document breakpoints</li>
</ul>
</div>
<div class="section" id="id3">
<h2><a class="toc-backref" href="#id33" name="id3">2003-12-05</a></h2>
<ul class="simple">
<li>6 Change the deliminator for command data to '--'.  This conforms to
standard getopt libraries.</li>
<li>7.11 remove the recursive attribute, if an IDE wants to handle
circular references, it can do so based on the address attribute if
the engine provides it.</li>
</ul>
</div>
<div class="section" id="id4">
<h2><a class="toc-backref" href="#id34" name="id4">2003-12-02</a></h2>
<ul class="simple">
<li>7.6 remove breakpoint_enable/disable, and add breakpoint_update
command.  Enable/disable states are changed through breakpoint_update.</li>
<li>8.4 new (optional) spawnpoint commands</li>
</ul>
</div>
<div class="section" id="id5">
<h2><a class="toc-backref" href="#id35" name="id5">2003-11-25</a></h2>
<ul class="simple">
<li>7.6 Change the breakpoint <em>hits</em> and <em>ignore</em> attributes to <em>hit_count</em>,
<em>hit_value</em> and <em>hit_condition</em> to add functionality available in VS.NET
and to simplify usage. Also clarify some other breakpoint attribute legal
values.</li>
</ul>
</div>
<div class="section" id="id6">
<h2><a class="toc-backref" href="#id36" name="id6">2003-11-24</a></h2>
<ul class="simple">
<li>7.5 correct the stop command documentation, stop is 'detach', and
does not allow for continued interaction.  Document how expressions
are returned from breakpoint_get.</li>
<li>7.8 correct old documentation on the stack element.  Add new
attributes: where, cmdbegin, cmdlength.  Provide further documentation
about all the attributes.</li>
</ul>
</div>
<div class="section" id="id7">
<h2><a class="toc-backref" href="#id37" name="id7">2003-11-20</a></h2>
<ul class="simple">
<li>5.1 better define session keys vs. ide key for proxy, document how
proxy works better.</li>
<li>7.6 better document attributes and hit option</li>
</ul>
</div>
<div class="section" id="id8">
<h2><a class="toc-backref" href="#id38" name="id8">2003-11-18</a></h2>
<ul class="simple">
<li>7.1 Clarify stopping and stopped states</li>
<li>7.5 Clarify the stop command</li>
<li>7.6 Remove 'temporary' as a status for breakpoints, make it an option
in the command line.  Remove the 'function' breakpoint type, provide
two new types, 'call' and 'return'.  Add 'hits' option to allow a
breakpoint to be ignored a number of times before being used.</li>
</ul>
</div>
<div class="section" id="id9">
<h2><a class="toc-backref" href="#id39" name="id9">2003-11-12</a></h2>
<ul class="simple">
<li>draft 12</li>
<li>Rest markup tweaks</li>
</ul>
</div>
<div class="section" id="id10">
<h2><a class="toc-backref" href="#id40" name="id10">2003-11-09</a></h2>
<ul class="simple">
<li>draft 11</li>
<li>7.12 new section inserted as 7.12.  This section specifies common
data types, and how to map more specific data types to the the common
types.</li>
<li>7.11 two new optional attributes, classname and facet, that provide
additional hints to the IDE about the nature of the property.  New
key attribute for language specific keys to properties.</li>
<li>6.5 new section, 6.5.1 for defining common error codes.</li>
</ul>
</div>
<div class="section" id="id11">
<h2><a class="toc-backref" href="#id41" name="id11">2003-11-05</a></h2>
<ul class="simple">
<li>spelling fixes</li>
<li>5.1 change proxy options</li>
<li>7.6 clarify breakpoint command options</li>
<li>7.12 fix old text about context names</li>
</ul>
</div>
<div class="section" id="id12">
<h2><a class="toc-backref" href="#id42" name="id12">2003-10-15</a></h2>
<ul class="simple">
<li>6 remove the first NULL in the command structure from IDE to debugger
engine.  This makes dealing with those commands easier.</li>
<li>6.6 NEW File paths must be URI's.</li>
<li>7 source command returns the source for the current context if no
file uri is provided.</li>
<li>7 added sub-item numbering</li>
<li>7.1 clarify the status values</li>
<li>8 added sub-item numbering</li>
</ul>
</div>
<div class="section" id="id13">
<h2><a class="toc-backref" href="#id43" name="id13">2003-10-09</a></h2>
<ul class="simple">
<li>7 remove run_to, unnecessary</li>
<li>7 remove 'step', there is no generic step command</li>
<li>7 clarify continuation commands</li>
<li>7 clarify breakpoints</li>
</ul>
</div>
<div class="section" id="id14">
<h2><a class="toc-backref" href="#id44" name="id14">2003-10-07</a></h2>
<ul class="simple">
<li>more layout changes for reStructuredText</li>
</ul>
</div>
<div class="section" id="id15">
<h2><a class="toc-backref" href="#id45" name="id15">2003-10-06</a></h2>
<ul class="simple">
<li>reformat to <a class="reference" href="http://docutils.sourceforge.net/spec/rst/reStructuredText.html">reStructuredText markup</a></li>
<li>6 clarify message packets</li>
<li>6.3 clarify command packets</li>
<li>7 clarify feature_get/set</li>
<li>7 allow error results on breakpoints if a type of breakpoint
is not supported by a debugger engine.</li>
<li>7 add recursive attribute to properties, and clarify the
address attribute and how recursive data is handled.</li>
<li>7,8 moved stdin to the optional commands section</li>
</ul>
</div>
<div class="section" id="id16">
<h2><a class="toc-backref" href="#id46" name="id16">2003-10-02</a></h2>
<ul class="simple">
<li>5.1 changed proxy error to be the same as that in 6.5</li>
<li>5.1 the IDE and proxy ports have been defined to 9000/9001</li>
<li>5.3 exclude protocol overhead from data size definition</li>
<li>6.2 changed typo 'stdin and stdout' to 'stdout and stderr'</li>
<li>6.5 changed error id to error code</li>
<li>7 removed comments on 'body' from the run commands</li>
<li>7 clarified 'source' command arguments to be optional</li>
<li>7 added 'disable' option to stdin/out/err commands</li>
<li>7 breakpoint arguments and types have been better defined since
not all arguments need to be required for all types</li>
<li>7 the expression breakpoint type has been removed since it is
covered by the conditional breakpoint type</li>
</ul>
</div>
<div class="section" id="id17">
<h2><a class="toc-backref" href="#id47" name="id17">2003-09-30</a></h2>
<ul class="simple">
<li>section numbers added, changes below are marked with the section
number</li>
<li>3 Terminology changed (frontend -&gt; IDE, backend -&gt; debugger engine)</li>
<li>5.1 added response packet from proxy to IDE when IDE issues the
proxyinit command.</li>
<li>5.1 the proxy now adds a proxyclientid to the init packet from
the debugger engine when it passes the packet through to the IDE.</li>
<li>5.1 the proxy must be able to send errors to the IDE, for instance,
if it looses the connection to the debugger engine.</li>
<li>5.1 the proxy must be able to send errors to the Debugger, for
instance, if it looses the connection to the IDE.</li>
<li>5.3 added new section to help better define feature negotiation
with feature_get/set commands.</li>
<li>6 packets have been better defined.  This section has also been
reorganized.</li>
<li>6.2 the communication of packets has been rewritten.</li>
<li>7 feature_get/set have some modifications.</li>
<li>7 context_get and property_* commands have been modified to better
reflect negotiation of features using the feature_get/set commands.</li>
<li>7 property_* commands have been commented a bit more, and an
additional argument is available for paging arrays, etc.</li>
<li>7 The definition of the property tag has been modified</li>
<li>7 stdin command has been modified, the debugger engine may choose
to not redirect stdin.</li>
<li>7 status command modified to support the async state</li>
<li>7 source command now accepts begin and end line arguments for
retrieving only parts of a file.</li>
<li>7 stack_get now defines an enumeration for the stack</li>
<li>8 break command clarified so it can only be sent while the debugger
engine is in a run state.</li>
<li>8 eval can return a property as part of the response</li>
</ul>
</div>
</div>
<div class="section" id="requirements">
<h1><a class="toc-backref" href="#id48" name="requirements">2. Requirements</a></h1>
<ul class="simple">
<li>extensibility, allow for vendor or language specific features</li>
<li>backwards compatibility</li>
<li>firewall and tunneling support</li>
<li>support for multiple languages</li>
<li>support for multiple processes or threads</li>
<li>support for both dynamic and compiled languages</li>
</ul>
</div>
<div class="section" id="terminology">
<h1><a class="toc-backref" href="#id49" name="terminology">3. Terminology</a></h1>
<dl>
<dt>IDE</dt>
<dd>An IDE, or other debugger UI IDE or tool.</dd>
<dt>debugger engine</dt>
<dd>The language engine being debugged.</dd>
<dt>proxy</dt>
<dd>An intermediary demon that acts as a proxy, and may also
implement support for other features such as just in time
debugging, ip security, etc.</dd>
<dt>session</dt>
<dd>a single thread in an application.  multiple threads in an
application will attach separately.</dd>
<dt>TRUE</dt>
<dd>a value defined as TRUE should be a numeric one.</dd>
<dt>FALSE</dt>
<dd>a value defined as FALSE should be a numeric zero.</dd>
<dt>NUM</dt>
<dd>a base 10 numeric value that is stringified.</dd>
</dl>
</div>
<div class="section" id="security">
<h1><a class="toc-backref" href="#id50" name="security">4. Security</a></h1>
<p>It is expected that implementations will provide security, such as ip
filtering, ssh tunneling, etc.  This protocol itself does not provide
a means of securing the debugging session.</p>
</div>
<div class="section" id="initiating-a-debugging-session">
<h1><a class="toc-backref" href="#id51" name="initiating-a-debugging-session">5. Initiating a debugging session</a></h1>
<p>The debugger engine initiates a debugging session.  The debugger engine
will make a connection to a listening IDE, then wait for the IDE to
initiate commands.  The first thing that should happen in a debug
session is that the IDE negotiates features using the
feature_get and feature_set commands.  It is important to negotiate
a shared encoding.  All implementations must at least support UTF-8.
The IDE listens on port 9000 for debugger connections, unless the
IDE is using a proxy, in which case it may listen on any port.  In
that case, the IDE will tell the proxy which port it is listening on.</p>
<div class="section" id="just-in-time-debugging-and-debugger-proxies">
<h2><a class="toc-backref" href="#id52" name="just-in-time-debugging-and-debugger-proxies">5.1 Just in time debugging and debugger proxies</a></h2>
<p>To support proxies and jit demons, the IDE should be configured with
and ip:port pointing to the proxy/jit.  The IDE then makes a
connection when it starts and sends the following command:</p>
<pre class="literal-block">
proxyinit -a ip:port -k ide_key -m [0|1]

-p  the port that the IDE listens for debugging on.  The address
    is retrieved from the connection information.
-k  a IDE key, which the debugger engine will also use in it's
    debugging init command.  this allows the proxy to match
    request to IDE.  Typically the user will provide the
    session key as a configuration item.
-m  this tells the demon that the IDE supports (or doesn't)
    multiple debugger sessions.  if -m is missing, zero or no
    support is default.

proxystop -k ide_key

The IDE sends a proxystop command when it wants the proxy
server to stop listening for it.
</pre>
<p>The proxy should respond with a simple XML statement alerting the
IDE to an error, or the success of the initialization (see section
6.5 for more details on the error element).</p>
<pre class="literal-block">
&lt;proxyinit success=&quot;[0|1]&quot;
           idekey=&quot;{ID}&quot;&gt;
    &lt;error id=&quot;app_specific_error_code&quot;&gt;
        &lt;message&gt;UI Usable Message&lt;/message&gt;
    &lt;/error&gt;
&lt;/proxyinit&gt;
</pre>
<p>Once the IDE has sent this command, and received a confirmation, it
disconnects from the proxy.  The IDE will only connect to the proxy
when it initialy wants to start accepting connections from the proxy,
or when it wants to stop accepting connections from the proxy.</p>
<p>Upon connection to either a IDE or proxy, the debugger engine sends:</p>
<pre class="literal-block">
&lt;init appid=&quot;APPID&quot;
      idekey=&quot;IDE_KEY&quot;
      session=&quot;DBGP_COOKIE&quot;
      thread=&quot;THREAD_ID&quot;
      parent=&quot;PARENT_APPID&quot;
      language=&quot;LANGUAGE_NAME&quot;
      protocol_version=&quot;1.0&quot;
      fileuri=&quot;file://path/to/file&quot;&gt;


appid           defined by the debugger engine
idekey          defined by the user
session         If the environment variable DBGP_COOKIE exists,
                then the init packet MUST contain a session
                attribute with the value of the variable.  This
                allows an IDE to execute a debugger engine, and
                maintain some state information between the
                execution and the protocol connection.  This value
                should not be expected to be set in 'remote'
                debugging situations where the IDE is not in
                control of the process.  
thread_id       the systems thread id
parent_appid    the appid of the application that spawned the
                process.  When an application is executed, it
                should set it's APPID into the environment.
                If an APPID already exists, it should first
                read that value and use it as the PARENT_APPID.
language_name   debugger engine specific, must not contain
                additional information, such as version, etc.
protocol        The highest version of this protocol supported
fileuri         URI of the script file being debugged
</pre>
<p>The IDE responds by dropping socket connection, or starting with
debugger commands.</p>
<p>The init packet may have child elements for additional vendor specific
data.  These are entirely optional and must not effect behaviour
of the debugger interaction.  Suggested child elements include:</p>
<pre class="literal-block">
&lt;engine version=&quot;1.abcd&quot;&gt;product title&lt;/engine&gt;
&lt;author&gt;author&lt;/author&gt;
&lt;company&gt;company&lt;/company&gt;
&lt;license&gt;licensing info&lt;/license&gt;
&lt;url&gt;url&lt;/url&gt;
&lt;copyright&gt;xxx&lt;/copyright&gt;
</pre>
<p>If a proxy receives this packet, it will use the idekey attribute to pass
the request to the correct IDE, or to do some other operation such as
which may be required to implement security or initiate just in time
debugging.  The proxy will add the idekey as a attribute to
the init packet when it passes it through to the IDE.  The proxy may
also add child elements with further information, and must add an
attribute to the init element called 'proxied' with the attribute
value being the ip address of the debugger engine.  This is the only
time the proxy will modify data being passed to the IDE.</p>
<p>If the proxy must send error data to the IDE, it may send an XML
message with the root element named 'proxyerror'.  This message will
be in the format of the error packets defined in 6.3 below.</p>
<p>If the proxy must send error data to the debugger engine, it may
send the proxyerror command defined in section 7 below.</p>
<p>The proxy listens for IDE connections on port 9001, and for debugger
engine connections on port 9000.</p>
</div>
<div class="section" id="multiple-processes-or-threads">
<h2><a class="toc-backref" href="#id53" name="multiple-processes-or-threads">5.2 Multiple Processes or Threads</a></h2>
<p>The debugger protocol is designed to use a separate socket connection
for each process or thread.  The IDE may or may not support
multiple debugger sessions.  If it does not, the debugger engine must
not attempt to start debug sessions for threads, and the IDE should
not accept more than one socket connection for debugging.  The
IDE should tell the debugger engine whether it supports multiple
debugger sessions, the debugger engine should assume that the IDE does
not.</p>
</div>
<div class="section" id="feature-negotiation">
<h2><a class="toc-backref" href="#id54" name="feature-negotiation">5.3 Feature Negotiation</a></h2>
<p>Although the IDE may at any time during the debugging session send
feature_get or feature_set commands, the IDE should be designed to
negotiate the base set of features up front.  Differing languages and
debugger engines may operate in many ways, and the IDE should be
prepared to handle these differences.  Likewise, the IDE may dictate
certain features or capabilities be supported by the debugger engine.
In any case, the IDE should strive to work with all debugger engines
that support this protocol.  Therefore, this section describes a
minimal set of features the debugger engine must support.  These
required features are outlined here in the form of discussion,
actual implementation of feature arguments are detailed in section 7
under the feature_get and feature_set commands.</p>
<div class="section" id="data-packet-negotiation">
<h3><a class="toc-backref" href="#id55" name="data-packet-negotiation">Data packet negotiation</a></h3>
<p>IDE's may want to limit the size of data that is retrieved from
debugger engines.  While the debugger engines will define their own
base default values, the IDE should negotiate these terms if it
needs to.  The debugger engine must support these requests from the
IDE.  This includes limits to the data size of a property or
variable, and the depth limit to arrays, hashes, objects, or other
tree like structures.  The data size excludes any the protocol
overhead.</p>
</div>
<div class="section" id="asynchronous-communications">
<h3><a class="toc-backref" href="#id56" name="asynchronous-communications">Asynchronous Communications</a></h3>
<p>While the protocol does not depend on asynchronous socket support,
certain design considerations may require that the IDE and/or debugger
engine treat incoming and outgoing data in an asynchronous fashion.</p>
<p>For ease of design, some implementations may choose to utilize this
protocol in a completely synchronous fashion, and not implement
optional commands that require the debugger engine to behave in an
asynchronous fashion.  One example of this is the break command.</p>
<p>The break command is sent from the IDE while the debugger engine is
in a run state.  To support this, the debugger engine must periodically
peek at the socket to see if there are any incoming commands.  For
this reason the break command is optional.  If a command requires
this type of asynchronous behaviour on the part of the debugger
engine it must be optional for the debugger engine to support it.</p>
<p>On the other hand, IDE's MUST at times behave in an asynchronous
fashion.  When an IDE tells the debugger engine to enter a 'run' state,
it must watch the socket for incoming packets for stdout or stderr,
if it has requested the data be sent to it from the debugger engine.</p>
<p>The form of asynchronous communications that may occur in this
protocol are defined further in section 6.2 below.</p>
</div>
</div>
</div>
<div class="section" id="message-packets">
<h1><a class="toc-backref" href="#id57" name="message-packets">6. Message Packets</a></h1>
<p>The IDE sends simple ASCII commands to the debugger engine.  The
debugger engine responds with XML data.  The XML data is prepended
with a stringified integer representing the length of the XML data
packet.  The length and XML data are separated by a NULL byte.  The
XML data is ended with a NULL byte.  Neither the IDE or debugger engine
packets may contain NULL bytes within the packet since it is used as
a separator.  Binary data must be encoded using base64.</p>
<pre class="literal-block">
IDE:       command [SPACE] [args] -- data [NULL]
DEBUGGER:  [NUMBER] [NULL] XML(data) [NULL]
</pre>
<p>Arguments to the IDE commands are in the same format as common command
line arguments, and should be parseable by common code such as getopt,
or Pythons Cmd module:</p>
<pre class="literal-block">
command -a value -b value ...
</pre>
<p>All numbers in the protocol are base 10 string representations, unless
the number is noted to be debugger engine specific (eg. the address
attribute on property elements).</p>
<div class="section" id="why-not-xml-both-ways">
<h2><a class="toc-backref" href="#id58" name="why-not-xml-both-ways">6.1 Why not XML both ways?</a></h2>
<p>The primary reason is to avoid the requirement that a debugger
engine has an XML parser available.  XML is easy to generate, but
requires additional libraries for parsing.</p>
</div>
<div class="section" id="packet-communications">
<h2><a class="toc-backref" href="#id59" name="packet-communications">6.2 Packet Communications</a></h2>
<p>The IDE sends a command, then waits for a response from the
debugger engine.  If the command is not received in a reasonable
time (implementation dependent) it may assume the debugger engine
has entered a non-responsive state.  The exception to this is when
the IDE sends a 'run' command which may not have an immediate response.</p>
<p>'run' commands include, but may not be limited to: run, step_into,
step_over, step_out and eval.  When the debugger engine
receives such a command, it is considered to have entered a
'run state'.</p>
<p>During a 'run' command, the IDE should expect to possibly receive
stdin and/or stderr packets from the debugger engine prior to
receiving a response to the command itself.  It may also possibly
receive error packets from either the debugger engine, or a proxy
if one is in use, either prior to the 'run' response, or in response
to any other command.</p>
<p>Stdout and stderr, if requested by the IDE, may only be sent during
commands that have put the debugger engine into a 'run' state.</p>
<p>If the debugger engine supports asynchronous commands, the IDE may also
send commands while the debugger engine is in a 'run' state.  These
commands should be limited to commands such as the 'break' or 'status'
commands for performance reasons, but this protocol does not impose
such limitations.  The debugger engine MUST respond to these commands
prior to responding to the original 'run' command.</p>
<p>An example of communication between IDE and debugger engines.  (this
is not an example of the actual protocol.)</p>
<pre class="literal-block">
IDE:  feature_get supports_async
DBG:  yes
IDE:  stdin redirect
DBG:  ok
IDE:  stderr redirect
DBG:  ok
IDE:  run
DBG:  stdin data...
DBG:  stdin data...
DBG:  reached breakpoint, done running
IDE:  give me some variables
DBG:  ok, here they are
IDE:  evaluate this expression
DBG:  stderr data...
DBG:  ok, done
IDE:  run
IDE:  break
DBG:  ok, breaking
DBG:  at breakpoint, done running
IDE:  stop
DBG:  good bye
</pre>
</div>
<div class="section" id="ide-to-debugger-engine-communications">
<h2><a class="toc-backref" href="#id60" name="ide-to-debugger-engine-communications">6.3 IDE to debugger engine communications</a></h2>
<p>A debugging IDE (IDE) sends commands to the debugger engine in
the form of command line arguments.  One argument that is included in
all commands is the data length.  The data itself is the last part of
the command line.  The data may be binary data if the encoding argument
is 'binary'.</p>
<pre class="literal-block">
command [SPACE] [arguments] [SPACE] base64(data) [NULL]
</pre>
<p>Standard arguments for all commands</p>
<pre class="literal-block">
-i      Transaction ID
        unique for each command generated by the IDE
-l      data length, base 10, stringified.  If not present, zero
        data length is assumed, and no data section will be present
        (ie. command [arguments] [NULL]).  Length is optional but
        useful for verifying data length.
</pre>
</div>
<div class="section" id="debugger-engine-to-ide-communications">
<h2><a class="toc-backref" href="#id61" name="debugger-engine-to-ide-communications">6.4 debugger engine to IDE communications</a></h2>
<p>The debugger engine always replies or sends XML data.  The standard
namespace for the root elements returned from the debugger
engine MUST be &quot;<a class="reference" href="urn:debugger_protocol_v1">urn:debugger_protocol_v1</a>&quot;.  Namespaces have been left
out in the examples in this document.  The messages sent by the
debugger engine must always be NULL terminated.  The XML document tag
must always be present to provide XML version and encoding information.</p>
<p>Two base tags are used for the root tags:</p>
<pre class="literal-block">
data_length
[NULL]
&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;response command=&quot;command_name&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
[NULL]

data_length
[NULL]
&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;stream type=&quot;stdout|stderr&quot;&gt;...Base64 Data...&lt;/stream&gt;
[NULL]
</pre>
<p>For simplification, data length and NULL bytes will be left out of the
rest of the examples in this document.</p>
</div>
<div class="section" id="debugger-engine-errors">
<h2><a class="toc-backref" href="#id62" name="debugger-engine-errors">6.5 debugger engine errors</a></h2>
<p>A debugger engine may need to relay error information back to the IDE in
response to any command.  The debugger engine may add an error element
as a child of the response element.  Note that this is not the same
as getting language error messages, such as exception data.  This is
specifically a debugger engine error in response to a IDE
command.  IDEs and debugger engines may elect to support additional
child elements in the error element, but should namespace the elements
to avoid conflicts with other implementations.</p>
<pre class="literal-block">
&lt;response command=&quot;command_name&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;error code=&quot;error_code&quot; apperr=&quot;app_specific_error_code&quot;&gt;
        &lt;message&gt;UI Usable Message&lt;/message&gt;
    &lt;/error&gt;
&lt;/response&gt;
</pre>
</div>
<div class="section" id="error-codes">
<h2><a class="toc-backref" href="#id63" name="error-codes">6.5.1 Error Codes</a></h2>
<p>The following are predefined error codes for the response to commands:</p>
<p>000 Command parsing errors</p>
<pre class="literal-block">
0 - no error
1 - parse error in command
2 - duplicate arguments in command
3 - invalid options (ie, missing a required option)
4 - Unimplemented command
5 - Command not available (Is used for async commands. For instance
    if the engine is in state &quot;run&quot; than only &quot;break&quot; and &quot;status&quot;
    are available). 
</pre>
<p>100 Filerelated errors</p>
<pre class="literal-block">
100 - can not open file (as a reply to a &quot;source&quot; command if the
      requested source file can't be openend)
101 - stream redirect failed 
</pre>
<p>200 Breakpoint, or code flow errors</p>
<pre class="literal-block">
200 - breakpoint could not be set (for some reason the breakpoint
      could not be set due to problems registering it)
201 - breakpoint type not supported (for example I don't support
      'watch' yet and thus return this error)
202 - invalid breakpoint (the IDE tried to set a breakpoint on a
      line that does not exist in the file (ie &quot;line 0&quot; or lines
      past the end of the file)
203 - no code on breakpoint line (the IDE tried to set a breakpoint
      on a line which does not have any executable code. The
      debugger engine is NOT required to return this type if it
      is impossible to determine if there is code on a given
      location. (For example, in the PHP debugger backend this
      will only be returned in some special cases where the current
      scope falls into the scope of the breakpoint to be set)).
204 - Invalid breakpoint state (using an unsupported breakpoint state
      was attempted)
205 - No such breakpoint (used in breakpoint_get etc. to show that
      there is no breakpoint with the given ID)
206 - Error evaluating code (use from eval() (or perhaps
      property_get for a full name get))
207 - Invalid expression (the expression used for a non-eval()
      was invalid) 
</pre>
<p>300 Data errors</p>
<pre class="literal-block">
300 - Can not get property (when the requested property to get did
      not exist, this is NOT used for an existing but uninitialized
      property, which just gets the type &quot;unintialised&quot; (See:
      PreferredTypeNames)).
301 - Stack depth invalid (the -d stack depth parameter did not
      exist (ie, there were less stack alements than the number
      requested) or the parameter was &lt; 0)
302 - Context invalid (an unexisting context was requested) 
</pre>
<p>900 Protocol errors</p>
<pre class="literal-block">
900 - Encoding not supported
998 - An internal exception in the debugger occured
999 - Unknown error 
</pre>
</div>
<div class="section" id="file-paths">
<h2><a class="toc-backref" href="#id64" name="file-paths">6.6 file paths</a></h2>
<p>All file paths passed between the IDE and debugger engine must be in
the URI format specified by IETF RFC 1738 and 2396, and must be
absolute paths.</p>
</div>
<div class="section" id="dynamic-code-and-virtual-files">
<h2><a class="toc-backref" href="#id65" name="dynamic-code-and-virtual-files">6.7 Dynamic code and virtual files</a></h2>
<p>The protocol reserves the URI scheme 'dbgp' for all virtual
files generated and maintained by language engines. Such
virtual files are usually managed by a language engine for
dynamic code blocks, i.e. code created at runtime, without
an association with a regular file. Any IDE seeing an URI
with the 'dbgp' scheme has to use the 'source' command (See
section 7.14) to obtain the contents of the file from the
engine responsible for that URI.</p>
<p>All URIs in that scheme have the form:</p>
<blockquote>
dbgp:engine-specific-identifier</blockquote>
<p>The engine-specific-identifier is some string which the debugger engine
uses to keep track of the specific virtual file.  The IDE must return
the URI to the debugger engine unchanged through the source command to
retreive the virtual file.</p>
</div>
</div>
<div class="section" id="core-commands">
<h1><a class="toc-backref" href="#id66" name="core-commands">7. Core Commands</a></h1>
<p>Both IDE and debugger engine must support all core commands.</p>
<div class="section" id="status">
<h2><a class="toc-backref" href="#id67" name="status">7.1 status</a></h2>
<p>The status command is a simple way for the IDE to find out from
the debugger engine whether execution may be continued or not.
no body is required on request.  If async support has been
negotiated using feature_get/set the status command may be sent
while the debugger engine is in a 'run state'.</p>
<p>The status attribute values of the response may be:</p>
<blockquote>
<dl>
<dt>starting:</dt>
<dd>State prior to execution of any code</dd>
<dt>stopping:</dt>
<dd>State after completion of code execution.  This typically
happens at the end of code execution, allowing the IDE to
further interact with the debugger engine (for example, to
collect performance data, or use other extended commands).</dd>
<dt>stopped:</dt>
<dd>IDE is detached from process, no further interaction is
possible.</dd>
<dt>running:</dt>
<dd>code is currently executing.  Note that this
state would only be seen with async support
turned on, otherwise the typical state during
IDE/debugger interaction would be 'break'</dd>
<dt>break:</dt>
<dd>code execution is paused, for whatever reason
(see below), and the IDE/debugger can pass
information back and forth.</dd>
</dl>
</blockquote>
<p>The reason attribute value may be:</p>
<blockquote>
<ul class="simple">
<li>ok</li>
<li>error</li>
<li>aborted</li>
<li>exception</li>
</ul>
</blockquote>
<p>IDE</p>
<pre class="literal-block">
status -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;status&quot;
          status=&quot;starting&quot;
          reason=&quot;ok&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    message data
&lt;/response&gt;
</pre>
</div>
<div class="section" id="feature-get">
<h2><a class="toc-backref" href="#id68" name="feature-get">7.2 feature_get</a></h2>
<p>The feature command is used to request feature support from the
debugger engine.  The body of the request contains a string with
the name of the 'feature' or command.  The body of the response is
one byte, true or false, followed by a character string (first byte
may be zero).  An example of usage would be to send a feature
request with the string 'redirect-stdout' to find out if the engine
supports redirection of the stdout stream through the debugger
socket.  The debugger engine must consider all commands as keys for
this command, but may also have keys that are for features that
do not map directly to commands.  Keys should be prepended with a
string to provide a simplified namespacing for extensions.</p>
<p>The following features strings MUST be available:</p>
<pre class="literal-block">
language_supports_threads
language_name               {eg. PHP, Python, Perl}
language_version            {version string}
encoding                    current encoding in use by
                            the debugger session
protocol_version            {for now, always 1}
supports_async              {for commands such as break}
data_encoding               optional, allows to turn off
                            the default base64 encoding of
                            data.  This should only be used
                            for development and debugging of
                            the debugger engines themselves,
                            and not for general use.  If
                            implemented the value 'base64'
                            must be supported to turn back on
                            regular encoding.  the value
                            'none' means no encoding is in use.
                            all elements that use encoding
                            must include an encoding attribute.
</pre>
<p>Additionally, all protocol commands supported must have a string,
such as the following examples:</p>
<pre class="literal-block">
breakpoint_set
break
eval
</pre>
<p>arguments for feature_get include:</p>
<pre class="literal-block">
-n      feature_name
</pre>
<p>IDE</p>
<pre class="literal-block">
feature-get -i transaction_id -n feature_name
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;feature_get&quot;
          feature_name=&quot;feature_name&quot;
          supported=&quot;0|1&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    feature setting or available options, such as a list of
    supported encodings
&lt;/response&gt;
</pre>
</div>
<div class="section" id="feature-set">
<h2><a class="toc-backref" href="#id69" name="feature-set">7.3 feature_set</a></h2>
<p>The feature set command allows a IDE to tell the debugger engine
what additional capabilities it has.  This is done by sending a
feature-set command with the body containing a string name for the
feature.  One example of this would be telling the debugger engine
whether the IDE supports multiple debugger sessions (for threads,
etc.).  The debugger engine responds with telling the IDE whether
it has enabled the feature or not.</p>
<p>Note: The IDE does not have to listen for additional debugger
connections if it does not support debugging multiple sessions.
debugger engines must handle connection failures gracefully.</p>
<p>The following features MUST be supported by the debugger engine,
though some options in the commands may not be supported (eg.
the only required encoding in this protocol is UTF-8).</p>
<pre class="literal-block">
multiple_sessions          {0|1}
encoding                   {ISO8859-15, UTF-8, etc.}
max_children               max number of array or object
                           children to initially retrieve
max_data                   max amount of variable data to
                           initially retrieve.
max_depth                  maximum depth that the debugger
                           engine may return when sending
                           arrays, hashs or object structures
                           to the IDE.
data_encoding              see feature_get
</pre>
<p>arguments for feature_set include:</p>
<pre class="literal-block">
-n      feature_name
-v      value to be set
</pre>
<p>feature_set can be called at any time during a debug session to
change values previously set.  This allows a IDE to change
encodings.</p>
<p>IDE</p>
<pre class="literal-block">
feature_set -i transaction_id -n feature-name -v value
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;feature_set&quot;
          feature=&quot;feature_name&quot;
          success=&quot;0|1&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</div>
<div class="section" id="continuation-commands">
<h2><a class="toc-backref" href="#id70" name="continuation-commands">7.5 continuation commands</a></h2>
<p>resume the execution of the application.</p>
<dl>
<dt>run:</dt>
<dd>starts or resumes the script until a new breakpoint is reached,
or the end of the script is reached.</dd>
<dt>step_into:</dt>
<dd>steps to the next statement, if there is a function call
involved it will break on the first statement in that function</dd>
<dt>step_over:</dt>
<dd>steps to the next statement, if there is a function call on the
line from which the step_over is issued then the debugger engine
will stop at the statement after the function call in the same
scope as from where the command was issued</dd>
<dt>step_out:</dt>
<dd>steps out of the current scope and breaks on the statement after
returning from the current function. (Also called 'finish' in
GDB)</dd>
<dt>kill:</dt>
<dd>kills the script, no response will follow as the script will be
terminated right away and followed by a disconnection of the
network connection from the IDE (and debugger engine if required
in multi request apache processes).</dd>
<dt>stop:</dt>
<dd>stops interaction with the debugger engine.  Once this command
is executed, the IDE will no longer be able to communicate with
the debugger engine.</dd>
</dl>
<p>The response to a continue command is a status response (see
status above).  The debugger engine does not send this response
immediately, but rather when it reaches a breakpoint, or ends
execution for any other reason.</p>
<p>IDE</p>
<pre class="literal-block">
run -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;run&quot;
          status=&quot;starting&quot;
          reason=&quot;ok&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</div>
<div class="section" id="breakpoints">
<h2><a class="toc-backref" href="#id71" name="breakpoints">7.6 breakpoints</a></h2>
<p>Breakpoints are locations or conditions at which a debugger engine
pauses execution, responds to the IDE, and waits for further commands
from the IDE.  A failure in any breakpoint commands results in an
error defined in <a class="reference" href="#debugger-engine-errors">section 6.5</a>.</p>
<p>The following DBGp commands relate to breakpoints:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="27%" />
<col width="73%" />
</colgroup>
<tbody valign="top">
<tr><td><a class="reference" href="#id18">breakpoint_set</a></td>
<td>Set a new breakpoint on the session.</td>
</tr>
<tr><td><a class="reference" href="#id19">breakpoint_get</a></td>
<td>Get breakpoint info for the given breakpoint id.</td>
</tr>
<tr><td><a class="reference" href="#id20">breakpoint_update</a></td>
<td>Update one or more attributes of a breakpoint.</td>
</tr>
<tr><td><a class="reference" href="#id21">breakpoint_remove</a></td>
<td>Remove the given breakpoint on the session.</td>
</tr>
<tr><td><a class="reference" href="#id22">breakpoint_list</a></td>
<td>Get a list of all of the session's breakpoints.</td>
</tr>
</tbody>
</table>
</blockquote>
<p>There are six different breakpoints <em>types</em>:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="21%" />
<col width="17%" />
<col width="62%" />
</colgroup>
<thead valign="bottom">
<tr><th>Type</th>
<th>Req'd Attrs</th>
<th>Description</th>
</tr>
</thead>
<tbody valign="top">
<tr><td>line</td>
<td>filename,
lineno</td>
<td>break on the given lineno in the given
file</td>
</tr>
<tr><td>call</td>
<td>function</td>
<td>break on entry into new stack for
function name</td>
</tr>
<tr><td>return</td>
<td>function</td>
<td>break on exit from stack for function
name</td>
</tr>
<tr><td>exception</td>
<td>exception</td>
<td>break on exception of the given name</td>
</tr>
<tr><td>conditional</td>
<td>expression</td>
<td>break when the given expression is true
at the given filename and line number or
just in given filename</td>
</tr>
<tr><td>watch</td>
<td>expression</td>
<td>break on write of the variable or address
defined by the expression argument</td>
</tr>
</tbody>
</table>
</blockquote>
<p>A breakpoint has the following attributes. Note that some attributes are only
applicable for some breakpoint types.</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="24%" />
<col width="76%" />
</colgroup>
<tbody valign="top">
<tr><td>type</td>
<td>breakpoint type (see table above for valid types)</td>
</tr>
<tr><td>filename</td>
<td>The file the breakpoint is effective in. This must be
a &quot;<a class="reference" href="file://">file://</a>&quot; URI.</td>
</tr>
<tr><td>lineno</td>
<td>Line number on which breakpoint is effective. Line
numbers are 1-based. If an implementation requires a
numeric value to indicate that <em>lineno</em> is not set,
it is suggested that -1 be used, although this is not
enforced.</td>
</tr>
<tr><td>state</td>
<td>Current state of the breakpoint. This must be one of
<em>enabled</em>, <em>disabled</em>.</td>
</tr>
<tr><td>function</td>
<td>Function name for <em>call</em> or <em>return</em> type
breakpoints.</td>
</tr>
<tr><td>temporary</td>
<td>Flag to define if breakpoint is temporary. A
temporary breakpoint is one that is deleted after its
first use. This is useful for features like &quot;Run to
Cursor&quot;.  Once the debugger engine uses a temporary
breakpoint, it should automaticaly remove the breakpoint
from it's list of valid breakpoints.</td>
</tr>
<tr><td>hit_count</td>
<td>Number of effective hits for the breakpoint in the
current session.  This value is maintained by the
debugger engine (a.k.a.  DBGP client).  A
breakpoint's hit count should be increment whenever
it is considered to break execution (i.e. whenever
debugging comes to this line). If the breakpoint is
<em>disabled</em> then the hit count should NOT be
incremented.</td>
</tr>
<tr><td>hit_value</td>
<td>A numeric value used together with the
<em>hit_condition</em> to determine if the breakpoint should
pause execution or be skipped.</td>
</tr>
<tr><td>hit_condition</td>
<td><p class="first">A string indicating a condition to use to compare
<em>hit_count</em> and <em>hit_value</em>. The following values are
legal:</p>
<dl class="last">
<dt><cite>&gt;=</cite></dt>
<dd>break if hit_count is greater than or equal to
hit_value [default]</dd>
<dt><cite>==</cite></dt>
<dd>break if hit_count is equal to hit_value</dd>
<dt><cite>%</cite></dt>
<dd>break if hit_count is a multiple of hit_value</dd>
</dl>
</td>
</tr>
<tr><td>exception</td>
<td>Exception name for <em>exception</em> type breakpoints.</td>
</tr>
</tbody>
</table>
</blockquote>
<p>Breakpoints should be maintained in the debugger engine at an application
level, not the thread level.  Debugger engines that support thread debugging
MUST provide breakpoint id's that are global for the application, and must
use all breakpoints for all threads where applicable.</p>
<p>As for any other commands, if there is error the debugger engine should
return an error response as described in <a class="reference" href="#debugger-engine-errors">section 6.5</a>.</p>
<div class="section" id="id18">
<h3><a class="toc-backref" href="#id72" name="id18">7.6.1 breakpoint_set</a></h3>
<p>This command is used by the IDE to set a breakpoint for the session.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
breakpoint_set -i TRANSACTION_ID [&lt;arguments...&gt;]
</pre>
<p>where the arguments are:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>-t TYPE</td>
<td>breakpoint <em>type</em>, see below for valid values
[required]</td>
</tr>
<tr><td>-s STATE</td>
<td>breakpoint <em>state</em> [optional, defaults to &quot;enabled&quot;]</td>
</tr>
<tr><td>-f FILENAME</td>
<td>the <em>filename</em> to which the breakpoint belongs
[optional]</td>
</tr>
<tr><td>-n LINENO</td>
<td>the line number (<em>lineno</em>) of the breakpoint
[optional]</td>
</tr>
<tr><td>-m FUNCTION</td>
<td><em>function</em> name [required for <em>call</em> or <em>return</em>
breakpoint types]</td>
</tr>
<tr><td>-x EXCEPTION</td>
<td><em>exception</em> name [required for <em>exception</em> breakpoint
types]</td>
</tr>
<tr><td>-c EXPRESSION</td>
<td>code <em>expression</em>, in the language of the debugger
engine [required for <em>conditional</em> breakpoint types]</td>
</tr>
<tr><td>-h HIT_VALUE</td>
<td>hit value (<em>hit_value</em>) used with the hit condition
to determine if should break; a value of zero
indicates hit count processing is disabled for this
breakpoint [optional, defaults to zero (i.e.
disabled)]</td>
</tr>
<tr><td>-o HIT_CONDITION</td>
<td>hit condition string (<em>hit_condition</em>); see
hit_condition documentation above; BTW 'o' stands for
'operator' [optional, defaults to '&gt;=']</td>
</tr>
<tr><td>-r 0|1</td>
<td>Boolean value indicating if this breakpoint is
<em>temporary</em>. [optional, defaults to false]</td>
</tr>
</tbody>
</table>
</blockquote>
<p>A unique id for this breakpoint for this session is returned by the debugger
engine. This <em>session breakpoint id</em> is used by the IDE to identify the
breakpoint in other breakpoint commands.</p>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_set&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;
          state=&quot;STATE&quot;
          id=&quot;BREAKPOINT_ID&quot;/&gt;
</pre>
<p>where,</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>BREAKPOINT_ID</td>
<td>is an arbitrary string that uniquely identifies this
breakpoint in the debugger engine.</td>
</tr>
<tr><td>STATE</td>
<td>the initial state of the breakpoint as set by the
debugger engine</td>
</tr>
</tbody>
</table>
</blockquote>
</div>
<div class="section" id="id19">
<h3><a class="toc-backref" href="#id73" name="id19">7.6.2 breakpoint_get</a></h3>
<p>This command is used by the IDE to get breakpoint information from the
debugger engine.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
breakpoint_get -i TRANSACTION_ID -d BREAKPOINT_ID 
</pre>
<p>where,</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>BREAKPOINT_ID</td>
<td>is the unique <em>session breakpoint id</em> returned by
<em>breakpoint_set</em>.</td>
</tr>
</tbody>
</table>
</blockquote>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_get&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;&gt;
    &lt;breakpoint id=&quot;BREAKPOINT_ID&quot;
                type=&quot;TYPE&quot;
                state=&quot;STATE&quot;
                filename=&quot;FILENAME&quot;
                lineno=&quot;LINENO&quot;
                function=&quot;FUNCTION&quot;
                exception=&quot;EXCEPTION&quot;
                hit_value=&quot;HIT_VALUE&quot;
                hit_condition=&quot;HIT_CONDITION&quot;
                hit_count=&quot;HIT_COUNT&quot;&gt;
        &lt;expression&gt;EXPRESSION&lt;/expression&gt;
    &lt;/breakpoint&gt;
&lt;/response&gt;
</pre>
<p>where each breakpoint attribute is only required if its value is relevant.
E.g., the &lt;expression/&gt; child element need only be included if there is an
expression defined, the <em>function</em> attribute need only be included if this is
a <em>function</em> breakpoint.</p>
</div>
<div class="section" id="id20">
<h3><a class="toc-backref" href="#id74" name="id20">7.6.3 breakpoint_update</a></h3>
<p>This command is used by the IDE to update one or more attributes of a
breakpoint that was already set on the debugger engine via <em>breakpoint_set</em>.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
breakpoint_update -i TRANSACTION_ID -d BREAKPOINT_ID [&lt;arguments...&gt;]
</pre>
<p>where the arguments are as follows.  All arguments are optional, however
at least one argument should be present.  See <a class="reference" href="#id18">breakpoint_set</a> for a description of
each argument:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>-s STATE</td>
<td>&nbsp;</td>
</tr>
<tr><td>-n LINENO</td>
<td>&nbsp;</td>
</tr>
<tr><td>-h HIT_VALUE</td>
<td>&nbsp;</td>
</tr>
<tr><td>-o HIT_CONDITION</td>
<td>&nbsp;</td>
</tr>
<tr><td>-r 0|1</td>
<td><strong>Do we need to allow changing the *temporary*
attribute?</strong></td>
</tr>
</tbody>
</table>
</blockquote>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_update&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;/&gt;
</pre>
</div>
<div class="section" id="id21">
<h3><a class="toc-backref" href="#id75" name="id21">7.6.4 breakpoint_remove</a></h3>
<p>This command is used by the IDE to remove the given breakpoint.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
breakpoint_remove -i TRANSACTION_ID -d BREAKPOINT_ID
</pre>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_update&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;/&gt;
</pre>
</div>
<div class="section" id="id22">
<h3><a class="toc-backref" href="#id76" name="id22">7.6.5 breakpoint_list</a></h3>
<p>This command is used by the IDE to get breakpoint information for all
breakpoints that the debugger engine has.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
breakpoint_list -i TRANSACTION_ID
</pre>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_list&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;&gt;
    &lt;breakpoint id=&quot;BREAKPOINT_ID&quot;
                type=&quot;TYPE&quot;
                state=&quot;STATE&quot;
                filename=&quot;FILENAME&quot;
                lineno=&quot;LINENO&quot;
                function=&quot;FUNCTION&quot;
                exception=&quot;EXCEPTION&quot;
                hit_value=&quot;HIT_VALUE&quot;
                hit_condition=&quot;HIT_CONDITION&quot;
                hit_count=&quot;HIT_COUNT&quot;&gt;
        &lt;expression&gt;EXPRESSION&lt;/expression&gt;
    &lt;/breakpoint&gt;
    &lt;breakpoint ...&gt;...&lt;/breakpoint&gt;
    ...
&lt;/response&gt;
</pre>
</div>
</div>
<div class="section" id="stack-depth">
<h2><a class="toc-backref" href="#id77" name="stack-depth">7.7 stack_depth</a></h2>
<p>IDE</p>
<pre class="literal-block">
stack-depth -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;stack_depth&quot;
          depth=&quot;{NUM}&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</div>
<div class="section" id="stack-get">
<h2><a class="toc-backref" href="#id78" name="stack-get">7.8 stack_get</a></h2>
<p>Returns stack information for a given stack depth.  For extended
debuggers, multiple file/line's may be returned by having
child elements of the stack element.  This is to allow
for debuggers, such as XSLT, that have execution and data files.
The filename returned should always be the local file
system path translated into a file URI, and should include the
system name if the engine is not connecting to an ip on the local
box: <a class="reference" href="file://systemname">file://systemname</a>/c|/path.  If the stack depth is
specified, only one stack element is returned, for the depth
requested, though child elements may be returned also.  The
current context is stack depth of zero, the 'oldest' context
(in some languages known as 'main') is the highest numbered
context.</p>
<pre class="literal-block">
-d      stack depth (optional)
</pre>
<p>IDE</p>
<pre class="literal-block">
stack_get -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;stack_get&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;stack level=&quot;{NUM}&quot;
           type=&quot;file|eval|?&quot;
           filename=&quot;...&quot;
           lineno=&quot;{NUM}&quot;
           where=&quot;&quot;
           cmdbegin=&quot;&quot;
           cmdlength=&quot;&quot;/&gt;
    &lt;stack level=&quot;{NUM}&quot;
           type=&quot;file|eval|?&quot;
           filename=&quot;...&quot;
           lineno=&quot;{NUM}&quot;&gt;
        &lt;input level=&quot;{NUM}&quot;
               type=&quot;file|eval|?&quot;
               filename=&quot;...&quot;
               lineno=&quot;{NUM}&quot;/&gt;
    &lt;/stack&gt;
&lt;/response&gt;
</pre>
<p>attributes</p>
<pre class="literal-block">
level       stack depth for this stack element
type        file or evaluated code (default file if not present)
filename    file URI
lineno      1-based line offset into the buffer
where       current command name (optional)
cmdbegin    current text offset from beginning of file for the
            command (optional)
cmdlength   length of text representing command (optional)
</pre>
<p>The attributes where, cmdbegin and cmdlength are primarily used
for relaying visual information in the IDE.  cmdbegin and cmdlength
can be used by the IDE for high lighting the command that is
currently being debugged.  The where attribute contains the name
of the current stack.  This could be the current function name
that the user is stepping through.</p>
</div>
<div class="section" id="context-names">
<h2><a class="toc-backref" href="#id79" name="context-names">7.9 context_names</a></h2>
<p>The names of currently available contexts at a given stack depth,
typically Local, Global and Class.  These SHOULD be UI friendly
names.  The id attribute returned with the names is used in other
commands such as context_get to identify the context.  The context
id zero is always considered to be the 'default' context is no
context id is provided.  In most languages, this will the be
'local' context.</p>
<pre class="literal-block">
-d      stack depth (optional)
</pre>
<p>IDE</p>
<pre class="literal-block">
context_names -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;context_names&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;context name=&quot;Local&quot; id=&quot;0&quot;/&gt;
    &lt;context name=&quot;Global&quot; id=&quot;1&quot;/&gt;
    &lt;context name=&quot;Class&quot; id=&quot;2&quot;/&gt;
&lt;/response&gt;
</pre>
</div>
<div class="section" id="context-get">
<h2><a class="toc-backref" href="#id80" name="context-get">7.10 context_get</a></h2>
<p>Returns an array of properties in a given context at a given
stack depth.  If the stack depth is omitted, the current
stack depth is used.  If the context name is omitted, the context
with an id zero is used (generally the 'locals' context).</p>
<pre class="literal-block">
-d      stack depth (optional)
-c      context id  (optional, retrieved by context-names)
</pre>
<p>IDE</p>
<pre class="literal-block">
context_get -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;context_get&quot;
          context=&quot;context_id&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;property ... /&gt;
&lt;/response&gt;
</pre>
</div>
<div class="section" id="properties-variables-and-values">
<h2><a class="toc-backref" href="#id81" name="properties-variables-and-values">7.11 Properties, variables and values</a></h2>
<p>Properties that have children may return an arbitrary depth of
children, as defaulted by the debugger engine.  A maximum depth
may be defined by the IDE using the feature_set command with the
max_depth argument.  The IDE may then use the fullname attribute of
a property to dig further into the tree.  Data types are defined
futher in section 7.12 below.</p>
<p>The number of children sent is defined by the debugger engine
unless otherwise defined by sending the feature_set command with
the max_children argument.</p>
<pre class="literal-block">
&lt;property
    name=&quot;short_name&quot;
    fullname=&quot;long_name&quot;
    type=&quot;data_type&quot;
    classname=&quot;name_of_object_class&quot;
    constant=&quot;0|1&quot;
    children=&quot;0|1&quot;
    size=&quot;{NUM}&quot;
    page=&quot;{NUM}&quot;
    pagesize=&quot;{NUM}&quot;
    address=&quot;{NUM}&quot;
    key=&quot;language_dependent_key&quot;
    encoding=&quot;base64|none&quot;
    numchildren=&quot;{NUM}&quot;&gt;
...encoded Value Data...
&lt;/property&gt;
</pre>
<p>attributes:</p>
<pre class="literal-block">
name            variable name.  This is the short part of the
                name.  For instance, in PHP:
                $v = 0; // short name 'v'
                class:$v; // short name 'v'
fullname        variable name.  This is the long form of the name
                which can be eval'd by the language to retrieve
                the value of the variable.
                $v = 0; // long name 'v'
                class::$v; // short name 'v', long 'class::$v'
                $this-&gt;v; // short name 'v', long '$this-&gt;v'
classname       If the type is an object or resource, then the
                debugger engine MAY specify the class name
                This is an optional attribute.
page            if not all the children in the first level are
                returned, then the page attribute, in combination
                with the pagesize attribute will define where in
                the array or object these children should be
                located.
pagesize        the size of each page of data, defaulted by the
                debugger engine, or negotiated with feature_set
                and max_children
type            language specific data type name
facet           provides a hint to the IDE about additional
                facets of this value.  These are space seperated
                names, such as private, protected, public,
                constant, etc.
size            size of property data in bytes
children        true/false whether the property has children
                this would be true for objects or array's.
numchildren     optional attribute with number of children for
                the property.
key             language dependent reference for the property.
                if the key is available, the IDE SHOULD use it
                to retrieve further data for the property
address         containing physical memory address
encoding        if this is binary data, it should be base64 encoded
                with this attribute set
</pre>
</div>
<div class="section" id="data-types">
<h2><a class="toc-backref" href="#id82" name="data-types">7.12 Data Types</a></h2>
<p>Languages may have different names or meanings for data types,
however the IDE may want to be able to handle similar data types
as the same type.  For this reason, we define a minimal set of
standard data types, and a method for specifying more explicit
facets on those types.  We provide three different type attributes,
and a command to map those types to each other.  The schema type
serves as a hint to the IDE as to how to handle this specific data
type, if it so chooses to, but should not be considered to be
generally supported.  If the debugger engine chooses to support
Schema, it should handle all data validation itself.</p>
<dl>
<dt>language type:</dt>
<dd>A language specific name for a data type</dd>
<dt>common type:</dt>
<dd>A name used by the IDE to group data types
that are similar or the same</dd>
<dt>schema type:</dt>
<dd>The XML Schema data type name as specified
in the W3C Recommendation, XML Schema
Part 2: Datatypes located at
<a class="reference" href="http://www.w3.org/TR/xmlschema-2/">http://www.w3.org/TR/xmlschema-2/</a>
The use of the schema type is completely
optional.  The language engine should not
expect an IDE to support usage of this
attribute.  The IDE identifies support for
this in the debugger engine by retreiving
the data map, which would contain the
schema type attribute.</dd>
</dl>
<div class="section" id="common-data-types">
<h3><a class="toc-backref" href="#id83" name="common-data-types">7.12.1 Common Data Types</a></h3>
<p>This is a list of the common data types supported by this protocol.
For ease of documentation, and as hints to the IDE, they are mapped
to one or more schema data types, which are documented at
<a class="reference" href="http://www.w3.org/TR/xmlschema-2/">http://www.w3.org/TR/xmlschema-2/</a>.  Some non-scalar types are also
defined, which do not have direct mappings to the base types defined
by XML Schema.</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="17%" />
<col width="83%" />
</colgroup>
<thead valign="bottom">
<tr><th>Common Type</th>
<th>Schema Type</th>
</tr>
</thead>
<tbody valign="top">
<tr><td>bool</td>
<td>boolean (The value is always 0 or 1)</td>
</tr>
<tr><td>int</td>
<td>integer, long, short, byte, and signed or
unsigned varients</td>
</tr>
<tr><td>float</td>
<td>float, double, decimal</td>
</tr>
<tr><td>string</td>
<td>string or other string-like data types, such as
dateTime, hexBinary, etc.</td>
</tr>
</tbody>
</table>
</blockquote>
<p>Data types that do not map to schema:</p>
<dl>
<dt>null:</dt>
<dd>For example the &quot;None&quot; of Python or
the &quot;null&quot; of PHP.  Some languages may not have
a method to specify a null type.</dd>
<dt>array:</dt>
<dd>for non-associative arrays, such as
List in Python.  Arrays have integers as keys,
and the index is put in the name attribute of
the property element.</dd>
<dt>hash:</dt>
<dd>for associative arrays, such as Dictionaries
in Python.  The only supported key type is a
string, which would be in the name attribute of
the property.</dd>
<dt>object:</dt>
<dd>An instance of a class.</dd>
<dt>resource:</dt>
<dd>Any data type the language supports that does
not map into one of the common types.  This
could include pointers in C, various Python
types such as Method or Class types, or
file descripters, database resources, etc. in
PHP.  Complex types may also be defined by
using XML Schema, and mapping a type to the
Schema type.  This is a more specialized use
of the type mapping, and should be considered
experimental, and not generally available in
implementations of this protocol.</dd>
</dl>
<p>For the most part, this protocol treats array's and hashes in the
same way, placing the key or index into the name attribute of the
property element.</p>
</div>
<div class="section" id="typemap-get">
<h3><a class="toc-backref" href="#id84" name="typemap-get">7.12.2 typemap_get</a></h3>
<p>The IDE calls this command to get information on how to
map language specific type names (as received in the property
element returned by the context_get, and property_*
commands).  The debugger engine returns all data types that
it supports.  There may be multiple map elements with the same
type attribute value, but the name value must be unique.  This
allows a language to map multiple language specific types into
one of the common data types (eg. float and double can both
be mapped to float).</p>
<p>IDE</p>
<pre class="literal-block">
typemap_get -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;typemap_get&quot;
          transaction_id=&quot;transaction_id&quot;
          xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot;
          xmlns:xsd=&quot;http://www.w3.org/2001/XMLSchema&quot;&gt;
   &lt;map type=&quot;common_type&quot;
        name=&quot;language_type_name&quot;
        xsi:type=&quot;xsd:schema_type_name&quot;/&gt;
&lt;/response&gt;
</pre>
<p>Using the map element, a language can map a specific data type
into something the IDE can handle in a more generic way.  For
example, if a language supports both float and double, the IDE
does not necessarily need to distinguish between them (but MAY).</p>
<pre class="literal-block">
&lt;map type=&quot;float&quot;
     name=&quot;float&quot;
     xsi:type=&quot;xsd:float&quot;/&gt;
&lt;map type=&quot;float&quot;
     name=&quot;double&quot;
     xsi:type=&quot;xsd:double&quot;/&gt;
&lt;map type=&quot;float&quot;
     name=&quot;real&quot;
     xsi:type=&quot;xsd:decimal&quot;/&gt;
</pre>
<p>Complex types may be supported if an implementation wishes to.  Any
implementation doing so should work without the other end having
support for this:</p>
<pre class="literal-block">
&lt;response command=&quot;typemap_get&quot;
          transaction_id=&quot;transaction_id&quot;
          xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot;
          xmlns:xsd=&quot;http://www.w3.org/2001/XMLSchema&quot;
          xmlns:mytypes=&quot;http://mysite/myschema.xsd&quot;&gt;
   &lt;map type=&quot;resource&quot;
        name=&quot;SpecialDataType&quot;
        xsi:type=&quot;mytypes:SpecialDataType&quot;/&gt;
&lt;/response&gt;
</pre>
</div>
</div>
<div class="section" id="property-get-property-set-property-value">
<h2><a class="toc-backref" href="#id85" name="property-get-property-set-property-value">7.13 property_get, property_set, property_value</a></h2>
<p>Gets/sets a property value.  When retrieving a property with the
get method, the maximum data that should be returned is a default
defined by the debugger engine unless it has been negotiated using
feature_set with max_data.  If the size of the properties data is
larger than that, the debugger engine only returns the configured
amount, and the IDE should call property_value to get the entire
data.  This is to prevent large data from slowing down debugger
sessions.  The IDE should implement UI that allows the user to
decide whether they want to retrieve all the data.  The IDE should
not read more data than the length defined in the packet header.
The IDE can determine if there is more data by using the property
data length information.  As per the context_get command, the depth
of nested elements returned is either defaulted by the debugger
engine, or negotiated using feature_set with max_children</p>
<pre class="literal-block">
-d      stack depth (optional)
-c      context id (optional, retrieved by context-names)
-n      property long name
-m      max data size to retrieve
-t      data type
-p      data page (for arrays, hashes, objects, etc.)
-k      property key as retrieved in a property element,
        optional, used for property_get of children and
        property_value
</pre>
<p>IDE</p>
<pre class="literal-block">
property_get -n property_long_name -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;property_get&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;property ... /&gt;
    ...
&lt;/response&gt;
</pre>
<p>IDE</p>
<pre class="literal-block">
property_set -n property_long_name -d {NUM} -i transaction_id
         -l data_length -- {DATA}
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;property_set&quot;
      success=&quot;0|1&quot;
      transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
<p>IDE</p>
<pre class="literal-block">
property_value -n property_long_name -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;property_value&quot;
          size=&quot;{NUM}&quot;
          encoding=&quot;base64|none&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    ...data...
&lt;/response&gt;
</pre>
</div>
<div class="section" id="source">
<h2><a class="toc-backref" href="#id86" name="source">7.14 source</a></h2>
<p>The body of the request is the URI (retrieved from the stack info),
the body of the response is the data contents of the URI.  If the
file uri is not provided, then the file for the current context
is returned.</p>
<pre class="literal-block">
-b  begin line (optional)
-e  end line (optional)
-f  file URI
</pre>
<p>IDE</p>
<pre class="literal-block">
source -i transaction_id -f fileURI
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;source&quot;
          success=&quot;0|1&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    ...data source code...
&lt;/response&gt;
</pre>
</div>
<div class="section" id="stdout-stderr">
<h2><a class="toc-backref" href="#id87" name="stdout-stderr">7.15 stdout, stderr</a></h2>
<p>Body of the request is null, body of the response is true or false.
Upon receiving one of these redirect requests, the debugger engine
will start to copy data bound for one of these streams to the IDE,
using the message packets.</p>
<pre class="literal-block">
-c      [0|1|2] 0 - disable, 1 - copy data, 2 - redirection

    0 (disable)   stdout/stderr output goes to regular place, but not to IDE
    1 (copy)      stdout/stderr output goes to both regular destination and IDE
    2 (redirect)  stdout/stderr output goes to IDE only.
</pre>
<p>IDE</p>
<pre class="literal-block">
stdout -i transaction_id -c 1
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;stdout&quot;
          success=&quot;0|1&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</div>
</div>
<div class="section" id="extended-commands">
<h1><a class="toc-backref" href="#id88" name="extended-commands">8. Extended Commands</a></h1>
<p>A IDE can query the debugger engine by using the feature_get command
(see above).  The feature strings for extended commands defined in this
specification are the same as the command itself.  For commands not
listed in this specification, the prefix is 'xcmd_name'.  Vendor or language
specific commands may be prefixed with 'xcmd_vendorname_name'.</p>
<div class="section" id="stdin">
<h2><a class="toc-backref" href="#id89" name="stdin">8.1 stdin</a></h2>
<p>The stdin command has nearly the same arguments and responses as
stdout and stderr from the core commands (section 7).  Since
redirecting stdin may be very difficult to support in some
languages, it is provided as an optional command.  Uses for
this command would primarily be for remote console operations.</p>
<p>If an IDE wishes to redirect stdin, or cancel the stdin redirection,
then it must send the stdin command with the -c argument, without
any data.  After the IDE has redirected stdin, it can send more
stdin commands with the data.  Sending both the -c argument and
data in the same command is invalid.</p>
<p>If the IDE requests stdin, it will <em>always</em> be a redirection,
and the debugger engine must not accept stdin from any other
source.  The debugger engine may choose to not allow stdin to be
redirected in certain situations (such as when running under
a web server).</p>
<pre class="literal-block">
-c      [0|1] 0 - disable, 1 - redirection

    0 (disable)   stdin is read from the regular place
    1 (redirect)  stdin is read from stdin packets received from the IDE.
</pre>
<p>IDE</p>
<pre class="literal-block">
stdin -i transaction_id -c 1
stdin -i transaction_id -- base64(data)
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;stdin&quot;
          success=&quot;0|1&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</div>
<div class="section" id="break">
<h2><a class="toc-backref" href="#id90" name="break">8.2 break</a></h2>
<p>This command can be sent to interrupt the execution of the
debugger engine while it is in a 'run state'.</p>
<p>IDE</p>
<pre class="literal-block">
break -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;break&quot;
          success=&quot;0|1&quot;
          transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</div>
<div class="section" id="eval">
<h2><a class="toc-backref" href="#id91" name="eval">8.3 eval</a></h2>
<p>Evaluate a given string within the current execution context.  A
property element MAY be returned as a child element of the
response, but the IDE MUST NOT expect one.</p>
<p>IDE</p>
<pre class="literal-block">
eval -i transaction_id -l data_length -- {DATA}
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;eval&quot;
      success=&quot;0|1&quot;
      transaction_id=&quot;transaction_id&quot;&gt;
&lt;/response&gt;
</pre>
</div>
<div class="section" id="spawnpoints">
<h2><a class="toc-backref" href="#id92" name="spawnpoints">8.4 spawnpoints</a></h2>
<p>Spawnpoints are points in (currently Tcl) file where a new debug session
might (i.e. if this position is a point in the code where a new application
is created) get spawned when hit. Spawnpoints are treated much like a
different type of breakpoint: They share many of the same attributes as
breakpoints, using a <em>type==&quot;spawn&quot;</em> to distinguish themselves. Spawnpoints
have an equivalent set of commands.  A failure in any spawnpoint commands
results in an error defined in <a class="reference" href="#debugger-engine-errors">section 6.5</a>.</p>
<p>The following DBGp commands relate to spawnpoints:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="27%" />
<col width="73%" />
</colgroup>
<tbody valign="top">
<tr><td><a class="reference" href="#id23">spawnpoint_set</a></td>
<td>Set a new spawnpoint on the session.</td>
</tr>
<tr><td><a class="reference" href="#id24">spawnpoint_get</a></td>
<td>Get spawnpoint info for the given spawnpoint id.</td>
</tr>
<tr><td><a class="reference" href="#id25">spawnpoint_update</a></td>
<td>Update one or more attributes of a spawnpoint.</td>
</tr>
<tr><td><a class="reference" href="#id26">spawnpoint_remove</a></td>
<td>Remove the given spawnpoint on the session.</td>
</tr>
<tr><td><a class="reference" href="#id27">spawnpoint_list</a></td>
<td>Get a list of all of the session's spawnpoints.</td>
</tr>
</tbody>
</table>
</blockquote>
<p>A spawnpoint has the following attributes:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>type</td>
<td>always set to &quot;spawn&quot;</td>
</tr>
<tr><td>filename</td>
<td>The file the spawnpoint is effective in. This must be
a &quot;<a class="reference" href="file://">file://</a>&quot; URI.</td>
</tr>
<tr><td>lineno</td>
<td>Line number on which spawnpoint is effective. Line
numbers are 1-based. If an implementation requires a
numeric value to indicate that <em>lineno</em> is not set,
it is suggested that -1 be used, although this is not
enforced.</td>
</tr>
<tr><td>state</td>
<td>Current state of the spawnpoint. This must be one of
<em>enabled</em>, <em>disabled</em> or <em>deleted</em>. <em>deleted</em> is only
received after calling spawnpoint_remove. <strong>(XXX
Shane, how is *deleted* used? Why is it necessary?
--TM)</strong></td>
</tr>
</tbody>
</table>
</blockquote>
<p>Spawnpoints should be maintained in the debugger engine at an application
level, not the thread level.  Debugger engines that support thread debugging
MUST provide spawnpoint id's that are global for the application, and must
use all spawnpoints for all threads where applicable.</p>
<p>As for any other commands, if there is error the debugger engine should
return an error response as described in <a class="reference" href="#debugger-engine-errors">section 6.5</a>.</p>
<div class="section" id="id23">
<h3><a class="toc-backref" href="#id93" name="id23">8.4.1 spawnpoint_set</a></h3>
<p>This command is used by the IDE to set a spawnpoint for the session.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
spawnpoint_set -i TRANSACTION_ID [&lt;arguments...&gt;]
</pre>
<p>where the arguments are:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>-f FILENAME</td>
<td>the <em>filename</em> to which the spawnpoint belongs
[optional]</td>
</tr>
<tr><td>-n LINENO</td>
<td>the line number (<em>lineno</em>) of the spawnpoint
[optional]</td>
</tr>
<tr><td>-s STATE</td>
<td>spawnpoint <em>state</em> [optional, defaults to &quot;enabled&quot;]</td>
</tr>
</tbody>
</table>
</blockquote>
<p>A unique id for this spawnpoint for this session is returned by the debugger
engine. This <em>session spawnpoint id</em> is used by the IDE to identify the
spawnpoint in other spawnpoint commands.</p>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;spawnpoint_set&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;
          state=&quot;STATE&quot;
          id=&quot;SPAWNPOINT_ID&quot;/&gt;
</pre>
<p>where,</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>SPAWNPOINT_ID</td>
<td>is an arbitrary string that uniquely identifies this
spawnpoint in the debugger engine.</td>
</tr>
<tr><td>STATE</td>
<td>the initial state of the spawnpoint as set by the
debugger engine</td>
</tr>
</tbody>
</table>
</blockquote>
</div>
<div class="section" id="id24">
<h3><a class="toc-backref" href="#id94" name="id24">8.4.2 spawnpoint_get</a></h3>
<p>This command is used by the IDE to get spawnpoint information from the
debugger engine.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
spawnpoint_get -i TRANSACTION_ID -d SPAWNPOINT_ID 
</pre>
<p>where,</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>SPAWNPOINT_ID</td>
<td>is the unique <em>session spawnpoint id</em> returned by
<em>spawnpoint_set</em>.</td>
</tr>
</tbody>
</table>
</blockquote>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;spawnpoint_get&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;&gt;
    &lt;spawnpoint id=&quot;SPAWNPOINT_ID&quot;
                state=&quot;STATE&quot;
                filename=&quot;FILENAME&quot;
                lineno=&quot;LINENO&quot;/&gt;
&lt;/response&gt;
</pre>
</div>
<div class="section" id="id25">
<h3><a class="toc-backref" href="#id95" name="id25">8.4.3 spawnpoint_update</a></h3>
<p>This command is used by the IDE to update one or more attributes of a
spawnpoint that was already set on the debugger engine via <em>spawnpoint_set</em>.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
spawnpoint_update -i TRANSACTION_ID -d SPAWNPOINT_ID [&lt;arguments...&gt;]
</pre>
<p>where the arguments are as follows.  Both arguments are optional, however
at least one should be provided. See <a class="reference" href="#id23">spawnpoint_set</a> for a description of
each option:</p>
<blockquote>
<table border class="table">
<colgroup>
<col width="25%" />
<col width="75%" />
</colgroup>
<tbody valign="top">
<tr><td>-s STATE</td>
<td>&nbsp;</td>
</tr>
<tr><td>-n LINENO</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
</blockquote>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;spawnpoint_update&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;/&gt;
</pre>
</div>
<div class="section" id="id26">
<h3><a class="toc-backref" href="#id96" name="id26">8.4.4 spawnpoint_remove</a></h3>
<p>This command is used by the IDE to remove the given spawnpoint.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
spawnpoint_remove -i TRANSACTION_ID -d SPAWNPOINT_ID
</pre>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;spawnpoint_remove&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;/&gt;
</pre>
</div>
<div class="section" id="id27">
<h3><a class="toc-backref" href="#id97" name="id27">8.4.5 spawnpoint_list</a></h3>
<p>This command is used by the IDE to get spawnpoint information for all
spawnpoints that the debugger engine has.</p>
<p>IDE to debugger engine:</p>
<pre class="literal-block">
spawnpoint_list -i TRANSACTION_ID
</pre>
<p>debugger engine to IDE:</p>
<pre class="literal-block">
&lt;response command=&quot;spawnpoint_list&quot;
          transaction_id=&quot;TRANSACTION_ID&quot;&gt;
    &lt;spawnpoint id=&quot;SPAWNPOINT_ID&quot;
                state=&quot;STATE&quot;
                filename=&quot;FILENAME&quot;
                lineno=&quot;LINENO&quot;/&gt;
    &lt;spawnpoint .../&gt;
    ...
&lt;/response&gt;
</pre>
</div>
</div>
</div>
</div>


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
