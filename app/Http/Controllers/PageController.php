<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Advert;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Mailer\Exception\TransportException;

use function Pest\Laravel\get;

class PageController extends Controller
{
    public function homePage()
    {
        $newArrivals = Book::latest()->take(4)->get();
        $advert=Advert::latest()->take(1)->get();
        $previousUrl= url()->previous();
        // dd($previousUrl);
        if (str_contains($previousUrl, "/login")) {
            Alert::toast('Logged in  successfully', 'success');
        }
        // if (Auth::user()) {
        //     Alert::toast('Logged in  successfully', 'success');
        // }
        if (str_contains($previousUrl, "/register")) {
            Alert::toast('Account created successfully', 'success');
        }
        if (!Auth::user()) {
            Alert::toast('You are logged out', 'warning');
        }
        return view('pages.welcome', compact('newArrivals','advert'));
    }
    public function aboutPage()
    {
        $title = "Get to Know Us - Spotlight";
        return view('pages.about', compact('title'));
    }
    public function categoriesPage()
    {
        $title = "Browse our categories - Spotlight";
        $categories = Category::all()->sortBy('title');
        return view('pages.categories', compact('title', 'categories'));
    }
    public function libraryPage()
    {
        $title = "Our Vast Library - Spotlight";
        $books = Book::latest()->paginate(8);
        $category=Category::all();
        
        return view('pages.library', compact('title', 'books', 'category'));
    }
    public function contactPage()
    {
        $title = "Get in touch with us - Spotlight";
        return view('pages.contact', compact('title'));
    }


    public function viewCategory($slug)
    {
        $category  = Category::where('slug', $slug)->firstOrFail();
        $books = Book::where('category_id', $category->id)->latest()->paginate(8);

        $title =  $category->title . ' Books - Spotlight';

        return view('pages.show-category', compact('category', 'books', 'title'));
    }
    public function advertPage()
    {
        return view('pages.advert');
    }

    public function advertCreate(Request $request)
    {
        $data = $request->validate([
            'advertTitle' => 'string|required',
            'advertDescription' => 'string|required',
            'advertCover' => 'image|required|mimes:png,jpg,jpeg|max:1024'
        ]);

        $coverFile = $request->file('advertCover');
        $coverExt = $coverFile->extension();
        $coverFileName = 'cover_name_' . time() . '_' . mt_srand() . "." . $coverExt;
        $coverFile->move('adverts/covers', $coverFileName);

        Advert::create([
            'advertTitle' => $data['advertTitle'],
            'advertDescription' => $data['advertDescription'],
            'advertCover'=>$coverFileName,
        ]);
        Alert::toast('Advert set succcessfully', 'success');
        return back();
    }

    public function viewBook($sku)
    {
        $book = Book::where('sku', $sku)->firstOrFail();

        $title =  $book->title . ' - Spotlight';

        return view('pages.show-book', compact('book', 'title'));
    }

    public function download($sku)
    {
        $book = Book::where('sku', $sku)->firstOrFail();
        $path = public_path('uploads/books/' . $book->file);


        /* The code snippet `  = explode(".", ->file);  = end();` is extracting the file
      extension from the filename stored in the `->file` property. */
        /* The code snippet `    = explode(".", ->file);` is splitting the filename stored in the
     `->file` property based on the dot (.) delimiter. The `explode()` function in PHP breaks a
     string into an array based on a specified delimiter, in this case, the dot (.) character. */
        $ext = explode(".", $book->file);


        /* ` = end();` is extracting the last element from the array `` after splitting the
        filename based on the dot (.) delimiter using the `explode()` function. This line of code
        assigns the file extension extracted from the filename to the variable ``. */
        $ext = end($ext);


        return response()->download($path, $book->title . '.' . $ext);
    }


    public function sendMessage(Request $request)
    {
        // Validate incoming data
        $data = $request->validate([
            'name' => "required|string",
            'email' => "required|string|email",
            'phone' => "required|string",
            'message' => "required|string",
        ]);
    
        try {
            // Attempt to send the email
            Mail::to('ochigbogodswill868@gmail.com')->send(new ContactMail($data));
            Alert::toast( "We will get back to you shortly",'success');
        
        } catch (TransportException $e) {
            // \Log::error('Mail Error: ' . $e->getMessage());
            Alert::toast( "Failed to send your message. Please try again later.",'error');
        
        } catch (\Exception $e) {
            // \Log::error('General Mail Error: ' . $e->getMessage());
            Alert::error('Error', "An unexpected error occurred. Please try again later.");
        }
        
        return back();
    }
    


    public function search(Request $request)
    {
        $search = $request->input('search');

        if (empty($search)) {
            Alert::toast('Please Enter a Search keyword', 'warning');
            return redirect('/');
        } else {

            $books = Book::where('title', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%");
                })
                ->with(['category'])
                ->paginate(12);
        }

// dd($search);
// var_dump($books);
        $title = "Search Result For: " . $search;
        return view('pages.search', compact('books', 'title'));
    }
}
