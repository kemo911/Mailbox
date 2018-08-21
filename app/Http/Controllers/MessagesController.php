<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MessagesController extends Controller
{
    public function getMessages(){
        $messages = Message::selectRaw('uid , sender , subject , message , time_sent , 
        CASE WHEN Messages.archived = 0 then "Unarchived" else "Archived" END as "archived",
        CASE WHEN Messages.read = 0 then "Unread" else "Read" END as "read"')
            ->jsonPaginate();
        if(count($messages) > 0) {
            $response = ['messages' => $messages];
        }else{
            $response = ['Alert' => "There is no Messages"];
        }

        return response()->json($response,200);
    }

    public function getArchivedMessages(){
        $messages = Message::selectRaw('uid , sender , subject , message , time_sent , 
        CASE WHEN Messages.archived = 0 then "Unarchived" else "Archived" END as "archived",
        CASE WHEN Messages.read = 0 then "Unread" else "Read" END as "read"')
            ->where('archived','=','1')->jsonPaginate();
        if(count($messages) > 0) {
            $response = ['messages' => $messages];
        }else{
            $response = ['Alert' => "There is no Messages"];
        }
        return response()->json($response,200);
    }

    public function showMessage(){
        $id = Input::get('id');
        $message = DB::table('Messages')
            ->select(
                DB::raw('CASE WHEN Messages.archived = 0 then "Unarchived" else "Archived" END as "archived"'),
                DB::raw('CASE WHEN Messages.read = 0 then "Unread" else "Read" END as "read"'))
            ->where('uid','=',$id)
            ->get();
        if(count($message) > 0) {
            $response = ['message' => $message];
        }else{
            $response = ['Alert' => "Message Not Found"];
        }
        //$response = ['message'=>$message];
        return response()->json($response,200);
    }

    public function readMessage(){
        $id = Input::get('id');
        $message = DB::table('Messages')
            ->select('uid','sender','subject','message','time_sent')
            ->where('uid','=',$id)
            ->get();

        Message::where('uid',$id)->update(['read' => 1]);


        if(count($message) > 0) {
            $response = ['message' => $message];
        }else{
            $response = ['Alert' => "Message Not Found"];
        }
        return response()->json($response,200);
    }

    public function archiveMessage(){
        $id = Input::get('id');
        $check_exist = Message::where('uid',$id);
        if(count($check_exist) > 0){
            Message::where('uid',$id)->update(['archived' => 1]);
            $response = ['Alert' => "Message Archived"];
        }else{
            $response = ['Alert' => "Message Not Found"];
        }
        return response()->json($response,201);
    }
}
