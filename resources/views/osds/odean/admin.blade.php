<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=deivce-width initial-scale=1.0">
        <title>OSDS Administrator</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
        
        <style>
            .custom-scroller {
                &::-webkit-scrollbar {
                    width: 20px;
                }
                &::-webkit-scrollbar-track {
                    box-shadow:inset 0 0 5px grey;
                }
                &::-webkit-scrollbar-thumb {
                    background: rgb(8, 39, 255);
                }
                &::-webkit-scrollbar-thumb:hover {
                    background: rgb(0, 34, 100);
                }
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
                width: 0.85em;
                height: 0.85em;
                border: 0.05em solid rgb(0, 34, 100);
                border-radius: 0.15em;
                transform: translateY(-0.075em);
              
                display: grid;
                place-content: center;
                cursor: pointer;
              }
              
              input[name="amber"]::before {
                content: "";
                width: 0.60em;
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
                width: 0.58em;
                height: 0.58em;
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
    </head>
    <body class="selection:bg-amber-50 selection:text-amber-600 cursor-default custom-scroller bg-indigo-50">
        <main class="tracking-wide min-h-screen overflow-x-hidden text-indigo-800">
            <header class="flex flex-row bg-white grid grid-cols-12 items-center border-b border-indigo-800 pl-1 pr-6">
                <!-- Menubar -->
                <div class="flex flex-row justify-evenly items-center col-span-2">
                    <button class="hover:bg-amber-50 p-2 rounded hover:text-amber-600 active:bg-amber-300">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                        </svg>                      
                    </button>
                    <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 lg:px-4 active:bg-amber-300 active:font-semibold p-2 rounded" onclick="location.href='osds-dean-dashboard.html'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Home</p>
                    </button>
                </div>
                <!-- PLM -->
                <div class="border-l border-indigo-300 pl-4 py-2.5 lg:col-span-2">
                    <img class="hidden lg:block h-10 w-auto selection:bg-transparent" alt="PLM Logo" src="{{ asset('assets/plm-logo--with-header.png') }}"/>
                    <img class="lg:hidden block h-8 w-8" src="{{ asset('assets/plm-logo.png') }}"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-5 lg:col-span-4 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-10 w-10" src="{{ asset('assets/osdslogo.png') }}
"/>
                    <div class="flex flex-col">
                        <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                        <input type="text" placeholder="Search anything..." class="focus:outline-none rounded border border-indigo-500 text-xs p-1 placeholder:text-indigo-300 px-2 focus:border-indigo-800"/>
                    </div>
                    <img class="lg:hidden h-8 w-8" src="{{ asset('assets/osdslogo.png') }}
"/>
                </div>
                <div class="col-span-2 flex flex-row justify-end space-x-4 items-end">
                    <button class="transition-colors duration-300 transform rounded-full border-4 border-transparent hover:border-4 text-indigo-500 hover:text-amber-600 hover:border-amber-300 hover:bg-amber-300 focus:outline-none">
                        <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                          </svg>                          
                    </button>
                    <div class="truncate text-indigo-800 max-w-40 w-40">
                        <p class="text-md font-semibold">User Name</p>
                        <p class="text-sm">Position</p>
                    </div>
                </div>
                <div class="text-xs lg:text-sm font-light text-right border-l border-indigo-300 col-span-2">
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
            <article class="grid grid-cols-6">
                <aside class="bg-indigo-800 text-white pb-10 relative">
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" 
                             onclick="location.href='{{ route('odean.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2"
                                    onclick="location.href='{{ route('odean.caserecord') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m30,20v34h-5l-1.89-3.79c-.76-1.51-1.88-2.21-3.58-2.21H6V12h16c4.94,0,8,3.06,8,8Zm12-8c-4.94,0-8,3.06-8,8v34h5l1.89-3.79c.76-1.51,1.88-2.21,3.58-2.21h13.53V12h-16Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Case Records</p>
                        <p class="lg:hidden text-xs">Records</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p>Reports</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2"
                            onclick="location.href='{{ route('odean.admin') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,10.83l-4.22,6.49c-2.72,4.18-4.88,6.85-8.41,10.38l-10.3,10.3-7.07-7.07,10.3-10.3c3.53-3.53,6.19-5.69,10.38-8.41l6.49-4.22,2.83,2.83Zm-32.39,23.37l6.2,6.2-5.8,11.61h-4.44c-2.37,0-3.98.67-5.66,2.34l-1.66,1.66-4.24-4.24,1.66-1.66c1.68-1.68,2.34-3.29,2.34-5.66v-4.44l11.61-5.8Zm-.61,9.8c0-1.66-1.34-3-3-3s-3,1.34-3,3,1.34,3,3,3,3-1.34,3-3Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">Administrator</p>
                        <p class="lg:hidden text-xs">Admin</p>
                    </button>
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m55.89,18.44l3.66-2.71-1.53-3.7-4.51.67c-.65-.84-1.39-1.58-2.21-2.21l.67-4.5-3.7-1.53-2.71,3.66c-1.03-.14-2.08-.14-3.13,0l-2.71-3.66-3.7,1.53.67,4.51c-.84.64-1.58,1.39-2.21,2.21l-4.5-.67-1.53,3.7,3.66,2.71c-.14,1.03-.14,2.08,0,3.13l-3.66,2.71,1.53,3.7,4.51-.67c.64.84,1.39,1.58,2.21,2.21l-.67,4.5,3.7,1.53,2.71-3.66c1.03.14,2.08.14,3.13,0l2.71,3.66,3.7-1.53-.67-4.51c.84-.64,1.58-1.39,2.21-2.21l4.5.67,1.53-3.7-3.66-2.71c.14-1.03.14-2.08,0-3.13Zm-11.89,7.56c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Zm-13.62,12.01l2.34-3.91-2.83-2.83-3.91,2.34c-.9-.52-1.87-.92-2.89-1.19l-1.11-4.42h-4l-1.11,4.42c-1.02.27-1.99.68-2.89,1.19l-3.91-2.34-2.83,2.83,2.34,3.91c-.52.9-.92,1.87-1.19,2.89l-4.42,1.11v4l4.42,1.11c.27,1.02.68,1.99,1.19,2.89l-2.34,3.91,2.83,2.83,3.91-2.34c.9.52,1.87.92,2.89,1.19l1.11,4.42h4l1.11-4.42c1.02-.27,1.99-.68,2.89-1.19l3.91,2.34,2.83-2.83-2.34-3.91c.52-.9.92-1.87,1.19-2.89l4.42-1.11v-4l-4.42-1.11c-.27-1.02-.68-1.99-1.19-2.89Zm-10.38,11.99c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Z" clip-rule="evenodd"></path>
                        </svg>
                        <p>Settings</p>
                    </button>
                    <form action="/logout" method="POST">
                        @csrf
                    <button class="hover:bg-red-200 hover:text-red-600 active:bg-red-400 active:font-semibold flex flex-row items-center justify-center w-full p-4 space-x-2 mt-20" onclick="location.href='login-page.html'">
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
                <div class="col-span-5 bg-white relative">
                    <div class="border-b border-indigo-800 pt-6 pb-1.5 grid grid-cols-6">
                        <p class="ml-6 text-3xl font-thin tracking-widest col-span-2">Employees</p>
                        <div class="col-start-5 col-span-2 w-full pr-6 flex items-center">
                            <input type="text" class="border border-indigo-300 placeholder:text-indigo-300 focus:outline-none focus:border-indigo-800 text-sm w-full font-light p-2" placeholder="Search employee..."/>
                            <button class="p-2 border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:border-amber-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div x-data="{isOpen1:false}">
                        <div style="grid-template-columns: repeat(20, minmax(0, 1fr))" class="grid bg-indigo-100">
                            <div><!-- Checkbox Column --></div>
                            <div style="grid-column: span 19" class="grid grid-cols-4 text-center font-light tracking-widest">
                                <p>Employee ID</p>
                                <p>Employee Name</p>
                                <p>Position</p>
                                <p>Status</p>
                            </div>
                        </div>
                        <div style="grid-column: span 19">
                            <table class="table table-fixed w-full">
                                <tbody id="case-record" class="text-center text-sm font-thin">
                                    @foreach($employees as $employee)
                                    <tr class="hover:bg-amber-50 hover:text-amber-600 cursor-pointer active:bg-amber-200 active:font-semibold selection:bg-transparent" @click="isOpen1 = !isOpen1">
                                        <td>{{ $employee->employee_id }}</td>
                                        <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td class="text-green-600">{{ $employee->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                    <div class="absolute bottom-6 left-4" x-data="{isOpen3:false}">
                        <button class="p-1.5 shadow shadow-indigo-500 rounded-md font-light hover:bg-amber-50 hover:text-amber-600 hover:shadow-amber-600 active:bg-amber-200 active:font-semibold" type="button" @click="isOpen3 = !isOpen3" title="Select employee to terminate">
                            <p class="text-sm">Remove</p>
                        </button>
                        <div x-show="isOpen3" class="fixed inset-0 bg-black bg-opacity-50 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50">
                            <div class="fixed inset-0" @click="isOpen3 = false"></div>
                            <div class="relative top-1/3 bg-white p-4 mx-auto max-w-lg h-fit rounded shadow-md border border-amber-600">
                                <div class="border-b border-amber-300 flex flex-row justify-between">
                                    <div>
                                        <p class="text-lg font-thin tracking-widest">Employee ID</p>
                                        <p class="text-xs tracking-widest">0000-0000-0000</p>
                                    </div>
                                    <div>
                                        <button class="p-1.5 px-4 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen3 = false">
                                            <p class="text-xs tracking-widest">Go back</p>
                                        </button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 text-xs lg:text-sm pt-3 flex items-center">
                                    <div class="border-dashed border flex justify-center mx-auto border-amber-300">
                                        <!-- remove after updating profile picture -->
                                        <svg class="w-28 h-28" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                                        </svg>                                          
                                        <img class="hidden"/>
                                    </div>
                                    <div class="space-y-1">
                                        <div>
                                            <p class="hidden lg:block">Employee Name:</p>
                                            <p class="lg:hidden">Name:</p>
                                        </div>
                                        <p>Position:</p>
                                        <p>Status:</p>
                                    </div>
                                    <div class="font-light tracking-wider space-y-1">
                                        <p class="truncate">Juan Luna</p>
                                        <p>Employee</p>
                                        <p class="text-red-600 selection:bg-red-50 selection:text-red-800">No notice</p>
                                    </div>
                                </div>
                                <div class="flex justify-end items-center space-x-2">
                                    <p class="text-xs font-light tracking-widest">Confirm termination?</p>
                                    <button type="button" onclick="location.href='osds-employee-terminated.html'" class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50 hover:text-indigo-800 active:bg-indigo-200 active:font-semibold">
                                        <p class="text-xs">Terminate</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-6 right-6">
                        <button class="p-2 shadow shadow-indigo-500 rounded-md font-light hover:bg-amber-50 hover:text-amber-600 hover:shadow-amber-600 active:bg-amber-200 active:font-semibold" type="button" onclick="location.href='osds-add-employee.html'" title="Add a new employee">
                            <p>Add</p>
                        </button>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>