<h1>Stationery Designer</h1>
<div id="main_toolbar">
	<div class="main-toolbar-icon" rel="toolbar_text_box">
		<img src="/images/toolbar/text-box.png" border="0" width="40" height="32" alt="Text Box" />
		<p>Text Box</p>
	</div>
	<div class="main-toolbar-icon" rel="toolbar_shape">
		<img src="/images/toolbar/shape.png" border="0" width="40" height="32" alt="Shape" />
		<p>Shape</p>
	</div>
	<div class="main-toolbar-icon" rel="toolbar_picture">
		<img src="/images/toolbar/picture.png" border="0" width="40" height="32" alt="Picture" />
		<p>Picture</p>
	</div>
</div>
<div id="toolbar">
	<div id="toolbar_text_box" class="toolbar hide">
		<div class="toolbar-icon"><input style="width: 176px; font-size: 10px;" id="text" name="text" /></div>
		<div class="toolbar-icon"><img title="Bold" src="/images/toolbar/bold.png" alt="Bold" width="26" height="23" /></div>
		<div class="toolbar-icon"><img title="Italic" src="/images/toolbar/italic.png" alt="Italic" width="29" height="23" /></div>
		<div class="toolbar-icon"><img title="Underline" src="/images/toolbar/underline.png" alt="Underline" width="29" height="23" /></div>
		<div class="toolbar-icon"><img title="Align text left" src="/images/toolbar/align-text-left.png" alt="Align text left" width="28" height="23" /></div>
		<div class="toolbar-icon"><img title="Centre text" src="/images/toolbar/align-text-centre.png" alt="Centre text" width="29" height="23" /></div>
		<div class="toolbar-icon"><img title="Align text right" src="/images/toolbar/align-text-right.png" alt="Align text right" width="29" height="23" /></div>
		<div class="toolbar-icon"><img title="Justify text" src="/images/toolbar/align-text-justify.png" alt="Justify text" width="30" height="23" /></div>
		<div class="toolbar-icon">
			<select id="text_font">
				<option value="Arial">Arial</option>
				<option value="Comic Sans">Comic Sans</option>
				<option value="Courier">Courier</option>
				<option value="Impact">Impact</option>
				<option value="Optima">Optima</option>
				<option value="Tahoma">Tahoma</option>
				<option value="Times New Roman">Times New Roman</option>
				<option value="Verdana">Verdana</option>
			</select>
		</div>
		<div class="toolbar-icon">
			<select id="text_size">
				<option value="10">10</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="16">16</option>
				<option value="18">18</option>
				<option value="24">24</option>
				<option value="36">36</option>
			</select>
		</div>
		<div class="toolbar-icon">
			<div class="colour-picker">
		      	<input type="text" id="text_colour" style="background-color: #FF0000; color: #FFF;" value="#ff0000" />
	      	</div>
		</div>
	</div>
	<div id="toolbar_shape" class="toolbar hide">
		<div class="toolbar-icon"><img title="Line" src="/images/toolbar/line.png" alt="Line" width="24" height="24" /></div>
		<div class="toolbar-icon"><img title="Rectangle" src="/images/toolbar/rectangle.png" alt="Rectangle" width="24" height="24" /></div>
		<div class="toolbar-icon"><img title="Oval" src="/images/toolbar/oval.png" alt="Oval" width="24" height="24" /></div>
		<div class="toolbar-icon">
	    	<select style="width: 40px" id="line_size" name="line_size">
	        	<option value="1">1</option>
		        <option value="2">2</option>
		        <option value="4">4</option>
	    	    <option value="8">8</option>
	        	<option value="10">10</option>
		    </select>
	    </div>
	    <div class="toolbar-icon">
			<div class="colour-picker">
		  		<input type="text" id="line_colour" style="background-color: #FF0000; color: #FFF;" value="#ff0000" />
		  	</div>
		</div>
	</div>
	<div id="toolbar_picture" class="toolbar hide">
		<div class="toolbar-icon"><img title="Enlarge Picture" src="/images/toolbar/enlarge.png" alt="Enlarge Picture" width="24" height="24" /><div class="toolbar-text">Enlarge</div></div>
		<div class="toolbar-icon"><img title="Reduce Picture" src="/images/toolbar/reduce.png" alt="Reduce Picture" width="24" height="24" /><div class="toolbar-text">Reduce</div></div>
		<div class="toolbar-icon"><img title="Rotate Picture Right" src="/images/toolbar/rotate-right.png" alt="Rotate Picture Right" width="24" height="24" /><div class="toolbar-text">Rotate Right</div></div>
		<div class="toolbar-icon"><img title="Rotate Picture Left" src="/images/toolbar/rotate-left.png" alt="Rotate Picture Left" width="24" height="24" /><div class="toolbar-text">Rotate Left</div></div>
		<div class="toolbar-icon"><img title="Rotate Picture Right 90&deg;" src="/images/toolbar/rotate-right-90.png" alt="Rotate Picture Right 90&deg;" width="24" height="24" /><div class="toolbar-text">Rotate Right 90&deg;</div></div>
		<div class="toolbar-icon"><img title="Rotate Picture Left 90&deg;" src="/images/toolbar/rotate-left-90.png" alt="Rotate Picture Left 90&deg;" width="24" height="24" /><div class="toolbar-text">Rotate Left 90&deg;</div></div>
		<div class="toolbar-icon"><img title="Flip Picture Vertical" src="/images/toolbar/flip-vertical.png" alt="Flip Picture Vertical" width="24" height="24" /><div class="toolbar-text">Flip Vertical</div></div>
		<div class="toolbar-icon"><img title="Flip Picture Horizontal" src="/images/toolbar/flip-horizontal.png" alt="Flip Picture Horizontal" width="24" height="24" /><div class="toolbar-text">Flip Horizontal</div></div>
		<div class="toolbar-icon">
			<select>
		    	<option value="0">None</option>
		        <option value="1">1</option>
		        <option value="2">2</option>
		        <option value="4">4</option>
		        <option value="8">8</option>
		        <option value="10">10</option>
			</select>
			<div title="Border Colour" class="colour-picker" style="background-color: #000000;"></div>
			<div class="toolbar-text">Border</div>
		</div>
		<div class="toolbar-icon" id="loading_uploadify"><img src="/images/loading/loading-uploadify.gif" alt="Loading..." width="24" height="24" /></div>
		<div id="upload_picture_container" class="toolbar-icon">
    		<input id="upload_picture" name="upload_picture" type="file" />
    	</div>
    	<div id="upload_picture_queue"></div>
	</div>
</div>
<form action="#" method="post" id="design_form">
    <input id="selected_element" name="selected_element" type="hidden" value="" />
    <input id="element_count" name="element_count" type="hidden" value="0" />
    <input type="hidden" name="image_deleted" id="image_deleted" value="false" />
	<div id="canvas">
		<div id="card" style="background: #FFF; width: 500px; height: 600px;">
			<div id="design" style="width: 458px; height: 558px; margin: 20px;"></div>
		</div>
	</div>    
</form>
<form id="save_form" class="hide"></form>
<?php include_partial('designerScript'); ?>
<?php include_partial('designerFunctionsScript'); ?>