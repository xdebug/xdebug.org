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
<tr class="field"><th class="docinfo-name" colspan="2">Protocol Version:</th></tr>
<tr><td>&nbsp;</td><td class="field-body">1.0</td>
</tr>
<tr class="field"><th class="docinfo-name" colspan="2">Document Status:</th></tr>
<tr><td>&nbsp;</td><td class="field-body">draft 6</td>
</tr>
<tr><th class="docinfo-name">Author:</th>
<td>Shane Caraveo, ActiveState &lt;<a class="reference" href="mailto:shanec&#64;ActiveState.com">shanec&#64;ActiveState.com</a>&gt;</td></tr>
<tr><th class="docinfo-name">Author:</th>
<td>Derick Rethans, &lt;<a class="reference" href="mailto:d.rethans&#64;jdimedia.nl">d.rethans&#64;jdimedia.nl</a>&gt;</td></tr>
</tbody>
</table>
<div class="contents topic" id="contents">
<p class="topic-title"><a name="contents">Contents</a></p>
<ul class="simple">
<li><a class="reference" href="#description" id="id4" name="id4">1. Description</a></li>
<li><a class="reference" href="#issues" id="id5" name="id5">1.1 Issues</a></li>
<li><a class="reference" href="#changes" id="id6" name="id6">1.2 Changes</a><ul>
<li><a class="reference" href="#id1" id="id7" name="id7">2003-10-06</a></li>
<li><a class="reference" href="#id2" id="id8" name="id8">2003-10-02</a></li>
<li><a class="reference" href="#id3" id="id9" name="id9">2003-09-30</a></li>
</ul>
</li>
<li><a class="reference" href="#requirements" id="id10" name="id10">2. Requirements</a></li>
<li><a class="reference" href="#terminology" id="id11" name="id11">3. Terminology</a></li>
<li><a class="reference" href="#security" id="id12" name="id12">4. Security</a></li>
<li><a class="reference" href="#initiating-a-debugging-session" id="id13" name="id13">5. Initiating a debugging session</a><ul>
<li><a class="reference" href="#just-in-time-debugging-and-debugger-proxies" id="id14" name="id14">5.1 Just in time debugging and debugger proxies</a></li>
<li><a class="reference" href="#multiple-processes-or-threads" id="id15" name="id15">5.2 Multiple Processes or Threads</a></li>
<li><a class="reference" href="#feature-negotiation" id="id16" name="id16">5.3 Feature Negotiation</a><ul>
<li><a class="reference" href="#data-packet-negotiation" id="id17" name="id17">Data packet negotiation</a></li>
<li><a class="reference" href="#asynchronous-communications" id="id18" name="id18">Asynchronous Communications</a></li>
</ul>
</li>
</ul>
</li>
<li><a class="reference" href="#message-packets" id="id19" name="id19">6. Message Packets</a><ul>
<li><a class="reference" href="#why-not-xml-both-ways" id="id20" name="id20">6.1 Why not XML both ways?</a></li>
<li><a class="reference" href="#packet-communications" id="id21" name="id21">6.2 Packet Communications</a></li>
<li><a class="reference" href="#ide-to-debugger-engine-communications" id="id22" name="id22">6.3 IDE to debugger engine communications</a></li>
<li><a class="reference" href="#debugger-engine-to-ide-communications" id="id23" name="id23">6.4 debugger engine to IDE communications</a></li>
<li><a class="reference" href="#debugger-engine-errors" id="id24" name="id24">6.5 debugger engine errors</a></li>
</ul>
</li>
<li><a class="reference" href="#core-commands" id="id25" name="id25">7. Core Commands</a><ul>
<li><a class="reference" href="#status" id="id26" name="id26">status</a></li>
<li><a class="reference" href="#feature-get" id="id27" name="id27">feature_get</a></li>
<li><a class="reference" href="#feature-set" id="id28" name="id28">feature_set</a></li>
<li><a class="reference" href="#continuation-commands" id="id29" name="id29">continuation commands</a></li>
<li><a class="reference" href="#breakpoints" id="id30" name="id30">breakpoints</a></li>
<li><a class="reference" href="#stack-depth" id="id31" name="id31">stack_depth</a></li>
<li><a class="reference" href="#stack-get" id="id32" name="id32">stack_get</a></li>
<li><a class="reference" href="#context-names" id="id33" name="id33">context_names</a></li>
<li><a class="reference" href="#context-get" id="id34" name="id34">context_get</a></li>
<li><a class="reference" href="#property-get-property-set-property-value" id="id35" name="id35">property_get, property_set, property_value</a></li>
<li><a class="reference" href="#source" id="id36" name="id36">source</a></li>
<li><a class="reference" href="#stdout-stderr" id="id37" name="id37">stdout, stderr</a></li>
</ul>
</li>
<li><a class="reference" href="#extended-commands" id="id38" name="id38">8. Extended Commands</a><ul>
<li><a class="reference" href="#stdin" id="id39" name="id39">stdin</a></li>
<li><a class="reference" href="#break" id="id40" name="id40">break</a></li>
<li><a class="reference" href="#eval" id="id41" name="id41">eval</a></li>
</ul>
</li>
</ul>
</div>
<div class="section" id="description">
<h1><a class="toc-backref" href="#id4" name="description">1. Description</a></h1>
<p>This document describes a simple protocol for use with language tools
and engines for the purpose of debugging applications.  It does not
describe user interfaces or interactions with the debugger.  The
protocol provides a means of communication between a debugger debugger
engine (scripting engine, vm, etc.) and a debugger IDE (IDE, etc.).
Any references to the debugger IDE UI are recommendations only, and are
provided for additional explanation or as reasoning for specific
design decisions.</p>
</div>
<div class="section" id="issues">
<h1><a class="toc-backref" href="#id5" name="issues">1.1 Issues</a></h1>
<p>1. The handling of proxy errors needs to be clarified.  Without both
IDE and debugger engine supporting commands to be received at
arbitrary times, the proxy may have problems sending error or status
information to either one.  See section 5.1.  We should think a bit
more about what a proxy might need to do.</p>
<p>2. Do we need some standard error codes that are for the protocol
itself?</p>
</div>
<div class="section" id="changes">
<h1><a class="toc-backref" href="#id6" name="changes">1.2 Changes</a></h1>
<div class="section" id="id1">
<h2><a class="toc-backref" href="#id7" name="id1">2003-10-06</a></h2>
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
<div class="section" id="id2">
<h2><a class="toc-backref" href="#id8" name="id2">2003-10-02</a></h2>
<ul class="simple">
<li>5.1 changed proxy error to be the same as that in 6.5</li>
<li>5.1 the IDE and proxy ports have been defined to 9000/9001</li>
<li>5.3 exclude protocol overhead from data size definition</li>
<li>6.2 changed typo 'stdin and stdout' to 'stdout and sterr'</li>
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
<div class="section" id="id3">
<h2><a class="toc-backref" href="#id9" name="id3">2003-09-30</a></h2>
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
<h1><a class="toc-backref" href="#id10" name="requirements">2. Requirements</a></h1>
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
<h1><a class="toc-backref" href="#id11" name="terminology">3. Terminology</a></h1>
<dl>
<dt>IDE</dt>
<dd>An IDE, or other debugger UI IDE or tool</dd>
<dt>debugger engine</dt>
<dd>The language engine being debugged</dd>
<dt>proxy</dt>
<dd>An intermediary deamon that acts as a proxy, and may also
implement support for other features such as just in time
debugging, ip security, etc.</dd>
<dt>session</dt>
<dd>a single thread in an application.  multiple threads in an
application will attach seperately.</dd>
<dt>TRUE</dt>
<dd>a value defined as TRUE should be a numeric one</dd>
<dt>FALSE</dt>
<dd>a value defined as FALSE should be a numeric zero</dd>
<dt>NUM</dt>
<dd>a base 10 numeric value that is stringified.</dd>
</dl>
</div>
<div class="section" id="security">
<h1><a class="toc-backref" href="#id12" name="security">4. Security</a></h1>
<p>It is expected that implementations will provide security, such as ip
filtering, ssh tunneling, etc.  This protocol itself does not provide
a means of securing the debugging session.</p>
</div>
<div class="section" id="initiating-a-debugging-session">
<h1><a class="toc-backref" href="#id13" name="initiating-a-debugging-session">5. Initiating a debugging session</a></h1>
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
<h2><a class="toc-backref" href="#id14" name="just-in-time-debugging-and-debugger-proxies">5.1 Just in time debugging and debugger proxies</a></h2>
<p>To support proxies and jit deamons, the IDE should be configured with
and ip:port pointing to the proxy/jit.  The IDE then makes a
connection and sends the following command:</p>
<pre class="literal-block">
proxyinit -a ip:port -s session_key -m [0|1]

