<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>PLM Student OSDS GMC Request Form</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

        <style>
            @font-face {
                font-family: 'Aston Script';
                src: url("assets/aston-script.woff");
            }

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

            input[type='number']::-webkit-outer-spin-button,
            input[type='number']::-webkit-inner-spin-button,
            input[type='number']
            {
                -webkit-appearance: none;
                margin: 0;
                -moz-appearance: textfield !important;
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
                <aside class="bg-indigo-800 custom-scroller text-white h-screen relative">
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
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.gmc-status') }}'">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="hidden lg:block">GMC Certificate</p>
                        <p class="lg:hidden text-xs">GMC</p>
                    </button>

                    
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
                <div class="relative bg-white pb-10 col-span-5 space-y-6 lg:space-y-10">
                    <div class="absolute top-2 right-2">
                        <button class="p-2 border border-indigo-800 hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600" onclick="location.href='{{ route('student.gmc-status') }}'">
                            <p>Go Back</p>
                        </button>
                    </div>

                    <div class="flex items-center justify-center space-x-4 lg:space-x-20">
                        <img class="w-10 h-10 lg:w-20 lg:h-20 selection:bg-transparent" src="{{ asset('assets/plm-logo.png') }}"/>
                        <div class="text-center text-xs lg:text-sm">
                            <p class="font-medium">Republic of the Philippines</p>
                            <p class="text-xs lg:text-base font-semibold">PAMANTASAN NG LUNGSOD NG MAYNILA</p>
                            <p class="font-normal">(University of the City of Manila)</p>
                            <p class="font-light">Intramuros, Manila</p>
                        </div>
                        <img class="w-10 h-10 lg:w-20 lg:h-20 selection:bg-transparent" src="{{ asset('assets/osdslogo.png') }}"/>
                    </div>
                    
                    <p style="font-family:Aston Script" class="text-xs lg:text-xl font-bold text-center">Office of Student Development and Services</p>
                    <div class="text-center text-xs lg:text-base">
                        <p>Certificate of Good Moral Character (GMC)</p>
                        <p class="font-medium">REQUEST FORM</p>
                    </div>
                    @foreach ($students as $student)
                    <form method="POST" action="{{ route('gmrcrequest.store') }}" class="mx-4 lg:ml-20 text-xs lg:text-sm grid grid-cols-2">
                        @csrf
                        <div class="flex flex-row items-center">
                            <p class="font-medium">Date of Request</p>
                            <span class="mx-6">:</span>
                            <div class="lg:mx-4">
                                <div class="relative lg:space-x-8 py-4">
                                    <input type="date" class="lg:w-64 tracking-widest p-2 border border-indigo-300 px-2 focus:outline-none"/>
                                    <p class="absolute right-0 bottom-0 text-xs font-thin text-indigo-500">Appoint your date</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center">
                            
                        </div>
                        <div class="flex flex-row items-center">
                            <p class="font-medium mr-6 lg:mr-12">Student Number</p>
                            <div class="flex justify-evenly items-center ml-1.5 lg:ml-1 px-1 lg:space-x-8">
                                <span class="mx-2">:</span>
                                <p class="font-thin tracking-widest lg:w-64">{{ $student->student_number }}</p>
                            </div>
                        </div>
                        <div class="flex flex-row items-center">
                            <p class="font-medium mr-10 lg:mr-14">Student Name</p>
                            <div class="flex justify-evenly items-center ml-1.5 lg:ml-1 px-1 lg:space-x-8">
                                <span class="mx-2 ml-3.5">:</span>
                                <p class="font-thin tracking-widest lg:w-64">{{ $student->first_name }} {{ $student->last_name }}</p>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="mx-4 lg:ml-20 space-y-2 text-xs lg:text-sm">
                            <div class="flex flex-row items-center">
                                <p class="font-medium mr-28 lg:mr-80">Gender</p>
                                <div class="flex justify-evenly ml-1.5 lg:ml-12 lg:space-x-8">
                                    <span class="mx-2">:</span>
                                    <p class="font-thin tracking-widest">{{ $student->gender }}</p>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="font-medium mr-28 lg:mr-80">Status</p>
                                <div class="flex justify-evenly ml-3 lg:ml-14 lg:space-x-8">
                                    <span class="mx-2">:</span>
                                    <p class="font-thin tracking-widest">{{ $student->status }}</p>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="font-medium mr-16 lg:mr-72">Degree Program</p>
                                <div class="flex justify-evenly ml-0.5 lg:ml-4 lg:space-x-8">
                                    <span class="mx-2 lg:ml-2.5">:</span>
                                    <p class="font-thin tracking-widest truncate">{{ $student->course_id }}</p>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="font-medium lg:mr-56">College (please type in full)</p>
                                <div class="flex justify-evenly lg:ml-2 lg:space-x-8">
                                    <span class="mx-2">:</span>
                                    <p class="font-thin tracking-widest truncate">{{ $student->college_id }}</p>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="lg:hidden font-medium mr-16">Contact Number</p>
                                <p class="hidden lg:block font-medium mr-24">Contact Number/Landline/Cell Phone Number</p>
                                <div class="flex justify-evenly items-center lg:ml-2.5 lg:space-x-8">
                                    <span class="mx-2">:</span>
                                    <input type="number" class="lg:w-96 tracking-widest p-2 border border-indigo-300 px-2 focus:outline-none"/>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="mx-4 lg:ml-20">
                        <div class="flex flex-row items-center text-xs lg:text-sm">
                            <p class="lg:hidden font-medium mr-28">Purpose</p>
                            <p class="hidden lg:block font-medium mr-32">Purpose for Securing a Certificate of GMC</p>
                            <div class="flex justify-evenly items-center lg:ml-2 lg:space-x-8">
                                <span class="mx-2">:</span>
                                <textarea maxlength="500" class="lg:w-96 border border-indigo-300 focus:border-indigo-800 p-2 min-h-20 col-span-5 focus:outline-none" title="hold & drag lower-right corner of the box to adjust its size" placeholder="Be direct as possible. (max of 500 characters)"></textarea>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="flex flex-row lg:items-center text-xs lg:text-base mx-4 space-x-2 lg:mx-20 lg:space-x-4">
                            <label class="form-control-amber hover:lg:bg-amber-50 transform scale-50 lg:scale-100">
                                <input type="checkbox" name="amber" class="outline-none"/>
                            </label>
                            <p class="text-justify italic">I hereby authorize the Office of the Student Development and Service (OSDS) to collect and obtain information, personal and academic records, in accordan with the Data Privacy Act and its Implementing Rules and Regulation as requirement for the processing of the certificate of Good Moral Charater (GMC).</p>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <div class="flex flex-col items-center lg:mr-20">
                                <div class="border-b border-indigo-800 w-96 flex justify-center pb-1.5">
                                    <input type="file" name="file" id="file" class="w-0 h-0 opacity-0 overflow-hidden absolute -z-10"/>
                                    <label for="file" class="text-indigo-300 border border-dashed p-6 px-20 border-indigo-400 p-2 hover:bg-amber-50 hover:border-amber-600 hover:text-amber-600 active:bg-amber-200 active:font-semibold cursor-pointer" title="E-signature of requestor">
                                        <p class="font-thin tracking-widest">Choose a File</p>
                                    </label>
                                </div>
                                <p class="lg:hidden text-xs font-light">Signature of Requestor</p>
                                <p class="hidden lg:block text-sm font-light">Signature of Requestor/ Authorized Representative</p>
                            </div>    
                        </div>
                    </form>
                    <div class="text-xs font-light mx-2 lg:mx-20 text-justify">
                        <p>Note:</p>
                        <p>1. Claimant must present two(2) valid Identification Cards (IDs) while authorized representatives must bring with them of authorization aside from the two(2) valid IDs for purposes of filing and securing the GMC Certificate.</p>
                        <div class="flex flex-row items-end">
                            <p>2. The copy of GMC Certificate shall be released tentatively on</p>
                            <p class="ml-2 font-thin tracking-widest text-amber-600 border-b border-indigo-800 px-4">DD/MM/YYYY</p>
                        </div>
                    </div>
                    <div class="mx-2 lg:mx-20 flex justify-end" x-data="{isOpen1:false}">
                        <button type="submit" class="p-2 disabled:cursor-not-allowed disabled:text-indigo-200 disabled:bg-indigo-50 disabled:font-light disabled:shadow-indigo-50 hover:bg-amber-50 hover:text-amber-600 rounded shadow-sm shadow-indigo-600 hover:shadow-amber-600 active:bg-amber-300 font-light lg:font-semibold">
                            <p>Confirm</p>
                        </button>
                        <div x-show="isOpen1" class="fixed inset-0 z-10 text-amber-600 selection:bg-indigo-50 bg-black bg-opacity-50 selection:text-indigo-800">
                            <div class="fixed top-1/3 inset-0 bottom-1/3 bg-white p-4 mx-auto max-w-sm rounded shadow-md border border-amber-600">
                                <p class="font-thin text-2xl tracking-widest border-b border-amber-300">Sent</p>
                                <p class="font-light pt-6">Your GMC Request successfully sent.<br>Kindly wait for the next process.</p>
                                <div class="w-full flex justify-end">
                                    <button class="hover:text-indigo-800 p-2 rounded-xl border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50" onclick="location.href='{{ route('student.gmc-status') }}'">
                                        <p>Go Back</p>
                                    </button>
                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>
    </body>
</html>