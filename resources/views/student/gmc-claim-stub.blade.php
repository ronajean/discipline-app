<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Claim Stub/ GMC QR Code</title>
        <script src="https:cdn.tailwindcss.com"></script>
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
                <aside class="bg-indigo-800 custom-scroller text-white relative min-h-screen">
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
                    <button class="bg-amber-300 font-semibold text-amber-600 flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.gmc-status') }}'> 
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
                    <header class="flex justify-between bg-white border-b border-indigo-300 pt-6 px-4 pb-1.5 items-end">
                        <p class="text-3xl font-thin tracking-widest">Claim Stub</p>
                        <p class="font-light">Certificate of Good Moral Character (GMC)</p>
                    </header>
                    <article class="bg-white p-4 pb-10 border-b border-indigo-300">
                        <div class="space-y-4 text-xs lg:text-sm">
                            <div class="flex flex-row items-center">
                                <p class="font-medium lg:mr-32">Tentative Date of Release</p>
                                <div class="flex flex-row lg:ml-3 lg:space-x-2">
                                    <span class="mx-2">:</span>
                                    <input type="text" class="lg:w-72 px-2 border-b border-slate-500 focus:outline-none"/>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="lg:hidden font-medium mr-10">Name of Claimant</p>
                                <p class="hidden lg:block font-medium">Name of Claimant/ Authorized Representative</p>
                                <div class="flex flex-row lg:space-x-2">
                                    <span class="mx-2">:</span>
                                    <input type="text" class="lg:w-72 px-2 border-b border-slate-500 focus:outline-none"/>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="lg:hidden font-medium mr-16">IDs Presented</p>
                                <p class="hidden lg:block font-medium mr-24">Identification Cards Presented</p>
                                <div class="flex flex-row lg:ml-3 lg:space-x-2">
                                    <span class="mx-2">:</span>
                                    <input type="text" class="lg:w-72 px-2 border-b border-slate-500 focus:outline-none"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid lg:grid-cols-2 my-10">
                            <div class="text-xs">
                                <p>For inquires, please send email at <br class="hidden lg:block">OSDS@plm.edu.ph</p>
                                <p>For follow-up, please text #09976017966</p>
                            </div>
                            <div class="flex flex-col items-center mt-4 lg:mt-0">
                                <input type="text" class="lg:w-72 px-2 text-center border-b border-slate-500 focus:outline-none"/>
                                <p class="lg:hidden text-xs font-medium">OSDS Dean</p>
                                <p class="hidden lg:block text-xs font-medium">OSDS Dean/Staff/Acting Director Signature</p>
                            </div>
                        </div>
                        <div class="text-xs mt-6">
                            <p>Note:</p>
                            <p class="text-justify">1. Claimant must present two(2) valid Identification Cards (IDs) while authorized representatives must bring with them of authorization aside from the two(2) valid IDs for purposes of filing and securing the GMC Certificate.</p>
                            <div class="flex flex-row items-end lg:items-center">
                                <p>2. The copy of GMC Certificate shall be released tentatively on</p>
                                <input type="text" class="px-2 border-b border-slate-500 focus:outline-none"/>
                            </div>
                        </div>
                    </article>
                    <div class="bg-white p-4 flex justify-end border-b border-indigo-800" x-data="{isOpen2:false}">
                        <button class="p-2 border border-indigo-800 hover:border-amber-600 hover:text-amber-600 hover:bg-amber-50 active:bg-amber-200 active:font-semibold rounded" @click="isOpen2 = !isOpen2">
                            <p>Confirm</p>
                        </button>
                        <div x-show="isOpen2" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                            <div class="fixed top-10 inset-x-0 bg-white p-4 mx-auto max-w-md h-5/6 rounded shadow-md border border-amber-600">
                                <header class="flex flex-row justify-between border-b border-amber-300 pb-3 items-end">
                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                        </svg>
                                    </button>
                                    <p class="text-2xl font-thin tracking-widest">Thank you for your request</p>
                                </header>
                                <div class="flex justify-center items-center border-b border-amber-300 pb-3 space-y-3 flex-col">
                                    <img class="w-80 h-80" src="{{ asset('assets/qr-code.png') }}"/>
                                    <p>Bring this QR Code upon Pick-up</p>
                                </div>
                                <div class="flex justify-center text-xs font-thin">
                                    <p>Don't forget to get a copy of your QR Code for GMC Certificate</p>
                                </div>
                                <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold mt-4" onclick="location.href='{{ route('student.gmc-status') }}'">
                                    <p class="text-xs">Go Back</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>