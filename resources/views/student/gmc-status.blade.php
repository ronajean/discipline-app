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
                <aside class="bg-indigo-800 custom-scroller text-white relative h-screen">
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
                    <button class="bg-amber-300 font-semibold text-amber-600 flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.gmc-status') }}'">
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
                        <p class="text-xs font-thin text-indigo-600 lg:text-indigo-300">Discipline Module</p>
                    </div>
                </aside>
                <div class="col-span-5">
                    <header class="bg-white border-b border-indigo-300 px-4 pt-6 pb-1.5">
                        <div class="flex flex-row grid grid-cols-2 items-center">
                            <div class="grid grid-cols-3 text-xs lg:text-sm">
                                <p class="hidden lg:block">Transaction Number:</p>
                                <p class="lg:hidden">Number:</p>
                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">48130482389042839</p>
                                <p> </p>
                                <p>Status:</p>
                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">Pending</p>
                                <p> </p>
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
                        <progress class="w-full" max="100" value="20" name="orange"></progress>
                        <div class="grid grid-cols-12">
                            <div class="text-indigo-100">
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 1: Send GMC Request">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 2: OSDS will Verify your Request">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 3: Processing GMC Request">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 4: GMC Request Response">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 5: Waiting for Payment">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 6: Processing GMC for Pick-up">
                                        <svg class="w-4 h-4 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                        </svg>
                                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </label>
                                <label>
                                    <input type="checkbox" class="peer hidden"/>
                                    <div class="peer-checked:text-green-600" title="Step 7: Ready for Pick-up">
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
                                <p>Request Verification</p>
                                <p>Processing GMC Request</p>
                                <p>GMC Request Response</p>
                                <p>Waiting for Payment</p>
                                <p>Processing GMC for Pick-up</p>
                                <p>Ready for Pick-up</p>    
                            </div>
                            <div class="hidden lg:block col-start-7 bg-indigo-200 mx-auto p-px"></div>
                            <div class="col-span-6 lg:col-span-5 lg:mr-4">
                                <div class="flex justify-center space-x-4">
                                    <label>
                                        <input type="radio" class="peer hidden" name="gmc-step"/>
                                        <div class="p-3 rounded-full bg-indigo-50 hover:bg-amber-50 border border-indigo-800 transform transition-all origin-left duration-300 hover:border-amber-600 active:bg-amber-200 peer-checked:bg-amber-300 peer-checked:border-amber-600 cursor-pointer" title="GMC Request Approval: Page 1"></div>
                                        <div class="hidden peer-checked:block">
                                            <div class="font-light text-center mt-2">
                                                <p class="text-base lg:text-lg">GMC Request Approval</p>
                                                <p class="text-xs lg:text-sm">GMC Request Response</p>
                                            </div>
                                            <div class="pb-2 border-b border-indigo-300 flex flex-row mt-6 justify-between text-xs lg:text-sm">
                                                <p>Status:</p>
                                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">Pending</p>
                                            </div>
                                            <div class="mt-4 text-xs lg:text-sm">
                                                <p>Description:</p>
                                                <p class="text-right text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">The description will be displayed here about the response for GMC Request Approval</p>
                                            </div>
                                            <div class="flex justify-end mt-10" x-data="{isOpen16:false}">
                                                <button class="p-2 border border-indigo-800 hover:bg-amber-50 hover:border-amber-600 hover:text-amber-600 active:bg-amber-200 active:font-semibold font-light rounded" @click="isOpen16 = !isOpen16">
                                                    <p class="text-sm">Check</p>
                                                </button>
                                                <div x-show="isOpen16" class="fixed inset-0 z-10 bg-black bg-opacity-50 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">
                                                    <div class="relative top-1/4 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                                        <p class="font-thin text-2xl tracking-widest border-b border-amber-300">GMC Request Response</p>
                                                        <div class="pb-3">
                                                            <div class="py-4 max-h-64 custom-scroller-small overflow-y-auto space-y-2">
                                                                <p>Description:</p>
                                                                <p class="text-right text-sm font-light">The description will be displayed here about the response for GMC request approval.</p>
                                                            </div>
                                                        </div>
                                                        <div class="absolute left-2 bottom-2 flex items-center justify-center max-w-14 w-14 max-h-14 h-14 rounded shadow shadow-orange-500 bg-orange-300 text-orange-800">
                                                            <p class="text-xs font-semibold">Pending</p>
                                                        </div>
                                                        <div class="flex justify-end mt-3">
                                                            <button @click="isOpen16 = false" class="border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold p-1.5">
                                                                <p class="text-sm">Go back</p>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" class="peer hidden" name="gmc-step"/>
                                        <div class="p-3 rounded-full bg-indigo-50 hover:bg-amber-50 border border-indigo-800 hover:border-amber-600 transform transition-all origin-right duration-300 active:bg-amber-200 peer-checked:bg-amber-300 peer-checked:border-amber-600 cursor-pointer" title="GMC Request Approval: Page 2"></div>
                                        <div class="hidden peer-checked:block">
                                            <div class="font-light text-center mt-2">
                                                <p class="text-base lg:text-lg">GMC Request Approval</p>
                                                <p class="text-xs lg:text-sm">GMC Number of Copies</p>
                                            </div>
                                            <div class="mt-8">
                                                <div class="relative">
                                                    <input id="copies" type="number" class="focus:outline-none h-10 w-full border border-indigo-300 p-2 placeholder:text-sm tracking-widest placeholder:font-light placeholder:text-indigo-400 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800" placeholder="Number of copies (1-5)"/>
                                                    <!-- Additional Button (OPTIONAL) -->
                                                    <!-- <button class="absolute right-1 top-1.5 p-1.5 rounded border border-indigo-300 hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200">
                                                        <p class="text-xs">Confirm</p>
                                                    </button> -->
                                                </div>
                                                <div class="selection:bg-indigo-50 selection:text-indigo-800">
                                                    <p id="fee" class="text-sm font-thin tracking-widest text-right text-amber-600">₱000.00</p>
                                                    <p class="font-light text-right tracking-widest text-amber-600">Proceed to Payment</p>
                                                </div>
                                                <div class="mt-8 text-xs font-light text-justify opacity-70">
                                                    <p>Note:</p>
                                                    <p>Claimant must present two(2) valid Identification Cards (IDs) while authorized representatives must bring with them of authorization aside from the two(2) valid IDs for purposes of filing and securing the GMC Certificate.</p>
                                                </div>
                                            </div>

                                            <script>
                                                function updatePayment() {
                                                    var number = document.getElementById("copies").value;

                                                    if(isNaN(number)) {
                                                        return;
                                                    }

                                                    /* Insert GMC Certificate Price here */
                                                    var payment = number * 100;
                                                    
                                                    document.getElementById("fee").innerHTML = "₱" + payment.toFixed(2);

                                                    sessionStorage.setItem("fee", payment.toFixed(2));
                                                }
                                                document.getElementById("copies").addEventListener("input", updatePayment);

                                                updatePayment();
                                            </script>
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" class="peer hidden" name="gmc-step"/>
                                        <div class="p-3 rounded-full bg-indigo-50 hover:bg-amber-50 border border-indigo-800 transform transition-all origin-left duration-300 hover:border-amber-600 active:bg-amber-200 peer-checked:bg-amber-300 peer-checked:border-amber-600 cursor-pointer" title="GMC Request Approval: Page 3"></div>
                                        <div class="hidden peer-checked:block">
                                            <div class="font-light text-center mt-2">
                                                <p class="text-base lg:text-lg">GMC Request Approval</p>
                                                <p class="text-xs lg:text-sm">GMC: After Payment</p>
                                            </div>
                                            <div class="grid grid-cols-2 text-sm w-full mt-6 gap-2">
                                                <p>Payment Date:</p>
                                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">DD/MM/YYYY</p>
                                                <p>Official Receipt:</p>
                                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">2384283748279</p>
                                                <p>Amount Paid:</p>
                                                <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">₱300.00</p>
                                            </div>
                                            <div class="mt-8 text-xs font-light text-justify opacity-70">
                                                <p>Note:</p>
                                                <p>1. Claimant must present two(2) valid Identification Cards (IDs) while authorized representatives must bring with them of authorization aside from the two(2) valid IDs for purposes of filing and securing the GMC Certificate.</p>
                                                <div class="flex flex-row items-end">
                                                    <p>2. The copy of GMC Certificate shall be released tentatively on</p>
                                                    <span class="border-b border-slate-500 px-6 ml-2 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">DD/MM/YYYY</span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                         </div>
                    </article>
                    <div class="bg-white p-4 pb-16 justify-between flex border-b border-indigo-300">
                        <button id="proceed" type="button" class="p-2 disabled:cursor-not-allowed disabled:text-indigo-200 disabled:bg-indigo-50 disabled:font-light disabled:shadow-indigo-50 hover:bg-amber-50 hover:text-amber-600 rounded shadow-sm shadow-indigo-600 hover:shadow-amber-600 active:bg-amber-300 font-semibold" onclick="location.href='{{ route('student.gmc-payment') }}'" title="Payment for GMC Certificate">
                            <p>Payment</p>
                        </button>
                        <button type="button" class="p-2 disabled:cursor-not-allowed disabled:text-indigo-200 disabled:bg-indigo-50 disabled:font-light disabled:shadow-indigo-50 hover:bg-amber-50 hover:text-amber-600 rounded shadow-sm shadow-indigo-600 hover:shadow-amber-600 active:bg-amber-300 font-semibold" onclick="location.href='{{ route('student.gmc-request') }}'" title="Request a GMC Certificate">
                            <p>Request</p>
                        </button>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>