<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="flex flex-col">
        <label for="name">Email:</label>
        <input type="email" name="email" placeholder="Email" class="p-1" maxlength="255" required>
    </div>
    <div class="flex flex-col">
        <label for="name">Password:</label>
        <input type="password" name="password" placeholder="Password" class="p-1" required>
    </div>

    <br>

    <button type="submit">Login</button>
</form>