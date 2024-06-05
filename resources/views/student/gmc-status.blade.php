<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>PLM Student OSDS GMC Status</title>
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

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            progress[value]::-webkit-progress-bar {
                background-color: #eee;
                border-radius: 2px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25) inset;
            }
            progress[name="red"]::-webkit-progress-value {
                background-image:
                -webkit-linear-gradient(-45deg, 
                transparent 33%, rgba(0, 0, 0, .1) 33%, 
                rgba(0,0, 0, .1) 66%, transparent 66%),
                -webkit-linear-gradient(top, 
                                rgba(255, 255, 255, .25), 
                                rgba(0, 0, 0, .25)),
                -webkit-linear-gradient(left, rgb(88, 0, 0), #f44);
                border-radius: 2px; 
                background-size: 35px 20px, 100% 100%, 100% 100%;
            }
            progress[name="orange"]::-webkit-progress-value {
                background-image:
                -webkit-linear-gradient(-45deg, 
                transparent 33%, rgba(0, 0, 0, .1) 33%, 
                rgba(0,0, 0, .1) 66%, transparent 66%),
                -webkit-linear-gradient(top, 
                                rgba(255, 255, 255, .25), 
                                rgba(0, 0, 0, .25)),
                -webkit-linear-gradient(left, rgb(88, 56, 0), rgb(255, 177, 68));
                border-radius: 2px; 
                background-size: 35px 20px, 100% 100%, 100% 100%;
            }
            progress[name="yellow"]::-webkit-progress-value {
                background-image:
                -webkit-linear-gradient(-45deg, 
                transparent 33%, rgba(0, 0, 0, .1) 33%, 
                rgba(0,0, 0, .1) 66%, transparent 66%),
                -webkit-linear-gradient(top, 
                                rgba(255, 255, 255, .25), 
                                rgba(0, 0, 0, .25)),
                -webkit-linear-gradient(left, rgb(88, 88, 0), rgb(255, 255, 68));
                border-radius: 2px; 
                background-size: 35px 20px, 100% 100%, 100% 100%;
            }
            progress[name="green"]::-webkit-progress-value {
                background-image:
                -webkit-linear-gradient(-45deg, 
                transparent 33%, rgba(0, 0, 0, .1) 33%, 
                rgba(0,0, 0, .1) 66%, transparent 66%),
                -webkit-linear-gradient(top, 
                                rgba(255, 255, 255, .25), 
                                rgba(0, 0, 0, .25)),
                -webkit-linear-gradient(left, rgb(0, 88, 4), rgb(68, 255, 105));
                border-radius: 2px; 
                background-size: 35px 20px, 100% 100%, 100% 100%;
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
                    <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold lg:px-8 p-2 rounded" onclick="location.href='{{ route('student.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Home</p>
                    </button>
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
                        var date = {year:'numeric', month:'long', day:'numeric'};
                        var dateString = currentDateTime.toLocaleString('en-PH',date);
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
                    <header class="bg-white border-b border-indigo-300 px-4 pt-6 pb-1.5">
                        <div class="flex flex-row grid grid-cols-2 items-center">
                            <div class="grid grid-cols-3 text-xs lg:text-sm">
                                <p class="hidden lg:block">Transaction Number:</p>
                                @foreach ($gmc_request as $gmc_request)
                                    
                                <p class="lg:hidden">Number:</p>

                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">{{ $gmc_request->first()->transaction_no }}</p>
                                
                                <p> </p>
                                <p>Status:</p>
                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">{{ $gmc_request->first()->request_status }}</p>
                                <p> </p>
                                @endforeach
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-light tracking-widest">GMC Status</p>
                            </div>
                        </div>
                    </header>
                    <article class="bg-white p-4 border-b border-indigo-300">
                        <div class="text-sm">
                            <p>Status:</p>
                        </div>
                        @php
                        

                        $assignNum = [
                            "GMC Request Sent" => 1,
                            "Pending Payment" => 2,
                            "Payment Successful" => 3,
                            "Request Verified" => 4,
                            "Processing of GMC Document" => 5,
                            "Ready for Pick-up" => 6,                                        
                        ];
                        
                        $currentStep = $assignNum[$gmc_request->request_status] ?? 0; // Use null coalescing to handle undefined status
                        $progressPercentage = ($currentStep / 6) * 100;
                        @endphp
                        <progress class="w-full" max="100" value={{ $progressPercentage }} name="green"></progress>
                        
                        <div class="grid grid-cols-12">
                            <div class="text-indigo-100">
                                <label>
                                    <input type="checkbox" class="peer hidden" {{ $assignNum[$gmc_request->request_status] >= 1 ? 'checked' : '' }} disabled/>
                                    <div class="peer-checked:text-green-600" title="GMC Request Sent">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden" {{ $assignNum[$gmc_request->request_status] >= 2 ? 'checked' : '' }} disabled/>
                                    <div class="peer-checked:text-green-600" title="Pending Payment">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden" {{ $assignNum[$gmc_request->request_status] >= 3 ? 'checked' : '' }} disabled/>
                                    <div class="peer-checked:text-green-600" title="Payment Successful">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden" {{ $assignNum[$gmc_request->request_status] >= 4 ? 'checked' : '' }} disabled/>
                                    <div class="peer-checked:text-green-600" title="Payment Successful">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden" {{ $assignNum[$gmc_request->request_status] >= 5 ? 'checked' : '' }} disabled/>
                                    <div class="peer-checked:text-green-600" title="Processing of GMC Document">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden" {{ $assignNum[$gmc_request->request_status] >= 6 ? 'checked' : '' }} disabled/>
                                    <div class="peer-checked:text-green-600" title="Ready for Pick-up">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                
                            </div>
                            
                            
                            <div class="col-span-5 space-y-6 mt-5 font-light">
                                <p>GMC Request Sent</p>
                                <p>Pending Payment</p>
                                <p>Payment Successful</p>
                                <p>Request Verified</p>
                                <p>Processing of GMC Document</p>
                                <p>Ready for Pick-up</p>    
                            </div>
                            <div class="hidden lg:block col-start-7 bg-indigo-200 mx-auto p-px"></div>
                            <div class="col-span-6 lg:col-span-5 lg:mr-4"> 
                                <div class="flex justify-center space-x-4">
                                    

                                    
                                    <!--<label>
                                        <input type="radio" class="peer hidden" name="gmc-step"/>
                                        <p></p>
                                        <div class="p-3 rounded-full bg-indigo-50 hover:bg-amber-50 border border-indigo-800 transform transition-all origin-left duration-300 hover:border-amber-600 active:bg-amber-200 peer-checked:bg-amber-300 peer-checked:border-amber-600 cursor-pointer" title="GMC Request Approval: Page 1"></div>
                                        
                                        
                                    </label>
                                    <label>
                                        
                                    </label>
                                    <label>
                                        
                                    </label>-->

                                    


                                    
                                </div>
                                <p  class=" mt-4 font-thin text-2xl tracking-widest border-b border-amber-300">Your GMC Request has been successfully submitted.</p>
                                <p class="font-light pt-6">
                                    <span class="font-normal">Kindly allow 10-15 business days for the processing of your document.</span><br>
                                    <span class="text-sm"></span><br>
                                    <span class="underline text-right font-thin hover:text-indigo-800">
                                        <a href="{{ route('student.gmc-status') }}">You can view the status of your request under GMC Certificate > View GMC Request Status</a>
                                    </span>
                                </p>
                                <span class="text-sm"></span><br>

                                <p class="text-sm text-left">For inquires, please send email at<br>
                                    OSDS@plm.edu.ph<br>
                                    For follow-up, please text #09976017966
                                </p>
                                <p class="text-xs font-thin">Note: Claimant must present two(2) valid Identification Cards (IDs) while authorized representatives must bring with them of authorization aside from the two(2) valid IDs for purposes of filing and securing the GMC Certificate.</p>
                            </div>

                                
                            </div>
                         </div>
                         
                    </article>
                    <div class="bg-white p-4 pb-16 justify-between flex border-b border-indigo-300">
                        
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>