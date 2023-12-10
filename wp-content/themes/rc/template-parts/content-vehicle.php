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
?>
    <div class="hero d-flex align-items-center"">
        <div class="hero__content container-lg d-lg-flex align-items-md-center justify-items-md-between">
            <div class="hero__content-text col-md">
                <?php if(!empty($make) || !empty($model)):?>
                    <h1><?php echo $title . " / " . $model;?></h1>    
                <?php endif;?>
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
                    </div>    
                <?php endif;?>
                <div class="button-group d-md-flex">
                    <a href="<?php echo get_site_url();?>/contact" class="btn">Contact us</a>
                    <a href="tel:2679354287" class="btn">Call (267) 935 - 4287</a>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>