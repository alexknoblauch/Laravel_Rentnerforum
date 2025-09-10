<x-app-layout>
  <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-center lg:justify-center flex-col h-screen overflow-auto">

    @include('layouts.header')

    <div class="main-container grid grid-cols-1 md:grid-cols-[3fr_7fr] w-full max-w-7xl px-4 md:overflow-y-auto overflow-y-visible">

      <!-- MAIN CONTENT -->
      <div class="order-1 md:order-2 md:col-start-2 p-4 mt-16">
        <div class="flex justify-between flex-row mb-4">
          <div class="md:flex flex-col items-start justify-start">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6 mt-8">
                <span class="inline-block relative">
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-red-500 rounded-lg z-0"></span>
                    <span class="relative z-10">{{ $post->title }}</span>
                </span>
                </h2>

          <div class="flex items-center gap-8 justify-center mt-8 mb-8">
            <div class="flex items-center gap-2">
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor">
                <path d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/>
              </svg>
              <p class="text-lg whitespace-nowrap">{{$post->gemeinde->gemeinde}} / {{$post->canton}}</p>
            </div>

            @if($post->is_active)
              @if($post->user->id !== auth()->id())
                <a data-contactid="{{$post->user_id}}" class="btn-contact flex items-center gap-2 cursor-pointer">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor">
                    <path d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z"/>
                  </svg>
                  <p class="text-lg whitespace-nowrap">Kontakt</p>
                </a>
              @endif
            @endif

            @if($post->user->id === auth()->id())
              <div class="flex justify-center items-center">
                <input class="h-4 w-4 rounded-full black mr-2 post-active-submit" id="activatePost" name="activatePost" type="checkbox" @if ($post->is_active === 0) checked @endif>
                <label class="text-lg" for="activatePost">Post deaktivieren <i class="text-sm">(keine Nachrichten mehr senden)</i>
              </div>
            @endif
          </div>
        </div>
      </div>

        <div class="mt-4 w-full max-w-4xl mx-auto text-gray-800 dark:text-gray-300">
          <p>
            {{$post->description}}          
          </p>
        </div>
      </div>

      <!-- COMMENTS -->
      <div class="comment-left-container max-h-[80vh] md:overflow-y-auto scroll-container p-4 order-2 md:order-1 md:col-start-1 md:border-r md:border-gray-300"> 
        @auth
        <form action="javascript:void(0)" class="comment-form relative md:hidden" method="POST">
          @csrf
          <textarea class="textarea-input bg-blue-100 hover:bg-white mb-12 block md:hidden bottom-1 left-2 md:text-[0.8rem] w-[100%] h-[6rem] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
          <button class="btn-form-submit block md:hidden rounded-full bg-white flex items-center justify-center rounded-full " type="submit">
            <svg class="absolute top-[45%] bg-white left-[91%] h-6 w-6 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
          </button>
        </form>
        @endauth
          @if($comments->isEmpty())
              <div class="default-comment">
                <p class="italic text-center text-[0.9rem] mt-4 mb-8">Noch keine Kommentare vorhanden... <br> Sei der Erste!</p>
              </div>           
          @endif
        <div class="comment-container">
          @foreach($comments as $comment)
            <div class="hover:bg-gray-200 p-2 rounded-[9px] bg-[#EAECEF] flex flex-col gap-2 mb-4">
              <div class="flex items-center justify-between">
                  <div class="flex items-center  gap-2">
                      <h3 class="text-[0.7rem] md:text-[0.9rem]">{{$comment->user->name}}</h3>
                  </div>
                <p class="flex-between mr-4 text-[0.7rem] md:text-[0.9rem]">#{{ $loop->count - $loop->index}}</p>
              </div>
              <p class="text-gray-700 text-[0.7rem] md:text-[0.7rem] w-[80%]">{{$comment->comment}}</p>
            </div>
          @endforeach
        </div>
        @auth
        <form class="comment-form" method="POST">
          @csrf
          <textarea class="textarea-input fixed bg-blue-100 hover:bg-white hidden md:block bottom-4 left-8 md:text-[0.8rem] w-[27%] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
          <button class="btn-form-submit hidden md:block flex items-center justify-center rounded-full " type="submit">
            <svg class="absolute bottom-[4%] bg-white left-[26.5%] h-6 w-6 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
          </button>
        </form>
        @endauth
        </div>
    </div>


      <!-- MODAL -->
    <div class="overlay hidden fixed inset-0 bg-black/50 z-40"></div>
      <div class="modal hidden m-8 p-8 md:m-24 md:h-[40%] md:w-[30%] rounded-xl w-[90%] h-[70%] bg-white fixed inset-0 top-[40%] md:top-[30%] left-[45%] transform -translate-x-1/2 -translate-y-1/2 z-50 flex flex-col">
          <form data-sendto="{{ $post->user->id }}" class="form-message" method="POST">
            @csrf
            <span class="x-modal cursor-pointer p-1 border-none rounded-xl bg-gray-200 absolute right-2 top-2"><svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
            <p class="text-[20px] mb-2">Nachricht:</p>
            <textarea name="message" class="w-full flex-grow resize-none rounded-lg border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            <button type="submit" class="btn-message-submit mt-4 px-6 py-2 self-en d rounded-full bg-blue-500 text-white font-semibold shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 transition-all duration-300">
              Senden
            </button>
          </form>
      </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function(){
        const form = document.querySelector('.comment-form')
        const commentable_id = @json($post->id);
        const csrfToken = @json(csrf_token());
        const comments = @json($comments);
        const defaultComment = document.querySelector('.default-comment')
        const commentContainer = document.querySelector('.comment-container')
        const btnFormSubmit = document.querySelectorAll('.btn-form-submit')
        const btnContact = document.querySelector('.btn-contact')
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        const commentLeftContainer = document.querySelector('.comment-left-container')
        const postActive = document.querySelector('.post-active-submit')

        if(!isLoggedIn){
          commentLeftContainer.classList.add('max-h-[91vh]')
          commentLeftContainer.classList.remove('max-h-[80vh]')
        }


        // Activate-desactive Post checkbox
        if(postActive){
          postActive.addEventListener('change', function(){
            const res = fetch(`/helfende-hand/${commentable_id}/active-deactivate`,{
              method: 'POST',
              headers : {
                'X-CSRF-TOKEN' : csrfToken,
              }
            })


          })
        }


        //MODAL FUNKTIONEN
        const overlay = document.querySelector('.overlay')
        const modal = document.querySelector('.modal')
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
         
        if(btnContact){
          btnContact.addEventListener('click', openColoseModal)
        }
        xModal.addEventListener('click', openColoseModal)
        document.addEventListener('keydown', function(e){
          if (e.key === 'Escape'){
            openColoseModal()
          }
        })


        //COMMENTS
        btnFormSubmit.forEach(btn => {
          btn.addEventListener('click', async function(e){
          e.preventDefault()
          const dataObj = {}

          const form = btn.closest('form')
          const textarea = form.querySelector('.textarea-input')

          if(textarea){
            const comment = textarea.value
              if(comment){
              dataObj['comment'] = comment
            }
          }

          dataObj['commentable_id'] = commentable_id
          dataObj['commentable_type'] = 'App\\Models\\Helping'
          
          const res = await fetch('{{route('comment.store')}}', {
            method: 'POST',
            body: JSON.stringify(dataObj),
            headers:{
              'Content-Type' : 'application/json',
              'Accept' : 'application/json',
              'X-CSRF-TOKEN' : csrfToken,
            }
          })
          
          if(res.ok) {
            commentContainer.innerHTML = '' 
            const data = await res.json()
            console.log(data)

            const markup = data.new_comments.map((comment, i) => {
              const iteration = data.new_comments.length - i
              return `
              <div class="hover:bg-gray-200 p-2 rounded-[9px] bg-[#EAECEF] flex flex-col gap-2 mb-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center  gap-2"> 
                    <img class="h-7 w-7 rounded-full border border-black" src="{{ asset('imgs/User/avatarBgremove.png') }}" alt="User Avatar">
                    <h3 class="text-[0.7rem] md:text-[0.9rem]">${comment.user.name}</h3>
                    </div>
                    <p class="flex-between mr-4 text-[0.7rem] md:text-[0.9rem]">#${iteration}</p>
                    </div>
                    <p class="text-gray-700 text-[0.7rem] md:text-[0.7rem] w-[80%]">${comment.comment}</p>
                    </div>
                    `
                  }).join('')
                  
                  if(comments.length === 0) defaultComment.innerHTML = ''
                  commentContainer.innerHTML = markup
                  textarea.value = ''
                }
              })
            })


          //CREATE ZURÜCK BUTTON FÜR MOBILE
          function renderBackButton(){
            const backButton = document.querySelector('.back-button')
            const isMobileWith = window.innerWidth < 768
            const mainContainer = document.querySelector('.main-container')

            if(!backButton && isMobileWith){
              const markup = `
                <a href="{{route('helping.index')}}" class="back-button absolute z-50 top-2 left-4">
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


          //SEND MESSAGE
          const btnSubmitMessage = document.querySelector('.btn-message-submit')
          const formMessage = document.querySelector('.form-message')
          const sendTo = formMessage.dataset.sendto
          const messageUrl = ""
          console.log(sendTo)

          formMessage.addEventListener('submit', async function(e){
            e.preventDefault()
            const formData = new FormData(formMessage)
            formData.append('sendto', sendTo)
            console.log(formData.get('sendto'))

            const res = await fetch("{{route('nachricht.create')}}", {
              method: 'POST',
              body: formData,
              headers: {
                'X-CSRF-TOKEN' : csrfToken,
                'Accept' : 'application/json'
              }
            })

            const data = res.json()
            console.log(data)

            modal.classList.toggle('hidden')
            overlay.classList.toggle('hidden')      
        })
      })
    </script>
  </body>
</x-app-layout>
