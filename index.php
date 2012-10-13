<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="en-us">
        <title>Translation Tool</title>

        <!-- CSS -->
		<link rel="stylesheet" type="text/css" href="status.css?<?php echo filemtime('status.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="http://cdn.sencha.io/ext-4.1.1-gpl/resources/css/ext-all.css" />
        <!-- ENDCSS -->

        <!-- LIBS --> 
        <script type="text/javascript" charset="utf-8" src="http://cdn.sencha.io/ext-4.1.1-gpl/ext-all.js"></script>
        <!-- ENDLIBS --> 
		
        <script src="js/WindowDialog.js?<?php echo filemtime('js/WindowDialog.js'); ?>"></script>
        <script src="js/GridDialog.js?<?php echo filemtime('js/GridDialog.js'); ?>"></script>
        <script src="js/Main.js?<?php echo filemtime('js/Main.js'); ?>"></script>

        <style type="text/css">
            .htmlpreview:hover{
                background-color: black;
                color: white;
            }
			html, body {
				font: normal 12px verdana;
				margin: 0;
				padding: 0;
				border: 0 none;
				overflow: hidden;
				height: 100%;
			}
			.empty .x-panel-body {
				padding-top:20px;
				text-align:center;
				font-style:italic;
				color: gray;
				font-size:11px;
			}
		</style>		
    </head>

    <body>
	<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-31332716-1']);
	_gaq.push(['_setDomainName', 'translation.zelda.com.br']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>  	
    </body>
</html>
