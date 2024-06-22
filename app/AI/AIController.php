<?php

namespace App\AI;

use Illuminate\Support\Facades\Http;

class AIController
{
    protected array $messages = [];

/*    This is for a system message which I am not sure ollama does

    public function systemMessage(string $message): static
    {
        $this->messages[] = [
            "role"=> "system",
            "content"=> $message
        ];

        return $this;
    }
*/

    public function send(string $message)
    {

        $payload = [
            "model"=> "mistral",
            "prompt"=> $message,
            "stream"=> false,
        ];


        ddd($response = Http::post('http://192.168.50.150:25568/api/generate', $payload)->json());

        if($response) {
            $this->messages[] = [
                "role"=> "assistant",
                "content"=> $response['choices'][0]['message']['content']
            ];
        }

        return $response['choices'][0]['message']['content']; 
    }

    public function reply(string $message)
    {
        return $this->send($message);
    }

    public function messages()
    {
        return $this->messages;
    }
};

//  $chat->messages()

//  $chat->send("Tell me a bedtime story.")