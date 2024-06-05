<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <!-- <meta http-equiv="refresh" content="5"> -->
        <title>OSDS Landing Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="selection:bg-amber-300 selection:text-white flex justify-center items-center max-h-screen">
        <div class="relative bg-white">
            <img class="blur" alt="PLM Background" src="https://plm.edu.ph/images/news/press-releases/Pamantasa--ng-Lungsod-ng-Maynila-facade.jpg"/>
        </div>
        <div class="absolute">
            <div class="bg-white bg-opacity-60 p-10 pt-28 pb-20">
                <img class="w-16 h-16 mx-auto" alt="PLM Logo" src="https://web2.plm.edu.ph/sfe/images/plmlogo.png">
                
                @if(Session::has('error'))
                    <p class="text-red-500 text-base mt-2 font-bold">{{ Session::get('error') }}</p>
                @endif

                <form action="{{ url('login') }}" method="  ">
                    @csrf
                    <p class="tracking-tight my-4 font-bold text-amber-600 text-4xl text-center">Pamantasan ng Lungsod ng Maynila</p>
                    <p class="my-4 font-medium text-xl text-indigo-800 text-center">The Office of Student Development and Services</p>
                    
                    <!--<div class="w-full my-4">
                        @if ($errors->has('email') || $errors->has('password'))
                            <p class="text-red-500 text-base mt-2 font-bold">INCORRECT EMAIL OR PASSWORD</p>
                        @endif
                    </div>-->
                    <input class="block w-full my-4 appearance-none rounded-md p-4 pr-12 text-indigo-800
                                  font-medium outline-none placeholder:font-light placeholder:text-xl ring-2 
                                  ring-gray-300 focus:ring-indigo-800 focus:placeholder:text-gray-300" 
                                  required type="email" placeholder="Email or ID Number" name="email" />

                    <input class="block w-full my-4 appearance-none rounded-md p-4 pr-12 text-indigo-800 
                                  font-medium outline-none placeholder:font-light placeholder:text-xl ring-2 
                                  ring-gray-300 focus:ring-indigo-800 focus:placeholder:text-gray-300" 
                                  required type="password" placeholder="Password" name="password" />

                    <input class="block w-full my-4 appearance-none bg-indigo-800 text-white rounded-md 
                                  p-4 text-xl font-bold tracking-wider 
                                  hover:bg-amber-600" type="submit" name="Login" value="Log In" />

                    <div class="border-b border-gray-100"><div class="my-4">
                        <a class="text-indigo-800 hover:text-amber-600" href="#">Forget Password?</a>
                    </div></div>       
                </form>
            </div>
        </div>
    </body>
</html>