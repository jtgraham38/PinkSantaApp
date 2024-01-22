@vite('resources/css/app.css')
@vite('resources/css/fonts.css')
@auth
<div>
    <p>Welcome, {{ auth()->user()->name }}</p>

    <form action="{{ route('logout') }}" method="POST" class="my-0">
        @csrf
        <button onclick="signup_modal.showModal();" class="hover:text-slate-400" href="#" type="submit">Log Out <i class="fa-solid fa-right-from-bracket"></i></button>
    </form>
</div>
@else
<div>
    <fieldset style="float: left;">
        <legend>Login</legend>

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
    </fieldset>
    <fieldset style="float: right;">
        <legend>Sign Up</legend>

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


        @include('users.create')
    </fieldset>
</div>
@endauth