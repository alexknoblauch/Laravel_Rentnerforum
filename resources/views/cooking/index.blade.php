<x-app-layout>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex  items-center lg:justify-center flex-col overflow-x-hidden">
       @include('layouts.header')


    {{-- Left Grid --}}
    <div class="main-container grid grid-cols-[1fr] md:grid-cols-[3fr_7fr] px-4 md:overflow-y-hidden max-h-[calc(100vh-3rem)] ">
        <div class="mb-2flex flex-col gap-2 md:border-r md:border-gray-300 order-2 md:order-1 md:overflow-y-auto overflow-y-visible scroll-container max-h-[calc(100vh-3rem)] ">
            @foreach ($cookings as $cooking)
                <a href="{{route('cooking.show', ['kochtipp' => Str::slug($cooking->title),])}}" class="cursor-pointer hover:bg-gray-200 p-4 py-4 grid grid-cols-[8fr_2fr] mt-4 md:bg-inherit bg-[#EAECEF] rounded-[9px]">
                    <div>
                        <div class="flex items-center font-semibold text-lg md:text-base">
                            <svg class="h-4 w-4 mr-2 opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M416 0C400 0 288 32 288 176l0 112c0 35.3 28.7 64 64 64l32 0 0 128c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 0-112 0-208c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7L80 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224.4c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16l0 134.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8L64 16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/></svg>
                            <h3><span class="text-gray-500 text-lg md:text-base ">{{$loop->count - $loop->index}}.</span>    {{ Str::limit($cooking->title, 24) }}</h3>
                        </div>
                        <div>
                            <p class="text-gray-500 md:text-base md:text-[0.6rem] ml-6">{{$cooking->user->name}}</p>
                        </div>
                    </div>
                    <div class="flex items-end justify-end">
                        <p class="whitespace-nowarp text-gray-500 md:text-[0.8rem]">{{$cooking->duration}} min.</p>
                    </div>    
                </a>
            @endforeach
            <div>
            </div>
        </div>

        <div class="md:p-12 p-6 -mt-12 text-center leading-[3rem] order-1 md:order-2">


        {{-- Right Grid --}}
        <div class="flex flex-col items-center justify-center mb-8">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6">
                <span class="inline-block relative  mt-12">
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-green-500 rounded-lg z-0"></span>
                    <span class="relative z-10 text-[3rem]">Kochrezepte</span>
                </span>
                <br>
                <span class="block mt-3 text-base sm:text-xl md:text-2xl text-gray-600 font-light">
                    für <span class="italic text-blue-500">mehr Geschmack</span> im Alltag.
                </span>
            </h2>
            </div>
            <div class="flex items-center justify-center">
                <p class="italic mx-4 -mt-4 md:-mt-0 md:block text-center text-[1rem]  max-w-[80%] leading-tight">Teilen auch Sie Ihre liebsten Rezepte mit Anderen. <br> <span class="">Unser aller Liebling, das Essen, kann einen schwungvollen Twist in den Tag bringen.</span></p>
            </div>
            <div class="flex items-center gap-2 justify-center mt-8">
                <svg class="cursor-pointer btn-addRecipe h-[2.8rem] w-[2.8rem] p-2 bg-blue-300 border rounded-xl " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                <p class="italic text-lg">Neues Rezept</p>
            </div>
            <div class="flex justify-center flex-row mt-4 p-4 -ml-8 md:-ml-0">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10" src="{{asset('imgs/cooking/photo-1432139509613-5c4255815697.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/cooking/photo-1473093295043-cdd812d0e601.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/cooking/photo-1507273026339-31b655f3752d.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/cooking/10.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/cooking/photo-1567056602606-6172dedda3ac.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/cooking/premium_photo-1673809798703-6082a015f931.avif')}}" alt="">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/cooking/11.avif')}}" alt="">
                    <div class="absolute md:bottom-10 bottom-40 w-[70%] md:w-[50%] h-20 bg-green-300 rounded-full opacity-50 blur-2xl md:blur-3xl z-0 overflow-x-hidden">
                </div>
            </div>
        </div>
    </div>

    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
    
    <div class="">
        <div class="modal hidden
        m-4 sm:m-6 md:m-12 lg:m-16
        p-4 sm:p-6 md:p-8
        w-[90%] sm:w-[85%] md:w-[70%] lg:w-[55%] xl:w-[45%] 2xl:w-[40%]
        h-auto max-h-[90vh]
        overflow-y-auto bg-white fixed 
        top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 
        rounded-xl z-50 ">            
        <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
        @auth
        <form class="grid grid-rows-[2fr_8fr] mt-4" action="{{route('cooking.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            
            <div class="flex items-center justify-between mt-4">
                
                <div class="relative flex flex-row imtes-center justify-center gap-4 w-[100%]">
                    <label class="flex items-center justify-center text-[20px] md:text-xl" for="title">Titel:</label>
                    <div class="input-title-error text-red-500 absolute top-[95%] md:left-[15%] left-[35%]"></div>
                    <input  class="input-title rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[70%]" name="title" id="title" type="text">
                </div>
                <div  class="flex flex-row imtes-center ustify-center gap-4 w-[70%]">
                    <label class=" flex items-center justify-center md:text-xl" for="duration">Dauer:</label>
                    <select class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[40%] w-full h-full" name="duration"  id="duration">
                        <option value="5">5 min.</option>
                        <option value="10">10 min.</option>
                        <option value="15">15 min.</option>
                        <option value="20">20 min.</option>
                        <option value="25">25 min.</option>
                        <option value="30">30 min.</option>
                        <option value="35">35 min.</option>
                        <option value="40">40 min.</option>
                        <option value="45">45 min.</option>
                        <option value="50">50 min.</option>
                        <option value="55">55 min.</option>
                        <option value="60">1 std.</option>
                        <option value="65">1 std. 5 min.</option>
                        <option value="70">1 std. 10 min.</option>
                        <option value="75">1 std. 15 min.</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 h-[100%]">
                <div class="flex flex-row items-center justify-left mb-2">
                    <svg class="h-5 w-5  mr-2 w-15 -mt-0 sm:-mt-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M416 0C400 0 288 32 288 176l0 112c0 35.3 28.7 64 64 64l32 0 0 128c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 0-112 0-208c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7L80 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224.4c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16l0 134.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8L64 16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/></svg>
                    <label class="md:text-xl" for="description"  >Rezept:</label><br>
                </div>
                <textarea required class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[100%] h-[80%] " name="description"  id="description"></textarea>
            </div>
            <div class="flex flex-row justify-between items-center mt-16 md:mt-4">
                <button
                type="submit"
                class="px-6 py-2 w-[30%] rounded-full bg-blue-500 text-white font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300">Teilen
            </button>
            <label for="image" class="px-6 py-2 w-[30%] text-center cursor-pointer rounded-full bg-white text-black font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 border-[2px] border-blue-500">
                Foto
            </label>
            <input type="file" id="image" name="image" accept="image/*"class="hidden image">            
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

</body>

    <script >
        const modal = document.querySelector('.modal')
        const overlay = document.querySelector('.overlay')
        const addRecipe = document.querySelector('.btn-addRecipe')
        const xModal = document.querySelector('.x-modal')
        const inputTitle = document.querySelector('.input-title')
        const inputTitleError = document.querySelector('.input-title-error')
        

        /* OPEN CLOSE MODAL*/
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
        
        
        /* DOPPELTE TITEL FEHLERMELDUNG*/
        const cookingTitles = @json($cookings) 

        inputTitle.addEventListener('change', function(e){
            const input = e.target.value.trim()
            inputTitleError.innerHTML = ''
            inputTitle.classList.remove('border-red-500')
            
            const exists = Object.values(cookingTitles).some(t => t.title === input)
            
            if(exists){
                inputTitleError.innerHTML = '<p>Titel schon vergeben</p>'
                inputTitle.classList.add('border-red-500')
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
</x-app-layout>