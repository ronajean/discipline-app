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
                <aside style="animation-name:slide-in; animation-duration:0.5s;" class="bg-indigo-800 custom-scroller text-white h-screen relative">
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
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
                    <div x-data="{gmcOptions:false}">
                        <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" @click="gmcOptions = !gmcOptions">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="hidden lg:block">GMC Certificate</p>
                            <p class="lg:hidden text-xs">GMC</p>
                        </button>
                        <div x-show="gmcOptions" class="fixed inset-0 z-10 bg-black bg-opacity-50 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800"  @click="gmcOptions = false">
                            <div class="relative top-1/4 mx-auto flex flex-row justify-evenly">
                                <button type="button" onclick="location.href='{{ route('student.gmc-request') }}'" class="bg-white p-20 rounded shadow-md border border-amber-600 hover:bg-amber-50 hover:text-indigo-600 active:text-indigo-800 active:bg-amber-200 active:border-indigo-800 active:font-normal text-2xl font-light space-y-4 items-center flex flex-col">
                                    <p>Request for GMC Certificate</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="w-20 h-20" id="_x32_" viewBox="0 0 512 512" xml:space="preserve" webcrx="">
                                        <g>
                                            <rect x="114.087" y="148.892" fill="currentColor" width="157.906" height="26.318"/>
                                            <rect x="114.087" y="245.39" fill="currentColor" width="157.906" height="26.318"/>
                                            <rect x="114.087" y="341.888" fill="currentColor" width="96.498" height="26.318"/>
                                            <path fill="currentColor" d="M454.95,86.619c-78.157,10.768-159.83,199.833-196.664,267.692c-9.252,17.049,12.264,31.278,21.786,14.958   c6.862-11.728,44.291-85.601,44.291-85.601c40.77,1.345,55.806-27.123,39.511-44.805c54.794,1.131,81.952-29.025,66.412-47.324   c16.345,5.175,30.498,1.713,51.521-9.749C526.664,157.321,524.573,75.421,454.95,86.619z"/>
                                            <path fill="currentColor" d="M350.998,307.03V443.15c0,4.034-3.29,7.316-7.316,7.324H42.407c-4.027-0.008-7.308-3.29-7.316-7.324v-374.3   c0.009-4.036,3.29-7.316,7.316-7.325h301.275c4.027,0.009,7.316,3.29,7.316,7.325v67.961c11.48-15.463,23.147-29.144,35.09-40.504   V68.851c-0.018-23.431-18.967-42.398-42.407-42.416H42.407C18.976,26.453,0.009,45.42,0,68.851v374.3   c0.009,23.431,18.976,42.398,42.407,42.414h301.275c23.44-0.016,42.389-18.984,42.407-42.414V284.704   C377.967,295.404,365.87,303.114,350.998,307.03z"/>
                                        </g>
                                    </svg>
                                </button>
                                <button type="button" onclick="location.href='{{ route('student.gmc-status') }}'" class="bg-white p-20 rounded shadow-md border border-amber-600 hover:bg-amber-50 hover:text-indigo-600 active:text-indigo-800 active:bg-amber-200 active:border-indigo-800 active:font-normal text-2xl font-light space-y-4 items-center flex flex-col">
                                    <p>View GMC Status</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20" viewBox="0 0 24 24" fill="none" webcrx="">
                                        <circle cx="17" cy="8" r="4" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 8C15 6.89543 15.8954 6 17 6C18.1046 6 19 6.89543 19 8H15ZM11 8C11 7.29873 11.1203 6.62556 11.3414 6H5C4.44772 6 4 6.44772 4 7C4 7.55228 4.44772 8 5 8H11ZM11.8027 11C12.2671 11.8028 12.9121 12.488 13.6822 13H5C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11H11.8027ZM5 16C4.44772 16 4 16.4477 4 17C4 17.5523 4.44772 18 5 18H19C19.5523 18 20 17.5523 20 17C20 16.4477 19.5523 16 19 16H5Z" fill="currentColor"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    
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
                            @foreach($studentComplaints as $complaint)
                            <div x-data="{isOpen{{ $complaint->id }}:false}">
                                
                                <div class="flex flex-row justify-between mx-4 hover:bg-amber-50 hover:ring hover:ring-8 hover:ring-amber-50 hover:rounded-xl cursor-pointer text-xs lg:text-base" title="Check complaint details" @click="isOpen{{ $complaint->id }} = !isOpen{{ $complaint->id }}">
                                    <div class="flex flex-row space-x-8 lg:space-x-20">
                                        <div class="flex items-center justify-center w-20 max-h-20 h-20">
                                            <img src="{{ asset('assets/complaint.png') }}" alt="">
                                        </div>
                                        <div class="space-y-2 py-2">
                                            <p class="font-semibold">Complaint No. {{$complaint->id}}</p>
                                            <div class="flex flex-row space-x-8 lg:space-x-20">
                                                <p class="lg:hidden text-xs font-medium"> </p>
                                                <p class="hidden lg:block text-sm font-medium">Date submitted: </p>
                                                <p class="text-xs lg:text-sm text-indigo-500">{{$complaint->date_time_sent}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center max-w-20 max-h-20 w-20 h-20 justify-center rounded shadow shadow-orange-500 bg-orange-300 text-orange-800">
                                        <p class="text-xs lg:text-sm font-semibold">Pending</p>
                                    </div>
                                </div>
                                
                                <div style="padding:0.5px;" class="bg-slate-300 w-full"></div>
                                
                                <div x-show="isOpen{{ $complaint->id }}" id="popup{{ $complaint->id }}" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-15 selection:text-indigo-800">
                                    <div class="relative top-16 bg-white pt-6 pb-1.5 mx-auto max-w-sm max-h-96 h-96 rounded shadow-md border border-amber-600">
                                        <div class=" border-b border-amber-300 text-sm">
                                            <!--<div class="absolute top-0 left-4 flex items-center rounded border border-amber-600 bg-amber-200 p-5 px-4">
                                                <p class="text-xs">icon</p>
                                                <img src="{{ asset('complaint.png') }}" alt="">
                                            </div>-->
                                            <div class="px-4 flex flex-row justify-end space-x-8">
                                                <p></p>
                                                <p class="text-indigo-800 selection:text-amber-600 selection:bg-amber-50">Complaint No. {{$complaint->id}}</p>
                                            </div>
                                        </div>
                                        <div class="text-sm px-4 pb-10 space-y-3">
                                            <div class="flex flex-row justify-between pt-6 pb-1.5">
                                                <p class="font-bold">Date & Time Sent:</p>
                                                <p>{{$complaint->date_time_sent}}</p>
                                            </div>
                                            <p class="font-bold">Description:</p>
                                            <div class="custom-scroller-small overflow-y-auto max-h-36 font-bold">
                                                <p class="text-left font-light ml-4">{{$complaint->description}}</p>
                                            </div>
                                            <div class="flex flex-row pt-6 pb-0">
                                                <p class="font-bold">Location:   </p>
                                                <p class="ml-2">{{$complaint->location}}</p>
                                            </div>
                                            <div class="flex flex-row pt-0 pb-0">
                                                <p class="font-bold">Apprehension Date:   </p>
                                                <p class="ml-2">{{$complaint->apprehension_date}}</p>
                                            </div>
                                            <div class="flex flex-row pt-0 pb-1.5">
                                                <p class="font-bold">Apprehension Time:   </p>
                                                <p class="ml-2">{{$complaint->apprehension_time}}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="absolute left-2 bottom-2 flex items-center justify-center max-h-14 h-14 max-w-14 w-14 rounded shadow shadow-orange-500 bg-orange-300 text-orange-800">
                                            <p class="text-xs font-semibold">Pending</p>
                                        </div>
                                        <div class="absolute right-2 bottom-2">
                                            <button class="hover:text-indigo-800 p-1.5 py-2 rounded-xl border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50"@click="isOpen{{ $complaint->id }} = false">
                                                <p class="text-sm">Go Back</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                
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