<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<script src="lib/js/jquery-1.11.3.min.js"></script>
		<script src="lib/js/jquery-ui-1.11.4/jquery-ui.js"></script>
		<script>
			function JQDialoga(title, contentUrl, params) {
				var page = "http://test.cuserd.com";
				var wWidth = $(window).width();
				var dWidth = wWidth * 0.8;
				var wHeight = $(window).height();
				var dHeight = wHeight * 0.8;

				var $dialog = $('<div></div>')
							   .html('<iframe style="border: 0px; " src="' + page + '" width="100%" height="100%"></iframe>')
							   .dialog({
								   autoOpen: false,
								   modal: false,
								   open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
								   // open: function(event, ui) { $(".ui-dialog-titlebar", ui.dialog | ui).hide(); },
								   // height: 600,
								   // width: 1000,
								   height: wHeight,
								   width: wWidth,
								   draggable: false,
								   resizable: false,
								   position: { my: "center", at: "center", of: window },
								   closeOnEscape: false
							   });
				$dialog.dialog('open');
			};
		</script>

		<title>Sandbox</title>

	</head>
  
	<body>

		<a id="MyLinkToDialogID" href="http://wp.pl" onclick="JQDialoga();return false;" >Hacer Click</a>

	</body>
</html>