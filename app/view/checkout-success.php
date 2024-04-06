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
            Checkout
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">

            <div class="col-sm-10 col-lg-7 col-xl-7 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Payment successful!
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                    </h4>

                    <?php foreach ($one_bill_id as $bi) : ?>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Transaction ID:
                                </span>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    #<?php echo $bi['orderer_code'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Date:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    <?php echo $bi['bookingDate'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Payment Method:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    <?php if ($bi['payment'] == 1) echo 'Cash on delivery';
                                    else if ($bi['payment'] == 2) echo 'Payment with card'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    Free
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Total Payment:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    $ <?php echo $bi['total'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-121 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-103 cl6 p-t-2">
                                    The payment has been done successful, Thanks you for being there with us.
                                </p>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            <a class="text-white" href="/shop">Continue shoping</a>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>