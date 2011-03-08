<script type="text/javascript">
	
	window.onload = function () {
	
		// Setup canvas
		var canvas = Raphael("design", 458, 558);	
								
		// Event layer
		var event_layer = canvas.rect(0, 0, 458, 558);
		event_layer.attr({"fill": "#FFFFFF", "fill-opacity": 0, "stroke": "#FFFFFF", "stroke-width": 0, "stroke-opacity": 0});
		event_layer.node.onclick = function () {
			deselectElements();
		}
		
		// Designer elements
		var elements = new Array();
		var element_count = 0;
		var selected_element = -1;
		var action_timer = "";
		var line_drawing = false;
		var drawing_started = false;
		var selected_line_colour = "";
		var selected_line_size = "";
		var temporary_layer = "";
		
		// Picture upload
		$('#upload_picture').uploadify({
	    	'uploader': '/js/uploadify/uploadify.swf',
		    'script': '/upload.php',
		    'cancelImg': '/images/buttons/cancel.png',
		    'buttonImg': '/images/buttons/browse-button.png',
		    'folder': '/uploads',
		    'auto': true,
		    'queueID': 'upload_picture_queue',
		    'wmode': 'transparent',
			'onSWFReady': function() {
				$("#loading_uploadify").hide();
			},
			'onComplete': function(event, ID, fileObj, response, data) {
				addImage(elements, element_count, canvas, fileObj.filePath, 100, 100);
				element_count++;
			}
		});
			
		// Load toolbars
		$(".main-toolbar-icon, .main-toolbar-icon-selected").click(function() {
			$(".main-toolbar-icon-selected").removeClass("main-toolbar-icon-selected").addClass("main-toolbar-icon");
			$(this).removeClass("main-toolbar-icon").addClass("main-toolbar-icon-selected");
			$(".toolbar").hide();
			$("#toolbar_standard").show();
			$("#"+$(this).attr("rel")).show();
		});
		
		// Deselect all elements
		function deselectElements()
		{
			selected_element = -1;
			for (array_count = 0; array_count < element_count; array_count++)
			{
				elements[array_count]['overlay'].animate({"stroke-opacity": 0, "fill-opacity": 0, "opacity": 0});
				elements[array_count]['selected'] = false;
			}
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
		
		// Mouse down
		document.onmousedown = function (e)
		{
			e = e || window.event;
			if ($.browser.mozilla) { e.preventDefault(); }
		};
		
		// Mouse move
		document.onmousemove = function (e)
		{
			e = e || window.event;
			if ($.browser.mozilla) { e.preventDefault(); }
			for (array_count = 0; array_count < element_count; array_count++)
			{
				if (elements[array_count]['movable'])
				{
					elements[array_count]['group'].translate(Math.round(e.clientX - elements[array_count]['movable'].pos_x), Math.round(e.clientY - elements[array_count]['movable'].pos_y));
					elements[array_count]['x'] = Math.round(elements[array_count]['element'].getBBox().x);
					elements[array_count]['y'] = Math.round(elements[array_count]['element'].getBBox().y);
					elements[array_count]['group'].attr("x", elements[array_count]['x']);
					elements[array_count]['group'].attr("y", elements[array_count]['y']);
					//$("#save_element_d_"+array_count+"_x").val(elements[array_count]['x']);
					//$("#save_element_d_"+array_count+"_y").val(elements[array_count]['y']);
					elements[array_count]['movable'].pos_x = Math.round(e.clientX);
					elements[array_count]['movable'].pos_y = Math.round(e.clientY);
					var central_x = (elements[array_count]['element'].getBBox().width / 2) + elements[array_count]['element'].getBBox().x;
					var central_y = (elements[array_count]['element'].getBBox().height / 2) + elements[array_count]['element'].getBBox().y;
					elements[array_count]['group'].attr("rotation", elements[array_count]['rotate']);
					elements[array_count]['group'].rotate(elements[array_count]['rotate'], central_x, central_y);
					//$("#save_element_d_"+array_count+"_rotate").val(elements[array_count]['rotate']);
				}
			}
		};
		
		// Mouse up
		document.onmouseup = function ()
		{
			for (array_count = 0; array_count < element_count; array_count++)
			{
				elements[array_count]['movable'] && elements[array_count]['movable'].animate({"fill-opacity": 0}, 500);
				elements[array_count]['movable'] = false;
			}
		};
		
		// Load page
		$("#loading").hide();
		$("#page").fadeIn();
	
	};
	
	$(document).ready(function() {
		
		
		
		<?php /*
		
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
					$("#save_element_"+selected_element+"_scale").val(elements[selected_element]['scale']);
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
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
						$("#save_element_"+selected_element+"_scale").val(elements[selected_element]['scale']);
						$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
						$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
						elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
						elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
						$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
						$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
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
					$("#save_element_"+selected_element+"_scale").val(elements[selected_element]['scale']);
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
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
						$("#save_element_"+selected_element+"_scale").val(elements[selected_element]['scale']);
						$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
						$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
						elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
						elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
						$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
						$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
						
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
				$("#save_element_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
				elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
				elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
				elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
				elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
				$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
				$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
				$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
				$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
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
					$("#save_element_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
					elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
					elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
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
				$("#save_element_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
				elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
				elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
				elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
				elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
				$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
				$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
				$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
				$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
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
					$("#save_element_"+selected_element+"_rotate").val(elements[selected_element]['rotate']);
					elements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
					elements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
					elements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
					elements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					$("#save_element_"+selected_element+"_width").val(elements[selected_element]['width']);
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
					$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
					
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
				$("#save_element_group_"+selected_element).remove();
			}
		});
		$(".delete-image").click(function() {
			if (selected_element >= 0)
			{																 
				deleteElement(elements, selected_element);
				$("#save_element_group_"+selected_element).remove();
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
					$("#save_element_"+element_count+"_rotate").val(elements[element_count]['rotate']);
					
					// Delete the old text
					deleteElement(elements, text_to_delete);
					
					// Select the element
					deselectElements();
					$("#text").val(elements[element_count]['text']);
					$('#text_colour').css('background-color', elements[element_count]['fill']);
					$("#text_size option[value='"+$("#text_size").val()+"']").attr("selected", "selected");
					//$("#text_font option[value='"+elements[element_count]['fontfamily']+"']").attr('selected', 'selected');
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
					$("#save_element_"+selected_element+"_strokewidth").val(elements[selected_element]['strokewidth']);
				}
			}
		});
					
		
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
						
					$("#save_element_"+selected_element+"_endx").val(elements[selected_element]['endx']);
					$("#save_element_"+selected_element+"_endy").val(elements[selected_element]['endy']);
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
						$("#save_element_"+array_count+"_x").val(elements[array_count]['x']);
						$("#save_element_"+array_count+"_y").val(elements[array_count]['y']);
						elements[array_count]['movable'].pos_x = Math.round(e.clientX);
						elements[array_count]['movable'].pos_y = Math.round(e.clientY);
						var central_x = (elements[array_count]['element'].getBBox().width / 2) + elements[array_count]['element'].getBBox().x;
						var central_y = (elements[array_count]['element'].getBBox().height / 2) + elements[array_count]['element'].getBBox().y;
						elements[array_count]['group'].attr("rotation", elements[array_count]['rotate']);
						elements[array_count]['group'].rotate(elements[array_count]['rotate'], central_x, central_y);
						$("#save_element_"+array_count+"_rotate").val(elements[array_count]['rotate']);
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
				$("#save_element_"+selected_element+"_x").val(elements[selected_element]['x']);
				$("#save_element_"+selected_element+"_y").val(elements[selected_element]['y']);
				elements[selected_element]['overlay'].attr({"x": elements[selected_element]['element'].getBBox().x - 5, "y": elements[selected_element]['element'].getBBox().y - 5, "width": elements[selected_element]['element'].getBBox().width + 10, "height": elements[selected_element]['element'].getBBox().height + 10});
				elements[array_count]['group'].translate(1, 1);
				elements[array_count]['group'].translate(-1, -1);
				elements[array_count]['x'] = Math.round(elements[array_count]['overlay'].attr("x"));
				elements[array_count]['y'] = Math.round(elements[array_count]['overlay'].attr("y"));
				elements[array_count]['group'].attr("x", elements[array_count]['x']);
				elements[array_count]['group'].attr("y", elements[array_count]['y']);
				$("#save_element_"+array_count+"_x").val(elements[array_count]['x']);
				$("#save_element_"+array_count+"_y").val(elements[array_count]['y']);
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
		*/ ?>
		
		
	});
</script>