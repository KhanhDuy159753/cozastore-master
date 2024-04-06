<?php
$html_get_category = new App\model\Category();
$get_category = $html_get_category->get_category(100);
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add new product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">Add new product</li>
        </ol>
    </div>

    <div class="row align-item-center justify-content-sm-center">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4 ali">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <div class="card-body">
                    <form action="/xl-product-add" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName">Name product</label>
                            <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name product" name="name_product">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPrice">Price product</label>
                            <input type="text" class="form-control" id="exampleInputPrice" placeholder="Enter price" name="price_product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputView">View product</label>
                            <input type="text" class="form-control" id="exampleInputView" aria-describedby="emailHelp" placeholder="Enter view product" name="view_product">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bestseller select</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="bestseller_select">
                                <option>0</option>
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlCategory">Category select</label>
                            <select class="form-control" id="exampleFormControlCategory" name="category_select">
                                <?php foreach ($get_category as $cate) : ?>
                                    <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="inputimg">Choose file</label>
                                <input type="file" class="custom-file-input" id="inputimg" name="product_image">
                            </div>
                            <img class="w-50 h-50" id="profileImage">
                        </div>

                        <button type="submit" class="btn btn-primary" name="submitproduct">Submit</button>
                    </form>
                </div>
            </div>
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
    </div>
</div>
<script>
    let img = document.getElementById('profileImage');
    let input = document.getElementById('inputimg');

    input.onchange = (e) => {
        if (input.files[0]) {
            img.src = URL.createObjectURL(input.files[0]);
        }
    }
</script>