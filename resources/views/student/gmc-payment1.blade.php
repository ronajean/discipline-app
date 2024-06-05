<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>PLM Student OSDS GMC Payment</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
        
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

            input[id=password]::-ms-reveal,
            input[id=password]::-ms-clear
            {
                display: none;
            }

            @keyframes fade-in {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 100%;
                }
            }
            @keyframes fade-out {
                from {
                    opacity: 100%;
                }
                to {
                    opacity: 0;
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
                    <img class="lg:hidden block h-8 w-8 selection:bg-transparent" src="{{ asset('assets/plm-logo.png') }}"/>
                </div>
                <div class="flex flex-row items-center space-x-2 col-span-7 lg:col-span-5 pr-4 lg:px-0 text-center lg:space-x-2 space-x-6">
                    <!-- OSDS -->
                    <img class="hidden lg:block h-12 w-12 selection:bg-transparent" src="{{ asset('assets/osdslogo.png') }}"/>
                    <h1 class="text-sm lg:text-xl font-light">The Office of Student Development and Services</h1>
                    <img class="lg:hidden h-8 w-8 selection:bg-transparent" src="{{ asset('assets/osdslogo.png') }}"/>
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
                <aside style="animation-name:slide-in; animation-duration:0.5s;" class="bg-indigo-800 custom-scroller text-white h-screen relative">
                    <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" onclick="location.href='{{ route('student.dashboard') }}'">
                        <svg class="h-6 w-6" viewBox="0 0 64 64" fill="currentColor">
                            <path fill-rule="evenodd" d="m56,34h-7v20h-12v-16h-10v16h-12v-20h-7v-4L32,6l9,9v-7h8v15l7,7v4Z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs lg:text-base">Home</p>
                    </button>
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
                    <div x-data="{gmcOptions:false}">
                        <button class="hover:bg-amber-50 hover:text-amber-600 active:bg-amber-300 active:font-semibold flex flex-row items-center justify-center w-full p-4 mt-6 space-x-2" @click="gmcOptions = !gmcOptions">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="hidden lg:block">GMC Certificate</p>
                            <p class="lg:hidden text-xs">GMC</p>
                        </button>
                        <div x-show="gmcOptions" class="fixed inset-0 z-10 bg-black bg-opacity-50 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800"  @click="gmcOptions = false">
                            <div class="relative top-1/4 mx-auto flex flex-row justify-evenly">
                                <button type="button" onclick="location.href='{{ route('student.gmc-request') }}'" class="bg-white p-20 rounded shadow-md border border-amber-600 hover:bg-amber-50 hover:text-indigo-600 active:text-indigo-800 active:bg-amber-200 active:border-indigo-800 active:font-normal text-2xl font-light space-y-4 items-center flex flex-col">
                                    <p>Request for GMC Certificate</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="w-20 h-20" id="_x32_" viewBox="0 0 512 512" xml:space="preserve" webcrx="">
                                        <g>
                                            <rect x="114.087" y="148.892" fill="currentColor" width="157.906" height="26.318"/>
                                            <rect x="114.087" y="245.39" fill="currentColor" width="157.906" height="26.318"/>
                                            <rect x="114.087" y="341.888" fill="currentColor" width="96.498" height="26.318"/>
                                            <path fill="currentColor" d="M454.95,86.619c-78.157,10.768-159.83,199.833-196.664,267.692c-9.252,17.049,12.264,31.278,21.786,14.958   c6.862-11.728,44.291-85.601,44.291-85.601c40.77,1.345,55.806-27.123,39.511-44.805c54.794,1.131,81.952-29.025,66.412-47.324   c16.345,5.175,30.498,1.713,51.521-9.749C526.664,157.321,524.573,75.421,454.95,86.619z"/>
                                            <path fill="currentColor" d="M350.998,307.03V443.15c0,4.034-3.29,7.316-7.316,7.324H42.407c-4.027-0.008-7.308-3.29-7.316-7.324v-374.3   c0.009-4.036,3.29-7.316,7.316-7.325h301.275c4.027,0.009,7.316,3.29,7.316,7.325v67.961c11.48-15.463,23.147-29.144,35.09-40.504   V68.851c-0.018-23.431-18.967-42.398-42.407-42.416H42.407C18.976,26.453,0.009,45.42,0,68.851v374.3   c0.009,23.431,18.976,42.398,42.407,42.414h301.275c23.44-0.016,42.389-18.984,42.407-42.414V284.704   C377.967,295.404,365.87,303.114,350.998,307.03z"/>
                                        </g>
                                    </svg>
                                </button>
                                <button type="button" onclick="location.href='{{ route('student.gmc-status') }}'" class="bg-white p-20 rounded shadow-md border border-amber-600 hover:bg-amber-50 hover:text-indigo-600 active:text-indigo-800 active:bg-amber-200 active:border-indigo-800 active:font-normal text-2xl font-light space-y-4 items-center flex flex-col">
                                    <p>View GMC Status</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20" viewBox="0 0 24 24" fill="none" webcrx="">
                                        <circle cx="17" cy="8" r="4" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 8C15 6.89543 15.8954 6 17 6C18.1046 6 19 6.89543 19 8H15ZM11 8C11 7.29873 11.1203 6.62556 11.3414 6H5C4.44772 6 4 6.44772 4 7C4 7.55228 4.44772 8 5 8H11ZM11.8027 11C12.2671 11.8028 12.9121 12.488 13.6822 13H5C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11H11.8027ZM5 16C4.44772 16 4 16.4477 4 17C4 17.5523 4.44772 18 5 18H19C19.5523 18 20 17.5523 20 17C20 16.4477 19.5523 16 19 16H5Z" fill="currentColor"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
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
                <div class="col-span-5">
                    <header class="bg-white border-b border-indigo-800 px-4 pt-6 pb-1.5 flex flex-row justify-between items-center">
                        <p class="text-3xl tracking-widest font-thin">Payment Method</p>
                        <button class="rounded-xl border border-indigo-800 hover:text-amber-600 hover:bg-amber-50 hover:border-amber-600 p-2" onclick="location.href='{{ route('student.gmc-status') }}'">
                            <p class="text-sm">Go Back</p>
                        </button>
                    </header>
                    <script>
                        function previewImage() {
                            var file = document.getElementById("file").files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var img = document.getElementById("preview");
                                    img.src = e.target.result;
                                    img.style.display = "block"; // Make the image visible
                                };
                                reader.readAsDataURL(file);
                            }
                        }

                    </script>
                    <article class="bg-white px-4 pt-6 h-screen">
                        <div class="grid grid-cols-6">
                            
                            <form action="{{ route('gmc-payment-gcash.process') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="hidden" name="student_no" value="{{ $gmc_request->transaction_no }}">
                                <input type="hidden" name="request_status" value="Payment Successful">
                                
                                <div class="flex flex-col space-y-3">
                                    <p class="text-xs font-thin tracking-widest">Step 1</p>                                    
                                    
                                    <label>
                                        <input type="radio" class="peer hidden" name="payment_method" value="G-Cash"/>
                                        <dt class="flex flex-row p-2 border border-indigo-800 items-center hover:bg-amber-50 hover:text-amber-600 hover:border-amber-600 space-x-2 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:bg-amber-200 peer-checked:font-semibold cursor-pointer" onclick="enterPasswordTab()">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 192" fill="none" class="h-8 w-8"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M84 96h36c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36c9.941 0 18.941 4.03 25.456 10.544"/>
                                                <path fill="currentColor" d="M145.315 66.564a6 6 0 0 0-10.815 5.2l10.815-5.2ZM134.5 120.235a6 6 0 0 0 10.815 5.201l-10.815-5.201Zm-16.26-68.552a6 6 0 1 0 7.344-9.49l-7.344 9.49Zm7.344 98.124a6 6 0 0 0-7.344-9.49l7.344 9.49ZM84 152c-30.928 0-56-25.072-56-56H16c0 37.555 30.445 68 68 68v-12ZM28 96c0-30.928 25.072-56 56-56V28c-37.555 0-68 30.445-68 68h12Zm106.5-24.235C138.023 79.09 140 87.306 140 96h12c0-10.532-2.399-20.522-6.685-29.436l-10.815 5.2ZM140 96c0 8.694-1.977 16.909-5.5 24.235l10.815 5.201C149.601 116.522 152 106.532 152 96h-12ZM84 40c12.903 0 24.772 4.357 34.24 11.683l7.344-9.49A67.733 67.733 0 0 0 84 28v12Zm34.24 100.317C108.772 147.643 96.903 152 84 152v12a67.733 67.733 0 0 0 41.584-14.193l-7.344-9.49Z"/>
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M161.549 58.776C166.965 70.04 170 82.666 170 96c0 13.334-3.035 25.96-8.451 37.223"/>
                                            </svg>
                                            <p class="text-sm">G-Cash</p>
                                        </dt>
                                    </label>

                                    <!-- Non-Card Payment -->
                                    <div id="password-tab" style="animation-duration: 0.5s; animation-name:fade-in" class="hidden col-span-2 border-l border-indigo-200 pl-6 ml-10">
                                        <div class="flex justify-between">
                                            <p class="text-xs font-thin tracking-widest">Step 2</p>
                                            <p class="text-xs font-thin tracking-widest">Pay via QR</p>
                                        </div>
                                        <div class="mt-6 text-2xl font-thin tracking-widest text-right">
                                            <p id="feeDisplay">₱140.00</p>
                                            <p class="text-xs">GMC Certificate</p>
                                        </div>
                                        <img src="{{ asset('assets/gcash-qr.jpg') }}" alt="Gcash QR Code" style="margin-bottom: 20px; width: 50%; height: auto;" >
        
                                        
        
                                        <div class="relative flex w-full">
                                            <div class="flex justify-center lg:justify-end">
                                                <div class="flex flex-col items-center lg:mr-20">
                                                    <div class="border-b border-indigo-800 w-96 flex justify-center pb-1.5">
                                                        <input type="file" name="gcash_receipt" id="file" class="w-0 h-0 opacity-0 overflow-hidden absolute -z-10" onchange="previewImage()"/>
                                                        <label for="file" class="text-indigo-300 border border-dashed p-6 px-20 border-indigo-400 p-2 hover:bg-amber-50 hover:border-amber-600 hover:text-amber-600 active:bg-amber-200 active:font-semibold cursor-pointer" title="E-signature of requestor">
                                                            <p class="font-thin tracking-widest">Choose a File</p>
                                                            <img id="preview" style="display:none;" width="200" />
                                                        </label>
                                                    </div>
                                                    
                                                    <p class="hidden lg:block text-sm font-light">Upload GCash Receipt</p>
                                                    <input type="button" class="border border-indigo-800 mt-3 p-2 rounded text-sm cursor-pointer hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" value="Confirm" onclick="enterPinTab()"/>
                                                </div>                                            
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <!-- Step 3 -->
                                    <div id="enter-pin-tab" style="animation-name:fade-in; animation-duration:0.5s;" class="hidden col-span-2 border-l border-indigo-200 pl-6 ml-10">
                                        <div class="flex justify-between text-xs font-thin tracking-widest">
                                            <p>Step 3</p>
                                            <p>Enter Reference Number</p>
                                        </div>
                                        <div class="flex flex-col mt-6">
                                            <input type="text" placeholder="Enter Reference Number" name="reference_no" class="h-16 px-4 focus:outline-none border border-indigo-300 rounded placeholder:text-indigo-400 placeholder:font-light placeholder:text-sm tracking-widest focus:border-indigo-600 text-amber-600 selection:bg-indigo-50 selection:text-indigo-600 mt-6"/>
                                            <div x-data="{purchased:false}">
                                                <button type="submit" onclick="showThankYouMessage();" class="border border-indigo-800 mt-3 p-2 rounded text-sm cursor-pointer hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" @click="purchased = !purchased">
                                                    <p>Confirm</p>
                                                </button>
                                                
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                            </form>
    
                            <form action="{{ route('gmc-payment-card.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="transaction_no" value="{{ $gmc_request->transaction_no }}">
                                <input type="hidden" name="request_status" value="Payment Successful">
                                    <label>
                                        <input type="radio" class="peer hidden" name="payment_method" value="Card"/>
                                        <dt class="flex flex-row p-2 border border-indigo-800 items-center hover:bg-amber-50 hover:text-amber-600 hover:border-amber-600 space-x-2 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:bg-amber-200 peer-checked:font-semibold cursor-pointer" onclick="enterCardTab()">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 512 512" xml:space="preserve" class="w-8 h-8">
                                                <path opacity="0.1" style="fill:currentColor;" d="M465.735,416.386H46.265c-20.357,0-37.012-16.655-37.012-37.012V132.627  c0-20.357,16.655-37.012,37.012-37.012h419.47c20.357,0,37.012,16.655,37.012,37.012v246.747  C502.747,399.73,486.092,416.386,465.735,416.386z"/>
                                                <path opacity="0.2" style="fill:currentColor;" d="M465.735,95.614h-61.687c20.357,0,37.012,16.655,37.012,37.012v246.747  c0,20.357-16.655,37.012-37.012,37.012h61.687c20.357,0,37.012-16.655,37.012-37.012V132.627  C502.747,112.27,486.092,95.614,465.735,95.614z"/>
                                                <rect x="9.253" y="169.639" opacity="0.7" style="fill:currentColor;" width="493.494" height="74.024"/>
                                                <rect x="441.06" y="169.639" opacity="0.8" style="fill:currentColor;" width="61.687" height="74.024"/>
                                                <g>
                                                    <path opacity="0.5" style="fill:currentColor;" d="M431.807,314.602H234.41c-5.11,0-9.253-4.142-9.253-9.253c0-5.111,4.143-9.253,9.253-9.253h197.398   c5.111,0,9.253,4.142,9.253,9.253C441.06,310.461,436.919,314.602,431.807,314.602z"/>
                                                    <path opacity="0.5" style="fill:currentColor;" d="M407.133,351.614H234.41c-5.11,0-9.253-4.142-9.253-9.253s4.143-9.253,9.253-9.253h172.723   c5.111,0,9.253,4.142,9.253,9.253S412.244,351.614,407.133,351.614z"/>
                                                </g>
                                                    <path style="fill:currentColor;" d="M502.747,160.381c-0.032,0-0.063,0.005-0.095,0.005H120.289c-5.11,0-9.253,4.142-9.253,9.253  c0,5.111,4.143,9.253,9.253,9.253h373.205v55.518H18.506v-55.518h64.771c5.11,0,9.253-4.142,9.253-9.253  c0-5.111-4.143-9.253-9.253-9.253H18.506v-27.759c0-15.306,12.452-27.759,27.759-27.759h419.47  c15.306,0,27.759,12.453,27.759,27.759c0,5.111,4.142,9.253,9.253,9.253c5.111,0,9.253-4.142,9.253-9.253  c0-25.511-20.754-46.265-46.265-46.265H46.265C20.754,86.361,0,107.115,0,132.627v246.747c0,25.511,20.754,46.265,46.265,46.265  h419.47c25.511,0,46.265-20.754,46.265-46.265V169.639v-0.005C512,164.523,507.858,160.381,502.747,160.381z M465.735,407.133  H46.265c-15.307,0-27.759-12.453-27.759-27.759V252.916h474.988v126.458C493.494,394.679,481.041,407.133,465.735,407.133z"/>
                                                </svg>
                                            <p class="text-xs">Credit /<br>Debit Card</p>
                                        </dt>
                                    </label>

                                    <!-- Credit/Debit Card Payment -->
                                    <div id="card-tab" style="animation-name:fade-in; animation-duration: 0.5s;" class="hidden col-span-2 border-l border-indigo-200 pl-6 ml-10">
                                        <div class="flex justify-between text-xs font-thin tracking-widest">
                                            <p>Step 2</p>
                                            <p>Credit/Debit Card</p>
                                        </div>
                                        <div class="flex flex-col">
                                            <input type="text" placeholder="Card number" name="card_no" class="h-16 px-4 focus:outline-none border border-indigo-300 rounded placeholder:text-indigo-400 placeholder:font-light placeholder:text-sm tracking-widest focus:border-indigo-600 text-amber-600 selection:bg-indigo-50 selection:text-indigo-600 mt-6"/>
                                            <div class="flex flex-row items-center space-x-2 justify-end">
                                                <img src="{{ asset('assets/visa-logo.png') }}" class="w-auto h-2"/>
                                                <img src="{{ asset('assets/mastercard-logo.png') }}" class="w-auto h-4"/>
                                                <img src="{{ asset('assets/unionpay-logo.png') }}" class="w-auto h-4"/>
                                                <img src="{{ asset('assets/americanexpress.png') }}" class="w-auto h-6"/>
                                            </div>
                                            <input type="text" placeholder="Expiration date" name="card_expiry" class="h-16 px-4 focus:outline-none border border-indigo-300 rounded placeholder:text-indigo-400 placeholder:font-light placeholder:text-sm tracking-widest focus:border-indigo-600 text-amber-600 selection:bg-indigo-50 selection:text-indigo-600 mt-6"/>
                                            <p class="text-right text-indigo-600 text-xs font-thin">MM/YY</p>
                                            <input type="text" placeholder="Security code" name="card_cvv" class="h-16 px-4 focus:outline-none border border-indigo-300 rounded placeholder:text-indigo-400 placeholder:font-light placeholder:text-sm tracking-widest focus:border-indigo-600 text-amber-600 selection:bg-indigo-50 selection:text-indigo-600 mt-6"/>
                                            <input type="button" class="border border-indigo-800 mt-3 p-2 rounded text-sm cursor-pointer hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" value="Confirm" onclick="enterPinTab2()"/>
                                        </div>
                                    </div>

                                    <div id="enter-pin-tab2" style="animation-name:fade-in; animation-duration:0.5s;" class="hidden col-span-2 border-l border-indigo-200 pl-6 ml-10">
                                        <div class="flex justify-between text-xs font-thin tracking-widest">
                                            <p>Step 3</p>
                                            <p>Enter Reference Number</p>
                                        </div>
                                        <div class="flex flex-col mt-6">
                                            <input type="text" placeholder="Enter Reference Number" name="reference_no" class="h-16 px-4 focus:outline-none border border-indigo-300 rounded placeholder:text-indigo-400 placeholder:font-light placeholder:text-sm tracking-widest focus:border-indigo-600 text-amber-600 selection:bg-indigo-50 selection:text-indigo-600 mt-6"/>
                                            <div x-data="{purchased:false}">
                                                <button type="submit"  onclick="showThankYouMessage();" class="border border-indigo-800 mt-3 p-2 rounded text-sm cursor-pointer hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" @click="purchased = !purchased">
                                                    <p>Confirm</p>
                                                </button>
                                                
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                            </form>

                            
    
                            <form action="{{ route('gmc-payment-onsite.process') }}" method="POST">
                                @csrf
                                
                                <input type="hidden" name="transaction_no" value="{{ $gmc_request->transaction_no }}">  
                                <input type="hidden" name="request_status" value="Payment Successful">                                                            
                                
                                    <label class="pt-10">
                                        <input type="radio" class="peer hidden" name="payment_method" value="On-site"/>
                                        <dt class="flex flex-row p-2 border border-indigo-800 items-center hover:bg-amber-50 hover:text-amber-600 hover:border-amber-600 space-x-2 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:bg-amber-200 peer-checked:font-semibold cursor-pointer" onclick="enterORTab()">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 48 48" id="a">
                                                <defs>
                                                    <style>.b{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;}</style>
                                                </defs>
                                                <g>
                                                    <path class="b" d="m14.2722,5.5246h-1.98c-.9469,0-1.7217.8527-1.7217,1.8949v33.1611c0,1.0422.7748,1.8949,1.7217,1.8949h1.98"/>
                                                    <path class="b" d="m14.2722,5.5246v36.9509h21.4354c.9469,0,1.7217-.8527,1.7217-1.8949V7.4195c0-1.0422-.7748-1.8949-1.7217-1.8949H14.2722Z"/>
                                                </g>
                                                <g>
                                                    <path class="b" d="m26.5487,5.8464v7.2056l3.6902-2.1302,3.7233,2.1492v-7.4582"/>
                                                    <path class="b" d="m20.1848,28.2985h12.8259v-2.9163h-12.8259c.0002.9721,0,1.9442,0,2.9163Z"/>
                                                    <path class="b" d="m20.1848,34.1672h9.5194v-2.8357h-9.5194c.0002.9721,0,1.8636,0,2.8357Z"/>
                                                </g>
                                            </svg>
                                            <p class="text-sm text-left">Paying<br>On-site</p>
                                        </dt>
                                    </label>
                                    <div id="enter-OR-tab" style="animation-name:fade-in; animation-duration:0.5s;" class="hidden col-span-2 border-l border-indigo-200 pl-6 ml-10">
                                        <div class="flex justify-between text-xs font-thin tracking-widest">
                                            <p>Step 3</p>
                                            <p>Enter Official Receipt Number</p>
                                        </div>
                                        <div class="flex flex-col mt-6">
                                            <input type="text" placeholder="Enter Official Receipt Number" name="official_receipt_no" class="h-16 px-4 focus:outline-none border border-indigo-300 rounded placeholder:text-indigo-400 placeholder:font-light placeholder:text-sm tracking-widest focus:border-indigo-600 text-amber-600 selection:bg-indigo-50 selection:text-indigo-600 mt-6"/>
                                            <div x-data="{purchased:false}">
                                                <button type="submit" onclick="showThankYouMessage();" id="proceed" class="border border-indigo-800 mt-3 p-2 rounded text-sm cursor-pointer hover:border-amber-600 hover:bg-amber-50 hover:text-amber-600 active:bg-amber-200 active:font-semibold" @click="purchased = !purchased">
                                                    <p>Confirm</p>
                                                </button>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>

                            </form>
                                    
                                </div>

                                <div x-show="purchased" id="thankYouMessage" style="display: none"  class="fixed inset-0 z-10 bg-black bg-opacity-50 text-amber-600 selection:bg-indigo-50 selection:text-indigo-800">
                                    
                                                                                                 

                                    <div class="relative top-20 bg-white mx-auto max-w-xl p-4 rounded shadow-md border border-amber-600">
                                        <p class="font-thin text-2xl tracking-widest border-b border-amber-300">Thank you!</p>
                                        <div class="space-y-8">
                                            <p class="font-light pt-6">
                                                <span class="font-normal">Your GMC Request has been successfully submitted.</span><br>
                                                <span class="text-sm">Kindly allow 10-15 business days for the processing of your document.</span><br>
                                                <span class="underline text-right font-thin hover:text-indigo-800">
                                                    <a href="{{ route('student.gmc-status') }}">You can view the status of your request under GMC Certificate > View GMC Request Status</a>
                                                </span>
                                            </p>
                                            <p class="text-sm text-right">For inquires, please send email at<br>
                                                OSDS@plm.edu.ph<br>
                                                For follow-up, please text #09976017966
                                            </p>
                                            <p class="text-xs font-thin">Note: Claimant must present two(2) valid Identification Cards (IDs) while authorized representatives must bring with them of authorization aside from the two(2) valid IDs for purposes of filing and securing the GMC Certificate.</p>
                                        </div>
                                        <div class="w-full flex justify-end mt-6">
                                            <button type="button" onclick="hideThankYouMessage();" class="hover:text-indigo-800 p-2 text-sm font-light border border-amber-600 hover:border-indigo-800 hover:bg-indigo-50" onclick="location.href='{{ route('student.gmc-status') }}'">
                                                <p>Confirm</p>
                                            </button>
                                        </div>

                                        
                                    </div>
                            
                                    
                                </div>
                                <script>
                                    function hideThankYouMessage() {
                                        document.getElementById('thankYouMessage').style.display = 'none';
                                    }
                                    function showThankYouMessage() {
                                        document.getElementById('thankYouMessage').style.display = 'block';
                                    }
                                </script>
                                
                                
                                
                                <!-- Step 3 -->
                                
    
                                

                            
                            
                        </div>
                        
                        <script>
                            function enterPasswordTab() {
                                element = document.getElementById("password-tab");

                                if (element.classList.contains("block")) {
                                    element.classList.remove("block");
                                    element.classList.add("hidden");
                                } else {
                                    element.classList.remove("hidden");
                                    element.classList.add("block");
                                }
                            };
                            function enterCardTab() {
                                element = document.getElementById("card-tab");

                                if (element.classList.contains("block")) {
                                    element.classList.remove("block");
                                    element.classList.add("hidden");
                                } else {
                                    element.classList.remove("hidden");
                                    element.classList.add("block");
                                }
                            };
                            function enterPinTab() {
                                element = document.getElementById("enter-pin-tab");

                                if (element.classList.contains("block")) {
                                    element.classList.remove("block");
                                    element.classList.add("hidden");
                                } else {
                                    element.classList.remove("hidden");
                                    element.classList.add("block");
                                }
                            };
                            function enterPinTab2() {
                                element = document.getElementById("enter-pin-tab2");

                                if (element.classList.contains("block")) {
                                    element.classList.remove("block");
                                    element.classList.add("hidden");
                                } else {
                                    element.classList.remove("hidden");
                                    element.classList.add("block");
                                }
                            };
                            function enterORTab() {
                                element = document.getElementById("enter-OR-tab");

                                if (element.classList.contains("block")) {
                                    element.classList.remove("block");
                                    element.classList.add("hidden");
                                } else {
                                    element.classList.remove("hidden");
                                    element.classList.add("block");
                                }
                            };
                            function enterContactTab() {
                                element = document.getElementById("enter-contact-tab");
    
                                if (element.classList.contains("block")) {
                                    element.classList.remove("block");
                                    element.classList.add("hidden");
                                } else {
                                    element.classList.remove("hidden");
                                    element.classList.add("block");
                                }
                            };
                        </script>
                    </article>
                </div>
            </article>
        </main>
    </body>
</html>