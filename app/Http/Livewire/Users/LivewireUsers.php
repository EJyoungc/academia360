<?php

namespace App\Http\Livewire\Users;

use App\Models\AcademicYearStudentLog;
use App\Models\Mobile;
use App\Models\StudentParent;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class LivewireUsers extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];
    public $search;
    public $user;
    public $usernumbers;
    public $folder = 'all';
    public $subfolder = "student";
    public Collection $inputs;
    public $students = [];

    //form
    public $Name, $email, $photo, $nationality, $gender, $occupation, $role, $address, $number, $phone_type, $date_of_birth, $medical_issues, $password, $guardian_role, $guardian_child;
    protected $rules = ['inputs.*.phone' => 'required|numeric', 'inputs.*.phone_type' => 'required|string'];
    protected $messages = [
        'inputs.*.phone.required' => 'This phone field is required',
        'inputs.*.phone.numeric' => 'This phone type field must be numeric',
        'inputs.*.phone_type.required' => 'This phone type field must be numeric',
    ];

    public function switchfolder($subfolder)
    {

        // dd($this);
        $this->fill([
            'inputs' => collect([['phone' => '', 'phone_type' => '']]),
        ]);
        // dd($this->inputs);
        switch ($subfolder) {
            case 'student':
                $this->subfolder = $subfolder;
                break;
            case 'guardian':
                $this->subfolder = $subfolder;

                break;
            case 'teacher':
                $this->subfolder = $subfolder;

                break;
            case 'librarian':
                $this->subfolder = $subfolder;

                break;

            default:
                # code...
                $this->alert('error', 'folder Does not exists ');
                break;
        }
    }
    public function create()
    {
        $this->folder = 'create';
        $this->password = "AA123";
    }

    public function mount()
    {
        $this->students = User::where('role', 'student')->get();
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

                $this->students = User::where('role', 'student')->get();
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

                $this->students = User::where('role', 'student')->get();
                $this->reset(['Name', 'email', 'role', 'nationality', 'gender', 'guardian_child', 'guardian_role', 'address', 'occupation']);
                $this->alert('success', 'successfully added ');
                break;

            default:
                # code...
                break;
        }
    }



    public function activate($id)
    {
        $u = User::find($id);
        $u->status = 'active';
        $u->save();
        $this->alert('success', 'successfully activated');
    }
    public function deactivate($id)
    {

        $u = User::find($id);
        $u->status = 'unactive';
        $u->save();
        $this->alert('success', 'successfully deactivated');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|image',
        ]);

        $file = $this->photo->store('images');
        if ($this->user->profile_photo_path == "") {
            $this->user->profile_photo_path = $file;
            $this->user->save();
            $this->alert('success', 'successfully upload');
            $this->reset('photo');
        } else {
            Storage::disk('public')->delete($this->user->profile_photo_path);
            $this->user->profile_photo_path = $file;
            $this->user->save();
            $this->alert('success', 'successfully upload');
            $this->reset('photo');
        }
    }

    public function removeimage()
    {

        Storage::disk('public')->delete($this->user->profile_photo_path);
        $this->user->profile_photo_path = "";
        $this->user->save();
        $this->alert('success', 'successfully removed');
    }

    public function addno()
    {
        $this->inputs->push(['phone' => '', 'phone_type' => '']);
    }

    public function removeno($key)
    {
        $this->inputs->pull($key);
    }

    public function addNumber()
    {
        $this->validate(['number' => 'required|numeric', 'phone_type' => 'required|string']);
        $m = new Mobile();
        $m->user_id = $this->user->id;
        $m->number = $this->number;
        $m->phone_type = $this->phone_type;
        $m->save();
        $this->usernumbers = Mobile::where('user_id', $this->user->id)->get();
        $this->reset(['number', 'phone_type']);
        $this->alert('success', 'successfully added');
    }

    public function removeNumber($id)
    {
        $m = Mobile::find($id);
        $m->delete();
        $this->usernumbers = Mobile::where('user_id', $this->user->id)->get();
        $this->alert('success', 'successfully deleted');
    }


    public function edit($id)
    {
        $this->user = User::find($id);
        $this->usernumbers = Mobile::where('user_id', $id)->get();


        $this->folder = 'edit';
        $this->Name = $this->user->name;
        $this->role = $this->user->role;
        $this->gender = $this->user->gender;
        $this->nationality = $this->user->nationality;
        $this->address = $this->user->address;
        $this->occupation = $this->user->occupation;
    }

    public function cancel()
    {
        $this->reset(['folder', 'user', 'Name', 'address', 'role', 'gender', 'nationality', 'occupation',]);
    }

    public function update()
    {

        $this->validate([
            'Name' => 'required',
            'address' => 'required|string',
            'role' => 'required|string',
            'gender' => 'required',
            'nationality' => 'required|string',
            'occupation' => 'required|string',


        ]);
        // $this->validate();

        $this->user->name = $this->Name;
        $this->user->address = $this->address;
        $this->user->role = $this->role;
        $this->user->gender = $this->gender;
        $this->user->nationality = $this->nationality;
        $this->user->occupation = $this->occupation;
        // dd($this->user);
        $this->user->save();


        // $this->reset(['Name', 'address', 'role', 'gender', 'nationality', 'occupation',]);
        $this->alert('success', 'Updated');
    }

    public function render()
    {
        
        $query =AcademicYearStudentLog::where('academic_year_student_logs.status','current')
        ->join('classrooms','classrooms.id','=','academic_year_student_logs.classroom_id')
        ->join('users','users.id','=','academic_year_student_logs.student_id')
        
        ->select('academic_year_student_logs.id','academic_year_student_logs.student_id','users.name As student','classrooms.name AS classroom')
        ->get();
        
        $users = User::where('users.Name', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->orWhere('users.role', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->orWhere('users.email', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->orWhere('users.status', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->paginate(5);

        return view('livewire.users.livewire-users')->with('u', $users);
    }
}
