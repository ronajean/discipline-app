<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>PLM Student OSDS Complaint Report</title>
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
            .custom-scroller-small {
                &::-webkit-scrollbar {
                    width: 12px;
                }
                &::-webkit-scrollbar-track {
                    box-shadow: inset 0 0 3px grey;
                }
                &::-webkit-scrollbar-thumb {
                    background: rgb(244, 200, 24);
                }
                &::-webkit-scrollbar-thumb:hover {
                    background: rgb(108, 87, 1);
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

                    <form method="GET" action="{{ route('student.dashboard') }}">
                        <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 lg:px-8 active:bg-amber-300 active:font-semibold p-2 rounded" onclick="location.href='{{ route('student.dashboard') }}'">
                            <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                                <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="hidden lg:block">Home</p>
                        </button>
                    </form>

                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-1.5 lg:col-span-3">
                    <img class="hidden lg:block h-12 w-auto selection:bg-transparent" alt="PLM Logo" src="{{ asset('assets/plm-logo--with-header.png') }}"/>
                    <img class="lg:hidden block h-8 w-8" src="{{ asset('assets/plm-logo.png') }}"/> 
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-7 lg:col-span-5 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-12 w-12" src="{{ asset('assets/osdslogo.png') }}"/>
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
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.complaint-report') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Complaint Report</p>
                        <p class="lg:hidden text-xs">Report</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.manual') }}'">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Student Manual</p>
                        <p class="lg:hidden text-xs">Manual</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.gmc-status') }}'">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">GMC Certificate</p>
                        <p class="lg:hidden text-xs">GMC</p>
                    </button>

                    
                    <form action="/logout" method="POST">
                        @csrf
                        <button id="logout" class="hover:bg-red-200 hover:text-red-600 active:bg-red-400 active:font-semibold flex flex-row items-center justify-center w-full p-4 space-x-2 mt-52">
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
                    <header class="bg-white px-4 pt-6 pb-1.5 border-b border-indigo-800">
                        <div class="flex flex-row justify-between items-end">
                            <p class="text-3xl font-thin tracking-widest">Complaint Report</p>
                            <div class="space-x-4">
                                <button class="p-2 rounded border border-indigo-800 hover:border-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('student.complaint-form') }}'" title="Go to Complaint Form">
                                    <p>File a Complaint</p>
                                </button>
                                <button class="p-2 rounded border border-indigo-800 hover:border-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('student.dashboard') }}'" title="Go Home">
                                    <p>Go back</p>
                                </button>
                            </div>
                        </div>
                    </header>
                    <article class="bg-white pt-6 min-h-96 border-b border-indigo-800">
                        <div class="space-y-3">
                            <div x-data="{isOpen3:false}">
                                <div class="flex flex-row justify-between mx-4 hover:bg-amber-50 hover:ring hover:ring-8 hover:ring-amber-50 hover:rounded-xl cursor-pointer text-xs lg:text-base" title="Check complaint details" @click="isOpen3 = !isOpen3">
                                    <div class="flex flex-row space-x-8 lg:space-x-20">
                                        <div class="flex items-center justify-center rounded border border-indigo-800 bg-slate-300 max-w-20 w-20 max-h-20 h-20">
                                            <p>icon</p>
                                        </div>
                                        <div class="space-y-2 py-2">
                                            <p class="font-semibold">Complaint ID</p>
                                            <div class="flex flex-row space-x-8 lg:space-x-20">
                                                <p class="lg:hidden text-xs font-medium">Date:</p>
                                                <p class="hidden lg:block text-sm font-medium">Date Sent:</p>
                                                <p class="text-xs lg:text-sm text-indigo-500">Mar 10, 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center max-w-20 max-h-20 w-20 h-20 justify-center rounded shadow shadow-orange-500 bg-orange-300 text-orange-800">
                                        <p class="text-xs lg:text-sm font-semibold">Pending</p>
                                    </div>
                                </div>
                                <div x-show="isOpen3" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                    <div class="relative top-16 bg-white pt-6 pb-1.5 mx-auto max-w-sm max-h-96 h-96 rounded shadow-md border border-amber-600">
                                        <div class=" border-b border-amber-300 text-sm">
                                            <div class="absolute top-0 left-4 flex items-center rounded border border-amber-600 bg-amber-200 p-5 px-4">
                                                <p class="text-xs">icon</p>
                                            </div>
                                            <div class="px-4 flex flex-row justify-end space-x-8">
                                                <p>Complaint ID:</p>
                                                <p class="text-indigo-800 selection:text-amber-600 selection:bg-amber-50">23743298742</p>
                                            </div>
                                        </div>
                                        <div class="text-sm px-4 pb-10 space-y-3">
                                            <div class="flex flex-row justify-between pt-6 pb-1.5">
                                                <p>Date Sent:</p>
                                                <p>March 10, 2020</p>
                                            </div>
                                            <p>Description:</p>
                                            <div class="custom-scroller-small overflow-y-auto max-h-36">
                                                <p class="text-right font-light">This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. This is the description of the complaint report form. </p>
                                            </div>
                                        </div>
                                        
                                        <div class="absolute left-2 bottom-2 flex items-center justify-center max-h-14 h-14 max-w-14 w-14 rounded shadow shadow-orange-500 bg-orange-300 text-orange-800">
                                            <p class="text-xs font-semibold">Pending</p>
                                        </div>
                                        <div class="absolute right-2 bottom-2">
                                            <button class="hover:text-indigo-800 p-1.5 py-2 rounded-xl border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50" @click="isOpen3 = false">
                                                <p class="text-sm">Go Back</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="padding:0.5px;" class="bg-slate-300 w-full"></div>
                            <div x-data="{isOpen3:false}">
                                <div class="flex flex-row justify-between mx-4 hover:bg-amber-50 hover:ring hover:ring-8 hover:ring-amber-50 hover:rounded-xl cursor-pointer text-xs lg:text-base" title="Check complaint details" @click="isOpen3 = !isOpen3">
                                    <div class="flex flex-row space-x-8 lg:space-x-20">
                                        <div class="flex items-center justify-center rounded border border-indigo-800 bg-slate-300 max-w-20 w-20 max-h-20 h-20">
                                            <p>icon</p>
                                        </div>
                                        <div class="space-y-2 py-2">
                                            <p class="font-semibold">Complaint ID</p>
                                            <div class="flex flex-row space-x-8 lg:space-x-20">
                                                <p class="lg:hidden text-xs font-medium">Date:</p>
                                                <p class="hidden lg:block text-sm font-medium">Date Sent:</p>
                                                <p class="text-xs lg:text-sm text-indigo-500">Mar 10, 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center rounded shadow shadow-green-500 bg-green-300 max-w-20 max-h-20 w-20 h-20 text-green-800">
                                        <p class="text-xs lg:text-sm font-semibold">Resolved</p>
                                    </div>
                                </div>
                                <div x-show="isOpen3" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                    <div class="relative top-16 bg-white pt-6 mx-auto max-w-sm max-h-96 h-96 rounded shadow-md border border-amber-600">
                                        <div class=" border-b border-amber-300 text-sm">
                                            <div class="absolute top-0 left-4 flex items-center rounded border border-amber-600 bg-amber-200 p-5 px-4">
                                                <p class="text-xs">icon</p>
                                            </div>
                                            <div class="px-4 flex flex-row justify-end space-x-8">
                                                <p>Complaint ID:</p>
                                                <p class="text-indigo-800 selection:text-amber-600 selection:bg-amber-50">23743298742</p>
                                            </div>
                                        </div>
                                        <div class="text-sm px-4 space-y-3">
                                            <div class="flex flex-row justify-between pt-8 pb-3">
                                                <p>Date Sent:</p>
                                                <p class="font-light">March 10, 2020</p>
                                            </div>
                                            <p>Description:</p>
                                            <div class="custom-scroller-small overflow-y-auto max-h-36">
                                                <p class="text-right font-light">This is the description of the complaint report form.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="absolute left-2 bottom-2 flex items-center justify-center max-w-14 w-14 max-h-14 h-14 rounded shadow shadow-green-500 bg-green-300 text-green-800">
                                            <p class="text-xs font-semibold">Resolved</p>
                                        </div>
                                        <div class="absolute right-2 bottom-2">
                                            <button class="hover:text-indigo-800 p-1.5 py-2 rounded-xl border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50" @click="isOpen3 = false">
                                                <p class="text-sm">Go Back</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs font-light tracking-widest text-center py-10">Nothing more to display.</p>
                            <div class="flex justify-end pr-4 pb-4">
                                <button id="proceed" type="button" class="p-2 disabled:cursor-not-allowed disabled:text-indigo-200 disabled:bg-indigo-50 disabled:font-light disabled:shadow-indigo-50 hover:bg-amber-50 hover:text-amber-600 
                                rounded shadow-sm shadow-indigo-600 hover:shadow-amber-600 active:bg-amber-300 font-semibold" onclick="location.href='{{ route('student.complaint-form') }}'" title="File a Complaint">
                                    <p>File a complaint</p>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </article>
        </main>
    </body>
</html>