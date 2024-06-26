<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>College Dean OSDS POV</title>
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            .custom-scroller {
                &::-webkit-scrollbar {
                    width:20px;
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
        </style>
    </head>
    <body class="selection:bg-amber-300 selection:text-white custom-scroller">
        <main class="tracking-wide min-h-screen grid content-start bg-indigo-50">
            <div class="fixed top-0 w-full z-[2024] border-b-2 border-gray-300 bg-white">
                <div class="container lg:py-2 mx-auto">
                    <div class="flex flex-col lg:items-center lg:justify-center lg:flex-row lg:space-x-56">
                        <div class="flex items-center flex-row justify-evenly">
                            <div class="hidden lg:block sm:w-96 xl:w-80 2xl:w-96 sm:mx-auto lg:m-0 sm:ml-2">
                                <img class="h-16 w-auto selection:bg-transparent" alt="PLM Logo" src="{{ asset('assets/plm-logo--with-header.png') }}"/>
                            </div>
                            <div class="lg:hidden block">
                                <img class="h-10 w-10 lg:h-16 lg:w-16" src="{{ asset('assets/plm-logo.png') }}"/>
                            </div>
                            <div class="relative sm:w-96 xl:w-80 2xl:w-96 sm:mx-auto lg:m-0">
                                <h1 class="flex items-center pl-2 mt-2 text-xs font-semibold text-indigo-800 text-gray-600 dark:text-gray-300 lg:mt-0 cursor-default">The Office of Student Development and Services</h1>
                                <!-- <h1 class="flex items-center pl-2 mt-2 text-xs font-semibold text-indigo-800 text-gray-600 dark:text-gray-300 lg:mt-0">The Office of Student Development and Services</h1> -->
                                <input class="w-full h-7 lg:h-10 mt-2 px-3 text-indigo-800 text-xs lg:text-sm placeholder:text-slate-300 bg-white border border-gray-200 rounded-lg peer dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-primary dark:focus:border-primary focus:outline-none focus:ring focus:ring-amber-300 focus:ring-primary dark:placeholder-gray-400 focus:ring-opacity-40" type="text" placeholder="Search anything..."/>
                            </div>
                            <button class="lg:hidden block transition-colors duration-300 transform rounded-full border-4 border-transparent hover:border-4 hover:border-amber-300 hover:bg-amber-300 focus:outline-none">
                                <svg class="rounded-full text-gray-400 h-10 w-10" viewBox="7 7 50 50" fill="currentColor">
                                    <path fill-rule="evenodd" d="m32,8c-13.25,0-24,10.75-24,24s10.75,24,24,24,24-10.75,24-24-10.75-24-24-24Zm13.25,36.16c-2.71-3.93-7.29-6.16-13.25-6.16s-10.54,2.23-13.25,6.16c-2.94-3.2-4.75-7.46-4.75-12.16,0-9.94,8.06-18,18-18s18,8.06,18,18c0,4.69-1.81,8.95-4.75,12.16Zm-5.25-18.16c0,4.94-3.06,8-8,8s-8-3.06-8-8,3.06-8,8-8,8,3.06,8,8Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="flex flex-row mt-4 space-y-3 lg:mt-0 space-y-0 space-x-3 items-center justify-center">
                            <!-- User Profile -->
                            <!-- <img class="h-16 w-16" alt="User Profile" src=""/> -->
                            <button class="hidden lg:block transition-colors duration-300 transform rounded-full border-4 border-transparent hover:border-4 hover:border-amber-300 hover:bg-amber-300 focus:outline-none">
                                <svg class="rounded-full text-gray-400 h-16 w-16" viewBox="7 7 50 50" fill="currentColor">
                                    <path fill-rule="evenodd" d="m32,8c-13.25,0-24,10.75-24,24s10.75,24,24,24,24-10.75,24-24-10.75-24-24-24Zm13.25,36.16c-2.71-3.93-7.29-6.16-13.25-6.16s-10.54,2.23-13.25,6.16c-2.94-3.2-4.75-7.46-4.75-12.16,0-9.94,8.06-18,18-18s18,8.06,18,18c0,4.69-1.81,8.95-4.75,12.16Zm-5.25-18.16c0,4.94-3.06,8-8,8s-8-3.06-8-8,3.06-8,8-8,8,3.06,8,8Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <div class="hidden lg:block truncate max-w-40 w-40 text-indigo-800 cursor-default">
                                <p class="text-lg font-semibold">User Name</p>
                                <p>Email</p>
                            </div>
                            
                            <div class="hidden lg:block text-right text-indigo-800 text-sm font-medium cursor-default">
                                <!-- Date and Time -->
                                <p id="weekday"></p>
                                <p id="date" class="border-l border-gray-300 pl-4"></p>
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
                                setInterval(updateDateTime, 1000);
                                updateDateTime();
                            </script>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container fixed top-20 lg:top-[90px]">
                <div class="mx-auto text-sm">
                    <div class="custom-scroller w-32 lg:w-64 p-2 pb-40 bg-indigo-800 max-h-screen text-gray-200 overflow-y-scroll">
                        <!-- Side Navigation Bar -->
                        <button class="w-full text-left py-2.5 px-1 lg:p-3 hover:bg-indigo-600 hover:text-amber-300 rounded-md lg:pt-8 lg:pb-2">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-sm lg:text-lg px-1 lg:px-4">Home</p>
                            </div>
                        </button>
                        <button class="w-full text-left py-2 px-1 lg:p-2.5 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m30,20v34h-5l-1.89-3.79c-.76-1.51-1.88-2.21-3.58-2.21H6V12h16c4.94,0,8,3.06,8,8Zm12-8c-4.94,0-8,3.06-8,8v34h5l1.89-3.79c.76-1.51,1.88-2.21,3.58-2.21h13.53V12h-16Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-sm px-1 lg:hidden">Records</p>
                                <p class="font-semibold hidden lg:block text-lg px-4 mr-2">Case Records</p>
                                <svg class="h-5 w-5 hidden lg:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Case Record List</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Add a New Case Record</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Import a CSV File: Case Record</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">List of Complaints</p>
                        </button>
                        <button class="w-full text-left py-2 px-1 lg:p-2.5 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-sm lg:text-lg px-1 lg:px-4 lg:mr-14">Reports</p>
                                <svg class="h-5 w-5 hidden lg:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Violators Report</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Students List</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">GMC Requests</p>
                        </button>
                        <button class="w-full text-left py-2 px-1 lg:p-2.5 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m56,10.83l-4.22,6.49c-2.72,4.18-4.88,6.85-8.41,10.38l-10.3,10.3-7.07-7.07,10.3-10.3c3.53-3.53,6.19-5.69,10.38-8.41l6.49-4.22,2.83,2.83Zm-32.39,23.37l6.2,6.2-5.8,11.61h-4.44c-2.37,0-3.98.67-5.66,2.34l-1.66,1.66-4.24-4.24,1.66-1.66c1.68-1.68,2.34-3.29,2.34-5.66v-4.44l11.61-5.8Zm-.61,9.8c0-1.66-1.34-3-3-3s-3,1.34-3,3,1.34,3,3,3,3-1.34,3-3Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-sm px-1 lg:hidden">Admin</p>
                                <p class="font-semibold hidden lg:block text-lg px-4">Administrator</p>
                                <svg class="h-5 w-5 hidden lg:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Colleges and Courses</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Students Manager</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Violations Manager</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">OSDS Employees</p>
                        </button>
                        <button class="w-full text-left py-2 px-1 lg:p-2.5 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m55.89,18.44l3.66-2.71-1.53-3.7-4.51.67c-.65-.84-1.39-1.58-2.21-2.21l.67-4.5-3.7-1.53-2.71,3.66c-1.03-.14-2.08-.14-3.13,0l-2.71-3.66-3.7,1.53.67,4.51c-.84.64-1.58,1.39-2.21,2.21l-4.5-.67-1.53,3.7,3.66,2.71c-.14,1.03-.14,2.08,0,3.13l-3.66,2.71,1.53,3.7,4.51-.67c.64.84,1.39,1.58,2.21,2.21l-.67,4.5,3.7,1.53,2.71-3.66c1.03.14,2.08.14,3.13,0l2.71,3.66,3.7-1.53-.67-4.51c.84-.64,1.58-1.39,2.21-2.21l4.5.67,1.53-3.7-3.66-2.71c.14-1.03.14-2.08,0-3.13Zm-11.89,7.56c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Zm-13.62,12.01l2.34-3.91-2.83-2.83-3.91,2.34c-.9-.52-1.87-.92-2.89-1.19l-1.11-4.42h-4l-1.11,4.42c-1.02.27-1.99.68-2.89,1.19l-3.91-2.34-2.83,2.83,2.34,3.91c-.52.9-.92,1.87-1.19,2.89l-4.42,1.11v4l4.42,1.11c.27,1.02.68,1.99,1.19,2.89l-2.34,3.91,2.83,2.83,3.91-2.34c.9.52,1.87.92,2.89,1.19l1.11,4.42h4l1.11-4.42c1.02-.27,1.99-.68,2.89-1.19l3.91,2.34,2.83-2.83-2.34-3.91c.52-.9.92-1.87,1.19-2.89l4.42-1.11v-4l-4.42-1.11c-.27-1.02-.68-1.99-1.19-2.89Zm-10.38,11.99c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-sm lg:text-lg px-1 lg:px-4 lg:mr-12">Settings</p>
                                <svg class="h-5 w-5 hidden lg:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Profile and Information</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Activity and Shortcut</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p class="text-xs lg:text-base">Display and Keyboard</p>
                        </button>
                        <button class="w-full text-left pl-3 mt-8 py-1.5 px-0.5 lg:p-2 hover:bg-red-300 hover:text-white text-red-300 rounded">
                            <div class="flex items-center">
                                <svg class="h-5 w-5" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m34,44h6v12H10V8h30v12h-6v-6h-18v36h18v-6Zm15.24-25l-4.24,4.24,5.76,5.76h-16.76v6h16.76l-5.76,5.76,4.24,4.24,13-13-13-13Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xs lg:text-base lg:px-4">Log Out</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <!-- <header>
                <div id="logo">HTML</div>
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/link">Page</a></li>
                    </ul>
                </nav>
            </header>
            <article>
                <h2>Title 1</h2>
                <p>Content 1</p>
            </article>
            <article>
                <h2>Title 2</h2>
                <p>Content 2</p>
            </article>
            <section>A group of related content</section>
            <aside>Sidebar</aside>
            <footer>
                <p>&copy; HTML CheatSheet</p>
                <address>Contact <a href="mailto:me@html6.com">me</a></address>
            </footer> -->
            <div class="relative text-gray-200 mt-12 ml-32 lg:mt-[90px] lg:ml-64">
                <div class="relative bg-white m-4 p-16 rounded-xl shadow-md container text-xs font-medium max-w-5xl 2xl:max-w-7xl">
                    <header class="relative cursor-default">
                        <h2 class="text-4xl font-bold text-indigo-800 text-center">Students List</h2>
                    </header>
                    <div class="relative flex justify-evenly items-center mt-4 text-slate-600">
                        <div class="flex text-center cursor-pointer hover:text-amber-600 p-1 rounded-full hover:bg-slate-50">
                            <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                <path fill-rule="evenodd" d="m56,40h-22.24v14h-3.76L8,32,30,10h3.76v14h22.24v16Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="py-3 px-32 border-b border-slate-400">
                            <label class="text-lg font-semibold leading-6 text-gray-700">
                                <span>All Colleges</span>
                            </label>
                        </div>
                        <div class="flex text-center cursor-pointer hover:text-amber-600 p-1 rounded-full hover:bg-slate-50">
                            <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                <path fill-rule="evenodd" d="m56,32l-22,22h-3.76v-14H8v-16h22.24v-14h3.76l22,22Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <label class="relative flex mt-16 mx-8 text-sm font-medium text-gray-700">
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
                    <table class="table-fixed bg-white shadow border border-gray-300">
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
                      <tbody class="text-black text-center">
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">20230001</td>
                            <td class="py-2 px-4">Plagiarism</td>
                            <td class="py-2 px-4">Copied content from the internet</td>
                            <td class="py-2 px-4">2023-12-01</td>
                            <td class="py-2 px-4">Pending</td>
                            <td class="py-2 px-4 text-yellow-600">Engineering</td>
                            <td class="py-2 px-4">Computer Science</td>
                        </tr>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                          <td class="py-2 px-4">2</td>
                          <td class="py-2 px-4">20230002</td>
                          <td class="py-2 px-4">Cheating</td>
                          <td class="py-2 px-4">Used unauthorized materials</td>
                          <td class="py-2 px-4">2023-12-02</td>
                          <td class="py-2 px-4">Resolved</td>
                          <td class="py-2 px-4 text-green-800">Business</td>
                          <td class="py-2 px-4">Finance</td>
                        </tr>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                          <td class="py-2 px-4">3</td>
                          <td class="py-2 px-4">20230003</td>
                          <td class="py-2 px-4">Disruptive Behavior</td>
                          <td class="py-2 px-4">Interrupted the class</td>
                          <td class="py-2 px-4">2023-12-03</td>
                          <td class="py-2 px-4">Under Investigation</td>
                          <td class="py-2 px-4 text-red-800">Arts</td>
                          <td class="py-2 px-4">History</td>
                        </tr>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">4</td>
                            <td class="py-2 px-4">20230004</td>
                            <td class="py-2 px-4">Plagiarism</td>
                            <td class="py-2 px-4">Copying from a classmate</td>
                            <td class="py-2 px-4">2023-12-04</td>
                            <td class="py-2 px-4">Pending</td>
                            <td class="py-2 px-4 text-yellow-800">Science</td>
                            <td class="py-2 px-4">Biology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">5</td>
                            <td class="py-2 px-4">20230005</td>
                            <td class="py-2 px-4">Cheating</td>
                            <td class="py-2 px-4">Using cheat sheets during an exam</td>
                            <td class="py-2 px-4">2023-12-05</td>
                            <td class="py-2 px-4">Resolved</td>
                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                            <td class="py-2 px-4">Psychology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">6</td>
                            <td class="py-2 px-4">20230006</td>
                            <td class="py-2 px-4">Cheating</td>
                            <td class="py-2 px-4">Using cheat sheets during an exam</td>
                            <td class="py-2 px-4">2023-12-05</td>
                            <td class="py-2 px-4">Resolved</td>
                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                            <td class="py-2 px-4">Psychology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">7</td>
                            <td class="py-2 px-4">20230007</td>
                            <td class="py-2 px-4">Cheating</td>
                            <td class="py-2 px-4">Using cheat sheets during an exam</td>
                            <td class="py-2 px-4">2023-12-05</td>
                            <td class="py-2 px-4">Resolved</td>
                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                            <td class="py-2 px-4">Psychology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">8</td>
                            <td class="py-2 px-4">20230008</td>
                            <td class="py-2 px-4">Cheating</td>
                            <td class="py-2 px-4">Using cheat sheets during an exam</td>
                            <td class="py-2 px-4">2023-12-05</td>
                            <td class="py-2 px-4">Resolved</td>
                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                            <td class="py-2 px-4">Psychology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">9</td>
                            <td class="py-2 px-4">20230009</td>
                            <td class="py-2 px-4">Cheating</td>
                            <td class="py-2 px-4">Using cheat sheets during an exam</td>
                            <td class="py-2 px-4">2023-12-05</td>
                            <td class="py-2 px-4">Resolved</td>
                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                            <td class="py-2 px-4">Psychology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white" onclick="window.location.href='#';">
                            <td class="py-2 px-4">10</td>
                            <td class="py-2 px-4">20230010</td>
                            <td class="py-2 px-4">Cheating</td>
                            <td class="py-2 px-4">Using cheat sheets during an exam</td>
                            <td class="py-2 px-4">2023-12-05</td>
                            <td class="py-2 px-4">Resolved</td>
                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                            <td class="py-2 px-4">Psychology</td>
                          </tr>
                          <!-- Add a New Case Record -->
                          <!-- <tr class="odd:bg-slate-50 even:bg-gray-300 text-base font-medium hover:bg-amber-600 cursor-pointer text-slate-300 hover:text-white animate-bounce" onclick="window.location.href='#';">
                            <td class="py-1 px-4 text-slate-800">+</td>
                            <td class="py-1 px-4">+</td>
                            <td class="py-1 px-4">+</td>
                            <td class="py-1 px-4">+</td>
                            <td class="py-1 px-4">+</td>
                            <td class="py-1 px-4">+</td>
                            <td class="py-1 px-4">+</td>
                            <td class="py-1 px-4 text-slate-800">+</td>
                          </tr> -->
                        </tbody>
                    </table>
                    <div class="relative flex justify-between py-8 px-10 mt-2 text-black">
                        <div class="cursor-default">
                            <span>Showing records</span>
                        </div>
                        <div class="flex justify-evenly space-x-2 font-medium text-base">
                            <label>
                                <input type="radio" name="choose-page" class="peer hidden"/>
                                <span class="py-2 px-4 cursor-pointer hover:bg-amber-500 hover:text-slate-300 peer-checked:bg-amber-600 peer-checked:text-white rounded-full">1</span>
                            </label>
                            <label>
                                <input type="radio" name="choose-page" class="peer hidden"/>
                                <span class="py-2 px-3.5 cursor-pointer hover:bg-amber-500 hover:text-slate-300 peer-checked:bg-amber-600 peer-checked:text-white rounded-full">2</span>
                            </label>
                            <label>
                                <input type="radio" name="choose-page" class="peer hidden"/>
                                <span class="py-2 px-3.5 cursor-pointer hover:bg-amber-500 hover:text-slate-300 peer-checked:bg-amber-600 peer-checked:text-white rounded-full">3</span>
                            </label>
                            <label>
                                <input type="radio" name="choose-page" class="peer hidden"/>
                                <span class="py-2 px-3.5 cursor-pointer hover:bg-amber-500 hover:text-slate-300 peer-checked:bg-amber-600 peer-checked:text-white rounded-full">4</span>
                            </label>
                            <label>
                                <input type="radio" name="choose-page" class="peer hidden"/>
                                <span class="py-2 px-3.5 cursor-pointer hover:bg-amber-500 hover:text-slate-300 peer-checked:bg-amber-600 peer-checked:text-white rounded-full">5</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="logo" class="relative flex justify-end gap-x-1 lg:gap-x-4 opacity-50">
                <p class="text-xs text-indigo-800 font-light lg:font-medium cursor-default">Discipline Module</p>
                <img class="h-4 w-4 lg:h-6 lg:w-6" src="{{ asset('assets/plm-logo.png') }}"/>
            </div>
        </main>
    </body>
</html>