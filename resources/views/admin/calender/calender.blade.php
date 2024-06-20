@include('layout.header')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
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
            <form method="POST" action="{{ route('calender.store') }}" id="holiday">
                @csrf
                <input type="hidden" name="selected_date" id="selectedDateInput">
                <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dateModalLabel">Selected Date</h5>
                                {{-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                            </div>
                            <div class="modal-body">
                                You selected <span id="modalDate"></span>. Mark this date as a holiday?
                            </div>
                            <div class="row justify-center">
                                <div class="col-6 mb-3">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="confirmHolidayButton">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" data-bs-backdrop="static"
                aria-labelledby="dayModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="dayModalLabel">Selected Date</h5> --}}
                            {{-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                        </div>
                        <div class="modal-body">
                            <span id="modalDay"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirmButton">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
                data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                        </div>
                        <div class="modal-body">
                            <span id="modalDayRemove"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="confirmRemove">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin/plugins/fullcalendar/js/main.min.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var holidays = @json($holidays);
        var selectedDateElement;
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            customButtons: {
                add_saturday: {
                    click: function() {
                        var checkboxnew = document.getElementById('saturdayCheckboxnew');
                        if (checkboxnew) {
                            checkboxnew.checked = !checkboxnew.checked;
                        }
                        if (checkboxnew.checked) {
                            toggleDayClass('fc-day-sat', 'fc-day-saturday');
                        } else {
                            removeDayClass('fc-day-sat', 'fc-day-saturday');
                        }
                    }
                },
                add_sunday: {
                    click: function() {
                        var checkboxnew = document.getElementById('sundayCheckboxnew');

                        if (checkboxnew) {
                            checkboxnew.checked = !checkboxnew.checked;
                        }
                        if (checkboxnew.checked) {
                            toggleDayClass('fc-day-sun', 'fc-day-sunday');
                        } else {
                            removeDayClass('fc-day-sun', 'fc-day-sunday');
                        }
                    }
                },
                add_alternate: {
                    click: function() {
                        var checkboxnew = document.getElementById('alternateCheckboxnew');

                        if (checkboxnew) {
                            checkboxnew.checked = !checkboxnew.checked;
                        }

                        if (checkboxnew.checked) {
                            toggleDayClass('fc-day-sat', 'fc-day-alternate', true);
                        } else {
                            removeDayClass('fc-day-sat', 'fc-day-alternate');
                        }
                    }
                }
            },
            headerToolbar: {
                left: 'prev, next, today',
                center: 'title',
                right: 'add_saturday, add_sunday, add_alternate',

            },
            initialView: 'dayGridMonth',
            datesSet: function() {
                addCheckboxes();
            },
            showNonCurrentDates: false,
            initialDate: new Date(),
            nowIndicator: true,
            dayMaxEvents: true,
            editable: false,
            button: true,
            dayMaxEvents: true,
        
            events: holidays.map(function(holiday) {
                return {
                    title: holiday.name,
                    start: holiday.date
                };
            }),

            // Toggle
            dayCellContent: function(arg) {

                var switchInput = document.createElement('input');
                switchInput.setAttribute('type', 'checkbox');
                switchInput.id = 'test';
                switchInput.classList.add('form-check-input');
                var formattedDate = arg.date.toLocaleString("fr-CA").slice(0, 10);
                console.log(holidays)
                // console.log(newholiday,'newholiday');
                // console.log(formattedDate,'formattedDatenew')
                if (holidays.some(h => h.date === formattedDate)) {
                    switchInput.checked = true;
                    setTimeout(function() {
                        var tdElement = switchInput.closest('.fc-daygrid-day');
                        tdElement.classList.add('selected-date');
                    }, 0);
                }
                switchInput.addEventListener('change', function() {
                    var tdElement = switchInput.closest('.fc-daygrid-day', );
                    if (this.checked) {
                        var formattedDate = arg.date.toLocaleString("en-IN").slice(0, 10);
                        console.log(formattedDate)
                        var selectedDate = formattedDate;

                        document.getElementById('modalDate').textContent = formattedDate;
                        selectedDateElement = tdElement;
                        // Store the selected date element
                        console.log(selectedDateElement, 'selectedDateElement');
                        $('#dateModal').modal('show');

                    } else {
                        if (tdElement) {
                            tdElement.classList.remove('selected-date');
                        }
                    }
                });
                var label = document.createElement('label');
                label.classList.add(
                    'form-check-label');
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

        // Holiday modal
        document.getElementById('confirmHolidayButton').addEventListener('click', function() {

            console.log('Ok button clicked');
            console.log('selectedDateElement:', selectedDateElement);



            if (selectedDateElement) {
                let selectedDate = selectedDateElement.getAttribute('data-date');

                console.log('Selected date:', selectedDate);



                console.log('Adding holiday class');

                document.getElementById('selectedDateInput').value = selectedDate;
                selectedDateElement.classList.add('selected-date');
                $('#dateModal').modal('hide');

            } else {
                console.error('selectedDateElement is not defined');
            }

        });

        // Custom button selected
        function toggleDayClass(dayClass, customClass, alternate = false) {
            var days = document.querySelectorAll('.' + dayClass);

            var modalDateSpan = document.getElementById('modalDay');
            if (dayClass === 'fc-day-sat' && customClass === 'fc-day-saturday') {
                modalDateSpan.textContent = 'Mark all Saturdays as non-working days.';
            } else if (dayClass === 'fc-day-sun' && customClass === 'fc-day-sunday') {
                modalDateSpan.textContent = 'Mark all Sundays as non-working days.';
            } else if (dayClass === 'fc-day-sat' && customClass === 'fc-day-alternate') {
                modalDateSpan.textContent = 'Mark alternate Saturdays as non-working days.';
            }
            $('#dayModal').modal('show');
            var confirmButton = document.getElementById('confirmButton');
            var newConfirmButton = confirmButton.cloneNode(true);
            confirmButton.parentNode.replaceChild(newConfirmButton, confirmButton);
            newConfirmButton.addEventListener('click', function() {

                days.forEach((day, index) => {

                    if (alternate) {
                        console.log('alternate');
                        if (index % 2 === 0) {

                            day.classList.add('fc-day-alternate');
                            day.classList.remove('fc-day-regular', 'fc-day-saturday');


                            if (day.classList.contains('saturday')) {
                                day.classList.add('fc-day-alternate-saturday');
                            }

                            var checkbox = day.querySelector('.form-check-input');
                            if (checkbox) {
                                checkbox.checked = true;
                            }
                            var checkboxnew = document.getElementById('saturdayCheckboxnew');
                            if (checkboxnew) {
                                checkboxnew.checked = false;
                            }
                        } else {

                            day.classList.add('fc-day-regular');
                            day.classList.remove('fc-day-alternate',
                                'fc-day-alternate-saturday');
                            var checkbox = day.querySelector('.form-check-input');
                            if (checkbox) {
                                checkbox.checked = false;
                            }
                            // If it's Saturday, ensure it has the Saturday class
                            if (day.classList.contains('saturday')) {
                                day.classList.add('fc-day-saturday');

                            }
                            // var checkboxnew = document.getElementById('alternateCheckboxnew');
                            // if (checkboxnew) {
                            //     checkboxnew.checked = false;
                            // }
                        }
                        // Toggle the checkbox

                    } else {
                        day.classList.toggle(customClass);
                        var checkbox = day.querySelector('.form-check-input');
                        $('#dayModal').modal('show');
                        day.classList.remove('fc-day-regular');
                        // day.classList.add('fc-day-saturday');

                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    }

                });
                $('#dayModal').modal('hide');
            });

        }

        // Adding checkbox on custom button
        function addCheckboxes() {

            var saturdayButton = document.querySelector('.fc-add_saturday-button');
            if (saturdayButton && !saturdayButton.querySelector('input')) {
                var saturdayCheckboxnew = document.createElement('input');
                saturdayCheckboxnew.type = 'checkbox';
                saturdayCheckboxnew.id = 'saturdayCheckboxnew';
                saturdayButton.innerHTML = '';
                saturdayButton.appendChild(saturdayCheckboxnew);
                saturdayButton.appendChild(document.createTextNode(' Saturday'));


            }


            var sundayButton = document.querySelector('.fc-add_sunday-button');
            if (sundayButton && !sundayButton.querySelector('input')) {
                var sundayCheckboxnew = document.createElement('input');
                sundayCheckboxnew.type = 'checkbox';
                sundayCheckboxnew.id = 'sundayCheckboxnew';
                sundayButton.innerHTML = '';
                sundayButton.appendChild(sundayCheckboxnew);
                sundayButton.appendChild(document.createTextNode(' Sunday'));
            }

            // Add checkbox for Alternate Saturday button
            var alternateButton = document.querySelector('.fc-add_alternate-button');
            if (alternateButton && !alternateButton.querySelector('input')) {
                var alternateCheckboxnew = document.createElement('input');
                alternateCheckboxnew.type = 'checkbox';
                alternateCheckboxnew.id = 'alternateCheckboxnew';
                alternateButton.innerHTML = '';
                alternateButton.appendChild(alternateCheckboxnew);
                alternateButton.appendChild(document.createTextNode(' Alternate Saturday'));
            }
        }

        // Remove custom button dates
        function removeDayClass(dayClass, toggleClass) {

            var modalDate = document.getElementById('modalDayRemove');
            if (dayClass === 'fc-day-sat' && toggleClass === 'fc-day-saturday') {
                modalDate.textContent = 'Do you want to remove the selected Saturday?'
            } else if (dayClass === 'fc-day-sun' && toggleClass === 'fc-day-sunday') {
                modalDate.textContent = '    Do you want to remove the selected Sunday?';
            } else if (dayClass === 'fc-day-sat' && toggleClass === 'fc-day-alternate') {
                modalDate.textContent = 'Do you want to remove the alternate Saturday?';
            }
            $('#confirmModal').modal('show');
            document.getElementById('confirmRemove').onclick = function() {
                var days = document.querySelectorAll('.' + dayClass);
                days.forEach(function(day) {
                    day.classList.remove(toggleClass);
                    var checkbox = day.querySelector('.form-check-input');

                    if (checkbox) {
                        checkbox.checked = false;
                    }

                });
                $('#confirmModal').modal('hide');
            }
        }

    });
</script>
