<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width intial-scale=1.0">
        <title>PLM Student OSDS Complaint Form</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

        <style>
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
            input::-webkit-search-cancel-button {
                -webkit-appearance: none;
                margin: 0;
            }

            :root {
                --form-control-indigo-color: rgb(85, 39, 255);
                --form-control-amber-color: #d3910d;
            }
            
            input[name="indigo"] {
            -webkit-appearance: none;
            appearance: none;
            background-color: var(--form-background);
            margin: 0;
            
            font: inherit;
            color: currentColor;
            width: 0.95em;
            height: 0.95em;
            border: 0.09em solid rgb(0, 34, 100);
            border-radius: 0.15em;
            transform: translateY(-0.075em);
            
            display: grid;
            place-content: center;
            cursor: pointer;
            }
            
            input[name="indigo"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            transform: scale(0);
            transform-origin: center;
            transition: 100ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-amber-color);
            /* Windows High Contrast Mode */
            background-color: CanvasText;
            }
            
            input[type="checkbox"]:checked::before {
            transform: scale(1);
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
                    <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 lg:px-8 active:bg-amber-300 active:font-semibold p-2 rounded" onclick="location.href='plm-student-dashboard.html'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Home</p>
                    </button>
                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-1.5 lg:col-span-3">
                    <img class="hidden lg:block h-12 w-auto selection:bg-transparent" alt="PLM Logo" src="assets/plm-logo--with-header.png"/>
                    <img class="lg:hidden block h-8 w-8" src="assets/plm-logo-hd.png"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-7 lg:col-span-5 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-12 w-12" src="assets/osdslogo.png"/>
                    <h1 class="text-sm lg:text-xl font-light">The Office of Student Development and Services</h1>
                    <img class="lg:hidden h-8 w-8" src="assets/osdslogo.png"/>
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
            <article class="grid grid-cols-6">
                <aside class="bg-indigo-800 text-white h-screen relative">
                    <button class="text-amber-600 bg-amber-300 font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='student-complaint-report.html'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Complaint Report</p>
                        <p class="lg:hidden text-xs">Report</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='plm-student-manual.html'">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Student Manual</p>
                        <p class="lg:hidden text-xs">Manual</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='student-gmc-status.html'">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">GMC Certificate</p>
                        <p class="lg:hidden text-xs">GMC</p>
                    </button>
                    <button class="hover:bg-red-200 hover:text-red-600 active:bg-red-400 active:font-semibold flex flex-row items-center justify-center w-full p-4 space-x-2 mt-52" onclick="location.href='login-page.html'">
                        <svg class="h-5 w-5" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m34,44h6v12H10V8h30v12h-6v-6h-18v36h18v-6Zm15.24-25l-4.24,4.24,5.76,5.76h-16.76v6h16.76l-5.76,5.76,4.24,4.24,13-13-13-13Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Log Out</p>
                    </button>
                    <div class="absolute bottom-1 left-2">
                        <p class="text-xs font-thin text-indigo-300">Discipline Module</p>
                    </div>
                </aside>
                <div class="col-span-5">
                    <div class="col-span-5">
                        <header class="bg-white flex flex-row justify-between items-end px-4 py-6">
                            <p class="text-3xl font-thin tracking-widest">Student Complaint</p>
                            <button class="p-2 rounded border border-indigo-800 hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" onclick="location.href='student-complaint-report.html'">
                                <p class="text-sm">Go back</p>
                            </button>
                        </header>
                        <aside class="bg-white p-4 space-y-4 border-b border-indigo-800">
                            <div class="flex items-end">
                                <div class="grid grid-cols-6 text-sm gap-2">
                                    <p>Student Number:</p>
                                    <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">101101101</p>
                                    <p class="col-start-1">Student Name:</p>
                                    <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">Jerome Caladiao</p>
                                    <p class="col-start-1">Date & Time Sent:</p>
                                    <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">DD/MM/YY, 00:00 XX</p>
                                </div>
                            </div>
                            <div class="text-sm space-y-4">
                                <div class="grid grid-cols-12">
                                    <p class="col-span-3">Date and Time Happened:</p>
                                    <div class="flex flex-row col-span-5">
                                        <input type="date" placeholder="DD/MM/YYYY, 00:00 XX" class="w-full border placeholder:text-indigo-300 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 tracking-widest border-indigo-300 focus:border-indigo-800 p-2 focus:outline-none"/>
                                        <input type="time" placeholder="DD/MM/YYYY, 00:00 XX" class="w-full border placeholder:text-indigo-300 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 tracking-widest border-indigo-300 focus:border-indigo-800 p-2 focus:outline-none"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12">
                                    <p class="col-span-3">Location:</p>
                                    <input type="text" placeholder="Location" class="col-span-5 placeholder:text-indigo-300 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 tracking-widest w-full border border-indigo-300 focus:border-indigo-800 p-2 focus:outline-none"/>
                                </div>
                                <div class="grid grid-cols-12">
                                    <p class="col-span-3">Description (if necessary):</p>
                                    <textarea type="text" maxlength="500" class="border border-indigo-300 placeholder:text-indigo-300 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 tracking-widest focus:border-indigo-800 p-2 min-h-40 max-h-48 w-full col-span-5 focus:outline-none" title="hold & drag lower-right corner of the box to adjust its size" placeholder="Be direct as possible. (max of 500 characters)"></textarea>
                                </div>
                            </div>
                            <div x-data="{isOpen15:false}" class="flex justify-end pr-4 pb-4">
                                <button @click="isOpen15 = !isOpen15" id="proceed" type="button" class="p-2 disabled:cursor-not-allowed disabled:text-indigo-200 disabled:bg-indigo-50 disabled:font-light disabled:shadow-indigo-50 hover:bg-amber-50 hover:text-amber-600 rounded shadow-sm shadow-indigo-600 hover:shadow-amber-600 active:bg-amber-300 font-semibold" title="Send">
                                    <p>Send</p>
                                </button>
                                <div x-show="isOpen15" class="fixed inset-0 z-10 bg-black bg-opacity-50 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">
                                    <div class="relative top-1/3 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                        <p class="border-b border-amber-300 font-thin text-2xl tracking-widest">Sent</p>
                                        <p class="pt-6 font-light">Your complaint is successfully sent.<br>We will look upon the complaint.</p>
                                        <div class="mt-3 flex justify-end">
                                            <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50 hover:text-indigo-800 active:bg-indigo-200 active:font-semibold" onclick="location.href='student-complaint-report.html'">
                                                <p class="text-xs">Go back</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>