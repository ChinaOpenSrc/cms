<?php require 'header.php';?>
<body class="fixed-sidebar fixed-header">


<div id="page-wrapper" class="demo-example">

<?php require 'menu.php';?>

    <div id="page-main">
        <div id="page-main-wrapper">
        
        <?php require 'nav.php';?>
        
            <div id="page-breadcrumb-wrapper">
                <div id="page-breadcrumb">
                    <a href="" id="parentname" title="">
                        <i class="glyph-icon icon-dashboard"></i>
                        aaaaaaaaaaa
                    </a>
                   
                    <span class="current" id="activeaname">
                        bbbbbbbbbb
                    </span>
                </div>
            </div><!-- #page-breadcrumb-wrapper -->
        
            <div id="page-content">
            <?php 
                $file=DIR.'/admin/'.CNAME.'/tpl/'.ANAME.".php";
                if(file_exists($file)){
                    require $file;
                }else{
                    echo "模板文件   $file 不存在";
                }
            ?>
            </div><!-- #page-content -->
            
        </div><!-- #page-main -->
        
    </div><!-- #page-main-wrapper -->
</div><!-- #page-wrapper -->
</body>
</html>


