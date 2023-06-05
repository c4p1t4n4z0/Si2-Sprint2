
@extends('VistasTenancyInquilinos.navbar')
@section('Contenido')

        <div class="flex flex-col justify-center items-center m-24">
            <h1 class="text-xl"> Este es el Dasboard, </h1>
            <p> bienenvio ....</p>
            @php
                $user = auth()->user()->name;
            @endphp
            <h1 class="text-2xl font-bold ">{{ $user }}</h1>
        </div>
@endsection
