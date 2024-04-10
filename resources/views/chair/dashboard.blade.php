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
                src: {{asset('assets/aston-script.woff')}};
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
                </script>
            </header>
            <article class="grid grid-cols-6">
                <aside class="bg-indigo-800 custom-scroller text-white h-screen relative">
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('chair.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('cdean.file-complaint') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">File a Complaint</p>
                        <p class="lg:hidden text-xs">Report</p>
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
                    <div class="bg-white border-b border-indigo-800 py-6 px-4">
                        <p class="text-center text-3xl font-thin tracking-widest">Welcome</p>
                        <div class="text-xs lg:text-sm tracking-widest mt-6 flex justify-center space-x-20">
                            @foreach ($employees as $employee)
                            <div class="text-right ">
                                <p>Full Name:</p>
                                <p>Role:</p>
                                <p>College:</p>
                            </div>
                            <div class="font-light">
                                <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">{{$employee->first_name}} {{$employee->last_name}}</p>
                                <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">{{$employee->designation}}</p>
                                <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">{{$employee->department}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white mt-6 border-y border-indigo-800 max-h-96 h-96 py-6 px-4">
                        <div class="border-b border-indigo-300 pb-1.5">
                            <p class="tracking-widest font-light">Complaints List</p>
                        </div>
                        <p class="text-xs font-light tracking-widest text-indigo-500">Hover table to inspect the complaint</p>
                        <div class="custom-scroller-small overflow-y-auto max-h-72">
                            <table class="table table-fixed w-full border border-indigo-300 text-sm font-thin text-indigo-800">
                                <thead class="bg-indigo-600 text-white text-center">
                                    <tr>
                                        <th class="p-1">Complaint ID</th>
                                        <th class="p-1">Complainant ID</th>
                                        <th class="p-1">Nature and Cause</th>
                                        <th class="p-1">Submission Date</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($complaints as $complaint)
                                        <tr class="odd:bg-white even:bg-indigo-200 hover:bg-amber-50 cursor-pointer hover:text-amber-600" title="Click to see details">
                                            <td>{{ $complaint->complaint_id }}</td>
                                            <td>{{ $complaint->complainant_id }}</td>
                                            <td>{{ $complaint->nature_and_cause }}</td>
                                            <td>{{ $complaint->submission_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>