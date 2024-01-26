<form action="{{ route('users.store')}}" method="POST" prompt="Sign Up">
    <h3>Sign Up</h3>
    <hr>
    @csrf
    <div class="flex flex-col">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Name" class="p-1" maxlength="255" required>
    </div>
    <div class="flex flex-col">
        <label for="name">Email:</label>
        <input type="email" name="email" placeholder="Email" class="p-1" maxlength="255" required>
    </div>
    <div class="flex flex-col">
        <label for="name">Password:</label>
        <input type="password" name="password" placeholder="Password" class="p-1" minlength="6" required>
    </div>
    <div class="flex flex-col">
        <label for="name">Confirm Password:</label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="p-1" minlength="6" required>
    </div>

    <br>

    <button class="hover:text-slate-400"  type="submit">Sign Up</button>
</form>
