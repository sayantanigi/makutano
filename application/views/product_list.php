<main>
    <section class="signup__area po-rel-z1 pt-100 pb-145">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 mt-50">
                    <div class="section__title-wrapper text-center mb-55">
                        <h2 class="section__title">All Products</h2>
                        <nav>
                            <ol class="breadcrumbnav mb-lg-0">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url()?>store">Store</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div>
                <div class="row g-lg-4 g-3">
                <?php if(!empty($productData)) { 
                    foreach ($productData as $value) {
                    if (@$value['product_image'] && file_exists('./uploads/products/' . @$value['product_image'])) {
                        $image1 = base_url('/uploads/products/' . @$value['product_image']);
                    } else {
                        $image1 = base_url('assets/images/no-image.png');
                    } ?>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="productlistBox">
                            <div class="pListImgbox">
                                <a href="<?= base_url()?>product_details/<?php echo $value['id'];?>" class="productlistImg">
                                    <img src="<?php echo $image1;?>">
                                </a>
                                <a href="#" class="pListCart shadow">Add to Cart</a>
                            </div>
                            <h3 class="productlistTitle"><a href="<?= base_url()?>product_details/<?php echo $value['id'];?>"><?= $value['product_name'];?></a></h3>
                            <div class="d-md-flex justify-content-between">
                                <p class="pListPrice">$<?= $value['sale_price']?> <del class="text-slate-400">$<?= $value['mrp']?></del></p>
                                <div class="productListRate">
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } else{ echo "No Data Found";} ?>
                </div>
            </div>
        </div>
    </section>
</main>