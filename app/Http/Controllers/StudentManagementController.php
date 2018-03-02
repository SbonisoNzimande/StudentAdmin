<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Response;
use App\Student;
use View;
use Validator;

class StudentManagementController extends Controller
{

    // for validation
    protected $rules =
    [
        'lastname' => 'required|max:60',
        'firstname' => 'required|max:60',
        'id_number' => 'required|numeric|digits:13',
        'sanc_number' => 'required|numeric|digits:10',
        'physical_address' => 'required|max:120',
        'postal_address' => 'required|max:120',
        'place_of_employment' => 'required',
        'date_of_registration' => 'required|date',
        'programme_registered' => 'required',
        'allocation' => 'required'
    ];


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')
            ->paginate(5);

        return view('students-mgmt/index', ['students' => $students]);
    }


    /**
     * Get Table of students
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function getTable()
    {
        $responce     = [];
        $students       = Student::all();

        // var_dump($students);
        // die();

        $student_array = $students->toArray();

        foreach ($student_array as $student) {

            $button     = '<button class="btn btn-info btn-xs edit-modal" data-title="Edit" data-toggle="modal"  
                                data-id="'.$student['id'].'" 
                                data-firstname="'.$student['firstname'].'" 
                                data-lastname="'.$student['lastname'].'" 
                                data-id_number="'.$student['id_number'].'" 
                                data-sanc_number="'.$student['sanc_number'].'" 
                                data-physical_address="'.$student['physical_address'].'" 
                                data-postal_address="'.$student['postal_address'].'" 
                                data-place_of_employment="'.$student['place_of_employment'].'" 
                                data-date_of_registration="'.$student['date_of_registration'].'" 
                                data-programme_registered="'.$student['programme_registered'].'" 
                                data-allocation="'.$student['allocation'].'" 
                                aria-expanded="false"><span class="fa fa-pencil-square-o"></span></button>';


            $button     .= '<button class="btn btn-danger btn-xs delete-modal" data-title="Delete" data-toggle="modal" 

                                data-id="'.$student['id'].'" 
                                data-firstname="'.$student['firstname'].'" 
                                data-lastname="'.$student['lastname'].'" 
                                aria-expanded="false"><span class="fa fa-times"></span></button>';


            $responce[] = [
                'full_name' => $student['firstname'] .' '. $student['lastname'],
                'id_number' => $student['id_number'],
                'sanc_number' => $student['sanc_number'],
                'physical_address' => $student['physical_address'],
                'postal_address' => $student['postal_address'],
                'place_of_employment' => $student['place_of_employment'],
                'date_of_registration' => $student['date_of_registration'],
                'programme_registered' => $student['programme_registered'],
                'allocation' => $student['allocation'],
                'created' => $student['created_at'],
                'action' => $button
            ]; 
        }

       

        return $responce;
    }

    /**
     * Get Table of students
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function getSearchTable($students)
    {
        $responce     = [];
        // $students       = Student::all();

       

        $student_array = $students->toArray();
        //  var_dump($student_array['data']);
        // die();

        foreach ($student_array['data'] as $student) {

            // var_dump($student->id);
            // die();

            $button     = '<button class="btn btn-info btn-xs edit-modal" data-title="Edit" data-toggle="modal"  
                                data-id="'.$student->id.'" 
                                data-firstname="'.$student->firstname.'" 
                                data-lastname="'.$student->lastname.'" 
                                data-id_number="'.$student->id_number.'" 
                                data-sanc_number="'.$student->sanc_number.'" 
                                data-physical_address="'.$student->physical_address.'" 
                                data-postal_address="'.$student->postal_address.'" 
                                data-place_of_employment="'.$student->place_of_employment.'" 
                                data-date_of_registration="'.$student->date_of_registration.'" 
                                data-programme_registered="'.$student->programme_registered.'" 
                                data-allocation="'.$student->allocation.'" 
                                aria-expanded="false"><span class="fa fa-pencil-square-o"></span></button>';


            $button     .= '<button class="btn btn-danger btn-xs delete-modal" data-title="Delete" data-toggle="modal" 

                                data-id="'.$student->id.'" 
                                data-firstname="'.$student->firstname.'" 
                                data-lastname="'.$student->lastname.'" 
                                aria-expanded="false"><span class="fa fa-times"></span></button>';


            $responce['data'][] = [
                'full_name' => $student->firstname .' '. $student->lastname,
                'id_number' => $student->id_number,
                'sanc_number' => $student->sanc_number,
                'physical_address' => $student->physical_address,
                'postal_address' => $student->postal_address,
                'place_of_employment' => $student->place_of_employment,
                'date_of_registration' => $student->date_of_registration,
                'programme_registered' => $student->programme_registered,
                'allocation' => $student->allocation,
                'created' => $student->created_at,
                'action' => $button
            ]; 
        }

       

        return $responce;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cities = City::all();
        // $states = State::all();
//        $countries = Country::all();
//        $departments = Department::all();
//        $divisions = Division::all();
        return view('students-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make(Input::all(), $this->rules);// Validate using rules

         if ($validator->fails()) { // validator failed show errors
             return Response::json(['errors' => $validator->getMessageBag()->toArray()]);
         }else{// Validation passed - save data
             $student = new Student();
             $student->lastname = $request->lastname;
             $student->firstname = $request->firstname;
             $student->id_number = $request->id_number;
             $student->sanc_number = $request->sanc_number;
             $student->physical_address = $request->physical_address;
             $student->postal_address = $request->postal_address;
             $student->place_of_employment = $request->place_of_employment;
             $student->date_of_registration = $request->date_of_registration;
             $student->programme_registered = $request->programme_registered;
             $student->allocation = $request->allocation;
             $student->save();
             return response()->json($student);// JSON responce
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($student == null || count($student) == 0) {
            return redirect()->intended('/student-management');
        }
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $departments = Department::all();
        $divisions = Division::all();
        return view('students-mgmt/edit', ['student' => $student, 'cities' => $cities, 'states' => $states, 'countries' => $countries,
            'departments' => $departments, 'divisions' => $divisions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator  = Validator::make(Input::all(), $this->rules);


        if ($validator->fails()) {
           return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $student = Student::findOrFail($id);
            $student->lastname               = $request->lastname;
            $student->firstname              = $request->firstname;
            $student->id_number              = $request->id_number;
            $student->sanc_number            = $request->sanc_number;
            $student->physical_address       = $request->physical_address;
            $student->postal_address         = $request->postal_address;
            $student->place_of_employment    = $request->place_of_employment;
            $student->date_of_registration   = $request->date_of_registration;
            $student->programme_registered   = $request->programme_registered;
            $student->allocation             = $request->allocation;
            $student->save();
           return response()->json($student);// JSON responc
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json($student);
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'sanc_number' => $request['sancnumber'],
            'id_number' => $request['idnumber']
        ];
        
        $students   = $this->doSearchingQuery($constraints);
        $table      = $this->getSearchTable($students);
        return $table;
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('students')
      
            ->select('students.*');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }


        return $query->paginate(5);
    }

    /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
        $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    private function validateInput($request) {
        $this->validate($request, [
            'lastname' => 'required|max:60',
            'firstname' => 'required|max:60',
            'id_number' => 'required|max:13',
            'sanc_number' => 'required|max:30',
            'physical_address' => 'required|max:120',
            'postal_address' => 'required|max:120',
            'place_of_employment' => 'required',
            'date_of_registration' => 'required',
            'programme_registered' => 'required',
            'allocation' => 'required'

        ]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
