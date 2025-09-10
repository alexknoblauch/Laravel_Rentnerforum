<x-app-layout>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex  items-center lg:justify-center flex-col overflow-x-hidden">
       @include('layouts.header')

    <div class="main-container grid grid-cols-[1fr] md:grid-cols-[3fr_7fr]  max-h-[calc(100vh-3rem)] px-4 md:overflow-y-hidden mt-4 md:mt-0">
        <div class="flex flex-col gap-2 md:border-r md:border-gray-300 order-2 md:order-1 max-h-[calc(100vh-3rem)] md:overflow-y-auto overflow-y-visible scroll-container ">

            {{-- <a href="{{ route('book.show', ['slug' => Str::slug($book->title)]) }}">Link</a> --}}
                @foreach ($books as $book)
                    <a href="{{route('book.show', ['buchtipp' => Str::slug($book->title)])}}" class="cursor-pointer hover:bg-gray-200 p-4 py-4  mt-4 md:bg-inherit bg-[#EAECEF] rounded-[9px]">
                            <div>
                                <div class="flex items-start items-center gap-2 font-semibold text-lg md:text-base">
                                    <svg class="h-4 w-4 opacity-50 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>            
                                    <h3><span class="text-gray-500 text-lg md:text-base ">{{$loop->count - $loop->index}}.</span>    {{ Str::limit($book->title, 24) }}</h3>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-gray-500 md:text-sm md:text-[0.6rem] ml-6 sm:mt-2">{{$book->author->author}}</p>
                                    <p class="text-gray-500 md:text-sm md:text-[0.6rem] mr-4 sm:mt-2">{{$book->cathegory}}</p>
                                </div>
                            </div>       
                    </a>
                @endforeach
                <div>
                </div>
            </div>
            
            <div class="md:p-12 p-6 -mt-12 text-center leading-[3rem] order-1 md:order-2">
                
                <div class="absolute top-0 right-0 w-[60%] h-full overflow-hidden pointer-events-none z-0">
                    
                </div>
                <div class="flex flex-col items-center justify-center mb-8 mt-8 z-50">



                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6">
                        <span class="inline-block relative">
                            <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-violet-500 rounded-lg z-0"></span>
                            <span class="relative z-10">Buchtipps</span>
                        </span>
                        <br>
                        <span class="block mt-3 text-base sm:text-xl md:text-2xl text-gray-600 font-light">
                            <p>der schöne Zeitvertreib.</p>
                        </span>
                    </h2>
                </div>
                <div class="flex itmes-center justify-center">
                    <p class="italic mx-4 -mt-4 md:-mt-0 md:block text-center text-sm md:text-m max-w-[80%]"> Was gibt es besseres als ein gutes Buch? Hier können Sie ihre lieblings Bücher rekommendieren und beschreiben um was es sich im Buch handelt.</p>
                </div>
                <div class="flex items-center gap-2 justify-center mt-8">
                    <svg class="cursor-pointer btn-addRecipe h-[2.8rem] w-[2.8rem] p-2 bg-blue-300 border rounded-xl " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                    <p class="italic">Neuer Buchtipp</p>
                </div>                
                <div class="flex flex-row align-center justify-center mt-8 p-4 -ml-8  md:-ml-0">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4 "  src="{{asset('imgs/books/dasCafe.jpg')}}" alt="Bild einer Buchempfehlung">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4   "  src="{{asset('imgs/books/schneewittchen.jpg')}}" alt="Bild einer Buchempfehlung">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4   "  src="{{asset('imgs/books/seidenstrassen.jpg')}}" alt="Bild einer Buchempfehlung">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4   "  src="{{asset('imgs/books/charlotteLink.jpg')}}" alt="Bild einer Buchempfehlung">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4   "  src="{{asset('imgs/books/spielDerZeit.jpg')}}" alt="Bild einer Buchempfehlung">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4   "  src="{{asset('imgs/books/sofiesWelt.jpeg')}}" alt="Bild einer Buchempfehlung">
                    <img class="md:h-36 md:w-36 h-24 w-24 object-cover rounded-full -mr-12 border-white border-4   "  src="{{asset('imgs/books/derAlchimist.jpg')}}" alt="Bild einer Buchempfehlung">
                    <div class="absolute md:bottom-10 bottom-20 w-[70%] md:w-[50%] h-20 bg-violet-500 rounded-full opacity-40 blur-3xl z-0 overflow-x-hidden"></div>
                </div>
            </div>
        </div>

    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
    <div class="">
        <div class="modal hidden 
            w-[95%] sm:w-[90%] md:w-[80%] lg:w-[60%] xl:w-[45%] 2xl:w-[40%]
            max-w-[700px]
            m-4 sm:m-6 md:m-8
            p-4 sm:p-6 md:p-8
            h-auto 
            max-h-[35vh] sm:max-h-[35vh] md:max-h-[75vh] lg:max-h-[75vh]
            bg-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 
            rounded-xl z-50
        ">       
        <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
            <form class="grid grid-rows-[2fr_8fr]" action="{{route('book.store')}}" method="POST">
                @csrf

                <div class="flex items-center justify-between mt-4">
                    <div class="flex md:flex-row flex-col imtes-center justify-center gap-4 w-[100%]">
                        <div class="relative flex md:flex-row flex-col imtes-center ustify-center gap-2 md:gap-4 w-[100%]">
                            <label class="flex items-center justify-start  md:justify-center text-[20px] md:text-xl" for="title">Titel:</label>
                            <div class="input-title-error text-red-500 absolute md:top-[95%] top-[45%] md:left-[10%]"></div>
                            <input  class="input-title rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[100%] md:w-[50%]" name="title" id="title" type="text">
                            
                            <label class="flex items-center justify-start md:justify-center text-[20px] md:text-xl" for="author">Author:</label>
                            <div class="relative">
                                <input autocomplete="off"  class="relative author-input rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[100%] md:w-[100%]" name="author" id="author" type="text">
                                <div class="absolute top-[3rem] left-[0%] rounded-l author-results bg-[#F2F2F2]"></div>
                            </div>
                        </div>
                        <div class="flex flex-row gap-4">
                            <label class=" flex items-center justify-start md:justify-center md:text-xl" for="seiten">Seiten:</label>
                            <select class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 md:w-[20%] w-[35%] w-full h-full" name="seiten"  id="seiten">
                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="250">250</option>
                                <option value="300">300</option>
                                <option value="350">350</option>
                                <option value="400">400</option>
                                <option value="450">450</option>
                                <option value="500">500</option>
                                <option value="550">550</option>
                                <option value="600">600</option>
                                <option value="650">650</option>
                                <option value="700">700</option>
                                <option value="750">750</option>
                                <option value="800">800</option>
                                <option value="850">850</option>
                                <option value="900">900</option>
                                <option value="950">950</option>
                                <option value="1000+">1000+</option>
                            </select>
                            <div class="flex flew-row whitespace-nowarp items-center justify-center md:hidden block">
                                <label class="flex items-col justify-start md:justify-center md:text-xl mr-2" for="cathegory">Kathegorie:</label>
                                <select  class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 md:w-[60%] w-[35%] w-full h-full" name="cathegory"  id="cathegory">
                                    <option value="" disabled selected></option>
                                    <option value="Roman">Roman</option>
                                    <option value="Krimi">Krimi</option>
                                    <option value="Biografie">Biografie</option>
                                    <option value="Ratgeber">Ratgeber</option>
                                    <option value="Geschichte">Geschichte</option>
                                    <option value="Wissenschaft">Wissenschaft</option>
                                    <option value="Natur">Natur</option>
                                    <option value="Philosofie">Philosofie</option>
                                    <option value="andere">andere ...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 h-[100%]">
                    <div class="flex flex-row items-center justify-between mb-2">
                        <div class="flex items-center justify-center">
                            <label class=" felx justify-center text-[20px] md:text-xl" for="description">Beschreibung:</label><br>
                        </div>
                        <div class="hidden md:flex flex-row items-center justify-center gap-2">
                            <label class="" for="cathegory">Kategorie:</label>
                            <select class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 md:w-[60%] w-full h-full" name="cathegory" id="cathegory">
                                <option value="" disabled selected></option>
                                <option value="Roman">Roman</option>
                                <option value="Krimi">Krimi</option>
                                <option value="Biografie">Biografie</option>
                                <option value="Ratgeber">Ratgeber</option>
                                <option value="Geschichte">Geschichte</option>
                                <option value="Wissenschaft">Wissenschaft</option>
                                <option value="Natur">Natur</option>
                                <option value="Philosofie">Philosofie</option>
                                <option value="andere">andere ...</option>
                            </select>
                        </div>

                    </div>
                    <textarea class="rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 h-[25%] w-[100%] md:w-[100%] md:h-[60%]" name="description"  id="description"></textarea>
                    <button
                        type="submit"
                        class="md:mt-2 px-6 py-2 w-[30%] rounded-full bg-blue-500 text-white font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300">Teilen
                    </button>            
                </div>
            </form>

        </div>
    </div>
    </body>
    <script>
        const modal = document.querySelector('.modal')
        const overlay = document.querySelector('.overlay')
        const addRecipe = document.querySelector('.btn-addRecipe')
        const xModal = document.querySelector('.x-modal')
        const inputTitle = document.querySelector('.input-title')
        const authorResults = document.querySelector('.author-results')
        const authorInput = document.querySelector('.author-input')
        const inputTitleError = document.querySelector('.input-title-error')
        
        const bookTitles = @json($books)  

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
 
    //CHECK AUTHORS
  
        const authors = @json($authors);

        function authorSearch(inputText){
            const regEx = new RegExp(`(^${inputText})`, 'gi')
            let matches = authors.filter( author => {
                return author.match(regEx)
            })
            
            if(inputText === ''){
                authorResults.innerHTML = ''
                return
            }
            
            console.log(matches)
            let html = matches.map(match => {
                const highlight = match.replace(regEx, '<b>$1</b>')
                return `<div class="px-2 py-1 hover:bg-gray-200 cursor-pointer rounded rounded-l" data-id='${match}'>${highlight}</div>`}).join('');
            authorResults.innerHTML = html;
        }

        authorResults.addEventListener('click', function(e){
            const click = e.target
            const data = e.target.dataset.id
            authorInput.value = data
            authorResults.innerHTML = ''

        })

        authorInput.addEventListener('input', () => authorSearch(authorInput.value))

            inputTitle.addEventListener('change', function(e){
            const input = e.target.value.trim()
                inputTitleError.innerHTML = ''
                inputTitle.classList.remove('border-red-500')
        
            const exists = Object.values(bookTitles).some(c => c.title === input)

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