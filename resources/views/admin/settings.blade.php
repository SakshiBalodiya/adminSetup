@include('layout.header')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">

                <div class="card" id="profile_card">
                    <div class="card-body p-4">
                        <div class="my-4 text-center">
                            <h5>{{ Auth::user()->name }}</h5>

                        </div>
                        <form method="post" action="{{ route('settings.update') }}" class="row g-3">
                            @csrf
                            <div class="col-12  my-3">
                                <label for="input25" class="form-label">Old Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="password" class="form-control" id="oldpassword" name ="oldpassword"
                                        value="" placeholder="Old Password" required>
                                </div>
                                @if ($errors->has('oldpassword'))
                                    <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                                @endif
                            </div>
                            <div class="col-12  my-3">
                                <label for="input25" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="password" class="form-control" id="password" name ="password"
                                        value="" placeholder="Password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-12  my-3">
                                <label for="input25" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="password" class="form-control" id="confirmpassword"
                                        name ="confirmpassword" value="" placeholder="Confirm Password" required>
                                </div>
                                @if ($errors->has('confirmpassword'))
                                    <span class="text-danger">{{ $errors->first('confirmpassword') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="d-md-flex justify-content-end">
                                    <input type="text" name="userId" value="{{ $userId }}" hidden />
                                    <button type="submit" value="" class="btn btn-primary px-4">Edit
                                        Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
