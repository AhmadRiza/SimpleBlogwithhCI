<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/css/admin.css">
    <script src='<?php echo base_url()?>resources/js/tinymce/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#content-post',  // change this value according to your HTML
            plugins: "wordcount image code"
        });
    </script>
    <style>
        #content-post{
            display : block;
            width : 100%;
            min-height: 400px;
        }
    </style>

    <title><?php if(isset($post))echo 'Edit Article';else echo 'New Article';?></title>
</head>

<body>

    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-md-2 side">

                <nav>
                    <div class="avt-box">
                        <img src="<?php echo base_url().'resources/img/'.$this->session->userdata('pict')?>" alt="Avatar" class="avt">
                        <p><?php echo $this->session->userdata('name') ?></p>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="<?php echo base_url();?>admin">Article Manager</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/new-post" class="active">New Article</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/logout">Log Out</a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="col-md-10 main">
                <section>
                    <h1>
                    <?php 
                    if(isset($post))echo 'Edit Article';else echo 'New Article';
                    ?>
                    
                    </h1>
                    <hr>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="titleinput">Title</label>
                                <input type="text" class="form-control" id="titleinput" placeholder="Title" name="title" required 
                                value="<?php if(isset($post))echo $post['title'];?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputcategory">Categories</label>
                                <select name="category" class="form-control" id="inputcategory">
                                    <?php
                                        foreach($cat as $c)
                                        {
                                        ?>
                                        <option value="<?php echo $c['category_id']?>" 
                                        <?php
                                        if(isset($post)){
                                            if($c['category_id'] == $post['category_id']) echo 'selected';
                                        }
                                        ?>
                                        >
                                            <?php echo $c['category']?>
                                        </option>
                                    <?php 
                                        }?>
                                </select>
                            </div>
                        </div>
                         <div class="form-row">
                                <div class="form-group">
                                   <label for="exampleInputFile">Featured Image</label>
                                   <input name="img" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                   <small id="fileHelp" class="form-text text-muted">
                                   <?php
                                    if(isset($post)) echo 'Current image is '.$post['img'];
                                    else echo 'Upload your featured image';
                                   ?>
                                   </small>
                               </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="content-post">Content</label>
                                <textarea name="content" id="content-post" placeholder="Enter text ..." ><?php if(isset($post))echo $post['content'];?></textarea>
                            </div>
                        </div >

                        <div class="form-row sub">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>

                </section>

            </div>
        </div>
    </div>

</body>

</html>