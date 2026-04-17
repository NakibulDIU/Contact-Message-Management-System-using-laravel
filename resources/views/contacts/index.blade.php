<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>All Contacts</title>
</head>
<body style="font-family: Arial; margin: 40px;">

    <h1>All Submitted Messages</h1>

    @if (session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('contacts.create') }}" 
       style="padding:10px 15px; background:#007bff; color:white; text-decoration:none; border-radius:5px;">
        + New Message
    </a>

    <hr>

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
                        <td>
                            <a href="{{ route('contacts.edit', $contact->id) }}" 
                               style="color:blue; margin-right:15px;">✏️ Edit</a>
                            
                            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" 
                                  style="display:inline;" 
                                  onsubmit="return confirm('আসলেই ডিলিট করতে চাও?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>