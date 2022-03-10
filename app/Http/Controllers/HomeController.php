<?php

namespace App\Http\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $EmpID = [
        1 => [
            'EmployeeNumber' => 1,
            'FirstName' => 'Angela',
            'LastName' => 'Domingo',
            'Birthday' => '2001/01/21',
            'Gender' => 'Female',
            'Age' => '21',
            'Email' => 'angelanicole.domingo@letran.edu.ph'
        ],

        2 => [
            'EmployeeNumber' => 2,
            'FirstName' => 'Jose',
            'LastName' => 'Park',
            'Birthday' => '2000/10/24',
            'Gender' => 'Male', 
            'Age' => '21',
            'Email' => 'jose.park@letran.edu.ph'          
        ],

        3 => [
            'EmployeeNumber' => 3,
            'FirstName' => 'Andrea',
            'LastName' => 'Ballad',
            'Birthday' => '2000/12/21',
            'Gender' => 'Female',
            'Age' => '21',
            'Email' => 'andreaaliza.ballad@letran.edu.ph'
        ],
        4 => [
            'EmployeeNumber' => 4,
            'FirstName' => 'Terdy',
            'LastName' => 'Cunanan',
            'Birthday' => '2001/04/05',
            'Gender' => 'Male',
            'Age' => '20',
            'Email' => 'ernestoiii.cunanan@letran.edu.ph'
        ],
        5 => [
            'EmployeeNumber' => 5,
            'FirstName' => 'Ma. Mikaela',
            'LastName' => 'Gilbuena',
            'Birthday' => '1999/11/04',
            'Gender' => 'Female',
            'Age' => '22',
            'Email' => 'mamikaela.gilbuena@letran.edu.ph'
        ],
        6 => [
            'EmployeeNumber' => 6,
            'FirstName' => 'Hilary Dianne',
            'LastName' => 'Eje',
            'Birthday' => '2001/01/20',
            'Gender' => 'Female',
            'Age' => '21',
            'Email' => 'hilarydianne.eje@letran.edu.ph'
        ],
        7 => [
            'EmployeeNumber' => 7,
            'FirstName' => 'Patricia Ann',
            'LastName' => 'Dela Cruz',
            'Birthday' => '2001/07/29',
            'Gender' => 'Female',
            'Age' => '20',
            'Email' => 'patriciaann.delacruz@letran.edu.ph'
        ]
    ];

    public function index()
    {
        return view('Employee.index', ['EmployeeID' => $this -> EmpID]);
    }

    public function show($id)
    {
        abort_if(!(isset($this -> EmpID)), 404);
        return view('Employee.show', ['Employee' => $this -> EmpID($id)]);
    }

    public function create()
    {
        return view('Employee.create');
    }

    public function store(Request $request)
    {
        $EmployeeNumber = Request() -> input('EmployeeNumber');
        $FirstName = Request() -> input('FirstName');
        $LastName = Request() -> input('LastName');
        $Birthday = Request() -> input('Birthday');
        $Gender  = Request() -> input('Gender');
        $Age  = Request() -> input('Age');
        $Email  = Request() -> input('Email');
        $EmpID = [
            'EmployeeNumber' => $EmployeeNumber,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Birthday' => $Birthday,
            'Gender' => $Gender,
            'Age' => $Age,
            'Email' =>$Email
        ];
        return view('Employee.store', ['Employee' => $this -> EmployeeID($id)]);
    }

    public function destroy($id)
    {
        $this -> EmployeeID[$id] -> delete();
        return view('Employee.store', ['Employee' => $this -> EmployeeID]);
    }

    public function birthday($yyyy, $mm, $dd)
    {
        $date = date('Y/M/D', mktime(0,0,0, $yyyy,$mm,$dd));
        return view('Employee.birthday', ['Employee' => $this -> EmployeeID], ['date' => $date]);
    }
}