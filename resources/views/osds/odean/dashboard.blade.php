<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>OSDS Dean Dashboard</title>
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
                    background: rgb(8, 39, 255);
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
                <div class="flex flex-row justify-evenly items-center col-span-2">
                    <button class="hover:bg-amber-50 p-2 rounded hover:text-amber-600 active:bg-amber-300">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                        </svg>                      
                    </button>
                    <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 lg:px-4 active:bg-amber-300 active:font-semibold p-2 rounded" 
                                onclick="location.href='{{ route('odean.dashboard') }}'" >
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Home</p>
                    </button>
                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-2.5 lg:col-span-2">
                    <img class="hidden lg:block h-10 w-auto selection:bg-transparent" alt="PLM Logo" src="assets/plm-logo--with-header.png"/>
                    <img class="lg:hidden block h-8 w-8" src="assets/plm-logo-hd.png"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-5 lg:col-span-4 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-10 w-10" src="assets/osdslogo.png"/>
                    <div class="flex flex-col">
                        <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                        <input type="text" placeholder="Search anything..." class="focus:outline-none rounded border border-indigo-500 text-xs p-1 placeholder:text-indigo-300 px-2 focus:border-indigo-800"/>
                    </div>
                    <img class="lg:hidden h-8 w-8" src="assets/osdslogo.png"/>
                </div>
                <div class="col-span-2 flex flex-row justify-end space-x-4 items-end">
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
                <div class="text-xs lg:text-sm font-light text-right border-l border-indigo-300 col-span-2">
                    <!-- Date and Time -->
                    <p id="weekday"></p>
                    <p id="date"></p>
                    <p id="time"></p>
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
                        <button class="w-full text-left pl-3 mt-8 py-1.5 px-0.5 lg:p-2 hover:bg-red-300 hover:text-white text-red-300 rounded" >
                            <div class="flex items-center">
                                <svg class="h-5 w-5" viewBox="0 0 64 64" fill="currentColor">
                                    <path fill-rule="evenodd" d="m34,44h6v12H10V8h30v12h-6v-6h-18v36h18v-6Zm15.24-25l-4.24,4.24,5.76,5.76h-16.76v6h16.76l-5.76,5.76,4.24,4.24,13-13-13-13Z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-semibold text-xs lg:text-base lg:px-4">Log Out</p>
                            </div>
                        </button>
                    </div>
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
                             onclick="location.href='{{ route('odean.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2"
                                    onclick="location.href='{{ route('odean.caserecord') }}'">
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
                        <p>Reports</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,10.83l-4.22,6.49c-2.72,4.18-4.88,6.85-8.41,10.38l-10.3,10.3-7.07-7.07,10.3-10.3c3.53-3.53,6.19-5.69,10.38-8.41l6.49-4.22,2.83,2.83Zm-32.39,23.37l6.2,6.2-5.8,11.61h-4.44c-2.37,0-3.98.67-5.66,2.34l-1.66,1.66-4.24-4.24,1.66-1.66c1.68-1.68,2.34-3.29,2.34-5.66v-4.44l11.61-5.8Zm-.61,9.8c0-1.66-1.34-3-3-3s-3,1.34-3,3,1.34,3,3,3,3-1.34,3-3Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Administrator</p>
                        <p class="lg:hidden text-xs">Admin</p>
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
                <div class="col-span-3">
                    <div class="bg-white h-full border-r border-indigo-800">
                        <p class="text-3xl text-center tracking-widest py-6">Welcome</p>
                        <div class="border-b border-indigo-300 pb-1.5 mx-20">
                            <div class="grid grid-cols-6 font-mono text-xs max-w-lg flex items-center mx-6">
                                @foreach ($employees as $employee)
                                    <p class="col-start-1 text-base">Name:</p>
                                    <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 col-start-3 col-span-4">{{$employee->first_name}} {{$employee->last_name}}</p>
                                    <p class="col-start-1 text-base">Role:</p>
                                    <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 col-start-3 col-span-4">{{$employee->designation}}</p>
                                    <p class="col-start-1 text-base">Office:</p>
                                    <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 col-start-3 col-span-4">{{$employee->department}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
                <div class="col-start-5 col-span-2 pt-4 px-4 pl-10">
                    <div class="bg-white rounded-md shadow border border-indigo-800">
                        <div class="flex flex-row justify-center border-b border-indigo-300 py-2">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                            </svg>                          
                            <p>Notifications</p>
                        </div>
                        <div class="font-light text-sm pb-4 tracking-widest custom-scroller-small max-h-screen overflow-y-auto">
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                            <button class="hover:bg-amber-50 hover:text-amber-600 flex flex-row items-center justify-center w-full p-3 mt-4 space-x-2">
                                <p>Notification</p>
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </main>
    </body>