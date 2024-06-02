<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>PLM USO OSDS POV</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

        <style>
            @font-face {
                font-family: 'Aston Script';
                src: url("assets/aston-script.woff");
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
                width: 0.65em;
                height: 0.65em;
                border: 0.05em solid rgb(0, 34, 100);
                border-radius: 0.15em;
                transform: translateY(-0.075em);
              
                display: grid;
                place-content: center;
                cursor: pointer;
              }
              
              input[name="amber"]::before {
                content: "";
                width: 0.62em;
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
                width: 0.42em;
                height: 0.40em;
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

              @keyframes slide-in {
                from {
                    transform: translateX(750px);
                }
                to {
                    transform: translateX(0);
                }
              }
              @keyframes slide-out {
                from {
                    transform: translateX(-740px);
                }
                to {
                    transform: translateX(0);
                }
              }
        </style>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                     const studentIdInput = document.querySelector('#student-id-input');
     
                     studentIdInput.addEventListener('keydown', function(event) {
                         if (event.key === 'Enter') {
                             event.preventDefault();
     
                             const student_id = this.value;
                             console.log('Student ID:', student_id); // Log student_id for debugging
     
                             fetch(`/students/${student_id}`)
                                 .then(response => {
                                     console.log('Response:', response); // Log response for debugging
                                     return response.json();
                                 })
                                 .then(data => {
                                     console.log('Data:', data); // Log data for debugging
                                     document.querySelector('#studentName').value = data.last_name + ',' + data.first_name + (data.middle_name ? ' ' + data.middle_name : '');
                                     document.querySelector('#yearAndBlock').value = data.Year + '-' + data.Block;
                                     document.querySelector('#collegeName').value = data.college_id;
                                     document.querySelector('#courseName').value = data.course_id;
                                 })
                                 .catch(error => {
                                     console.error('Fetch error:', error); // Log any fetch errors
                                 });
                         }
                     });
     
                     document.querySelector('#fileReportButton').addEventListener('click', function(event) {
                         event.preventDefault();
     
                         const formData = new FormData(document.querySelector('#violationForm'));
     
                         fetch('{{ route("report") }}', {
                             method: 'POST',
                             headers: {
                                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                             },
                             body: formData
                         })
                         .then(response => response.json())
                         .then(data => {
                             console.log('Data:', data);
                             // Handle successful form submission
                         })
                         .catch(error => {
                             console.error('Form submission error:', error);
                         });
                     });
                 });
             </script>
    </head>
    <body class="selection:bg-amber-50 selection:text-amber-600 custom-scroller">
        <main class="tracking-wide min-h-screen bg-indigo-50 overflow-x-hidden cursor-default text-indigo-800">
            <header class="flex flex-row bg-white grid grid-cols-12 items-center border-b border-indigo-800 pl-1 pr-6">
                <!-- PLM -->
                <div class="pl-4 py-1.5 lg:col-span-4">
                    <img class="hidden lg:block h-12 w-auto selection:bg-transparent" alt="PLM Logo" src="{{ asset('assets/plm-logo--with-header.png') }}"/>
                    <img class="lg:hidden block h-8 w-8" src="{{ asset('assets/plm-logo.png') }}"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-8 lg:col-span-6 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-12 w-12" src="{{ asset('assets/osdslogo.png') }}" title="OSDS Logo"/>
                    <h1 class="text-sm lg:text-xl font-light">The Office of Student Development and Services</h1>
                    <img class="lg:hidden h-8 w-8" src="{{ asset('assets/osdslogo.png') }}"/>
                </div>
                <div class="text-xs lg:text-sm font-light text-right col-span-2">
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
            <div class="border-b border-slate-300 w-full space-x-20 relative" x-data="{isOpen1:false, isOpen2:true}">
                <div class="flex justify-center">
                    <p class="text-center text-sm lg:text-lg tracking-widest font-mono text-indigo-800 py-6">University Security Office</p>
                </div>
                <div style="animation-name:slide-out; animation-duration:1s;" x-show="isOpen2" class="text-right absolute right-0 top-0">
                    <button class="p-2 shadow rounded-lg bg-white text-indigo-800 hover:bg-amber-50 hover:text-amber-600 text-xs lg:text-sm hover:font-medium active:font-bold active:bg-amber-200 py-4 lg:py-16" @click="isOpen1 = !isOpen1, isOpen2 = false">
                        <div class="flex space-x-2 items-center hover:space-x-4">
                            <svg class="w-4 h-4 lg:w-6 lg:h-6" viewBox="0 0 64 64" fill="currentColor">
                                <path fill-rule="evenodd" d="m56,36v14h-6c0-6.17-3.83-10-10-10h-10v10h-4L6,30,26,10h4v10h10c9.87,0,16,6.13,16,16Z" clip-rule="evenodd"/>
                            </svg>
                            <p class="hidden lg:block">Show<br>Recorded<br>Students<br>Case</p>
                            <p class="lg:hidden">Show<br>Records</p>
                        </div>
                    </button>
                </div>
                <!-- Show Students List -->
                <div style="animation-name:slide-in; animation-duration:1s;" class="absolute right-0 top-0" x-show="isOpen1">
                    <div class="relative flex lg:block justify-start custom-scroller overflow-x-auto mb-8">
                        <div class="flex flex-col lg:flex-row lg:justify-end items-end lg:items-start">
                            <button class="z-10 p-2 rounded-t-lg lg:rounded-l-lg bg-white text-indigo-800 hover:bg-amber-50 hover:shadow text-xs lg:text-sm hover:text-amber-600 active:bg-amber-200 active:font-bold hover:font-medium lg:py-16" @click="isOpen2 = !isOpen2, isOpen1 = false">
                                <div class="flex space-x-2 items-center hover:space-x-4">
                                    <svg class="w-4 h-4 lg:w-6 lg:h-6" viewBox="0 0 64 64" transform="scale(-1,1)" fill="currentColor">
                                        <path fill-rule="evenodd" d="m56,36v14h-6c0-6.17-3.83-10-10-10h-10v10h-4L6,30,26,10h4v10h10c9.87,0,16,6.13,16,16Z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="hidden lg:block">Hide<br>Recorded<br>Students<br>Case</p>
                                    <p class="lg:hidden">Hide<br>Records</p>
                                </div>
                            </button>
                            <div class="bg-white p-2 shadow-lg rounded-b-lg">
                                <table class="table table-fixed border border-gray-300 border-gray-300 text-xs font-thin text-black">
                                    <thead class="bg-indigo-800 text-white">
                                        <tr>
                                            <th class="py-1 px-4">
                                                <span class="md:hidden">ID</span>
                                                <span class="hidden md:block">Student ID</span>
                                            </th>
                                            <th class="py-1 px-4">
                                                <span class="md:hidden">Name</span>
                                                <span class="hidden md:block">Student Name</span>
                                            </th>
                                            <th class="py-1 px-4">
                                                <span class="md:hidden">Year</span>
                                                <span class="hidden md:block">Year Level</span>
                                            </th>
                                            <th class="py-1 px-4">Course</th>
                                            <th class="py-1 px-4">College</th>
                                            <th class="py-1 px-4">
                                                <span class="md:hidden">Offense</span>
                                                <span class="hidden md:block">Offense Type</span>
                                            </th>
                                            <th class="py-1 px-4">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-black">
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230001</td>
                                            <td class="py-2 px-4">Jerome Caladiao</td>
                                            <td class="py-2 px-4">2</td>
                                            <td class="py-2 px-4">BSCS</td>
                                            <td class="py-2 px-4 text-yellow-600">Engineering</td>
                                            <td class="py-2 px-4">Offense 1</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230002</td>
                                            <td class="py-2 px-4">Niño Sanchez</td>
                                            <td class="py-2 px-4">2</td>
                                            <td class="py-2 px-4">BSF</td>
                                            <td class="py-2 px-4 text-green-800">Business</td>
                                            <td class="py-2 px-4">Offense 1</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230003</td>
                                            <td class="py-2 px-4">Rona Castro</td>
                                            <td class="py-2 px-4">1</td>
                                            <td class="py-2 px-4">BSH</td>
                                            <td class="py-2 px-4 text-red-800">Arts</td>
                                            <td class="py-2 px-4">Offense 1</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230004</td>
                                            <td class="py-2 px-4">Jonald Teñio</td>
                                            <td class="py-2 px-4">1</td>
                                            <td class="py-2 px-4">BSB</td>
                                            <td class="py-2 px-4 text-yellow-800">Science</td>
                                            <td class="py-2 px-4">Offense 1</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4">Alrhia Bautista</td>
                                            <td class="py-2 px-4">2</td>
                                            <td class="py-2 px-4">BSP</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4">Offense 2</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4">Jerome Caladiao</td>
                                            <td class="py-2 px-4">2</td>
                                            <td class="py-2 px-4">BSP</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4">Offense 1</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4">Niño Sanchez</td>
                                            <td class="py-2 px-4">2</td>
                                            <td class="py-2 px-4">BSP</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4">Offense 3</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4">Rona Castro</td>
                                            <td class="py-2 px-4">3</td>
                                            <td class="py-2 px-4">BSP</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4">Offense 3</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4">Jonald Teñio</td>
                                            <td class="py-2 px-4">4</td>
                                            <td class="py-2 px-4">BSP</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4">Offense 2</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                        <tr class="odd:bg-slate-50 even:bg-gray-300 hover:bg-amber-50 cursor-pointer hover:text-amber-600">
                                            <td class="py-2 px-4">20230005</td>
                                            <td class="py-2 px-4">Alrhia Bautista</td>
                                            <td class="py-2 px-4">3</td>
                                            <td class="py-2 px-4">BSP</td>
                                            <td class="py-2 px-4 text-purple-800">Social Sciences</td>
                                            <td class="py-2 px-4">Offense 1</td>
                                            <td class="py-2 px-4">Resolution</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <form id="violationForm">
                @csrf
            <div class="mt-4 border-t border-slate-300">
                <div class="flex flex-col bg-white rounded-lg shadow mx-2 md:mx-5 lg:mx-8 2xl:mx-16">
                    <div class="hidden lg:block text-right text-xs font-thin lg:font-light mr-32 my-2">
                        <p>Revised CRF 2022</p>
                        <p>(OSDS/STUDENT COPY)</p>
                    </div>
                    <div class="mt-10 lg:mt-0">
                        <div class="flex flex-row justify-evenly flex items-center text-center">
                            <img class="h-10 w-10 lg:h-20 lg:w-20" src="{{ asset('assets/plm-logo.png') }}"/>
                            <div class="cursor-default">
                                <p class="font-semibold text-xs lg:text-lg">PAMANTASAN NG LUNGSOD NG MAYNILA</p>
                                <p class="text-xs lg:text-sm italic">(University of the City of Manila)</p>
                                <p class="text-xs lg:text-sm font-medium">Intramuros, Manila</p>
                            </div>
                            <img class="h-10 w-10 lg:h-20 lg:w-20" src="{{ asset('assets/osdslogo.png') }}"/>
                        </div>
                        <div class="cursor-default flex flex-col items-center text-center">
                            <p style="font-family: Aston Script;" class="mt-10 text-xs md:text-sm lg:text-base">Office of Student Development and Services</p>
                            <p class="text-sm md:text-md lg:text-xl font-bold mt-4">COMPLAINT REPORT FORM</p>
                        </div>
                        <div class="w-full mt-8 bg-indigo-800 text-white">
                            <p class="ml-4 lg:ml-20 text-xs lg:text-base font-semibold cursor-default">TO BE FILLED OUT BY THE APPREHENDING PERSONNEL</p>
                        </div>
                        
                        <form class="px-6 lg:px-20">
                            <div class="grid lg:grid-cols-2 lg:space-x-16 mt-4">
                                <div class="text-xs lg:text-base tracking-widest space-y-2">
                                    <div class="flex flex-row justify-between items-center w-full">
                                        <p class="cursor-default md:hidden">Stud No:</p>
                                        <p class="cursor-default hidden md:block">Student Number:</p>
                                        <input id="student-id-input" type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50 placeholder:text-indigo-300" placeholder="0000-00000"/>
                                    </div>
                                    <div class="flex flex-row justify-between items-center w-full">
                                        <p class="cursor-default md:hidden">Stud Name:</p>
                                        <p class="cursor-default hidden md:block">Student Name:</p>
                                        <input id="studentName" type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="Juan Luna"/>
                                    </div>
                                    <div class="flex flex-row justify-between items-center w-full">
                                        <p class="cursor-default">College:</p>
                                        <input id="collegeName" type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="CISTM"/>
                                    </div>
                                </div>
                                <div class="mt-2 lg:mt-0 text-xs lg:text-base space-y-2 tracking-widest">
                                    <div class="flex flex-row justify-between items-center w-full">
                                        <p class="cursor-default">Course:</p>
                                        <input id="courseName" type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="Computer Science"/>
                                    </div>
                                    <div class="flex flex-row justify-between items-center w-full">
                                        <p class="cursor-default">Year & Block:</p>
                                        <input id="yearAndBlock" type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="1/2/3/4/5 - 1/2/3/4/5"/>
                                    </div>
                                    <div class="flex flex-row justify-between items-center w-full">
                                        <p class="cursor-default">Date and Time:</p>
                                        <input type="date" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 selection:bg-indigo-50"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="w-full bg-indigo-800 text-white">
                            <p class="mt-8 ml-4 lg:ml-20 text-xs lg:text-base font-semibold cursor-default">NATURE AND CAUSE OF THE ALLEGATION</p>
                        </div>
                        <div class="grid grid-cols-3 mx-20">
                            <div class="mr-4">
                                <p class="underline tracking-widest">A. LIGHT OFFENSES</p>
                                <div class="grid grid-cols-12 gap-1" x-data="{isOpen4:false}">
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Non-wearing of face mask</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Loitering</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Noise disturbance</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Non-wearing of ID card</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Refusal to present the ID card</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Refusal to present the Registration Form</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Wearing civilian attire w/ academic subjects</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Wearing P.E. uniform w/ academic subjects</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Long hair (Male)</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Dyed hair (All genders)</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Bullying <span class="text-xs font-thin">(R.A 10627, Anti-Bullying Act of 2013)</span></p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
                                    </label>
                                    <p class="text-sm col-span-11">Fourth(4th) and subsequent commission of the same less grave offense</p>
                                    <label class="text-lg">
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                                        <input type="checkbox" name="indigo" class="focus:outline-none hover:lg:bg-indigo-50"/>
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
                        <div class="w-full bg-indigo-800 text-white">
                            <p class="ml-4 lg:ml-20 text-xs lg:text-base font-semibold mt-8">NATURE AND CAUSE OF THE ALLEGATION</p>
                        </div>
                        <div class="container border lg:border-2 border-slate-300 p-4 pb-8 text-justify text-xs lg:text-base">
                            <p>This serves as your copy of the CRF for the allegation. <span class="font-medium">Except for the allegations on haircut/hairstyle policy, submit your WRITTEN ANSWER</span> for the alleged misconduct <span class="font-medium">and a photocopy of your latest Registration Form with your contact number</span> to the Office of Student Development and Services (OSDS) <span class="underline font-medium">within three (3) working days after the date that you were apprehended.</span> <span class="underline font-medium">Failure to submit within the prescribed period will be submitted for resolution.</span></p>
                            <p class="mt-2 text-right font-medium">By Authority of the OSDS Dean</p>

                            <div class="flex items-center">
                                <p class="font-medium lg:p-2 text-center lg:text-left">Reported by:</p>
                                <div class="flex flex-col lg:flex-row mt-8 items-end">
                                    <div class="flex flex-col">
                                        <div class="border-b border-indigo-800 w-96 flex justify-center pb-1.5">
                                            <input type="file" name="file1" id="file1" class="inputfile1 w-0 h-0 opacity-0 overflow-hidden absolute -z-10" data-multiple-caption="{count} files selected" multiple onchange="previewImage()"/> 
                                            <label for="file1" class="text-indigo-300 flex justify-center items-center hover:border hover:border-dashed h-20 w-96 hover:bg-amber-50 hover:border-amber-600 hover:text-amber-600 active:bg-amber-200 active:font-semibold cursor-pointer" title="E-signature of requestor">
                                                <img id="sign1" title="Choose a File" class="hidden max-h-20 w-80 text-center max-w-96"/>
                                                <p id="text1" class="font-thin tracking-widest">Choose a File</p>
                                            </label>
                                        </div>
                                        <p class=" text-xs font-light lg:font-medium text-center">Signature over Printed Name</p>
                                    </div>
                                    <!-- <input type="file" class="appearance-none"/> -->
                                    <div class="flex flex-row block">
                                        <div class="flex flex-col items-center lg:ml-20">
                                            <input type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none focus:border-indigo-800 text-amber-600 selection:text-indigo-800 tracking-widest placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="College/Office"/>
                                            <p class="text-xs font-light lg:font-medium text-center">College/Office</p>
                                        </div>
                                        <div class="flex flex-col items-center ml-5 lg:ml-12">
                                            <input type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none tracking-widest focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="0000-000-0000"/>
                                            <p class="text-xs font-light lg:font-medium text-center">Contact Number</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="flex flex-row mt-8">
                                <div class="form-control-amber transform scale-75 lg:scale-100 mr-4">
                                    <input type="checkbox" name="amber" class="outline-none"/>
                                </div>
                                <p class="italic">I hereby authorize the Office of the Student Development and Services (OSDS) to collect and obtain the abovementioned information in accordance with the Data Privacy Act and its Implementing Rules and Regulations (IRR) as deemed necessary in the process of resolving the allegation.</p>
                            </label>
                            <p class="text-center font-medium mt-4">This is to acknowledge receipt of my copy of the Complaint Report Form (CRF).</p>
                            <div class="flex flex-col lg:flex-row items-end mt-8">
                                <div class="flex flex-col ml-6">
                                    <div class="border-b border-indigo-800 w-96 flex justify-center pb-1.5">
                                        <input type="file" name="file2" id="file2" class="inputfile2 w-0 h-0 opacity-0 overflow-hidden absolute -z-10" data-multiple-caption="{count} files selected" multiple onchange="previewImage()"/> 
                                        <label for="file2" class="text-indigo-300 flex justify-center items-center hover:border hover:border-dashed h-20 w-96 hover:bg-amber-50 hover:border-amber-600 hover:text-amber-600 active:bg-amber-200 active:font-semibold cursor-pointer" title="E-signature of requestor">
                                            <img id="sign2" title="Choose a File" class="hidden max-h-20 w-80 text-center max-w-96"/>
                                            <p id="text2" class="font-thin tracking-widest">Choose a File</p>
                                        </label>
                                    </div>
                                    <p class="text-xs font-light text-center lg:font-medium">Signature over Printed Name of the Student</p>
                                </div>
                                <div class="flex flex-row space-x-5">
                                    <div class="flex flex-col items-center lg:ml-20">
                                        <input type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none tracking-widest focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="0000-000-0000"/>
                                        <p class="text-xs font-light lg:font-medium text-center">Contact Number</p>
                                    </div>
                                    <div class="flex flex-col items-center lg:ml-12">
                                        <input type="date" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none tracking-widest focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50"/>
                                        <p class="text-xs font-light lg:font-medium text-center">Date Signed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-indigo-800 text-white">
                            <p class="text-center text-xs lg:text-base font-semibold">THIS PORTION IS FOR OSDS USE ONLY.</p>
                        </div>
                        <div class="container border-2 border-slate-300 pt-4 pb-8 text-xs lg:text-base">
                            <div class="grid lg:grid-cols-2">
                                <div class="flex flex-col items-center lg:border-r lg:border-slate-300">
                                    <p class="font-medium text-center">PREVIOUS RECORD OF OFFENSE <span class="text-xs"><br>(Provide attachment when necessary.)</span></p>
                                    <input type="file" class="mt-8 focus:outline-none cursor-pointer bg-indigo-50 rounded-lg p-1 ring-1 ring-slate-300 hover:bg-amber-50 font-medium text-xs lg:text-sm hover:text-indigo-800"/>
                                    <div class="flex flex-row my-8">
                                        <p class="font-medium p-2 pl-6">Verified by:</p>
                                        <div class="ml-2 w-full max-w-32 lg:max-w-48 2xl:max-w-64">
                                            <input type="text" class="text-sm w-64 sm:w-72 2xl:w-96 p-2 border border-indigo-300 focus:outline-none tracking-widest focus:border-indigo-800 text-amber-600 selection:text-indigo-800 placeholder:text-indigo-300 selection:bg-indigo-50" placeholder="Juan Luna"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-8">
                                    <p class="text-center font-medium">REMARKS</p>
                                    <textarea maxlength="500" class="w-full text-center custom-scroller text-sm font-light lg:font-medium p-1 px-2 h-20 max-h-44 shadow border border-slate-300 focus:outline-none placeholder:text-xs focus:placeholder:invisible hover:bg-amber-50 focus:border-amber-600" placeholder="max of 500 characters"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-center font-semibold text-xs lg:text-base">THIS FORM MUST BE ACCOMPLISHED IN DUPLICATE COPIES <br class="md:hidden">(OSDS AND STUDENT).</p>
                </div>
                <div class="flex justify-center my-8" x-data="{isOpen3:false}">
                    <button id="fileReportButton" class="p-3 bg-white shadow border-slate-300 border-2 rounded-md hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" @click="isOpen3 = !isOpen3">
                        <p class="text-sm lg:text-lg">File Report</p>
                    </button>
                    <div x-show="isOpen3" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                        <div class="fixed top-1/3 inset-0 bottom-1/3 bg-white p-4 mx-auto max-w-sm rounded shadow-md border border-amber-600">
                            <p class="font-thin text-2xl tracking-widest border-b border-amber-300">Sent</p>
                            <p class="font-light pt-6">The complaint has been passed to the College.</p>
                            <div class="w-full flex justify-end">
                                <button class="mt-10 hover:text-indigo-800 p-2 rounded-xl border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50" onclick="location.href='uso-dashboard.html'">
                                    <p>Go Back</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </main>
        <script>
            var inputs1 = document.querySelectorAll('.inputfile1');
            var inputs2 = document.querySelectorAll('.inputfile2');
            Array.prototype.forEach.call(inputs1, function(input){
                var label1 = input.nextElementSibling,
                labelVal1 = label1.innerHTML;

                input.addEventListener('change', function(e) {
                    var fileName1 = '';

                    var reader1 = new FileReader();
                    reader1.readAsDataURL(document.getElementById("file1").files[0]);

                    reader1.onload = function(e) {

                        viewImage1.src = e.target.result;
                    };
                    viewImage1 = document.getElementById("sign1");
                    viewCount1 = document.getElementById("text1");

                    if(this.files && this.files.length > 1) {
                        fileName1 = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);

                        viewImage1.classList.remove("block");
                        viewImage1.classList.add("hidden");
                        viewCount1.classList.remove("hidden");

                        if(fileName1)
                            label1.querySelector('p').innerHTML = fileName1;
                        
                        else label1.innerHTML = labelVal1;
                    }
                    else {
                        viewImage1.classList.remove("hidden");
                        viewImage1.classList.add("block");
                        viewCount1.classList.add("hidden");
                    }
                });
            });
            Array.prototype.forEach.call(inputs2, function(input){
                var label2 = input.nextElementSibling,
                labelVal2 = label2.innerHTML;

                input.addEventListener('change', function(e) {
                    var fileName2 = '';

                    var reader2 = new FileReader();
                    reader2.readAsDataURL(document.getElementById("file2").files[0]);

                    reader2.onload = function(e) {

                        viewImage2.src = e.target.result;
                    };
                    viewImage2 = document.getElementById("sign2");
                    viewCount2 = document.getElementById("text2");

                    if(this.files && this.files.length > 1) {
                        fileName2 = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);

                        viewImage2.classList.remove("block");
                        viewImage2.classList.add("hidden");
                        viewCount2.classList.remove("hidden");

                        if(fileName2)
                            label2.querySelector('p').innerHTML = fileName2;
                        
                        else label2.innerHTML = labelVal2;
                    }
                    else {
                        viewImage2.classList.remove("hidden");
                        viewImage2.classList.add("block");
                        viewCount2.classList.add("hidden");
                    }
                });
            });
        </script>
    </body>
</html>