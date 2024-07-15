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
                                                placeholder="Search Staff Name">
                                            <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($attendance as $attendances)
                                        <tr>
                                            <td class="text_capitalize">{{$attendances->name}}</td>
                                            <td class="text_capitalize">{{date('d-m-Y', strtotime($attendances->created_at))}}</td>
                                            <td class="text_capitalize">{{$attendances->date_time}}</td>
                                            <td class="text_capitalize">{{$attendances->status}}</td>
                                        </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
