<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use App\Models\GameGenre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    //
    public function index(){

        $curryear=Carbon::now()->format('Y');
        if (auth()->check()==true) {

            $year=auth()->user()->DOB;
            $year= Carbon::createFromFormat('Y-m-d',$year)->format('Y');
        }else {
            $year=100;
        }
        $data = Game::where('PEGI_rating','<=',$curryear-$year)->paginate(10);
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

            return view('home',compact('data', 'cartdata'));
        }else {
            return view('home', compact('data'));
        }
    }
    public function profile(){
        $data = Auth::user();
        $nav = Auth::user();
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

            return view('profile',compact('data', 'cartdata'));
        }else {
            return view('profile', compact('data'));
        }
    }
    public function search(Request $request)
    {


        $searchKeyword = $request->keyword;

        $data = Game::join('game_genres', 'games.genre', '=', 'game_genres.id')
        ->select('games.*')
        ->where('games.title', 'LIKE', "%$searchKeyword%")
        ->orWhere('game_genres.genre', 'LIKE', "%$searchKeyword%")->paginate(10);
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
            return view('home', compact('data', 'cartdata'));
        }else {
            return view('home', compact('data'));
        }

    }
    public function managegame(){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data=Game::all();
        return view('managegame',compact('data', 'cartdata'));
    }
    public function insertPage(){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data=GameGenre::all();
        return view('insert',compact('data', 'cartdata'));
    }
    public function insert(Request $request)
    {

        $new = GameGenre::where('genre','=',$request->genre)->first();

        if($new==null){
            $data = $request->validate([
                'title' => 'required',
                'photo' => 'mimes:jpg,jpeg,png',
                'desc' => 'required',
                'newGenre'=> 'required|unique:App\Models\GameGenre,genre',
                'price' => 'required|numeric|gte:0',
                'PEGI_rating' => 'required'
            ]);
            $genre=new GameGenre();
            $genre->genre= $data['newGenre'];
            $genre->save();


            // $game_genre = DB::table('game_genres')->count()+1;
            $game_genre = GameGenre::where('genre','=', $data['newGenre'])->first();

        }else {
            # code...

            $data = $request->validate([
            'title' => 'required',
            'photo' => 'mimes:jpg,jpeg,png',
            'desc' => 'required',
            'price' => 'required|numeric|gte:0',
            'genre' =>'required',
            'PEGI_rating'=> 'required'
        ]);

            $game_genre = GameGenre::where('genre', '=', $data['genre'])->first();
        }
        $file = $request->file('photo');
        $imagess=$file;
        if($file!=null){
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/images/', $file, $imageName);
        $imagess = 'images/' . $imageName;
        }
        Game::create([
                'title' => $data['title'],
                'image' => $imagess,
                'desc' => $data['desc'],
                'genre' => $game_genre['id'],
                'price' => $data['price'],
                'PEGI_rating' => $data['PEGI_rating']
            ]);



        return redirect('/');
    }
    public function updatePage($id){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data = Game::where('id', $id)->first();
        $data2 = GameGenre::all();
        return view('updategame',compact('data', 'data2', 'cartdata'));
    }
    public function update(Request $request,$id){
        $new = GameGenre::where('genre', '=', $request->genre)->first();
        if ($new == null) {
            $data = $request->validate([
                'title' => 'required',
                'photo' => 'mimes:jpg,jpeg,png',
                'desc' => 'required',
                'newGenre' => 'required|unique:App\Models\GameGenre,genre',
                'price' => 'required|numeric|gte:0',
                'PEGI_rating' => 'required'
            ]);
            $genre = new GameGenre();
            $genre->genre = $data['newGenre'];
            $genre->save();
            // $game_genre = DB::table('game_genres')->count()+1;
            $game_genre = GameGenre::where('genre', '=', $data['newGenre'])->first();
        } else {
            # code...

            $data = $request->validate([
                'title' => 'required',
                'photo' => 'mimes:jpg,jpeg,png',
                'desc' => 'required',
                'price' => 'required|numeric|gte:0',
                'genre' => 'required',
                'PEGI_rating' => 'required'
            ]);

            $game_genre = GameGenre::where('genre', '=', $data['genre'])->first();
        }
        $currGame = Game::where('id','=', $id)->first();

        // $file = $request->file('photo');
        if ($request->hasFile('photo')) {

            $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            Storage::putFileAs('public/images/', $request->file('photo'), $imageName);
            $imageName = 'images/' . $imageName;
            $currGame->image =$imageName;
        }
        $currGame->title = $data['title'];
        $currGame->desc = $data['desc'];
        $currGame->price = $data['price'];
        $currGame->genre = $game_genre['id'];
        $currGame->PEGI_rating = $data['PEGI_rating'];
        $currGame->save();
        return redirect('/');
    }

    public function delete($id){

        Game::find($id)->delete();
        return redirect()->back();
    }
    public function managegenre(){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data=GameGenre::all();
        return view('managegenre',compact('data', 'cartdata'));
    }
    public function updategenrePage($id){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

       $data=GameGenre::find($id);
       $genre=GameGenre::all();
        return view('updategenre',compact('data','genre', 'cartdata'));
    }
    public function updategenre(Request $request, $id){

        $rules=[
            'genre'=> 'required|unique:App\Models\GameGenre,genre'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }
        $currgenre = GameGenre::find($id);
        $currgenre->genre=$request->genre;
        $currgenre->save();
        return redirect('/');
    }
    public function details($id){
        $data = Game::find($id);
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
            return view('details',compact('data', 'cartdata'));
        }else {
            return view('details', compact('data'));
        }
    }
}
