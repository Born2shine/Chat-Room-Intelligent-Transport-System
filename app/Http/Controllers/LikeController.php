<?php

namespace App\Http\Controllers;

use App\MOdel\Like;
use App\MOdel\Reply;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    public function LikeIt(Reply $reply)
    {
        $reply->like()->create([
            //'user_id' => auth()->id
            'user_id' => '1'
        ]);
        
        return response('Liked', Response::HTTP_CREATED);

    }

    
    public function unLikeIt(Reply $reply)
    {
        //$reply->like()->where(['user_id',auth()->id])->first()->delete();
        $reply->like()->where('user_id','1')->first()->delete();
        return response('Dislike', Response::HTTP_NO_CONTENT);

    }
}
