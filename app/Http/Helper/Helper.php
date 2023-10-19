<?php

namespace App\Http\Helper;

use App\Models\Book;

Class Helper {

    
    public static function getBookDetails($id){
       return  Book::find($id);
    }

}