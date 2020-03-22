<span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /><a name="l1" /></span><span style="color: #FF8000">/**<br /><a name="l2" />&nbsp;*&nbsp;This&nbsp;file&nbsp;is&nbsp;part&nbsp;of&nbsp;escpos-php:&nbsp;PHP&nbsp;receipt&nbsp;printer&nbsp;library&nbsp;for&nbsp;use&nbsp;with<br /><a name="l3" />&nbsp;*&nbsp;ESC/POS-compatible&nbsp;thermal&nbsp;and&nbsp;impact&nbsp;printers.<br /><a name="l4" />&nbsp;*<br /><a name="l5" />&nbsp;*&nbsp;Copyright&nbsp;(c)&nbsp;2014-16&nbsp;Michael&nbsp;Billington&nbsp;&lt;&nbsp;michael.billington@gmail.com&nbsp;&gt;,<br /><a name="l6" />&nbsp;*&nbsp;incorporating&nbsp;modifications&nbsp;by&nbsp;others.&nbsp;See&nbsp;CONTRIBUTORS.md&nbsp;for&nbsp;a&nbsp;full&nbsp;list.<br /><a name="l7" />&nbsp;*<br /><a name="l8" />&nbsp;*&nbsp;This&nbsp;software&nbsp;is&nbsp;distributed&nbsp;under&nbsp;the&nbsp;terms&nbsp;of&nbsp;the&nbsp;MIT&nbsp;license.&nbsp;See&nbsp;LICENSE.md<br /><a name="l9" />&nbsp;*&nbsp;for&nbsp;details.<br /><a name="l10" />&nbsp;*/<br /><a name="l11" /><br /><a name="l12" /></span><span style="color: #007700">namespace&nbsp;</span><span style="color: #0000BB">Mike42</span><span style="color: #007700">\</span><span style="color: #0000BB">Escpos</span><span style="color: #007700">\</span><span style="color: #0000BB">PrintConnectors</span><span style="color: #007700">;<br /><a name="l13" /><br /><a name="l14" /></span><span style="color: #FF8000">/**<br /><a name="l15" />&nbsp;*&nbsp;Print&nbsp;connector&nbsp;that&nbsp;writes&nbsp;to&nbsp;nowhere,&nbsp;but&nbsp;allows&nbsp;the&nbsp;user&nbsp;to&nbsp;retrieve&nbsp;the<br /><a name="l16" />&nbsp;*&nbsp;buffered&nbsp;data.&nbsp;Used&nbsp;for&nbsp;testing.<br /><a name="l17" />&nbsp;*/<br /><a name="l18" /></span><span style="color: #007700">final&nbsp;class&nbsp;</span><span style="color: #0000BB">DummyPrintConnector&nbsp;</span><span style="color: #007700">implements&nbsp;</span><span style="color: #0000BB">PrintConnector<br /><a name="l19" /></span><span style="color: #007700">{<br /><a name="l20" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">/**<br /><a name="l21" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;@var&nbsp;array&nbsp;$buffer<br /><a name="l22" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;Buffer&nbsp;of&nbsp;accumilated&nbsp;data.<br /><a name="l23" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/<br /><a name="l24" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">private&nbsp;</span><span style="color: #0000BB">$buffer</span><span style="color: #007700">;<br /><a name="l25" /><br /><a name="l26" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">/**<br /><a name="l27" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;@var&nbsp;string&nbsp;data&nbsp;which&nbsp;the&nbsp;printer&nbsp;will&nbsp;provide&nbsp;on&nbsp;next&nbsp;read<br /><a name="l28" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/<br /><a name="l29" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">private&nbsp;</span><span style="color: #0000BB">$readData</span><span style="color: #007700">;<br /><a name="l30" /><br /><a name="l31" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">/**<br /><a name="l32" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Create&nbsp;new&nbsp;print&nbsp;connector<br /><a name="l33" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/<br /><a name="l34" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">public&nbsp;function&nbsp;</span><span style="color: #0000BB">__construct</span><span style="color: #007700">()<br /><a name="l35" />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><a name="l36" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">buffer&nbsp;</span><span style="color: #007700">=&nbsp;array();<br /><a name="l37" />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l38" /><br /><a name="l39" />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;</span><span style="color: #0000BB">__destruct</span><span style="color: #007700">()<br /><a name="l40" />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><a name="l41" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">buffer&nbsp;</span><span style="color: #007700">!==&nbsp;</span><span style="color: #0000BB">null</span><span style="color: #007700">)&nbsp;{<br /><a name="l42" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">trigger_error</span><span style="color: #007700">(</span><span style="color: #DD0000">"Print&nbsp;connector&nbsp;was&nbsp;not&nbsp;finalized.&nbsp;Did&nbsp;you&nbsp;forget&nbsp;to&nbsp;close&nbsp;the&nbsp;printer?"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">E_USER_NOTICE</span><span style="color: #007700">);<br /><a name="l43" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l44" />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l45" /><br /><a name="l46" />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;</span><span style="color: #0000BB">finalize</span><span style="color: #007700">()<br /><a name="l47" />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><a name="l48" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">buffer&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">null</span><span style="color: #007700">;<br /><a name="l49" />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l50" /><br /><a name="l51" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">/**<br /><a name="l52" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;@return&nbsp;string&nbsp;Get&nbsp;the&nbsp;accumulated&nbsp;data&nbsp;that&nbsp;has&nbsp;been&nbsp;sent&nbsp;to&nbsp;this&nbsp;buffer.<br /><a name="l53" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/<br /><a name="l54" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">public&nbsp;function&nbsp;</span><span style="color: #0000BB">getData</span><span style="color: #007700">()<br /><a name="l55" />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><a name="l56" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">implode</span><span style="color: #007700">(</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">buffer</span><span style="color: #007700">);<br /><a name="l57" />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l58" /><br /><a name="l59" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">/**<br /><a name="l60" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;{@inheritDoc}<br /><a name="l61" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;@see&nbsp;PrintConnector::read()<br /><a name="l62" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/<br /><a name="l63" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">public&nbsp;function&nbsp;</span><span style="color: #0000BB">read</span><span style="color: #007700">(</span><span style="color: #0000BB">$len</span><span style="color: #007700">)<br /><a name="l64" />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><a name="l65" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">$len&nbsp;</span><span style="color: #007700">&gt;=&nbsp;</span><span style="color: #0000BB">strlen</span><span style="color: #007700">(</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">readData</span><span style="color: #007700">)&nbsp;?&nbsp;</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">readData&nbsp;</span><span style="color: #007700">:&nbsp;</span><span style="color: #0000BB">substr</span><span style="color: #007700">(</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">readData</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$len</span><span style="color: #007700">);<br /><a name="l66" />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l67" /><br /><a name="l68" />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;</span><span style="color: #0000BB">write</span><span style="color: #007700">(</span><span style="color: #0000BB">$data</span><span style="color: #007700">)<br /><a name="l69" />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><a name="l70" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$this&nbsp;</span><span style="color: #007700">-&gt;&nbsp;</span><span style="color: #0000BB">buffer</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">$data</span><span style="color: #007700">;<br /><a name="l71" />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><a name="l72" />}<br /><a name="l73" /></span>
</span>