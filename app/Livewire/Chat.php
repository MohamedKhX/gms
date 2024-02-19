<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    public User $selectedCoach;

    #[Validate('required')]
    public string $message = '';

    public $queryString = ['selectedCoach'];

    public function mount()
    {
        $this->selectedCoach = User::where('type', 'coach')->first();
    }

    public function selectCoach($coachId): void
    {
        $coach = User::find($coachId);

        $this->selectedCoach = $coach;
    }

    public function sendMessage(): void
    {
        $this->validate();

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->selectedCoach->id,
            'body' => $this->message,
        ]);

        $this->message = '';

        $this->dispatch('message-sent');

    }

    public function render()
    {
        return view('livewire.chat', [
            'messages' => Message::getMessagesFor($this->selectedCoach, auth()->user()),
            'coaches' => User::where('type', 'coach')->get(),
        ]);
    }
}
