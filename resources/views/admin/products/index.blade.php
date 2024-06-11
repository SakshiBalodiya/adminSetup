@include('layout.header')
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
                                        <input type="text" class="form-control ps-5" placeholder="Search Product...">
                                        <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                class="bx bx-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                        <a href="ecommerce-add-new-products.html"
                                            class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Add
                                            Product</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            <div class="col">
                <div class="card">
                    <img src="{{ asset('admin/images/products/01.png') }}" class="card-img-top" alt="...">
                    <div class="">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                            <p class="mb-0 float-end fw-bold"><span
                                    class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>
                            <p class="mb-0 ms-auto">4.2(182)</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('admin/images/products/02.png') }}" class="card-img-top" alt="...">
                    <div class="">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                            <p class="mb-0 float-end fw-bold"><span
                                    class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>
                            <p class="mb-0 ms-auto">4.2(182)</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('admin/images/products/03.png') }}" class="card-img-top" alt="...">
                    <div class="">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                            <p class="mb-0 float-end fw-bold"><span
                                    class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>
                            <p class="mb-0 ms-auto">4.2(182)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('admin/images/products/04.png') }}" class="card-img-top" alt="...">
                    <div class="">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                            <p class="mb-0 float-end fw-bold"><span
                                    class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>
                            <p class="mb-0 ms-auto">4.2(182)</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
