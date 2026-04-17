<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Edit Message</title>
</head>
<body style="font-family: Arial; margin: 40px;">

    <h1>Edit Message</h1>

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        @method('PUT')

        <label>নাম:</label><br>
        <input type="text" name="name" value="{{ $contact->name }}"><br><br>

        <label>ইমেইল:</label><br>
        <input type="email" name="email" value="{{ $contact->email }}"><br><br>

        <label>মেসেজ:</label><br>
        <textarea name="message" rows="5">{{ $contact->message }}</textarea><br><br>

        <button type="submit" style="padding:10px 20px;">Update Message</button>
    </form>

    <br>
    <a href="{{ route('contacts.index') }}">← Back to All Messages</a>

</body>
</html>