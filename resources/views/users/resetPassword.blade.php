
<h1>reset your password</h1>

<form action="{{route('users.resetPass')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    <label for="old_password">old password :</label>
    <input type="password" name="old_password" id="old_password">
    <label for="password">new password :</label>
    <input type="password" name="password" id="password">
    <label for="password_confirmation">new password confirmation :</label>
    <input type="password" name="password_confirmation" id="password_confirmation">
    <button type="submit">reset password</button>
</form>