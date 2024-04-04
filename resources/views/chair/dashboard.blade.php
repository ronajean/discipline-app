<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>College Dean OSDS POV</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
        
        <style>
            @font-face {
                font-family: 'Aston Script';
                src: url("../assets/aston-script.woff");
            }
            .custom-scroller {
                &::-webkit-scrollbar {
                    width:20px;
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
              input[name="amber"] {
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
              
              input[name="indigo"]::before {
                content: "";
                width: 0.62em;
                height: 0.60em;
                transform: scale(0);
                transform-origin: center;
                transition: 20ms transform ease-in-out;
                box-shadow: inset 1em 1em var(--form-control-color);
                /* Windows High Contrast Mode */
                background-color: CanvasText;
              }
              input[name="amber"]::before {
                content: "";
                width: 0.42em;
                height: 0.40em;
                transform: scale(0);
                transform-origin: center;
                transition: 120ms transform ease-in-out;
                box-shadow: inset 1em 1em var(--form-control-amber-color);
                /* Windows High Contrast Mode */
                background-color: CanvasText;
              }
              
              input[type="checkbox"]:checked::before {
                transform: scale(1);
              }
        </style>
    </head>
    <body class="relative selection:bg-amber-300 selection:text-white custom-scroller">
        <main class="tracking-wide min-h-screen bg-indigo-50 overflow-x-hidden">
            <div class="relative flex top-0 w-full border-b-2 border-slate-300 bg-white">
                <div class="container mx-auto">
                    <div class="flex flex-row items-center mb-1 justify-evenly xl:justify-between mt-2 mx-4">
                        <div class="flex flex-row items-center justify-between space-x-2 lg:space-x-24 2xl:space-x-48">
                            <img class="hidden lg:block h-16 w-auto selection:bg-transparent" alt="PLM Logo" src="../assets/plm-logo--with-header.png"/>
                            <img class="lg:hidden block h-10 w-10" src="../assets/plm-logo.png"/>
                            <div class="flex flex-row lg:space-x-3 space-x-2 items-center">
                                <img class="hidden lg:block h-16 w-16" src="../assets/osdslogo.png"/>
                                <h1 class="text-xs sm:text-sm lg:text-base xl:text-xl font-medium lg:font-semibold xl:font-bold text-indigo-800 cursor-default">The Office of Student Development and Services</h1>
                                <img class="lg:hidden h-10 w-10" src="../assets/osdslogo.png"/>
                            </div>
                        </div>

                        <div class="text-right text-indigo-800 text-sm font-medium cursor-default">
                            <!-- Date and Time -->
                            <p id="weekday" class="hidden lg:block"></p>
                            <p id="date" class="hidden sm:block text-xs lg:text-sm border-l border-slate-300 pl-4"></p>
                            <p id="time" class="hidden lg:block"></p>
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
                            setInterval(updateDateTime, 1000);
                            updateDateTime();
                        </script>
                    </div>
                </div>
            </div>
            <div class="lg:grid lg:grid-cols-2">
                <div>
                    <article class="flex justify-end">
                        <header class="relative bg-white p-4 border-4 border-slate-300 rounded-lg text-black mt-10 shadow">
                            <p class="text-center text-indigo-800 font-semibold xl:font-bold text-xl md:text-2xl xl:text-3xl cursor-default">Welcome</p>
                            <div class="text-center lg:text-left text-indigo-800 font-light text-xs lg:pl-4 lg:text-sm lg:font-medium px-80 space-y-1 cursor-default mt-6">
                                <p>Full Name:</p>
                                <p>Role:</p>
                                <p>College:</p>
                                <p>Department:</p>
                            </div>
                        </header>
                    </article>
                    <article class="flex justify-end">
                        <div x-data="{ isOpen3: false, content: '' }">
                            <button @click="isOpen3 = true; fetch('complaint-inbox.html').then(response => response.text()).then(data => content = data)"
                                class="relative bg-white p-4 px-16 border-4 border-slate-300 rounded-lg text-black mt-10 shadow hover:opacity-40">
                                <div class="absolute p-2 px-4 text-white right-5 lg:-right-1 -top-5 lg:-top-1 text-sm font-medium rounded-full bg-indigo-800">
                                    <p>1</p>
                                </div>
                                <div>
                                    <header class="text-center text-lg font-light md:font-normal xl:font-semibold p-2 text-indigo-800">
                                        <p>Complaint Inbox</p>
                                        <p class="font-thin text-xs text-slate-600">Notifications Preview</p>
                                    </header>
                                    <ul class="bg-white border-gray-300 text-xs font-thin text-black">
                                        <li class="odd:bg-slate-50 even:bg-gray-300 items-center space-x-4 py-2 px-4 hover:bg-white relative flex justify-between items-center text-center lg:pr-20">
                                            <span class="lg:hidden">Feb.24 04:38PM</span>
                                            <span class="hidden lg:block">February 24, 04:38 PM</span>
                                            <span>Name</span>
                                            <div class="flex relative flex-row">
                                                <img class="hidden lg:block absolute -right-12 h-5 w-7" src="../assets/new-tag.gif"/>
                                                <span>20230001</span>
                                                <img class="lg:hidden absolute right-20 h-5 w-7" src="../assets/new-tag.gif"/>
                                            </div>
                                        </li>
                                        <li class="odd:bg-slate-50 even:bg-gray-300 items-center space-x-4 py-2 px-4 hover:bg-white relative flex justify-between lg:pr-20">
                                            <span class="lg:hidden">Feb.23 12:21PM</span>
                                            <span class="hidden lg:block">February 23, 12:21 PM</span>
                                            <span>Name</span>
                                            <span>20230002</span>
                                        </li>
                                        <li class="odd:bg-slate-50 even:bg-gray-300 items-center space-x-4 py-2 px-4 hover:bg-white relative flex justify-between lg:pr-20">
                                            <span class="lg:hidden">Feb.22, 09:33AM</span>
                                            <span class="hidden lg:block">February 22, 09:33 AM</span>
                                            <span>Name</span>
                                            <span>20230003</span>
                                        </li>
                                        <li class="odd:bg-slate-50 even:bg-gray-300 items-center space-x-4 py-2 px-4 hover:bg-white relative flex justify-between lg:pr-20">
                                            <span class="lg:hidden">Feb.21, 06:46PM</span>
                                            <span class="hidden lg:block">February 21, 06:46 PM</span>
                                            <span>Name</span>
                                            <span>20230004</span>
                                        </li>
                                        <li class="odd:bg-slate-50 even:bg-gray-300 items-center space-x-4 py-2 px-4 hover:bg-white relative flex justify-between lg:pr-20">
                                            <span class="lg:hidden">Feb.20, 09:24 PM</span>
                                            <span class="hidden lg:block">February 20, 09:24 PM</span>
                                            <span>Name</span>
                                            <span>20230005</span>
                                        </li>
                                    </ul>
                                </div>
                              </button>
                            <template x-if="isOpen3">
                                <div x-html="content" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10 overflow-auto"></div>
                            </template>
                        </div>
                    </article>
                </div>
                <div class="relative mb-20 lg:mb-0">
                    <article>
                        <div x-data="{ isOpen4: false, content: '' }">
                            <button @click="isOpen4 = true; fetch('complaint-list.html').then(response => response.text()).then(data => content = data)"
                                class="bg-white p-4 px-16 border-4 border-slate-300 rounded-lg text-black mt-10 shadow lg:ml-8 cursor-pointer hover:opacity-40">
                                <div class="flex justify-center items-center flex-col text-center">
                                    <header class="text-center text-lg font-light md:font-normal xl:font-semibold p-2 text-indigo-800">
                                        <h2 class="text-lg font-light md:font-medium xl:font-semibold text-indigo-800">Complaints List</h2>
                                        <p class="font-thin text-xs text-slate-600">Update Preview</p>
                                    </header>
                                    <table class="table table-auto border border-gray-300 border-gray-300 text-xs font-thin text-black">
                                        <thead class="bg-indigo-800 text-white">
                                        <tr>
                                            <th class="py-1 px-4">
                                                <span class="md:hidden">ID</span>
                                                <span class="hidden md:block">Complaint ID</span>
                                            </th>
                                            <th class="py-1 px-4">College</th>
                                            <th class="py-1 px-4">Course</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center text-black">
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white">
                                            <td class="py-2 px-4">20230001</td>
                                            <td class="py-2 px-4 text-yellow-600">Engineering</td>
                                            <td class="py-2 px-4 text-yellow-600">Computer Science</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white">
                                            <td class="py-2 px-4">20230002</td>
                                            <td class="py-2 px-4 text-green-800">Business</td>
                                            <td class="py-2 px-4 text-green-800">Finance</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white">
                                            <td class="py-2 px-4">20230003</td>
                                            <td class="py-2 px-4 text-red-800">Arts</td>
                                            <td class="py-2 px-4 text-red-800">History</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white">
                                            <td class="py-2 px-4">20230004</td>
                                            <td class="py-2 px-4 text-yellow-800">Science</td>
                                            <td class="py-2 px-4 text-yellow-800">Biology</td>
                                        </tr>
                                            <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-600 cursor-pointer hover:text-white text-center">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4 text-purple-800">Psychology</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </button>
                            <template x-if="isOpen4">
                                <div x-html="content" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10 overflow-auto"></div>
                            </template>
                        </div>
                    </article>
                    <div class="sticky flex justify-center lg:justify-start lg:mx-6" x-data="{ isOpen1: false, content: '' }">
                        <button @click="isOpen1 = true; fetch('file-a-complaint.html').then(response => response.text()).then(data => content = data)" class="bg-white py-10 px-40 rounded-xl text-indigo-800 text-sm mx-2 font-medium lg:text-xl lg:font-bold mt-6 shadow border-4 border-slate-300 hover:bg-amber-600 hover:border-amber-600 hover:text-white text-center flex flex-col justify-center items-center space-y-2">
                            <p>File a Complaint</p>
                            <svg class="h-12 w-12" viewBox="0 0 64 64" fill="currentColor">
                                <path fill-rule="evenodd" d="m28,45.86l-1.72,4.14,1.72,4.14-4.14,1.72-1.72,4.14-4.14-1.72-4.14,1.72-1.72-4.14-4.14-1.72,1.72-4.14-1.72-4.14,4.14-1.72,1.72-4.14,4.14,1.72,4.14-1.72,1.72,4.14,4.14,1.72Zm10-37.86h-4v18h18v-4l-14-14Zm-8,0H12v26.9l6,2.48,6.31-2.61,2.61,6.31,6.31,2.61-2.61,6.31,2.49,6h18.9v-26h-22V8Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <template x-if="isOpen1">
                            <div x-html="content" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10 overflow-auto">
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </main>

        <!-- File a Complaint Tab was here -->
        <!-- Search Student was here-->
        <!-- Complaint Inbox was here-->
        <!-- Complain Inbox Message was here-->
        <!-- Complaint List was here -->
    </body>
</html>