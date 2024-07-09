@extends('main')
@section('template')
    @auth
        <div class="decoration-sky-500/30">
            <p class="m-8 text-white text-4xl uppercase font-bold text-center text-opacity-100">Welcome, {{ auth()->user()->name }}</p>

            <form action="{{ route('logout') }}" method="POST" class="my-0">
                @csrf
                <button onclick="signup_modal.showModal();" class="hover:text-slate-400" href="#" type="submit">Log Out <i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    @else
        <div class="grid place-content-center bg-blue-200 h-full justify-center">
            <h1 class="m-8 text-white text-4xl uppercase font-bold text-center text-opacity-100">Welcome</h1>
            <div class="flex flex-row m-1 shadow-md bg-white rounded p-2">
                <div>
                    @if ($errors->any())
                    <div style="border: 1px solid gray;">
                        <h3>Errors</h3>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @include('users.auth')
                </div>

                

                <div>
                    @if ($errors->any())
                    <div style="border: 1px solid gray;">
                        <h3>Errors</h3>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
    
    
                    @include('users.create')
                </div>
            </div>
        </div>
    @endauth
@endsection
