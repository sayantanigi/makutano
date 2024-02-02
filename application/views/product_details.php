<main>
    <section class="signup__area po-rel-z1 pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 mt-50">
                    <div class="section__title-wrapper text-center mb-55">
                        <h2 class="section__title">Store</h2>
                        <nav>
                            <ol class="breadcrumbnav mb-lg-0">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Store</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-5">
                    <img src="<?= base_url()?>assets/img/products/black-print-t-shirt.jpg" class="img-fluid">
                </div>
                <div class="col-lg-7 ps-lg-5 productdetails">
                    <h1 class="h2 fw-bold">Black Print T-Shirt</h1>
                    <div class="d-md-flex">
                        <p class="pListPrice">$16.00 <del class="text-slate-400">$21.00</del></p>
                        <div class="productListRate ms-md-4">
                            <span class="active"><i class="fas fa-star"></i></span>
                            <span class="active"><i class="fas fa-star"></i></span>
                            <span class="active"><i class="fas fa-star"></i></span>
                            <span class="active"><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                    </div>
                    <div class="mt-4 ">
                        <h4>Overview :</h4>
                        <p class="text-light">It is a long established fact that a reader will be distracted by the
                            readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                            that it has a more-or-less normal distribution of letters, as opposed to using 'Content
                            here, content here', making it look like readable English. Many desktop publishing packages
                            and web page editors now use Lorem Ipsum as their default model text, and a search for
                            'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
                            evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the
                            like).</p>

                        <div class="mb-4">
                            <div class="d-flex sizeSelect align-items-center mb-4">
                                <label class="me-2" style="min-width: 80px;">Size:</label>
                                <select class="form-control form-select">
                                    <option>Select</option>
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center">
                                <label class="me-2" style="min-width: 80px;">Quantity:</label>
                                <div class="qty-input">
                                    <button class="qty-count qty-count--minus" data-action="minus"
                                        type="button">-</button>
                                    <input class="product-qty" type="number" name="product-qty" min="0" max="100"
                                        value="1">
                                    <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="<?= base_url()?>product_details" class="e-btn addcartbtn">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordianpDetails mt-4">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Additional Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Review</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content
                            here', making it look like readable English. Many desktop publishing packages and web page
                            editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                            uncover many web sites still in their infancy. Various versions have evolved over the years,
                            sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Red, White, Black, Orange</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>S, M, L, XL, XXL</td>
                                </tr>
                                <tr>
                                    <td>Material</td>
                                    <td>Cotton</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="reviewBox">
                            <div class="reviews-list">
                                <div class="productListRate">
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. It is a long established fact that a
                                    reader will be distracted by the readable content of a page when looking at its
                                    layout.</p>
                                <h5>- John Doe</h5>
                            </div>
                            <div class="reviews-list">
                                <div class="productListRate">
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. It is a long established fact that a
                                    reader will be distracted by the readable content of a page when looking at its
                                    layout.</p>
                                <h5>- John Doe</h5>
                            </div>
                            <div class="reviews-list">
                                <div class="productListRate">
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. It is a long established fact that a
                                    reader will be distracted by the readable content of a page when looking at its
                                    layout.</p>
                                <h5>- John Doe</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Leave A Comment:</h3>
                                <form>
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Rating</label>
                                            <select class="form-control form-select">
                                                <option>Select</option>
                                                <option>5 Stars</option>
                                                <option>4 Stars</option>
                                                <option>3 Stars</option>
                                                <option>2 Stars</option>
                                                <option>1 Star</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Your Comment</label>
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="e-btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="producstPnl mb-60 mt-60">
                        <div>
                            <h2 class="mb-4 h3 fw-bold text-center">Related Products</h2>
                        </div>
                        <div class="owl-carousel owl-theme" id="prolist1">
                            <div class="item">
                                <div class="productlistBox">
                                    <div class="pListImgbox">
                                        <a href="<?= base_url()?>product_details" class="productlistImg"><img
                                                src="<?= base_url()?>assets/img/products/black-print-t-shirt.jpg"></a>
                                        <a href="<?= base_url()?>product_details" class="pListCart shadow">Add to Cart</a>
                                    </div>
                                    <h3 class="productlistTitle"><a href="<?= base_url()?>product_details">Black Print T-Shirt</a></h3>
                                    <div class="d-md-flex justify-content-between">
                                        <p class="pListPrice">$16.00 <del class="text-slate-400">$21.00</del></p>
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
                            <div class="item">
                                <div class="productlistBox">
                                    <div class="pListImgbox">
                                        <a href="<?= base_url()?>product_details" class="productlistImg"><img
                                                src="<?= base_url()?>assets/img/products/product3.jpg"></a>
                                        <a href="<?= base_url()?>product_details" class="pListCart shadow">Add to Cart</a>
                                    </div>
                                    <h3 class="productlistTitle"><a href="<?= base_url()?>product_details">Mens Print T-Shirt</a></h3>
                                    <div class="d-md-flex justify-content-between">
                                        <p class="pListPrice">$16.00 <del class="text-slate-400">$21.00</del></p>
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
                            <div class="item">
                                <div class="productlistBox">
                                    <div class="pListImgbox">
                                        <a href="<?= base_url()?>product_details" class="productlistImg"><img
                                                src="<?= base_url()?>assets/img/products/product4.jpg"></a>
                                        <a href="<?= base_url()?>product_details" class="pListCart shadow">Add to Cart</a>
                                    </div>
                                    <h3 class="productlistTitle"><a href="<?= base_url()?>product_details">Mens Blue T-Shirt</a></h3>
                                    <div class="d-md-flex justify-content-between">
                                        <p class="pListPrice">$16.00 <del class="text-slate-400">$21.00</del></p>
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
                            <div class="item">
                                <div class="productlistBox">
                                    <div class="pListImgbox">
                                        <a href="<?= base_url()?>product_details" class="productlistImg"><img
                                                src="<?= base_url()?>assets/img/products/product10-1.jpg"></a>
                                        <a href="<?= base_url()?>product_details" class="pListCart shadow">Add to Cart</a>
                                    </div>
                                    <h3 class="productlistTitle"><a href="<?= base_url()?>product_details">Black Print T-Shirt</a></h3>
                                    <div class="d-md-flex justify-content-between">
                                        <p class="pListPrice">$16.00 <del class="text-slate-400">$21.00</del></p>
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
                            <div class="item">
                                <div class="productlistBox">
                                    <div class="pListImgbox">
                                        <a href="<?= base_url()?>product_details" class="productlistImg"><img
                                                src="<?= base_url()?>assets/img/products/product11.jpg"></a>
                                        <a href="<?= base_url()?>product_details" class="pListCart shadow">Add to Cart</a>
                                    </div>
                                    <h3 class="productlistTitle"><a href="<?= base_url()?>product_details">Black Print T-Shirt</a></h3>
                                    <div class="d-md-flex justify-content-between">
                                        <p class="pListPrice">$16.00 <del class="text-slate-400">$21.00</del></p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>