

<h1>Register</h1>
<form method="POST" action="/register">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required><br>

    <label for="postal_code">Postal Code:</label>
    <input type="text" id="postal_code" name="postal_code" required><br>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required><br>

    <button type="submit">Register</button>
</form>