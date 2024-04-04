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
                src: url("assets/aston-script.woff");
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
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
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
                    <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold lg:px-8 p-2 rounded" onclick="location.href='plm-student-dashboard.html'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Home</p>
                    </button>
                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-1.5 lg:col-span-3">
                    <img class="hidden lg:block h-12 w-auto selection:bg-transparent" alt="PLM Logo" src="assets/plm-logo--with-header.png"/>
                    <img class="lg:hidden block h-8 w-8 selection:bg-transparent" src="assets/plm-logo-hd.png"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-7 lg:col-span-5 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-12 w-12 selection:bg-transparent" src="assets/osdslogo.png"/>
                    <h1 class="text-sm lg:text-xl font-light">The Office of Student Development and Services</h1>
                    <img class="lg:hidden h-8 w-8 selection:bg-transparent" src="assets/osdslogo.png"/>
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
                </script>
            </header>
            <article class="grid grid-cols-7">
                <div class="col-span-3 mr-3">
                    <div class="bg-white border-r border-b border-indigo-800 py-6 px-4">
                        <p class="text-center text-3xl font-thin tracking-widest">Welcome</p>
                        <div class="text-sm mt-6 grid grid-cols-2">
                            <p>Full Name:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">Dean Name</p>
                            <p>Role:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">College Dean</p>
                            <p>College:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">CISTM</p>
                            <p>Department:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">CompScie Dept</p>
                        </div>
                    </div>
                    <div class="bg-white mt-6 border-r border-y border-indigo-800 max-h-96 h-96 py-6 px-4">
                        <div class="border-b border-indigo-300 pb-1.5">
                            <p class="tracking-widest font-light">Complaints List</p>
                        </div>
                        <p class="text-xs font-light tracking-widest text-indigo-500">Hover table to inspect the complaint</p>
                        <table class="table table-fixed w-full border border-indigo-300 text-sm font-thin text-indigo-800">
                            <thead class="bg-indigo-600 text-white text-center">
                                <tr>
                                    <th class="p-1">Complaint ID</th>
                                    <th class="p-1">College</th>
                                    <th class="p-1">Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                    <td>238428237</td>
                                    <td>Engineering</td>
                                    <td>Computer Science</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-span-4 bg-white">
                    <div class="border-l border-b border-indigo-800 h-full py-4">
                        <div class="flex flex-row justify-evenly flex items-center text-center">
                            <img class="h-8 w-8 lg:h-14 lg:w-14" src="assets/plm-logo.png"/>
                            <div class="cursor-default">
                                <p class="font-semibold text-xs lg:text-lg">PAMANTASAN NG LUNGSOD NG MAYNILA</p>
                                <p class="text-xs lg:text-sm italic">(University of the City of Manila)</p>
                                <p class="text-xs lg:text-sm font-medium">Intramuros, Manila</p>
                            </div>
                            <img class="h-8 w-8 lg:h-14 lg:w-14" src="assets/osdslogo.png"/>
                        </div>
                        <div class="cursor-default flex flex-col items-center text-center">
                            <p style="font-family: Aston Script;" class="mt-10 text-xs md:text-sm lg:text-base">Office of Student Development and Services</p>
                            <p class="text-sm md:text-md lg:text-xl font-bold mt-4">COMPLAINT REPORT FORM</p>
                        </div>
                        <div class="mt-8">
                            <p class="ml-4 lg:ml-20 text-xs lg:text-base font-medium cursor-default">Complaint Information:</p>
                        </div>
                        <form class="px-6 lg:px-20">
                            <div class="mt-4">
                                <div class="text-xs lg:text-sm space-y-2">
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="cursor-default md:hidden">Stud Name:</p>
                                        <p class="cursor-default hidden md:block">Student Name:</p>
                                        <input type="text" class="text-sm w-64 2xl:w-80 px-2 border-b border-indigo-800 font-light focus:outline-none" placeholder="Student Name"/>
                                    </div>
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="cursor-default">Course:</p>
                                        <input type="text" class="text-sm w-64 2xl:w-80 px-2 border-b border-indigo-800 font-light focus:outline-none" placeholder="Course Name"/>
                                    </div>
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="cursor-default">College:</p>
                                        <input type="text" class="text-sm w-64 2xl:w-80 px-2 border-b border-indigo-800 font-light focus:outline-none" placeholder="College Name"/>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs lg:text-sm space-y-2">
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="cursor-default md:hidden">Stud No:</p>
                                        <p class="cursor-default hidden md:block">Student Number:</p>
                                        <input type="number" class="text-sm px-2 w-64 2xl:w-64 border-b border-indigo-800 font-light focus:outline-none" placeholder="0000-00000"/>
                                    </div>
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="cursor-default">Year & Block:</p>
                                        <input type="text" class="text-sm px-2 w-64 2xl:w-64 border-b border-indigo-800 font-light focus:outline-none" placeholder="Y, 0"/>
                                    </div>
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="cursor-default">Date and Time:</p>
                                        <input type="datetime" class="text-sm px-2 w-64 2xl:w-64 border-b border-indigo-800 font-light focus:outline-none" placeholder="DD/MM/YYYY, 00:00 XX"/>
                                    </div>
                                </div>
                            </div>
                            <div class="container border border-slate-600 w-full mt-4">
                                <p class="text-center text-xs lg:text-sm cursor-default">Nature and Cause of Allegation</p>
                                <textarea maxlength="500" class="w-full h-20 custom-scroller text-sm font-light p-1 px-2 shadow border-t border-slate-600 focus:outline-none placeholder:text-xs focus:placeholder:invisible" placeholder="max of 500 characters"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <footer class="bg-white mt-6 border-t border-indigo-800 h-20">

            </footer>
        </main>
    </body>
</html>