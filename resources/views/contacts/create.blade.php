<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>New Message</title>
</head>
<body style="font-family: Arial; margin: 40px;">

    <h1>Submit New Message</h1>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        <label>নাম:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>ইমেইল:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>মেসেজ:</label><br>
        <textarea name="message" rows="5">{{ old('message') }}</textarea><br><br>

        <button type="submit" style="padding:10px 20px;">Send Message</button>
    </form>

    <br>
    <a href="{{ route('contacts.index') }}">← Back to All Messages</a>

</body>
</html>