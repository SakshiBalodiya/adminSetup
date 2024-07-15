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
                                    <div class="row justify-content-end">
                                        <div class="col-3 justify-content-end d-flex">
                                            <a href="{{ url('addstaff') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                                    class='bx bxs-plus-square'></i>Add
                                                Staff</a>
                                        </div>
                                        <div class="col-1 justify-content-end d-flex">
                                            <a href="{{ url('staff/trash') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                                    class='bx bxs-plus-square'></i>Trash</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-2 col-xl-2">
                                    <form class="float-lg-end">
                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                            <a href="{{ url('staff/trash') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                                    class='bx bxs-plus-square'></i>Trash</a>
                                        </div>
                                    </form>
                                </div> --}}
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


                                    <img src="{{ $staff->image }}" width="110" height="110"

                                        class="rounded-circle shadow" alt="">
                                    <h5 class="mb-0 mt-5 text_capitalize">{{ $staff->name }}</h5>
                                    {{-- <p class="mb-0">{{ $staff->username }}</p>
                                    <p class="mb-0">{{ $staff->mobileNo }}</p> --}}
                                    <p class="mb-3">{{ $staff->email }}</p>

                                    <div class="row">
                                        <div class="col-xl-6"><a href="{{ url('staff/' . $staff->id . '/editstaff') }}"
                                                class="btn btn-outline-primary radius-15" style="width : 100%;"><i
                                                    class='bx bxs-edit'></i>
                                            </a></div>
                                        <div class="col-xl-6">
                                            <a type="button" data-delete-id ="{{ $staff->id }}"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                class="btn btn-outline-primary radius-15" style="width : 100%;"><i
                                                    class='bx bxs-trash'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <b>Are you sure you want to delete this?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="#" id="confirm-delete" class="btn btn-danger">Ok</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const staffId = button.getAttribute('data-delete-id');
            const confirmDeleteLink = document.getElementById('confirm-delete');
            confirmDeleteLink.href = `staff/${staffId}/delete`;
        });
    });
</script>
