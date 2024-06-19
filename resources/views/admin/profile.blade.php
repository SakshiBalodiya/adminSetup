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
                        <form method="post" action="{{ route('profile.update') }}" class="row g-3">
                            @csrf
                            <div class="col-12  my-3">
                                <label for="input25" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="name" name ="name"
                                        value="{{ $users->name }}" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-12  my-3">
                                <label for="input25" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name ="username" id="username"
                                        value="{{ $users->username }}" placeholder="UserName">
                                </div>
                            </div>
                            <div class="col-12  my-3">
                                <label for="input27" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" class="form-control" name ="email"
                                        value="{{ $users->email }}" id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex justify-content-end">
                                    <input type="text" name="id" value="{{ $users->id }}" hidden />
                                    <button type="submit" value="" class="btn btn-primary px-4">Save
                                        Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
