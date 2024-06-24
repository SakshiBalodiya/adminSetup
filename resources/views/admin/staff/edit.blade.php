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
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-user"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr />
                    <h6 class="mb-0 text-uppercase"></h6>

                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form class="row g-3 needs-validation" action="{{ route('editstaff.update') }}"
                                    method="post" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">First name</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" name="firstname"
                                                id="validationCustom01" value="{{ $staff->firstname }}">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="form-label">Last name</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" name="lastname"
                                                id="validationCustom02" value="{{ $staff->lastname }}">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" name="username"
                                                id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                                value="{{ $staff->username }}">
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Email</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend">@</span>
                                            <input type="email" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" name="email"
                                                value="{{ $staff->email }}">
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Password</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="password" class="form-control"
                                            id="input4">

                                        </div>
                                        <div id="password-warning" class="text-warning" style="display:none">
                                            Password should be at least 8 characters long.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Confirm Password</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="confirmpassword" class="form-control"
                                            id="input5">
                                        </div>
                                        <div id="confirm-password-warning" class="text-warning" style="display:none">
                                            Passwords do not match.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Phone Number</label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-phone"></i></span>
                                            <input type="tel" maxlength="10" class="form-control"
                                                name="mobileNo" value="{{ $staff->mobileNo }}"
                                                id="validationCustomUsername" aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image"
                                            value="{{ $staff->image }}" id="inputGroupFile01"
                                            accept=".jpg,.jpeg,.png">
                                        <p> <img src="{{ $staff->image }}" width="110" height="110"
                                                class="rounded-circle shadow" alt=""></p>
                                    </div>
                                    <div class="col-12 btn-align">
                                        <input type="text" value="{{ $staff->id }}" name="id" hidden>
                                        <button class="btn btn-primary" type="submit"
                                            value="{{ $staff->id }}">Edit Staff</button>
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
<script>
    $(document).ready(function() {
        $('#input4').on('input', function() {
            var password = $(this).val();
            var passwordLength = password.length;

            if (passwordLength < 8) {
                $('#password-warning').show();
            } else {
                $('#password-warning').hide();
            }
        });
    });
    $(document).ready(function() {
        $('#input4, #input5').on('input', function() {
            var password = $('#input4').val();
            var confirmPassword = $('#input5').val();

            if (password !== confirmPassword) {
                $('#confirm-password-warning').show();
            } else {
                $('#confirm-password-warning').hide();
            }
        });
    });
</script>
