<x-app-layout>
  <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-center lg:justify-center flex-col h-screen overflow-auto">

    @include('layouts.header')

    <div class="main-container grid grid-cols-1 md:grid-cols-[3fr_7fr] w-full max-w-7xl px-4 md:overflow-y-auto overflow-y-visible">

      <!-- Main Content: FIRST on small screens -->
      <div class="order-1 md:order-2 md:col-start-2 p-4 mt-16">
        <div class="flex justify-between flex-row mb-4">
          <div class="md:flex flex-col items-start justify-start">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6 mt-8">
                <span class="inline-block relative">
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-cyan-500 rounded-lg z-0"></span>
                    <span class="relative z-10">{{$trick->title}}</span>
                </span>
                </h2>

                <div class="flex items-center gap-4 justify-center mt-8 mb-8 gap-12 ml-1">
                  {{--LIKTE BUTTON--}}
                  <x-like-button :likeable="$trick"/>
                     <div  class="flex flex-row items-center gap-4 w-[100%]">
                        <svg class="h-6 w-6 -mr-2 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 400C394.6 400 458.4 353.6 484 288L488 288C501.3 288 512 277.3 512 264L512 184C512 170.7 501.3 160 488 160L484 160C458.4 94.4 394.6 48 320 48C245.4 48 181.6 94.4 156 160L152 160C138.7 160 128 170.7 128 184L128 264C128 277.3 138.7 288 152 288L156 288C181.6 353.6 245.4 400 320 400zM304 144L336 144C389 144 432 187 432 240C432 293 389 336 336 336L304 336C251 336 208 293 208 240C208 187 251 144 304 144zM112 548.6C112 563.7 124.3 576 139.4 576L192 576L192 528C192 510.3 206.3 496 224 496L416 496C433.7 496 448 510.3 448 528L448 576L500.6 576C515.7 576 528 563.7 528 548.6C528 488.8 496.1 436.4 448.4 407.6C412 433.1 367.8 448 320 448C272.2 448 228 433.1 191.6 407.6C143.9 436.4 112 488.8 112 548.6zM279.3 205.5C278.4 202.2 275.4 200 272 200C268.6 200 265.6 202.2 264.7 205.5L258.7 226.7L237.5 232.7C234.2 233.6 232 236.6 232 240C232 243.4 234.2 246.4 237.5 247.3L258.7 253.3L264.7 274.5C265.6 277.8 268.6 280 272 280C275.4 280 278.4 277.8 279.3 274.5L285.3 253.3L306.5 247.3C309.8 246.4 312 243.4 312 240C312 236.6 309.8 233.6 306.5 232.7L285.3 226.7L279.3 205.5zM248 552L248 576L296 576L296 552C296 538.7 285.3 528 272 528C258.7 528 248 538.7 248 552zM368 528C354.7 528 344 538.7 344 552L344 576L392 576L392 552C392 538.7 381.3 528 368 528z"/></svg>                        
                        @if(!$trick->anonym)
                          <p class="text-lg">{{$trick->user->name}}</p>
                        @else
                          <p class="text-lg">Anonym</p>
                        @endif
                    </div>

                </div>

          </div>

          <div class="flex justify-center">
          </div>
        </div>

        <div class="mt-4 w-full max-w-4xl mx-auto text-gray-800 dark:text-gray-300">
          <p>
            {{$trick->description}}          
          </p>
        </div>
      </div>

      <!-- Comments: SECOND on small screens -->
      <div class="comment-left-container max-h-[80vh] md:overflow-y-auto scroll-container p-4 order-2 md:order-1 md:col-start-1 md:border-r md:border-gray-300"> 
        @auth
          <form action="javascript:void(0)" class="comment-form relative md:hidden" method="POST">
            @csrf
            <textarea class=" textarea-input bg-blue-200 hover:bg-white mb-12 block md:hidden bottom-1 left-2 md:text-[0.8rem] w-[100%] h-[6rem] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
            <button class="btn-form-submit block md:hidden rounded-full bg-white flex items-center justify-center rounded-full " type="submit">
              <svg class="absolute top-[45%] bg-white left-[91%] h-6 w-6 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
            </button>
          </form>
        @endauth

        <div class="comment-container">
            @if($comments->isEmpty())
              @guest
                <p class="italic text-center text-[0.9rem] mt-4 mb-8">Noch keine Kommentare vorhanden... <br> Registreiren Sie sich um Kommentare zu schreiben.</p>
              @endguest
              
              @auth
              <div class="default-comment">
                <p class="italic text-center text-[0.9rem] mt-4 mb-8">Noch keine Kommentare vorhanden... <br> Sei der Erste!</p>
              </div>            
              @endauth              
            @else
              @foreach($comments as $comment)
                <div class="hover:bg-gray-200 p-2 rounded-[9px] bg-[#EAECEF] flex flex-col gap-2 mb-4">
                  <div class="flex items-center justify-between">
                      <div class="flex items-center  gap-2">
                          <img class="h-7 w-7 rounded-full border border-black" src="{{ asset('imgs/User/avatarBgremove.png') }}" alt="User Avatar">
                          <h3 class="text-[1rem] md:text-[1rem]">{{$comment->user->name}}</h3>
                      </div>
                    <p class="flex-between mr-4 text-[1rem] md:text-[0.9rem]"># {{ $loop->count - $loop->index}}</p>
                  </div>
                  <p class="text-gray-700 text-[0.85rem] md:text-[0.85rem] w-[80%] ml-1 leading-tight">{{$comment->comment}}</p>
                </div>
              @endforeach
            @endif
        </div>
        @auth
          <form action="javascript:void(0)" class="comment-form" method="POST">
            @csrf
            <textarea class="textarea-input fixed bg-blue-200 hover:bg-white hidden md:block bottom-4 left-8 md:text-[0.8rem] w-[27%] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
            <button class="btn-form-submit hidden md:block flex items-center justify-center rounded-full " type="submit">
              <svg class="absolute bottom-[4%] bg-white left-[26.5%] h-6 w-6 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
            </button>
          </form>
        @endauth
        </div>
      </div>
    <script>
        document.addEventListener('DOMContentLoaded', async function(){
        const form = document.querySelector('.comment-form')
        const commentable_id = @json($trick->id);
        const csrfToken = @json(csrf_token());
        const commentContainer = document.querySelector('.comment-container')
        const btnFormSubmit = document.querySelectorAll('.btn-form-submit')
        const comments = @json($comments);
        const defaultComment = document.querySelector('.default-comment')
        const isLoggedIn = @json(auth()->check());
        const commentLeftContainer = document.querySelector('.comment-left-container')

        if(!isLoggedIn){
          commentLeftContainer.classList.add('max-h-[91vh]')
          commentLeftContainer.classList.remove('max-h-[80vh]')
        }

      //CREATE COMMENTS FUNCTION
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
          dataObj['commentable_type'] = 'App\\Models\\Trick'
          
          const res = await fetch('{{route('comment.store')}}', {
            method: 'POST',
            body: JSON.stringify(dataObj),
            headers:{
              'Content-Type' : 'application/json',
              'Accept' : 'application/json',
              'X-CSRF-TOKEN' : csrfToken,
            }
          })
          
          console.log(res)
          if(res.ok) {
            const data = await res.json()
            console.log(data.new_comments)

            const markup = data.new_comments.map((comment, i) => {
              const iteration = data.new_comments.length - i
              return `
              <div class="hover:bg-gray-200 p-2 rounded-[9px] bg-[#EAECEF] flex flex-col gap-2 mb-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center  gap-2"> 
                    <img class="h-7 w-7 rounded-full border border-black" src="{{ asset('imgs/User/avatarBgremove.png') }}" alt="User Avatar">
                    <h3 class="text-[1rem] md:text-[1rem]">${comment.user.name}</h3>
                    </div>
                    <p class="flex-between mr-4 text-[1rem] md:text-[0.9rem]"># ${iteration}</p>
                    </div>
                    <p class="text-gray-700 text-[0.85rem] md:text-[0.85rem] w-[80%] ml-1 leading-tight">${comment.comment}</p>
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
                <a href="{{route('cooking.index')}}" class="back-button absolute z-50 top-2 left-4">
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
      })

      function renderHomeButton(){
            const backButton = document.querySelector('.back-button')
            const mainContainer = document.querySelector('.main-container')

            if(!backButton){
              const markup = `
                <a href="{{route('welcome')}}" class="back-button absolute z-50 top-2 left-4">
                  <div class="bg-white rounded-full h-8 w-8 flex items-center justify-center">
                    <svg fill="white"  stroke-width="30" stroke="black" class="h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z"/></svg>
                  </div>
                </a>
              `
              mainContainer.insertAdjacentHTML('beforeend', markup)
            }
          }

      if (document.referrer === '') {
        renderHomeButton()
      }

    </script>
  </body>
</x-app-layout>
