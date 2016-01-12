<?php
$Pubic=new PublicControl();
$meau=$Pubic->getMenu();
?>
<div id="page-sidebar">
    <div id="header-logo">
        <a href="javascript:;" class="tooltip-button" data-placement="bottom" title="Close sidebar" id="close-sidebar">
            <i class="glyph-icon icon-align-justify"></i>
        </a>
        <a href="javascript:;" class="tooltip-button hidden" data-placement="bottom" title="Open sidebar" id="rm-close-sidebar">
            <i class="glyph-icon icon-align-justify"></i>
        </a>
        <a href="javascript:;" class="tooltip-button hidden" title="Navigation Menu" id="responsive-open-menu">
            <i class="glyph-icon icon-align-justify"></i>
        </a>
    </div>

    <div id="sidebar-menu" class="scrollable-content">
        <ul>
            <li>
                <a href="<?php url("Index")?>"  title="Dashboard">
                    <i class="glyph-icon icon-dashboard"></i>后台首页</a>
            </li>
        <?php if($meau)foreach ($meau as $v){?>
        <li class="sub-menu">
            <a href="javascript:;" ><i class="glyph-icon <?php echo $v['icon']?>"></i><span><?php echo $v['title']?></span></a>
            <ul class="sub">
                <?php if($v['node'])foreach ($v['node'] as $v1){?>
                <li>
<!--                     <if condition="$vosub['hassub'] eq 1"> -->
                        <a href="index.php?c=<?php echo $v1['name']?>&a=index"  zs-id="<?php echo $v1['icon']?>" ><i class="glyph-icon <?php echo $v1['icon']?>"></i><?php echo $v1['title']?></a>                        
<!--                         <ul class="sub mrg10A"> -->
<!--                         <volist name="vosub['sub']" id="vosubsub"> -->
<!--                             <li><a  href="{$vosubsub['url']}" rel="{$vosubsub['rel']}"  zs-id="{$vosubsub['id']}"><i class="glyph-icon icon-chevron-right"></i>{$vosubsub.title}</a></li> -->
<!--                         </volist>     -->
<!--                         </ul> -->
<!--                     <else /> -->
<!--                         <a href="{$vosub['url']}" rel="{$vosub['rel']}"  zs-id="{$vosub['id']}"><i class="glyph-icon  {$vosub['icon']}"></i>{$vosub.title}</a> -->
<!--                     </if> -->
                </li>
                <?php }?>
            </ul>
        </li>
        <?php }?>
        </ul>
    </div>
            </div><!-- #page-sidebar -->