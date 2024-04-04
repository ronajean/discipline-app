<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSDS Head Case Records</title>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <script src="https:cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-amber-300 selection:text-white">
    <!-- Header -->
    <div class="bg-white">
        <header class="relative bg-white">
            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex py-4 items-center">
                        <!-- PLM Logo -->
                        <div class="ml-4 flex lg:ml-0">
                            <img class="h-16 w-auto selection:bg-transparent" src="https://plm.edu.ph/images/ui/plm-logo--with-header.png" alt="PLM Logo with Header">
                        </div>

                        <div class="mx-auto flex items-center">
                            <div class="flex items-center justify-center">
                                <label class="text-lg font-semibold text-indigo-800">
                                    <span class="text-center">Office of Student Development and Services</span>
                                    <div class="flex justify-end">
                                        <input placeholder="Search anything.." type="search" class="bg-slate-100 text-sm text-gray-700 p-2 rounded-md placeholder:text-gray-400 focus:outline-none focus:ring focus:ring-amber-600">
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- User -->
                        <div class="ml-auto flex items-center">
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <!-- Search Bar for Tabs -->
                                <!-- <input class="w-full appearance-none bg-transparent pl-4 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6" placeholder="Find certain tabs..." role="combobox" type="text" aria-expanded="false" aria-autocomplete="list"> -->
                                <!-- Profile -->
                                <div class="rounded-full text-gray-400 hover:outline hover:outline-amber-600">
                                    <svg class="h-16 w-16 " viewBox="7 7 50 50" fill="currentColor">
                                        <path fill-rule="evenodd" d="m32,8c-13.25,0-24,10.75-24,24s10.75,24,24,24,24-10.75,24-24-10.75-24-24-24Zm13.25,36.16c-2.71-3.93-7.29-6.16-13.25-6.16s-10.54,2.23-13.25,6.16c-2.94-3.2-4.75-7.46-4.75-12.16,0-9.94,8.06-18,18-18s18,8.06,18,18c0,4.69-1.81,8.95-4.75,12.16Zm-5.25-18.16c0,4.94-3.06,8-8,8s-8-3.06-8-8,3.06-8,8-8,8,3.06,8,8Z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                
                                <a href="#" class="text-sm font-medium text-gray-500 hover:text-amber-600">OSDS Head [Full Name]<br>User Email<br>[Role: OSDS Head]</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <!-- Time-Date-->
                                <div class="grid grid-rows-3 text-sm font-medium text-gray-500 cursor-default">
                                    <div id="weekday"></div>
                                    <div id="date"></div>
                                    <div id="time"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <!-- JavaScript -->
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

        // Update date and time every second
        setInterval(updateDateTime, 1000);

        // Initial call to display date and time immediately
        updateDateTime();
    </script>



    <!-- Side Navigation Bar -->
    <div class="bg-white grid grid-cols-5 overflow-hidden min-h-full max-h-[170vh]">
        <div class="bg-indigo-800 max-w-none">
            <form class="hidden lg:block">
                <div class="py-6 px-8">
                    <a href="OSDS Head Home Page.html" type="button" class="border-b border-slate-400 flex w-full items-center justify-between py-3 text-xl font-semibold text-white hover:bg-indigo-600 hover:text-amber-300">
                        <span class="mx-4">Home</span>
                    </a>
                </div>
                <div class="py-6 px-8">
                    <h3 class="-my-3 flow-root border-b border-slate-400">
                        <button type="button" class="flex w-full items-center justify-between py-3 text-md font-medium text-white hover:bg-indigo-600 hover:text-amber-300">
                            <span class="mx-4">Student Cases</span>
                            <span class="ml-6 flex items-center">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6">
                        <div class="space-y-4">
                            <a href="OSDS Head Case Records.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Case Records</span>
                            </a>
                            <a href="OSDS Head Add a New Case Record.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Add a New Case Record</span>
                            </a>
                            <a href="OSDS Head CSV File Adding New Case Record.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Import a CSV File: Case Record</span>
                            </a>
                            <a href="OSDS Head List of Complaints.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">List of Complaints</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="py-6 px-8">
                    <h3 class="-my-3 flow-root border-b border-slate-400">
                        <button type="button" class="flex w-full items-center justify-between py-3 text-md font-medium text-white hover:bg-indigo-600 hover:text-amber-300">
                            <span class="mx-4">Generate Reports</span>
                            <span class="ml-6 flex items-center">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6">
                        <div class="space-y-4">
                            <a href="OSDS Head Violators Reported.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Violators Report</span>
                            </a>
                            <a href="OSDS Head Students Reported.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Students List</span>
                            </a>
                            <a href="OSDS Head GMC Requests.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">GMC Requests</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="py-6 px-8">
                    <h3 class="-my-3 flow-root border-b border-slate-400">
                        <button type="button" class="flex w-full items-center justify-between py-3 text-md font-medium text-white hover:bg-indigo-600 hover:text-amber-300">
                            <span class="mx-4">Administrator</span>
                            <span class="ml-6 flex items-center">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6">
                        <div class="space-y-4">
                            <a href="OSDS Head Colleges and Courses.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Colleges and Courses</span>
                            </a>
                            <a href="OSDS Head Students Manager.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Students Manager</span>
                            </a>
                            <a href="OSDS Head Violations Manager.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">Violations Manager</span>
                            </a>
                            <a href="OSDS Head Employees List.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                <span class="ml-3">OSDS Employees</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="py-6 px-8">
                    <label>
                        <h3 class="-my-3 flow-root border-b border-slate-400">
                            <button type="button" class="flex w-full items-center justify-between py-3 text-md font-medium text-white hover:bg-indigo-600 hover:text-amber-300">
                                <span class="mx-4">Settings</span>
                                <span class="ml-6 flex items-center">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <div class="pt-6">
                            <div class="space-y-4">
                                <a href="OSDS Head Display and Accessibility.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                    <span class="ml-3">Display [&] Accessibility</span>
                                </a>
                                <a href="OSDS Head Settings and Privacy.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                    <span class="ml-3">Settings [&] Privacy</span>
                                </a>
                                <a href="OSDS Head Send Feedback.html" class="flex w-full items-center text-sm text-slate-300 hover:bg-indigo-600 hover:text-amber-300">
                                    <span class="ml-3">Give Feedback</span>
                                </a>
                                <a href="OSDS Landing Page.html" class="flex w-full items-center font-medium text-lg text-red-300 hover:bg-red-600 hover:text-amber-300">
                                    <span class="ml-3">Log Out</span>
                                </a>
                            </div>
                        </div>
                    </label>
                </div>
            </form>
        </div>


        <!-- Contents Main -->
        <section class="col-span-4 min-h-full max-h-[170vh]">
            <!-- Contents Borderline to Avoid Content Spillage -->
            <div class="relative overflow-hidden rounded-r-xl bg-slate-100 border border-double border-gray-400 bg-opacity-75 lg:h-full">
                <span class="flex justify-center pt-4 text-3xl font-bold tracking-tight text-indigo-800 cursor-default">Case Records</span>
                <div class="mt-16 mx-8 bg-white pb-12 rounded-xl shadow">
                    <div class="flex justify-center items-center mb-8">
                        <div class=" max-w-6xl overflow-hidden">
                            <div class="flex justify-center mt-4">
                                <label class="py-3 px-32 text-lg font-semibold leading-6 text-gray-700 border-b border-slate-400">
                                    <span>Filter Section</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <label class="mx-8 text-sm font-medium text-gray-700">
                        <span>Specify Records</span>
                    </label>
                    <div class="mx-8 flex justify-between py-4">
                        <select title="Select record filter" name="filter" class="h-full rounded-md bg-slate-100 py-2 pl-2 pr-7 text-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-600 sm:text-sm">
                            <option class="text-gray-200 bg-gray-700" value="none" disabled selected>Select record filter</option>
                            <option value="option1">Filters Colleges</option>
                            <option value="option2">Filters Courses</option>
                            <option value="option3">Filters Offenses</option>
                        </select>
                        <div class="relative text-base text-slate-100">
                            <input type="text" class="appearance-none bg-slate-100 py-2 pl-4 pr-12 rounded-md text-gray-800 text-base placeholder:text-gray-500 focus:outline-none focus:outline-slate-100 sm:text-sm sm:leading-6" placeholder="Specify Case Record">
                            <svg class="pointer-events-none absolute right-4 top-2 h-6 w-6 fill-slate-400">
                                <path d="M20.47 21.53a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-9.97-4.28a6.75 6.75 0 0 1-6.75-6.75h-1.5a8.25 8.25 0 0 0 8.25 8.25v-1.5ZM3.75 10.5a6.75 6.75 0 0 1 6.75-6.75v-1.5a8.25 8.25 0 0 0-8.25 8.25h1.5Zm6.75-6.75a6.75 6.75 0 0 1 6.75 6.75h1.5a8.25 8.25 0 0 0-8.25-8.25v1.5Zm11.03 16.72-5.196-5.197-1.061 1.06 5.197 5.197 1.06-1.06Zm-4.28-9.97c0 1.864-.755 3.55-1.977 4.773l1.06 1.06A8.226 8.226 0 0 0 18.75 10.5h-1.5Zm-1.977 4.773A6.727 6.727 0 0 1 10.5 17.25v1.5a8.226 8.226 0 0 0 5.834-2.416l-1.061-1.061Z"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="container mx-auto mt-10 text-base font-medium">
                        <table class="table-fixed w-full bg-white border border-gray-300">
                          <thead class="bg-indigo-800 text-white cursor-default">
                            <tr>
                              <th class="py-2 px-4">Record ID</th>
                              <th class="py-2 px-4">Student No</th>
                              <th class="py-2 px-4">Offense Type</th>
                              <th class="py-2 px-4">Violation</th>
                              <th class="py-2 px-4">Vio Date</th>
                              <th class="py-2 px-4">Status</th>
                              <th class="py-2 px-4">College</th>
                              <th class="py-2 px-4">Course</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white text-center" onclick="window.location.href='#';">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">20230001</td>
                                <td class="py-2 px-4">Plagiarism</td>
                                <td class="py-2 px-4">Copied content from the internet</td>
                                <td class="py-2 px-4">2023-12-01</td>
                                <td class="py-2 px-4">Pending</td>
                                <td class="py-2 px-4 text-slate-600">Engineering</td>
                                <td class="py-2 px-4">Computer Science</td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white text-center" onclick="window.location.href='#';">
                              <td class="py-2 px-4">2</td>
                              <td class="py-2 px-4">20230002</td>
                              <td class="py-2 px-4">Cheating</td>
                              <td class="py-2 px-4">Used unauthorized materials</td>
                              <td class="py-2 px-4">2023-12-02</td>
                              <td class="py-2 px-4">Resolved</td>
                              <td class="py-2 px-4 text-green-800">Business</td>
                              <td class="py-2 px-4">Finance</td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white text-center" onclick="window.location.href='#';">
                              <td class="py-2 px-4">3</td>
                              <td class="py-2 px-4">20230003</td>
                              <td class="py-2 px-4">Disruptive Behavior</td>
                              <td class="py-2 px-4">Interrupted the class</td>
                              <td class="py-2 px-4">2023-12-03</td>
                              <td class="py-2 px-4">Under Investigation</td>
                              <td class="py-2 px-4 text-red-800">Arts</td>
                              <td class="py-2 px-4">History</td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white text-center" onclick="window.location.href='#';">
                                <td class="py-2 px-4">4</td>
                                <td class="py-2 px-4">20230004</td>
                                <td class="py-2 px-4">Plagiarism</td>
                                <td class="py-2 px-4">Copying from a classmate</td>
                                <td class="py-2 px-4">2023-12-04</td>
                                <td class="py-2 px-4">Pending</td>
                                <td class="py-2 px-4 text-yellow-800">Science</td>
                                <td class="py-2 px-4">Biology</td>
                              </tr>
                              <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white text-center" onclick="window.location.href='#';">
                                <td class="py-2 px-4">5</td>
                                <td class="py-2 px-4">20230005</td>
                                <td class="py-2 px-4">Cheating</td>
                                <td class="py-2 px-4">Using cheat sheets during an exam</td>
                                <td class="py-2 px-4">2023-12-05</td>
                                <td class="py-2 px-4">Resolved</td>
                                <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                <td class="py-2 px-4">Psychology</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>