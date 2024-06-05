<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>OSDS Case Records</title>
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
        th {
            padding: 6px;
        }
        td {
            padding: 3px;
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
        <div class="flex flex-row  w-1/6">
            <button class="transition-colors duration-300 transform rounded-full border-4 border-transparent hover:border-4 text-indigo-500 hover:text-amber-600 hover:border-amber-300 hover:bg-amber-300 focus:outline-none">
                <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>                          
            </button>

            <div class="truncate text-indigo-800 max-w-40 w-40">
              
            </div>

            
        </div>
        <!-- PLM -->
        <div class="border-l border-indigo-300 pl-4 py-2.5 w-1/6">
        </div>
        <div class="flex flex-row items-center space-x-2 w-2/6 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
            <!-- OSDS -->
            <img class="hidden lg:block h-10 w-10" src="assets/osdslogo.png"/>
            <div class="flex flex-col">
                <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                <input type="text" placeholder="Search anything..." class="focus:outline-none rounded border border-indigo-500 text-xs p-1 placeholder:text-indigo-300 px-2 focus:border-indigo-800"/>
            </div>
            <img class="hidden lg:block h-10 w-10"src="assets/plm-logo--with-header.png"/>
        </div>
        <div class="flex flex-row justify-end space-x-4 items-end w-1/6">
            
        </div>
        <div class="text-xs lg:text-sm font-light text-right border-l border-indigo-300 w-1/6">
            <!-- Date and Time -->
            <p id="weekday"></p>
            <p id="date"></p>
            <p id="time"></p>
        </div>

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
            setInterval(updateDateTime, 1000);
            updateDateTime();
        </script>
    </header>
    <article class="grid grid-cols-6">
        <aside class="bg-indigo-800 text-white pb-10 relative">
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" 
                     onclick="location.href='{{ route('staff.dashboard') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-xs lg:text-base">Home</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2"
                            onclick="location.href='{{ route('staff.caserecord') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m30,20v34h-5l-1.89-3.79c-.76-1.51-1.88-2.21-3.58-2.21H6V12h16c4.94,0,8,3.06,8,8Zm12-8c-4.94,0-8,3.06-8,8v34h5l1.89-3.79c.76-1.51,1.88-2.21,3.58-2.21h13.53V12h-16Z" clip-rule="evenodd"></path>
                </svg>
                <p class="hidden lg:block">Case Records</p>
                <p class="lg:hidden text-xs">Records</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                </svg>
                <p>Archive</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m55.89,18.44l3.66-2.71-1.53-3.7-4.51.67c-.65-.84-1.39-1.58-2.21-2.21l.67-4.5-3.7-1.53-2.71,3.66c-1.03-.14-2.08-.14-3.13,0l-2.71-3.66-3.7,1.53.67,4.51c-.84.64-1.58,1.39-2.21,2.21l-4.5-.67-1.53,3.7,3.66,2.71c-.14,1.03-.14,2.08,0,3.13l-3.66,2.71,1.53,3.7,4.51-.67c.64.84,1.39,1.58,2.21,2.21l-.67,4.5,3.7,1.53,2.71-3.66c1.03.14,2.08.14,3.13,0l2.71,3.66,3.7-1.53-.67-4.51c.84-.64,1.58-1.39,2.21-2.21l4.5.67,1.53-3.7-3.66-2.71c.14-1.03.14-2.08,0-3.13Zm-11.89,7.56c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Zm-13.62,12.01l2.34-3.91-2.83-2.83-3.91,2.34c-.9-.52-1.87-.92-2.89-1.19l-1.11-4.42h-4l-1.11,4.42c-1.02.27-1.99.68-2.89,1.19l-3.91-2.34-2.83,2.83,2.34,3.91c-.52.9-.92,1.87-1.19,2.89l-4.42,1.11v4l4.42,1.11c.27,1.02.68,1.99,1.19,2.89l-2.34,3.91,2.83,2.83,3.91-2.34c.9.52,1.87.92,2.89,1.19l1.11,4.42h4l1.11-4.42c1.02-.27,1.99-.68,2.89-1.19l3.91,2.34,2.83-2.83-2.34-3.91c.52-.9.92-1.87,1.19-2.89l4.42-1.11v-4l-4.42-1.11c-.27-1.02-.68-1.99-1.19-2.89Zm-10.38,11.99c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Z" clip-rule="evenodd"></path>
                </svg>
                <p>Settings</p>
            </button>
            <form action="/logout" method="POST">
                @csrf
            <button class="hover:bg-red-200 hover:text-red-600 active:bg-red-400 active:font-semibold flex flex-row items-center justify-center w-full p-4 space-x-2 mt-20" onclick="location.href='login-page.html'">
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
        <div class="col-span-5 bg-white">
            <div class="p-4">
                <!-- Filter and Search Section -->
                <div class="flex flex-col md:flex-row md:space-x-4 mb-4">
                    <input type="text" id="searchInput" placeholder="Search by Student No or Offense Type..." class="focus:outline-none rounded border border-indigo-500 text-xs p-2 placeholder:text-indigo-300 focus:border-indigo-800">
                    <select id="collegeFilter" class="focus:outline-none rounded border border-indigo-500 text-xs p-2 focus:border-indigo-800">
                        <option value="">All Colleges</option>
                        <option value="CISTM">CISTM</option>
                        <option value="CAS">CAS</option>
                        <option value="CE">CE</option>
                    </select>
                    <select id="courseFilter" class="focus:outline-none rounded border border-indigo-500 text-xs p-2 focus:border-indigo-800">
                        <option value="">All Courses</option>
                        <option value="BSCS">BSCS</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSCE">BSCE</option>
                    </select>
                    <button onclick="filterTable()" class="p-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-700 text-xs">Search</button>
                </div>
                <div class="scrollable-table-container">
                    <table class="table table-fixed w-full">
                        <thead class="bg-indigo-50 text-xs">
                            <tr>
                                <th>Student No</th>
                                <th>Offense Type</th>
                                <th>Date</th>
                                <th>College</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                        <tbody id="case-record" class="text-center text-sm font-thin">
                            @foreach ($violations as $violation)
                            <tr class="hover:bg-amber-50 hover:text-amber-600 cursor-pointer active:bg-amber-200 active:font-semibold selection:bg-transparent">
                                <td>{{ $violation->student_id }}</td>
                                <td>{{ $violation->offense }}</td>
                                <td>{{ $violation->date_and_time}}</td>
                                <td>{{ $violation->college }}</td>
                                <td>{{ $violation->course }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <button class="p-2 shadow shadow-indigo-500 rounded-md font-light text-sm hover:bg-amber-50 hover:text-amber-600 hover:shadow-amber-600 active:bg-amber-200 active:font-semibold" 
                            onclick="location.href='{{ route('staff.addnewcase') }}'">
                        <p>Add</p>
                    </button>
                </div>
            </div>
        </div>
    </article>
</main>

<script>
    /* Script for filtering the table based on search input and filters */
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("case-record");
        tr = table.getElementsByTagName("tr");
        var collegeFilter = document.getElementById("collegeFilter").value.toUpperCase();
        var courseFilter = document.getElementById("courseFilter").value.toUpperCase();

        for (i = 0; i < tr.length; i++) {
            var showRow = true;
            var tdStudentNo = tr[i].getElementsByTagName("td")[0];
            var tdOffenseType = tr[i].getElementsByTagName("td")[1];
            var tdCollege = tr[i].getElementsByTagName("td")[3];
            var tdCourse = tr[i].getElementsByTagName("td")[4];

            if (tdStudentNo && tdOffenseType) {
                var studentNoValue = tdStudentNo.textContent || tdStudentNo.innerText;
                var offenseTypeValue = tdOffenseType.textContent || tdOffenseType.innerText;

                if (studentNoValue.toUpperCase().indexOf(filter) > -1 || offenseTypeValue.toUpperCase().indexOf(filter) > -1) {
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

    /* Script for updating date and time */
    function updateDateTime() {
        var currentDateTime = new Date();
        var weekday = {weekday: 'long'};
        var options = {year: 'numeric', month: 'long', day: 'numeric'};
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