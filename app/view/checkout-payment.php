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
                        Payment with card
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-121 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-103 cl6 p-t-2">
                                Please pay and then click continue!!
                            </p>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-10 p-b-13">
                        <div class="p-r-18 p-r-0-sm w-full-ssm">
                            <img src="public/assets/images/payment-vcb.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover">
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-27 p-b-33">
                        <div class="header-cart-item-info">
                            <input type="checkbox" name="payment" id="card" value="2">
                        </div>

                        <div class="header-cart-item-txt p-l-5">
                            <label for="card" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                I agree all statements in <a href="#">Terms of service</a>
                            </label>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        <a class="text-white" href="/check-out-success?idbill=<?php echo $idbill = $_REQUEST['idbill'] ?>">Continue shoping</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>