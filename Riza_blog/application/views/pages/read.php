<div class="container">
    <div class="row">
        <!-- main content -->
        <div class="col-md-8 main">
            <section class="read">
                <div class="pict-detail">
                    <img src="<?php echo base_url() . 'resources/img/' . $article['img']; ?>" alt="">
                    <div class="details-title">
                        <h1>
                            <?php echo $article['title'] ?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col read-text">
                        <div class="row author">
                            <div class="avatar">
                                <img src="<?php echo base_url(); ?>resources/img/pp.png" alt="AR">
                            </div>
                            <div>
                                <div class="av-name"> <?php echo $article['name']; ?></div>
                                <div class="av-time"><?php echo relative_time($article['date']); ?></div>
                            </div>
                        </div>

                        <?php echo $article['content'] ?>


                    </div>
                </div>
                <div class="row socmed h-center">

                    <div class="wa">
                        <a href="#" class="center">
                            <i class="ion-social-whatsapp soc-icon"></i>
                        </a>
                    </div>
                    <div class="gg">
                        <a href="#" class="center">
                            <i class="ion-social-google soc-icon"></i>
                        </a>
                    </div>
                    <div class="fb">
                        <a href="#" class="center">
                            <i class="ion-social-facebook soc-icon"></i>
                        </a>
                    </div>
                    <div class="tw">
                        <a href="#" class="center">
                            <i class="ion-social-twitter soc-icon"></i>
                        </a>
                    </div>
                </div>
            </section>

            <section>
                <h2>Comment</h2>
                <div class="coment">
                    
                    <?php 
                        foreach ($comments as $c) {
                    ?>

                    <div class="coment-item">
                        <div class="name-user">
                            <p><?php echo $c['name'];?><span><?php echo $c['email'];?></span></p>
                            <p><?php echo relative_time($c['date']);?></p>
                        </div>
                        <div class="coment-txt">
                            <?php echo $c['text'];?>
                        </div>
                    </div>
                    <hr>
                    <?php 
                    }
                    ?>

                </div>
                <div class="coment-form">
                    <h2>Leave a Reply</h2>
                    <form  method="post">
                        <div class="fg">
                            <label>Name*</label>
                            <input type="text" class="" name="name" id="" placeholder="Tony Starks" required>
                        </div>
                        <div class="fg">
                            <label >Email*</label>
                            <input type="email"  name="email" id="" placeholder="jarvis@stark.com" required>
                        </div>
                        <div class="fg">
                            <label >Coment*</label>
                            <textarea name="coment" id="" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="fg">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </section>

        </div>




