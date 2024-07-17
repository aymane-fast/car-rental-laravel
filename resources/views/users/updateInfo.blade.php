



<div class="container">
	<form action="{{ route('users.updateInfo') }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text"  id="name" name="name" value="{{ $user->name }}" required>
		</div>
		<div class="form-group">
			<label for="surname">Surname:</label>
			<input type="text"  id="surname" name="surname" value="{{ $user->surname }}" required>
		</div>
		<div class="form-group">
			<label for="phone">Phone:</label>
			<input type="text"  id="phone" name="phone" value="{{ $user->phone }}" required>
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text"  id="address" name="address" value="{{ $user->address }}" required>
		</div>
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text"  id="city" name="city" value="{{ $user->city }}" required>
		</div>
		<div class="form-group">
			<label for="postal_code">Postal Code:</label>
			<input type="number"  id="postal_code" name="postal_code" value="{{ $user->postal_code }}" required>
		</div>
		<div class="form-group">
			<label for="image">Profile Image:</label>
			<input type="file"  id="image" name="image">
		</div>
		<button type="submit" >Update</button>
	</form>
</div>