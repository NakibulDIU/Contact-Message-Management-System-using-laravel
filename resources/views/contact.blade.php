<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Contact Management</title>
</head>
<body style="font-family: Arial; margin: 40px;">

    <h1>Contact Management System</h1>

    @if (session('success'))
        <p style="color:green; font-weight:bold;">{{ session('success') }}</p>
    @endif

    <h2>Submit New Message</h2>
    <form method="POST" action="/submit-contact">
        @csrf

        <label>নাম:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>ইমেইল:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>মেসেজ:</label><br>
        <textarea name="message" rows="5">{{ old('message') }}</textarea><br><br>

        <button type="submit">Send Message</button>
    </form>

    <hr>

    <h2>All Submitted Messages ({{ $contacts->count() }})</h2>

    @if ($contacts->isEmpty())
        <p>এখনো কোনো মেসেজ নেই।</p>
    @else
        <table border="1" cellpadding="12" cellspacing="0" style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #333; color: white;">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('d M, Y h:i A') }}</td>
                        <td style="text-align:center; vertical-align: middle;">
                            <a href="{{ route('contact.edit', $contact->id) }}">
                                <button style="color:blue; background:none; ; cursor:pointer;">Edit</button></a>
                            
                            <form method="POST" action="{{ route('contact.destroy', $contact->id) }}" 
                                  style="display:inline;" 
                                  onsubmit="return confirm('আসলেই ডিলিট করতে চাও?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color:red; background:none;  cursor:pointer;">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="/contact">Refresh Page</a>

</body>
</html>