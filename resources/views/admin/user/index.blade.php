@include('layout.header')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-xl-4">
    
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5" placeholder="Search User...">
                                            <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-8">
                                    <form class="float-lg-end">
                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                            <a href="{{ url('adduser') }}" 
                                                class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Add
                                                User</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <hr />
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <div class="p-4 border radius-15">
                                <img src="{{ asset('admin/images/avatars/avatar-1.png') }}" width="110"
                                    height="110" class="rounded-circle shadow" alt="">
                                <h5 class="mb-0 mt-5">Pauline I. Bird</h5>
                                <p class="mb-3">Webdeveloper</p>
                                <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                        class="list-inline-item bg-facebook text-white border-0"><i
                                            class="bx bxl-facebook"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i
                                            class="bx bxl-twitter"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i
                                            class="bx bxl-google"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i
                                            class="bx bxl-linkedin"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6"><a href="#" class="btn btn-outline-primary radius-15"
                                            style="width : 100%;">Edit
                                        </a></div>
                                    <div class="col-xl-6"><a href="#"
                                            class="btn btn-outline-primary radius-15" style="width : 100%;">Delete
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <div class="p-4 border radius-15">
                                <img src="{{ asset('admin/images/avatars/avatar-2.png') }}" width="110"
                                    height="110" class="rounded-circle shadow" alt="">
                                <h5 class="mb-0 mt-5">Ralph L. Alva</h5>
                                <p class="mb-3">UI Developer</p>
                                <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                        class="list-inline-item bg-facebook text-white border-0"><i
                                            class="bx bxl-facebook"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i
                                            class="bx bxl-twitter"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i
                                            class="bx bxl-google"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i
                                            class="bx bxl-linkedin"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6"><a href="#" class="btn btn-outline-primary radius-15"
                                            style="width : 100%;">Edit
                                        </a></div>
                                    <div class="col-xl-6"><a href="#"
                                            class="btn btn-outline-primary radius-15" style="width : 100%;">Delete
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <div class="p-4 border radius-15">
                                <img src="{{ asset('admin/images/avatars/avatar-3.png') }}" width="110"
                                    height="110" class="rounded-circle shadow" alt="">
                                <h5 class="mb-0 mt-5">John B. Roman</h5>
                                <p class="mb-3">Graphic Designer</p>
                                <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                        class="list-inline-item bg-facebook text-white border-0"><i
                                            class="bx bxl-facebook"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i
                                            class="bx bxl-twitter"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i
                                            class="bx bxl-google"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i
                                            class="bx bxl-linkedin"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6"><a href="#" class="btn btn-outline-primary radius-15"
                                            style="width : 100%;">Edit
                                        </a></div>
                                    <div class="col-xl-6"><a href="#"
                                            class="btn btn-outline-primary radius-15" style="width : 100%;">Delete
                                        </a></div>
                                </div>
                                {{-- <div class="d-grid"> <a href="#" class="btn btn-outline-primary radius-15">Contact
                                        Me</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <div class="p-4 border radius-15">
                                <img src="{{ asset('admin/images/avatars/avatar-4.png') }}" width="110"
                                    height="110" class="rounded-circle shadow" alt="">
                                <h5 class="mb-0 mt-5">David O. Buckley</h5>
                                <p class="mb-3">Android Developer</p>
                                <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                        class="list-inline-item bg-facebook text-white border-0"><i
                                            class="bx bxl-facebook"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i
                                            class="bx bxl-twitter"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i
                                            class="bx bxl-google"></i></a>
                                    <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i
                                            class="bx bxl-linkedin"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6"><a href="#" class="btn btn-outline-primary radius-15"
                                            style="width : 100%;">Edit
                                        </a></div>
                                    <div class="col-xl-6"><a href="#"
                                            class="btn btn-outline-primary radius-15" style="width : 100%;">Delete
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
