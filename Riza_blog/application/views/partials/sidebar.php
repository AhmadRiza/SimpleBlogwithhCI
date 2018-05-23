    <div class="col-md-4 flex vertical side">
            <!-- SUBS -->
            <section class="subscribe-section">
                <h2>Subscribe</h2>
                <form action="subscribe" method="post" class="form-subs flex vertical">
                    <input type="email" name="email" size="17" placeholder="Your Email" class="txt-input">
                    <input type="submit" value="Submit" class="submit">
                </form>
            </section>

            <!-- POPULAR -->
            <section>
                <h2>Popular Stories</h2>
                <?php
                $i=0;
                foreach($trending as $tr){
                ?>
                <div class="popular-item flex">
                    <div class="number">
                        <?php echo ++$i;?>
                    </div>
                    <div class="popular-title">
                        <a href="<?php echo base_url() .$tr['category_slug']. $tr['slug'] ?>">
                            <p class="pop-title"><?php echo $tr['title'] ?></p>
                            <p class="date"><?php echo nice_date($tr['date'], 'd-m-Y')?></p>
                        </a>
                    </div>
                </div>
                
                <?php
                }
                ?>

                
            </section>
            <!-- STATIC PART -->
            <section class="side-section">
                <h2>Tutorials</h2>
                <div class="flex vertical">

                    <div class="tutor-part flex v-center">
                        <div class="tutor-logo">
                            <i class="ion-social-android"></i>
                        </div>
                        <div class="flex-1">
                            <a href="<?php echo base_url() . 'tutorials/android';?>">
                                <p class="part">Android</p>
                                <p><?php echo $total_post['android']?> Posts</p>
                            </a>
                        </div>
                    </div>

                    <div class="tutor-part flex v-center">
                        <div class="tutor-logo">
                            <i class="ion-ios-world"></i>
                        </div>
                        <div class="flex-1">
                            <a href="<?php echo base_url() . 'tutorials/web';?>">
                                <p class="part">Web</p>
                                <p><?php echo $total_post['web']?> Posts</p>
                            </a>
                        </div>
                    </div>
                    <div class="tutor-part flex v-center">
                        <div class="tutor-logo">
                            <i class="ion-ios-calculator"></i>
                        </div>
                        <div class="flex-1">
                            <a href="<?php echo base_url() . 'tutorials/cs';?>">
                                <p class="part">Computer Science</p>
                                <p><?php echo $total_post['cs']?> Posts</p>
                            </a>
                        </div>
                    </div>

                </div>

            </section>
        </div>

        </div>

    </div>