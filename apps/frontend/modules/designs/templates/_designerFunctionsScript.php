<script type="text/javascript">
	
	
	
	
	
	<?php /*
	window.onload = function ()
	{

		// Create a form element for saving
		function addHiddenFormElements(elements, element_id)
		{
			var form = $("#design_form");
			form.append('<fieldset id="save_element_group_d_'+element_id+'">');
			form.append('<input id="save_element_d_id_'+element_id+'" name="save_element_ids[]" type="hidden" value="'+element_id+'" />');
			form.append('<input id="save_element_d_'+element_id+'_type" name="save_element_'+element_id+'_type" type="hidden" value="'+elements[element_id]['type']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_width" name="save_element_'+element_id+'_width" type="hidden" value="'+elements[element_id]['width']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_height" name="save_element_'+element_id+'_height" type="hidden" value="'+elements[element_id]['height']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_x" name="save_element_'+element_id+'_x" type="hidden" value="'+elements[element_id]['x']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_y" name="save_element_'+element_id+'_y" type="hidden" value="'+elements[element_id]['y']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_startx" name="save_element_'+element_id+'_startx" type="hidden" value="'+elements[element_id]['startx']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_starty" name="save_element_'+element_id+'_starty" type="hidden" value="'+elements[element_id]['starty']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_endx" name="save_element_'+element_id+'_endx" type="hidden" value="'+elements[element_id]['endx']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_endy" name="save_element_'+element_id+'_endy" type="hidden" value="'+elements[element_id]['endy']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_scale" name="save_element_'+element_id+'_scale" type="hidden" value="'+elements[element_id]['scale']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_rotate" name="save_element_'+element_id+'_rotate" type="hidden" value="'+elements[element_id]['rotate']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_fill" name="save_element_'+element_id+'_fill" type="hidden" value="'+elements[element_id]['fill']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_strokewidth" name="save_element_'+element_id+'_strokewidth" type="hidden" value="'+elements[element_id]['strokewidth']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_text" name="save_element_'+element_id+'_text" type="hidden" value="'+elements[element_id]['text']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_fontfamily" name="save_element_'+element_id+'_fontfamily" type="hidden" value="'+elements[element_id]['fontfamily']+'" />');
			form.append('<input id="save_element_d_'+element_id+'_fontsize" name="save_element_'+element_id+'_fontsize" type="hidden" value="'+elements[element_id]['fontsize']+'" />');
			form.append('</fieldset>');
			var form = $("#save_form");
			form.append('<fieldset id="save_element_group_s_'+element_id+'">');
			form.append('<input id="save_element_s_id_'+element_id+'" name="save_element_ids[]" type="hidden" value="'+element_id+'" />');
			form.append('<input id="save_element_s_'+element_id+'_type" name="save_element_'+element_id+'_type" type="hidden" value="'+elements[element_id]['type']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_width" name="save_element_'+element_id+'_width" type="hidden" value="'+elements[element_id]['width']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_height" name="save_element_'+element_id+'_height" type="hidden" value="'+elements[element_id]['height']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_x" name="save_element_'+element_id+'_x" type="hidden" value="'+elements[element_id]['x']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_y" name="save_element_'+element_id+'_y" type="hidden" value="'+elements[element_id]['y']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_startx" name="save_element_'+element_id+'_startx" type="hidden" value="'+elements[element_id]['startx']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_starty" name="save_element_'+element_id+'_starty" type="hidden" value="'+elements[element_id]['starty']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_endx" name="save_element_'+element_id+'_endx" type="hidden" value="'+elements[element_id]['endx']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_endy" name="save_element_'+element_id+'_endy" type="hidden" value="'+elements[element_id]['endy']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_scale" name="save_element_'+element_id+'_scale" type="hidden" value="'+elements[element_id]['scale']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_rotate" name="save_element_'+element_id+'_rotate" type="hidden" value="'+elements[element_id]['rotate']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_fill" name="save_element_'+element_id+'_fill" type="hidden" value="'+elements[element_id]['fill']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_strokewidth" name="save_element_'+element_id+'_strokewidth" type="hidden" value="'+elements[element_id]['strokewidth']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_text" name="save_element_'+element_id+'_text" type="hidden" value="'+elements[element_id]['text']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_fontfamily" name="save_element_'+element_id+'_fontfamily" type="hidden" value="'+elements[element_id]['fontfamily']+'" />');
			form.append('<input id="save_element_s_'+element_id+'_fontsize" name="save_element_'+element_id+'_fontsize" type="hidden" value="'+elements[element_id]['fontsize']+'" />');
			form.append('</fieldset>')
		}
		
		// Add an image
		function addImage(image_array, image_id, image_canvas, image_src, image_width, image_height)
		{
			// Initialise elements
			image_array[image_id] = new Array();
			image_array[image_id]['type'] = "image";
			image_array[image_id]['width'] = image_width;
			image_array[image_id]['height'] = image_height;
			image_array[image_id]['x'] = 10;
			image_array[image_id]['y'] = 10;
			image_array[image_id]['startx'] = 10;
			image_array[image_id]['starty'] = 10;
			image_array[image_id]['endx'] = 10;
			image_array[image_id]['endy'] = 10;
			image_array[image_id]['scale'] = 1;
			image_array[image_id]['rotate'] = 0;
			image_array[image_id]['fill'] = false;
			image_array[image_id]['strokewidth'] = false;
			image_array[image_id]['text'] = '';
			image_array[image_id]['fontfamily'] = false;
			image_array[image_id]['fontsize'] = false;
			image_array[image_id]['selected'] = false;
			image_array[image_id]['movable'] = false;
			
			// Move
			image_array[image_id]['move'] = function (e)
			{
				if ($.browser.mozilla) { e.preventDefault(); }
				image_array[image_id]['movable'] = this;
				this.pos_x = e.clientX;
				this.pos_y = e.clientY;
				this.animate({"fill-opacity": .2}, 500);
			}
			
			// Create element
			image_array[image_id]['element'] = image_canvas.image(image_src, 10, 10, image_width, image_height);
			image_array[image_id]['element'].node.id = "design_image";
			image_array[image_id]['overlay'] = image_canvas.rect(10, 10, image_width, image_height);
			image_array[image_id]['overlay'].attr({"fill": "#FFFFFF", "fill-opacity": 0, "stroke": "#39F", "stroke-width": 1, "stroke-opacity": 0, "opacity": 0});
			image_array[image_id]['overlay'].node.style.cursor = "move";
			image_array[image_id]['overlay'].mousedown(image_array[image_id]['move']);
			
			// Select element
			image_array[image_id]['overlay'].node.onclick = function ()
			{
				deselectElements();
				image_array[image_id]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
				image_array[image_id]['selected'] = true;
				selected_element = image_id;
			}
			
			// Create group
			image_array[image_id]['group'] = image_canvas.set();
			image_array[image_id]['group'].push(image_array[image_id]['element']);
			image_array[image_id]['group'].push(image_array[image_id]['overlay']);
			
			// Initialise element on canvas
			deselectElements();
			image_array[image_id]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
			image_array[image_id]['selected'] = true;
			selected_element = image_id;
		}
		
		// Add text
		function addText(text_array, text_id, text_canvas, x, y, fill, text, fontfamily, fontsize)
		{
			// Initialise elements
			text_array[text_id] = new Array();
			text_array[text_id] = new Array();
			text_array[text_id]['type'] = "text";
			text_array[text_id]['width'] = false;
			text_array[text_id]['height'] = false;
			text_array[text_id]['x'] = x;
			text_array[text_id]['y'] = y;
			text_array[text_id]['startx'] = 10;
			text_array[text_id]['starty'] = 10;
			text_array[text_id]['endx'] = 10;
			text_array[text_id]['endy'] = 10;
			text_array[text_id]['scale'] = 1;
			text_array[text_id]['rotate'] = 0;
			text_array[text_id]['fill'] = fill;
			text_array[text_id]['strokewidth'] = false;
			text_array[text_id]['text'] = text;
			text_array[text_id]['fontfamily'] = fontfamily;
			text_array[text_id]['fontsize'] = fontsize;
			text_array[text_id]['selected'] = false;
			text_array[text_id]['movable'] = false;
							
			// Move
			text_array[text_id]['move'] = function (e)
			{
				if ($.browser.mozilla) { e.preventDefault(); }
				text_array[text_id]['movable'] = this;
				this.pos_x = e.clientX;
				this.pos_y = e.clientY;
				this.animate({"fill-opacity": .2}, 500);
			}
			
			// Create element
			text_array[text_id]['element'] =  text_canvas.print(text_array[text_id]['x'], text_array[text_id]['y'], text_array[text_id]['text'], canvas.getFont(text_array[text_id]['fontfamily']), parseInt(text_array[text_id]['fontsize'])).attr("fill", text_array[text_id]['fill']);
			text_array[text_id]['width'] = text_array[text_id]['element'].getBBox().width;
			text_array[text_id]['height'] = text_array[text_id]['element'].getBBox().height;
			text_array[text_id]['overlay'] = text_canvas.rect(text_array[text_id]['element'].getBBox().x, text_array[text_id]['element'].getBBox().y, text_array[text_id]['width'], text_array[text_id]['height']);
			text_array[text_id]['overlay'].attr({"fill": "#FFFFFF", "fill-opacity": 0, "stroke": "#39F", "stroke-width": 1, "stroke-opacity": 0, "opacity": 0});
			text_array[text_id]['overlay'].node.style.cursor = "move";
			text_array[text_id]['overlay'].mousedown(text_array[text_id]['move']);
			
			// Select element
			text_array[text_id]['overlay'].node.onclick = function ()
			{
				deselectElements();
				$("#text").val(text_array[text_id]['text']);
				$('#text_colour').css('background-color', text_array[text_id]['fill']);
				var selected_size = $("#text_size").val();
				if (text_array[text_id]['fill'] == "#000000")
				{
					$("#text_size option").remove();
					$("#text_size").append('<option value="8">6</option>');
					$("#text_size").append('<option value="9">7</option>');
					$("#text_size").append('<option value="11">8</option>');
					$("#text_size").append('<option value="12">9</option>');
					$("#text_size").append('<option value="13">10</option>');
					$("#text_size").append('<option value="15">11</option>');
					$("#text_size").append('<option value="16">12</option>');
					$("#text_size").append('<option value="19">14</option>');
					$("#text_size").append('<option value="22">16</option>');
					$("#text_size").append('<option value="24">18</option>');
					$("#text_size").append('<option value="32">24</option>');
					$("#text_size").append('<option value="48">36</option>');
					$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
				} else {
					$("#text_size option").remove();
					$("#text_size").append('<option value="13">10</option>');
					$("#text_size").append('<option value="15">11</option>');
					$("#text_size").append('<option value="16">12</option>');
					$("#text_size").append('<option value="19">14</option>');
					$("#text_size").append('<option value="22">16</option>');
					$("#text_size").append('<option value="24">18</option>');
					$("#text_size").append('<option value="32">24</option>');
					$("#text_size").append('<option value="48">36</option>');
					if (parseInt(selected_size) < 13)
					{
						$("#text_size option[value='13']").attr("selected", "selected");
					} else {
						$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
					}
				}
				$("#text_font option[value='"+text_array[text_id]['fontfamily']+"']").attr('selected', 'selected');
				$("#text_size option[value='"+text_array[text_id]['fontsize']+"']").attr('selected', 'selected');
				text_array[text_id]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
				text_array[text_id]['selected'] = true;
				selected_element = text_id;
			}
			
			// Create group
			text_array[text_id]['group'] = text_canvas.set();
			text_array[text_id]['group'].push(text_array[text_id]['element']);
			text_array[text_id]['group'].push(text_array[text_id]['overlay']);
			
			// Initialise element on canvas
			deselectElements();
			$("#text").val(text_array[text_id]['text']);
			$('#text_colour').css('background-color', text_array[text_id]['fill']);
			var selected_size = $("#text_size").val();
			if (text_array[text_id]['fill'] == "#000000")
			{
				$("#text_size option").remove();
				$("#text_size").append('<option value="8">6</option>');
				$("#text_size").append('<option value="9">7</option>');
				$("#text_size").append('<option value="11">8</option>');
				$("#text_size").append('<option value="12">9</option>');
				$("#text_size").append('<option value="13">10</option>');
				$("#text_size").append('<option value="15">11</option>');
				$("#text_size").append('<option value="16">12</option>');
				$("#text_size").append('<option value="19">14</option>');
				$("#text_size").append('<option value="22">16</option>');
				$("#text_size").append('<option value="24">18</option>');
				$("#text_size").append('<option value="32">24</option>');
				$("#text_size").append('<option value="48">36</option>');
				$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
			} else {
				$("#text_size option").remove();
				$("#text_size").append('<option value="13">10</option>');
				$("#text_size").append('<option value="15">11</option>');
				$("#text_size").append('<option value="16">12</option>');
				$("#text_size").append('<option value="19">14</option>');
				$("#text_size").append('<option value="22">16</option>');
				$("#text_size").append('<option value="24">18</option>');
				$("#text_size").append('<option value="32">24</option>');
				$("#text_size").append('<option value="48">36</option>');
				if (parseInt(selected_size) < 13)
				{
					$("#text_size option[value='13']").attr("selected", "selected");
				} else {
					$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
				}
			}
			$("#text_font option[value='"+text_array[text_id]['fontfamily']+"']").attr('selected', 'selected');
			$("#text_size option[value='"+text_array[text_id]['fontsize']+"']").attr('selected', 'selected');
			text_array[text_id]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
			text_array[text_id]['selected'] = true;
			selected_element = text_id;
		}
		
		// Add a line
		function addLine(line_array, line_id, line_canvas, strokewidth, fill)
		{
			line_array[line_id] = new Array();
			line_array[line_id]['selected'] = false;
			line_array[line_id]['type'] = "line";
			line_array[line_id]['rotate'] = 0;
			line_array[line_id]['width'] = 0;
			line_array[line_id]['height'] = 0;
			line_array[line_id]['x'] = 0;
			line_array[line_id]['y'] = 0;
			line_array[line_id]['startx'] = 10;
			line_array[line_id]['starty'] = 10;
			line_array[line_id]['endx'] = 10;
			line_array[line_id]['endy'] = 10;
			line_array[line_id]['fill'] = fill;
			line_array[line_id]['strokewidth'] = strokewidth;
			line_array[line_id]['scale'] = 1;
			line_array[line_id]['movable'] = false;
			line_array[line_id]['move'] = function (e)
			{
				if ($.browser['mozilla']) { e.preventDefault(); }
				line_array[line_id]['movable'] = this;
				this.pos_x = e.clientX;
				this.pos_y = e.clientY;
				this.animate({"fill-opacity": .2}, 500);
			}
			line_array[line_id]['element'] = line_canvas.path({"stroke": line_array[line_id]['fill'], "stroke-width": line_array[line_id]['strokewidth']});
			line_array[line_id]['overlay'] = line_canvas.rect(0, 0, 0, 0);
			line_array[line_id]['overlay'].attr({"fill": "#FFFFFF", "fill-opacity": 0, "stroke": "#39F", "stroke-width": 1, "stroke-opacity": 0, "opacity": 0});
			line_array[line_id]['overlay'].node.style.cursor = "move";
			line_array[line_id]['overlay'].mousedown(line_array[line_id]['move']);
			line_array[line_id]['overlay'].node.onclick = function ()
			{
				deselectElements();
				line_array[line_id]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
				line_array[line_id]['selected'] = true;
				$('#line_colour').css('background-color', line_array[line_id]['fill']);
				$('#line_colour').val(line_array[line_id]['fill']);
				$("#line_size option[value='"+line_array[line_id]['strokewidth']+"']").attr('selected', 'selected');
				selected_element = line_id;
			}
			deselectElements();
			line_array[line_id]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
			line_array[line_id]['selected'] = true;
			$('#line_colour').css('background-color', line_array[line_id]['fill']);
			$('#line_colour').val(line_array[line_id]['fill']);
			$("#line_size option[value='"+line_array[line_id]['strokewidth']+"']").attr('selected', 'selected');
			selected_element = line_id;
		}
		
		// Delete a element
		function deleteElement(element_array, element_id)
		{
			if (element_id >= 0)
			{
				element_array[element_id]['element'].remove();
				element_array[element_id]['overlay'].remove();
				$("#save_element_group_d_"+element_id).remove();
				$("#save_element_d_id_"+element_id).remove();
				$("#save_element_s_id_"+element_id).remove();
				deselectElements();
			}
		}
					
		var canvas = Raphael("design", 458, 558);
		
		// Event layer
		var event_layer = canvas.rect(0, 0, 458, 558);
		event_layer.attr({"fill": "#FFFFFF", "fill-opacity": 0, "stroke": "#FFFFFF", "stroke-width": 0, "stroke-opacity": 0});
		
		var elements = new Array();
		var element_count = 0;
		var selected_element = -1;
		var action_timer = "";
		var line_drawing = false;
		var drawing_started = false;
		var selected_line_colour = "";
		var selected_line_size = "";
		var temporary_layer = "";
		
		<?php /*
		// Load any saved elements
		{/literal}
			{if $elements}
				{foreach from=$elements key=element_id item=element name=element}
				
					// Add an image
					{if $element.type == "image"}
					
						{literal}
							
							// Add the image
							addImage(elements, element_count, canvas, "{/literal}{$image}{literal}", {/literal}{$element_image_width}{literal}, {/literal}{$element_image_height}{literal});

							// Resize the image
							elements[element_count]['scale'] = {/literal}{$element.scale}{literal};
							elements[element_count]['width'] = elements[element_count]['width'] * elements[element_count]['scale'];
							elements[element_count]['height'] = elements[element_count]['height'] * elements[element_count]['scale'];
							elements[element_count]['group'].scale(elements[element_count]['scale'], elements[element_count]['scale']);
							
							if ($.browser['mozilla'])
							{
								// Rotate the image
								elements[element_count]['rotate'] = {/literal}{$element.rotate}{literal};
								var central_x = (elements[element_count]['overlay'].getBBox().width / 2) + elements[element_count]['overlay'].getBBox().x;
								var central_y = (elements[element_count]['overlay'].getBBox().height / 2) + elements[element_count]['overlay'].getBBox().y;
								elements[element_count]['group'].attr("rotation", elements[element_count]['rotate']);
								elements[element_count]['group'].rotate(elements[element_count]['rotate'], central_x, central_y);
								
								// Position image
								elements[element_count]['x'] = {/literal}{$element.x}{literal};
								elements[element_count]['y'] = {/literal}{$element.y}{literal};
								elements[element_count]['group'].translate(({/literal}{$element.x}{literal} - elements[element_count]['element'].getBBox().x), ({/literal}{$element.y}{literal} - elements[element_count]['element'].getBBox().y));
								
							} else {
																
								// Position image
								elements[element_count]['x'] = {/literal}{$element.x}{literal};
								elements[element_count]['y'] = {/literal}{$element.y}{literal};
								elements[element_count]['group'].translate(({/literal}{$element.x}{literal} - elements[element_count]['element'].getBBox().x), ({/literal}{$element.y}{literal} - elements[element_count]['element'].getBBox().y));
								
								// Rotate the image
								elements[element_count]['rotate'] = {/literal}{$element.rotate}{literal};
								var central_x = (elements[element_count]['overlay'].getBBox().width / 2) + elements[element_count]['overlay'].getBBox().x;
								var central_y = (elements[element_count]['overlay'].getBBox().height / 2) + elements[element_count]['overlay'].getBBox().y;
								elements[element_count]['group'].attr("rotation", elements[element_count]['rotate']);
								elements[element_count]['group'].rotate(elements[element_count]['rotate'], central_x, central_y);

							}
							
							// Add the hidden form elements for saving
							addHiddenFormElements(elements, element_count);
														
							// Go to the next element
							element_count++;
							
						{/literal}
						
					{/if}
					
					// Add an text
					{if $element.type == "text"}
					
						{literal}
							
							// Add text
							addText(elements, element_count, canvas, {/literal}{$element.x}{literal}, {/literal}{$element.y}{literal}, "{/literal}{$element.fill}{literal}", "{/literal}{$element.text}{literal}", "{/literal}{$element.fontfamily}{literal}", {/literal}{$element.fontsize}{literal});
							
							// Position text
							elements[element_count]['group'].translate(({/literal}{$element.x}{literal} - elements[element_count]['element'].getBBox().x), ({/literal}{$element.y}{literal} - elements[element_count]['element'].getBBox().y));
							
							// Rotate the text
							elements[element_count]['rotate'] = {/literal}{$element.rotate}{literal};
							var central_x = (elements[element_count]['overlay'].getBBox().width / 2) + elements[element_count]['overlay'].getBBox().x;
							var central_y = (elements[element_count]['overlay'].getBBox().height / 2) + elements[element_count]['overlay'].getBBox().y;
							elements[element_count]['group'].attr("rotation", elements[element_count]['rotate']);
							elements[element_count]['group'].rotate(elements[element_count]['rotate'], central_x, central_y);
							
							// Add the hidden form elements for saving
							addHiddenFormElements(elements, element_count);
																						
							// Go to the next element
							element_count++;
							
						{/literal}
						
					{/if}
					
					// Add a line
					{if $element.type == "line"}
					
						{literal}
							
							// Add line
							addLine(elements, element_count, canvas, "{/literal}{$element.strokewidth}{literal}", "{/literal}{$element.fill}{literal}");
							elements[element_count]['x'] = {/literal}{$element.x}{literal};
							elements[element_count]['y'] = {/literal}{$element.y}{literal};
							elements[element_count]['startx'] = {/literal}{$element.startx}{literal};
							elements[element_count]['starty'] = {/literal}{$element.starty}{literal};
							elements[element_count]['endx'] = {/literal}{$element.endx}{literal};
							elements[element_count]['endy'] = {/literal}{$element.endy}{literal};
							
							// Draw line
							elements[element_count]['element'].moveTo({/literal}{$element.startx}{literal}, {/literal}{$element.starty}{literal});
							elements[element_count]['element'].lineTo({/literal}{$element.endx}{literal}, {/literal}{$element.endy}{literal});

							elements[element_count]['group'] = canvas.set();
							elements[element_count]['group'].push(elements[element_count]['element']);
							elements[element_count]['group'].push(elements[element_count]['overlay']);
							elements[element_count]['fill'] = "{/literal}{$element.fill}{literal}";
							elements[element_count]['strokewidth'] = {/literal}{$element.strokewidth}{literal};
							elements[element_count]['element'].node.id = "element_"+element_count;
							elements[element_count]['element'].toFront();
							elements[element_count]['overlay'].toFront();
							elements[element_count]['overlay'].attr({"x": elements[element_count]['element'].getBBox().x - 5, "y": elements[element_count]['element'].getBBox().y - 5, "width": elements[element_count]['element'].getBBox().width + 10, "height": elements[element_count]['element'].getBBox().height + 10});
							
							if ($.browser['mozilla'])
							{
								// Rotate the line
								elements[element_count]['rotate'] = {/literal}{$element.rotate}{literal};
								var central_x = (elements[element_count]['overlay'].getBBox().width / 2) + elements[element_count]['overlay'].getBBox().x;
								var central_y = (elements[element_count]['overlay'].getBBox().height / 2) + elements[element_count]['overlay'].getBBox().y;
								elements[element_count]['group'].attr("rotation", elements[element_count]['rotate']);
								elements[element_count]['group'].rotate(elements[element_count]['rotate'], central_x, central_y);
								
								// Position the line
								elements[element_count]['group'].translate(({/literal}{$element.x}{literal} - elements[element_count]['element'].getBBox().x + 5), ({/literal}{$element.y}{literal} - elements[element_count]['element'].getBBox().y + 5));
								
							} else {
								// Position the line
								elements[element_count]['group'].translate(({/literal}{$element.x}{literal} - elements[element_count]['element'].getBBox().x + 5), ({/literal}{$element.y}{literal} - elements[element_count]['element'].getBBox().y + 5));
								
								// Rotate the line
								elements[element_count]['rotate'] = {/literal}{$element.rotate}{literal};
								var central_x = (elements[element_count]['overlay'].getBBox().width / 2) + elements[element_count]['overlay'].getBBox().x;
								var central_y = (elements[element_count]['overlay'].getBBox().height / 2) + elements[element_count]['overlay'].getBBox().y;
								elements[element_count]['group'].attr("rotation", elements[element_count]['rotate']);
								elements[element_count]['group'].rotate(elements[element_count]['rotate'], central_x, central_y);
							}
																														
							// Add the hidden form elements for saving
							addHiddenFormElements(elements, element_count);															
							
							// Go to the next element
							element_count++;
							
						{/literal}
						
					{/if}
											
				{/foreach}
				
				{literal}deselectElements();{/literal}
				
			{/if}
		{literal}
		/ ?>
				
		// Text Colour
		$("#text_colour_popup").dialog({
			autoOpen: false,
			modal: true,
			bgiframe: true,
			width: 215,
			minHeight: 0,
			resizable: false,
			buttons: {
				"Cancel": function() { 
					$(this).dialog("close"); 
				},
				"OK": function() {
					$("#text_colour").val($("#text_hex").val());
					$("#text_colour").css("background-color", $("#text_hex").val());
					$("#text_colour").css("color", $("#text_hex").css("color"));
					if (selected_element >= 0)
					{
						if (elements[selected_element]['type'] == "text")
						{
							elements[selected_element]['fill'] = $("#text_hex").val();
							$("#save_element_d_"+selected_element+"_fill").val(elements[selected_element]['fill']);
							elements[selected_element]['element'].attr("fill", $("#text_hex").val());
							var central_x = (elements[selected_element]['overlay'].getBBox().width / 2) + elements[selected_element]['overlay'].getBBox().x;
							var central_y = (elements[selected_element]['overlay'].getBBox().height / 2) + elements[selected_element]['overlay'].getBBox().y;
							elements[selected_element]['group'].attr("rotation", elements[selected_element]['rotate']);
							elements[selected_element]['group'].rotate(elements[selected_element]['rotate'], central_x, central_y);
						}
					}
					var selected_size = $("#text_size").val();
					if ($("#text_hex").val() == "#000000")
					{
						$("#text_size option").remove();
						$("#text_size").append('<option value="8">6</option>');
						$("#text_size").append('<option value="9">7</option>');
						$("#text_size").append('<option value="11">8</option>');
						$("#text_size").append('<option value="12">9</option>');
						$("#text_size").append('<option value="13">10</option>');
						$("#text_size").append('<option value="15">11</option>');
						$("#text_size").append('<option value="16">12</option>');
						$("#text_size").append('<option value="19">14</option>');
						$("#text_size").append('<option value="22">16</option>');
						$("#text_size").append('<option value="24">18</option>');
						$("#text_size").append('<option value="32">24</option>');
						$("#text_size").append('<option value="48">36</option>');
						$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
					} else {
						$("#text_size option").remove();
						$("#text_size").append('<option value="13">10</option>');
						$("#text_size").append('<option value="15">11</option>');
						$("#text_size").append('<option value="16">12</option>');
						$("#text_size").append('<option value="19">14</option>');
						$("#text_size").append('<option value="22">16</option>');
						$("#text_size").append('<option value="24">18</option>');
						$("#text_size").append('<option value="32">24</option>');
						$("#text_size").append('<option value="48">36</option>');
						if (parseInt(selected_size) < 13)
						{
							$("#text_size option[value='13']").attr("selected", "selected");
						} else {
							$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
						}
					}
					$(this).dialog("close"); 
				}
			}
		});
		
		$('#text_colour_picker').farbtastic('#text_hex');
		$("#text_colour").click(function(){
			$("#text_colour_popup").dialog('open');
		});
		
		// Line Colour
		$("#line_colour_popup").dialog({
			autoOpen: false,
			modal: true,
			bgiframe: true,
			width: 215,
			minHeight: 0,
			resizable: false,
			buttons: {
				"Cancel": function() { 
					$(this).dialog("close"); 
				},
				"OK": function() {
					$("#line_colour").val($("#line_hex").val());
					$("#line_colour").css("background-color", $("#line_hex").val());
					$("#line_colour").css("color", $("#line_hex").css("color"));
					if (selected_element >= 0)
					{
						if (elements[selected_element]['type'] == "line")
						{
							elements[selected_element]['element'].attr("stroke", $("#line_hex").val());
							elements[selected_element]['fill'] = $("#line_hex").val();
							$("#save_element_d_"+selected_element+"_fill").val(elements[selected_element]['fill']);
						}
					}
					$(this).dialog("close"); 
				}
			}
		});
		
		$('#line_colour_picker').farbtastic('#line_hex');
		$("#line_colour").click(function(){
			$("#line_colour_popup").dialog('open');
		});
		
		// Resize an object
		$(".resize-out").click(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "image")
				{
					elements[selected_element]['scale'] = elements[selected_element]['scale'] + 0.01;
					elements[selected_element]['width'] = elements[selected_element]['width'] * elements[selected_element]['scale'];
					elements[selected_element]['height'] = elements[selected_element]['height'] * elements[selected_element]['scale'];
					elements[selected_element]['group'].scale(elements[selected_element]['scale'], elements[selected_element]['scale']);
					$("#save_element_d_"+selected_element+"_scale").val(elements[selected_element]['scale']);
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
				}
			}
		});
		$(".resize-out").mousedown(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "image")
				{																	
					action_timer = setInterval(function() {
						elements[selected_element]['scale'] = elements[selected_element]['scale'] + 0.05;
						elements[selected_element]['width'] = elements[selected_element]['width'] * elements[selected_element]['scale'];
						elements[selected_element]['height'] = elements[selected_element]['height'] * elements[selected_element]['scale'];
						elements[selected_element]['group'].scale(elements[selected_element]['scale'], elements[selected_element]['scale']);
						$("#save_element_d_"+selected_element+"_scale").val(elements[selected_element]['scale']);
						$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
						$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
						elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
						elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
						$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
						$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
					}, 200);
				}
			}
		});
		$(".resize-out").mouseup(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "image")
				{	
					clearInterval(action_timer);
				}
			}
		});
		$(".resize-in").click(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "image")
				{															 
					elements[selected_element]['scale'] = elements[selected_element]['scale'] - 0.01;
					elements[selected_element]['width'] = elements[selected_element]['width'] * elements[selected_element]['scale'];
					elements[selected_element]['height'] = elements[selected_element]['height'] * elements[selected_element]['scale'];
					elements[selected_element]['group'].scale(elements[selected_element]['scale'], elements[selected_element]['scale']);
					$("#save_element_d_"+selected_element+"_scale").val(elements[selected_element]['scale']);
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
				}
			}
		});
		$(".resize-in").mousedown(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "image")
				{	
					action_timer = setInterval(function() {
						elements[selected_element]['scale'] = elements[selected_element]['scale'] - 0.05;
						elements[selected_element]['width'] = elements[selected_element]['width'] * elements[selected_element]['scale'];
						elements[selected_element]['height'] = elements[selected_element]['height'] * elements[selected_element]['scale'];
						elements[selected_element]['group'].scale(elements[selected_element]['scale'], elements[selected_element]['scale']);
						$("#save_element_d_"+selected_element+"_scale").val(elements[selected_element]['scale']);
						$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
						$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
						elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
						elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
						$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
						$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
						
					}, 200); 																	
				}
			}
		});
		$(".resize-in").mouseup(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "image")
				{	
					clearInterval(action_timer);
				}
			}
		});
		
		// Rotate an object
		$(".rotate-clockwise").click(function() {
			if (selected_element >= 0)
			{
				var central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
				var central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
				elements[selected_element]['group'].attr("rotation", elements[selected_element]['rotate'] + 1);
				elements[selected_element]['group'].rotate(elements[selected_element]['rotate'] + 1, central_x, central_y);
				elements[selected_element]['rotate'] = elements[selected_element]['rotate'] + 1;
				$("#save_element_d_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
				elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
				elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
				elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
				elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
				$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
				$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
				$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
				$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
			}
		});
		$(".rotate-clockwise").mousedown(function() {
			if (selected_element >= 0)
			{
				var central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
				var central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
				action_timer = setInterval(function() {
					var central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
					var central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
					elements[selected_element]['group'].attr("rotation", elements[selected_element]['rotate'] + 5);
					elements[selected_element]['group'].rotate(elements[selected_element]['rotate'] + 5, central_x, central_y);
					elements[selected_element]['rotate'] = elements[selected_element]['rotate'] + 5;
					$("#save_element_d_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
					elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
					elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
				}, 200); 		
			}
		});
		$(".rotate-clockwise").mouseup(function() {
			if (selected_element >= 0)
			{
				clearInterval(action_timer);
			}
		});
		$(".rotate-anticlockwise").click(function() {
			if (selected_element >= 0)
			{
				var central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
				var central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
				elements[selected_element]['group'].attr("rotation", elements[selected_element]['rotate'] - 1);
				elements[selected_element]['group'].rotate(elements[selected_element]['rotate'] - 1, central_x, central_y);
				elements[selected_element]['rotate'] = elements[selected_element]['rotate'] - 1;
				$("#save_element_d_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
				elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
				elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
				elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
				elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
				$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
				$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
				$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
				$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
			}
		});
		$(".rotate-anticlockwise").mousedown(function() {
			if (selected_element >= 0)
			{
				action_timer = setInterval(function() {
					var central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
					var central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
					elements[selected_element]['group'].attr("rotation", elements[selected_element]['rotate'] - 5);
					elements[selected_element]['group'].rotate(elements[selected_element]['rotate'] - 5, central_x, central_y);
					elements[selected_element]['rotate'] = elements[selected_element]['rotate'] - 5;
					$("#save_element_d_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
					elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
					elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					$("#save_element_d_"+selected_element+"_height").val(elements[selected_element]['height']);
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
					$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
					
				}, 200);
			}
		});
		$(".rotate-anticlockwise").mouseup(function() {
			if (selected_element >= 0)
			{
				clearInterval(action_timer);
			}
		});
		
		// Move an object back or forward
		$(".move-forward").click(function() {
			if (selected_element >= 0)
			{
				elements[selected_element]['group'].toFront();
			}
		});
		$(".move-backward").click(function() {
			if (selected_element >= 0)
			{
				for (array_count = 0; array_count < element_count; array_count++)
				{
					if (array_count != selected_element)
					{
						elements[array_count]['group'].toFront();
					}
				}																 
			}
		});
		
		// Delete an element
		$(".delete-object").click(function() {
			if (selected_element >= 0)
			{																 
				deleteElement(elements, selected_element);
				$("#save_element_group_d_"+selected_element).remove();
			}
		});
		$(".delete-image").click(function() {
			if (selected_element >= 0)
			{																 
				deleteElement(elements, selected_element);
				$("#save_element_group_d_"+selected_element).remove();
				$("#image_deleted").val('true');
			}
		});
		
		// Save and order
		$("#save_and_order").click(function() {
			alert($("#holder").html());
			$("#design_code").val($("#holder").html());
			$("#design_form").submit();
		});
		
		// Add an image
		$(".image-add").click(function(){
			$("#image_browser").dialog('open');
		});
		
		// Add text
		$(".text-add").click(function() {
			
			// Add text
			addText(elements, element_count, canvas, 10, 10, $('#text_colour').val(), $("#text").val(), $('#text_font option:selected').val(), $('#text_size option:selected').val());
			
			// Add the hidden form elements for saving
			addHiddenFormElements(elements, element_count);
			element_count++;
		});
		
		// Update text
		$(".text-update").click(function() {
			if (selected_element >= 0)
			{
				if (elements[selected_element]['type'] == "text")
				{
					text_to_delete = selected_element;
					
					// Add text
					addText(elements, element_count, canvas, elements[text_to_delete]['x'], elements[text_to_delete]['y'], $("#text_colour").val(), $("#text").val(), $("#text_font").val(), $("#text_size").val());
					
					elements[element_count]['group'].translate((elements[text_to_delete]['x'] - elements[element_count]['element'].getBBox().x), (elements[text_to_delete]['y'] - elements[element_count]['element'].getBBox().y));
					
					// Add the hidden form elements for saving
					addHiddenFormElements(elements, element_count);
													
					// Rotate the text
					elements[element_count]['rotate'] = elements[text_to_delete]['rotate'];
					var central_x = (elements[element_count]['overlay'].getBBox().width / 2) + elements[element_count]['overlay'].getBBox().x;
					var central_y = (elements[element_count]['overlay'].getBBox().height / 2) + elements[element_count]['overlay'].getBBox().y;
					elements[element_count]['group'].attr("rotation", elements[element_count]['rotate']);
					elements[element_count]['group'].rotate(elements[element_count]['rotate'], central_x, central_y);
					$("#save_element_d_"+element_count+"_rotate").val(elements[element_count]['rotate']);
					
					// Delete the old text
					deleteElement(elements, text_to_delete);
					
					// Select the element
					deselectElements();
					$("#text").val(elements[element_count]['text']);
					$('#text_colour').css('background-color', elements[element_count]['fill']);
					var selected_size = $("#text_size").val();
					if (elements[element_count]['fill'] == "#000000")
					{
						$("#text_size option").remove();
						$("#text_size").append('<option value="8">6</option>');
						$("#text_size").append('<option value="9">7</option>');
						$("#text_size").append('<option value="11">8</option>');
						$("#text_size").append('<option value="12">9</option>');
						$("#text_size").append('<option value="13">10</option>');
						$("#text_size").append('<option value="15">11</option>');
						$("#text_size").append('<option value="16">12</option>');
						$("#text_size").append('<option value="19">14</option>');
						$("#text_size").append('<option value="22">16</option>');
						$("#text_size").append('<option value="24">18</option>');
						$("#text_size").append('<option value="32">24</option>');
						$("#text_size").append('<option value="48">36</option>');
						$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
					} else {
						$("#text_size option").remove();
						$("#text_size").append('<option value="13">10</option>');
						$("#text_size").append('<option value="15">11</option>');
						$("#text_size").append('<option value="16">12</option>');
						$("#text_size").append('<option value="19">14</option>');
						$("#text_size").append('<option value="22">16</option>');
						$("#text_size").append('<option value="24">18</option>');
						$("#text_size").append('<option value="32">24</option>');
						$("#text_size").append('<option value="48">36</option>');
						if (parseInt(selected_size) < 13)
						{
							$("#text_size option[value='13']").attr("selected", "selected");
						} else {
							$("#text_size option[value='"+selected_size+"']").attr("selected", "selected");
						}
					}
					$("#text_font option[value='"+elements[element_count]['fontfamily']+"']").attr('selected', 'selected');
					$("#text_size option[value='"+elements[element_count]['fontsize']+"']").attr('selected', 'selected');
					elements[element_count]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
					elements[element_count]['selected'] = true;
					selected_element = element_count;
					
					// Go to the next element
					element_count++;
					
				}
			}
		});
		
		// Add line
		$(".line-add").click(function() {
			line_drawing = true;
			selected_line_colour = $('#line_colour').val();
			selected_line_size = $('#line_size').val();
			deselectElements();
			temporary_layer = canvas.rect(0, 0, 458, 558);
			temporary_layer.attr({"fill": "#FFFFFF", "opacity": 0});
			$('#line_colour').css('background-color', selected_line_colour);
			$('#line_colour').val(selected_line_colour);
			$("#line_size option[value='"+selected_line_size+"']").attr('selected', 'selected');
		});
		
		// Update line
		$("#line_size").change(function() {
			if (elements[selected_element])
			{
				if (elements[selected_element]['type'] == "line")
				{
					elements[selected_element]['element'].attr("stroke-width", $('#line_size').val());
					elements[selected_element]['strokewidth'] = $('#line_size').val();
					$("#save_element_d_"+selected_element+"_strokewidth").val(elements[selected_element]['strokewidth']);
				}
			}
		});
					
		// Deselect elements
		function deselectElements()
		{
			selected_element = -1;
			$("#text_bold").removeClass("selected");
			$("#text_italic").removeClass("selected");
			$("#text").val("");
			$('#text_colour').css('background-color', '#FF0000');
			$('#text_colour').css('color', '#FFFFFF');
			$('#text_colour').val('#ff0000');
			$("#text_font").selectOptions($("#text_font").val(), true);
			$("#text_size").selectOptions($("#text_size").val(), true);
			$("#text_size option[value='6']").hide();
			$("#text_size option[value='7']").hide();
			$("#text_size option[value='8']").hide();
			$("#text_size option[value='9']").hide();
			$("#text_size option[value='10']").attr('selected', 'selected');
			$('#line_colour').css('background-color', '#FF0000');
			$('#line_colour').css('color', '#FFFFFF');
			$('#line_colour').val('#ff0000');
			$("#line_size").selectOptions($("#line_size").val(), true);
			$("#line_size option[value='1']").attr('selected', 'selected');
			for (array_count = 0; array_count < element_count; array_count++)
			{
				elements[array_count]['overlay'].animate({"stroke-opacity": 0, "fill-opacity": 0, "opacity": 0});
				elements[array_count]['selected'] = false;
			}
			$("#text").focus();
		}
		event_layer.node.onclick = function ()
		{
			deselectElements();
		}
		
		document.onmousedown = function (e)
		{
			e = e || window.event;
			if ($.browser.mozilla) { e.preventDefault(); }
			if (line_drawing)
			{
				
				addLine(elements, element_count, canvas, $('#line_size').val(), $('#line_colour').val());
				
				if ($.browser.mozilla)
				{
					elements[element_count]['element'].moveTo(e.layerX, e.layerY);
					elements[element_count]['startx'] = e.layerX;
					elements[element_count]['starty'] = e.layerY;
				} else {
					elements[element_count]['element'].moveTo(e.offsetX, e.offsetY);
					elements[element_count]['startx'] = e.offsetX;
					elements[element_count]['starty'] = e.offsetY;
				}
				drawing_started = true;
				
				// Add the hidden form elements for saving
				 addHiddenFormElements(elements, element_count);
								
				// Next element
				element_count++;
			}
		};
		document.onmousemove = function (e)
		{
			e = e || window.event;
			if ($.browser.mozilla) { e.preventDefault(); }
			if (line_drawing)
			{
				if (drawing_started)
				{
					elements[selected_element]['element'].remove();
					elements[selected_element]['element'] = canvas.path({"stroke": elements[selected_element]['fill'], "stroke-width": elements[selected_element]['strokewidth']});
					elements[selected_element]['element'].moveTo(elements[selected_element]['startx'], elements[selected_element]['starty']);
		      
					var absolute_top = $("#designer-canvas").position().top + 20 - $(window).scrollTop() + $("#designer").position().top + $("div.central-column").position().top;
					var absolute_left = $("#designer-canvas").position().left + 211 - $(window).scrollLeft() + $("#designer").position().left + $("div.central-column").position().left;
					var move_x = e.clientX - absolute_left;
					var move_y = e.clientY - absolute_top;
					
					elements[selected_element]['element'].lineTo(move_x, move_y);
					elements[selected_element]['endx'] = move_x;
					elements[selected_element]['endy'] = move_y;
						
					$("#save_element_d_"+selected_element+"_endx").val(elements[selected_element]['endx']);
					$("#save_element_d_"+selected_element+"_endy").val(elements[selected_element]['endy']);
				}
			} else {
				for (array_count = 0; array_count < element_count; array_count++)
				{
					if (elements[array_count]['movable'])
					{
						elements[array_count]['group'].translate(Math.round(e.clientX - elements[array_count]['movable'].pos_x), Math.round(e.clientY - elements[array_count]['movable'].pos_y));
						elements[array_count]['x'] = Math.round(elements[array_count]['element'].getBBox().x);
						elements[array_count]['y'] = Math.round(elements[array_count]['element'].getBBox().y);
						elements[array_count]['group'].attr("x", elements[array_count]['x']);
						elements[array_count]['group'].attr("y", elements[array_count]['y']);
						$("#save_element_d_"+array_count+"_x").val(elements[array_count]['x']);
						$("#save_element_d_"+array_count+"_y").val(elements[array_count]['y']);
						elements[array_count]['movable'].pos_x = Math.round(e.clientX);
						elements[array_count]['movable'].pos_y = Math.round(e.clientY);
						var central_x = (elements[array_count]['element'].getBBox().width / 2) + elements[array_count]['element'].getBBox().x;
						var central_y = (elements[array_count]['element'].getBBox().height / 2) + elements[array_count]['element'].getBBox().y;
						elements[array_count]['group'].attr("rotation", elements[array_count]['rotate']);
						elements[array_count]['group'].rotate(elements[array_count]['rotate'], central_x, central_y);
						$("#save_element_d_"+array_count+"_rotate").val(elements[array_count]['rotate']);
					}
				}
			}
		};
		document.onmouseup = function ()
		{
			if (line_drawing)
			{
				elements[selected_element]['group'] = canvas.set();
				elements[selected_element]['group'].push(elements[selected_element]['element']);
				elements[selected_element]['group'].push(elements[selected_element]['overlay']);
				elements[selected_element]['fill'] = selected_line_colour;
				elements[selected_element]['strokewidth'] = selected_line_size;
				elements[selected_element]['element'].node.id = "element_"+selected_element;
				elements[selected_element]['element'].toFront();
				elements[selected_element]['overlay'].toFront();
				elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
				elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
				$("#save_element_d_"+selected_element+"_x").val(elements[selected_element]['x']);
				$("#save_element_d_"+selected_element+"_y").val(elements[selected_element]['y']);
				elements[selected_element]['overlay'].attr({"x": elements[selected_element]['element'].getBBox().x - 5, "y": elements[selected_element]['element'].getBBox().y - 5, "width": elements[selected_element]['element'].getBBox().width + 10, "height": elements[selected_element]['element'].getBBox().height + 10});
				elements[array_count]['group'].translate(1, 1);
				elements[array_count]['group'].translate(-1, -1);
				elements[array_count]['x'] = Math.round(elements[array_count]['overlay'].attr("x"));
				elements[array_count]['y'] = Math.round(elements[array_count]['overlay'].attr("y"));
				elements[array_count]['group'].attr("x", elements[array_count]['x']);
				elements[array_count]['group'].attr("y", elements[array_count]['y']);
				$("#save_element_d_"+array_count+"_x").val(elements[array_count]['x']);
				$("#save_element_d_"+array_count+"_y").val(elements[array_count]['y']);
				elements[selected_element]['overlay'].animate({"stroke-opacity": 1, "fill-opacity": 0, "opacity": 1});
				elements[selected_element]['selected'] = true;
				line_drawing = false;
				drawing_started = false;
				temporary_layer.remove();
			} else {
				for (array_count = 0; array_count < element_count; array_count++)
				{
					elements[array_count]['movable'] && elements[array_count]['movable'].animate({"fill-opacity": 0}, 500);
					elements[array_count]['movable'] = false;
				}
			}
		};
		$("#text").focus();
	};
	*/ ?>
</script>