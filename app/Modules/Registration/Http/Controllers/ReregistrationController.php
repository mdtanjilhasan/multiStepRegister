<?php

namespace App\Modules\Registration\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Registration\Models\Image;
use App\Modules\Registration\Models\Lecturer;
use Illuminate\Http\Request;

class ReregistrationController extends Controller
{
    public function something()
    {
        dd('hello there i am inside');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits:11',
            'nid' => 'required|numeric',
            'avatar' => 'required|image',
            'nidFont' => 'required|image',
            'nidBack' => 'required|image',
            'educations' => 'required',
            'publications' => 'required',
            'experiences' => 'required',
        ]);

        try {
            $lecture = new Lecturer();
            $lecture->name = $request->name;
            $lecture->email = $request->email;
            $lecture->phone = $request->phone;
            $lecture->nid = $request->nid;
            $education = explode(',', $request->educations);
            $experience = explode(',', $request->experiences);
            $publications = explode(',', $request->publications);
            $lecture->achievements = ['education' => $education, 'experience' => $experience, 'publications' => $publications];
            $lecture->save();

            if ($request->hasFile('avatar')) {
                self::imageUpload($request, $lecture->id, 'avatar');
            }

            if ($request->hasFile('nidFont')) {
                self::imageUpload($request, $lecture->id, 'nidFont');
            }

            if ($request->hasFile('nidBack')) {
                self::imageUpload($request, $lecture->id, 'nidBack');
            }
            return response()->json(['success' => true, 'message' => 'Sucessfully Data Stored']);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 400);
        }


    }

    private function imageUpload($request, $lecturerId, $name)
    {
        try {
            $image = new Image();
            $image->url = $request->$name->store('images', 'public');
            $image->lecturer_id = $lecturerId;
            $image->save();
            return true;
        } catch (\Exception $exception) {
            return false;
        }

    }
}
