<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mongouser;
use App\Models\User;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MongoDB\Client;
use MongoDB\BSON\ObjectId;
use Carbon\Carbon;




class MongoController extends Controller {

    private function getMongoCollection($collectionName = 'messages') {
        //Create MongoDB Collection
        $mongoDsn = env('MONGO_DSN'); 
        $databaseName = 'forum';  
        $client = new \MongoDB\Client($mongoDsn);
        return $client->selectDatabase($databaseName)->selectCollection($collectionName);
    }

    private function isoNow(): string {
        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $mongoDate = new \MongoDB\BSON\UTCDateTime($now->getTimestamp() * 1000);
        return $mongoDate->toDateTime()->format('Y-m-d\TH:i:s\Z');
    }


    public function index(){
        //get Client
        $collection = $this->getMongoCollection();

        //Filtering
        $userId = Auth::id(); 
        $cursor = $collection->find(
            ['participants' => $userId],
            ['sort' => ['last_updated' => -1]]
        );
        $messages = iterator_to_array($cursor);

         
        foreach ($messages as &$message) {
            $participants = $message['participants_name'];
            $otherIndex = $participants[0] === 0 ? 1 : 0;
            $message['chatPartner'] = $participants[$otherIndex];
        }

        return view('nachrichten.index', compact('messages'));
    }


    public function show(){
        //Create MongoDB Collection
        $collection = $this->getMongoCollection();
    }

    public function create(Request $request){
        $authUser = Auth::user();

        $data = $request->validate([
            'sendto' =>['required', 'integer'],
            'message' => ['required', 'max:1000', 'string'],
        ]);


        $sendUsername = User::where('id', $data['sendto'])->first();


        $collection = $this->getMongoCollection();

        $conversationExists = $collection->findOne(['conversation_id' => $authUser->id . '_' . $sendUsername->id]);

        if(!$conversationExists){
            $collection->insertOne([
                '_id' => new \MongoDB\BSON\ObjectId(),
                'conversation_id' => $authUser->id . '_' . $sendUsername->id,
                'participants' => [$authUser->id, (int)$data['sendto']],
                'participants_name'=> [$authUser->name, $sendUsername->name],
                'messages' => [
                    [
                        'sender' => (int)$authUser->id,
                        'text' => $data['message'],
                        'timestamp' => $this->isoNow()
                    ]
                ],
                'last_updated' => $this->isoNow(),
                'unread_count' => []
            ]);
        }
    }


    public function store(Request $request, $id){

        $collection = $this->getMongoCollection();


        //Create Data
        $data = $request->validate([
            'comment' => ['required', 'max:1000', 'string'],
            'objIDchat' => ['required', 'size:24', 'string']             // sieze:24 Trick (eine gültige Mongo ID hat genau 24 chars)  
        ]);


        try {
            $objIDchat = new ObjectId($data['objIDchat']);              // try/catch weil beim erstellen fehler passieren können. nicht wegen async.
        } catch  (\Exception $e) {
            return response()->json(['error' => 'invalid dataformat'], 400);
        }

        $newMessage = [
            'sender' => (int)$id,
            'text' => $data['comment'],
            'timestamp' => $this->isoNow(),
        ];

        //DB update
        $dbUpdate = $collection->updateOne(
            ['_id' => $objIDchat], 
            [
                '$push' => ['messages' => $newMessage], 
                '$set' => ['last_updated' => $this->isoNow()]
            ]
        );

        if($dbUpdate->getModifiedCount() === 0){
            return response()->json([
                'message' => 'DB update failed',
                'status' => 400,
            ]);
        }  

        //Response
        return response()->json([
            'message' => 'Message added successfully',
            'status' => 200,
            'data' => $newMessage
        ]);
    }

    
    public function poll(Request $request) {
        $curUser = Auth::id();
        $collection = $this->getMongoCollection();
        $chats = $collection->find(['participants' => $curUser]);

        $messagesData = [];

        foreach ($chats as $chat) {
            if (isset($chat['messages'])) {
                foreach ($chat['messages'] as $message) {
                    $messagesData[] = [
                        'timestamp' => $message->timestamp,
                        'sender' => $message->sender
                    ];
                }
            }
        }

        return response()->json([
            'messages' => $messagesData
        ]);
    }



    //wird nicht gebruacht, lösung mit PHP Block in Blade
    public function getChatPartner(Request $request){
        //Create MongoDB Collection
        $collection = $this->getMongoCollection();
    
    
        //Filtering
        $userId = Auth::id(); 
        $cursor = $collection->find(['participants' => $userId]);
        $messages = iterator_to_array($cursor);
    
        foreach ($messages as &$message) {
            $participants = $message['participants_name'];
            $otherIndex = $participants[0] === Auth::user()->name ? 1 : 0;
            $message['chatPartner'] = $participants[$otherIndex];
        }
    
    
        //Response
        return response()->json($messages);
    }
}