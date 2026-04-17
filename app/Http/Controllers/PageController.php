<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home()
    {
        return 'এটা Home Page - Controller থেকে আসছে';
    }

    public function about()
    {
        return 'এটা About Us Page';
    }

    //For Learning Blade

public function greeting()
{
    $name = "Nakib";
    $age = 25;
    $skills = ["PHP", "Laravel", "MySQL", "Git"];
    $isStudent = true;

    return view('greeting', compact('name', 'age', 'skills', 'isStudent'));
}

// Form Handling and CSRF Protection

public function showContact()
{
    $contacts = Contact::latest()->get();   // সব messages, newest প্রথমে

    return view('contact', compact('contacts'));
}

public function submitContact(Request $request)
{
    // Adding Validation

    $request->validate([
        'name'    => 'required|min:3|max:50',
        'email'   => 'required|email',
        'message' => 'required|min:10'
    ]);

    // $name = $request->name;
    // $email = $request->email;
    // $message = $request->message;

    // return "ধন্যবাদ {$name}! তোমার মেসেজ পেয়েছি। আমরা শীঘ্রই উত্তর দিব।";
// Lessons 12 Database
    // Database এ সেভ করা
    Contact::create([
        'name'    => $request->name,
        'email'   => $request->email,
        'message' => $request->message,
    ]);



    //Redirective

    // এখানে পরে আমরা email বা database এ সেভ করবো
    // এখন শুধু success message দেখাবো


    return redirect('/contact')
           ->with('success', 'ধন্যবাদ! তোমার মেসেজ সফলভাবে পাঠানো হয়েছে। আমরা শীঘ্রই যোগাযোগ করবো।');
}

public function destroy($id)
{
    $contact = Contact::findOrFail($id);   // id দিয়ে record খুঁজে বের করবে
    $contact->delete();                    // delete করে দিবে

    return redirect('/contact')
           ->with('success', 'মেসেজ সফলভাবে ডিলিট হয়েছে!');
}

//Edit

public function edit($id)
{
    $contact = Contact::findOrFail($id);
    return view('contact.edit', compact('contact'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name'    => 'required|min:3|max:50',
        'email'   => 'required|email',
        'message' => 'required|min:10'
    ]);

    $contact = Contact::findOrFail($id);
    $contact->update([
        'name'    => $request->name,
        'email'   => $request->email,
        'message' => $request->message,
    ]);

    return redirect('/contact')
           ->with('success', 'মেসেজ সফলভাবে আপডেট হয়েছে!');
}

}
