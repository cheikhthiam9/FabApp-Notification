<span style="color: #000000">
<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #FF8000">//Standard&nbsp;call&nbsp;for&nbsp;dependencies</span><span style="color: #0000BB">?&gt;<br /><a name="l1" /></span>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l2" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/#wrapper&nbsp;--&gt;<br /><a name="l3" />&nbsp;&nbsp;&nbsp;&nbsp;<br /><a name="l4" />&lt;div&nbsp;id="popModal"&nbsp;class="modal&nbsp;fade"&nbsp;role="dialog"&gt;<br /><a name="l5" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-dialog"&gt;<br /><a name="l6" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Modal&nbsp;content--&gt;<br /><a name="l7" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-content"&gt;<br /><a name="l8" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-header"&gt;<br /><a name="l9" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="button"&nbsp;class="close"&nbsp;data-dismiss="modal"&gt;&amp;times;&lt;/button&gt;<br /><a name="l10" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h4&nbsp;class="modal-title"&nbsp;id="modal-title"&gt;TM&lt;/h4&gt;<br /><a name="l11" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l12" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-body"&gt;<br /><a name="l13" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&nbsp;id="modal-body"&gt;&nbsp;-&nbsp;&lt;/p&gt;<br /><a name="l14" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l15" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-footer"&gt;<br /><a name="l16" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="button"&nbsp;class="btn&nbsp;btn-default"&nbsp;data-dismiss="modal"&gt;Close&lt;/button&gt;<br /><a name="l17" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l18" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l19" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l20" />&lt;/div&gt;<br /><a name="l21" />&lt;!--&nbsp;Modal&nbsp;--&gt;<br /><a name="l22" />&lt;div&nbsp;id="loadingModal"&nbsp;class="modal&nbsp;fade"&gt;<br /><a name="l23" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-dialog&nbsp;modal-sm"&gt;<br /><a name="l24" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Modal&nbsp;content--&gt;<br /><a name="l25" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-content"&gt;<br /><a name="l26" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="modal-body&nbsp;text-center"&gt;<br /><a name="l27" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;i&nbsp;class="fas&nbsp;fa-spinner&nbsp;fa-pulse&nbsp;fa-3x"&gt;&lt;/i&gt;<br /><a name="l28" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l29" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l30" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br /><a name="l31" />&lt;/div&gt;<br /><a name="l32" />&lt;!--&nbsp;Modal&nbsp;--&gt;<br /><a name="l33" />&nbsp;&nbsp;&nbsp;&nbsp;<br /><a name="l34" />&lt;!--&nbsp;dev&nbsp;details&nbsp;--&gt;<br /><a name="l35" />&lt;div&nbsp;class="col-sm-12"&gt;<br /><a name="l36" />&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"IP&nbsp;addy&nbsp;-&nbsp;"</span><span style="color: #007700">.</span><span style="color: #0000BB">getenv</span><span style="color: #007700">(</span><span style="color: #DD0000">'REMOTE_ADDR'</span><span style="color: #007700">);</span><span style="color: #0000BB">?&gt;<br /><a name="l37" /></span>&lt;/div&gt;<br /><a name="l38" /><br /><a name="l39" />&lt;script&nbsp;type="text/javascript"&gt;<br /><a name="l40" /><span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">if&nbsp;(isset(</span><span style="color: #0000BB">$staff</span><span style="color: #007700">)){</span><span style="color: #0000BB">?&gt;<br /><a name="l41" /></span>&nbsp;&nbsp;&nbsp;&nbsp;setTimeout(function(){window.location.href&nbsp;=&nbsp;"<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$_SESSION</span><span style="color: #007700">[</span><span style="color: #DD0000">'loc'</span><span style="color: #007700">]</span><span style="color: #0000BB">?&gt;</span>"},&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;(</span><span style="color: #0000BB">1</span><span style="color: #007700">+</span><span style="color: #0000BB">$_SESSION</span><span style="color: #007700">[</span><span style="color: #DD0000">"timeOut"</span><span style="color: #007700">]-</span><span style="color: #0000BB">time</span><span style="color: #007700">())*</span><span style="color: #0000BB">1000</span><span style="color: #007700">;&nbsp;</span><span style="color: #0000BB">?&gt;</span>);<br /><a name="l42" /><span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">}&nbsp;elseif&nbsp;(isset(</span><span style="color: #0000BB">$auto_off</span><span style="color: #007700">))&nbsp;{&nbsp;</span><span style="color: #0000BB">?&gt;<br /><a name="l43" /></span>&nbsp;&nbsp;&nbsp;&nbsp;//no&nbsp;auto&nbsp;refresh&nbsp;timer<br /><a name="l44" /><span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">}&nbsp;else&nbsp;{</span><span style="color: #0000BB">?&gt;<br /><a name="l45" /></span>&nbsp;&nbsp;&nbsp;&nbsp;setTimeout(function(){window.location.href&nbsp;=&nbsp;"/index.php"},&nbsp;301000);<br /><a name="l46" /><span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">}&nbsp;</span><span style="color: #0000BB">?&gt;<br /><a name="l47" /></span>&lt;/script&gt;<br /><a name="l48" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/jquery/jquery.min.js"&gt;&lt;/script&gt;<br /><a name="l49" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/moment/moment.min.js"&gt;&lt;/script&gt;<br /><a name="l50" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/blackrock-digital/js/sb-admin-2.js"&gt;&lt;/script&gt;<br /><a name="l51" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/datatables/js/dataTables.min.js"&gt;&lt;/script&gt;<br /><a name="l52" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/bs-datetimepicker/js/bootstrap-datetimepicker.min.js"&gt;&lt;/script&gt;<br /><a name="l53" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/fabapp/fabapp.js?v=3"&gt;&lt;/script&gt;<br /><a name="l54" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/metisMenu/metisMenu.min.js"&gt;&lt;/script&gt;<br /><a name="l55" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/morrisjs/morris.min.js"&gt;&lt;/script&gt;<br /><a name="l56" />&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type="text/javascript"&nbsp;src="/vendor/raphael/raphael.min.js"&gt;&lt;/script&gt;<br /><a name="l57" />&lt;/body&gt;<br /><a name="l58" />&lt;/html&gt;</span>