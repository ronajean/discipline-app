<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>OSDS Staff Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-scroller {
            &::-webkit-scrollbar {
                width: 20px;
            }
            &::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
            }
            &::-webkit-scrollbar-thumb {
                background: rgb(8, 39, 255);
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
        .notification-box {
            width: 300px; /* Adjust the width as needed */
            margin: 0 auto; /* Center the notification box */
            height: 100vh;
        }
    </style>
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
            <img class="hidden lg:block h-10 w-10" src="assets/osdslogo.png"/>
            <div class="flex flex-col">
                <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                <input type="text" placeholder="Search anything..." class="focus:outline-none rounded border border-indigo-500 text-xs p-1 placeholder:text-indigo-300 px-2 focus:border-indigo-800"/>
            </div>
            <img class="hidden lg:block h-10 w-10"src="assets/plm-logo--with-header.png"/>
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
    <article class="flex">
        <aside class="bg-indigo-800 text-white pb-10 relative w-1/6">
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" 
                     onclick="location.href='{{ route('staff.dashboard') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-xs lg:text-base">Home</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2"
                            onclick="location.href='{{ route('staff.caserecord') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m30,20v34h-5l-1.89-3.79c-.76-1.51-1.88-2.21-3.58-2.21H6V12h16c4.94,0,8,3.06,8,8Zm12-8c-4.94,0-8,3.06-8,8v34h5l1.89-3.79c.76-1.51,1.88-2.21,3.58-2.21h13.53V12h-16Z" clip-rule="evenodd"></path>
                </svg>
                <p class="hidden lg:block">Case Records</p>
                <p class="lg:hidden text-xs">Records</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" 
                        onclick="location.href='{{ route('staff.gmcrequest') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 48 48" webcrx="">
                    <g>
                        <rect width="48" height="48" fill="none"/>
                        <rect width="48" height="48" fill="none"/>
                    </g>
                    <g>
                        <path fill="currentColor" d="M46,24a12.9,12.9,0,0,0-4-9.4V7a2,2,0,0,0-2-2H4A2,2,0,0,0,2,7V41a2,2,0,0,0,2,2H26v1.6c0,2,2,3.1,3.3,1.8L33,43l3.7,3.4c1.3,1.3,3.3.2,3.3-1.8V34.9A12.9,12.9,0,0,0,46,24ZM33,15a9,9,0,1,1-9,9A9,9,0,0,1,33,15ZM12,14H24.7L23,15.7A11.4,11.4,0,0,0,21.5,18H12a2,2,0,0,1,0-4Zm0,8h8.2a6.5,6.5,0,0,0-.2,2,6.8,6.8,0,0,0,.2,2H12a2,2,0,0,1,0-4Zm0,12a2,2,0,0,1,0-4h9.5A11.4,11.4,0,0,0,23,32.3,13.7,13.7,0,0,0,24.7,34Z"/>
                        <circle cx="33" cy="24" r="5" fill="currentColor"/>
                    </g>
                </svg>
                <p class="hidden lg:block">GMC Requests</p>
                <p class="lg:hidden text-xs">GMC</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2"
                    onclick="location.href='{{ route('staff.archive') }}'">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m54,10v40h-4l-20-10h-4l4,16h-10l-4-16c-4.94,0-8-3.06-8-8v-4c0-4.94,3.06-8,8-8h14l20-10h4Z" clip-rule="evenodd"></path>
                </svg>
                <p>Archive</p>
            </button>
            <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
                <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                    <path fill-rule="evenodd" d="m55.89,18.44l3.66-2.71-1.53-3.7-4.51.67c-.65-.84-1.39-1.58-2.21-2.21l.67-4.5-3.7-1.53-2.71,3.66c-1.03-.14-2.08-.14-3.13,0l-2.71-3.66-3.7,1.53.67,4.51c-.84.64-1.58,1.39-2.21,2.21l-4.5-.67-1.53,3.7,3.66,2.71c-.14,1.03-.14,2.08,0,3.13l-3.66,2.71,1.53,3.7,4.51-.67c.64.84,1.39,1.58,2.21,2.21l-.67,4.5,3.7,1.53,2.71-3.66c1.03.14,2.08.14,3.13,0l2.71,3.66,3.7-1.53-.67-4.51c.84-.64,1.58-1.39,2.21-2.21l4.5.67,1.53-3.7-3.66-2.71c.14-1.03.14-2.08,0-3.13Zm-11.89,7.56c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Zm-13.62,12.01l2.34-3.91-2.83-2.83-3.91,2.34c-.9-.52-1.87-.92-2.89-1.19l-1.11-4.42h-4l-1.11,4.42c-1.02.27-1.99.68-2.89,1.19l-3.91-2.34-2.83,2.83,2.34,3.91c-.52.9-.92,1.87-1.19,2.89l-4.42,1.11v4l4.42,1.11c.27,1.02.68,1.99,1.19,2.89l-2.34,3.91,2.83,2.83,3.91-2.34c.9.52,1.87.92,2.89,1.19l1.11,4.42h4l1.11-4.42c1.02-.27,1.99-.68,2.89-1.19l3.91,2.34,2.83-2.83-2.34-3.91c.52-.9.92-1.87,1.19-2.89l4.42-1.11v-4l-4.42-1.11c-.27-1.02-.68-1.99-1.19-2.89Zm-10.38,11.99c-3.31,0-6-2.69-6-6s2.69-6,6-6,6,2.69,6,6-2.69,6-6,6Z" clip-rule="evenodd"></path>
                </svg>
                <p>Settings</p>
            </button>
            <form method="POST" action="/logout">
                @csrf
                <button class="hover:bg-red-200 hover:text-red-600 active:bg-red-400 active:font-semibold flex flex-row items-center justify-center w-full p-4 space-x-2 mt-24" onclick="location.href='login-page.html'">
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
        <div class="ml-4">
            <div class="bg-white h-full border-x border-indigo-800">
                <p class="text-3xl text-center tracking-widest py-6">Welcome</p>
                <div class="pb-1.5 mx-20">
                    <div class="grid grid-cols-6 font-mono text-xs max-w-lg flex items-center mx-6">
                        @foreach ($employees as $employee)
                            <p class="col-start-1 text-base">Name:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 col-start-3 col-span-4">{{$employee->first_name}} {{$employee->last_name}}</p>
                            <p class="col-start-1 text-base">Role:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 col-start-3 col-span-4">{{$employee->designation}}</p>
                            <p class="col-start-1 text-base">Office:</p>
                            <p class="text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 col-start-3 col-span-4">{{$employee->department}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white col-span-5 rounded shadow-md p-6 mx-4">
                    <div class="w-full h-96">
                        <canvas id="violationsChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-box p-4">
            <div class="bg-white rounded shadow border border-indigo-800 max-h-[80vh] overflow-hidden">
                <div class="flex flex-row justify-center border-b border-indigo-300 py-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                    </svg>                          
                    <p>Notifications</p>
                </div>
                <div class="font-light text-sm pb-4 tracking-widest custom-scroller-small max-h-screen min-h-screen overflow-y-auto">
                    @foreach ($allNotifications as $notification)
                        <div class="hover:bg-amber-50 hover:text-amber-600 flex flex-col items-start w-full p-3 mt-4 space-y-1">
                            <p class="font-semibold">{{ $notification->title }}</p>
                            <p class="text-xs">{{ $notification->message }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
</main>

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('violationsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($violations->pluck('course')),
                datasets: [{
                    label: 'Number of Violations',
                    data: @json($violations->pluck('count')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>
</html>
