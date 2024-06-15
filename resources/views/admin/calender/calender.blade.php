@include('layout.header')
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
                            You selected <span id="modalDate"></span>. Mark this date as a holiday?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirmHolidayButton">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="dayModalLabel"
                aria-hidden="true">
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
                            <button type="button" class="btn btn-primary" id="confirmButton"
                                data-bs-dismiss="modal">Ok</button>
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
        var selectedDateElement;
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            customButtons: {
                add_saturday: {
                    text: 'Saturday',
                    click: function() {
                        var checkboxnew = document.getElementById('saturdayCheckboxnew');
                        if (checkboxnew) {
                            checkboxnew.checked = true;
                        }
                        toggleDayClass('fc-day-sat', 'fc-day-saturday');
                    }
                },
                add_sunday: {
                    text: 'Sunday',
                    click: function() {
                        var checkboxnew = document.getElementById('sundayCheckboxnew');
                        toggleDayClass('fc-day-sun', 'fc-day-sunday');
                        if (checkboxnew) {
                            checkboxnew.checked = true;
                        }
                    }
                },
                add_alternate: {
                    text: 'Alternate Saturday',
                    click: function() {
                        var checkbox = document.getElementById('alternateCheckbox');
                        toggleDayClass('fc-day-sat', 'fc-day-alternate-saturday', checkbox.checked,
                            true);
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
                switchInput.id = 'test';
                switchInput.classList.add('form-check-input');

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
                container.classList.add(
                    'form-check', 'form-switch');
                container.appendChild(
                    switchInput);
                container.appendChild(label);

                return {
                    domNodes: [container]
                };
            }
        });

        calendar.render();
        document.getElementById('confirmHolidayButton').addEventListener('click', function() {
            console.log('Ok button clicked');
            console.log('selectedDateElement:', selectedDateElement);

            if (selectedDateElement) {
                console.log('Adding holiday class');
                selectedDateElement.classList.add('selected-date');
                $('#dateModal').modal('hide');
            } else {
                console.error('selectedDateElement is not defined');
            }
        });


        function toggleDayClass(dayClass, customClass, alternate) {
            var days = document.querySelectorAll('.' + dayClass);

            var modalDateSpan = document.getElementById('modalDay');
            if (dayClass === 'fc-day-sat' && customClass === 'fc-day-saturday') {
                modalDateSpan.textContent = 'Mark all Saturdays as non-working days.';
            } else if (dayClass === 'fc-day-sun' && customClass === 'fc-day-sunday') {
                modalDateSpan.textContent = 'Mark all Sundays as non-working days.';
            } else if (dayClass === 'fc-day-sat' && customClass === 'fc-day-alternate-saturday') {
                modalDateSpan.textContent = 'Mark alternate Saturdays as non-working days.';
            }
            $('#dayModal').modal('show');
            var confirmButton = document.getElementById('confirmButton');
            var newConfirmButton = confirmButton.cloneNode(true);
            confirmButton.parentNode.replaceChild(newConfirmButton, confirmButton);
            newConfirmButton.addEventListener('click', function() {
                days.forEach((day, index) => {
                    if (alternate) {
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

                        } else {
                            // var saturdayButton = document.querySelector(
                            //     '.fc-add_saturday-button');
                            // var sundayButton = document.querySelector('.fc-add_sunday-button');

                            // if (saturdayButton && !saturdayButton.querySelector('input')) {
                            //     var saturdayCheckbox = document.createElement('input');
                            //     saturdayCheckbox.type = 'checkbox';
                            //     if (checkbox) {
                            //         checkbox.checked = true;
                            //     }
                            // }

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
                        }
                        // Toggle the checkbox

                    } else {
                        day.classList.toggle(customClass);
                        var checkbox = day.querySelector('.form-check-input');
                        $('#dayModal').modal('show');
                        day.classList.remove('fc-day-regular');
                        day.classList.add('fc-day-saturday');

                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    }

                });
                $('#dayModal').modal('hide');
            });

        }

        function addCheckboxes() {
            // Add checkbox for Saturday button
            var saturdayButton = document.querySelector('.fc-add_saturday-button');
            if (saturdayButton && !saturdayButton.querySelector('input')) {
                var saturdayCheckboxnew = document.createElement('input');
                saturdayCheckboxnew.type = 'checkbox';
                saturdayCheckboxnew.id = 'saturdayCheckboxnew';
                saturdayButton.innerHTML = '';
                saturdayButton.appendChild(saturdayCheckboxnew);
                saturdayButton.appendChild(document.createTextNode(' Saturday'));

            }

            // Add checkbox for Sunday button
            var sundayButton = document.querySelector('.fc-add_sunday-button');
            if (sundayButton && !sundayButton.querySelector('input')) {
                var sundayCheckboxnew = document.createElement('input');
                sundayCheckboxnew.type = 'checkbox';
                sundayCheckboxnew.id = 'sundayCheckboxnew';
                sundayButton.innerHTML = '';
                sundayButton.appendChild(sundayCheckboxnew);
                sundayButton.appendChild(document.createTextNode('Sunday'));
            }

            // Add checkbox for Alternate Saturday button
            var alternateButton = document.querySelector('.fc-add_alternate-button');
            if (alternateButton && !alternateButton.querySelector('input')) {
                var alternateCheckbox = document.createElement('input');
                alternateCheckbox.type = 'checkbox';
                alternateCheckbox.id = 'alternateCheckbox';
                alternateButton.innerHTML = '';
                alternateButton.appendChild(alternateCheckbox);
                alternateButton.appendChild(document.createTextNode(' Alternate Saturday'));
            }
        }


    });
</script>
