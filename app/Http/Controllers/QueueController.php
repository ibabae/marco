<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Enqueue\AmqpBunny\AmqpContext;
use Interop\Amqp\AmqpQueue;
use Interop\Amqp\AmqpTopic;
use Enqueue\AmqpBunny\AmqpConnectionFactory;



class QueueController extends Controller
{
    // public function __construct(
    //     protected AmqpContext $context,
    // ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // $factory = new AmqpConnectionFactory();

            $factory = new AmqpConnectionFactory([
                'host' => 'localhost',
                'port' => 5672,
                'vhost' => '/',
                'user' => 'rabbit',
                'pass' => 'rabbit1234',
                'persisted' => false,
            ]);

            $context = $factory->createContext();

            $topic = $context->createTopic('first_topic');
            $topic->setType(AmqpTopic::TYPE_FANOUT);
            $context->declareTopic($topic);

            $message = $context->createMessage('Hello world!');
            $context->createProducer()->send($topic, $message);

            return response()->json(['message' => 'Message sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        // $data = [
        //     'phone' => '9123456789'
        // ];
        // $this->dispatch(new TestQueue($data));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
