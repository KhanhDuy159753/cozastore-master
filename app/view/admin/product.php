<?php
$html_get_all_product = new App\model\Product();
$html_all_product = $html_get_all_product->get_product(100);

$sanpham_trang = 4;

$tong_trang = ceil(count($html_all_product) / $sanpham_trang);
$trang_hientai = isset($_GET['page']) ? $_GET['page'] : 1;

$start_index = ($trang_hientai - 1) * $sanpham_trang;
$end_index = $start_index + $sanpham_trang;

$ds_sanpham_trang = array_slice($html_all_product, $start_index, $sanpham_trang);
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">See all product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">See all product</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All product</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>View</th>
                                <th>Bestseller</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ds_sanpham_trang as $pro) : ?>
                                <tr>
                                    <td><a href="#"><?= $pro['id'] ?></a></td>
                                    <td><?= $pro['name'] ?></td>
                                    <?php if ($pro['img'] == null) : ?>
                                        <td><img src="" alt="No images" width="60"></td>
                                    <?php else : ?>
                                        <td><img src="public/assets/images/product/<?= $pro['img'] ?>" width="60"></td>
                                    <?php endif; ?>
                                    <td>$<?= $pro['price'] ?></td>
                                    <td><?= $pro['view'] ?></td>
                                    <?php if ($pro['bestseller'] == 1) : ?>
                                        <td><span class="badge badge-success">Yes</span></td>
                                    <?php else : ?>
                                        <td><span class="badge badge-danger">No</span></td>
                                    <?php endif; ?>
                                    <td><?= $pro['category_name'] ?></td>
                                    <td>
                                        <a href="/admin-product-edit?edit=<?= $pro['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="/admin-product-delete?del=<?= $pro['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (count($ds_sanpham_trang) == 0) : ?>
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-danger" role="alert">
                                            No product
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center mt-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $tong_trang; $i++) : ?>
                                    <li class="page-item <?= $i == $trang_hientai ? 'active' : '' ?> p-0">
                                        <a class="page-link" href="/admin-product?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
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