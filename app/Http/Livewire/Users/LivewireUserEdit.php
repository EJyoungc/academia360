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

class LivewireUserEdit extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'remove_number'
    ];
    public $subjects = [];
    public $levels = [];
    public Collection $inputs;
    public $students =[] ;
    public $user;
    public $user_id;
    public $numbers = [];
    public $mobile_number_modal = false;
    public $child_modal = false;
    public $children;
    public $mobile_number_modal_title = "Add";
    public $mobile_id;
    public $mobile;
    public $mobile_type;
    public $create_role;
    public $Name, $email, $photo, $nationality, $gender, $occupation, $role, $level, $address, $subject, $number, $phone_type, $date_of_birth, $medical_issues, $password, $guardian_role, $guardian_child;

    public function open_number_modal()
    {
        $this->mobile_number_modal = true;
    }


    public function open_child_modal(){
        $this->child_modal = true;
    }


    public function confirm_delete($id)
    {
        $this->mobile_id = Mobile::find($id);
        $this->alert(
            'question',
            'Are you sure you want to delete Mobile ?',
            [
                'toast' => false,
                'showConfirmButton' => true,
                'width' => 600,
                'confirmButtonText' => 'Delete',
                'position' => 'center',
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancel',
                'onConfirmed' => 'remove_number',
                'allowOutsideClick' => false,
                'timer' => null
            ]
        );
    }

    public function remove_number()
    {
        $this->mobile_id->delete();
        $this->alert('success', 'successfull!');
    }





    public function save_mobile()
    {
        $this->validate([
            'mobile_type' => 'required',
            'mobile' => 'required|numeric'
        ]);
        $m = new Mobile();
        $m->user_id = $this->user->id;
        $m->phone_type = $this->mobile_type;
        $m->number = $this->mobile;
        $m->save();
        $this->reset(['mobile_type', 'mobile']);
        $this->alert('success', 'successfull!');
    }


    public function password_reset()
    {
        $this->user->password = Hash::make("AA123");
        $this->user->save();
        $this->alert('success', 'Password Updated');
    }

    public function mount($id, $role)
    {
        $this->user_id = $id;
        $this->create_role = $role;
        $this->user = User::find($id);
        $this->subjects = Subject::all();
        $this->levels = ClassLevel::all();
        // $this->numbers = Mobile::where('user_id',$id)->get();
        $this->password = "AA123";
        // $this->fill([
        //     'inputs' => collect([['phone' => '', 'phone_type' => '']]),

        // ]);







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

                ]);


                $this->user->name = $this->Name;
                $this->user->email = $this->email;
                $this->user->role = $role;
                $this->user->subject_id = $this->subject;
                $this->user->level_id = $this->level;
                $this->user->nationality = $this->nationality;
                $this->user->gender = $this->gender;
                $this->user->save();
                $this->alert('success','Successfully updated!');
                


                break;

            case 'librarian':
                # librarian
                $this->validate([
                    'Name' => 'required|string',
                    'email' => 'required|email',
                    'nationality' => 'required|string',
                    'gender' => 'required|string',
                    
                ]);

                $this->user->name = $this->Name;
                $this->user->email = $this->email;
                $this->user->role = $role;
                $this->user->nationality = $this->nationality;
                $this->user->gender = $this->gender;
                $this->user->save();
                $this->alert('success','Successfully updated!');

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

                ]);

                $this->user->name = $this->Name;
                $this->user->email = $this->email;
                $this->user->role = $role;
                $this->user->nationality = $this->nationality;
                $this->user->gender = $this->gender;
                $this->user->dob = $this->date_of_birth;
                $this->user->medical_issues = $this->medical_issues;
                $this->user->save();
                $this->alert('success', 'successfully updated');

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
                    
                    'occupation' => 'required|string',
                    'address' => 'required|string'
                ]);

               
                $this->user->name = $this->Name;
                $this->user->email = $this->email;
                $this->user->role = $role;
                $this->user->nationality = $this->nationality;
                $this->user->gender = $this->gender;
                $this->user->address = $this->address;
                $this->user->occupation = $this->occupation;
                $this->user->save();
                $this->alert('success', 'successfully added ');

                break;

            default:
                # code...
                break;
        }
    }


    public function display()
    {
        switch ($this->user->role) {
            case 'teacher':
                # teacher
            
                $this->Name = $this->user->name;
                $this->email = $this->user->email;
                // $this->role = $role;
                $this->subject = $this->user->subject_id;
                $this->level = $this->user->level_id;
                $this->nationality = $this->user->nationality;
                $this->gender = $this->user->gender;
                // $this->password = Hash::make($this->password);

                break;

            case 'librarian':
                // # librarian
                

               
                $this->Name = $this->user->Name;
                $this->email = $this->user->email;
                // $u->role = $role;
                $this->nationality = $this->user->nationality;
                $this->gender = $this->user->gender;

                

                break;

            case 'student':
                # student form


                $this->Name =  $this->user->name;
                $this->email = $this->user->email;
                $this->nationality = $this->user->nationality;
                $this->gender = $this->user->gender;
                $this->date_of_birth = $this->user->dob;
                $this->medical_issues = $this->user->medical_issues;
                // dd($this->user->mobiles);
                $this->numbers = Mobile::where('user_id', $this->user->id)->get();

                break;
            case 'guardian':

                $this->Name = $this->user->name;
                $this->email = $this->user->email;
                // $this->role = $role;
                $this->nationality = $this->user->nationality;
                $this->gender = $this->user->gender;
                $this->address = $this->user->address;
                $this->occupation = $this->user->occupation;
                $this->children = StudentParent::where('parent_id',$this->user->id)->get();
 
                break;

            default:
                # code...
                break;
        }
    }



    public function render()
    {
        $this->display();
        $this->numbers = Mobile::where('user_id', $this->user->id)->get();
        return view('livewire.users.livewire-user-edit');
    }
}