-a  the ip and port that the IDE listens for debugging on
-s  a session key, which the debugger engine will also use in it's
    debugging init command.  this allows the proxy to match
    request to IDE.  Typicaly the user will provide the
    session key as a configuration item.
-m  this tells the deamon that the IDE supports (or doesn't)
    multiple debugger sessions.  if -m is missing, zero or no
    support is default.
</pre>
<p>The proxy should respond with a simple xml statement alerting the
IDE to an error, or the success of the initalization (see section
6.5 for more details on the error element).</p>
<pre class="literal-block">
&lt;proxyinit success=&quot;[0|1]&quot;
           proxyclientid=&quot;{ID}&quot;&gt;
    &lt;error id=&quot;app_specific_error_code&quot;&gt;
        &lt;message&gt;UI Usable Message&lt;/message&gt;
    &lt;/error&gt;
&lt;/proxyinit&gt;
</pre>
<p>Once the IDE has sent this command, and received a confirmation, it
disconnects from the proxy.</p>
<p>Upon connection to either a IDE or proxy, the debugger engine sends:</p>
<pre class="literal-block">
&lt;init   appid=&quot;APPID&quot;
        session=&quot;SESSION_KEY&quot;
        thread=&quot;THREAD_ID&quot;
        parent=&quot;PARENT_APPID&quot;
        language=&quot;LANGUAGE_NAME&quot;
        protocol_version=&quot;1.0&quot;
        fileuri=&quot;file://path/to/file&quot;&gt;


APPID           defined by the debugger engine
SESSION_KEY     defined by the user
THREAD_ID       the systems thread id
PARENT_APPID    the appid of the application that spawned the
                process.  When an application is executed, it
                should set it's APPID into the environment.
                If an APPID already exists, it should first
                read that value and use it as the PARENT_APPID.
LANGUAGE_NAME   debugger engine specific, must not contain
                additional information, such as version, etc.
Protocol        The highest version of this protocol supported
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
<p>If a proxy receives this packet, it will use the session_key to pass
the request to the correct IDE, or to do some other operation such as
which may be required to implement security or initiate just in time
debugging.  The proxy will add the proxyclientid as a child element to
the init packet when it passes it through to the IDE.  The proxy may
also add child elements with further information, and must add an
attribute to the init element called 'proxied' with the attribute
value being the ip address of the debugger engine.  This is the only
time the proxy will modify data being passed to the IDE.</p>
<p>If the proxy must send error data to the IDE, it may send an xml
message with the root element named 'proxyerror'.  This message will
be in the format of the error packets defined in 6.3 below.</p>
<p>If the proxy must send error data to the debugger engine, it may
send the proxyerror command defined in section 7 below.</p>
<p>The proxy listens for IDE connections on port 9001, and for debugger
engine connections on port 9000.</p>
</div>
<div class="section" id="multiple-processes-or-threads">
<h2><a class="toc-backref" href="#id15" name="multiple-processes-or-threads">5.2 Multiple Processes or Threads</a></h2>
<p>The debugger protocol is designed to use a seperate socket connection
for each process or thread.  The IDE may or may not support
multiple debugger sessions.  If it does not, the debugger engine must
not attempt to start debug sessions for threads, and the IDE should
not accept more than one socket connection for debugging.  The
IDE should tell the debugger engine whether it supports multiple
debugger sessions, the debugger engine should assume that the IDE does
not.</p>
</div>
<div class="section" id="feature-negotiation">
<h2><a class="toc-backref" href="#id16" name="feature-negotiation">5.3 Feature Negotiation</a></h2>
<p>Although the IDE may at any time during the debugging session send
feature_get or feature_set commands, the IDE should be designed to
negotiate the base set of features up front.  Differing langauges and
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
<h3><a class="toc-backref" href="#id17" name="data-packet-negotiation">Data packet negotiation</a></h3>
<p>IDE's may want to limit the size of data that is retreived from
debugger engines.  While the debugger engines will define their own
base default values, the IDE should negotiate these terms if it
needs to.  The debugger engine must support these requests from the
IDE.  This includes limits to the data size of a property or
variable, and the depth limit to arrays, hashes, objects, or other
tree like structures.  The data size excludes any the protocol
overhead.</p>
</div>
<div class="section" id="asynchronous-communications">
<h3><a class="toc-backref" href="#id18" name="asynchronous-communications">Asynchronous Communications</a></h3>
<p>While the protocol does not depend on asynchronous socket support,
certain design considerations may require that the IDE and/or debugger
engine treat incoming and outgoing data in an asynchronous fashion.</p>
<p>For ease of design, some implemenations may choose to utilize this
protocol in a completely synchronous fashion, and not implement
optional commands that require the debugger engine to behave in an
asynchronous fasion.  One example of this is the break command.</p>
<p>The break command is sent from the IDE while the debugger engine is
in a run state.  To support this, the debugger engine must periodicaly
peek at the socket to see if there are any incoming commands.  For
this reason the break command is optional.  If a command requires
this type of asynchronous behaviour on the part of the debugger
engine it must be optional for the debugger engine to support it.</p>
<p>On the other hand, IDE's MUST at times behave in an asynchronous
fashion.  When an IDE tells the debugger engine to enter a 'run' state,
it must watch the socket for incoming packets for stdout or stderr,
if it has requested the data be sent to it from the debugger engine.</p>
<p>The form of asynchronous communications that may occure in this
protocol are defined further in section 6.2 below.</p>
</div>
</div>
</div>
<div class="section" id="message-packets">
<h1><a class="toc-backref" href="#id19" name="message-packets">6. Message Packets</a></h1>
<p>The IDE sends simple ascii commands to the debugger engine.  The
debugger engine responds with XML data.  The XML data is prepended
with a stringified integer representing the length of the XML data
packet.  The length and XML data are seperated by a NULL byte.  The
XML data is ended with a NULL byte.  Neither the IDE or debugger engine
packets may contain NULL bytes within the packet since it is used as
a delimator.  Binary data must be encoded using base64.</p>
<pre class="literal-block">
IDE:       command [SPACE] [args] [NULL] base64(data) [NULL]
DEBUGGER:  [NUMBER] [NULL] XML(data) [NULL]
</pre>
<p>Arguments to the IDE commands are in the same format as common command
line arguments, and should be parsable by common code such as getopt,
or Pythons Cmd module:</p>
<pre class="literal-block">
command -a value -b value ...
</pre>
<p>All numbers in the protocol are base 10 string representations, unless
the number is noted to be debugger engine specific (eg. the address
attribute on property elements).</p>
<div class="section" id="why-not-xml-both-ways">
<h2><a class="toc-backref" href="#id20" name="why-not-xml-both-ways">6.1 Why not XML both ways?</a></h2>
<p>The primary reason is to avoid the requirement that a debugger debugger
engine has an XML parser available.  XML is easy to generate, but
requires additional libraries for parsing.</p>
</div>
<div class="section" id="packet-communications">
<h2><a class="toc-backref" href="#id21" name="packet-communications">6.2 Packet Communications</a></h2>
<p>The IDE sends a command, then waits for a response from the
debugger engine.  If the command is not received in a reasonable
time (implementation dependent) it may assume the debugger engine
has entered a non-responsive state.  The exception to this is when
the IDE sends a 'run' command which may not have an immediate response.</p>
<p>'run' commands include, but may not be limited to: run, run_to, step,
step_into, step_over, step_out and eval.  When the debugger engine
receives such a command, it is considered to have entered a
'run state'.</p>
<p>During a 'run' command, the IDE should expect to possibly receive
stdin and/or stderr packets from the debugger engine prior to
receiving a response to the command itself.  It may also possibly
receive error packets from either the debugger engine, or a proxy
if one is in use, either prior to the 'run' response, or in resonse
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
IDE:  stder redirect
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
<h2><a class="toc-backref" href="#id22" name="ide-to-debugger-engine-communications">6.3 IDE to debugger engine communications</a></h2>
<p>A debugging IDE (IDE) sends commands to the debugger debugger engine in
the form of command line arguments.  One argument that is included in
all commands is the data length.  The data itself is the last part of
the command line.  The data may be binary data if the encoding argument
is 'binary'.</p>
<pre class="literal-block">
command [arguments] [NULL] base64(data) [NULL]
</pre>
<p>Standard arguments for all commands</p>
<pre class="literal-block">
-i      Transaction ID
        unique for each command generated by the IDE
-l      data length, base 10, stringified.  If not present, zero
        data length is assumed, and no data section will be present
        (ie. command [arguments] [NULL]).
</pre>
</div>
<div class="section" id="debugger-engine-to-ide-communications">
<h2><a class="toc-backref" href="#id23" name="debugger-engine-to-ide-communications">6.4 debugger engine to IDE communications</a></h2>
<p>The debugger engine always replies or sends XML data.  The standard
namespace for the root elements returned from the debugger debugger
engine MUST be &quot;<a class="reference" href="urn:debugger_protocol_v1">urn:debugger_protocol_v1</a>&quot;.  Namespaces have been left
out in the examples in this document.  The messages sent by the
debugger engine must always be NULL terminated.  The xml document tag
must always be present to provide xml version and encoding information.</p>
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
<h2><a class="toc-backref" href="#id24" name="debugger-engine-errors">6.5 debugger engine errors</a></h2>
<p>A debugger engine may need to relay error information back to the IDE in
response to any command.  The debugger engine may add an error element
as a child of the response element.  Note that this is not the same
as getting language error messages, such as exception data.  This is
specificly a debugger debugger engine error in response to a IDE
command.  IDEs and debugger engines may elect to support additional
child elements in the error element, but should namespace the elements
to avoid conflicts with other implementations.</p>
<pre class="literal-block">
&lt;response command=&quot;command_name&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;error code=&quot;app_specific_error_code&quot;&gt;
        &lt;message&gt;UI Usable Message&lt;/message&gt;
    &lt;/error&gt;
&lt;/response&gt;
</pre>
</div>
</div>
<div class="section" id="core-commands">
<h1><a class="toc-backref" href="#id25" name="core-commands">7. Core Commands</a></h1>
<p>Both IDE and debugger engine must support all core commands.</p>
<div class="section" id="status">
<h2><a class="toc-backref" href="#id26" name="status">status</a></h2>
<blockquote>
<p>The status command is a simple way for the IDE to find out from
the debugger engine wether execution may be continued or not.
no body is required on request.  If async support has been
negotiated using feature_get/set the status command may be sent
while the debugger engine is in a 'run state'.</p>
<p>The status attribute values of the response may be:</p>
<blockquote>
<ul class="simple">
<li>starting</li>
<li>stopping</li>
<li>stopped</li>
<li>running</li>
<li>break</li>
</ul>
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
</blockquote>
</div>
<div class="section" id="feature-get">
<h2><a class="toc-backref" href="#id27" name="feature-get">feature_get</a></h2>
<blockquote>
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
supported_encodings         {ISO8859-15, UTF-8, etc.}
encoding                    current encoding in use by
                            the debugger session
protocol_version            {for now, always 1}
supports_async              {for commands such as break}
</pre>
<p>Additionaly, all protocol commands supported must have a string,
such as the following examples:</p>
<pre class="literal-block">
breakpoint_set
break
eval
</pre>
<p>arguments for feature_set include:</p>
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
      command=&quot;feature_name&quot;
      supported=&quot;0|1&quot;
      transaction_id=&quot;transaction_id&quot;&gt;
feature setting or available options, such as a list of
supported encodings
&lt;/response&gt;
</pre>
</blockquote>
</div>
<div class="section" id="feature-set">
<h2><a class="toc-backref" href="#id28" name="feature-set">feature_set</a></h2>
<blockquote>
<p>The feature set command allows a IDE to tell the debugger engine
what additional capabilities it has.  This is done by sending a
feature-set command with the body containing a string name for the
feature.  One example of this would be telling the debugger engine
whether the IDE supports multiple debugger sessions (for threads,
etc.).  The debugger engine respondes with telling the IDE whether
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
                           children to initialy retreive
max_data                   max amount of variable data to
                           initialy retrieve.
max_depth                  maximum depth that the debugger
                           engine may return when sending
                           arrays, hashs or object structures
                           to the IDE.
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
</blockquote>
</div>
<div class="section" id="continuation-commands">
<h2><a class="toc-backref" href="#id29" name="continuation-commands">continuation commands</a></h2>
<blockquote>
<p>resume the execution of the application.</p>
<ul class="simple">
<li>run</li>
<li>run_to</li>
<li>step</li>
<li>step_into</li>
<li>step_over</li>
<li>step_out</li>
<li>kill</li>
<li>stop</li>
</ul>
<p>The response to a continue command is a status response (see
status above).  The debugger engine does not send this response
immediately, but rather when it reaches a breakpoint, or ends
execution for any other reason.  The debugger engine does not end
debugger interaction until it receives a 'continue stop' command.</p>
<p>kill ends debugger engine execution, stop merely stops debugger
interaction but allows debugger engine execution to continue
normally.</p>
<pre class="literal-block">
-n      The line number to run to (run-to only)
-f      The filename to run to (run-to only)
</pre>
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
</blockquote>
</div>
<div class="section" id="breakpoints">
<h2><a class="toc-backref" href="#id30" name="breakpoints">breakpoints</a></h2>
<blockquote>
<ul class="simple">
<li>breakpoint_set</li>
<li>breakpoint_get</li>
<li>breakpoint_enable</li>
<li>breakpoint_disable</li>
<li>breakpoint_remove</li>
<li>breakpoint_list</li>
</ul>
<p>Get, enable, disable and remove breakpoint commands provide the
breakpoint ID, and recieve a response that is the breakpoint
data structure (also used in breakpoint_list)</p>
<p>IDE</p>
<pre class="literal-block">
breakpoint_disable -d breakpoint_id  -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response
    command=&quot;breakpoint_*&quot;
    transaction_id=&quot;transaction_id&quot;
    id=&quot;breakpoint_id&quot;
    type=&quot;type&quot;
    filename=&quot;URI&quot;
    lineno=&quot;{NUM}&quot;
    function=&quot;XX&quot;
    state=&quot;enabled|disabled|temporary|deleted&quot;
    exception=&quot;XX&quot;&gt;
  &lt;expression&gt;Here If Any&lt;/expression&gt;
&lt;/response&gt;
</pre>
<p>The set command sets breakpoints at the debugger engine execution.
Types include:</p>
<pre class="literal-block">
line            line number in filename
function        function name
exception       break on exception
conditional     truth of expression at filename and line number
                or in filename
watch           break on write of the variable or address
                defined by the expression argument
</pre>
<p>If a debugger engine does not support a particular type of
breakpoint, it may respond with an error packet.</p>
<p>States include:</p>
<pre class="literal-block">
enabled
disabled
temporary
</pre>
<p>A temporary state means the breakpoint will be used once, then
removed automaticaly.  A response body to the breakpoint command
is a 4 byte breakpoint ID, or 0 for failure.  The filename should
always be a file URI.  If an identical breakpoint is already set,
the debugger engine should respond as if it were setting a new
breakpoint, but not duplicate breakpoint entries in its own
storage.</p>
<pre class="literal-block">
-d      breakpoint id (required)
-t      type (required)
-s      state (required)
-n      lineno (optional)
-f      filename (optional)
-m      function name (optional)
-x      exception name (optional)
-c      expression (optional)
</pre>
<p>Not all arguments or response attributes fit with all breakpoint
types.  The id, type and state are required arguments.  The
breakpoint type and argument combinations include:</p>
<pre class="literal-block">
breapoint type  arguments or attributes

line            lineno and filename.  if filename omited the
                breakpoint is set in the current file
function        function name and filename.  filename is
                optional, if omited the engine considers this
                a break in any file.
exception       exception name only
conditional     expression, filename and lineno.  filename and
                lineno are optional.  If lineno is supplied and
                filename is omitted, then the debugger extension
                considers this for the current file when the
                breakpoint is set only.  if both are omitted
                then the expression occurs at any line in any
                file.
watch           expression only
</pre>
<p>IDE</p>
<pre class="literal-block">
breakpoint_set -i transaction_id [options]
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_set&quot;
      state=&quot;enabled&quot;
      id=&quot;breakpoint_id&quot;
      transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
<p>The breakpoint-list command returns a complete list of breakpoints
that the debugger engine is currently maintaining.</p>
<p>IDE</p>
<pre class="literal-block">
breakpoint_list -d breakpoint_id -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;breakpoint_list&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;breakpoint
        id=&quot;breakpoint_id&quot;
        type=&quot;type&quot;
        filename=&quot;...&quot;
        lineno=&quot;XX&quot;
        function=&quot;XX&quot;
        state=&quot;enabled|disabled|temporary&quot;
        exception=&quot;XX&quot;&gt;
      &lt;expression&gt;Here If Any&lt;/expression&gt;
    &lt;/breakpoint&gt;
&lt;/reponse&gt;
</pre>
</blockquote>
</div>
<div class="section" id="stack-depth">
<h2><a class="toc-backref" href="#id31" name="stack-depth">stack_depth</a></h2>
<blockquote>
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
</blockquote>
</div>
<div class="section" id="stack-get">
<h2><a class="toc-backref" href="#id32" name="stack-get">stack_get</a></h2>
<blockquote>
<p>returns stack information for a given stack depth.  For extended
debuggers, multiple file/line's may be returned by having
child elements of the stack element.  This is to allow
for debuggers, such as XSLT, that have execution and data files.
A double pound sign is used to deliminate filepaths from line
numbers and byte positions.  Multiple filepaths are seperated by
NULL.  The body size value from the packet header is used to
determine whether more filepaths are available in the stack
response.  The filename returned should always be the local file
system path translated into a file URI.  If the stack depth is
specified, only one stack element is returned, for the depth
requested.  The current context is stack depth of zero, the
'oldest' context (in some languages known as 'main') is the highest
numbered context.</p>
<pre class="literal-block">
-d      stack depth (optional)
</pre>
<p>IDE</p>
<pre class="literal-block">
stack_get -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;stack&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;stack level=&quot;{NUM}&quot;
           type=&quot;file|eval|?&quot;
           filename=&quot;...&quot;
           lineno=&quot;{NUM}&quot;/&gt;
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
</blockquote>
</div>
<div class="section" id="context-names">
<h2><a class="toc-backref" href="#id33" name="context-names">context_names</a></h2>
<blockquote>
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
</blockquote>
</div>
<div class="section" id="context-get">
<h2><a class="toc-backref" href="#id34" name="context-get">context_get</a></h2>
<blockquote>
<p>returns an array of properties in a given context at a given
stack depth.  If the stack depth is omitted, the current
stack depth is used.  If the context name is omitted, the context
with an id zero is used (generaly the 'locals' context).</p>
<pre class="literal-block">
-d      stack depth (optional)
-c      context id  (optional, retrieved by context-names)
</pre>
<p>IDE</p>
<pre class="literal-block">
context-get -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;context_get&quot;
          context=&quot;context_id&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;property ... /&gt;
&lt;/response&gt;
</pre>
<p>Properties require a more indepth description...</p>
<p>Properties that have children may return an arbitrary depth of
children, as defaulted by the debugger engine.  A maximum depth
may be defined by the IDE using the feature_set command with the
max_depth option.  The IDE may then use the fullname attribute of
a property to dig further into the tree.</p>
<p>The number of children sent is defined by the debugger engine
unless otherwise defined by sending the feature_set command with
the max_children option.</p>
<pre class="literal-block">
&lt;property
    name=&quot;short_name&quot;
    fullname=&quot;long_name&quot;
    type=&quot;data_type&quot;
    children=&quot;0|1&quot;
    size=&quot;{NUM}&quot;
    page=&quot;{NUM}&quot;
    pagesize=&quot;{NUM}&quot;
    address=&quot;{NUM}&quot;
    encoding=&quot;base64|none&quot;
    recursive=&quot;0|1&quot;
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
page            if not all the children in the first level are
                returned, then the page attribute, in combination
                with the pagesize attribute will define where in
                the array or object these children should be
                located.
pagesize        the size of each page of data, defaulted by the
                debugger engine, or negotiated with feature_set
                and max_children
type            language specific data type name
size            size of property data in bytes
children        true/false whether the property has children
                this would be true for objects or array's.
numchildren     optional attribute with number of children for
                the property.
address         containing physical memory address or other
                language dependent reference for the property.
recursive       this is a hint attribute to help in dealing with
                recursive data.  If recursive is 1, then the
                address attribute MUST be present in both the
                current element, and the element that is being
                referenced.  This is to allow IDE's to connect
                the two data points together.  if this attribute
                is not in the element, it defaults to zero.
encoding        if this is binary data, it should be base64 encoded
                with this attribute set
</pre>
</blockquote>
</div>
<div class="section" id="property-get-property-set-property-value">
<h2><a class="toc-backref" href="#id35" name="property-get-property-set-property-value">property_get, property_set, property_value</a></h2>
<blockquote>
<p>gets/sets a property value.  When retreiving a property with the
get method, the maximum data that should be returned is a default
defined by the debugger engine unless it has been negotiated using
feature_set with max_data.  If the size of the properties data is
larger than that, the debugger engine only returns the configured
ammount, and the IDE should call property_value to get the entire
data.  This is to prevent large data from slowing down debugger
sessions.  The IDE should implement UI that allows the user to
decide whether they want to retreive all the data.  The IDE should
not read more data than the length defined in the packet header.
The IDE can determine if there is more data by using the property
data length information.  As per the context_get command, the depth
of nested elements returned is either defaulted by the debugger
engine, or negotiated using feature_set with max_children</p>
<pre class="literal-block">
-d      stack depth (optional)
-c      context name (optional, retrieved by context-names)
-n      property long name
-m      max data size to retreive
-t      data type
-p      data page (for arrays, hashes, objects, etc.)
</pre>
<p>IDE</p>
<pre class="literal-block">
property-get -n property_long_name -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;property-get&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
    &lt;property ... /&gt;
    ...
&lt;/response&gt;
</pre>
<p>IDE</p>
<pre class="literal-block">
property-set -n property_long_name -d {NUM} -i transaction_id
         -l data_length {DATA}
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;property-set&quot;
      success=&quot;0|1&quot;
      transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
<p>IDE</p>
<pre class="literal-block">
property-value -n property_long_name -d {NUM} -i transaction_id
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;property-value&quot;
          size=&quot;{NUM}&quot;
          encoding=&quot;base64|none&quot;
          transaction_id=&quot;transaction_id&quot;&gt;
...Data...
&lt;/response&gt;
</pre>
</blockquote>
</div>
<div class="section" id="source">
<h2><a class="toc-backref" href="#id36" name="source">source</a></h2>
<blockquote>
<p>The body of the request is the URI (retreived from the stack info),
the body of the response is the data contents of the URI.</p>
<pre class="literal-block">
-b  begin line (optional)
-e  end line (optional)
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
</blockquote>
</div>
<div class="section" id="stdout-stderr">
<h2><a class="toc-backref" href="#id37" name="stdout-stderr">stdout, stderr</a></h2>
<blockquote>
<p>Body of the request is null, body of the response is true or false.
Upon receiving one of these redirect requests, the debugger engine
will start to copy data bound for one of these streams to the IDE,
using the message packets.</p>
<pre class="literal-block">
-c      [0|1|2] 0 - dissable, 1 - copy data, 2 - redirection
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
</blockquote>
</div>
</div>
<div class="section" id="extended-commands">
<h1><a class="toc-backref" href="#id38" name="extended-commands">8. Extended Commands</a></h1>
<p>A IDE can query the debugger engine by using the feature_get command
(see above).  The feature strings for extended commands defined in this
specification are the same as the command itself.  For commands not
listed in this specification, the prefix is 'xcmd-'.  Vendor or language
specific commands may be prefixed with 'xcmd-vendorname-'.</p>
<div class="section" id="stdin">
<h2><a class="toc-backref" href="#id39" name="stdin">stdin</a></h2>
<blockquote>
<p>The stdin command has nearly the same options and responses as
stdout and stderr from the core commands (section 7).  Since
redirecting stdin may be very difficult to support in some
languages, it is provided as an optional command.  Uses for
this command would primarily be for remote console operations.</p>
<p>If the IDE requests stdin, it will <em>always</em> be a redirection,
and the debugger engine must not accept stdin from any other
source.  The debugger engine may choose to not allow stdin to be
redirected in certain situations (such as when running under
a web server).</p>
<pre class="literal-block">
-c      [0|1|2] 0 - dissable, 1 - redirection
</pre>
<p>IDE</p>
<pre class="literal-block">
stdout -i transaction_id -c 1 -l data_length base64(data)
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;stdin&quot;
      success=&quot;0|1&quot;
      transaction_id=&quot;transaction_id&quot;/&gt;
</pre>
</blockquote>
</div>
<div class="section" id="break">
<h2><a class="toc-backref" href="#id40" name="break">break</a></h2>
<blockquote>
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
</blockquote>
</div>
<div class="section" id="eval">
<h2><a class="toc-backref" href="#id41" name="eval">eval</a></h2>
<blockquote>
<p>evaluate a given string within the current execution context.  A
property element may be returned as a child element of the response.</p>
<p>IDE</p>
<pre class="literal-block">
eval -i transaction_id -l data_length {DATA}
</pre>
<p>debugger engine</p>
<pre class="literal-block">
&lt;response command=&quot;eval&quot;
      success=&quot;0|1&quot;
      transaction_id=&quot;transaction_id&quot;&gt;
&lt;/response&gt;
</pre>
</blockquote>
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
