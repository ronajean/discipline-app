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
            input::-webkit-outer-spin-button,
            input::-webkit-search-cancel-button {
                -webkit-appearance: none;
                margin: 0;
            }

            th {
                padding:6px;
            }
            td {
                padding:3px;
            }
            
            :root {
                --form-control-color: rgb(85, 39, 255);
                --form-control-amber-color: #d3910d;
            }

            .form-control {
            font-family: system-ui, sans-serif;
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.1;
            display: grid;
            grid-template-columns: 1em auto;
            }
            .form-control-amber {
            font-family: system-ui, sans-serif;
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.1;
            display: grid;
            grid-template-columns: 1em auto;
            }
            
            input[name="amber"] {
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
            input[name="indigo"] {
            -webkit-appearance: none;
            appearance: none;
            background-color: var(--form-background);
            margin: 0;
            
            font: inherit;
            color: currentColor;
            width: 0.65em;
            height: 0.65em;
            border: 0.05em solid rgb(0, 34, 100);
            border-radius: 0.15em;
            transform: translateY(-0.075em);
            
            display: grid;
            place-content: center;
            cursor: pointer;
            }
            
            input[name="amber"]::before {
            content: "";
            width: 0.62em;
            height: 0.60em;
            transform: scale(0);
            transform-origin: center;
            transition: 20ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-amber-color);
            /* Windows High Contrast Mode */
            background-color: CanvasText;
            }
            input[name="indigo"]::before {
            content: "";
            width: 0.42em;
            height: 0.40em;
            transform: scale(0);
            transform-origin: center;
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-color);
            /* Windows High Contrast Mode */
            background-color: CanvasText;
            }
            
            input[type="checkbox"]:checked::before {
            transform: scale(1);
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('#searchButton').addEventListener('click', function() {
                    const complainant_id = document.querySelector('#searchField').value;
        
                    fetch(`/complaints/${complainant_id}`)
                        .then(response => response.json())
                        .then(data => {
                            // Fill the form with the returned data
                            document.querySelector('#complaintId').textContent = data.complaint_id;
                            document.querySelector('#complainantName').textContent = data.complainant_name;
                            document.querySelector('#complainantId').textContent = data.complainant_id;
                            document.querySelector('#complaineeName').textContent = data.complainee_name;
                            document.querySelector('#complaineeId').textContent = data.complainee_id;
                            document.querySelector('#apprehensionDate').textContent = data.apprehension_date;
                            document.querySelector('#submissionDate').textContent = data.submission_date;
                            document.querySelector('#allegation').value = data.nature_and_cause;
                        });
                });
            });
        </script>
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

                    function toggleMenu() {
                        var menu = document.querySelector("aside");
                        menu.classList.toggle("hidden");
                    }

                </script>
            </header>
            <article class="grid grid-cols-6 overflow-y-hidden">
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
                    <div class="border-y border-indigo-800 flex flex-row justify-between">
                        <p class="text-xl ml-20 font-thin py-2">Students</p>
                        <div class="mr-20 flex items-center">
                            <input id="searchField" type="search" placeholder="Search students..." class="w-64 placeholder:text-indigo-300 h-full text-amber-600 selection:text-indigo-50 selection:text-indigo-800 focus:outline-none border border-indigo-300 focus:border-indigo-800 px-2 placeholder:text-xs placeholder:tracking-widest text-xs"/>
                            <button id="searchButton" class="p-3 h-full border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>                                      
                            </button>
                        </div>
                    </div>
                    <div class="bg-white py-6">
                        <div class="flex flex-row justify-evenly items-center text-center">
                            <img class="h-8 w-8 lg:h-14 lg:w-14" src="{{ asset('assets/plm-logo.png') }}"/>
                            <div class="text-xs lg:text-sm">
                                <p class="font-semibold lg:text-lg">PAMANTASAN NG LUNGSOD NG MAYNILA</p>
                                <p class="italic">(University of the City of Manila)</p>
                                <p class="font-medium">Intramuros, Manila</p>
                            </div>
                            <img class="h-8 w-8 lg:h-14 lg:w-14" src="{{ asset('assets/osdslogo.png') }}"/>
                        </div>
                        <div class="flex flex-col items-center mt-10">
                            <p style="font-family:Aston Script;" class="text-xs md:text-sm lg:text-base">Office of Student Development and Services</p>
                            <p class="text-sm md:text-md lg:text-xl font-bold mt-4">COMPLAINT REPORT FORM</p>
                        </div>
                        <div class="mt-8">
                            <p class="ml-4 lg:ml-20 text-xs lg:text-base font-medium">Complaint Information:</p>
                        </div>
                        <form class="mx-6 lg:mx-20">
                            <div class="mt-4 text-sm">
                                <div class="grid grid-cols-3 w-full gap-y-2">
                                    <p class="cursor-default">Complaint ID:</p>
                                    <div class="col-span-2">
                                        <p id="complaintId" class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <p class="cursor-default">Complainant Name:</p>
                                    <div class="col-span-2">
                                        <p id="complainantName" class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <p class="cursor-default">Complainant ID:</p>
                                    <div class="col-span-2">
                                        <p id="complainantId" class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <p class="cursor-default">Complainee:</p>
                                    <div class="col-span-2">
                                        <p id="complaineeName" class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <p class="cursor-default">Comlainee ID:</p>
                                    <div class="col-span-2">
                                        <p id="complaineeId" class="w-96 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <p class="cursor-default">Apprehension Date:</p>
                                    <div class="col-span-2">
                                        <p id="apprehensionDate" class="w-96 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <p class="cursor-default">Submission Date</p>
                                    <div class="col-span-2">
                                        <p id="submissionDate" class="w-96 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"></p>
                                    </div>
                                    <div class="col-span-3 mt-6">
                                        <p class="text-center text-xs lg:text-sm tracking-widest font-light cursor-default border-x border-t border-indigo-800 p-1">Nature and Cause of Allegation</p>
                                        <textarea id="allegation" maxlength="500" class="w-full max-h-40 h-24 custom-scroller text-sm font-light px-2 shadow border border-indigo-400 focus:border focus:border-amber-800 focus:outline-none placeholder:text-indigo-300 focus:placeholder:invisible" placeholder="max of 500 characters"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="bg-white">
                        
                            <div class="flex justify-end mr-20 py-6 space-x-3">
                                <button type="button" class="p-2 shadow shadow-indigo-500 rounded-md hover:shadow-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('cdean.dashboard') }}'">
                                    <p class="text-sm font-light">Escalate</p>
                                </button>
                                <button type="button" class="p-2 shadow shadow-indigo-500 rounded-md hover:shadow-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('cdean.dashboard') }}'">
                                    <p class="text-sm font-light">Resolve</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>