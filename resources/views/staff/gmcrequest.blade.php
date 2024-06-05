<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSDS GMC Viewer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .custom-scroller {
            &::-webkit-scrollbar {
                width: 20px;
            }
            &::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
            }
            &::-webkit-scrollbar-thumb {
                background: rgb(8, 39, 255);
            }
            &::-webkit-scrollbar-thumb:hover {
                background: rgb(0, 34, 100);
            }
        }
        th, td {
            padding: 6px;
        }
        .scrollable-table-container {
            max-height: 86vh; /* Adjust this height as needed */
            overflow-y: auto;
        }
    </style>
</head>
<body class="selection:bg-amber-50 selection:text-amber-600 custom-scroller">
<main class="tracking-wide min-h-screen bg-indigo-50 overflow-x-hidden cursor-default text-indigo-800">
    <header class="flex flex-row bg-white items-center border-b border-indigo-800 pl-1 pr-6">
        <!-- Menubar -->
        <div class="flex flex-row w-1/6">
            <button class="transition-colors duration-300 transform rounded-full border-4 border-transparent hover:border-4 text-indigo-500 hover:text-amber-600 hover:border-amber-300 hover:bg-amber-300 focus:outline-none">
                <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>                          
            </button>
            <div class="truncate text-indigo-800 max-w-40 w-40">
                <p class="text-md font-semibold">User Name</p>
                <p class="text-sm">Position</p>
            </div>
        </div>
        <!-- PLM -->
        <div class="border-l border-indigo-300 pl-4 py-2.5 w-1/6">
            <!-- Logo Placeholder -->
        </div>
        <div class="flex flex-row items-center space-x-2 w-2/6 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
            <!-- OSDS -->
            <img class="hidden lg:block h-10 w-10" src="{{ asset('assets/osdslogo.png') }}"/>
            <div class="flex flex-col">
                <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                <input type="text" placeholder="Search anything..." class="focus:outline-none rounded border border-indigo-500 text-xs p-1 placeholder:text-indigo-300 px-2 focus:border-indigo-800"/>
            </div>
            <img class="hidden lg:block h-10 w-10" src="{{ asset('assets/plm-logo--with-header.png') }}"/>
        </div>
        <div class="flex flex-row justify-end space-x-4 items-end w-1/6">
            <!-- Placeholder for additional elements -->
        </div>
        <div class="text-xs lg:text-sm font-light text-right border-l border-indigo-300 w-1/6">
            <!-- Date and Time -->
            <p id="weekday"></p>
            <p id="date"></p>
            <p id="time"></p>

            <script>
                function updateDateTime() {
                    var currentDateTime = new Date();
                    var weekday = { weekday: 'long' };
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var dateString = currentDateTime.toLocaleString('en-PH', options);
                    var weekDayString = currentDateTime.toLocaleString('en-PH', weekday);
                    var timeString = currentDateTime.toLocaleTimeString();
                    document.getElementById("weekday").innerHTML = weekDayString;
                    document.getElementById("date").innerHTML = dateString;
                    document.getElementById("time").innerHTML = timeString;
                }
                setInterval(updateDateTime, 1000);
                updateDateTime();
            </script>
        </div>
    </header>

    <article class="grid grid-cols-6">
        <aside class="bg-indigo-800 text-white pb-10 relative w-1/6">
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('staff.dashboard') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-xs lg:text-base">Home</p>
            </button>
            <button class="hover:text-amber-600 hover:bg-amber-50 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('staff.caserecord') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m30,20v34h-5l-1.89-3.79c-.76-1.51-1.88-2.21-3.58-2.21H6V12h16c4.94,0,8,3.06,8,8Zm12-8c-4.94,0-8,3.06-8,8v34h5l1.89-3.79c.76-1.51,1.88-2.21,3.58-2.21h13.53V12h-16Z" clip-rule="evenodd"></path>
                </svg>
                <p class="hidden lg:block">Case Records</p>
                <p class="lg:hidden text-xs">Records</p>
            </button>
            <button class="bg-amber-300 text-amber-600 font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('staff.gmcrequest') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 48 48" webcrx="">
                    <g>
                        <rect width="48" height="48" fill="none"/>
                        <rect width="48" height="48" fill="none"/>
                    </g>
                    <g>
                        <path fill="currentColor" d="M46,24a12.9,12.9,0,0,0-4-9.4V7a2,2,0,0,0-2-2H4A2,2,0,0,0,2,7V41a2,2,0,0,0,2,2H26v1.6c0,2,2,3.1,3.3,1.8L33,43l3.7,3.4c1.3,1.3,3.3.2,3.3-1.8V34.9A12.9,12.9,0,0,0,46,24ZM33,15a9,9,0,1,1-9,9A9,9,0,0,1,33,15ZM12,14H24.7L23,15.7A11.4,11.4,0,0,0,21.5,18H12a2,2,0,0,1,0-4Zm0,8h8.2a6.5,6.5,0,0,0-.2,2,6.8,6.8,0,0,0,.2,2H12a2,2,0,0,1,0-4Zm0,12a2,2,0,0,1,0-4h9.5A11.4,11.4,0,0,0,23,32.3,13.7,13.7,0,0,0,24.7,34Z"/>
                        <circle cx="33" cy="24" r="5" fill="currentColor"/>
                    </g>
                </svg>
                <p class="hidden lg:block">GMC Requests</p>
                <p class="lg:hidden text-xs">GMC</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('staff.archive') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                </svg>
                <p>Archive</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='osds-administrator.html'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m56,10.83l-4.22,6.49c-2.72,4.18-4.88,6.85-8.41,10.38l-10.3,10.3-7.07-7.07,10.3-10.3c3.53-3.53,6.19-5.69,10.38-8.41l6.49-4.22,2.83,2.83Zm-32.39,23.37l6.2,6.2-5.8,11.61h-4.44c-2.37,0-3.98.67-5.66,2.34l-1.66,1.66-4.24-4.24,1.66-1.66c1.68-1.68,2.34-3.29,2.34-5.66v-4.44l11.61-5.8Zm-.61,9.8c0-1.66-1.34-3-3-3s-3,1.34-3,3,1.34,3,3,3,3-1.34,3-3Z" clip-rule="evenodd"></path>
                </svg>
                <p class="hidden lg:block">Administrator</p>
                <p class="lg:hidden text-xs">Admin</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='osds-settings.html'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m55.89,18.44l3.66-2.71-1.53-3.7-4.51.67c-.65-.84-1.39-1.58-2.21-2.21l.67-4.5-3.7-1.53-2.71,3.66c-1.03-.14-2.08-.14-3.13,0l-2.71-3.66-3.7,1.53.67,4.51c-.84.64-1.58,1.39-2.21,2.21l-4.5-.67-1.53,3.7,3.66,2.71c-.14,1.03-.14,2.08,0,3.13l-3.66,2.71,1.53,3.7,4.51-.67c.64.84,1.39,1.58,2.21,2.21l-.67,4.5,3.7,1.53,2.71-3.66c1.03.14,2.08.14,3.13,0l2.71,3.66,3.7-1.53-.67-4.51c.84-.64,1.58-1.39,2.21-2.21l4.5.67,1.53-3.7-3.66-2.71c.14-1.03.14-2.08,0-3.13Zm-11.89,7.56c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Zm-13.62,12.01l2.34-3.91-2.83-2.83-3.91,2.34c-.9-.52-1.87-.92-2.89-1.19l-1.11-4.42h-4l-1.11,4.42c-1.02.27-1.99.68-2.89,1.19l-3.91-2.34-2.83,2.83,2.34,3.91c-.52.9-.92,1.87-1.19,2.89l-4.42,1.11v4l4.42,1.11c.27,1.02.68,1.99,1.19,2.89l-2.34,3.91,2.83,2.83,3.91-2.34c.9.52,1.87.92,2.89,1.19l1.11,4.42h4l1.11-4.42c1.02-.27,1.99-.68,2.89-1.19l3.91,2.34,2.83-2.83-2.34-3.91c.52-.9.92-1.87,1.19-2.89l4.42-1.11v-4l-4.42-1.11c-.27-1.02-.68-1.99-1.19-2.89Zm-10.38,11.99c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Z" clip-rule="evenodd"></path>
                </svg>
                <p>Settings</p>
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
        
        <div class="col-span-5 bg-white relative">
            <div class="border-b border-indigo-800 pt-6 pb-1.5 grid grid-cols-6">
                <p class="ml-6 text-3xl font-thin tracking-widest col-span-2">GMC Requests</p>
                <div class="col-start-5 col-span-2 w-full pr-6 flex items-center">
                    <input type="text" id="searchInput" class="border border-indigo-300 placeholder:text-indigo-300 focus:outline-none focus:border-indigo-800 text-sm w-full font-light p-2" placeholder="Search by Student No or Purpose..."/>
                    <button class="p-2 border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:border-amber-600 space-x-1 flex items-center" onclick="filterTable()">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                        <p class="text-xs font-thin">Filter</p>
                    </button>
                </div>
                <div class="col-span-3 w-full space-x-4 flex justify-end">
                    <select id="collegeFilter" class="rounded-md bg-indigo-50 text-xs p-2 pb-2.5 focus:outline-none border border-indigo-300 focus:border-indigo-800 cursor-pointer hover:bg-indigo-100">
                        <option class="text-gray-200 bg-gray-700" selected disabled value="">All Colleges</option>
                        <option value="CISTM">CISTM</option>
                        <option value="CAS">CAS</option>
                        <option value="CE">CE</option>
                    </select>
                    <select id="courseFilter" class="rounded-md bg-indigo-50 text-xs p-2 pb-2.5 focus:outline-none border border-indigo-300 focus:border-indigo-800 cursor-pointer hover:bg-indigo-100">
                        <option class="text-gray-200 bg-gray-700" selected disabled value="">All Courses</option>
                        <option value="BSCS">BSCS</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSCE">BSCE</option>
                    </select>
                </div>
            </div>
            <div class="scrollable-table-container">
                <table class="table table-fixed w-full">
                    <thead class="bg-indigo-100 text-xs">
                        <tr>
                            <th>Transaction No</th>
                            <th>Student Number</th>
                            <th>College</th>
                            <th>Degree Program</th>
                            <th>Contact Number</th>
                            <th>Purpose</th>
                            <th>Request Status</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody id="gmc-request" class="text-center text-sm font-thin">
                        @foreach ($requests as $request)
                        <tr class="hover:bg-amber-50 hover:text-amber-600 cursor-pointer active:bg-amber-200 active:font-semibold selection:bg-transparent" onclick="showRequestDetails({{ $request->id }})">
                            <td>{{ $request->transaction_no }}</td>
                            <td>{{ $request->student_no }}</td>
                            <td>{{ $request->college_id }}</td>
                            <td>{{ $request->degree_program_id }}</td>
                            <td>{{ $request->contact_no }}</td>
                            <td>{{ $request->purpose }}</td>
                            <td>{{ $request->request_status }}</td>
                            <td>{{ $request->payment_method }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="requestDetailsModal" class="fixed inset-0 z-10 hidden text-amber-600 selection:bg-indigo-50 selection:text-indigo-800 bg-black bg-opacity-50">
                <div class="fixed inset-0" onclick="hideRequestDetails()"></div>
                <div class="relative top-20 bg-white p-4 mx-auto max-w-2xl h-fit rounded shadow-md border border-amber-600">
                    <div class="border-b border-amber-300 flex flex-row justify-between items-end">
                        <p class="text-2xl font-thin tracking-widest">Request Details</p>
                        <p id="requestTransactionNo" class="text-sm tracking-wider"></p>
                    </div>
                    <div class="grid grid-cols-2 text-xs lg:text-sm pt-3">
                        <!-- Student Information -->
                        <div>
                            <p>Student Number: <span id="requestStudentNo"></span></p>
                            <p>College: <span id="requestCollege"></span></p>
                            <p>Degree Program: <span id="requestDegreeProgram"></span></p>
                            <p>Contact Number: <span id="requestContactNo"></span></p>
                            <p>Purpose: <span id="requestPurpose"></span></p>
                            <p>Request Status: <span id="requestStatus"></span></p>
                            <p>Payment Method: <span id="requestPaymentMethod"></span></p>
                            <form id="updateRequestStatusForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="updateRequestStatus">Update Status:</label>
                                    <select class="form-control" id="updateRequestStatus" name="request_status">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="hideRequestDetails()">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <footer class="flex justify-end mt-6 border-t border-amber-300">
                        <div class="pt-3 space-x-4">
                            <button class="p-1.5 text-xs border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50 hover:text-indigo-800 active:bg-indigo-200" onclick="hideRequestDetails()">
                                <p>Close</p>
                            </button>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </article>
</main>

<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("gmc-request");
        tr = table.getElementsByTagName("tr");
        var collegeFilter = document.getElementById("collegeFilter").value.toUpperCase();
        var courseFilter = document.getElementById("courseFilter").value.toUpperCase();

        for (i = 0; i < tr.length; i++) {
            var showRow = true;
            var tdStudentNo = tr[i].getElementsByTagName("td")[1];
            var tdPurpose = tr[i].getElementsByTagName("td")[5];
            var tdCollege = tr[i].getElementsByTagName("td")[2];
            var tdCourse = tr[i].getElementsByTagName("td")[3];

            if (tdStudentNo && tdPurpose) {
                var studentNoValue = tdStudentNo.textContent || tdStudentNo.innerText;
                var purposeValue = tdPurpose.textContent || tdPurpose.innerText;

                if (studentNoValue.toUpperCase().indexOf(filter) > -1 || purposeValue.toUpperCase().indexOf(filter) > -1) {
                    showRow = true;
                } else {
                    showRow = false;
                }

                if (collegeFilter && showRow && tdCollege) {
                    var collegeValue = tdCollege.textContent || tdCollege.innerText;
                    if (collegeValue.toUpperCase() !== collegeFilter) {
                        showRow = false;
                    }
                }

                if (courseFilter && showRow && tdCourse) {
                    var courseValue = tdCourse.textContent || tdCourse.innerText;
                    if (courseValue.toUpperCase() !== courseFilter) {
                        showRow = false;
                    }
                }

                tr[i].style.display = showRow ? "" : "none";
            }
        }
    }

    function showRequestDetails(requestId) {
        var request = @json($requests).find(r => r.id === requestId);
        if (request) {
            document.getElementById("requestTransactionNo").innerText = request.transaction_no;
            document.getElementById("requestStudentNo").innerText = request.student_no;
            document.getElementById("requestCollege").innerText = request.college_id;
            document.getElementById("requestDegreeProgram").innerText = request.degree_program_id;
            document.getElementById("requestContactNo").innerText = request.contact_no;
            document.getElementById("requestPurpose").innerText = request.purpose;
            document.getElementById("requestStatus").innerText = request.request_status;
            document.getElementById("requestPaymentMethod").innerText = request.payment_method;

            var updateForm = document.getElementById("updateRequestStatusForm");
            updateForm.action = `{{ url('/gmcrequest/update/${request.id}') }}`;
            document.getElementById("updateRequestStatus").value = request.request_status;

            document.getElementById("requestDetailsModal").classList.remove("hidden");
        }
    }

    function hideRequestDetails() {
        document.getElementById("requestDetailsModal").classList.add("hidden");
    }

    /* Script for updating date and time */
    function updateDateTime() {
        var currentDateTime = new Date();
        var weekday = { weekday: 'long' };
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var dateString = currentDateTime.toLocaleString('en-PH', options);
        var weekDayString = currentDateTime.toLocaleString('en-PH', weekday);
        var timeString = currentDateTime.toLocaleTimeString();
        document.getElementById("weekday").innerHTML = weekDayString;
        document.getElementById("date").innerHTML = dateString;
        document.getElementById("time").innerHTML = timeString;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>
</body>
</html>
