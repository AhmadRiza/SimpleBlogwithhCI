<div class="container">
<div class="row">
    <!-- main content -->
    <div class="col-md-8 main">
    



<section>
    <h2>
        <i class="ion-social-android h2-icon"></i> Android Tutorials</h2>
    <div class="row">
       <?php
foreach ($android as $item) {
    ?>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="<?php echo base_url() . 'resources/img/' . $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                <a href="<?php echo base_url() . $item['category_slug'] . $item['slug']; ?>" class="title-img flex vertical">
                    <p class="tag"><?php echo nice_date($item['date'], 'd-m-Y'); ?></p>
                    <div class="title">
                        <?php echo $item['title']; ?>
                    </div>
                </a>
            </div>
        </div>
    <?php
}
?>

    </div>
    <div class="row h-center">
        <a href="<?php echo base_url() . 'tutorials/android'?>" class="btn btn-solid">
            Load More
        </a>
    </div>

</section>

<!-- web -->
<section>
    <h2>
        <i class="ion-ios-world h2-icon"></i> Web Tutorials</h2>
    <div class="row">
             <?php
foreach ($web as $item) {
    ?>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="<?php echo base_url() . 'resources/img/' . $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                <a href="<?php echo base_url() . $item['category_slug'] . $item['slug']; ?>" class="title-img flex vertical">
                    <p class="tag"><?php echo nice_date($item['date'], 'd-m-Y'); ?></p>
                    <div class="title">
                        <?php echo $item['title']; ?>
                    </div>
                </a>
            </div>
        </div>
    <?php
}
?>

    </div>
    <div class="row h-center">
        <a href="<?php echo base_url() . 'tutorials/web'?>" class="btn btn-solid">
            Load More
        </a>
    </div>

</section>
<!-- computer science -->
<section>
    <h2>
        <i class="ion-ios-calculator h2-icon"></i> Computer Science Tutorials</h2>
    <div class="row">
           <?php
foreach ($cs as $item) {
    ?>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="<?php echo base_url() . 'resources/img/' . $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                <a href="<?php echo base_url() . $item['category_slug'] . $item['slug']; ?>" class="title-img flex vertical">
                    <p class="tag"><?php echo nice_date($item['date'], 'd-m-Y'); ?></p>
                    <div class="title">
                        <?php echo $item['title']; ?>
                    </div>
                </a>
            </div>
        </div>
    <?php
}
?>

    </div>
    <div class="row h-center">
        <a href="<?php echo base_url() . 'tutorials/cs'?>" class="btn btn-solid">
            Load More
        </a>
    </div>

</section>



    </div>    
    
