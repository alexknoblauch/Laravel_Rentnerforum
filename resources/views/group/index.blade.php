<x-app-layout>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex  items-center lg:justify-center flex-col overflow-x-hidden">
       @include('layouts.header')

    <div class="main-container grid grid-cols-[1fr]  md:grid-cols-[3fr_7fr] px-4 md:overflow-y-hidden">
        <div class="group-container mb-2 flex flex-col gap-2 md:border-r md:border-gray-300 order-2 md:order-1 max-h-[calc(100vh-3rem)] md:overflow-y-auto overflow-y-visible scroll-container ">
            @foreach ($groups as $group)
                <a href="{{route('group.show', ['groupSlug' => $group->title_slug])}}" class="cursor-pointer hover:bg-gray-200 p-4 py-4 grid grid-cols-[8fr_2fr] mt-4 md:bg-inherit bg-[#EAECEF] rounded-[9px]">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center font-semibold text-lg md:text-base">
                            <svg class="h-5 w-5 mr-2 opacity-60 am:mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 64C355.3 64 384 92.7 384 128C384 163.3 355.3 192 320 192C284.7 192 256 163.3 256 128C256 92.7 284.7 64 320 64zM416 376C416 401 403.3 423 384 435.9L384 528C384 554.5 362.5 576 336 576L304 576C277.5 576 256 554.5 256 528L256 435.9C236.7 423 224 401 224 376L224 336C224 283 267 240 320 240C373 240 416 283 416 336L416 376zM160 96C190.9 96 216 121.1 216 152C216 182.9 190.9 208 160 208C129.1 208 104 182.9 104 152C104 121.1 129.1 96 160 96zM176 336L176 368C176 400.5 188.1 430.1 208 452.7L208 528C208 529.2 208 530.5 208.1 531.7C199.6 539.3 188.4 544 176 544L144 544C117.5 544 96 522.5 96 496L96 439.4C76.9 428.4 64 407.7 64 384L64 352C64 299 107 256 160 256C172.7 256 184.8 258.5 195.9 262.9C183.3 284.3 176 309.3 176 336zM432 528L432 452.7C451.9 430.2 464 400.5 464 368L464 336C464 309.3 456.7 284.4 444.1 262.9C455.2 258.4 467.3 256 480 256C533 256 576 299 576 352L576 384C576 407.7 563.1 428.4 544 439.4L544 496C544 522.5 522.5 544 496 544L464 544C451.7 544 440.4 539.4 431.9 531.7C431.9 530.5 432 529.2 432 528zM480 96C510.9 96 536 121.1 536 152C536 182.9 510.9 208 480 208C449.1 208 424 182.9 424 152C424 121.1 449.1 96 480 96z"/></svg>
                            <h3 class="text-[1.1rem]">{{ Str::limit($group->title, 40) }}</h3>
                        </div>
                    </div>                  
                </a>
            @endforeach  
        </div>

        <div class="md:p-12 p-6 -mt-12 text-center leading-[3rem] order-1 md:order-2">
            <div class="flex flex-col items-center justify-center mb-8 mt-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6">
                    <span class="inline-block relative">
                        <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-orange-500 rounded-lg z-0"></span>
                        <span class="relative z-10">Gruppen</span>
                    </span>
                    <br>
                    <span class="block mt-3 text-base sm:text-xl md:text-2xl text-gray-600 font-light">
                        <p>Gruppenspezifische Themen</p>
                    </span>
                </h2>
                </div>

                <div class="flex items-center flex-col justify-center">
                    <p class="italic mx-4 -mt-4 md:-mt-0 md:block text-center text-sm md:text-[1rem] max-w-[80%]">Kreieren Sie eine Gruppe um gemeinsame Interessen zu diskutieren und arrangieren.</p>
                    <div class="flex items-center gap-2 justify-center mt-8">
                        <svg class="cursor-pointer btn-addRecipe h-[2.8rem] w-[2.8rem] p-2 bg-blue-300 border rounded-xl " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                        <p class="italic">Neue Gruppe</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
        <div class="">
            <div class="modal hidden m-4 sm:m-6 md:m-12 lg:m-16 p-4 sm:p-6 md:p-8 w-[90%] sm:w-[85%] md:w-[70%] lg:w-[55%] xl:w-[45%] 2xl:w-[40%] h-auto max-h-[90vh] overflow-y-auto bg-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-xl z-50">            <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
                @auth
                    
                <form class="form grid grid-rows-[2fr_8fr]" action="" method="POST">
                    @csrf
                    
                    <div class="flex items-center justify-between mt-4">
                        
                        <div class="relative flex flex-row imtes-center ustify-center gap-4 w-[100%]">
                            <label class="flex items-center justify-center text-[20px] md:text-xl" for="title">Titel:</label>
                            <div class="input-title-error text-red-500 absolute top-[95%] md:left-[15%] left-[25%]"></div>
                            <input  class="input-title rounded-xl outline-none focus:ring-0 focus:outline-none focus:border-gray-500 w-[50%]" name="title" id="title" type="text">
                        </div>
                        
                    </div>
                    <div class="mt-4 h-[100%]">
                        <p>Bitte vergewissern Sie sich zuerst ob die betreffende Gruppe bereits existiert. Danke!<br>Bitte nur Allgemeine Gruppennamen vergeben.<br> Zum Beispiel "<b>Schach</b>" nicht "<b><s>Schach Freunde</s></b>" oder "<b><s>Schachfiguren</s></b>". </p>So können wir einen Gruppen Überschuss vermeiden.
                        <div class=" flex justify-center items-center">
                            <button type="submit" class="btn-submit mt-4 px-6 py-2 md:w-[30%] rounded-full bg-blue-500 text-white font-semibold shadow-md hover:from-blue-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300">Erstellen</button>            
                        </div>
                    </form>
                    @endauth
                    @guest
                        <div class=" mt-24 md:mt-0">
                                <div class="flex text-center items-center justify-center">
                                    <p class="items-center justify-center">Registrieren Sie sich im Forum um interaktiv teilzunehmen.</p>
                                </div>    
                        </div>
                    @endguest
                </div>
        </div>
    
    <script>
        const modal = document.querySelector('.modal')
        const overlay = document.querySelector('.overlay')
        const addRecipe = document.querySelector('.btn-addRecipe')
        const xModal = document.querySelector('.x-modal')
        const btnSubmit = document.querySelector('.btn-submit')
        const form = document.querySelector('.form')
        const csrfToken = @json(csrf_token());
        const groupContainer = document.querySelector('.group-container')


        if(btnSubmit) {
        btnSubmit.addEventListener('click', async function(e){
            e.preventDefault()
            const click = e.target
            if(!click) return

            const formdata = new FormData(form)

            try{
                const res = await fetch("{{route('group.store')}}", {
                    method: 'POST',
                    body: formdata,
                    headers: {
                        'X-CSRF-TOKEN' : csrfToken,
                        'Accept' : 'application/json' 
                    }
                })

                const data = await res.json()
                console.log(data)

                const markup = `
                    <a href="route('group.show', ['groupSlug' => ${data.title_slug}])" class="cursor-pointer hover:bg-gray-200 p-4 py-4 grid grid-cols-[8fr_2fr] mt-4 md:bg-inherit bg-[#EAECEF] rounded-[9px]">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center font-semibold text-lg md:text-base">
                                <svg class="h-5 w-5 mr-2 opacity-60 am:mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 64C355.3 64 384 92.7 384 128C384 163.3 355.3 192 320 192C284.7 192 256 163.3 256 128C256 92.7 284.7 64 320 64zM416 376C416 401 403.3 423 384 435.9L384 528C384 554.5 362.5 576 336 576L304 576C277.5 576 256 554.5 256 528L256 435.9C236.7 423 224 401 224 376L224 336C224 283 267 240 320 240C373 240 416 283 416 336L416 376zM160 96C190.9 96 216 121.1 216 152C216 182.9 190.9 208 160 208C129.1 208 104 182.9 104 152C104 121.1 129.1 96 160 96zM176 336L176 368C176 400.5 188.1 430.1 208 452.7L208 528C208 529.2 208 530.5 208.1 531.7C199.6 539.3 188.4 544 176 544L144 544C117.5 544 96 522.5 96 496L96 439.4C76.9 428.4 64 407.7 64 384L64 352C64 299 107 256 160 256C172.7 256 184.8 258.5 195.9 262.9C183.3 284.3 176 309.3 176 336zM432 528L432 452.7C451.9 430.2 464 400.5 464 368L464 336C464 309.3 456.7 284.4 444.1 262.9C455.2 258.4 467.3 256 480 256C533 256 576 299 576 352L576 384C576 407.7 563.1 428.4 544 439.4L544 496C544 522.5 522.5 544 496 544L464 544C451.7 544 440.4 539.4 431.9 531.7C431.9 530.5 432 529.2 432 528zM480 96C510.9 96 536 121.1 536 152C536 182.9 510.9 208 480 208C449.1 208 424 182.9 424 152C424 121.1 449.1 96 480 96z"/></svg>
                                <h3 class="text-[1.1rem]">${data.title}</h3>
                            </div>
                        </div>                  
                    </a>
                `
                groupContainer.insertAdjacentHTML('afterbegin', markup)

            } catch (error){
                console.log(error)
            }
        })
        }

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