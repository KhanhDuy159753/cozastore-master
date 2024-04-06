<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="/shoping-cart" class="stext-109 cl8 hov-cl1 trans-04">
            Shoping Cart
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Check Out
        </span>
    </div>
</div>


<!-- Check Out -->
<form action="/xl-checkout" method="post" class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="mtext-109 cl2 p-t-10 p-b-10">
                                        Billing Address
                                    </h4>
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <?php if (isset($_SESSION['role'])) : ?>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="receiver_name" id="name" placeholder="Enter your name" value="<?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="receiver_email" id="email" placeholder="Enter your email" value="<?= $_SESSION['email'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" name="receiver_address" id="address" placeholder="Enter your address" value="<?= $_SESSION['address'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel" class="form-control" name="receiver_tel" id="phone" placeholder="Enter your phone number" value="<?= $_SESSION['phone'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bill">Say Something</label>
                                                    <textarea class="form-control" name="receiver_note" id="bill" rows="4" placeholder="Type your message here"></textarea>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <p>Please login to check out</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h4 class="mtext-109 cl2 p-t-10 p-b-10">
                                            Shipping Address
                                        </h4>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="shipping-address-form">
                                        <p>Your shipping address form is here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h4 class="mtext-109 cl2 p-t-10 p-b-10">
                                            Card Details
                                        </h4>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card-details">
                                        <p>Your card details goes here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Your order Details
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                Free
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Product:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">

                            <ul class="header-cart-wrapitem w-full">
                                <input type="hidden" name="quantity" value="<?= $totalQuantity ?>">
                                <?php if (!empty($_SESSION['cart'])) :
                                    foreach ($_SESSION['cart'] as $item_cart) : ?>
                                        <input type="hidden" name="id_pro" value="<?= $item_cart['id'] ?>">
                                        <li class="header-cart-item flex-w flex-t m-b-12">
                                            <div class="header-cart-item-img">
                                                <img src="public/assets/images/product/<?= $item_cart['img'] ?>" alt="IMG">
                                            </div>

                                            <div class="header-cart-item-txt p-t-8">
                                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                                    <?= $item_cart['name'] ?>
                                                </a>
                                                <div class="flex-w flex-sb">
                                                    <span class="header-cart-item-info">
                                                        <?= $item_cart['quantity'] ?> x <?= $item_cart['price'] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li class="header-cart-item flex-w flex-t m-b-12">
                                        <p>
                                            The shopping cart is empty
                                        </p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Payment:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <ul class="header-cart-wrapitem w-full">

                                <li class="header-cart-item flex-w flex-t">
                                    <div class="header-cart-item-info">
                                        <input type="radio" name="payment" id="cash" value="1">
                                    </div>

                                    <div class="header-cart-item-txt p-l-5">
                                        <label for="cash" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            Cash on delivery
                                        </label>
                                    </div>
                                </li>

                                <li class="header-cart-item flex-w flex-t">
                                    <div class="header-cart-item-info">
                                        <input type="radio" name="payment" id="card" value="2">
                                    </div>

                                    <div class="header-cart-item-txt p-l-5">
                                        <label for="card" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            Payment with card
                                        </label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <?php if (!empty($_SESSION['cart'])) : ?>
                            <input type="hidden" name="total" value="<?= number_format($cartTotal, 2) ?>">
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    $<?= number_format($cartTotal, 2) ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    $0
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (isset($_SESSION['id'])) : ?>
                        <input type="hidden" name="iduser" value="<?= $_SESSION['id'] ?>">
                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="btn-checkout">
                            Place Order
                        </button>
                    <?php else : ?>
                        <div class="flex-w flex-t p-b-33">
                            <span class="mtext-101 cl2">
                                You must <a href="/login">log in</a> to make a purchase
                            </span>
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" disabled>
                            Place Order
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</form>