<?php
/**
 *  Single Vehicle Content
 * 
 */
$title = get_the_title();
$v_intro = get_field('vehicle_intro');
?>
<?php if(!empty($v_intro)):
    $make = $v_intro['make'];
    $mileage = $v_intro['mileage'];
    $model = $v_intro['model'];
    $price = $v_intro['price'];
    $gallery = $v_intro['photo_gallery'];
    $year = $v_intro['year'];    
?>
    <div class="hero d-flex align-items-center">
        <div class="hero__content container-lg">
            <?php if(!empty($make) || !empty($model)):?>
                <div class="hero__content-top d-lg-flex align-items-md-start justify-content-md-between">
                    <div class="content-title col-lg-5">
                        <h1 class="text--heading-2"><?php echo $title . " / " . $model;?></h1>    
                    </div>
                    <div class="button-group d-none d-lg-flex">
                        <a href="<?php echo get_site_url();?>/contact" class="btn">Contact us</a>
                        <a href="tel:2679354287" class="btn">Call (267) 935 - 4287</a>
                    </div>
                </div>
            <?php endif;?>
            <div class="hero__content-bottom d-lg-flex justify-content-between">
                <?php if(!empty($gallery)):?>
                    <div class="gallery col-lg-6">
                        <div class="gallery__inner">
                        <?php foreach($gallery as $gallery_img):?>
                                <div class="media__img">
                                    <img class="b-lazy" data-src="<?php echo $gallery_img['url'];?>" />
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="gallery__nav">
                            <?php foreach($gallery as $gallery_img):?>
                                <div class="media__img">
                                    <img class="b-lazy" data-src="<?php echo $gallery_img['url'];?>" />
                                </div>  
                            <?php endforeach;?>     
                        </div> 
                    </div>
                    <div class="detail-card col-lg">
                        <?php if(!empty($price) || !empty($mileage)):?>
                            <div class="stat-group d-flex">
                                <?php if(!empty($price)):?>
                                    <div class="stat">
                                        <h3 class="text--label">Price</h3>
                                        <span class="text--label-lg"><?php echo $price?></span>
                                    </div>
                                <?php endif;?>
                                <?php if(!empty($mileage)):?>
                                    <div class="stat">
                                        <h3 class="text--label">Mileage</h3>
                                        <span class="text--label-lg"><?php echo $mileage?></span>
                                    </div>
                                <?php endif;?>
                                <?php if(!empty($year)):?>
                                    <div class="stat">
                                        <h3 class="text--label">Year</h3>
                                        <span class="text--label-lg"><?php echo $year?></span>
                                    </div>
                                <?php endif;?>
                            </div>    
                        <?php endif;?>
                        <?php if(have_rows('vehicle_details')):?>
                            <div class="detail-row">
                                <div class="detail-row__title">
                                    <h3>Vehicle Details</h3>    
                                </div>
                                <div class="detail-row__stats">
                                    <ul class="stat-group__list d-flex">
                                        <?php while(have_rows('vehicle_details')): the_row();
                                            $title = get_sub_field('title');
                                            $detail = get_sub_field('detail');
                                        ?>
                                            <li class="stat col-4">
                                                <?php if(!empty($title)):?>
                                                    <h3 class="text--label text--label-md"><?php echo $title;?></h3>
                                                <?php endif;?>
                                                <?php if(!empty($detail)):?>
                                                    <span class="text--body-1"><?php echo $detail;?></span>    
                                                <?php endif;?>
                                            </li>
                                        <?php endwhile;?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                    
                <?php endif;?>
            </div>
        </div>
    </div>
<?php endif;?>
<!-- <?php if(have_rows('vehicle_details')):?>
    <div class="detail-row">
        <div class="detail-row__title">
            <h2 class="text--heading-3">Vehicle Details</h2>    
        </div>
        <div class="stat-group">
            <ul class="stat-group__list d-md-flex">
                <?php while(have_rows('vehicle_details')): the_row();
                    $title = get_sub_field('title');
                    $detail = get_sub_field('detail');
                ?>
                    <li class="stat col-md-4">
                        <?php if(!empty($title)):?>
                            <h3 class="text--label text--label-md"><?php echo $title;?></h3>
                        <?php endif;?>
                        <?php if(!empty($detail)):?>
                            <span class="text--body-1"><?php echo $detail;?></span>    
                        <?php endif;?>
                    </li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>
<?php endif;?> -->
<?php if(have_rows('vehicle_features')):?>
    <div class="content-row">
        <div class="content-row__inner container-lg d-lg-flex align-items-lg-start justify-content-lg-between">
            <div class="title-card col-lg-2">
                <h2 class="text--heading-2">Additional Features</h2>    
            </div>
            <div class="item-list col-lg-8">
                <ul>
                    <?php while(have_rows('vehicle_features')): the_row();
                        $feature = get_sub_field('feature');
                    ?>
                        <?php if(!empty($feature)):?>
                            <li><?php echo $feature;?></li>    
                        <?php endif;?>
                    <?php endwhile;?>  
                </ul>
            </div>
        </div>
    </div>    
<?php endif;?>