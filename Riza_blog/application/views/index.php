
<div class="container">
    <div class="row">
        <!-- main content -->
        <div class="col-md-8 main">
                            
            <section class="headline">
                <h2>Headline</h2>
                <div class="main-headline">
                    <img src="<?php echo base_url() . 'resources/img/' . $headline['img'];?>" alt="<?php echo $headline['title'];?>">
                    <a href="<?php echo base_url() . $headline['category_slug'] . $headline['slug'];?>" class="title-img flex vertical">
                        <p class="tag"><?php echo  nice_date($headline['date'], 'd-m-Y');?></p>
                        <div class="title">
                            <?php echo $headline['title'];?>
                        </div>
                    </a>
                    </div>

                </section>
                <!-- STORIES -->
                <section class="stories">
                    <h2>Stories</h2>
                    <div class="row">

                    <?php
                    foreach($stories as $st){
                    ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="card">
                                <img src="<?php echo base_url() . 'resources/img/' . $st['img'];?>" alt="<?php echo $st['title'];?>">
                                <a href="<?php echo base_url() . $st['category_slug'] . $st['slug'];?>" class="title-img flex vertical">
                                    <p class="tag"><?php echo nice_date($st['date'], 'd-m-Y');?></p>
                                    <div class="title">
                                        <?php echo $st['title'];?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    </div>
                    <div class="row h-center">
                        <a href="<?php echo base_url().'stories'?>" class="btn btn-solid" id="loadStories">
                            Load More
                        </a>
                    </div>

                </section>

                <!-- TUTORIAL -->
                <section class="tutorial">
                    <h2>Tutorial</h2>
                    <div class="row">
                    
                    <?php
                    foreach($tutorials as $ts){
                    ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="card">
                                <img src="<?php echo base_url() . 'resources/img/' . $ts['img'];?>" alt="<?php echo $ts['title'];?>">
                                <a href="<?php echo base_url() . $ts['category_slug'] . $ts['slug'];?>" class="title-img flex vertical">
                                    <p class="tag"><?php echo nice_date($st['date'], 'd-m-Y');?></p>
                                    <div class="title">
                                        <?php echo $ts['title'];?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    </div>
                    <div class="row h-center">
                        <a href="<?php echo base_url().'tutorials'?>" class="btn btn-solid" id="loadTutor">
                            Load More
                        </a>
                    </div>

                </section>
                
            </div>
            <!-- sidebar -->
    