<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use App\Models\Chat;
use App\Models\Consultation;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ChatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;
        
        $this->expired();

        if($user->role_id == 2)
        {
            $payments = Payment::where('user_id', $user->id)->where('status', 'paid')->get();
    
            $consultations = [];
            foreach ($payments as $payment) {
                $consultation = Consultation::where('id', $payment->consultation_id)->first();
                array_push($consultations, $consultation);
            }
    
            $doctors = [];
            foreach ($consultations as $consultation) {
                $doctor = User::where('id', $consultation->dokter_id)->first();
                array_push($doctors, $doctor);
            }
        }
        else if ($user->role_id == 1)
        {
            $doctor = User::with('consultations')->where('id', $userId)->first();
            $consultations = $doctor->consultations;
            $doctors = [];
            $payments = Payment::where('consultation_id', $consultations->id)->where('status', 'paid')->get();
            foreach ($payments as $payment)
            {
                $user = User::where('id', $payment->user_id)->first();
                array_push($doctors, $user);
            }
            // $doctors = User::join('chats', 'users.id', '=', 'chats.sender_id')
            //             ->where(function ($query) use ($userId) {
            //                 $query->where('chats.sender_id', $userId) 
            //                     ->orWhere('chats.receiver_id', $userId); 
            //             })
            //             ->where('users.id', '<>', $userId) 
            //             ->select('users.*')
            //             ->distinct()
            //             ->get();
        }
        
    
        return response()->json([
            'success' => true,
            'message' => 'List Dokter',
            'code' => 200,
            'data'=> $doctors,
            'me' => $userId,
        ]);
    }

    public function expired()
    {
        $payments = Payment::all();
        foreach ($payments as $payment) {
            if ($payment->expired_date < date('Y-m-d H:i:s')) {
                $payment->delete();
            }
        }
    }

    public function myChat($dokter_id)
    {
        // get chat data where sender_id = auth()->user()->id and receiver_id = dokter_id order or where sender_id = dokter_id and receiver_id = auth()->user()->id by created_at asc

        $chats = Chat::where('sender_id', auth()->user()->id)->where('receiver_id', $dokter_id)->orWhere('sender_id', $dokter_id)->where('receiver_id', auth()->user()->id)->orderBy('created_at', 'asc')->get();


        // return chats as json
        return response()->json([
            "success" => true,
            "message" => "List Chat",
            "code" => 200,
            "data" => $chats
        ]);
    }

    public function store(Request $request, $dokter_id)
    {

        $data = $request->validate([
            'message' => 'required'
        ]);

        // dd($request->all());

        $chat = Chat::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $dokter_id,
            'message' => $request->message,
        ]);

        // dd($chat);

        return response()->json([
            'success'=> true,
            'message'=> 'Chat Sent',
            'code'=> 200,
            'data' => $chat
        ]);

        // return view('chat.index');
    }

    public function sendNotification(Request $request)
    {
        try {
            $data = $request->validate([
                'message' => 'required'
            ]);

            event(new MessageNotification($request->message, $request->pesan));
            return response()->json([
                'success' => true,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all()
            ], 422); 
        }
    }

    public function senderReceiver()
    {
        $sender = auth()->user()->id;
        // get all receiver_id that have chat with sender_id = auth()->user()->id
        $receiver = User::join('chats', 'users.id', '=', 'chats.receiver_id')
                    ->where('chats.sender_id', $sender)
                    ->select('users.*')
                    ->distinct()
                    ->get();
    
        return response()->json([
            'success'=> true,
            'sender'=> $sender,
            'receiver'=> $receiver
        ]);
    }

    public function show($id)
    {
        $dokter = User::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Dokter',
            'code' => 200,
            'data' => $dokter
        ]);
    }
}
