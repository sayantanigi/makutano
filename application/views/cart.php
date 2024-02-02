<main>
    <section class="signup__area po-rel-z1 pt-100 pb-145">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 mt-50">
                    <div class="section__title-wrapper text-center mb-55">
                        <h2 class="section__title">My Cart</h2>
                        <nav>
                            <ol class="breadcrumbnav mb-lg-0">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="cart-area">
                <div class="table-content table-responsive carttable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#" class="cartProductimg">
                                        <img src="<?= base_url()?>assets/img/products/black-print-t-shirt.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="#">Black Print T-Shirt </a>
                                </td>
                                <td class="product-price">
                                    <span class="amount">$130.00</span>
                                </td>
                                <td class="product-quantity text-center">
                                    <div class="product-quantity mt-10 mb-10">
                                        <div class="product-quantity-form">
                                            <form action="#">
                                                <button class="cart-minus"><i class="far fa-minus"></i></button>
                                                <input class="cart-input" type="text" value="1">
                                                <button class="cart-plus"><i class="far fa-plus"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                <td class="product-remove"><a href="#" class="text-danger"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#" class="cartProductimg">
                                        <img src="<?= base_url()?>assets/img/products/luxurious-bag.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="#">Luxurious Bag </a>
                                </td>
                                <td class="product-price">
                                    <span class="amount">$130.00</span>
                                </td>
                                <td class="product-quantity text-center">
                                    <div class="product-quantity mt-10 mb-10">
                                        <div class="product-quantity-form">
                                            <form action="#">
                                                <button class="cart-minus"><i class="far fa-minus"></i></button>
                                                <input class="cart-input" type="text" value="2">
                                                <button class="cart-plus"><i class="far fa-plus"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                <td class="product-remove"><a href="#" class="text-danger"><i class="fa fa-times"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon d-sm-flex align-items-center">
                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                            <button class="e-btn" name="apply_coupon" type="submit">Apply
                                    coupon</button>
                            </div>
                            <div class="coupon2">
                            <button class="e-btn" name="update_cart" type="submit">Update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-5 ml-auto">
                        <div class="cart-page-total">
                            <h2>Cart totals</h2>
                            <ul class="mb-20 bg-white">
                            <li>Subtotal <span>$250.00</span></li>
                            <li>Shipping Charges <span>$10.00</span></li>
                            <li>Tax <span>$5.00</span></li>
                            <li class="fw-bold">Total <span>$265.00</span></li>
                            </ul>
                            <div class="text-end"><a class="e-btn" href="<?= base_url()?>checkout">Proceed to checkout</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>