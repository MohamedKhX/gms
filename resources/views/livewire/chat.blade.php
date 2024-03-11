<div class="" wire:poll.delay.100ms>
    @if($receivers->isEmpty())
        <div class="flex items-center justify-center h-96">
            <div class="flex flex-col items-center justify-center gap-4">
                @if(\Filament\Facades\Filament::getCurrentPanel()->getId() == 'coach')
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">لا يوجد متدربين</h5>
                @else
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">لا يوجد لديك مدرب خاص في الباقة التي قمت بالإشتراك فيها.</h5>
                @endif
            </div>
        </div>
    @else
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-4 flex justify-center">
                <div class="w-full h-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        @if(\Filament\Facades\Filament::getCurrentPanel()->getId() == 'coach')
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">المتدربين</h5>
                        @else
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">المدربين</h5>
                        @endif

                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($receivers as $coach)
                                <li wire:click="selectCoach({{ $coach->id }})" class="cursor-pointer py-3 sm:py-4 px-5 rounded-lg flex justify-center {{ $selectedUser == $coach ? 'bg-gray-50 dark:bg-gray-600' : null }}">
                                    <div class="flex items-center w-full">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ "https://ui-avatars.com/api/?name={$coach->first_name[0]}+{$coach->last_name[0]}&color=FFFFFF&background=09090b" }}" alt="Neil image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $coach->name }}
                                            </p>
                                        </div>
                                </div>
                                </li>
                                @endforeach
                                </ul>
                            </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-8 bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg border shadow-sm">
                    <div class="min-h-96 flex flex-col justify-between p-5">
                        {{-- Strat Chat --}}
                        <div x-data="{}" @message-sent.window="scrollToBottom()" class="flex flex-col gap-2 p-5 overflow-auto" style="max-height: 30rem">
                            @forelse($messages as $message)
                                <div class="flex items-start gap-2.5">
                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese image">
                                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 {{ auth()->id() === $message->sender_id ? 'bg-blue-100' : 'bg-gray-100' }} rounded-e-xl rounded-es-xl dark:bg-gray-700" style="word-wrap: break-word;">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $message->sender->name }}
                                    </span>
                                            <span wire:ignore class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    {{ $message->created_at->diffForHumans() }}
                                </span>
                                    </div>
                                    <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                        {{ $message->body  }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 dark:text-gray-400">لا توجد رسائل</p>
                        @endforelse
                    </div>
                    {{-- End Chat --}}

                    {{-- Start Message Field --}}
                    <div>
                        <form wire:submit="sendMessage" class="flex gap-4 pt-5" action="">
                            <input wire:model="message" placeholder="اكتب رسالتك..." type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">إرسال</button>
                        </form>
                        @error('message')
                        <div class="text-danger-600 py-4">
                            <span class="error text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    {{-- End Message Field --}}
                </div>
            </div>
        </div>
    @endif

    <script>
        function scrollToBottom() {
            setTimeout(function() {
                var chatBox = document.querySelector('.overflow-auto');
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 1);
        }
        window.onload = function() {
            var chatBox = document.querySelector('.overflow-auto');
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</div>

