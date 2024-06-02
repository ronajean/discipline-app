<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>College Complaint Inbox</title>
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
                    background: rgb(114, 116, 243);
                }
                &::-webkit-scrollbar-thumb:hover {
                    background: rgb(20, 47, 99);
                }
            }
            
            :root {
                --form-control-color: rgb(85, 39, 255);
                --form-control-amber-color: rgb(249, 199, 32);
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
            width: 0.85em;
            height: 0.85em;
            border: 0.06em solid rgb(0, 34, 100);
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
            width: 1.5em;
            height: 1.5em;
            border: 0.05em solid rgb(0, 34, 100);
            border-radius: 0.15em;
            
            display: grid;
            place-content: center;
            cursor: pointer;
            }
            
            input[name="amber"]::before {
            content: "";
            width: 0.64em;
            height: 0.64em;
            transform: scale(0);
            transform-origin: center;
            transition: 70ms transform ease-out;
            box-shadow: inset 1em 1em var(--form-control-amber-color);
            /* Windows High Contrast Mode */
            background-color: CanvasText;
            }
            input[name="indigo"]::before {
            content: "";
            width: 1.10em;
            height: 1.17em;
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

            li {
                padding-top: 2px;
                padding-bottom: 2px;
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
                    <img class="hidden lg:block h-12 w-12" src="{{ asset('assets/osdslogo.png') }}
" title="OSDS Logo"/>
                    <h1 class="text-sm lg:text-xl font-light">The Office of Student Development and Services</h1>
                    <img class="lg:hidden h-8 w-8" src="{{ asset('assets/osdslogo.png') }}
"/>
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
                <div class="col-span-5 bg-white border-b border-indigo-800">
                    <header class="p-6 pb-1.5 border-b border-indigo-800 flex flex-row justify-between items-end">
                        <p class="text-3xl font-thin tracking-widest">Complaint Inbox</p>
                        <div class="flex items-center">
                            <input type="search" placeholder="Filter inbox" class="focus:outline-none p-2 border border-indigo-300 placeholder:text-indigo-300 w-64 text-sm focus:border-indigo-800 text-amber-600 font-light"/>
                            <button class="p-2.5 border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:border-amber-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>                                  
                            </button>
                        </div>
                    </header>
                    <aside class="p-6 border-b border-indigo-800">
                        <div class="flex flex-row items-center">
                            <label class="form-control">
                                <input type="checkbox" class="hover:bg-amber-50 active:bg-amber-200" name="amber"/>
                            </label>
                            <div class="flex space-x-6">
                                <button class="hover:text-amber-400 active:text-amber-600">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>                                      
                                </button>
                                <button class="hover:text-amber-400 active:text-amber-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 64 64">
                                        <path fill-rule="evenodd" d="m43.31,43.31l4.24,4.24c-4.3,4.3-9.93,6.44-15.56,6.44s-11.26-2.15-15.56-6.44l-2.44-2.44v8.89h-6v-19h19v6h-8.63l2.31,2.31c3.12,3.12,7.22,4.69,11.31,4.69s8.19-1.56,11.31-4.69Zm6.69-33.31v8.89l-2.44-2.44c-4.3-4.3-9.93-6.44-15.56-6.44s-11.26,2.15-15.56,6.44l4.24,4.24c3.12-3.12,7.22-4.69,11.31-4.69s8.19,1.56,11.31,4.69l2.31,2.31h-8.63v6h19V10h-6Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <button class="hover:text-amber-400 active:text-amber-600">
                                    <svg class="w-5 h-5 lg:w-7 lg:h-7" fill="currentColor" viewBox="0 0 64 64">
                                        <path fill-rule="evenodd" d="m56,32c0,3.31-2.69,6-6,6s-6-2.69-6-6,2.69-6,6-6,6,2.69,6,6Zm-42-6c-3.31,0-6,2.69-6,6s2.69,6,6,6,6-2.69,6-6-2.69-6-6-6Zm18,0c-3.31,0-6,2.69-6,6s2.69,6,6,6,6-2.69,6-6-2.69-6-6-6Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </aside>
                    <article>
                        <div x-data="{isOpen1:false}">
                            <label style="grid-template-columns: repeat(20, minmax(0, 1fr));" class="flex flex-row bg-indigo-800 text-white text-xs lg:text-sm py-1 cursor-default grid">
                                <p class="col-span-2"></p>
                                <p class="col-span-3">Date</p>
                                <p class="col-span-2">ID</p>
                                <p class="col-span-4">Student Name</p>
                                <p>Description</p>
                            </label>
                            <ul id="inbox" class="border-b border-indigo-300 overflow-y-auto custom-scroller-small max-h-96">
                                <div id="message" class="flex flex-row items-center odd:bg-white even:bg-indigo-100 cursor-pointer text-xs hover:bg-amber-50 hover:text-amber-600 selection:bg-transparent active:bg-amber-200">
                                    <label class="px-1 lg:px-3">
                                        <input type="checkbox" name="indigo"/>
                                    </label>
                                    <li style="grid-template-columns: repeat(20, minmax(0, 1fr));" class="grid overflow-y-hidden space-x-4 flex items-center" onmouseenter="filterMessage()" @click="isOpen1 = !isOpen1">
                                        <label>
                                            <input type="checkbox" name="bookmark" class="peer hidden"/>
                                            <div class="text-indigo-300 cursor-pointer hover:text-amber-300 peer-checked:text-amber-600 duration-200 peer-checked:duration-400">
                                                <svg class="w-6 h-6" viewBox="0 0 64 64" fill="currentColor">
                                                    <path fill-rule="evenodd" d="m43.76,35.82l5.44,16.73-2.96,2.15-14.23-10.34-14.32,10.4-2.91-2.11,5.47-16.83-14.5-10.53,1.07-3.29h17.92l5.52-17h3.48l5.52,17h17.79l1.09,3.37-14.39,10.46Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <div class="col-span-3">
                                            <p id="datePC" class="hidden lg:block truncate grid grid-cols-6 pr-2">
                                                <span class="col-span-2">February</span>
                                                <span>26 ,</span>
                                                <span class="col-span-2">04:30</span>
                                                <span>P.M</span>
                                            </p>
                                            <p id="datePhone" class="lg:hidden truncate grid grid-cols-5 pr-1">
                                                <span>Feb</span>
                                                <span class="pl-0.5">26,</span>
                                                <span class="col-span-2 hidden sm:block">04:30</span>
                                                <span class="hidden sm:block">P.M</span>
                                            </p>
                                        </div>
                                        <p class="col-span-2 lg:pl-1">202300001</p>
                                        <p class="col-span-4 pl-1 lg:pl-3 truncate">Emilia Clark</p>
                                        <p class="col-span-8 pr-4 truncate">This is the preview of the complaint description sent by the complainant.</p>  
                                    </li>
                                </div>
                            </ul>
                            <div x-show="isOpen1" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                <!-- Close tab when clicking outside -->
                                <div class="fixed inset-0" @click="isOpen1 = false"></div>
                                <div class="fixed top-1/3 inset-0 bottom-1/3 bg-white p-4 mx-auto max-w-sm rounded shadow-md border border-amber-600">
                                    <div class="border-b border-amber-300 grid grid-cols-6 text-xs font-light tracking-widest">
                                        <p>From:</p>
                                        <p class="col-span-3">202300001</p>
                                        <p class="col-span-2">Feb 26, 04:30 P.M</p>
                                    </div>
                                    <div>
                                        <p class="text-right">Emilia Clark</p>
                                    </div>
                                    <div class="text-sm">
                                        <p>Description:</p>
                                        <p class="text-right font-light tracking-wider">This is the preview of the complaint description sent by the complainant.</p>
                                    </div>
                                    <div class="flex justify-end pt-6 pb-1.5">
                                        <button @click="isOpen1 = false" class="text-xs p-1.5 border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50 hover:text-indigo-800 active:bg-indigo-200">
                                            <p>Go back</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="hideButton" class="flex justify-end mr-3">
                                <button class="p-2 rounded-md shadow shadow-indigo-500 hover:shadow-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold text-sm" onclick="newMessage()">
                                    <p>Give new message<span class="text-xs font-light">[test-only]</span></p>
                                </button>
                            </div>
                            <script>
                                var counter = 0;

                                /* function filterMessage() {
                                    document.getElementById("message").classList.add("odd:bg-white", "even:bg-indigo-100");
                                    document.getElementById("message").classList.remove("bg-green-400", "font-semibold");
                                } */
                                function newMessage() {
                                    const calendarDates = {"calendarPC" : ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], "calendarPhone" : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]};
                                    
                                    function pickRandomDate(calendarType) {
                                        // Check if calendarType is a valid property in calendarDates
                                        if (!calendarDates.hasOwnProperty(calendarType)) {
                                        throw new Error("Invalid calendar type provided");
                                        }
                                    
                                        const chosenCalendar = calendarDates[calendarType]; // Get the chosen calendar array
                                        const randomIndex = Math.floor(Math.random() * chosenCalendar.length);
                                        return chosenCalendar[randomIndex]; // Return the random date string
                                    }
                                    const randomPCDate = pickRandomDate("calendarPC");
                                    const randomPhoneDate = pickRandomDate("calendarPhone");

                                    if (counter > 9) {
                                        document.getElementById("hideButton").classList.add("hidden");
                                        document.getElementById("hideThis").classList.add("hidden");
                                    }
                                    else {
                                        const element = document.getElementById("message");
                                        const copy = element.cloneNode(true);

                                        /* new Message */
                                        /* copy.classList.remove("odd:bg-white", "even:bg-indigo-100");
                                        copy.classList.add("bg-green-300", "font-semibold");
                                        copy.setAttribute("id", "message");
                                        filterMessage(); */

                                        /* Date */
                                        const datePC = copy.querySelector('#datePC');
                                        datePC.textContent = randomPCDate + ' ' + (Math.floor(Math.random() * 31)+1) + ' , 04:30 P.M';
                                        const datePhone = copy.querySelector('#datePhone');
                                        datePhone.textContent = randomPhoneDate + ' ' + (Math.floor(Math.random() * 31)+1) + ' , 04:30 P.M';

                                        document.getElementById("inbox").appendChild(copy);

                                        counter++;
                                    }
                                }
                            </script>
                            <footer id="hideThis">
                                <p class="text-center font-thin tracking-widest text-xs pb-1.5">- Nothing more to show -</p>
                            </footer>
                        </div>
                    </article>
                </div>
            </article>
        </main>
    </head>
</html>