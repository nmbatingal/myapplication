<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// location models;
use App\Models\Location\Region as Region;
use App\Models\Location\Province as Province;
use App\Models\Location\Municipality as Municipality;
use App\Models\Location\Barangay as Barangay;

// Education;
use App\AcademicDegree as AcademicDegree;
use App\CourseCategory as CourseCategory;
use App\DegreeType as DegreeType;
use App\Course as Course;

use App\Models\Hrmis\ApplicantEducation;



class OpenApiController extends Controller
{
    public function regions() {
        $regions = Region::all();
        return response()->json([
            'regions' => $regions,
        ]);
    }
    public function provinces(Request $request) {
        $provinces = Province::where('region_code', $request->region_code)->orderBy('name')->get();
        return response()->json([
            'provinces' => $provinces,
        ]);
    }
    public function municipalities(Request $request) {
        $municipalities = Municipality::where('province_code', $request->province_code)->orderBy('name')->get();
        return response()->json([
            'municipalities' => $municipalities,
        ]);
    }
    public function barangays(Request $request) {
        $barangays = Barangay::where('municipality_code', $request->municipality_code)
            ->orderBy('name')->get();
        return response()->json([
            'barangays' => $barangays,
        ]);
    }

    public function academicDegrees() {
        $degrees = AcademicDegree::with(['degreeTypes'])->get();
        return response()->json(['degrees' => $degrees]);
    }

    public function test() {
        // EDUCATION
        $courseCategory = CourseCategory::where('name', 'Humanities')->first();
        $academicDegree = DegreeType::where('name', 'Bachelor of Science')->first();
        $course = Course::firstOrCreate([
            'name' => 'Information Technology',
            'degree_type_id' => $academicDegree->id,
            'course_category_id' => $courseCategory->id
        ]);
        $applicantEducation = new ApplicantEducation;
        $applicantEducation->applicant_id = 118;
        $applicantEducation->course_id = $course->id;
        $applicantEducation->program = $course->name;
        $applicantEducation->acronym = 'BSIT';
        $applicantEducation->school = 'CSU';
        $applicantEducation->year_graduated = '2016-07-16';


        return response()->json([
            'applicant_education' => $applicantEducation,
            'course_category' => $courseCategory,
            'academic_degree' => $academicDegree,
            'course' => $course,
        ]);
    }
}
