jQuery.cookie=function(key,value,options){if(arguments.length>1&&(value===null||typeof value!=="object")){options=jQuery.extend({},options);if(value===null){options.expires=-1;}
if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setDate(t.getDate()+days);}
return(document.cookie=[encodeURIComponent(key),'=',options.raw?String(value):encodeURIComponent(String(value)),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''));}
options=value||{};var result,decode=options.raw?function(s){return s;}:decodeURIComponent;return(result=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?decode(result[1]):null;};(function($){$.extend({tablesorter:new function(){var parsers=[],widgets=[];this.defaults={cssHeader:"header",cssAsc:"headerSortUp",cssDesc:"headerSortDown",sortInitialOrder:"asc",sortMultiSortKey:"shiftKey",sortForce:null,sortAppend:null,textExtraction:"simple",parsers:{},widgets:[],widgetZebra:{css:["even","odd"]},headers:{},widthFixed:false,cancelSelection:true,sortList:[],headerList:[],dateFormat:"us",decimal:'.',debug:false};function benchmark(s,d){log(s+","+(new Date().getTime()-d.getTime())+"ms");}
this.benchmark=benchmark;function log(s){if(typeof console!="undefined"&&typeof console.debug!="undefined"){console.log(s);}else{alert(s);}}
function buildParserCache(table,$headers){if(table.config.debug){var parsersDebug="";}
var rows=table.tBodies[0].rows;if(table.tBodies[0].rows[0]){var list=[],cells=rows[0].cells,l=cells.length;for(var i=0;i<l;i++){var p=false;if($.metadata&&($($headers[i]).metadata()&&$($headers[i]).metadata().sorter)){p=getParserById($($headers[i]).metadata().sorter);}else if((table.config.headers[i]&&table.config.headers[i].sorter)){p=getParserById(table.config.headers[i].sorter);}
if(!p){p=detectParserForColumn(table,cells[i]);}
if(table.config.debug){parsersDebug+="column:"+i+" parser:"+p.id+"\n";}
list.push(p);}}
if(table.config.debug){log(parsersDebug);}
return list;};function detectParserForColumn(table,node){var l=parsers.length;for(var i=1;i<l;i++){if(parsers[i].is($.trim(getElementText(table.config,node)),table,node)){return parsers[i];}}
return parsers[0];}
function getParserById(name){var l=parsers.length;for(var i=0;i<l;i++){if(parsers[i].id.toLowerCase()==name.toLowerCase()){return parsers[i];}}
return false;}
function buildCache(table){if(table.config.debug){var cacheTime=new Date();}
var totalRows=(table.tBodies[0]&&table.tBodies[0].rows.length)||0,totalCells=(table.tBodies[0].rows[0]&&table.tBodies[0].rows[0].cells.length)||0,parsers=table.config.parsers,cache={row:[],normalized:[]};for(var i=0;i<totalRows;++i){var c=table.tBodies[0].rows[i],cols=[];cache.row.push($(c));for(var j=0;j<totalCells;++j){cols.push(parsers[j].format(getElementText(table.config,c.cells[j]),table,c.cells[j]));}
cols.push(i);cache.normalized.push(cols);cols=null;};if(table.config.debug){benchmark("Building cache for "+totalRows+" rows:",cacheTime);}
return cache;};function getElementText(config,node){if(!node)return"";var t="";if(config.textExtraction=="simple"){if(node.childNodes[0]&&node.childNodes[0].hasChildNodes()){t=node.childNodes[0].innerHTML;}else{t=node.innerHTML;}}else{if(typeof(config.textExtraction)=="function"){t=config.textExtraction(node);}else{t=$(node).text();}}
return t;}
function appendToTable(table,cache){if(table.config.debug){var appendTime=new Date()}
var c=cache,r=c.row,n=c.normalized,totalRows=n.length,tableBody=$(table.tBodies[0]),rows=[];if(totalRows>0){var checkCell=(n[0].length-1);for(var i=0;i<totalRows;i++){rows.push(r[n[i][checkCell]]);if(!table.config.appender){var o=r[n[i][checkCell]];var l=o.length;for(var j=0;j<l;j++){tableBody[0].appendChild(o[j]);}}}}
if(table.config.appender){table.config.appender(table,rows);}
rows=null;if(table.config.debug){benchmark("Rebuilt table:",appendTime);}
applyWidget(table);setTimeout(function(){$(table).trigger("sortEnd");},0);};function buildHeaders(table){if(table.config.debug){var time=new Date();}
var meta=($.metadata)?true:false,tableHeadersRows=[];for(var i=0;i<table.tHead.rows.length;i++){tableHeadersRows[i]=0;};$tableHeaders=$("thead th",table);$tableHeaders.each(function(index){this.count=0;this.column=index;this.order=formatSortingOrder(table.config.sortInitialOrder);if(checkHeaderMetadata(this)||checkHeaderOptions(table,index))this.sortDisabled=true;if(!this.sortDisabled){$(this).addClass(table.config.cssHeader);}
table.config.headerList[index]=this;});if(table.config.debug){benchmark("Built headers:",time);log($tableHeaders);}
return $tableHeaders;};function checkCellColSpan(table,rows,row){var arr=[],r=table.tHead.rows,c=r[row].cells;for(var i=0;i<c.length;i++){var cell=c[i];if(cell.colSpan>1){arr=arr.concat(checkCellColSpan(table,headerArr,row++));}else{if(table.tHead.length==1||(cell.rowSpan>1||!r[row+1])){arr.push(cell);}}}
return arr;};function checkHeaderMetadata(cell){if(($.metadata)&&($(cell).metadata().sorter===false)){return true;};return false;}
function checkHeaderOptions(table,i){if((table.config.headers[i])&&(table.config.headers[i].sorter===false)){return true;};return false;}
function applyWidget(table){var c=table.config.widgets;var l=c.length;for(var i=0;i<l;i++){getWidgetById(c[i]).format(table);}}
function getWidgetById(name){var l=widgets.length;for(var i=0;i<l;i++){if(widgets[i].id.toLowerCase()==name.toLowerCase()){return widgets[i];}}};function formatSortingOrder(v){if(typeof(v)!="Number"){i=(v.toLowerCase()=="desc")?1:0;}else{i=(v==(0||1))?v:0;}
return i;}
function isValueInArray(v,a){var l=a.length;for(var i=0;i<l;i++){if(a[i][0]==v){return true;}}
return false;}
function setHeadersCss(table,$headers,list,css){$headers.removeClass(css[0]).removeClass(css[1]);var h=[];$headers.each(function(offset){if(!this.sortDisabled){h[this.column]=$(this);}});var l=list.length;for(var i=0;i<l;i++){h[list[i][0]].addClass(css[list[i][1]]);}}
function fixColumnWidth(table,$headers){var c=table.config;if(c.widthFixed){var colgroup=$('<colgroup>');$("tr:first td",table.tBodies[0]).each(function(){colgroup.append($('<col>').css('width',$(this).width()));});$(table).prepend(colgroup);};}
function updateHeaderSortCount(table,sortList){var c=table.config,l=sortList.length;for(var i=0;i<l;i++){var s=sortList[i],o=c.headerList[s[0]];o.count=s[1];o.count++;}}
function multisort(table,sortList,cache){if(table.config.debug){var sortTime=new Date();}
var dynamicExp="var sortWrapper = function(a,b) {",l=sortList.length;for(var i=0;i<l;i++){var c=sortList[i][0];var order=sortList[i][1];var s=(getCachedSortType(table.config.parsers,c)=="text")?((order==0)?"sortText":"sortTextDesc"):((order==0)?"sortNumeric":"sortNumericDesc");var e="e"+i;dynamicExp+="var "+e+" = "+s+"(a["+c+"],b["+c+"]); ";dynamicExp+="if("+e+") { return "+e+"; } ";dynamicExp+="else { ";}
var orgOrderCol=cache.normalized[0].length-1;dynamicExp+="return a["+orgOrderCol+"]-b["+orgOrderCol+"];";for(var i=0;i<l;i++){dynamicExp+="}; ";}
dynamicExp+="return 0; ";dynamicExp+="}; ";eval(dynamicExp);cache.normalized.sort(sortWrapper);if(table.config.debug){benchmark("Sorting on "+sortList.toString()+" and dir "+order+" time:",sortTime);}
return cache;};function sortText(a,b){return((a<b)?-1:((a>b)?1:0));};function sortTextDesc(a,b){return((b<a)?-1:((b>a)?1:0));};function sortNumeric(a,b){return a-b;};function sortNumericDesc(a,b){return b-a;};function getCachedSortType(parsers,i){return parsers[i].type;};this.construct=function(settings){return this.each(function(){if(!this.tHead||!this.tBodies)return;var $this,$document,$headers,cache,config,shiftDown=0,sortOrder;this.config={};config=$.extend(this.config,$.tablesorter.defaults,settings);$this=$(this);$headers=buildHeaders(this);this.config.parsers=buildParserCache(this,$headers);cache=buildCache(this);this.config.cache=cache;var sortCSS=[config.cssDesc,config.cssAsc];fixColumnWidth(this);$headers.click(function(e){$this.trigger("sortStart");var totalRows=($this[0].tBodies[0]&&$this[0].tBodies[0].rows.length)||0;if(!this.sortDisabled&&totalRows>0){var $cell=$(this);var i=this.column;this.order=this.count++%2;if(!e[config.sortMultiSortKey]){config.sortList=[];if(config.sortForce!=null){var a=config.sortForce;for(var j=0;j<a.length;j++){if(a[j][0]!=i){config.sortList.push(a[j]);}}}
config.sortList.push([i,this.order]);}else{if(isValueInArray(i,config.sortList)){for(var j=0;j<config.sortList.length;j++){var s=config.sortList[j],o=config.headerList[s[0]];if(s[0]==i){o.count=s[1];o.count++;s[1]=o.count%2;}}}else{config.sortList.push([i,this.order]);}};setTimeout(function(){setHeadersCss($this[0],$headers,config.sortList,sortCSS);appendToTable($this[0],multisort($this[0],config.sortList,cache));},1);return false;}}).mousedown(function(){if(config.cancelSelection){this.onselectstart=function(){return false};return false;}});$this.bind("update",function(){this.config.parsers=buildParserCache(this,$headers);cache=buildCache(this);}).bind("sorton",function(e,list){$(this).trigger("sortStart");config.sortList=list;var sortList=config.sortList;updateHeaderSortCount(this,sortList);setHeadersCss(this,$headers,sortList,sortCSS);appendToTable(this,multisort(this,sortList,cache));}).bind("appendCache",function(){appendToTable(this,cache);}).bind("applyWidgetId",function(e,id){getWidgetById(id).format(this);}).bind("applyWidgets",function(){applyWidget(this);});if($.metadata&&($(this).metadata()&&$(this).metadata().sortlist)){config.sortList=$(this).metadata().sortlist;}
if(config.sortList.length>0){$this.trigger("sorton",[config.sortList]);}
applyWidget(this);});};this.addParser=function(parser){var l=parsers.length,a=true;for(var i=0;i<l;i++){if(parsers[i].id.toLowerCase()==parser.id.toLowerCase()){a=false;}}
if(a){parsers.push(parser);};};this.addWidget=function(widget){widgets.push(widget);};this.formatFloat=function(s){var i=parseFloat(s);return(isNaN(i))?0:i;};this.formatInt=function(s){var i=parseInt(s);return(isNaN(i))?0:i;};this.isDigit=function(s,config){var DECIMAL='\\'+config.decimal;var exp='/(^[+]?0('+DECIMAL+'0+)?$)|(^([-+]?[1-9][0-9]*)$)|(^([-+]?((0?|[1-9][0-9]*)'+DECIMAL+'(0*[1-9][0-9]*)))$)|(^[-+]?[1-9]+[0-9]*'+DECIMAL+'0+$)/';return RegExp(exp).test($.trim(s));};this.clearTableBody=function(table){if($.browser.msie){function empty(){while(this.firstChild)this.removeChild(this.firstChild);}
empty.apply(table.tBodies[0]);}else{table.tBodies[0].innerHTML="";}};}});$.fn.extend({tablesorter:$.tablesorter.construct});var ts=$.tablesorter;ts.addParser({id:"text",is:function(s){return true;},format:function(s){return $.trim(s.toLowerCase());},type:"text"});ts.addParser({id:"digit",is:function(s,table){var c=table.config;return $.tablesorter.isDigit(s,c);},format:function(s){return $.tablesorter.formatFloat(s);},type:"numeric"});ts.addParser({id:"currency",is:function(s){return/^[£$?.]/.test(s);},format:function(s){return $.tablesorter.formatFloat(s.replace(new RegExp(/[^0-9.]/g),""));},type:"numeric"});ts.addParser({id:"ipAddress",is:function(s){return/^\d{2,3}[\.]\d{2,3}[\.]\d{2,3}[\.]\d{2,3}$/.test(s);},format:function(s){var a=s.split("."),r="",l=a.length;for(var i=0;i<l;i++){var item=a[i];if(item.length==2){r+="0"+item;}else{r+=item;}}
return $.tablesorter.formatFloat(r);},type:"numeric"});ts.addParser({id:"url",is:function(s){return/^(https?|ftp|file):\/\/$/.test(s);},format:function(s){return jQuery.trim(s.replace(new RegExp(/(https?|ftp|file):\/\//),''));},type:"text"});ts.addParser({id:"isoDate",is:function(s){return/^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(s);},format:function(s){return $.tablesorter.formatFloat((s!="")?new Date(s.replace(new RegExp(/-/g),"/")).getTime():"0");},type:"numeric"});ts.addParser({id:"percent",is:function(s){return/\%$/.test($.trim(s));},format:function(s){return $.tablesorter.formatFloat(s.replace(new RegExp(/%/g),""));},type:"numeric"});ts.addParser({id:"usLongDate",is:function(s){return s.match(new RegExp(/^[A-Za-z]{3,10}\.? [0-9]{1,2}, ([0-9]{4}|'?[0-9]{2}) (([0-2]?[0-9]:[0-5][0-9])|([0-1]?[0-9]:[0-5][0-9]\s(AM|PM)))$/));},format:function(s){return $.tablesorter.formatFloat(new Date(s).getTime());},type:"numeric"});ts.addParser({id:"shortDate",is:function(s){return/\d{1,2}[\/\-]\d{1,2}[\/\-]\d{2,4}/.test(s);},format:function(s,table){var c=table.config;s=s.replace(/\-/g,"/");if(c.dateFormat=="us"){s=s.replace(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,"$3/$1/$2");}else if(c.dateFormat=="uk"){s=s.replace(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,"$3/$2/$1");}else if(c.dateFormat=="dd/mm/yy"||c.dateFormat=="dd-mm-yy"){s=s.replace(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{2})/,"$1/$2/$3");}
return $.tablesorter.formatFloat(new Date(s).getTime());},type:"numeric"});ts.addParser({id:"time",is:function(s){return/^(([0-2]?[0-9]:[0-5][0-9])|([0-1]?[0-9]:[0-5][0-9]\s(am|pm)))$/.test(s);},format:function(s){return $.tablesorter.formatFloat(new Date("2000/01/01 "+s).getTime());},type:"numeric"});ts.addParser({id:"metadata",is:function(s){return false;},format:function(s,table,cell){var c=table.config,p=(!c.parserMetadataName)?'sortValue':c.parserMetadataName;return $(cell).metadata()[p];},type:"numeric"});ts.addWidget({id:"zebra",format:function(table){if(table.config.debug){var time=new Date();}
$("tr:visible",table.tBodies[0]).filter(':even').removeClass(table.config.widgetZebra.css[1]).addClass(table.config.widgetZebra.css[0]).end().filter(':odd').removeClass(table.config.widgetZebra.css[0]).addClass(table.config.widgetZebra.css[1]);if(table.config.debug){$.tablesorter.benchmark("Applying Zebra widget",time);}}});})(jQuery);(function($){$.extend({tablesorterPager:new function(){function updatePageDisplay(c){var s=$(c.cssPageDisplay,c.container).html((c.page+1)+c.seperator+c.totalPages);}
function setPageSize(table,size){var c=table.config;c.size=size;c.totalPages=Math.ceil(c.totalRows/c.size);c.pagerPositionSet=false;moveToPage(table);fixPosition(table);}
function fixPosition(table){var c=table.config;if(!c.pagerPositionSet&&c.positionFixed){var c=table.config,o=$(table);if(o.offset){c.container.css({top:o.offset().top+o.height()+'px',position:'absolute'});}
c.pagerPositionSet=true;}}
function moveToFirstPage(table){var c=table.config;c.page=0;moveToPage(table);}
function moveToLastPage(table){var c=table.config;c.page=(c.totalPages-1);moveToPage(table);}
function moveToNextPage(table){var c=table.config;c.page++;if(c.page>=(c.totalPages-1)){c.page=(c.totalPages-1);}
moveToPage(table);}
function moveToPrevPage(table){var c=table.config;c.page--;if(c.page<=0){c.page=0;}
moveToPage(table);}
function moveToPage(table){var c=table.config;if(c.page<0||c.page>(c.totalPages-1)){c.page=0;}
renderTable(table,c.rowsCopy);}
function renderTable(table,rows){var c=table.config;var l=rows.length;var s=(c.page*c.size);var e=(s+c.size);if(e>rows.length){e=rows.length;}
var tableBody=$(table.tBodies[0]);$.tablesorter.clearTableBody(table);for(var i=s;i<e;i++){var o=rows[i];var l=o.length;for(var j=0;j<l;j++){tableBody[0].appendChild(o[j]);}}
fixPosition(table,tableBody);$(table).trigger("applyWidgets");if(c.page>=c.totalPages){moveToLastPage(table);}
updatePageDisplay(c);}
this.appender=function(table,rows){var c=table.config;c.rowsCopy=rows;c.totalRows=rows.length;c.totalPages=Math.ceil(c.totalRows/c.size);renderTable(table,rows);};this.defaults={size:10,offset:0,page:0,totalRows:0,totalPages:0,container:null,cssNext:'.next',cssPrev:'.prev',cssFirst:'.first',cssLast:'.last',cssPageDisplay:'.pagedisplay',cssPageSize:'.pagesize',seperator:"/",positionFixed:false,appender:this.appender};this.construct=function(settings){return this.each(function(){config=$.extend(this.config,$.tablesorterPager.defaults,settings);var table=this,pager=config.container;$(this).trigger("appendCache");config.size=parseInt($(".pagesize",pager).val());$(config.cssFirst,pager).click(function(){moveToFirstPage(table);return false;});$(config.cssNext,pager).click(function(){moveToNextPage(table);return false;});$(config.cssPrev,pager).click(function(){moveToPrevPage(table);return false;});$(config.cssLast,pager).click(function(){moveToLastPage(table);return false;});$(config.cssPageSize,pager).change(function(){setPageSize(table,parseInt($(this).val()));return false;});});};}});$.fn.extend({tablesorterPager:$.tablesorterPager.construct});})(jQuery);(function($){$.extend({tablesorterFilter:new function(){function has_words(str,words,caseSensitive){var text=caseSensitive?str:str.toLowerCase();for(var i=0;i<words.length;i++){if(text.indexOf(words[i])===-1)return false;}
return true;}
function doFilter(table,phrase){if(table.config.debug){var cacheTime=new Date();}
var phrase_length=phrase.length;var caseSensitive=table.config.filterCaseSensitive;var words=caseSensitive?phrase.split(" "):phrase.toLowerCase().split(" ");var columns=table.config.filterColumns;var resultRows=[];var success=function(elem){elem.show();resultRows.push(elem);}
var failure=function(elem){;}
if(columns){var findStr="";for(var i=0;i<columns.length;i++){findStr+="td:eq("+columns[i]+"),";}
var search_text=function(){var elem=jQuery(this);has_words(elem.find(findStr).text(),words,caseSensitive)?success(elem):failure(elem);}}else{var search_text=function(){var elem=jQuery(this);has_words(elem.text(),words,caseSensitive)?success(elem):failure(elem);}}
var allRows=table.config.cache.row;for(var i=0;i<allRows.length;i++){allRows[i].each(search_text);}
$.tablesorter.clearTableBody(table);for(var i=0;i<resultRows.length;i++){$(table.tBodies[0]).append(resultRows[i]);}
$(table).trigger("update");$(table).trigger("appendCache");if(table.config.debug){$.tablesorter.benchmark("Apply filter:",cacheTime);}
return table;};function clearFilter(table){if(table.config.debug){var cacheTime=new Date();}
var allRows=table.config.cache.row;$.tablesorter.clearTableBody(table);for(var i=0;i<allRows.length;i++){$(table.tBodies[0]).append(allRows[i]);}
$(table).trigger("update");$(table).trigger("appendCache");if(table.config.debug){$.tablesorter.benchmark("Clear filter:",cacheTime);}
return table;};this.defaults={filterContainer:'#filter-box',filterClearContainer:'#filter-clear-button',filterColumns:null,filterCaseSensitive:false};this.construct=function(settings){return this.each(function(){config=$.extend(this.config,$.tablesorterFilter.defaults,settings);var table=this;function checkInputBox(inputBox,override){var value=inputBox.value;if((value!=inputBox.lastValue)||(override)){inputBox.lastValue=value;doFilter(table,value);}};var timer;$(config.filterContainer).keyup(function(){var timerWait=500;var overrideBool=false;var inputBox=this;if(inputBox.keyCode==13){timerWait=1;overrideBool=true;}
var timerCallback=function(){checkInputBox(inputBox,overrideBool)}
clearTimeout(timer);timer=setTimeout(timerCallback,timerWait);return false;});$(config.filterClearContainer).click(function(){clearFilter(table);$(config.filterContainer).val("").focus();});$(table).bind("clearFilter",function(){clearFilter(table);});});};}});$.fn.extend({tablesorterFilter:$.tablesorterFilter.construct});})(jQuery);

(function($) {

	$.formatCurrency = {};

	$.formatCurrency.regions = [];

	// default Region is en
	$.formatCurrency.regions[''] = {
		symbol: '&pound;',
		positiveFormat: '%s%n',
		negativeFormat: '(%s%n)',
		decimalSymbol: '.',
		digitGroupSymbol: ',',
		groupDigits: true
	};

	$.fn.formatCurrency = function(destination, settings) {

		if (arguments.length == 1 && typeof destination !== "string") {
			settings = destination;
			destination = false;
		}

		// initialize defaults
		var defaults = {
			name: "formatCurrency",
			colorize: false,
			region: '',
			global: true,
			roundToDecimalPlace: 2, // roundToDecimalPlace: -1; for no rounding; 0 to round to the dollar; 1 for one digit cents; 2 for two digit cents; 3 for three digit cents; ...
			eventOnDecimalsEntered: false
		};
		// initialize default region
		defaults = $.extend(defaults, $.formatCurrency.regions['']);
		// override defaults with settings passed in
		settings = $.extend(defaults, settings);

		// check for region setting
		if (settings.region.length > 0) {
			settings = $.extend(settings, getRegionOrCulture(settings.region));
		}
		settings.regex = generateRegex(settings);

		return this.each(function() {
			$this = $(this);

			// get number
			var num = '0';
			num = $this[$this.is('input, select, textarea') ? 'val' : 'html']();

			//identify '(123)' as a negative number
			if (num.search('\\(') >= 0) {
				num = '-' + num;
			}

			if (num === '' || (num === '-' && settings.roundToDecimalPlace === -1)) {
				return;
			}

			// if the number is valid use it, otherwise clean it
			if (isNaN(num)) {
				// clean number
				num = num.replace(settings.regex, '');
				
				if (num === '' || (num === '-' && settings.roundToDecimalPlace === -1)) {
					return;
				}
				
				if (settings.decimalSymbol != '.') {
					num = num.replace(settings.decimalSymbol, '.');  // reset to US decimal for arithmetic
				}
				if (isNaN(num)) {
					num = '0';
				}
			}
			
			// evalutate number input
			var numParts = String(num).split('.');
			var isPositive = (num == Math.abs(num));
			var hasDecimals = (numParts.length > 1);
			var decimals = (hasDecimals ? numParts[1].toString() : '0');
			var originalDecimals = decimals;
			
			// format number
			num = Math.abs(numParts[0]);
			num = isNaN(num) ? 0 : num;
			if (settings.roundToDecimalPlace >= 0) {
				decimals = parseFloat('1.' + decimals); // prepend "0."; (IE does NOT round 0.50.toFixed(0) up, but (1+0.50).toFixed(0)-1
				decimals = decimals.toFixed(settings.roundToDecimalPlace); // round
				if (decimals.substring(0, 1) == '2') {
					num = Number(num) + 1;
				}
				decimals = decimals.substring(2); // remove "0."
			}
			num = String(num);

			if (settings.groupDigits) {
				for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++) {
					num = num.substring(0, num.length - (4 * i + 3)) + settings.digitGroupSymbol + num.substring(num.length - (4 * i + 3));
				}
			}

			if ((hasDecimals && settings.roundToDecimalPlace == -1) || settings.roundToDecimalPlace > 0) {
				num += settings.decimalSymbol + decimals;
			}

			// format symbol/negative
			var format = isPositive ? settings.positiveFormat : settings.negativeFormat;
			var money = format.replace(/%s/g, settings.symbol);
			money = money.replace(/%n/g, num);

			// setup destination
			var $destination = $([]);
			if (!destination) {
				$destination = $this;
			} else {
				$destination = $(destination);
			}
			// set destination
			$destination[$destination.is('input, select, textarea') ? 'val' : 'html'](money);

			if (
				hasDecimals && 
				settings.eventOnDecimalsEntered && 
				originalDecimals.length > settings.roundToDecimalPlace
			) {
				$destination.trigger('decimalsEntered', originalDecimals);
			}

			// colorize
			if (settings.colorize) {
				$destination.css('color', isPositive ? 'black' : 'red');
			}
		});
	};

	// Remove all non numbers from text
	$.fn.toNumber = function(settings) {
		var defaults = $.extend({
			name: "toNumber",
			region: '',
			global: true
		}, $.formatCurrency.regions['']);

		settings = jQuery.extend(defaults, settings);
		if (settings.region.length > 0) {
			settings = $.extend(settings, getRegionOrCulture(settings.region));
		}
		settings.regex = generateRegex(settings);

		return this.each(function() {
			var method = $(this).is('input, select, textarea') ? 'val' : 'html';
			$(this)[method]($(this)[method]().replace('(', '(-').replace(settings.regex, ''));
		});
	};

	// returns the value from the first element as a number
	$.fn.asNumber = function(settings) {
		var defaults = $.extend({
			name: "asNumber",
			region: '',
			parse: true,
			parseType: 'Float',
			global: true
		}, $.formatCurrency.regions['']);
		settings = jQuery.extend(defaults, settings);
		if (settings.region.length > 0) {
			settings = $.extend(settings, getRegionOrCulture(settings.region));
		}
		settings.regex = generateRegex(settings);
		settings.parseType = validateParseType(settings.parseType);

		var method = $(this).is('input, select, textarea') ? 'val' : 'html';
		var num = $(this)[method]();
		num = num ? num : "";
		num = num.replace('(', '(-');
		num = num.replace(settings.regex, '');
		if (!settings.parse) {
			return num;
		}

		if (num.length == 0) {
			num = '0';
		}

		if (settings.decimalSymbol != '.') {
			num = num.replace(settings.decimalSymbol, '.');  // reset to US decimal for arthmetic
		}

		return window['parse' + settings.parseType](num);
	};

	function getRegionOrCulture(region) {
		var regionInfo = $.formatCurrency.regions[region];
		if (regionInfo) {
			return regionInfo;
		}
		else {
			if (/(\w+)-(\w+)/g.test(region)) {
				var culture = region.replace(/(\w+)-(\w+)/g, "$1");
				return $.formatCurrency.regions[culture];
			}
		}
		// fallback to extend(null) (i.e. nothing)
		return null;
	}

	function validateParseType(parseType) {
		switch (parseType.toLowerCase()) {
			case 'int':
				return 'Int';
			case 'float':
				return 'Float';
			default:
				throw 'invalid parseType';
		}
	}
	
	function generateRegex(settings) {
		if (settings.symbol === '') {
			return new RegExp("[^\\d" + settings.decimalSymbol + "-]", "g");
		}
		else {
			var symbol = settings.symbol.replace('$', '\\$').replace('.', '\\.');		
			return new RegExp(symbol + "|[^\\d" + settings.decimalSymbol + "-]", "g");
		}	
	}

})(jQuery);