<x-app-layout>
  <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-center lg:justify-center flex-col h-screen overflow-auto">

    @include('layouts.header')

    <div class="main-container grid grid-cols-1 md:grid-cols-[3fr_7fr] w-full max-w-7xl px-4 md:overflow-y-auto overflow-y-visible">

      <!-- Main Content: FIRST on small screens -->
      <div class="order-1 md:order-2 md:col-start-2 p-4 mt-16">
        <div class="flex md:flex-row flex-col-reverse justify-between mb-4">
          <div class="flex flex-col items-center justify-center md:items-start md:justify-start">
                <h2 class="w-[90%] text-2xl sm:text-4xl md:text-5xl font-serif text-gray-900 text-center relative mb-6 mt-8">
                <span class="inline-block relative">
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-11/12 h-2 bg-violet-500 rounded-lg z-0"></span>
                    <span class="relative z-10">{{ $book->title }}</span>
                </span>
                </h2>

              <div class="flex items-center gap-8 justify-center mt-8 mb-8">
                <div class="flex flex-col md:flex-row items-center md:gap-8 gap-4">
                  {{--############--}}                 
                  {{--LIKTE BUTTON--}}
                  {{--############--}}   
                  <x-like-button :likeable="$book"/>
                    <div  class="flex flex-row items-center gap-4 w-[100%]">
                        <svg class="h-6 w-6 -mr-2 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 400C394.6 400 458.4 353.6 484 288L488 288C501.3 288 512 277.3 512 264L512 184C512 170.7 501.3 160 488 160L484 160C458.4 94.4 394.6 48 320 48C245.4 48 181.6 94.4 156 160L152 160C138.7 160 128 170.7 128 184L128 264C128 277.3 138.7 288 152 288L156 288C181.6 353.6 245.4 400 320 400zM304 144L336 144C389 144 432 187 432 240C432 293 389 336 336 336L304 336C251 336 208 293 208 240C208 187 251 144 304 144zM112 548.6C112 563.7 124.3 576 139.4 576L192 576L192 528C192 510.3 206.3 496 224 496L416 496C433.7 496 448 510.3 448 528L448 576L500.6 576C515.7 576 528 563.7 528 548.6C528 488.8 496.1 436.4 448.4 407.6C412 433.1 367.8 448 320 448C272.2 448 228 433.1 191.6 407.6C143.9 436.4 112 488.8 112 548.6zM279.3 205.5C278.4 202.2 275.4 200 272 200C268.6 200 265.6 202.2 264.7 205.5L258.7 226.7L237.5 232.7C234.2 233.6 232 236.6 232 240C232 243.4 234.2 246.4 237.5 247.3L258.7 253.3L264.7 274.5C265.6 277.8 268.6 280 272 280C275.4 280 278.4 277.8 279.3 274.5L285.3 253.3L306.5 247.3C309.8 246.4 312 243.4 312 240C312 236.6 309.8 233.6 306.5 232.7L285.3 226.7L279.3 205.5zM248 552L248 576L296 576L296 552C296 538.7 285.3 528 272 528C258.7 528 248 538.7 248 552zM368 528C354.7 528 344 538.7 344 552L344 576L392 576L392 552C392 538.7 381.3 528 368 528z"/></svg>                        
                        <p class="text-lg">{{$book->author->author}}</p>
                    </div>
                    <div class="flex flex-row items-center justify-end gap-4 mr-4">
                        <svg class="h-6 w-6 -mr-2 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M104 112C90.7 112 80 122.7 80 136L80 184C80 197.3 90.7 208 104 208L152 208C165.3 208 176 197.3 176 184L176 136C176 122.7 165.3 112 152 112L104 112zM256 128C238.3 128 224 142.3 224 160C224 177.7 238.3 192 256 192L544 192C561.7 192 576 177.7 576 160C576 142.3 561.7 128 544 128L256 128zM256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L256 288zM256 448C238.3 448 224 462.3 224 480C224 497.7 238.3 512 256 512L544 512C561.7 512 576 497.7 576 480C576 462.3 561.7 448 544 448L256 448zM80 296L80 344C80 357.3 90.7 368 104 368L152 368C165.3 368 176 357.3 176 344L176 296C176 282.7 165.3 272 152 272L104 272C90.7 272 80 282.7 80 296zM104 432C90.7 432 80 442.7 80 456L80 504C80 517.3 90.7 528 104 528L152 528C165.3 528 176 517.3 176 504L176 456C176 442.7 165.3 432 152 432L104 432z"/></svg>
                        <p class="text-lg  ">{{$book->cathegory}}</p>
                    </div>
                </div>
              </div>
          </div>

          <div class="flex justify-center items-center">
            <img class="md:mr-20 lg:mr-36 h-60 object-contain z-10" src="{{ Storage::disk('s3')->url($book->image) }}" alt="Foto des Buchs">         
          </div>
        </div>

        <div class="text-center md:text-start mt-4 w-full max-w-4xl mx-auto text-gray-800 dark:text-gray-300">
          <p>
            {{$book->description}}          
          </p>
        </div> 
      </div>

      <!-- Comments: SECOND on small screens -->
      <div class="comment-left-container max-h-[80vh] md:overflow-y-auto scroll-container p-4 order-2 md:order-1 md:col-start-1 ">
        @auth
          <form action="javascript:void(0)" class="comment-form relative md:hidden" method="POST">
            @csrf
            <textarea class=" textarea-input bg-blue-200 mb-12 block md:hidden bottom-1 left-2 md:text-[0.8rem] w-[100%] h-[6rem] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
            <button class="btn-form-submit block md:hidden rounded-full bg-white flex items-center justify-center rounded-full " type="submit">
              <svg class="absolute top-[45%] bg-white left-[91%] h-6 w-6 z-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
            </button>
          </form>
        @endauth
        @if($comments->isEmpty())
              @guest
                <p class="italic text-center text-[0.9rem] mt-8 mb-8">Noch keine Kommentare vorhanden... <br> Registreiren Sie sich um Kommentare zu schreiben.</p>
              @endguest
              
              @auth
              <div class="default-comment">
                <p class="italic text-center text-[0.9rem] mt-8 mb-8">Noch keine Kommentare vorhanden... <br> Sei der Erste!</p>
              </div>            
              @endauth
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
            <textarea class="textarea-input fixed bg-blue-200 hidden md:block bottom-4 left-8 md:text-[0.8rem] w-[27%] rounded-xl bg-gray-100 outline-none focus:ring-0 focus:border-black" placeholder="Dein Kommentar ..." name="comment"></textarea>
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
        const commentable_id = @json($book->id);
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
        


      // WRITE COMMENTS FUNCTION
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
          dataObj['commentable_type'] = 'App\\Models\\Book'
          
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

        //CREATE ZURÜCK BUTTON FÜR MOBILE
          function renderBackButton(){
            const backButton = document.querySelector('.back-button')
            const isMobileWith = window.innerWidth < 768
            const mainContainer = document.querySelector('.main-container')

            if(!backButton && isMobileWith){
              const markup = `
                <a href="{{route('book.index')}}" class="back-button absolute z-50 top-2 left-4">
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
    </script>
  </body>
</x-app-layout>
