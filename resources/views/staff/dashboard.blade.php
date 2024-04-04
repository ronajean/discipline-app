<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta http-equiv="refresh" content="5">
        <title>OSDS Head Perspective</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer="defer" src="http://cheatsheet/static/js/main.ebcf0544.js"></script>
        <style>

        </style>
    </head>
    <body class="selection:bg-amber-600 selection:text-white">
        <main class="tracking-wide min-h-screen grid content-start">
            <div class="border-b-2 border-gray-300">
                <div class="container py-2 mx-auto">
                    <div class="flex flex-col lg:items-center lg:justify-center lg:flex-row lg:space-x-56">
                        <div class="flex flex-col items-center sm:flex-row sm:justify-center">
                            <div class="relative sm:w-96 xl:w-80 2xl:w-96 sm:mx-auto lg:m-0 sm:ml-2">
                                <img class="h-16 w-auto selection:bg-transparent" alt="PLM Logo" src="https://plm.edu.ph/images/ui/plm-logo--with-header.png"/>
                            </div>
                            <div class="relative sm:w-96 xl:w-80 2xl:w-96 sm:mx-auto lg:m-0">
                                <h1 class="flex items-center pl-2 mt-2 text-sm font-semibold text-indigo-800 text-gray-600 dark:text-gray-300 lg:mt-0">Office of Student Development and Services</h1>
                                <input class="w-full h-10 mt-2 px-2 text-gray-700 bg-white border border-gray-200 rounded-lg peer dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-primary dark:focus:border-primary focus:outline-none focus:ring focus:ring-amber-300 focus:ring-primary dark:placeholder-gray-400 focus:ring-opacity-40" type="text" placeholder="Search anything..."/>
                            </div>
                        </div>
                        
                        <div class="flex flex-row mt-4 space-y-3 lg:mt-0 space-y-0 space-x-3 items-center justify-center">
                            <!-- User Profile -->
                            <!-- <img class="h-16 w-16" alt="User Profile" src=""/> -->
                            <button class="transition-colors duration-300 transform rounded-full border-4 border-transparent hover:border-4 hover:border-amber-300 hover:bg-amber-300 focus:outline-none">
                                <svg class="rounded-full text-gray-400 h-16 w-16" viewBox="7 7 50 50" fill="currentColor">
                                    <path fill-rule="evenodd" d="m32,8c-13.25,0-24,10.75-24,24s10.75,24,24,24,24-10.75,24-24-10.75-24-24-24Zm13.25,36.16c-2.71-3.93-7.29-6.16-13.25-6.16s-10.54,2.23-13.25,6.16c-2.94-3.2-4.75-7.46-4.75-12.16,0-9.94,8.06-18,18-18s18,8.06,18,18c0,4.69-1.81,8.95-4.75,12.16Zm-5.25-18.16c0,4.94-3.06,8-8,8s-8-3.06-8-8,3.06-8,8-8,8,3.06,8,8Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <div class="truncate max-w-40 w-40 text-indigo-800">
                                <p class="text-lg font-semibold">Full Name</p>
                                <p>Email</p>
                            </div>
                            
                            <div class="text-right text-indigo-800 text-sm font-medium">
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


            <div class="container">
                <div class="grid grid-cols-12 mx-auto text-sm">
                    <div class="col-span-3 p-2 bg-indigo-800 text-gray-200">
                        <!-- Side Navigation Bar -->
                        <button class="w-full text-left p-3 hover:bg-indigo-600 hover:text-amber-300 rounded-md pt-8 pb-2">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xl px-4">Home</p>
                                <svg class="items-right h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-3 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m54,18v38h-30.69c-2.37,0-3.98-.67-5.66-2.34l-5.31-5.31c-1.68-1.68-2.34-3.29-2.34-5.66V8h34v38h-25.52l4,4h25.52V18h6Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xl px-4 mr-2">Case Records</p>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600">
                            <p>Case Record List</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600">
                            <p>Add a New Case Record</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600">
                            <p>Import a CSV File: Case Record</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600">
                            <p>List of Complaints</p>
                        </button>
                        <button class="w-full text-left p-3 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xl px-4 mr-14">Reports</p>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Violators Report</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Students List</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>GMC Requests</p>
                        </button>
                        <button class="w-full text-left p-3 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m56,10.83l-4.22,6.49c-2.72,4.18-4.88,6.85-8.41,10.38l-10.3,10.3-7.07-7.07,10.3-10.3c3.53-3.53,6.19-5.69,10.38-8.41l6.49-4.22,2.83,2.83Zm-32.39,23.37l6.2,6.2-5.8,11.61h-4.44c-2.37,0-3.98.67-5.66,2.34l-1.66,1.66-4.24-4.24,1.66-1.66c1.68-1.68,2.34-3.29,2.34-5.66v-4.44l11.61-5.8Zm-.61,9.8c0-1.66-1.34-3-3-3s-3,1.34-3,3,1.34,3,3,3,3-1.34,3-3Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xl px-4">Administrator</p>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Colleges and Courses</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Students Manager</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Violations Manager</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>OSDS Employees</p>
                        </button>
                        <button class="w-full text-left p-3 hover:bg-indigo-600 hover:text-amber-300 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-8 w-8" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m55.89,18.44l3.66-2.71-1.53-3.7-4.51.67c-.65-.84-1.39-1.58-2.21-2.21l.67-4.5-3.7-1.53-2.71,3.66c-1.03-.14-2.08-.14-3.13,0l-2.71-3.66-3.7,1.53.67,4.51c-.84.64-1.58,1.39-2.21,2.21l-4.5-.67-1.53,3.7,3.66,2.71c-.14,1.03-.14,2.08,0,3.13l-3.66,2.71,1.53,3.7,4.51-.67c.64.84,1.39,1.58,2.21,2.21l-.67,4.5,3.7,1.53,2.71-3.66c1.03.14,2.08.14,3.13,0l2.71,3.66,3.7-1.53-.67-4.51c.84-.64,1.58-1.39,2.21-2.21l4.5.67,1.53-3.7-3.66-2.71c.14-1.03.14-2.08,0-3.13Zm-11.89,7.56c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Zm-13.62,12.01l2.34-3.91-2.83-2.83-3.91,2.34c-.9-.52-1.87-.92-2.89-1.19l-1.11-4.42h-4l-1.11,4.42c-1.02.27-1.99.68-2.89,1.19l-3.91-2.34-2.83,2.83,2.34,3.91c-.52.9-.92,1.87-1.19,2.89l-4.42,1.11v4l4.42,1.11c.27,1.02.68,1.99,1.19,2.89l-2.34,3.91,2.83,2.83,3.91-2.34c.9.52,1.87.92,2.89,1.19l1.11,4.42h4l1.11-4.42c1.02-.27,1.99-.68,2.89-1.19l3.91,2.34,2.83-2.83-2.34-3.91c.52-.9.92-1.87,1.19-2.89l4.42-1.11v-4l-4.42-1.11c-.27-1.02-.68-1.99-1.19-2.89Zm-10.38,11.99c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xl px-4 mr-12">Settings</p>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenoff"></path>
                                </svg>
                            </div>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Profile and Information</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Activity and Shortcut</p>
                        </button>
                        <button class="w-full text-left p-2 pl-8 hover:bg-indigo-600 hover:text-amber-300">
                            <p>Display and Keyboard</p>
                        </button>
                        
                        <button class="w-full text-left p-2 pl-8 hover:bg-red-300 hover:text-white text-red-300 font-semibold text-lg rounded">
                            <p>Log Out</p>
                        </button>
                    </div>
                    <div class="col-span-9 bg-white">
                        <p class="text-center p-4 font-medium text-xl text-indigo-800">Welcome User</p>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>