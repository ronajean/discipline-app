<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>OSDS Add Case Record</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

        <script>
        
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelector('#searchButton').addEventListener('click', function() {
                        const student_id = document.querySelector('#searchField').value;
            
                        fetch(`/students/${student_id}`)
                            .then(response => response.json())
                            .then(data => {
                                // Fill the form with the returned data
                                console.log('Data:', data); // Log data for debugging
                                document.querySelector('#studentNumber').value = data.student_id;
                                document.querySelector('#studentName').value = data.last_name + ',' + data.first_name + (data.middle_name ? ' ' + data.middle_name : '');
                                document.querySelector('#yearAndBlock').value = data.Year+'-'+data.Block;
                                document.querySelector('#collegeName').value = data.college_id;
                                document.querySelector('#courseId').value = data.course_id;
                            });
                    });
            });

            document.addEventListener('DOMContentLoaded', function() {
    const addCaseButton = document.querySelector('#addCase');
    if (addCaseButton) {
        // Button exists, so add the event listener
        addCaseButton.addEventListener('click', function() {
            const formData = new FormData(document.querySelector('#caseForm'));

            fetch('{{ route("new_case") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Log the response for debugging
                // Optionally, you can show a success message to the user or redirect them to another page
            })
            .catch(error => {
                console.error('Error:', error); // Log any errors
            });
        });
    } else {
        console.error('Button with ID "addCase" not found.');
    }
});


        </script>

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
        </style>
    </head>
    <body class="bg-indigo-50 selection:bg-amber-50 selection:text-amber-600 cursor-default custom-scroller">
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
                    <img class="hidden lg:block h-10 w-10" src="{{ asset('assets/osdslogo.png') }}"/>
                    <div class="flex flex-col">
                        <h1 class="text-sm font-light">The Office of Student Development and Services</h1>
                        <input type="text" placeholder="Search anything..." class="focus:outline-none rounded border border-indigo-500 text-xs p-1 placeholder:text-indigo-300 px-2 focus:border-indigo-800"/>
                    </div>
                    <img class="lg:hidden h-8 w-8" src="{{ asset('assets/osdslogo.png') }}"/>
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
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2">
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
                <div class="col-span-5 bg-white">
                    <div class="border-y border-indigo-800 flex flex-row justify-between">
                        <p class="text-xl ml-20 font-thin py-2">Adding Case Information</p>
                        <div class="mr-20 flex items-center">
                            <input id="searchField" type="search" placeholder="Search students..." class="w-64 placeholder:text-indigo-300 h-full text-amber-600 selection:text-indigo-50 selection:text-indigo-800 focus:outline-none border border-indigo-300 focus:border-indigo-800 px-2 placeholder:text-xs placeholder:tracking-widest text-xs"/>
                            <button id="searchButton" class="p-3 h-full border border-indigo-300 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>                                      
                            </button>
                        </div>
                    </div>
                    <form id="caseForm" method="POST" action="{{ route('violations.store') }}" enctype="multipart/form-data"> 
                        @csrf
                        <aside class="relative p-4 text-sm tracking-wider border-b border-indigo-800 pb-1.5 grid grid-cols-12 ">
                            <div id="edit-case" class="hidden absolute z-10 w-full h-full bg-amber-900 backdrop-blur-[1px] bg-opacity-5">
                                <p style="letter-spacing:1em;" class="font-serif text-5xl w-full h-full flex items-center justify-center">Edit</p>
                            </div>
                            <div class="col-span-2 flex flex-col justify-between">
                                <p>Student Number</p>
                                <p>Student Name</p>
                                <p>Year and Block</p>
                                <p>College</p>
                                <p>Course</p>
                            </div>
                            <div class="flex flex-col justify-between">
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                            </div>
                            <div id="text-boost" class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800 col-span-9 flex flex-col justify-between">
                                <input name="student_id" id="studentNumber">
                                <input  id="studentName">
                                <input name="year_and_block" id="yearAndBlock">
                                <input name="college" id="collegeName">
                                <input name="course" id="courseId">
                            </div>
                        </aside>
                    <script>
                        
                        function letterBoost() {
                            document.getElementById("text-boost").classList.add("font-semibold");
                        }
                        function letterDown() {
                            document.getElementById("text-boost").classList.remove("font-semibold");
                        }
                        function tabEdit() {
                            document.getElementById("edit-case").classList.remove("hidden");
                        }
                        function hideEdit() {
                            document.getElementById("edit-case").classList.add("hidden");
                        }
                    </script>
                    <article>
                        
                            <div class="grid grid-cols-3 mx-4 py-6">
                                <div class="mr-4">
                                    <p class="underline tracking-widest">A. LIGHT OFFENSES</p>
                                    <div class="grid grid-cols-12 gap-1" x-data="{isOpen4:false}">
                                        <label class="text-lg">
                                            <input type="checkbox" value="Non-wearing of face mask" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Non-wearing of face mask</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Loitering" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Loitering</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Noise disturbance" name="offense[]"  name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Noise disturbance</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Non-wearing of ID card" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Non-wearing of ID card</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Refusal to present the ID card" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Refusal to present the ID card</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Refusal to present the Registration Form" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Refusal to present the Registration Form</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Wearing civilian attire w/ academic subjects" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Wearing civilian attire w/ academic subjects</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Wearing P.E. uniform w/ academic subjects" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Wearing P.E. uniform w/ academic subjects</p>
                                    
                                        <label class="text-lg">
                                            <input type="checkbox" value="Wearing of improper civilian attire" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Wearing of improper civilian attire<span @click="isOpen4 = !isOpen4" class="text-xs font-light underline cursor-pointer hover:text-amber-600">[see here]</span></p>
                                        <div x-show="isOpen4" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/4 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Improper civilian attire</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] Ripped/torn jeans</p>
                                                    <p>[B] Leggings and skinny jeans</p>
                                                    <p>[C] Shorts and over tight cuts</p>
                                                    <p>[D] Crop tops</p>
                                                    <p>[E] Wearing bull caps</p>
                                                    <p>[F] Wearing earrings (Male)</p>
                                                    <p>[G] Having sports tattoos</p>
                                                </div>
                                                <div class="flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen4 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mr-4">
                                    <p class="underline tracking-widest">B. LESS GRAVE OFFENSES</p>
                                    <div class="grid grid-cols-12 gap-1" x-data="{isOpen5:false, isOpen6:false, isOpen7:false, isOpen8:false, isOpen9:false, isOpen10:false}">
                                        <label class="text-lg">
                                            <input type="checkbox" value="Cheating" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Cheating<span @click="isOpen5 = !isOpen5" class="text-xs underline cursor-pointer hover:text-amber-600">[see here]</span></p>
                                        <div x-show="isOpen5" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/4 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Cheating</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] Using any material relevant to the exam during the examination</p>
                                                    <p>[B] Allowing somebody to copy during examination</p>
                                                    <p>[C] Without consent of copying one's work</p>
                                                    <p>[D] Looking into another's examination paper</p>
                                                    <p>[E] Talking to another person during an examination without the permission</p>
                                                    <p>[F] Examination leakage</p>
                                                </div>
                                                <div class="flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen5 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Gambling" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Gambling<span @click="isOpen6 = !isOpen6" class="text-xs underline cursor-pointer hover:text-amber-600">[see here]</span></p>
                                        <div x-show="isOpen6" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/3 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Gambling</p>
                                                <div class="text-sm font-light">
                                                    <p><span class="font-medium">Possession</span>, <span class="font-medium">carrying</span> and <span class="font-medium">bringing</span> inside the University premises <span class="font-medium">gambling cards</span> and <span class="font-medium">other gambling devices</span>; and indulging in <span class="font-medium">any form of betting or gambling</span>.</p>
                                                </div>
                                                <div class="flex justify-end">
                                                    <button class="mt-3 p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen6 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value=">Unauthorized passage/entry" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Unauthorized passage/entry<span @click="isOpen7 = !isOpen7" class="text-xs underline hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen7" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/4 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Unauthorized passage/entry</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] Unauthorized passage/entry through prohibited areas within the University premises.</p>
                                                    <p>[B] <span class="font-medium">Lending one's ID card</span>, <span class="font-medium">using another person's ID card</span>, and <span class="font-medium">other forms of misrepresentation of one's identity</span> within the University premises. No students shall use the ID of another, and/or lend his/her ID for somebody else's use.</p>
                                                    <p>[C] <span class="font-medium">Intentionally providing means for an outsider to gain entry</span> in the University premises <span class="font-medium">without consent</span> from the approving authority.</p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen7 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Damage within University premises" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Damage within University premises<span @click="isOpen8 = !isOpen8" class="text-xs underline hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen8" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/4 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Damage within University premises</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] <span class="font-medium">Posting of any printed material</span> or <span class="font-medium">posters without the approval of the OSDS</span> . <span class="font-medium">Removing</span>, <span class="font-medium">altering</span>, <span class="font-medium">erasing</span> of <span class="font-medium">official notices and posters</span> from the bulletin boards, without authorization.</p>
                                                    <p>[B] Any form of <span class="font-medium">vandalism</span> including but not limited to <span class="font-medium">writing, drawing, sketching, etching, carving, engraving, printing, or painting any letters, words, and figures</span> on any property of the University.</p>
                                                    <p>[C] <span class="font-medium">Damaging the personal property</span> of other students within the University, faculty members and employees of the University within and outside the University.</p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen8 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value ="Unauthorized use of University property" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Unauthorized use of University property<span @click="isOpen9 = !isOpen9" class="text-xs underline hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen9" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/3 bottom-1/3 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Unauthorized use of University property</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] <span class="font-medium">Unauthorized use of PLM logo or seal</span>, attempt to <span class="font-medium">imitate</span>, and use of a <span class="font-medium">strikingly similar symbol</span>.</p>
                                                    <p>[B] Unauthorized use of, tampering with, or the <span class="font-medium">deliberate misuse of University properties.</span></p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen9 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Bullying" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Bullying <span class="text-xs font-thin">(R.A 10627, Anti-Bullying Act of 2013)</span></p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Other immoral acts" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Other immoral acts<span @click="isOpen10 = !isOpen10" class="text-xs underline hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen10" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-1/4 bg-white mx-auto max-w-sm max-h-96 p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Other immoral acts</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] <span class="font-medium">Possession, publishing, viewing, reading, displaying, selling, or distributing morally offensive materials, and committing</span> other <span class="font-medium">vulgar</span> or <span class="font-medium">indecent acts</span> while within the University premises.</p>
                                                    <p>[B] <span class="font-medium">Smoking</span></p>
                                                    <p>[C] <span class="font-medium">Violation of conditions</span> as <span class="font-medium">set forth by the approving authority</span>.</p>
                                                    <p>[D] Any person who has been penalized for any provisions who shall <span class="font-medium">evade service of his/her penalty.</span></p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen10 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="underline tracking-widest">C. GRAVE OFFENSES</p>
                                    <div class="grid grid-cols-12 gap-1" x-data="{isOpen11:false, isOpen12:false, isOpen13:false, isOpen14:false}">
                                        <label class="text-lg">
                                            <input type="checkbox" value="Fourth(4th) and subsequent commission of the same less grave offense" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Fourth(4th) and subsequent commission of the same less grave offense</p>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Falsification, fraud and misleading" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Falsification, fraud and misleading<span @click="isOpen11 = !isOpen11" class="text-xs font-light hover:text-amber-600 cursor-pointer underline">[see here]</span></p>
                                        <div x-show="isOpen11" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                                            <div class="relative top-6 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Falsification, fraud and misleading</p>
                                                <div class="text-xs font-light">
                                                    <p>([A]) <span class="font-medium">Obtaining money or property</span> from any person, group, or organization <span class="font-medium">using false pretense</span>, <span class="font-medium">deceit</span> or <span class="font-medium">fraud</span>.</p>
                                                    <p>([B]) <span class="font-medium">Submitting false or misleading statements in official documents</span> filed with the University, publishing or disseminating oral or written false information about the University, its officials, faculty members, employees and students.</p>
                                                    <p>([C]) <span class="font-medium">Manipulation</span> of data affecting the integrity of <span class="font-medium">research-related</span> projects.</p>
                                                    <p>([D]) Submitting <span class="font-medium">plagiarized academic requirement</span>.</p>
                                                    <p>([E]) <span class="font-medium">Forging</span> of signature, or any similar acts, tampering, securing or using materials with forged <span class="font-medium">signature</span>, <span class="font-medium">school records</span> or <span class="font-medium">credentials</span>.</p>
                                                    <p>([F]) <span class="font-medium">Forging or simulating any handwriting</span>, signature or rubric, stating false statements, changing actual dates, revising or <span class="font-medium">inserting a statement or word to modify the meaning of a document or claim that such is original</span>, suggesting participation in an event in complete absence of, and <span class="font-medium">participating in an event simplifying to have been supported of legal documents even if in fact none.</span></p>
                                                    <p>([G]) <span class="font-medium">Any student</span> who knowingly and <span class="font-medium">falsely represent themself</span> to be <span class="font-medium">a student organization/ council officer</span>, <span class="font-medium">University employee</span> or perform any act pertaining to a student organization/ council official, University employee or <span class="font-medium">government official</span> or <span class="font-medium">employee without lawfully entitled to do so.</span></p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen11 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Intentional and reckless act" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Intentional and reckless act<span @click="isOpen12 = !isOpen12" class="text-xs underline font-thin hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen12" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800 bg-black bg-opacity-50">
                                            <div class="relative top-6 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Intentional and reckless act</p>
                                                <div class="text-xs font-light">
                                                    <p>([A]) <span class="font-medium">Intentional</span> or reckless <span class="font-medium">damage</span> or destruction to <span class="font-medium">University properties</span>.</p>
                                                    <p>([B]) <span class="font-medium">Bringing</span> of <span class="font-medium">deadly weapons</span> in University premises.</p>
                                                    <p>([C]) Engaging in, challenging or inciting to <span class="font-medium">bout or duel</span>, <span class="font-medium">with or without the use of weapons.</span></p>
                                                    <p>([D]) Participating in any <span class="font-medium">mob</span>, <span class="font-medium">riot</span> or <span class="font-medium">tumultuous affray</span> within the University premises.</p>
                                                    <p>([E]) Discharge of <span class="font-medium">firearm</span>, <span class="font-medium">rocket</span>, <span class="font-medium">firecracker</span> or <span class="font-medium">other explosive</span> calculated <span class="font-medium">to cause alarm or danger</span> in the University premises.</p>
                                                    <p>([F]) <span class="font-medium">Using language and committing acts that are libelous and/or slanderous</span> against the students, employees, faculty members or officials of PLM. Or committing acts that <span class="font-medium">may embarass</span> or <span class="font-medium">bring dishonor</span> to students, employees, or officials of PLM.</p>
                                                    <p>([G]) Intentionally <span class="font-medium">inflicting physical injuries</span> to other persons.</p>
                                                    <p>([H]) <span class="font-medium">Attack</span>, <span class="font-medium">employ force</span>, <span class="font-medium">intimidation</span>, or <span class="font-medium">resist faculty or employee</span> while engaging in the performance of official duties or occasion <span class="font-medium">of such duties</span>.</p>
                                                    <p>([I]) The <span class="font-medium">unauthorized burning of own or another's personal property</span> within the University premises, and the <span class="font-medium">attempt or actual burning of University property.</span></p>
                                                    <p>([J]) An abusive treatment that may involve <span class="font-medium">verbal harassment</span> and <span class="font-medium">intimidation</span>, <span class="font-medium">use of force or coercion</span> which prevents another from doing something or <span class="font-medium">force him/her to do something against his/her will.</span></p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen12 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Other malicious acts" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Other malicious acts<span @click="isOpen13 = !isOpen13" class="text-xs underline font-thin hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen13" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800 bg-black bg-opacity-50">
                                            <div class="relative top-20 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Other malicious acts</p>
                                                <div class="text-xs font-light">
                                                    <p>([A]) Any act of <span class="font-medium">lasciviousness upon another person.</span></p>
                                                    <p>([B]) Possession, carrying, or bringing inside the University premises any <span class="font-medium">alcoholic drink</span> and/or <span class="font-medium">prohibited drugs</span> or entering the University premises <span class="font-medium">under the influence of either or both.</span></p>
                                                    <p>([C]) <span class="font-medium">Illegal association</span>, <span class="font-medium">founding</span>, <span class="font-medium">maintaining</span> official position or membership of associations involved in <span class="font-medium">activities unlawful or otherwise penalized under this Manual.</span></p>
                                                    <p>([D]) <span class="font-medium">Preventing or threatening students</span>, <span class="font-medium">faculty members</span> or <span class="font-medium">school authorities</span>, in any manner, from attending classes, school activities or entering the University premises, or <span class="font-medium">from discharging their duties.</span></p>
                                                    <p>([E]) Preventing entry to or exit from or <span class="font-medium">restricting the freedom of movement of another</span> within the University premises.</p>
                                                    <p>([F]) Interfering with or <span class="font-medium">unjustified absence in any official activity</span>. <span class="font-medium">Instigating other people to be absent from any official activity.</span></p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen13 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="text-lg">
                                            <input type="checkbox" value="Misuse of funds or property" name="offense[]" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                        </label>
                                        <p class="text-sm col-span-11">Misuse of funds or property<span @click="isOpen14 = !isOpen14" class="text-xs underline font-thin hover:text-amber-600 cursor-pointer">[see here]</span></p>
                                        <div x-show="isOpen14" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800 bg-black bg-opacity-50">
                                            <div class="relative top-1/4 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                                <p class="border-b border-amber-300 pb-1.5 tracking-widest">Misuse of funds or property</p>
                                                <div class="text-sm font-light">
                                                    <p>[A] <span class="font-medium">Unauthorized use of funds or property</span> of any person, group, class, organization/ student council. <span class="font-medium">Failure to account</span> for the appropriated funds.</p>
                                                    <p>[B] <span class="font-medium">Any officer of an official student organization/ council who is accountable for funds or property</span> of the organization/ council, shall appropriate or misappropriate, shall permit any other person to take the funds or property.</p>
                                                </div>
                                                <div class="mt-3 flex justify-end">
                                                    <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:text-indigo-800 hover:bg-indigo-50 active:bg-indigo-200 active:font-semibold" @click="isOpen14 = false">
                                                        <p class="text-xs">Go back</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-6">
                                <p class="tracking-widest text-sm">Description</p>
                                <textarea class="w-full focus:outline-none border border-indigo-300 p-2 placeholder:text-sm placeholder:text-indigo-300 font-light focus:border-indigo-800 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 min-h-32 max-h-44" placeholder="Limit: maximum of 500 characters"></textarea>
                            </div>
                            <div class="flex justify-end m-20 mr-6">
                                <button type="submit" id="addCase" class="p-2 shadow shadow-indigo-500 rounded-md hover:bg-amber-50 hover:shadow-amber-600 hover:text-amber-600 active:bg-amber-200 active:font-semibold">
                                    <p>Add Case</p>
                                </button>
                            </div>
                        </form>
                        
                    </article>
                </div>
                </form>
            </article>
        </main>
    </body>
</html>