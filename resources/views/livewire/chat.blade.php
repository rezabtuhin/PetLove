@php
    $gap = '<div class="w-10 h-10 rounded-full flex items-center justify-center"></div>';
@endphp

<div class="h-full w-full grid grid-cols-7 border-2 border-gray-400">
    <div id="conversation_list" class="h-full col-span-2 border-r-2 border-gray-400 flex flex-col">
        <div class="p-2 px-5 flex items-center gap-3 border-b-2 border-gray-400">
            <h1 class="font-extrabold text-2xl">Chats</h1>
            <form class="w-full">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Conversation..." required />
                </div>
            </form>
        </div>
        <div class="flex-grow overflow-hidden overflow-y-auto h-96">
{{--            @php dd($detailed_conversations) @endphp--}}
            @if(!empty($detailed_conversations))
                @foreach($detailed_conversations as $dConv)
                <a href="{{ route('conversation', $dConv['slug']) }}">
                    <div class="flex items-center p-4 bg-card text-card-foreground border-b-2 border-gray-400 hover:bg-red-300">
                        @php
                            $conv_user = \App\Models\User::find($dConv['user_id']);
                        @endphp
                        <x-user-avatar :user="$conv_user" />
                        <div class="ml-4">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-lg">{{ $conv_user->name }}</span>
{{--                                <span class="text-muted-foreground text-sm">Yesterday</span>--}}
                            </div>
                            <p class="text-gray-600 truncate">{{ $dConv['content'] }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
    <div id="conversation" class="h-full col-span-5">
        @if($user)
            <div class="flex flex-col h-full">
                <div id="header" class="p-2 px-5 py-[11px] flex items-center gap-3 border-b-2 border-gray-400">
                    <x-user-avatar :user="$user" />
                    <h1 class="font-bold text-lg">{{ $user->name }}</h1>
                </div>
                <div id="body" class="flex-grow overflow-hidden overflow-y-auto h-96 p-5" style="scroll-behavior: smooth;">
                    @foreach($messages as $index => $msg)
                        @php
                            $isCurrentUser = $msg['sender_id'] == auth()->user()->id;
                            $isFirstMessage = ($index == 0 || $messages[$index - 1]['sender_id'] != $msg['sender_id']);
                            $isLastMessage = ($index == count($messages) - 1 || $messages[$index + 1]['sender_id'] != $msg['sender_id']);
                            $isMiddleMessage = !$isFirstMessage && !$isLastMessage;
                            $isSingleMessage = $isFirstMessage && $isLastMessage;
                        @endphp

                        <div class="flex items-start gap-2.5 mb-[2px] {{ $isCurrentUser ? 'justify-end' : '' }}">
                            @if(!$isCurrentUser)
                                @if($isLastMessage)
                                    <x-user-avatar :user="$user" />
                                @else
                                        <?= $gap ?>
                                @endif
                                <div class="flex flex-col max-w-[500px] leading-1.5 p-3 border-gray-200 bg-red-400 {{ $isSingleMessage ? 'rounded-xl' : ($isFirstMessage ? 'rounded-t-xl rounded-br-xl' : ($isLastMessage ? 'rounded-b-xl rounded-tr-xl' : 'rounded-tr-xl rounded-br-xl')) }}" data-tooltip-target="tooltip-right-{{ $msg['id'] }}" data-tooltip-placement="right">
                                    <div class="flex flex-col space-x-2 rtl:space-x-reverse">
                                        <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $msg['content'] }}</p>
                                    </div>
                                </div>
                                <div id="tooltip-right-{{ $msg['id'] }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    {{ $msg['sent_at'] }}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            @else
                                <div class="flex flex-col max-w-[500px] leading-1.5 p-3 border-gray-200 bg-gray-100 dark:bg-gray-700 {{ $isSingleMessage ? 'rounded-xl' : ($isFirstMessage ? 'rounded-tl-xl rounded-tr-xl rounded-bl-xl' : ($isLastMessage ? 'rounded-tl-xl rounded-bl-xl rounded-br-xl' : 'rounded-tl-xl rounded-bl-xl')) }}" data-tooltip-target="tooltip-left-{{ $msg['id'] }}" data-tooltip-placement="left">
                                    <div class="flex flex-col space-x-2 rtl:space-x-reverse">
                                        <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $msg['content'] }}</p>
                                    </div>
                                </div>
                                <div id="tooltip-left-{{ $msg['id'] }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    {{ $msg['sent_at'] }}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

{{--                <script>--}}
{{--                    function scrollToBottom() {--}}
{{--                        const chatContainer = document.getElementById('body');--}}
{{--                        chatContainer.scrollTop = chatContainer.scrollHeight;--}}
{{--                    }--}}
{{--                    window.onload = scrollToBottom;--}}
{{--                </script>--}}

                <div id="footer">
                    <form wire:submit="sendMessage()">
                        <label for="chat" class="sr-only">Your message</label>
                        <div class="flex items-center py-2 rounded-lg">
                            <textarea id="chat" rows="1" wire:model="message" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                            <button type="submit" class="inline-flex justify-center p-2 mr-4 text-black-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-7 h-7 rotate-90 rtl:-rotate-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                                </svg>
                                <span class="sr-only">Send message</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>


        @else
            <div>

                Select a conversation to send a message

            </div>
        @endif


    </div>
</div>
