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
                                <img class="h-16 w-auto selection:bg-transparent" alt="PLM Logo" src="assets/plm-logo--with-header.png"/>
                            </div>
                            <div class="lg:hidden block">
                                <img class="h-10 w-10 lg:h-16 lg:w-16" src="assets/plm-logo.png"/>
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
                <!-- <p class="text-center p-4 font-medium text-xl text-indigo-800 cursor-default">Welcome User</p> -->
                <!-- <p class="text-indigo-800">Welcome User</p>
                <p class="text-right text-indigo-800">Welcome User</p> -->
                <div class="lg:grid lg:grid-cols-3 mt-4 space-x-8 mx-4">
                    <header class="lg:hidden bg-white p-4 rounded-lg text-black mt-10 shadow-lg max-h-56 max-w-80">
                        <p class="text-center text-indigo-800 font-medium text-xl cursor-default">Welcome User</p>
                        <div class="relative flex flex-row items-center mt-4 ml-4 space-x-4 text-xs">
                            <div class="bg-slate-100 py-10 px-2 border border-dashed border-slate-300 border-2 hover:bg-amber-100 text-slate-500 cursor-pointer">
                                <p>Profile Picture</p>
                            </div>
                            <div class="text-indigo-800 font-light space-y-1 cursor-default">
                                <p>Full Name</p>
                                <p>Role</p>
                                <p>College</p>
                                <p>Department</p>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href="#" class="relative inline-flex font-light text-white text-xs p-2 bg-indigo-800 rounded-md hover:bg-amber-600">Edit Profile</a>
                        </div>
                    </header>
                    <header class="hidden lg:block bg-white col-span-2 p-4 rounded-lg text-black mt-10 shadow-lg max-h-72">
                        <p class="text-center text-indigo-800 font-bold text-3xl cursor-default">Welcome User</p>
                        <div class="relative flex flex-row items-center mt-4 ml-4 space-x-4">
                            <div class="bg-slate-100 py-16 px-6 border border-dashed border-slate-300 border-2 hover:bg-amber-100 text-slate-500 cursor-pointer">
                                <p>Profile Picture</p>
                            </div>
                            <div class="text-indigo-800 font-medium space-y-2 cursor-default">
                                <p>Full Name</p>
                                <p>Role</p>
                                <p>College</p>
                                <p>Department</p>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href="#" class="relative inline-flex font-medium text-white text-sm p-2 bg-indigo-800 rounded-md hover:bg-amber-600">Edit Profile</a>
                        </div>
                    </header>
                    <article class="hidden lg:block bg-white p-1 rounded-lg text-black pb-8 shadow max-h-screen">
                        <div class="relative text-center mt-4 text-indigo-800 text-sm font-semibold cursor-default border-b mx-10 border-slate-300">
                            <h2 class="mb-1">Notifications</h2>
                        </div>
                        <div class="flex justify-center mt-16 space-y-4">
                            <div class="group relative">
                                <div class="mt-1 flex justify-center text-center">
                                    <svg class="w-20 h-20 text-gray-700 opacity-75" viewBox="0 0 64 64" fill="currentColor">
                                        <path d="m20,34H6v-4h14v4Zm-4.32-13.73l-3.46-2-2,3.46,3.46,2,2-3.46Zm1.59,33.25l3.46,2,7-12.12-3.46-2-7,12.12Zm10.46-32.91l-7-12.12-3.46,2,7,12.12,3.46-2Zm26.05,1.12l-2-3.46-3.46,2,2,3.46,3.46-2Zm-7.05-11.25l-3.46-2-7,12.12,3.46,2,7-12.12Zm-30.45,28.28l2,3.46,9.53-5.5-2-3.46-9.53,5.5Zm31.44-13.54l-2-3.46-9.53,5.5,2,3.46,9.53-5.5ZM10.22,42.27l2,3.46,3.46-2-2-3.46-3.46,2Zm38.11,1.46l3.46,2,2-3.46-3.46-2-2,3.46Zm-12.12-7l9.53,5.5,2-3.46-9.53-5.5-2,3.46Zm7.8-6.73v4h14v-4h-14Zm-27.72-4.77l9.53,5.5,2-3.46-9.53-5.5-2,3.46Zm19.99,18.16l7,12.12,3.46-2-7-12.12-3.46,2Zm-6.27,12.61h4v-4h-4v4Zm0-44h4v-4h-4v4Zm0,37h4v-11h-4v11Zm0-23h4v-11h-4v11Z"></path>
                                    </svg>
                                </div>
                                <div class="mt-16 text-center">
                                    <span class="text-sm font-light text-slate-500 cursor-default">You're up to date</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="bg-amber-600 mt-56 w-full pt-0.5 lg:p-0.5"></div>
                <div class="lg:hidden flex flex-col justify-center items-center text-center bg-white">
                    <div class="text-xs font-light ml-2 max-w-80">
                        <header class="relative pr-4 pt-8 cursor-default">
                            <h2 class="text-lg font-medium text-indigo-800">Students List</h2>
                            <p class="font-thin text-xs text-slate-600">Recent Update</p>
                        </header>
                        <table class="table-fixed bg-white shadow border border-gray-300">
                          <thead class="bg-indigo-800 text-white cursor-default">
                            <tr>
                              <th class="py-1 px-4">Student No</th>
                              <th class="py-1 px-4">Offense Type</th>
                              <th class="py-1 px-4">College</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white" onclick="window.location.href='#';">
                                <td class="py-2 px-4">20230001</td>
                                <td class="py-2 px-4">Plagiarism</td>
                                <td class="py-2 px-4 text-yellow-600">Engineering</td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white" onclick="window.location.href='#';">
                              <td class="py-2 px-4">20230002</td>
                              <td class="py-2 px-4">Cheating</td>
                              <td class="py-2 px-4 text-green-800">Business</td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white " onclick="window.location.href='#';">
                              <td class="py-2 px-4">20230003</td>
                              <td class="py-2 px-4">Disruptive Behavior</td>
                              <td class="py-2 px-4 text-red-800">Arts</td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white" onclick="window.location.href='#';">
                                <td class="py-2 px-4">20230004</td>
                                <td class="py-2 px-4">Plagiarism</td>
                                <td class="py-2 px-4 text-yellow-800">Science</td>
                            </tr>
                              <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white text-center" onclick="window.location.href='#';">
                                <td class="py-2 px-4">20230005</td>
                                <td class="py-2 px-4">Cheating</td>
                                <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                              </tr>
                            </tbody>
                        </table>
                        <div class="relative flex justify-end py-8">
                            <a href="#" class="text-xs p-2 rounded bg-indigo-800 hover:bg-amber-600">Check Student List</a>
                        </div>
                        <div id="logo" class="relative flex justify-end gap-x-1 lg:gap-x-4 opacity-30">
                            <p class="text-xs text-indigo-800 font-light lg:font-medium cursor-default">Discipline Module</p>
                            <img class="h-4 w-4 lg:h-6 lg:w-6" src="assets/plm-logo.png"/>
                        </div>
                    </div>
                </div>
                
                <div class="hidden lg:block container text-xs font-medium bg-white">
                    <header class="relative pr-4 pt-8 cursor-default">
                        <h2 class="text-4xl font-bold text-indigo-800 text-center">Students List</h2>
                        <p class="font-medium text-xs text-slate-600 text-right">Recent Update</p>
                    </header>
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
                      <tbody>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white text-center" onclick="window.location.href='#';">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">20230001</td>
                            <td class="py-2 px-4">Plagiarism</td>
                            <td class="py-2 px-4">Copied content from the internet</td>
                            <td class="py-2 px-4">2023-12-01</td>
                            <td class="py-2 px-4">Pending</td>
                            <td class="py-2 px-4 text-yellow-600">Engineering</td>
                            <td class="py-2 px-4">Computer Science</td>
                        </tr>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white text-center" onclick="window.location.href='#';">
                          <td class="py-2 px-4">2</td>
                          <td class="py-2 px-4">20230002</td>
                          <td class="py-2 px-4">Cheating</td>
                          <td class="py-2 px-4">Used unauthorized materials</td>
                          <td class="py-2 px-4">2023-12-02</td>
                          <td class="py-2 px-4">Resolved</td>
                          <td class="py-2 px-4 text-green-800">Business</td>
                          <td class="py-2 px-4">Finance</td>
                        </tr>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white text-center" onclick="window.location.href='#';">
                          <td class="py-2 px-4">3</td>
                          <td class="py-2 px-4">20230003</td>
                          <td class="py-2 px-4">Disruptive Behavior</td>
                          <td class="py-2 px-4">Interrupted the class</td>
                          <td class="py-2 px-4">2023-12-03</td>
                          <td class="py-2 px-4">Under Investigation</td>
                          <td class="py-2 px-4 text-red-800">Arts</td>
                          <td class="py-2 px-4">History</td>
                        </tr>
                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white text-center" onclick="window.location.href='#';">
                            <td class="py-2 px-4">4</td>
                            <td class="py-2 px-4">20230004</td>
                            <td class="py-2 px-4">Plagiarism</td>
                            <td class="py-2 px-4">Copying from a classmate</td>
                            <td class="py-2 px-4">2023-12-04</td>
                            <td class="py-2 px-4">Pending</td>
                            <td class="py-2 px-4 text-yellow-800">Science</td>
                            <td class="py-2 px-4">Biology</td>
                          </tr>
                          <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer text-black hover:text-white text-center" onclick="window.location.href='#';">
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
                    <div class="relative flex justify-end mr-4 py-8">
                        <a href="#" class="text-sm p-2 rounded-lg bg-indigo-800 hover:bg-amber-600">Check Student List</a>
                    </div>
                    <div id="logo" class="relative flex justify-end gap-x-1 lg:gap-x-4 opacity-50">
                        <p class="text-xs text-indigo-800 font-light lg:font-medium cursor-default">Discipline Module</p>
                        <img class="h-4 w-4 lg:h-6 lg:w-6" src="assets/plm-logo.png"/>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>