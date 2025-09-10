@php
    use App\Models\Travel;
    use Illuminate\Support\Str; 

@endphp
<x-app-layout>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-center lg:justify-center flex-col overflow-x-hidden">
       @include('layouts.header')

    <div class="main-container grid grid-cols-[1fr] md:grid-cols-[3fr_7fr] px-4 md:overflow-y-hidden">
        <div class="mb-2flex flex-col gap-2 md:border-r md:border-gray-300 order-2 md:order-1 max-h-[calc(100vh-3rem)] md:overflow-y-auto overflow-y-visible scroll-container ">
            <div>
                @foreach ($travels as $travel)
                <a href="{{route('travel.show', ['ausflug' => Str::slug($travel->title) ])}}" class="cursor-pointer hover:bg-gray-200 p-4 py-4 grid grid-cols-[8fr_2fr] rounded-l-lg mt-4">
                    <div>
                        <div class="flex items-center font-semibold text-lg md:text-base">
                            <svg class="h-4 w-4 mr-2 opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M560 160A80 80 0 1 0 560 0a80 80 0 1 0 0 160zM55.9 512l325.2 0 75 0 122.8 0c33.8 0 61.1-27.4 61.1-61.1c0-11.2-3.1-22.2-8.9-31.8l-132-216.3C495 196.1 487.8 192 480 192s-15 4.1-19.1 10.7l-48.2 79L286.8 81c-6.6-10.6-18.3-17-30.8-17s-24.1 6.4-30.8 17L8.6 426.4C3 435.3 0 445.6 0 456.1C0 487 25 512 55.9 512z"/></svg>
                            <h3><span class="text-gray-500 text-lg md:text-base ">{{$loop->count - $loop->index}}.</span>    {{ Str::limit($travel->title, 24) }}</h3>
                        </div>
                        <div>
                            <div class="flex flex-row justify-between">
                                <p class="text-gray-500 md:text-base md:text-[0.6rem] ml-6">{{$travel->user->name}}</p>
                                <div class="flex items-end justify-end">
                                    <p class="whitespace-nowarp text-gray-500 md:text-[0.8rem] mr-2">{{$travel->canton}}</p>
                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="h-14 w-14 rounded-full p-[2px] bg-gradient-to-tr from-blue-400 to-yellow-500">

                            <img src="{{ asset('storage/' . $travel->image) }}"                                   
                            alt="Bild von Ausflugsziel"
                            class="h-full w-full object-cover rounded-full border-2 border-white">

                    </div>     
                </a>
                @endforeach
            </div>
        </div>
        <div class="md:p-12 p-6 -mt-12 text-center leading-[3rem] order-1 md:order-2 mb-8 max-h-[calc(100vh-3rem)] ">
            <div class="flex flex-col items-center justify-center mb-8 mt-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6">
                    <span class="inline-block relative">
                        <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-yellow-300 rounded-lg z-0"></span>
                        <span class="relative z-10">Ausflüge</span>
                    </span>
                    <br>
                    <p class="text-center text-gray-500 text-sm mt-1 uppercase tracking-wider">
                    Regional. Neue Entdecken. Schweiz.
                    </p>
                </h2>
            </div>
            <p class="italic mx-4 -mt-4 md:-mt-0 md:block text-center text-sm md:text-m">Wo gehen Sie am liebsten hin?<br><span class="md:block hidden">Ob draussen oder drinnen, bringen Sie schwung ins Leben anderer Menschen mit tollen Ideen.</span></p>
            <div class="flex items-center gap-2 justify-center mt-8">
                <svg class="cursor-pointer btn-travel h-[2.8rem] w-[2.8rem] p-2 bg-blue-300 border rounded-xl " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                <p class="italic">Neuer Ausflug</p>
            </div>   
            <div class="flex justify-center flex-row mt-8 p-4 -ml-12">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 " src="{{asset('imgs/travel/alpwirtschaft-horben-sommer-12.jpg')}}" alt="">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/travel/verkehrshaus-luzern-1.jpg')}}" alt="">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/travel/photo-1530638458177-fcc275860f8b.avif')}}" alt="">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/travel/photo-1563292769-4e05b684851a.avif')}}" alt="">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/travel/photo-1605911015055-caa77d83c64c.avif')}}" alt="">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/travel/chaplin-c-montreuxriviera_COVER.jpg')}}" alt="">
                <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 z-10 "  src="{{asset('imgs/travel/img_4kq_iiefaabi.webp')}}" alt="">
                <div class="absolute md:bottom-20 bottom-40 w-[70%] md:w-[50%] h-20 bg-yellow-300  opacity-50 rounded-full blur-3xl z-0 overflow-x-hidden"></div>
            </div>
        </div>
    </div>


    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
    <div class=" mt-24 md:mt-0">
  <div class="modal hidden m-4 sm:m-6 md:m-12 lg:m-16 p-4 sm:p-6 md:p-8 w-[90%] sm:w-[85%] md:w-[70%] lg:w-[55%] xl:w-[45%] 2xl:w-[40%] h-auto max-h-[90vh] overflow-y-auto bg-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-xl z-50">
            <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
            <form  enctype="multipart/form-data" class="grid grid-rows-[auto_auto_auto] md:grid-rows-[2fr_8fr]" method="POST" action="{{route('travel.store')}}">
                @csrf
                <div class="flex items-start md:flex-row flex-col justify-between gap-4">
                    <div class="relative flex flex-row imtes-center ustify-center gap-4 w-[100%]">
                        <label class="flex items-center justify-center text-[20px] md:text-xl" for="title">Titel:</label>
                            <div class="input-title-error text-red-500 absolute top-[95%] left-[15%]"></div>
                        <input  class="input-title rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[70%]" name="title" id="title" type="text">
                    </div>
                    <div  class="flex flex-row imtes-center ustify-center gap-4 w-[70%]">
                        <label class=" flex items-center justify-center text-[20px] md:text-xl" for="canton">Kanton:</label>
                        <select class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[40%] w-full h-full" name="canton"  id="canton">
                            <option value="" selected disabled></option>
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
                    <div class="flex justify-start items-start md:justify-between flex-col md:flex-row flex-row mb-2">
                        <div class="flex items-center justify-between order-2 md:order-1 mt-2 md:mt-2">
                            <svg class="h-5 w-5 mr-2 w-15 sm:-mt-0"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M560 160A80 80 0 1 0 560 0a80 80 0 1 0 0 160zM55.9 512l325.2 0 75 0 122.8 0c33.8 0 61.1-27.4 61.1-61.1c0-11.2-3.1-22.2-8.9-31.8l-132-216.3C495 196.1 487.8 192 480 192s-15 4.1-19.1 10.7l-48.2 79L286.8 81c-6.6-10.6-18.3-17-30.8-17s-24.1 6.4-30.8 17L8.6 426.4C3 435.3 0 445.6 0 456.1C0 487 25 512 55.9 512z"/></svg>
                            <label class="text-[20px] md:text-xl" for="description">Beschreibung:</label><br>
                        </div>
                        <div class="flex gap-2 items-center justify-center order-1 md:order-2">
                            <label class="text-[20px] md:text-xl" for="gemeinde">Gemeinde:</label><br>
                            <div class="relative">
                                <input autocomplete="off" class="gemeinde-input rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 md:w-[12.5rem] w-full h-full" name="gemeinde" id="gemeinde" type="text">
                            <div class="gemeinde-preview absolute top-[3rem] left-[0%] rounded-l author-results bg-[#F2F2F2]"></div>
                            </div>
                        </div>
                    </div>
                    <textarea class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[100%] h-[80%]" name="description"  id="description"></textarea>
                </div>
                <div class="flex flex-row justify-between items-center mt-20  g">
                    <button
                        type="submit"
                        class="px-6 py-2  w-[30%] rounded-full bg-blue-500 text-white font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300">Teilen
                    </button>
                    <label for="image" class="px-6 py-2 w-[30%] text-center cursor-pointer rounded-full bg-white text-black font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 border-[2px] border-blue-500">
                    Foto
                    </label>
                    <input type="file" id="image" name="image" accept="image/*"class="hidden image">
                </div>
            </form>
        </div>
    </div>
    <script>
        const overlay = document.querySelector('.overlay')
        const modal = document.querySelector('.modal')
        const addTravel = document.querySelector('.btn-travel')
        const closeModal = document.querySelector('.x-modal')
        const inputGemeinde = document.querySelector('.gemeinde-input')
        const outputGemeinde = document.querySelector('.gemeinde-preview')
        const inputTitle = document.querySelector('.input-title')
        const inputTitleError = document.querySelector('.input-title-error')

        const travelTitles = @json($travels)  


        function toggleVisibility(){
            overlay.classList.toggle('hidden');
            modal.classList.toggle('hidden');
        }

        function clickToggleVisibility(e){
            const click = e.target;
            if(!click) return;
            toggleVisibility();
        }

        
        addTravel.addEventListener('click', clickToggleVisibility)
        closeModal.addEventListener('click', clickToggleVisibility)

        document.addEventListener('keydown', function(e){
            if(e.key === 'Escape'){
                if(!modal.classList.contains('hidden'))
                toggleVisibility();
            }
        })


        const gemeinden = @json($gemeinden);
        const uniqueGemeinden = [...new Set(gemeinden.map(g => g.gemeinde))];
        console.log(uniqueGemeinden)


        function getGemeindePreviews(inputText){
            const regex = new RegExp(`^(${inputText})`, 'gi')
 
            let matches = uniqueGemeinden.filter(gem => {
                return gem.match(regex)
            })

            if(!inputText){
                outputGemeinde.innerHTML = ''
                return
            }

            const markup = matches.map(match => {
                const highligted = match.replace(regex, '<b>$1</b>')
                return `<div class="px-2 py-1 hover:bg-gray-200 cursor-pointer rounded-l" data-id='${match}'>${highligted}</div>`}).join('');
                

            outputGemeinde.innerHTML = markup

            outputGemeinde.addEventListener('click', function(e){
                const gemeinde = e.target.dataset.id

                inputGemeinde.value = gemeinde
                outputGemeinde.innerHTML = ''
            })
        }

        inputGemeinde.addEventListener('input',() => getGemeindePreviews(inputGemeinde.value))

        inputTitle.addEventListener('change', function(e){
            const input = e.target.value.trim()
                inputTitleError.innerHTML = ''
                inputTitle.classList.remove('border-red-500')
        
            const exists = Object.values(travelTitles).some(t => t.title === input)

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
    </body>
</x-app-layout>