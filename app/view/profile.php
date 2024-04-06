<div class="container" style="background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 30px; margin-top: 50px; margin-bottom: 50px;">
    <h2 class="mb-4 text-center">Personal Information</h2>
    <form>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['role'])) : ?>
                    <div class="text-center mb-4">
                        <?php if (!isset($_SESSION['img']) || $_SESSION['img'] == null) : ?>
                            <label for="profileImage">
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="profile-image img-fluid rounded-circle" alt="profile-image" id="profileImage" style="max-width: 100%; width: 192px; height: 192px; border-radius: 50%;">
                            </label>
                        <?php else : ?>
                            <label for="img">
                                <img src="public/upload/<?= $_SESSION['img'] ?>" class="profile-image img-fluid rounded-circle" alt="profile-image" id="profileImage" style="max-width: 100%; width: 192px; height: 192px; border-radius: 50%;">
                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="name-below-image" style="text-align: center; margin-top: 10px;">
                        <h5><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></h5>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-8">

                <?php if (isset($_SESSION['role'])) : ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputUsername">Username:</label>
                            <input type="text" class="form-control" id="inputUsername" placeholder="Your Username" readonly value="<?= $_SESSION['username'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputName">First Name:</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Your Name" readonly value="<?= $_SESSION['firstname'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Last Name:</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Your Name" readonly value="<?= $_SESSION['lastname'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone:</label>
                            <input type="tel" class="form-control" id="inputPhone" placeholder="Your Phone" readonly value="<?= $_SESSION['phone'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email:</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Your Email" readonly value="<?= $_SESSION['email'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Address:</label>
                            <textarea class="form-control" id="inputAddress" placeholder="Your Address" readonly><?= $_SESSION['address'] ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) : ?>
                            <a href="/profile-edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Information</a>
                            <a href="/admin" class="btn btn-success"><i class="fa fa-user-circle-o"></i> Admin</a>
                        <?php else : ?>
                            <a href="/profile-edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Information</a>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <a href="/logout" class="btn btn-danger float-right" name="logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>