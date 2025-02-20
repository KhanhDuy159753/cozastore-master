<?php
$html_get_order = new App\model\Bill();
$get_order = $html_get_order->get_all_bill_cart();
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Simple Tables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date Booking</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_order as $key => $value) : ?>
                                <tr>
                                    <td><a href="#">#<?= $value['orderer_code'] ?></a></td>
                                    <td><?= $value['receiver_name'] ?></td>
                                    <td><?= $value['bookingDate'] ?></td>
                                    <td><span class="badge <?php
                                                            if ($value['status'] == 0) {
                                                                echo 'badge-danger';
                                                            } else if ($value['status'] == 1) {
                                                                echo 'badge-info';
                                                            } else if ($value['status'] == 2) {
                                                                echo 'badge-warning';
                                                            } else {
                                                                echo 'badge-success';
                                                            }
                                                            ?>">
                                            <?php if ($value['status'] == 0) {
                                                echo 'Pending';
                                            } else if ($value['status'] == 1) {
                                                echo 'Processing';
                                            } else if ($value['status'] == 2) {
                                                echo 'Shipping';
                                            } else {
                                                echo 'Delivered';
                                            } ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="/admin-order-update" class="btn btn-sm btn-success">Update</a>
                                        <a href="/admin-order-detail?idbill=<?= $value['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>