@include('layout.header')
<style>
    .selected-date {
        background-color: lightblue;
    }
</style>
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Applications</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dateModalLabel">Selected Date</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            You selected: <span id="modalDate"></span>. Mark this date as a holiday?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirmHolidayButton"
                                data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
        </div>
    </div>
</div>
<script src="{{ asset('admin/plugins/fullcalendar/js/main.min.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectedDateElement;
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            customButtons: {
                add_event: {
                    text: 'Weekend Off',
                    click: function() {
                        alert();
                    }
                }
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'add_event',
                
            },
            initialView: 'dayGridMonth',
            initialDate: new Date(),
            // navLinks: true, // can click day/week names to navigate views
            // selectable: true,
            nowIndicator: true,
            dayMaxEvents: true,
            editable: true,
            // selectable: true,
            // businessHours: true,
            button: true,
            dayMaxEvents: true,
            events: [],
            dayCellContent: function(arg) {

                var switchInput = document.createElement('input');
                switchInput.setAttribute('type', 'checkbox');
                switchInput.classList.add('form-check-input');

                switchInput.addEventListener('change', function() {
                    if (this.checked) {
                        var formattedDate = arg.date.toISOString().split('T')[
                            0]; // 'YYYY-MM-DD' format
                        var selectedDate = formattedDate;
                        document.getElementById('modalDate').textContent = arg.date;
                        selectedDateElement = arg.date;
                        // Store the selected date element
                        console.log(selectedDateElement, 'selectedDateElement');
                        $('#dateModal').modal('show');
                    }
                });


                var label = document.createElement('label');
                label.classList.add('form-check-label');
                label.textContent = arg.dayNumberText;

                var container = document.createElement('div');
                container.classList.add('form-check', 'form-switch');
                container.appendChild(switchInput);
                container.appendChild(label);

                return {
                    domNodes: [container]
                };
            }
        });

        calendar.render();

        // document.getElementById('confirmHolidayButton').addEventListener('click', function() {
        //     console.log('Ok button clicked');
        //     if (selectedDateElement) {
        //         console.log('Adding holiday class');
        //         selectedDateElement.classList.add(
        //         'selected-date'); // Ensure that selectedDateElement is defined
        //         $('#dateModal').modal('hide');
        //     }
        // });

        // Custom event listener for changing background color of selected date
        document.getElementById('calendar').addEventListener('change', function(event) {
            var target = event.target;
            if (target.tagName === 'INPUT' && target.type === 'checkbox' && target.checked) {
                var tdElement = target.closest('.fc-day');
                if (tdElement) {
                    tdElement.classList.add('selected-date');
                }
            }
        });


    });
</script>
