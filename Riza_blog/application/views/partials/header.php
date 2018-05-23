<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    
    <?php
        if(isset($title)){
            echo $title;
        }else{
            echo 'Riza Blog';
        }
    ?>
                         
    </title>
    <link rel="stylesheet" href="<?php echo base_url();?>resources/css/formreset.css">
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/layout.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/css/ionicons.min.css">
    <link href="<?php echo base_url();?>resources/css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="nav">
            <div class="container">
                <div class="flex nav-box">

                    <div class="box-logo flex">
                        <div class="logo">
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url();?>resources/img/logo.svg" alt="Rz">
                            </a>
                        </div>
                        <div class="search">
                            <form action="<?php echo base_url() . 'search';?>" method="GET">
                                <input type="text" placeholder="Search..." name="s">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>

                    <ul class="nav-items flex">
                        <li>
                            <a href="<?php echo base_url();?>" class="active">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'tutorials';?>">Tutorials</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'stories';?>">Stories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'about';?>">About</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </header>