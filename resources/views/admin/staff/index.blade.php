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
                                            <input type="text" class="form-control ps-5"
                                                placeholder="Search Staff...">
                                            <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-8">
                                    <form class="float-lg-end">
                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                            <a href="{{ url('addstaff') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                                    class='bx bxs-plus-square'></i>Add
                                                Staff</a>
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
                    @foreach ($staff as $staff)
                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="p-4 border radius-15">
                                    <img src="{{$staff->image}}" width="110"
                                        height="110" class="rounded-circle shadow" alt="">
                                    <h5 class="mb-0 mt-5">{{$staff->name}}</h5>
                                    <p class="mb-0">{{$staff->username}}</p>
                                    <p class="mb-0">{{$staff->mobileNo}}</p>
                                    <p class="mb-3">{{$staff->email}}</p>
                                 
                                    <div class="row">
                                        <div class="col-xl-6"><a href="{{ url('editstaff') }}"
                                                class="btn btn-outline-primary radius-15" style="width : 100%;">Edit
                                            </a></div>
                                        <div class="col-xl-6"><a href="#"
                                                class="btn btn-outline-primary radius-15" style="width : 100%;">Delete
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
          
        </div>
    </div>
</div>
