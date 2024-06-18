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
                                    method="post" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">First name<span>*</span></label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="firstname" class="form-control"
                                                id="validationCustom01" value="" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="form-label">Last name<span>*</span></label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="lastname" class="form-control"
                                                id="validationCustom02" value="" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Username<span>*</span></label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-user"></i></span>
                                            <input type="text" name="username" class="form-control"
                                                id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                                required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                        @if ($errors->has('username'))
                                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                                    @endif
                                    </div>
                                    <div class="col-md-6">

                                        <label for="validationCustomUsername" class="form-label">Email<span>*</span></label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control"
                                                id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                                required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Phone
                                            Number<span>*</span></label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-phone"></i></span>
                                            <input type="tel" maxlength="10" name="mobileNo" class="form-control"
                                                id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                                required>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustomUsername" class="form-label">Image<span>*</span></label>
                                        <input id="image-uploadify" type="file" name="image" class="form-control"
                                            id="inputGroupFile01" aria-label="default input example"
                                            accept=".jpg,.jpeg,.png" required>
                                    </div>

                                    {{-- <input type="file" name="image" class="form-control" id="inputGroupFile01"  accept=".jpg,.jpeg,.png"> --}}
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Password<span>*</span></label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="password" class="form-control"
                                                id="input4" required>
                                        </div>
                                        <div id="password-warning" class="text-warning" style="display:none">
                                            Password should be at least 8 characters long.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Confirm Password<span>*</span></label>
                                        <div class="input-group"> <span class="input-group-text"
                                                id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
                                            <input type="password" name="confirmpassword" class="form-control"
                                                id="input5" required>
                                        </div>
                                        <div id="confirm-password-warning" class="text-warning" style="display:none">
                                            Passwords do not match.
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
