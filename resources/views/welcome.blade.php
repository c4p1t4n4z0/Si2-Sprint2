<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenida</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900   text-gray-100 my-10">
        <div class="fixed top-0 w-full px-40 py-5 z-50 bg-gray-900 " >
            <div class="flex justify-between ">
                <h1 class="font-semibold"> NOMBRE DE LA EMPRESA </h1>
                <div class="flex space-x-6  items-center ">
                    <ion-icon class="hover:scale-110 transition cursor-pointer text-2xl " name="moon-outline"></ion-icon>
                    <ion-icon class="hover:scale-110 transition cursor-pointer text-2xl " name="sunny-outline"></ion-icon>
                    <p class="flex hover:scale-105 transition cursor-pointer ">Contactar
                        <ion-icon class="text-2xl ml-2 " name="logo-whatsapp"></ion-icon> </p>

                    <a href="{{ route('empresa.create') }}" class="flex hover:scale-105 transition cursor-pointer  px-2 py-1 rounded-lg shadow shadow-gray-50">Registrarse
                        {{-- <ion-icon class="text-2xl ml-2 " name="add-circle-outline"></ion-icon> --}}
                         </a>
                    <a href="{{ route('login') }}" class="btn-teal flex h-8 ">
                        iniciar session
                        <ion-icon class="text-2xl ml-1" name="log-in-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-20 mx-40  space-y-5 flex flex-col justify-center items-center">
            <h1 class="text-4xl font-medium text-teal-300">Informacion de la empresa</h1>
            <h4 class="font-medium"> pequenia descripcion </h4>
            <div class="w-1/2 text-gray-100 opacity-90 font-normal text-center">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio ut modi nam eum libero, quia nemo dignissimos obcaecati. Voluptatum architecto molestias repellendus ad alias eius optio quos! Quo, rerum delectus!
            </div>
            <div class=" flex space-x-10 text-4xl transition hover:scale-110">
                <ion-icon name="logo-facebook"></ion-icon>
                <ion-icon name="logo-instagram"></ion-icon>
                <ion-icon name="logo-youtube"></ion-icon>
            </div>

            <div class="mt-8">
                <img class=" h-80   rounded-lg"src="https://user-images.githubusercontent.com/36086876/171867350-31b56aef-0462-4499-8de9-735740e101b5.gif" alt="">
            </div>


        </div>

        <div class="mt-20 mx-40  space-y-5 flex flex-col justify-center items-center">
            <h1 class="text-4xl font-medium text-teal-300"> Planes</h1>

            <div class="grid grid-cols-4 gap-4 my-8 mx-4">
                @forelse ($planes as $p)
                    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8
                     dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 transition hover:scale-105">
                        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{$p->nombre  }}</h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-3xl font-semibold">$</span>
                            <span class="text-5xl font-extrabold tracking-tight">{{ $p->precio }}</span>
                            <span class="ml-2 text-xl font-normal text-gray-500 dark:text-gray-400">{{ $p->tipo_plan }}</span>
                        </div>
                        <!-- List -->
                        <ul role="list" class="space-y-5 my-7">
                            <a href="{{ route('empresa.create') }}" class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">2 team members</span>
                            </a>
                            <a href="{{ route('empresa.create') }}" class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">20GB Cloud storage</span>
                            </a>


                        </ul>
                        <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Aquirir Plan</button>
                    </div>





                @empty
                    <div class="flex-1 text-gray-600 text-2xl text-center font-semibold mt-8" role="alert">
                        <p> No hay planes registrados</p>
                @endforelse
            </div>

        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
