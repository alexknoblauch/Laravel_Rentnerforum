<x-app-layout>
  <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-center lg:justify-center flex-col h-screen overflow-auto">

    @include('layouts.header')

    <div class="main-container grid grid-cols-1 md:grid-cols-[3fr_7fr] w-full max-w-7xl px-4 md:overflow-y-auto overflow-y-visible">

      <!-- Main Content: FIRST on small screens -->
      <div class="order-1 md:order-2 md:col-start-2 p-4 md:mt-16 mt-8">
        <div class="flex flex-col md:flex-row mb-4">
          <div class="md:flex flex-col md:items-start items-center justify-start order-2 md:order-1">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6 mt-8">
                <span class="inline-block relative">
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-yellow-300 rounded-lg z-0"></span>
                    <span class="relative z-10">{{ $travel->title }}</span>
                </span>
                </h2>

                <div class="flex md:flex-row items-center md:gap-4 gap-2 justify-center mt-8 mb-8 whitespace-nowrap">
                  {{--LIKTE BUTTON--}}
                  <x-like-button :likeable="$travel"/>
                    <svg class="h-6 w-6 -mr-2 shrink-0 -mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                    <p class="text-lg whitespace-nowrap">{{$travel->gemeinde->gemeinde}} / {{$travel->canton}}</p>
                </div>
          </div>

          <div class="flex justify-center order-1">
            <img class="md:ml-12 ml-0 h-40 w-40  rounded-xl shadow" src="{{ Storage::disk('s3')->url($travel->image)}}"  alt="Foto des Ortes">
          </div>
        </div>

        <div class="mt-4 w-full max-w-4xl mx-auto text-gray-800 dark:text-gray-300">
          <p>
            {{$travel->description}}         
          </p>
        </div>
      </div>

      <!-- Comments: SECOND on small screens -->
      <div class="comment-left-container max-h-[80vh] md:overflow-y-auto scroll-container p-4 order-2 md:order-1 md:col-start-1">
        <form action="javascript:void(0)" class="comment-form relative md:hidden" method="POST">
          <textarea class="textarea-input bg-blue-200 hover:bg-white mb-12 block md:hidden bottom-1 left-2 md:text-[0.8rem] w-[100%] h-[6rem] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
          <button class="btn-form-submit block md:hidden rounded-full bg-white flex items-center justify-center rounded-full " type="submit">
            <svg class="absolute top-[45%] bg-white left-[91%] h-6 w-6 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
          </button>
        </form>
          @if($comments->isEmpty())
              <div class="default-comment">
                @guest
                  <p class="italic text-center text-[0.9rem] mt-8 mb-8">Noch keine Kommentare vorhanden... <br> Registreiren Sie sich um Kommentare zu schreiben.</p>
                @endguest
                @auth
                  <p class="italic text-center text-[0.9rem] mt-8 mb-8">Noch keine Kommentare vorhanden... <br> Sei der Erste!</p>
                @endauth
              </div>         
          @endif
        <div class="comment-container">
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
        const commentable_id = @json($travel->id);
        const csrfToken = @json(csrf_token());
        const comments = @json($comments);
        const defaultComment = document.querySelector('.default-comment')
        const commentContainer = document.querySelector('.comment-container')
        const btnFormSubmit = document.querySelectorAll('.btn-form-submit')
        const isLoggedIn = @json(auth()->check());
        const commentLeftContainer = document.querySelector('.comment-left-container')

        if(!isLoggedIn){
          commentLeftContainer.classList.add('max-h-[91vh]')
          commentLeftContainer.classList.remove('max-h-[80vh]')
        }

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
          dataObj['commentable_type'] = 'App\\Models\\Travel'
          
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
            const data = await res.json()
            console.log(data)

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
      })

        //CREATE ZURÜCK BUTTON FÜR MOBILE
          function renderBackButton(){
            const backButton = document.querySelector('.back-button')
            const isMobileWith = window.innerWidth < 768
            const mainContainer = document.querySelector('.main-container')

            if(!backButton && isMobileWith){
              const markup = `
                <a href="{{route('travel.index')}}" class="back-button absolute z-50 top-2 left-4">
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
