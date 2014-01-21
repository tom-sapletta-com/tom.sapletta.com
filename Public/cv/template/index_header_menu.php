<?php global $config; ?>
<div class='menu'>
    <div class='menu-left'>
        Lang:
        <a href="en" >EN</a> |
        <a href="de" >DE</a> |
        <a href="pl" >PL</a> |

        <a href="javascript:doit()" title="Shortcut: [Ctrl] + [P]" >Print Page</a> |
        <a href="javascript:decode()" title="Decode data" class="decode_button" >Decode private data</a>

<!--        <a href="--><?php //echo 'http://'.$config->getHomeUrl(); ?><!--/cv/en" >Curriculum Vitae</a> |-->
<!--        <a href="--><?php //echo 'http://'.$config->getHomeUrl(); ?><!--/blog/pl" >BLOG</a> |-->
<!--        <a href="--><?php //echo 'http://'.$config->getHomeUrl(); ?><!--/learn/pl" >LEARN</a>-->
    </div>

    <div class='menu-right'>
        Download:
        <a href="<?php echo 'http://'.$config->getHomeUrl(); ?>/Public/cv/download/tom.sapletta.com-cv-en-12-2013.pdf" >EN</a> |
        <a href="<?php echo 'http://'.$config->getHomeUrl(); ?>/Public/cv/download/tom.sapletta.com-cv-de-12-2013.pdf" >DE</a> |
        <a href="<?php echo 'http://'.$config->getHomeUrl(); ?>/Public/cv/download/tom.sapletta.com-cv-pl-12-2013.pdf" >PL</a>
    </div>
</div>