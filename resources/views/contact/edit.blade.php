<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Edit Message</title>
</head>
<body>
    <h1>Edit Message</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('contact.update', $contact->id) }}">
        @csrf
        @method('PUT')

        <label>নাম:</label><br>
        <input type="text" name="name" value="{{ $contact->name }}"><br><br>

        <label>ইমেইল:</label><br>
        <input type="email" name="email" value="{{ $contact->email }}"><br><br>

        <label>মেসেজ:</label><br>
        <textarea name="message" rows="5">{{ $contact->message }}</textarea><br><br>

        <button type="submit">Update Message</button>
    </form>

    <br>
    <a href="/contact">← Back to Contact Page</a>
</body>
</html>