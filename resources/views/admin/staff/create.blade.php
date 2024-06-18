@include('layout.header')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row">

                <div class="col-xl-10 mx-auto">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3"><a href="{{ url('staff') }}">Staff</a></div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><i class="bx bx-user"></i>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr />
                    <h6 class="mb-0 text-uppercase"></h6>

                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">


                                <form class="row g-3 needs-validation" action="{{ route('addstaff.store') }}"
                                    method="post" novalidate>
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">First name</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="name" class="form-control" id="validationCustom01"
                                                value="" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="form-label">Last name</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="name" class="form-control" id="validationCustom02"
                                                value="" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="username" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Email</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Phone
                                            Number</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-phone"></i></span>
                                            <input type="text" name="mobileNo"  class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Image</label>
                                        <input id="image-uploadify" type="file" name="image" aria-label="default input example"
                                        accept=".jpg,.jpeg,.png" multiple required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Password</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="password" class="form-control" id="validationCustom05"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Confirm Password</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="confirmpassword" class="form-control" id="validationCustom05"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 btn-align">
                                        <button class="btn btn-primary" type="submit">Add Staff</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
</script>
