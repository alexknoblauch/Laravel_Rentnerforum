<x-app-layout>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex  items-center lg:justify-center flex-col overflow-x-hidden">
       @include('layouts.header')



    {{-- Left Grid --}}
    <div class="main-container grid grid-cols-[1fr]  md:grid-cols-[3fr_7fr] px-4 md:overflow-y-hidden">
        <div class="mb-2 flex flex-col gap-2 md:border-r md:border-gray-300 order-2 md:order-1 max-h-[calc(100vh-3rem)] md:overflow-y-auto overflow-y-visible scroll-container ">
            @foreach ($tricks as $trick)
                    <a href="{{route('trick.show', ['tricks_und_tipp' => $trick->title_slug])}}" class="cursor-pointer hover:bg-gray-200 p-4 py-4 grid grid-cols-[8fr_2fr] mt-4 md:bg-inherit bg-[#EAECEF] rounded-[9px]">
                            <div class="flex items-center justify-between">
                                <div class="flex items-start  font-semibold text-lg md:text-base">
                                    <svg class="h-5 w-5 mr-2 mt-[0.15rem] md:mt-0 opacity-60 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M420.9 448C428.2 425.7 442.8 405.5 459.3 388.1C492 353.7 512 307.2 512 256C512 150 426 64 320 64C214 64 128 150 128 256C128 307.2 148 353.7 180.7 388.1C197.2 405.5 211.9 425.7 219.1 448L420.8 448zM416 496L224 496L224 512C224 556.2 259.8 592 304 592L336 592C380.2 592 416 556.2 416 512L416 496zM312 176C272.2 176 240 208.2 240 248C240 261.3 229.3 272 216 272C202.7 272 192 261.3 192 248C192 181.7 245.7 128 312 128C325.3 128 336 138.7 336 152C336 165.3 325.3 176 312 176z"/></svg>
                                    <h3><span class="text-gray-500 text-lg md:text-base ">{{$loop->count - $loop->index}}.</span>    {{ Str::limit($trick->title, 40) }}</h3>
                                </div>
                            </div>                  
                            <div class="flex items-end  justify-end">
                                <p class="text-[0.7rem] text-gray-500">{{$trick->created_at->format('d.m.y')}}</p>
                            </div>
                    </a>
            @endforeach  
        </div>



        {{-- Right Grid --}}
        <div class="md:p-12 p-6 -mt-12 text-center leading-[3rem] order-1 md:order-2">
            <div class="flex flex-col items-center justify-center mb-8 mt-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6">
                    <span class="inline-block relative">
                        <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-cyan-500 rounded-lg z-0"></span>
                        <span class="relative z-10 text-[3rem]">Tricks & Tipps</span>
                    </span>
                    <br>
                    <span class="block mt-3 text-base sm:text-xl md:text-2xl text-gray-600 font-light">
                        <p>Was machen Sie?</p>
                    </span>
                </h2>
            </div>

                <div class="flex items-center flex-col justify-center">
                    <p class="italic mx-4 -mt-4 md:-mt-0 md:block text-center text-[1rem] max-w-[80%] leading-tight">Erkenntnisse und Erfahrungen, hier können Sie erzählen und inspirieren.<br> Was hält Sie aktiv? Haben Sie neue Aufgaben in Angriff genommen?<br> Teilen Sie ihre täglichen Tricks & Tipps mit Anderen.</p>
                    <div class="flex items-center gap-2 justify-center mt-8">
                        <svg class="cursor-pointer btn-addRecipe h-[2.8rem] w-[2.8rem] p-2 bg-blue-300 border rounded-xl " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                        <p class="italic text-lg">Neuer Eintrag</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
    <div class="">
  <div class="modal hidden m-4 sm:m-6 md:m-12 lg:m-16 p-4 sm:p-6 md:p-8 w-[90%] sm:w-[85%] md:w-[70%] lg:w-[55%] xl:w-[45%] 2xl:w-[40%] h-auto max-h-[90vh] overflow-y-auto bg-white fixed  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-xl z-50">            
        <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
        @auth    
        <form class="grid grid-rows-[2fr_8fr]" action="{{route('trick.store')}}" method="POST">
            @csrf
            <div class="flex items-start md:items-center justify-between mt-4 flex-col md:flex-row">
                <div class="relative flex flex-row imtes-center ustify-center gap-4 w-[100%]">
                    <label class="flex items-center justify-center text-[20px] md:text-xl" for="title">Titel:</label>
                    <div class="input-title-error text-red-500 absolute top-[95%] md:left-[15%] left-[25%]"></div>
                    <input  class="input-title rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[50%]" name="title" id="title" type="text">
                </div>
                <div class="flex items-center justify-start md:justify-center md:items-center flex-row gap-2 md:mt-0 mt-4  mr-12">
                    <input class="md:h-5 md:w-5 h-4 w-4 rounded-full outline-none order-2 md:order-1" name='anonym' type="checkbox">
                    <label class="flex items-center text-[0.7rem] justify-center text-[20px] md:text-xl" for="title">Anonym</label>
                </div>
            </div>
            <div class="mt-4 h-[100%]">
                <div class="flex flex-row items-center justify-left mb-2">
                    <svg class="h-5 w-5 mr-2 am:mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M420.9 448C428.2 425.7 442.8 405.5 459.3 388.1C492 353.7 512 307.2 512 256C512 150 426 64 320 64C214 64 128 150 128 256C128 307.2 148 353.7 180.7 388.1C197.2 405.5 211.9 425.7 219.1 448L420.8 448zM416 496L224 496L224 512C224 556.2 259.8 592 304 592L336 592C380.2 592 416 556.2 416 512L416 496zM312 176C272.2 176 240 208.2 240 248C240 261.3 229.3 272 216 272C202.7 272 192 261.3 192 248C192 181.7 245.7 128 312 128C325.3 128 336 138.7 336 152C336 165.3 325.3 176 312 176z"/></svg>
                    <label class=" text-[1.2rem]" for="description">Beschreib:</label><br>
                </div>
                <textarea required class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[100%] md:h-[60%] h-[50%]" name="description"  id="description"></textarea>
                <button
                type="submit"
                class="mt-4 px-6 py-2 w-[30%] rounded-full bg-blue-500 text-white font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300">Teilen
            </button>            
        </div>
    </form>
    @endauth  
    @guest
        <div class="flex flex-col items-center justify-center">
            <p class="text-center items-center max-w-xl">
                Registrieren Sie sich im Forum, um aktiv teilzunehmen.
            </p>
        </div>
    @endguest  
