<!-- resources/views/profile/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>Profile of {{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Joined on:</strong> {{ $user->created_at->format('d M Y') }}</p>

    <!-- Add other user info as needed -->

    <a href="{{ route('user.dashboard') }}">Back to Dashboard</a>
</body>
</html>
