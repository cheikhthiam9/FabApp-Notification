<span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /><a name="l1" /><br /><a name="l2" /></span><span style="color: #FF8000">/***********************************************************************************************************<br /><a name="l3" />*&nbsp;&nbsp;&nbsp;&nbsp;<br /><a name="l4" />*&nbsp;&nbsp;&nbsp;&nbsp;@author&nbsp;MPZinke<br /><a name="l5" />*&nbsp;&nbsp;&nbsp;&nbsp;created&nbsp;on&nbsp;08.14.19&nbsp;<br /><a name="l6" />*&nbsp;&nbsp;&nbsp;&nbsp;CC&nbsp;BY-NC-AS&nbsp;UTA&nbsp;FabLab&nbsp;2016-2019<br /><a name="l7" />*&nbsp;&nbsp;&nbsp;&nbsp;FabApp&nbsp;V&nbsp;0.93.1<br /><a name="l8" />*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Data&nbsp;Reports&nbsp;update<br /><a name="l9" />*<br /><a name="l10" />*&nbsp;&nbsp;&nbsp;&nbsp;DESCRIPTION:&nbsp;AJAX&nbsp;POST&nbsp;call&nbsp;page&nbsp;to&nbsp;execute&nbsp;asyncronous&nbsp;JSON&nbsp;responses.&nbsp;&nbsp;Used<br /><a name="l11" />*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by&nbsp;stats.php<br /><a name="l12" />*&nbsp;&nbsp;&nbsp;&nbsp;FUTURE:&nbsp;&nbsp;&nbsp;&nbsp;<br /><a name="l13" />*&nbsp;&nbsp;&nbsp;&nbsp;BUGS:&nbsp;<br /><a name="l14" />*<br /><a name="l15" />***********************************************************************************************************/<br /><a name="l16" /><br /><a name="l17" /><br /><a name="l18" /></span><span style="color: #007700">include_once&nbsp;(</span><span style="color: #0000BB">filter_input</span><span style="color: #007700">(</span><span style="color: #0000BB">INPUT_SERVER</span><span style="color: #007700">,</span><span style="color: #DD0000">'DOCUMENT_ROOT'</span><span style="color: #007700">).</span><span style="color: #DD0000">'/connections/db_connect8.php'</span><span style="color: #007700">);<br /><a name="l19" />include_once&nbsp;(</span><span style="color: #0000BB">filter_input</span><span style="color: #007700">(</span><span style="color: #0000BB">INPUT_SERVER</span><span style="color: #007700">,</span><span style="color: #DD0000">'DOCUMENT_ROOT'</span><span style="color: #007700">).</span><span style="color: #DD0000">'/class/all_classes.php'</span><span style="color: #007700">);<br /><a name="l20" /><br /><a name="l21" /></span><span style="color: #FF8000">//&nbsp;authenticate&nbsp;permission&nbsp;for&nbsp;user<br /><a name="l22" /></span><span style="color: #0000BB">session_start</span><span style="color: #007700">();<br /><a name="l23" /></span><span style="color: #0000BB">$staff&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">unserialize</span><span style="color: #007700">(</span><span style="color: #0000BB">$_SESSION</span><span style="color: #007700">[</span><span style="color: #DD0000">'staff'</span><span style="color: #007700">]);<br /><a name="l24" />if(!</span><span style="color: #0000BB">$staff&nbsp;</span><span style="color: #007700">||&nbsp;</span><span style="color: #0000BB">$staff</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">roleID&nbsp;</span><span style="color: #007700">&lt;&nbsp;</span><span style="color: #0000BB">$role</span><span style="color: #007700">[</span><span style="color: #DD0000">"admin"</span><span style="color: #007700">])&nbsp;exit();<br /><a name="l25" /><br /><a name="l26" /></span><span style="color: #FF8000">//———TESTING———<br /><a name="l27" />//&nbsp;$_POST["query"]&nbsp;=&nbsp;"byHour";<br /><a name="l28" />//&nbsp;$_POST["start_time"]&nbsp;=&nbsp;"0010-10-10";<br /><a name="l29" />//&nbsp;$_POST["end_time"]&nbsp;=&nbsp;"2019-09-30";<br /><a name="l30" />//&nbsp;$_POST["device"]&nbsp;=&nbsp;"*";<br /><a name="l31" /><br /><a name="l32" /></span><span style="color: #007700">if(</span><span style="color: #0000BB">$_SERVER</span><span style="color: #007700">[</span><span style="color: #DD0000">"REQUEST_METHOD"</span><span style="color: #007700">]&nbsp;==&nbsp;</span><span style="color: #DD0000">"POST"&nbsp;</span><span style="color: #007700">&amp;&amp;&nbsp;isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"prebuilt_query"</span><span style="color: #007700">]))&nbsp;{<br /><a name="l33" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$function&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"query"</span><span style="color: #007700">]);<br /><a name="l34" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$start&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"start_time"</span><span style="color: #007700">]);<br /><a name="l35" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$end&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"end_time"</span><span style="color: #007700">]);<br /><a name="l36" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$device&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"device"</span><span style="color: #007700">]);<br /><a name="l37" /><br /><a name="l38" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$pie_chart_label_column&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"pie_chart_label_column"</span><span style="color: #007700">]);<br /><a name="l39" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$pie_chart_data_column&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"pie_chart_data_column"</span><span style="color: #007700">]);<br /><a name="l40" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$pie_chart_label_column&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"Hour"</span><span style="color: #007700">;&nbsp;&nbsp;</span><span style="color: #FF8000">//TESTING<br /><a name="l41" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$pie_chart_data_column&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"Count"</span><span style="color: #007700">;&nbsp;&nbsp;</span><span style="color: #FF8000">//TESTING<br /><a name="l42" /><br /><a name="l43" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$params&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">Database_Query</span><span style="color: #007700">::</span><span style="color: #0000BB">prebuilt_query</span><span style="color: #007700">(</span><span style="color: #0000BB">$end</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$function</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$start</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$device</span><span style="color: #007700">);<br /><a name="l44" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$query_object&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Database_Query</span><span style="color: #007700">(</span><span style="color: #0000BB">$params</span><span style="color: #007700">[</span><span style="color: #DD0000">"statement"</span><span style="color: #007700">]);<br /><a name="l45" />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">json_encode</span><span style="color: #007700">(array(&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"HTML"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">HTML_table</span><span style="color: #007700">,<br /><a name="l46" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"pie_chart"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">pie_chart_data</span><span style="color: #007700">(</span><span style="color: #0000BB">$pie_chart_data_column</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$pie_chart_label_column</span><span style="color: #007700">),<br /><a name="l47" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"statement"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">statement</span><span style="color: #007700">,<br /><a name="l48" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"tsv"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">tsv</span><span style="color: #007700">,<br /><a name="l49" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"warning"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">warning</span><span style="color: #007700">));<br /><a name="l50" />}<br /><a name="l51" /><br /><a name="l52" /><br /><a name="l53" /></span><span style="color: #FF8000">//&nbsp;————————————————&nbsp;CUSTOM&nbsp;QUERY&nbsp;————————————————<br /><a name="l54" /><br /><a name="l55" />//&nbsp;get&nbsp;columns&nbsp;to&nbsp;select&nbsp;from<br /><a name="l56" /></span><span style="color: #007700">if(</span><span style="color: #0000BB">$_SERVER</span><span style="color: #007700">[</span><span style="color: #DD0000">"REQUEST_METHOD"</span><span style="color: #007700">]&nbsp;==&nbsp;</span><span style="color: #DD0000">"POST"&nbsp;</span><span style="color: #007700">&amp;&amp;&nbsp;isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"columns_for_table"</span><span style="color: #007700">]))&nbsp;{<br /><a name="l57" /></span><span style="color: #FF8000">//&nbsp;elseif($_SERVER["REQUEST_METHOD"]&nbsp;==&nbsp;"POST"&nbsp;&amp;&amp;&nbsp;isset($_POST["columns_for_table"]))&nbsp;{<br /><a name="l58" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$table&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Database_Table</span><span style="color: #007700">(</span><span style="color: #0000BB">filter_input</span><span style="color: #007700">(</span><span style="color: #0000BB">INPUT_POST</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"table_id"</span><span style="color: #007700">));<br /><a name="l59" /><br /><a name="l60" />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">json_encode</span><span style="color: #007700">(array(&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"columns"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$table</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">columns</span><span style="color: #007700">,<br /><a name="l61" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"column_names"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$table</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">column_names</span><span style="color: #007700">,<br /><a name="l62" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"name"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$table</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">name</span><span style="color: #007700">,<br /><a name="l63" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"table"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$table</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">table</span><span style="color: #007700">,&nbsp;<br /><a name="l64" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"types"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$table</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">column_types</span><span style="color: #007700">));<br /><a name="l65" />}<br /><a name="l66" /><br /><a name="l67" /></span><span style="color: #FF8000">//&nbsp;submit&nbsp;custom&nbsp;query&nbsp;and&nbsp;return&nbsp;results<br /><a name="l68" /></span><span style="color: #007700">elseif(</span><span style="color: #0000BB">$_SERVER</span><span style="color: #007700">[</span><span style="color: #DD0000">"REQUEST_METHOD"</span><span style="color: #007700">]&nbsp;==&nbsp;</span><span style="color: #DD0000">"POST"&nbsp;</span><span style="color: #007700">&amp;&amp;&nbsp;isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"custom_query"</span><span style="color: #007700">]))&nbsp;{<br /><a name="l69" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$statement&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"statement"</span><span style="color: #007700">];<br /><a name="l70" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;$statement&nbsp;=&nbsp;"SELECT&nbsp;`materials`.*,`device_materials`.*&nbsp;FROM&nbsp;`materials`&nbsp;JOIN&nbsp;`device_materials`&nbsp;ON&nbsp;`materials`.`m_id`&nbsp;=&nbsp;`device_materials`.`m_id`";<br /><a name="l71" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$query_object&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Database_Query</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"statement"</span><span style="color: #007700">]);<br /><a name="l72" />&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">error</span><span style="color: #007700">)&nbsp;</span><span style="color: #0000BB">echo_error</span><span style="color: #007700">(</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">error</span><span style="color: #007700">);<br /><a name="l73" /><br /><a name="l74" />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">json_encode</span><span style="color: #007700">(array(&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"HTML"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">HTML_table</span><span style="color: #007700">,<br /><a name="l75" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"statement"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$statement</span><span style="color: #007700">,<br /><a name="l76" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"tsv"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">tsv</span><span style="color: #007700">,<br /><a name="l77" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"warning"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$query_object</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">warning</span><span style="color: #007700">));<br /><a name="l78" />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;exit();<br /><a name="l79" /></span><span style="color: #007700">}<br /><a name="l80" /><br /><a name="l81" /><br /><a name="l82" /></span><span style="color: #FF8000">//&nbsp;-————————————&nbsp;&nbsp;PREBUILD&nbsp;QUERY&nbsp;—————————————&nbsp;<br /><a name="l83" />//&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Get&nbsp;fields,&nbsp;sort&nbsp;values,&nbsp;inject&nbsp;JS&nbsp;function&nbsp;call&nbsp;at&nbsp;bottom&nbsp;of&nbsp;page<br /><a name="l84" /><br /><a name="l85" /></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">create_pie_chart</span><span style="color: #007700">(</span><span style="color: #0000BB">$head</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$statement</span><span style="color: #007700">)&nbsp;{<br /><a name="l86" />&nbsp;&nbsp;&nbsp;&nbsp;global&nbsp;</span><span style="color: #0000BB">$mysqli</span><span style="color: #007700">;<br /><a name="l87" /><br /><a name="l88" />&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">$results&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$mysqli</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">query</span><span style="color: #007700">(</span><span style="color: #0000BB">$statement</span><span style="color: #007700">))&nbsp;{<br /><a name="l89" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;convert&nbsp;results&nbsp;into&nbsp;array<br /><a name="l90" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$values&nbsp;</span><span style="color: #007700">=&nbsp;array();<br /><a name="l91" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while(</span><span style="color: #0000BB">$row&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$results</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">fetch_assoc</span><span style="color: #007700">())<br /><a name="l92" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$values</span><span style="color: #007700">[</span><span style="color: #0000BB">$row</span><span style="color: #007700">[</span><span style="color: #0000BB">$head</span><span style="color: #007700">[</span><span style="color: #0000BB">0</span><span style="color: #007700">]]]&nbsp;=&nbsp;</span><span style="color: #0000BB">$row</span><span style="color: #007700">[</span><span style="color: #0000BB">$head</span><span style="color: #007700">[</span><span style="color: #0000BB">1</span><span style="color: #007700">]];<br /><a name="l93" /><br /><a name="l94" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$sum&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">array_sum</span><span style="color: #007700">(</span><span style="color: #0000BB">$values</span><span style="color: #007700">);<br /><a name="l95" /><br /><a name="l96" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;get&nbsp;proportionality&nbsp;of&nbsp;each&nbsp;value&nbsp;for&nbsp;each&nbsp;key<br /><a name="l97" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$slices&nbsp;</span><span style="color: #007700">=&nbsp;array();<br /><a name="l98" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach(</span><span style="color: #0000BB">$values&nbsp;</span><span style="color: #007700">as&nbsp;</span><span style="color: #0000BB">$key&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$value</span><span style="color: #007700">)<br /><a name="l99" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$slices</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #DD0000">"</span><span style="color: #0000BB">$key</span><span style="color: #DD0000">,"</span><span style="color: #007700">.</span><span style="color: #0000BB">strval</span><span style="color: #007700">(</span><span style="color: #0000BB">$value&nbsp;</span><span style="color: #007700">/&nbsp;</span><span style="color: #0000BB">$sum</span><span style="color: #007700">);<br /><a name="l100" /><br /><a name="l101" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">implode</span><span style="color: #007700">(</span><span style="color: #DD0000">";"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$slices</span><span style="color: #007700">);<br /><a name="l102" />&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;<br /><a name="l103" />}<br /><a name="l104" /><br /><a name="l105" /><br /><a name="l106" />function&nbsp;</span><span style="color: #0000BB">echo_error</span><span style="color: #007700">(</span><span style="color: #0000BB">$error_message</span><span style="color: #007700">)&nbsp;{<br /><a name="l107" />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">json_encode</span><span style="color: #007700">(array(</span><span style="color: #DD0000">"error"&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$error_message</span><span style="color: #007700">));<br /><a name="l108" />&nbsp;&nbsp;&nbsp;&nbsp;exit();<br /><a name="l109" />}<br /><a name="l110" /><br /><a name="l111" /><br /><a name="l112" /></span><span style="color: #0000BB">?&gt;</span>
</span>