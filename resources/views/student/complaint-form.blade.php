<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width intial-scale=1.0">
        <title>PLM Student OSDS Complaint Form</title>
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
            input::-webkit-search-cancel-button {
                -webkit-appearance: none;
                margin: 0;
            }

            :root {
                --form-control-indigo-color: rgb(85, 39, 255);
                --form-control-amber-color: #d3910d;
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
            
            input[name="indigo"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            transform: scale(0);
            transform-origin: center;
            transition: 100ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-amber-color);
            /* Windows High Contrast Mode */
            background-color: CanvasText;
            }
            
            input[type="checkbox"]:checked::before {
            transform: scale(1);
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
                    <button class="flex flex-row hover:bg-amber-50 hover:text-amber-600 lg:px-8 active:bg-amber-300 active:font-semibold p-2 rounded" onclick="location.href='{{ route('student.dashboard') }}'">
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
                <aside class="bg-indigo-800 text-white relative">


                    <button class="text-amber-600 bg-amber-300 font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.complaint-form') }}'">
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
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.gmc-status') }}'">
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
                    <div class="col-span-5">
                        <header class="bg-white flex flex-row justify-between items-end px-4 py-6">
                            <p class="text-3xl font-thin tracking-widest">Student Complaint</p>
                            <button class="p-2 rounded border border-indigo-800 hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" onclick="location.href='{{ route('student.complaint-report') }}'">
                                <p class="text-sm">Go back</p>
                            </button>
                        </header>
                        <aside class="bg-white p-4 border-b border-indigo-800">
                            <div class="flex items-end">
                                <div class="grid grid-cols-6 text-sm gap-2">
                                    <p>Student Number:</p>
                                    <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">101101101</p>
                                    <p class="col-start-1">Student Name:</p>
                                    <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">Jerome Caladiao</p>
                                    <p class="col-start-1">Date & Time Sent:</p>
                                    <p class="text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">DD/MM/YY, 00:00 XX</p>
                                </div>
                                <input placeholder="Specify offense" type="search" class="border border-indigo-400 w-1/6 p-2 h-10 placeholder:font-light placeholder:tracking-widest text-sm focus:outline-none focus:border-indigo-800 placeholder:text-indigo-300"/>
                            </div>
                        </aside>
                        <article class="bg-white p-4 border-b border-indigo-800">
                            <div class="grid grid-cols-3">
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
                        </article>
                        <footer class="bg-white p-4 border-b border-indigo-800">
                            <div>
                                <div class="text-sm space-y-4">
                                    <div class="grid grid-cols-12">
                                        <p class="col-span-3">Date and Time Happened:</p>
                                        <input placeholder="DD/MM/YYYY, 00:00 XX" class="col-span-5 w-full border border-indigo-300 focus:border-indigo-800 p-2 focus:outline-none"/>
                                    </div>
                                    <div class="grid grid-cols-12">
                                        <p class="col-span-3">Location:</p>
                                        <input placeholder="Location" class="col-span-5 w-full border border-indigo-300 focus:border-indigo-800 p-2 focus:outline-none"/>
                                    </div>
                                    <div class="grid grid-cols-12">
                                        <p class="col-span-3">Description (if necessary):</p>
                                        <textarea maxlength="500" class="border border-indigo-300 focus:border-indigo-800 p-2 min-h-20 w-full col-span-5 focus:outline-none" title="hold & drag lower-right corner of the box to adjust its size" placeholder="Be direct as possible. (max of 500 characters)"></textarea>
                                    </div>
                                </div>
                                <div x-data="{isOpen15:false}" class="flex justify-end pr-4 pb-4">
                                    <button @click="isOpen15 = !isOpen15" id="proceed" type="button" class="p-2 disabled:cursor-not-allowed disabled:text-indigo-200 disabled:bg-indigo-50 disabled:font-light disabled:shadow-indigo-50 hover:bg-amber-50 hover:text-amber-600 rounded shadow-sm shadow-indigo-600 hover:shadow-amber-600 active:bg-amber-300 font-semibold" title="Send">
                                        <p>Send</p>
                                    </button>
                                    <div x-show="isOpen15" class="fixed inset-0 z-10 bg-black bg-opacity-50 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">
                                        <div class="relative top-1/3 bg-white mx-auto max-w-sm p-4 rounded shadow-md border border-amber-600">
                                            <p class="border-b border-amber-300 font-thin text-2xl tracking-widest">Sent</p>
                                            <p class="pt-6 font-light">Your complaint is successfully sent.<br>We will look upon the complaint.</p>
                                            <div class="mt-3 flex justify-end">
                                                <button class="p-1.5 border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50 hover:text-indigo-800 active:bg-indigo-200 active:font-semibold" 
                                                    onclick="location.href='{{ route('student.complaint-report') }}'">
                                                    <p class="text-xs">Go back</p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>