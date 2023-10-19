<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use App\Models\AcademicYear;
use App\Models\BookBorrow;
use App\Models\BorrowSession;
use App\Models\Classroom;
use App\Models\ClassRoomType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use PDO;

class LivewireBooks extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $addmodal = false;
    public $editmodal = false;
    public $borrowmodal = false;
    public $folder = 'all';
    public $classes = [];
    public $terms = [];
    public $years = [];
    public $year;
    public $bookid;
    public $bookcollection = [];
    public $studentcollection = [];
    protected $queryString = ['search'];
    public $search;
    public $booksearch;
    public $selectedStudent;
    public $studentsearch;
    public $studentsearchlist_status = false;
    public $booksearchlist;
    public Collection $bookcart;
    // form
    public $class, $term = "all", $author, $isbn, $title, $price;
    public $number_of_days, $return_date, $borrow_date;


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



    public function switch($folder)
    {

        $this->folder = $folder;
    }

    public function create()
    {
        $this->addmodal = true;
    }

    public function updatedBooksearch()
    {
        if (!empty($this->booksearch)) {
            $this->bookcollection = Book::where('title', 'Like', '%' . $this->booksearch . '%' ?? '%' . '' . '%')
                ->orWhere('author', 'Like', '%' . $this->booksearch . '%' ?? '%' . '' . '%')
                ->orWhere('isbn', 'Like', '%' . $this->booksearch . '%' ?? '%' . '' . '%')->limit(5)->get();
            $this->booksearchlist = true;
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

    public function selectbook($item)
    {


        $book = Book::find($item);
        // dd($book, $this->bookcart->count());
        if ($book->status == 'available') {

            if ($this->bookcart->count()) {

                $this->bookcart->push(['id' => $book['id'], 'title' => $book->title]);
                $this->booksearch = "";
                $this->booksearchlist = false;
            } else {
                foreach ($this->bookcart as $item) {

                    if ($item['id']  == $book->id) {
                        $this->alert('error', 'Book already to added to cart!');
                    } else {
                        $this->bookcart->push(['id' => $book['id'], 'title' => $book->title]);


                        $this->booksearch = "";
                        $this->booksearchlist = false;
                    }
                }
            }
        } else {
            $this->alert('error', 'Book has been borrowed!');
        }
    }


    public function selectstudent($id)
    {
        $this->selectedStudent =  User::find($id);
        $this->studentsearch = "";
        $this->studentsearchlist_status = false;
    }

    public function edit($id)
    {
        $this->editmodal = true;
        $this->bookid = $id;
        $t = Book::find($id);
        $this->isbn = $t->isbn;
        $this->title = $t->title;
        $this->author = $t->author;
        $this->price = $t->price;
    }

    public function borrow()
    {
        $this->borrowmodal = true;
    }

    public function cancel()
    {
        $this->reset(['addmodal', 'editmodal', 'borrowmodal', 'title', 'term', 'isbn', 'price', 'year', 'author', 'bookid', 'selectedStudent', 'number_of_days', 'return_date', 'borrow_date']);
    }

    public function update()
    {
        $b = Book::find($this->bookid);
        $b->title = $this->title;
        $b->isbn = $this->isbn;
        $b->author = $this->author;
        $b->price = $this->price;
        $b->save();

        $this->cancel();
        $this->alert('success', 'successfully Update');
    }

    public function add_book_session()
    {
        if ($this->selectedStudent == null) {
            $this->addError('selectedStudent', 'Please search and select student!');
        } else {
            $this->resetErrorBag();
            $this->validate([
                'number_of_days' => 'required|numeric|min:1',
                'return_date' => 'required|date_format:Y-m-d|date',
                'borrow_date' => 'required|date_format:Y-m-d|date',
            ]);
            if ($this->bookcart->count() < 1) {
                $this->alert('error', 'Book Cart Empty!');
            } else {
                $bs = new BorrowSession();
                $bs->start_date = $this->borrow_date;
                $bs->end_date = $this->return_date;
                $bs->number_of_days = $this->number_of_days;
                $bs->student_id = $this->selectedStudent->id;
                $bs->librarian_id = Auth::user()->id;
                $bs->save();


                foreach ($this->bookcart as $index => $item) {
                    // dd($item['id']);
                    $bb = new BookBorrow();;
                    $bb->book_id = $item['id'];
                    $bb->borrow_session_id = $bs->id;
                    $bb->librarian_id = Auth::user()->id;
                    $bb->save();
                    $b = Book::find($item['id']);
                    $b->status = 'borrowed';
                    $b->save();
                    $this->bookcart->pull($index);
                }
                $this->cancel();
                $this->alert('success', 'Successfull!');
            }
        }
    }



    public function mount()
    {
        $this->fill([
            'bookcart' => collect([]),
        ]);

        $this->borrow_date = Carbon::today()->format("Y-m-d");
        $this->number_of_days = 0;
        // $this->return_date = Carbon::today()->addDays($this->number_of_days)->format('Y-m-d');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string',
            'price' => 'required|numeric'

        ]);
        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'isbn' => $this->isbn,
            'price' => $this->price,

        ]);

        $this->cancel();
        $this->alert('success', 'successfully added');
    }


    public function remove_book($index)
    {
        $this->bookcart->pull($index);
        $this->alert('success', 'Successful remove!');
    }



    public function render()
    {
        $books = Book::where('title', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->orWhere('author', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->orWhere('isbn', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
            ->paginate();
        $borrowed_sessions = BorrowSession::all();
        $lost_books = Book::where('status','lost')->get();
        return view('livewire.books.livewire-books')->with('books', $books)->with('borrowed_sessions', $borrowed_sessions)->with('lost_books',$lost_books);
    }
}