</div>
</div>
    
    <script>
        const modal = document.querySelector('.modal')
        const overlay = document.querySelector('.overlay')
        const addRecipe = document.querySelector('.btn-addRecipe')
        const xModal = document.querySelector('.x-modal')

        function openColoseModal() {
            modal.classList.toggle('hidden')
            overlay.classList.toggle('hidden')
            
            if(!modal.classList.contains('hidden')){
                document.body.style.overflow = 'hidden'
            } else {
                document.body.style.overflow = ''
            }
        }
        
        addRecipe.addEventListener('click', openColoseModal)
        xModal.addEventListener('click', openColoseModal)
        
        document.addEventListener('keydown', function(e){
            if(e.key === 'Escape' && !modal.classList.contains('hidden')){
                openColoseModal()
            }
        })

        //CREATE ZURÜCK BUTTON FÜR MOBILE
          function renderBackButton(){
            const backButton = document.querySelector('.back-button')
            const isMobileWith = window.innerWidth < 768
            const mainContainer = document.querySelector('.main-container')

            if(!backButton && isMobileWith){
              const markup = `
                <a href="{{route('welcome')}}" class="back-button absolute z-50 top-2 left-4">
                  <div class="bg-white rounded-full h-8 w-8 flex items-center justify-center">
                      <svg class="h-7 w-7 -translate-x-0.5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352H544C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288H173.3L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
                      </svg>
                  </div>
                </a>
              `
              mainContainer.insertAdjacentHTML('beforeend', markup)
            } 
          }
          window.addEventListener('resize', renderBackButton)
          window.addEventListener('load', renderBackButton)
      

        </script>
        </body>
</x-app-layout>