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

                                <div class="col-lg-3 col-xl-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="calendar-icon"><i
                                                    class="bx bx-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control date-range flatpickr-input"
                                            value="2024-06-12 to 2024-06-14" aria-describedby="calendar-icon">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-5">
                                    <form class="float-lg-end">
                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                            <a href="#" 
                                                class="btn btn-primary mb-3 mb-lg-0"><i class='bx bx-cloud-upload'></i>Export</a>
                                        </div>
                                    </form>
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
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Rohan</td>
                                            <td>rohan@7823gmail.com</td>
                                            <td>9382981898</td>
                                            <td><a class="btn btn-primary action_btn"><i class="bx bx-cloud-upload"></i></a>
                                            </td>
                                        </tr>
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
<script src="{{ asset('admin/plugins/datetimepicker/js/legacy.js') }}"></script>
<script src="{{ asset('admin/plugins/datetimepicker/js/picker.js') }}"></script>
<script src="{{ asset('admin/plugins/datetimepicker/js/picker.time.js') }}"></script>
<script src="{{ asset('admin/plugins/datetimepicker/js/picker.date.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
<script
    src="{{ asset('admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}">
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(function() {
        // Calculate the first day of the last month
        var firstDayOfLastMonth = moment().subtract(1, 'months').startOf('month').format('YYYY-MM-DD');
        var currentDate = moment().format('YYYY-MM-DD');

        // Initialize the date picker with restricted date range
        $(".datepicker").flatpickr({
            minDate: firstDayOfLastMonth,
            maxDate: currentDate,
            dateFormat: "Y-m-d"
        });

        // Initialize the time picker
        $(".time-picker").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "Y-m-d H:i",
        });

        // Initialize the date-time picker with restricted date range
        $(".date-time").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: firstDayOfLastMonth,
            maxDate: currentDate,
        });

        // Initialize the date picker with custom display format
        $(".date-format").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        // Initialize the date range picker
        $(".date-range").flatpickr({
            minDate: firstDayOfLastMonth,
            maxDate: currentDate,
            mode: "range",
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        // Initialize the inline date picker
        $(".date-inline").flatpickr({
            inline: true,
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    });
</script>
