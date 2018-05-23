<div class="container">
<div class="row">
    <!-- main content -->
    <div class="col-md-8 main">


<section>
    <h2><?php echo $heading?></h2>
    <div class="row gallery">
<?php
    foreach($items as $item){
    ?>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="<?php echo base_url() . 'resources/img/' . $item['img'];?>" alt="<?php echo $item['title'];?>">
                <a href="<?php echo base_url() . $item['category_slug'] . $item['slug'];?>" class="title-img flex vertical">
                    <p class="tag"><?php echo nice_date($item['date'], 'd-m-Y');?></p>
                    <div class="title">
                        <?php echo $item['title'];?>
                    </div>
                </a>
            </div>
        </div>
    <?php
    }
    ?>

    </div>
    <div class="row h-center">
        <a href="javascript:void(0);" id="loadmore" class="btn btn-solid">
            Load More
        </a>
    </div>
</section>



    </div>    



