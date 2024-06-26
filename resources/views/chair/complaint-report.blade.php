<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>College Complaint Report</title>
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
                            document.querySelector('#submissionDate').textContent = data.submission_date;
                            document.querySelector('#allegation').value = data.nature_and_cause;
                        });
                });
            });
        </script>
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
                    @foreach ($employees as $employee)
                    <div class="truncate text-indigo-800 max-w-40 w-40">
                        <p class="text-md font-semibold">{{$employee->first_name}} {{$employee->last_name}}</p>
                        <p class="text-sm">{{$employee->designation}}</p>
                    </div>
                    @endforeach
                    
                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-2.5 w-1/6">
                </div>
                <div class="flex flex-row items-center space-x-2 w-2/6 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class=" lg:block h-10 w-10" src="assets/osdslogo.png"/>
                    <div class="flex flex-col">
                        <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                    </div>
                    <img class="lg:block h-10 w-10"src="assets/plm-logo--with-header.png"/>
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
            <article class="grid grid-cols-6 overflow-y-hidden">
                <aside class="bg-indigo-800 custom-scroller text-white h-screen relative">
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.file-complaint') }}'">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">File a Complaint</p>
                        <p class="lg:hidden text-xs">File</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.complaint-report') }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" webcrx="">
                            <path d="M6 14.4623H16.1909C17.6066 14.4623 18.472 12.7739 17.7261 11.4671L17.2365 10.6092C16.7547 9.76504 16.7547 8.69728 17.2365 7.85309L17.7261 6.99524C18.472 5.68842 17.6066 4 16.1909 4L6 4L6 14.4623ZM6 14.4623L6 20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="hidden lg:block">Complaint Report</p>
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
                    <div class="border-y border-indigo-800 flex flex-row justify-end">
                        <!-- <p class="text-xl ml-20 font-thin py-2">Complaint Report</p> -->
                        <div class="mr-20 flex items-center">
                            <input id="searchField" type="search" placeholder="Search students..." class="w-64 placeholder:text-indigo-300 h-full text-amber-600 selection:text-indigo-50 selection:text-indigo-800 focus:outline-none border border-indigo-300 focus:border-indigo-800 px-2 placeholder:text-xs placeholder:tracking-widest text-xs"/>
                            <button id="searchButton" class="p-3 h-full border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>                                      
                            </button>
                        </div>
                    </div>
                    <div class="bg-white pb-20">
                        <form class="p-8">
                            <div class="flex flex-row justify-between items-end border-b border-indigo-200 pb-2">
                                <p class="text-lg font-thin">Complaint Report</p>
                                <p id="complaintId" class="text-3xl font-thin">
                                  
                                    0000-0000-0000
                                </p>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="grid grid-cols-4">
                                    <p>Complainant ID</p>
                                    <p>:</p>
                                    <p id="complainantId" type="text" class="col-span-2 text-sm font-light text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">
                                        Complainant ID
                        
                                    </p>
                                </div>
                                <div class="grid grid-cols-4">
                                    <p>Complainant Name</p>
                                    <p>:</p>
                                    <p id="complainantName" type="text" class="col-span-2 text-sm font-light text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">
                                        Complainant Name
                                
                                    </p>
                                </div>
                                <div class="bg-indigo-100 w-11/12 mx-auto" style="padding:0.5px;"></div>
                                <div class="grid grid-cols-4">
                                    <p>Complainee ID</p>
                                    <p>:</p>
                                    <p id="complaineeId" type="text" class="col-span-2 text-sm font-light text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">
                                        Complainee ID
                                    </p>
                                </div>
                                <div class="grid grid-cols-4">
                                    <p>Complainee Name</p>
                                    <p>:</p>
                                    <p id="complaineeName" type="text" class="col-span-2 text-sm font-light text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">
                                        Complainee Name
                                    </p>
                                </div>
                                <div class="bg-indigo-100 w-11/12 mx-auto" style="padding:0.5px;"></div>
                                <div class="flex flex-row justify-end space-x-20 py-8 items-end">
                                    <p class="text-xs">Date Submitted</p>
                                    <p id="submissionDate" class="text-lg font-thin">MM/DD/YYYY</p>
                                </div>
                                <div class="space-y-3">
                                    <p class="text-2xl font-thin">Nature and Cause of Allegation</p>
                                    <p id="allegation" class="text-right text-sm text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">This is the full description of the Nature and Cause of Allegation based on the inputted students</p>
                                </div>

                                <div class="flex justify-end mr-20 py-6 space-x-3">
                                    <button type="button" class="p-2 shadow shadow-indigo-500 rounded-md hover:shadow-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('cdean.dashboard') }}'">
                                        <p class="text-sm font-light">Escalate</p>
                                    </button>
                                    <button type="button" class="p-2 shadow shadow-indigo-500 rounded-md hover:shadow-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('cdean.dashboard') }}'">
                                        <p class="text-sm font-light">Resolve</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>