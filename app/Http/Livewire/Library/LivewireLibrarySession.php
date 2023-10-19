<?php

namespace App\Http\Livewire\Library;

use App\Models\Book;
use App\Models\BookBorrow;
use App\Models\BorrowSession;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LivewireLibrarySession extends Component
{
    use LivewireAlert;
    protected $listeners = [
        'change_student'
    ];
    public $booksearch;
    public $selectedStudent;
    public $selectedSession;
    public $studentsearch;
    public $studentsearchlist_status = false;
    public $booksearchlist;
    public $student;
    public $borrow_session;
    public $borrow_session_id;
    public $books_borrowed;
    public $studentcollection = [];
    public $bookcollection = [];
    // public $books_borrowed;

    public $number_of_days, $return_date, $borrow_date;

    public function updatedBooksearch()
    {
        if (!empty($this->booksearch)) {
            $this->bookcollection = Book::where('title', 'Like', '%' . $this->booksearch . '%' ?? '%' . '' . '%')
                ->orWhere('author', 'Like', '%' . $this->booksearch . '%' ?? '%' . '' . '%')
                ->orWhere('isbn', 'Like', '%' . $this->booksearch . '%' ?? '%' . '' . '%')->limit(5)->get();
            $this->booksearchlist = true;
        }
    }

    public function add_book_session()
    {

        
        $this->validate([
            'number_of_days' => 'required|numeric|min:1',
            'return_date' => 'required|date_format:Y-m-d|date',
            'borrow_date' => 'required|date_format:Y-m-d|date',
        ]);
        $count = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get()->count();
        if ($count > 0) {

            $bs = BorrowSession::find($this->borrow_session_id);
            $bs->start_date = $this->borrow_date;
            $bs->end_date = $this->return_date;
            $bs->number_of_days = $this->number_of_days;
            
            $bs->librarian_id = Auth::user()->id;
            $bs->save();
            $this->update();
            $this->alert('success', 'Successfull!');
        } else {
            $this->alert('error', 'Book cart empty!');
        }
    }


    public function remove_book($id)
    {
        $bb = BookBorrow::find($id);
        if ($bb->status == 'returned'|| $bb->status == 'borrowed') {
            $b = Book::find($bb->book_id );
            $b->status = 'available';
            $b->save();
            $bb->delete();
            $this->update();
            $this->alert('success', 'Book removed');
        } else {
            $this->alert('warning', 'Book not returned');
        }
    }


    public function add_book($id)
    {

        $b = Book::find($id);
        if ($b->status == 'available') {
            $bb = new BookBorrow();
            $bb->borrow_session_id = $this->borrow_session_id;
            $bb->book_id = $id;
            $bb->librarian_id = Auth::user()->id;
            $b->status = 'borrowed';
            $b->save();
            $bb->save();
            
            
            $this->booksearch ="";
            $this->booksearchlist=false;
            $this->update();
            $this->alert('success', 'Book Added!');
        } else {
            $this->alert('error', 'Book not available!');
        }
    }



    public function selectstudent($id)
    {
        $this->selectedSession = BorrowSession::find($this->borrow_session_id);
        $this->selectedStudent = $id;
        // dd($this->selectedStudent);
        $this->alert(
            'question',
            'Are you sure You want to change the student',
            [
                'showConfirmButton' => true,
                'width' => 600,
                'confirmButtonText' => 'Change',
                'position' => 'center',
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancel',
                'onConfirmed' => 'change_student',
                'allowOutsideClick' => false,
                'timer' => null
            ]
        );
    }
    public function change_student()
    {

        $bs = BorrowSession::find($this->selectedSession->id);
        $bs->student_id = $this->selectedStudent;
        $bs->save();
        $this->studentsearchlist_status = false;
        $this->update();
        $this->alert('success', 'Success changed student');
    }


public function checkstatus(){
    $total =BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get();
    $totallost =BookBorrow::where('borrow_session_id', $this->borrow_session_id)->where('status','lost')->get();
    $totalreturned =BookBorrow::where('borrow_session_id', $this->borrow_session_id)->where('status','returned')->get();
    $totalborrowed =BookBorrow::where('borrow_session_id', $this->borrow_session_id)->where('status','borrowed')->get();

    // if($total == $totallost)


}


    public function return_book($id = null)
    {
        if ($id == null) {
            $bb = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get();
            foreach ($bb as $item) {
                $bb = BookBorrow::find($item->id);
                $bb->status = 'returned';
                $bb->save();
                $b = book::find($item->book_id);
                $b->status = 'available';
                $b->save();
            }
            $borrow_session = BorrowSession::find($this->borrow_session_id);
            $borrow_session->status = 'returned';
            $borrow_session->save();
            $this->update();
            $this->alert('success', 'successfull!');
        } else {
            $bb = BookBorrow::find($id);
            $bb->status = 'returned';
            $bb->save();
            $b = Book::find($bb->book_id);
            $b->status = 'available';
            $b->save();
            $this->update();
            $this->alert('success', 'successfull!');
            $countreturn = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->where('status', 'returned')->get()->count();
            $count = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get()->count();
            // dd($count,$countreturn);
            if ($count == $countreturn) {
                $bs = BorrowSession::find($this->borrow_session_id);
                $bs->status = 'returned';
                $bs->save();
                $this->alert('success', 'successfull!');
            } else {
                $bs = BorrowSession::find($this->borrow_session_id);
                $bs->status = 'partial returned';
                $bs->save();
                $this->alert('success', 'successfull!');
            }
        }
    }

    public function lost_book($id = null)
    {
        if ($id == null) {
            $bb = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get();
            foreach ($bb as $item) {
                $bb = BookBorrow::find($item->id);
                $bb->status = 'lost';
                $bb->save();
                $b = book::find($item->book_id);
                $b->status = 'lost';
                $b->save();
            }
            $borrow_session = BorrowSession::find($this->borrow_session_id);
            $borrow_session->status = 'lost';
            $borrow_session->save();
            $this->update();
            $this->alert('success', 'successfull!');
        } else {
            $bb = BookBorrow::find($id);
            $bb->status = 'lost';
            $bb->save();
            $b = Book::find($bb->book_id);
            $b->status = 'lost';
            $b->save();
            $this->update();
            $this->alert('success', 'successfull!');
            $countlost = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->where('status', 'lost')->get()->count();
            $count = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get()->count();
            // dd($bing)
            if ($count == $countlost) {
                $bs = BorrowSession::find($this->borrow_session_id);
                $bs->status = 'lost';
                $bs->save();
                $this->alert('success', 'successfull!');
            } else {
                $bs = BorrowSession::find($this->borrow_session_id);
                $bs->status = 'partial returned';
                $bs->save();
                $this->alert('success', 'successfull!');
            }
        }
    }

    public function updatedStudentsearch()
    {
        if (!empty($this->studentsearch)) {
            $this->studentcollection = User::where('role', 'student')
                ->Where('name', 'Like', '%' . $this->studentsearch . '%' ?? '%' . '' . '%')
                // ->orWhere('email', 'Like', '%' . $this->studentsearch . '%' ?? '%' . '' . '%')
                ->limit(5)->get();
            $this->studentsearchlist_status = true;
        } else {
            $this->studentsearchlist_status = false;
        }
    }


    public function mount($id)
    {
        $this->borrow_session_id = $id;
        $this->borrow_session = BorrowSession::find($id);
        $this->student = User::find($this->borrow_session->student_id);
        $this->books_borrowed = BookBorrow::where('borrow_session_id', $id)->get();
        $this->number_of_days = $this->borrow_session->number_of_days;
        $this->return_date = $this->borrow_session->end_date;
        $this->borrow_date = $this->borrow_session->start_date;
        $this->number_of_days = $this->borrow_session->number_of_days;
    }
    public function update()
    {
        $this->borrow_session = BorrowSession::find($this->borrow_session_id);
        $this->student = User::find($this->borrow_session->student_id);
        $this->books_borrowed = BookBorrow::where('borrow_session_id', $this->borrow_session_id)->get();
        $this->number_of_days = $this->borrow_session->number_of_days;
        $this->return_date = $this->borrow_session->end_date;
        $this->borrow_date = $this->borrow_session->start_date;
    }

    public function updatedNumberOfDays()
    {


        $this->validate(['number_of_days' => 'numeric|min:1']);
        $today = Carbon::today();
        $return_date = $today->addDays($this->number_of_days)->format('Y-m-d');
        // dd($return_date);
        $isweekend = Carbon::parse($return_date)->isWeekend();
        if ($isweekend) {
            $this->addError('number_of_days', 'Return date is a weekend!');
            $this->alert('error', 'Return date is a weekend!');
        } else {
            $this->return_date =  $return_date;
        }
    }


    public function render()
    {
        // $this->update();
        // dd($this);
        return view('livewire.library.livewire-library-session');
    }
}
