<x-app-layout>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex  items-center lg:justify-center flex-col overflow-x-hidden">
       @include('layouts.header')

    <div class="main-container grid grid-cols-[1fr] md:grid-cols-[3fr_7fr] px-4 md:overflow-y-hidden">
        <div class="mb-2 flex flex-col gap-2 md:border-r md:border-gray-300 order-2 md:order-1 max-h-[calc(100vh-3rem)] md:overflow-y-auto overflow-y-visible scroll-container ">
            @foreach ($tasks as $task)
                <a href="{{route('helping.show', ['helfende_hand' => Str::slug($task->title),])}}" class="cursor-pointer hover:bg-gray-200 p-4 py-4 mt-4 md:bg-inherit bg-[#EAECEF] rounded-[9px]">
                    <div>
                        <div class="flex items-center font-semibold text-lg md:text-base">
                            <svg class="h-6 w-6 mr-2 opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8 512 128l-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48 0 224 28.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16L0 352c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-224-80 0zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128l0 224c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-208c0-8.8-7.2-16-16-16l-80 0zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/></svg>
                            <h3><span class="text-gray-500 text-lg md:text-base ">{{$loop->count - $loop->index}}.</span>    {{ Str::limit($task->title, 40) }}</h3>
                        </div>
                        <div>
                            <p class=" text-end text-gray-500 md:text-base md:text-sm ml-6">{{$task->gemeinde->gemeinde}} / <b class="text-gray-700">{{$task->canton}}</b></p>
                        </div>
                    </div>                  
                </a>
            @endforeach
        </div>

        <div class="md:p-12 p-6 -mt-12 text-center leading-[3rem] order-1 md:order-2">
        <div class="flex flex-col items-center justify-center mb-8 mt-8">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6">
                <span class="inline-block relative">
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-red-500 rounded-lg z-0"></span>
                    <span class="relative z-10">Helfende Hand</span>
                </span>
                <br>
                <span class="block mt-3 text-base sm:text-xl md:text-2xl text-gray-600 font-light">
                    <p>eine passende Hand für alles.</p>
                </span>
            </h2>
            </div>
            <div class="flex items-center justify-center">
                <p class="italic mx-4 -mt-4 md:-mt-0 md:block  text-sm md:text-[1rem] max-w-[80%]">Bewegung hält frisch! Freiwilligenarbeit, Organisationen oder auch Private Projekte. Hier können Sie Ihr Vorhaben stellen und eventuell schon bald eine Helfende Hand finden.</p>
            </div>
            <div class="flex items-center gap-2 justify-center mt-8">
                <svg class="cursor-pointer btn-addRecipe h-[2.8rem] w-[2.8rem] p-2 bg-blue-300 border rounded-xl " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                <p class="italic">Neues Projekt</p>
            </div>       
                <div class="flex flex-row align-center justify-center mt-8 p-4 -ml-8  md:-ml-0">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10" src="{{asset('imgs/helpinghand/photo-1463587480257-3c60227e1e52.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/helpinghand/photo-1590172205940-5b6eedf7ec82.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/helpinghand/photo-1570913174069-06485c64f8e9.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/helpinghand/photo-1594498653385-d5172c532c00.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/helpinghand/photo-1751486289943-0428133c367c.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/helpinghand/maler.jpg')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/helpinghand/volunteer.avif')}}" alt="">
                    <div class="absolute md:bottom-10 bottom-40 w-[70%] md:w-[50%] h-20 bg-red-300 rounded-full opacity-50 blur-2xl md:blur-3xl z-0 overflow-x-hidden"></div>

            </div>
        </div>
    </div>


    <!--MODAL -->
    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
    <div class=" mt-24 md:mt-0">
    <div class="modal hidden
              m-4 sm:m-6 md:m-12 lg:m-16
              p-4 sm:p-6 md:p-8
              w-[90%] sm:w-[85%] md:w-[70%] lg:w-[55%] xl:w-[45%] 2xl:w-[40%]
              h-auto max-h-[90vh]
              overflow-y-auto bg-white fixed 
              top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 
              rounded-xl z-50">       <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
            <form class="grid grid-rows-[auto_auto_auto] md:grid-rows-[2fr_8fr]" method="POST" action="{{route('helping.store')}}">
                @csrf
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 mt-4 w-full">
    
    <!-- Titel -->
    <div class="flex items-center gap-2 w-full md:w-1/2">
        <label for="title" class="text-[20px] md:text-xl md:text-xl whitespace-nowrap">Titel:</label>
        <input
            class="rounded-xl border border-gray-500 outline-none focus:border-gray-500 focus:ring-0 w-full px-3 py-2"
            name="title"
            id="title"
            type="text"
        >
    </div>

    <!-- Kanton -->
    <div class="flex items-center gap-2 w-full md:w-1/2">
        <label for="canton" class="text-[20px] md:text-xl md:text-xl whitespace-nowrap">Kanton:</label>
        <select
            class="rounded-xl border border-gray-500 outline-none focus:border-gray-500 focus:ring-0 w-full px-3 py-2"
            name="canton"
            id="canton"
        >
            <option value="" selected disabled>Bitte wählen</option>
            <option value="AG">Aargau</option>
            <option value="AI">Appenzell Innerrhoden</option>
            <option value="AR">Appenzell Ausserrhoden</option>
            <option value="BE">Bern</option>
            <option value="BL">Basel-Landschaft</option>
            <option value="BS">Basel-Stadt</option>
            <option value="FR">Freiburg</option>
            <option value="GE">Genf</option>
            <option value="GL">Glarus</option>
            <option value="GR">Graubünden</option>
            <option value="JU">Jura</option>
            <option value="LU">Luzern</option>
            <option value="NE">Neuenburg</option>
            <option value="NW">Nidwalden</option>
            <option value="OW">Obwalden</option>
            <option value="SG">St. Gallen</option>
            <option value="SH">Schaffhausen</option>
            <option value="SO">Solothurn</option>
            <option value="SZ">Schwyz</option>
            <option value="TG">Thurgau</option>
            <option value="TI">Tessin</option>
            <option value="UR">Uri</option>
            <option value="VD">Waadt</option>
            <option value="VS">Wallis</option>
            <option value="ZG">Zug</option>
            <option value="ZH">Zürich</option>
        </select>
    </div>
</div>

                <div class="mt-4 h-[100%]">
                    <div class="flex md:flex-row flex-col justify-between flex-row items-start justify-left mb-2">
                        <div class="flex items-center justify-between order-2 md:order-1">
                            <svg class="md:h-7 md:w-7 mr-2 w-15 -mt-4 sm:-mt-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8 512 128l-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48 0 224 28.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16L0 352c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-224-80 0zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128l0 224c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-208c0-8.8-7.2-16-16-16l-80 0zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/></svg>
                            <label class=" -ml-2 md:-ml-0 text-[20px] md:text-xl" for="description">Beschreibung:</label><br>
                        </div>
                        <div class="flex gap-2 order-1 md:order-2">
                            <label class="text-[20px] md:text-xl" for="gemeinde">Gemeinde:</label><br>
                            <div class="relative">
                                <input autocomplete="off" class="gemeinde-input rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-full h-full" name="gemeinde" id="gemeinde" type="text">
                            <div class="gemeinde-output absolute top-[3rem] left-[0%] rounded-l author-results bg-[#F2F2F2]"></div>
                            </div>
                        </div>
                    </div>
                    <textarea class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[100%] h-[80%]" name="description"  id="description"></textarea>
                </div>
                <button
                    type="submit"
                    class="mt-16 md:mt-4 px-6 py-2 w-[30%] rounded-full bg-blue-500 text-white font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300">Teilen
                </button>            
            </form>
        </div>
    </div>
    
    <script>
        const modal = document.querySelector('.modal')
        const overlay = document.querySelector('.overlay')
        const addRecipe = document.querySelector('.btn-addRecipe')
        const xModal = document.querySelector('.x-modal')
        const gemeindeInput = document.querySelector('.gemeinde-input')
        const gemeindeOutput = document.querySelector('.gemeinde-output')
        const gemeinden = @json($gemeinden);
        const titles = @json($tasks);
        
        const uniqueGemeinden = [... new Set(gemeinden.map(gem => gem.gemeinde))]
        

        //MODAL FUNKTIONEN
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


        //CHECK EXISTIERENDE GEMEINDEN
        function gemeindePreview(inputText){
            const regex = new RegExp(`^(${inputText})`, 'gi')
            const matches = uniqueGemeinden.filter(gemeinde => {
                return gemeinde.match(regex)
            })


            if(!inputText){
                gemeindeOutput.innerHTML = ''
                return
            }

            const markup = matches.map(gemeinde => {
                const highlighted = gemeinde.replace(regex, '<b>$1</b>')
                return `<div class="px-2 py-1 hover:bg-gray-200 cursor-pointer rounded-l" data-id='${gemeinde}'>${highlighted}</div>`}).join('');

            gemeindeOutput.innerHTML = markup


            gemeindeOutput.addEventListener('click', function(e){
                const gemeinde = e.target.dataset.id

                gemeindeInput.value = gemeinde
                gemeindeOutput.innerHTML = ''

            })
        }
        gemeindeInput.addEventListener('input', () => gemeindePreview(gemeindeInput.value))


        
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