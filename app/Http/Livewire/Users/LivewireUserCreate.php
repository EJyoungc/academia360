<?php

namespace App\Http\Livewire\Users;

use App\Models\ClassLevel;
use App\Models\Mobile;
use App\Models\StudentParent;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LivewireUserCreate extends Component
{


    use LivewireAlert;
    
    
    public $subjects = [];
    public $levels = [];
    public Collection $inputs;
    public $students;

    public $create_role;
    public $Name, $email, $photo, $nationality, $gender, $occupation, $role,$level, $address,$subject, $number, $phone_type, $date_of_birth, $medical_issues, $password, $guardian_role, $guardian_child;
    protected $rules = ['inputs.*.phone' => 'required|numeric', 'inputs.*.phone_type' => 'required|string'];
    protected $messages = [
        'inputs.*.phone.required' => 'This phone field is required',
        'inputs.*.phone.numeric' => 'This phone type field must be numeric',
        'inputs.*.phone_type.required' => 'This phone type field must be numeric',
    ];


    public function mount($role){
        $this->create_role = $role;
        $this->students = User::where('role', 'student')->get();
        $this->subjects = Subject::all();
        $this->levels = ClassLevel::all();

        $this->password = "AA123";
        $this->fill([
            'inputs' => collect([['phone' => '', 'phone_type' => '']]),
            
        ]);
    }


    public function store($role)
    {

        switch ($role) {
            case 'teacher':
                # teacher
                
                $this->validate([
                    'Name' => 'required|string',
                    'email' => 'required|email',
                    'nationality' => 'required|string',
                    'gender' => 'required|string',
                    'subject'=>'required',
                    'level'=>'required',
                    'inputs.*.phone' => 'required|numeric',
                    'inputs.*.phone_type' => 'required|string'
                ]);

                $u =  new User();
                $u->name = $this->Name;
                $u->email = $this->email;
                $u->role = $role;
                $u->subject_id = $this->subject;
                $u->level_id = $this->level;
                $u->nationality = $this->nationality;
                $u->gender = $this->gender;
                $u->password = Hash::make($this->password);

                $u->save();
                foreach ($this->inputs as $item) {
                    $m = new Mobile();
                    $m->user_id = $u->id;
                    $m->number = $item['phone'];
                    $m->phone_type = $item['phone_type'];
                    $m->save();
                }
                $this->fill([
                    'inputs' => collect([['phone' => '', 'phone_type' => '']]),
                ]);
                $this->reset(['Name', 'email', 'role', 'nationality', 'gender','level','subject']);
                $this->alert('success', 'successfully ');
                break;

            case 'librarian':
                # librarian
                $this->validate([
                    'Name' => 'required|string',
                    'email' => 'required|email',
                    'nationality' => 'required|string',
                    'gender' => 'required|string',
                    'inputs.*.phone' => 'required|numeric',
                    'inputs.*.phone_type' => 'required|string'
                ]);

                $u =  new User();
                $u->name = $this->Name;
                $u->email = $this->email;
                $u->role = $role;
                $u->nationality = $this->nationality;
                $u->gender = $this->gender;

                $u->password = Hash::make($this->password);

                $u->save();
                foreach ($this->inputs as $item) {
                    $m = new Mobile();
                    $m->user_id = $u->id;
                    $m->number = $item['phone'];
                    $m->phone_type = $item['phone_type'];
                    $m->save();
                }
                $this->fill([
                    'inputs' => collect([['phone' => '', 'phone_type' => '']]),
                ]);
                $this->reset(['Name', 'email', 'role', 'nationality', 'gender']);
                $this->alert('success', 'successfully ');
                break;

            case 'student':
                # student form

                $this->validate([
                    'Name' => 'required|string',
                    'email' => 'required|email',
                    'nationality' => 'required|string',
                    'gender' => 'required|string',
                    'medical_issues' => 'required|string',
                    'date_of_birth' => 'required',
                    'inputs.*.phone' => 'required|numeric',
                    'inputs.*.phone_type' => 'required|string'
                ]);
                $u =  new User();
                $u->name = $this->Name;
                $u->email = $this->email;
                $u->role = $role;
                $u->nationality = $this->nationality;
                $u->gender = $this->gender;
                $u->dob = $this->date_of_birth;
                $u->medical_issues = $this->medical_issues;
                $u->password = Hash::make($this->password);

                $u->save();
                foreach ($this->inputs as $item) {
                    $m = new Mobile();
                    $m->user_id = $u->id;
                    $m->number = $item['phone'];
                    $m->phone_type = $item['phone_type'];
                    $m->save();
                }

                // $this->students = User::where('role', 'student')->get();
                $this->fill([
                    'inputs' => collect([['phone' => '', 'phone_type' => '']]),
                ]);
                $this->reset(['Name', 'email', 'role', 'nationality', 'gender', 'date_of_birth', 'medical_issues']);
                $this->alert('success', 'successfully added ');
                break;
            case 'guardian':



                $this->validate([
                    'Name' => 'required|string',
                    'email' => 'required|email',
                    'nationality' => 'required|string',
                    // 'gender' => 'required|string',
                    // 'medical_issues' => 'required|string',
                    'guardian_child' => 'required',
                    'guardian_role' => 'required|string',
                    // 'date_of_birth' => 'required',
                    'inputs.*.phone' => 'required|numeric',
                    'inputs.*.phone_type' => 'required|string',
                    'occupation' => 'required|string',
                    'address' => 'required|string'
                ]);

                $u =  new User();
                $u->name = $this->Name;
                $u->email = $this->email;
                $u->role = $role;
                $u->nationality = $this->nationality;
                $u->gender = $this->gender;
                $u->address = $this->address;
                $u->occupation = $this->occupation;
                $u->password = Hash::make($this->password);

                $u->save();

                foreach ($this->inputs as $item) {
                    $m = new Mobile();
                    $m->user_id = $u->id;
                    $m->number = $item['phone'];
                    $m->phone_type = $item['phone_type'];
                    $m->save();
                }

                foreach ($this->guardian_child as $item) {

                    $sp = new StudentParent();
                    $sp->parent_id = $u->id;
                    $sp->guardian_role = $this->guardian_role;
                    $sp->student_id = $item;
                    $sp->save();
                }
                $this->fill([
                    'inputs' => collect([['phone' => '', 'phone_type' => '']]),
                ]);

                // $this->students = User::where('role', 'student')->get();
                $this->reset(['Name', 'email', 'role', 'nationality', 'gender', 'guardian_child', 'guardian_role', 'address', 'occupation']);
                $this->alert('success', 'successfully added ');
                break;

            default:
                # code...
                break;
        }
    }
    


    public function render()
    {

        // dd($this->inputs);
        return view('livewire.users.livewire-user-create');
    }
}
