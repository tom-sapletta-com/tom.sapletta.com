var <?php echo basename(__FILE__, ".php"); ?> = {
    src: 'http://www.fontburner.com/flash/<?php echo basename(__FILE__, ".php"); ?>.swf'
  };
  sIFR.prefetch(<?php echo basename(__FILE__, ".php"); ?>);
  sIFR.delayCSS  = true;
  sIFR.activate(<?php echo basename(__FILE__, ".php"); ?>);
  

 
  sIFR.replace(<?php echo basename(__FILE__, ".php"); ?>, {
    selector: 'h1, h2, h3,  .<?php echo basename(__FILE__, ".php"); ?>, #<?php echo basename(__FILE__, ".php"); ?>'
    ,css: [
      '.sIFR-root {color:#000000;}'
      ,'a {color:#000000; text-decoration: underline; font-weight:normal; }'
      ,'a:link {color:#000000; text-decoration: underline; font-weight:normal; }'
      ,'a:hover {color:#000000; text-decoration: underline; font-weight:normal; }'
      ,'a:visited { color: #000000; text-decoration: underline }'
      ,'em { color: #000000; font-style:normal; font-weight:normal; }'
      ,'strong { color: #000000; font-weight:normal; font-style:normal; }'
    ]

    ,offsetTop:0
    ,marginBottom: 0
   	,verticalSpacing: 0
    ,wmode: 'transparent'
    
  });