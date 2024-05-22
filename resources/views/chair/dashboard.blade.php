<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>College Dean Dashboard</title>
        <script src="https:cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

        <style>
            @font-face {
                font-family: 'Aston Script';
                src: {{asset('assets/aston-script.woff')}};
            }
            .custom-scroller {
                &::-webkit-scrollbar {
                    width: 20px;
                }
                &::-webkit-scrollbar-track {
                    box-shadow: inset 0 0 5px grey;
                }
                &::-webkit-scrollbar-thumb {
                    background: rgb(85, 39, 255);
                }
                &::-webkit-scrollbar-thumb:hover {
                    background: rgb(0, 34, 100);
                }
            }
            .custom-scroller-small {
                &::-webkit-scrollbar {
                    width: 12px;
                }
                &::-webkit-scrollbar-track {
                    box-shadow: inset 0 0 3px grey;
                }
                &::-webkit-scrollbar-thumb {
                    background: rgb(114, 116, 243);
                }
                &::-webkit-scrollbar-thumb:hover {
                    background: rgb(20, 47, 99);
                }
            }
        </style>
    </head>
    <body class="selection:bg-amber-50 selection:text-amber-600 custom-scroller">
        <main class="tracking-wide min-h-screen bg-indigo-50 overflow-x-hidden cursor-default text-indigo-800">
            <header class="flex flex-row bg-white grid grid-cols-12 items-center border-b border-indigo-800 pl-1 pr-6">
                <!-- Menubar -->
                <div class="ml-6 col-span-2">
                    <button class="hover:bg-amber-50 p-2 rounded hover:text-amber-600 active:bg-amber-300">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                        </svg>                      
                    </button>
                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-1.5 lg:col-span-3">
                    <img class="hidden lg:block h-12 w-auto selection:bg-transparent" alt="PLM Logo" src="{{ asset('assets/plm-logo--with-header.png') }}"/>
                    <img class="lg:hidden block h-8 w-8" src="{{ asset('assets/plm-logo.png') }}"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-7 lg:col-span-5 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-12 w-12" src="{{ asset('assets/osdslogo.png') }}" title="OSDS Logo"/>
                    <h1 class="text-sm lg:text-xl font-light">The Office of Student Development and Services</h1>
                    <img class="lg:hidden h-8 w-8" src="{{ asset('assets/osdslogo.png') }}"/>
                </div>
                <div class="text-xs lg:text-sm font-light text-right border-l border-indigo-300 col-span-2">
                    <!-- Date and Time -->
                    <p id="weekday"></p>
                    <p id="date"></p>
                    <p id="time"></p>
                </div>

                <!-- Date and Time Script -->
                <script>
                    function updateDateTime() {
                        var currentDateTime = new Date();
                        var weekday = {weekday:'long'};
                        var options = {year:'numeric', month:'long', day:'numeric'};
                        var dateString = currentDateTime.toLocaleString('en-PH',options);
                        var weekDayString = currentDateTime.toLocaleString('en-PH',weekday);
                        var timeString = currentDateTime.toLocaleTimeString();
                        document.getElementById("weekday").innerHTML = weekDayString;
                        document.getElementById("date").innerHTML = dateString;
                        document.getElementById("time").innerHTML = timeString;
                    }
                    setInterval(updateDateTime,1000);
                    updateDateTime();

                    function showComplaintDetails(row) {
                        // Retrieve the data
                        const complaintId = row.dataset.complaintId;
                        const complainantId = row.dataset.complainantId;
                        const complainantName = row.dataset.complainantName;
                        const complaineeId = row.dataset.complaineeId;
                        const complaineeName = row.dataset.complaineeName;
                        const apprehensionDate = row.dataset.apprehensionDate;
                        const apprehensionTime = row.dataset.apprehensionTime;
                        const location = row.dataset.location;
                        const natureAndCause = row.dataset.natureAndCause;
                        const submissionDate = row.dataset.submissionDate;
                        const status = row.dataset.status;

                        // Add it to the modal
                        const modalBody = document.querySelector('#complaintModal .modal-body');
                        modalBody.innerHTML = `
                            <p>Complaint ID: ${complaintId}</p>
                            <p>Complainant ID: ${complainantId}</p>
                            <p>Complainant Name: ${complainantName}</p>
                            <p>Complainee ID: ${complaineeId}</p>
                            <p>Complainee Name: ${complaineeName}</p>
                            <p>Apprehension Date: ${apprehensionDate}</p>
                            <p>Apprehension Time: ${apprehensionTime}</p>
                            <p>Location: ${location}</p>
                            <p>Nature and Cause: ${natureAndCause}</p>
                            <p>Submission Date: ${submissionDate}</p>
                            <p>Status: ${status}</p>
                        `;

                        // Show the modal
                        $('#complaintModal').modal('show');
                    }

                    function filterCases() {
                        // Get the search term
                        const searchTerm = document.querySelector('#searchField').value.toLowerCase();

                        // Get all the table rows
                        const rows = document.querySelectorAll('tr');

                        // Loop through the rows
                        for (let i = 0; i < rows.length; i++) {
                            // Get the row text
                            const rowText = rows[i].textContent.toLowerCase();

                            // If the row text includes the search term, show the row, otherwise hide it
                            if (rowText.includes(searchTerm)) {
                                rows[i].style.display = '';
                            } else {
                                rows[i].style.display = 'none';
                            }
                        }
                    }
                </script>
            </header>
            <article class="grid grid-cols-6">
                <aside class="bg-indigo-800 custom-scroller text-white h-screen relative">
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.file-complaint') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">File a Complaint</p>
                        <p class="lg:hidden text-xs">Report</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.inbox') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Inbox</p>
                    </button>

                    <form method="POST" action="/logout">
                        @csrf
                        <button class="hover:bg-red-200 hover:text-red-600 active:bg-red-400 active:font-semibold flex flex-row items-center justify-center w-full p-4 space-x-2 mt-64" onclick="location.href='login-page.html'">
                            <svg class="h-5 w-5" viewBox="0 0 64 64" fill="currentColor">
                                <path fill-rule="evenodd" d="m34,44h6v12H10V8h30v12h-6v-6h-18v36h18v-6Zm15.24-25l-4.24,4.24,5.76,5.76h-16.76v6h16.76l-5.76,5.76,4.24,4.24,13-13-13-13Z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-xs lg:text-base">Log Out</p>
                        </button>
                    </form>
                    <div class="absolute bottom-1 left-2">
                        <p class="text-xs font-thin text-indigo-300">Discipline Module</p>
                    </div>
                </aside>
                <div class="col-span-5">
                    <div class="bg-white border-b border-indigo-800 py-6 px-4">
                        <p class="text-center text-3xl font-thin tracking-widest">Welcome</p>
                        
                        <div class="text-xs lg:text-sm tracking-widest mt-6 flex justify-center space-x-20">
                                <div class="text-sm text-amber-600 selection:text-indigo-600 selection:bg-indigo-50">
                                
                                    <p>Dean Name:</p>
                                    <p>Role: </p>
                                    <p>College:</p>
                                
                                </div>
                                <div class="font-light">
                                    @foreach ($employees as $employee )
                                    <p class="text"> {{ $employee->first_name }} {{ $employee->last_name }}</p>
                                    <p> {{ $employee->designation }}</p>
                                    <p> {{ $employee->department }}</p>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                     <div style="animation-name:slide-in; animation-duration:1s;" class="bg-white min-h-96 border-y border-indigo-800 mt-6 p-6">
                        <div class="flex tracking-widest justify-between mb-6">
                            <div>
                                <p class="text-xl font-sans font-light">Complaints List</p>
                                <p class="text-xs font-sans font-thin">Hover table to inspect the complaint</p>
                            </div>
                            <div class="mr-20 flex items-center">
                                <input id="searchField" type="search" placeholder="Search students..." class="w-64 placeholder:text-indigo-300 h-full text-amber-600 selection:text-indigo-50 selection:text-indigo-800 focus:outline-none border border-indigo-300 focus:border-indigo-800 px-2 placeholder:text-xs placeholder:tracking-widest text-xs"/>
                                <button id="searchButton" class="p-3 h-full border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200" onclick="filterCases()">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>                                      
                                </button>
                            </div>
                        </div>
                        <div class="custom-scroller-small max-h-96 overflow-y-auto">
                            <label class="bg-indigo-600 text-white grid grid-cols-5 m-0">
                                <p class="p-1 text-center">Complaint ID</p>
                                <p class="p-1 text-center">Complainant ID</p>
                                <p class="p-1 text-center">Complainant Name</p>
                                <p class="p-1 text-center">Nature and Cause</p>
                                <p class="p-1 text-center">Submission Date</p>
                            </label>
                            <table class="table table-fixed w-full border border-indigo-300 text-sm font-thin text-indigo-800">
                                <tbody class="text-center">
                                    @foreach($complaints as $complaint)
                                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" 
                                                title="Click to see details"
                                                data-complaint-id="{{ $complaint->complaint_id }}"
                                                data-complainant-id="{{ $complaint->complainant_id }}"
                                                data-complainant-name="{{ $complaint->complainant_name }}"
                                                data-complainee-id="{{ $complaint->complainee_id }}"
                                                data-complainee-name="{{ $complaint->complainee_name }}"
                                                data-apprehension-date="{{ $complaint->apprehension_date }}"
                                                data-apprehension-time="{{ $complaint->apprehension_time }}"
                                                data-location="{{ $complaint->location }}"
                                                data-nature-and-cause="{{ $complaint->nature_and_cause }}"
                                                data-submission-date="{{ $complaint->submission_date }}"
                                                data-status="{{ $complaint->status }}"
                                                onclick="showComplaintDetails(this)">
                                            <td>{{ $complaint->complaint_id }}</td>
                                            <td>{{ $complaint->complainant_id }}</td>
                                            <td>{{ $complaint->complainant_name }}</td>
                                            <td>{{ $complaint->nature_and_cause }}</td>
                                            <td>{{ $complaint->submission_date }}</td>
                                        </tr>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </main>
            <div class="modal fade" id="complaintModal" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel" aria-hidden="true" class="border border-amber-600 selection:text-indigo-800 text-amber-600 selection:bg-indigo-50 text-sm">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="complaintModalLabel" class="text-2xl font-thin tracking-widest">Complaint Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body grid grid-cols-2">
                      <!-- Complaint details will go here -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50 hover:text-indigo-800 active:bg-indigo-200 active:font-semibold p-1.5" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        </body>
    </html>