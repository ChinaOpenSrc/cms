<?php require 'header.php';?>
<body class="fixed-sidebar fixed-header">
<block name="style">
</block>
<block name="body">
<div id="page-wrapper" class="demo-example">
<block name="leftside">
<?php require 'menu.php';?>
</block>
<div id="page-main">
<div id="page-main-wrapper">
<block name="nav">
<?php require 'nav.php';?>
</block>
<div id="page-breadcrumb-wrapper">
<block name="breadcrumb">

<div id="page-breadcrumb">
                            <a href="{$breadcrumb['purl']}" id="parentname" title="{$breadcrumb['pname']}">
                                <i class="glyph-icon icon-dashboard"></i>
                                {$breadcrumb['pname']}
                            </a>
                           
                            <span class="current" id="activeaname">
                                {$breadcrumb['localname']}
                            </span>
                        </div>
                     
</block>

    </div><!-- #page-breadcrumb-wrapper -->

<div id="page-content">
<block name="main">

