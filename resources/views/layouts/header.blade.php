<header class="grid grid-cols-[3fr_3fr_3fr] w-full text-sm not-has-[nav]:hidden px-4 h-[3rem]" style="background: linear-gradient(to right, #1864ab, #339af0);">

    {{-- Linke Spalte: Logout oder leer --}}
    <div class="left-container flex items-center justify-start lg:px-2">
        @if(Route::has('login'))
            @auth
                @if(request()->routeIs('welcome'))
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-black border-[1.5px] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-full text-sm leading-normal bg-white">
                            Logout
                        </button>
                    </form>
                @endif
            @endauth
        @endif
    </div>

    {{-- Mittlere Spalte: Home Button --}}
    <div class="flex items-center justify-center">
        @if(!request()->routeIs('nachrichten.index') && !request()->routeIs('welcome'))
            @auth              
                <a href="{{ route('welcome') }}">
                    <svg fill="white" stroke-width="30" stroke="black" class="h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336V512C112 547.3 140.7 576 176 576H464C499.3 576 528 547.3 528 512V336H544C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384H336C362.5 384 384 405.5 384 432V528H256V432C256 405.5 277.5 384 304 384z"/>
                    </svg>
                </a>
            @endauth
        @endif
    </div>

    {{-- Rechte Spalte: Auth Links / Nachrichten / Zurück Button --}}
    <div class="relative flex items-center justify-end gap-4 lg:px-2">

        {{-- Wenn NICHT eingeloggt und auf welcome -> Login/Register zeigen --}}
        @guest
            <a href="{{ route('register') }}"
               class="px-5 py-1.5 dark:text-[#EDEDEC] border-black border-[1.5px] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-full text-sm leading-normal bg-white hover:bg-[#e7f5ff]">
                Registerieren
            </a>
            <a href="{{ route('login') }}"
               class=" px-5 py-1.5 dark:text-[#EDEDEC] border-black border-[1.5px] hover:border-[#1915014a] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-full text-sm leading-normal bg-white hover:bg-[#e7f5ff]">
                Login
            </a>
        @endguest

        {{-- Wenn eingeloggt --}}
        @auth
            {{-- Nachrichten-Icons (außer auf Nachrichten-Seite selbst) --}}
            @if(!request()->routeIs('nachrichten.index'))
                <a href="{{ route('nachrichten.index') }}" data-userid="{{ auth()->user()->id }}" class="relative btn-message inline-block py-1.5 border border-transparent dark:hover:border-[#3E3E3A] rounded-sm">
                    {{-- Nachrichten Icon mit rotem Punkt --}}
                    <svg fill="white" stroke-width="30" stroke="black" class="h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M64 416V192C64 139 107 96 160 96H480C533 96 576 139 576 192V416C576 469 533 512 480 512H360C354.8 512 349.8 513.7 345.6 516.8L230.4 603.2C226.2 606.3 221.2 608 216 608C202.7 608 192 597.3 192 584V512H160C107 512 64 469 64 416z"/>
                    </svg>
                    <div class="hidden message-dot top-[15%] left-[1%] bg-red-500 text-sm p-[0.4rem] rounded-full absolute"></div>
                </a>
            
                @if (!request()->routeIs('profil.index'))
                    <a href="{{ route('profil.index') }}" data-userid="{{ auth()->user()->id }}"
                        class="relative btn-message inline-block py-1.5 border border-transparent dark:hover:border-[#3E3E3A] rounded-sm">
                        {{-- Profil-Icon --}}
                        <svg fill="white" stroke-width="30" stroke="black" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 cursor-pointer" viewBox="0 0 640 640">
                            <path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576H498.3C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368H290.3z"/>
                        </svg>
                    </a>
                @endif
            @endif

            {{-- Zurück zur Welcome-Seite von Nachrichten --}}
            @if(!request()->routeIs('welcome') && request()->routeIs('nachrichten.index'))
                <a href="{{ route('welcome') }}" class="flex items-center justify-center lg:p-2 cursor-pointer">
                    <svg fill="white" stroke-width="30" stroke="black" class="h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336V512C112 547.3 140.7 576 176 576H464C499.3 576 528 547.3 528 512V336H544C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384H336C362.5 384 384 405.5 384 432V528H256V432C256 405.5 277.5 384 304 384z"/>
                    </svg>
                </a>
            @endif

            {{-- Nachrichten-Popup-Box + Overlay --}}
            <div class="z-50 message-box hidden h-[25rem] w-[15rem] border rounded-lg bg-gray-200 absolute top-[100%] right-[0%] md:right-[30%]"></div>
            <div id="overlay" class="z-40 hidden fixed inset-0 bg-black bg-opacity-0"></div>
        @endauth
    </div>
</header>
<script>
    const lastTimeVisited = JSON.stringify(localStorage.getItem('last_seen_messages'))

    async function fetchForRedDotsMessage(){
        const messageIconDot = document.querySelector('.btn-message div')
        const res = await fetch("{{route('poll.messages')}}")
        const data = await res.json()

        const lastTimeVisited = new Date(localStorage.getItem('last_seen_messages'));
        const currentUserId = @json(auth()->id());


        const hasNewMessages = data.messages.some(msg =>
            new Date(msg.timestamp) > lastTimeVisited &&
            msg.sender !== currentUserId
        );

        if (messageIconDot) {
            if (hasNewMessages) {
                messageIconDot.classList.remove('hidden');
            } else {
                messageIconDot.classList.add('hidden');
            }
        }
    }
    fetchForRedDotsMessage()
</script>
