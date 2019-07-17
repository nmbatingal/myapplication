<?php

namespace App\Imports;

define("LASTNAME", 1);
define("FIRSTNAME", 2);
define("MIDDLENAME", 3);
define("COURSE_CATEGORY", 4);
define("ACADEMIC_DEGREES", 5);
define("COURSES", 6);
define("ACRONYMS", 7);
define("YEAR_GRADUATED", 8);
define("SCHOOLS", 9);
define("EMAIL", 10);
define("CONTACT_NUMBER", 11);
define("SEX", 12);
define("AGE", 13);
define("CIVIL_STATUS", 14);
define("REGION", 15);
define("PROVINCE", 16);
define("MUNICIPALITY", 17);
define("BARANGAY", 18);
define("TRAINING_TITLE", 19);
define("TRAINING_CONDUCTED_BY", 20);
define("TRAINING_HOURS", 21);
define("TRAINING_FROM_DATE", 22);
define("TRAINING_TO_DATE", 23);
define("EXPERIENCE_POSITION", 24);
define("EXPERIENCE_AGENCY", 25);
define("SALARY_GRADE", 26);
define("EXPERIENCE_FROM_DATE", 27);
define("EXPERIENCE_TO_DATE", 28);
define("ELIGIBILITY_TITLE", 29);
define("LICENSE_NUMBER", 30);
define("ELIGIBILITY_RATING", 31);
define("ELIGIBILITY_EXAM_DATE", 32);
define("DATE_OF_APPLICATION", 33);
define("DATE_RECEIVED", 34);

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Hrmis\Applicants as Applicant;

// EDUCATION
use App\CourseCategory as CourseCategory;
use App\AcademicDegree as AcademicDegree;
use App\DegreeType as DegreeType;
use App\Course as Course;

// ADDRESS
use App\Models\Location\Barangay as Barangay;
use App\Models\Location\Municipality as Municipality;
use App\Models\Location\Province as Province;
use App\Models\Location\Region as Region;

// Applicant Info
use App\Models\Hrmis\ApplicantEducation;
use App\Models\Hrmis\ApplicantEligibility;
use App\Models\Hrmis\ApplicantExperience;
use App\Models\Hrmis\ApplicantTraining;


class ApplicantsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $isNewApplicant = true;

        $applicantsCount = count($collection);
        for($i=2; $i<$applicantsCount; $i++) {
            if($collection[$i][LASTNAME] != '') {
                $applicant = new Applicant;

                $applicant->date_of_application = $collection[$i][DATE_OF_APPLICATION];
                $applicant->date_received = $collection[$i][DATE_RECEIVED];

                // PERSONAL INFO
                $applicant->lastname = $collection[$i][LASTNAME];
                $applicant->firstname = $collection[$i][FIRSTNAME];
                $applicant->middlename = $collection[$i][MIDDLENAME];
                $applicant->sex = ($collection[$i][SEX] == 'MALE') ? 1 : 2;
                $applicant->age = $collection[$i][AGE];
                $applicant->civil_status = $collection[$i][CIVIL_STATUS];
                $applicant->email = $collection[$i][EMAIL];
                $applicant->contact_number = $collection[$i][CONTACT_NUMBER];

                // ADDRESS
                $region = Region::with([
                    'provinces' => function($query) use ($collection, $i) {
                        return $query->with([
                            'municipalities' => function($query) use ($collection, $i) {
                                return $query->with([
                                    'barangays' => function($query) use ($collection, $i) {
                                        $query->where('name', str_replace('_', ' ', $collection[$i][BARANGAY])); //BARANGAYS
                                    }
                                ])->where('name', str_replace('_', ' ', $collection[$i][MUNICIPALITY])); //MUNICIPALITIES
                            }
                        ])->where('name', str_replace('_', ' ', $collection[$i][PROVINCE])); //PROVINCES
                    }
                ])
                ->where('name', str_replace('_', ' ', $collection[$i][REGION])) //REGIONS
                ->first();
                $applicant->barangay_code = $region->provinces[0]->municipalities[0]->barangays[0]->code;

                $applicant->save();

                // EDUCATION
                if($collection[$i][COURSE_CATEGORY] != '' && $collection[$i][ACADEMIC_DEGREES] != '') {
                    $this->saveEducation($applicant->id,$collection[$i]);
                }

                // TRAININGS
                if($collection[$i][TRAINING_TITLE] != '') {
                    $this->saveTraining($applicant->id, $collection[$i]);
                }

                // WORK EXPERIENCES
                if($collection[$i][EXPERIENCE_POSITION] != '') {
                    $this->saveExperience($applicant->id, $collection[$i]);
                }

                // ELIGIBILITIES
                if($collection[$i][ELIGIBILITY_TITLE] != '') {
                    $this->saveEligiblity($applicant->id, $collection[$i]);
                }

            } else {
                // EDUCATION
                if($collection[$i][COURSE_CATEGORY] != '' && $collection[$i][ACADEMIC_DEGREES] != '') {
                    $this->saveEducation($applicant->id,$collection[$i]);
                }
            }
        }
    }

    private function saveEducation($applicantId, $row) {
        $courseCategory = CourseCategory::where('name', $row[COURSE_CATEGORY])->first();
        $academicDegree = DegreeType::where('name', $row[ACADEMIC_DEGREES])->first();

        $course = Course::firstOrCreate([
            'name' => $row[COURSES],
            'degree_type_id' => $academicDegreeId,
            'course_category_id' => $courseCategoryId,
        ]);

        $applicantEducation = new ApplicantEducation;
        $applicantEducation->applicant_id = $applicantId;
        $applicantEducation->course_id = $course->id;
        $applicantEducation->program = $row[COURSES];
        $applicantEducation->acronym = $row[ACRONYMS];
        $applicantEducation->school = $row[SCHOOLS];
        $applicantEducation->year_graduated = $row[YEAR_GRADUATED];

        $applicantEducation->save();
    }
    private function saveTraining($applicantId, $row) {
        $training = new ApplicantTraining;
        $training->applicant_id = $applicantId;
        $training->title = $row[TRAINING_TITLE];
        $training->conducted_by = $row[TRAINING_CONDUCTED_BY];
        $training->hours = $row[TRAINING_HOURS];
        $training->from_date = $row[TRAINING_FROM_DATE];
        $training->to_date = $row[TRAINING_TO_DATE];
        $training->save();
    }
    private function saveExperience($applicantId, $row) {
        $experience = new ApplicantExperience;
        $experience->applicant_id = $applicantId;
        $experience->position = $row[EXPERIENCE_POSITION];
        $experience->agency = $row[EXPERIENCE_AGENCY];
        $experience->salary_grade = $row[SALARY_GRADE];
        $experience->from_date = $row[EXPERIENCE_FROM_DATE];
        $experience->to_date = $row[EXPERIENCE_TO_DATE];
        $experience->save();
    }
    private function saveEligiblity($applicantId, $row) {
        $eligibility = new ApplicantEligibility;
        $eligibility->applicant_id = $applicantId;
        $eligibility->license_number = $row[LICENSE_NUMBER];
        $eligibility->title = $row[ELIGIBILITY_TITLE];
        $eligibility->rating = $row[ELIGIBILITY_RATING];
        $eligibility->exam_date = $row[ELIGIBILITY_EXAM_DATE];
        $eligibility->save();
    }
}
