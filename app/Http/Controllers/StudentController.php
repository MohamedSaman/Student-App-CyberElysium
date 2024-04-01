<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $Students=  Student::paginate(5);

    //   dd ($Students);
    return view('dashboard', compact('Students'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
            'age' => 'required',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('images/'); // Ensure 'images' directory exists in 'public'
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;
        } else {
            return redirect()->back()->withErrors(['image' => 'Please provide an image.'])->withInput();
        }
    
        Student::create($data);
    
        return redirect()
            ->route('dashboard')
            ->withMessage('Student added successfully');
    }
    

 
    public function show(Student $Student)
    {
        return view('show',compact('Student')); 
        
       }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $Student)
    {
        // dd($Student);
        return view('edit',compact('Student'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $Student)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|int',
        'is_active' => 'nullable|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
    ]);

    // Update other fields
    $Student->update([
        'name' => $request->input('name'),
        'age' => $request->input('age'),
        'is_active' => $request->has('is_active') ? 1 : 0,
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destinationPath = public_path('images/');
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $Student->update(['image' => $profileImage]);
    }

    // Redirect back or to another page after update
    return redirect()->route('dashboard')->withMessage('Student updated successfully');
}

    
    
    
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Student $Student)
   {
    $Student->delete();

    return redirect()->route('dashboard')->withMessage('Student deleted successfully!');
   }

}
