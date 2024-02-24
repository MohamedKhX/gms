<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    public ?User $selectedUser;

    #[Validate('required')]
    public string $message = '';

    public $lastMessageId;

    public function mount()
    {
        $this->selectedUser = $this->getReceivers()->first();
    }

    public function getReceivers()
    {
        if(auth()->user()->trainee) {
            return auth()->user()->trainee->privateCoaches();
        }

        return auth()->user()->coach->trainees();
    }

    public function selectCoach($coachId): void
    {
        $coach = User::find($coachId);

        $this->selectedUser = $coach;
    }

    public function sendMessage(): void
    {
        $this->validate();

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->selectedUser->id,
            'body' => $this->message,
        ]);

        $this->message = '';

        $this->dispatch('message-sent');

        event(new \App\Events\MessageSent($message));
    }

    public function render()
    {
        if(isset($this->selectedUser)) {
            $messages = Message::getMessagesFor($this->selectedUser, auth()->user());

            if($messages->count() > 0) {
                if($this->lastMessageId !== $messages->last()->id) {
                    $this->dispatch('message-sent');
                }
                $this->lastMessageId = $messages->last()->id;
            }
        }


        return view('livewire.chat', [
            'messages' => $messages ?? [],
            'receivers' => $this->getReceivers(),
        ]);
    }
}
