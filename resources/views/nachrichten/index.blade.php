<x-app-layout>
<body data-page="nachrichten" class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col h-screen overflow-hidden nachrichten-body">
    @include('layouts.header')

    <div class="grid grid-cols-1 md:grid-cols-[3fr_7fr] w-full max-w-7xl px-4 md:overflow-y-auto overflow-y-visible">
      <!-- Main Content: FIRST on small screens -->
      <div class="conversation-container pb-28 flex flex-col p-8 order-1 hidden md:block md:col-start-2 h-[calc(100vh-5rem)] overflow-y-auto scroll-container ">
        <div class="flex justify-end items-end"></div>
      </div>
  
      <div class="message-container mb-8 pt-4 md:border-r-[1px] md:border-gray-300 overflow-y-auto h-[calc(100vh-5rem)] scroll-container">
        @if(empty($messages))
        <p class="italic text-center text-[0.9rem] mt-4 mb-8">Noch keine Nachrichten vorhanden... <br> Sei der Erste!</p>
        @else
          @foreach ($messages as $message)
              @php
                  $chatPartner = collect($message->participants_name)
                      ->reject(fn($name) => $name === Auth::user()->name) // Auth-User rausfiltern
                      ->first(); // ersten anderen Teilnehmer nehmen
              @endphp
              <a data-userid="{{ $message->_id }}" class="user-message-preview cursor-pointer hover:bg-gray-300 flex items-center grid grid-cols-[2fr_8fr] p-2 mb-2 border rounded-sm">
                  <div>
                      <img class="h-7 w-7 rounded-full border border-black" src="{{ asset('imgs/User/avatarBgremove.png') }}" alt="User Avatar">
                  </div>
                  <div>
                      <p>{{ $chatPartner }}</p>
                  </div>
              </a>
          @endforeach
        @endif
      </div>
    </div>
    
    <script>
      document.addEventListener('DOMContentLoaded', async function(){
        const btnMessage = document.querySelector('.btn-message')
        const msgBox = document.querySelector('.message-box')
        const messageContainer = document.querySelector('.message-container')
        const conversationContainer = document.querySelector('.conversation-container')
        const formTextarea = document.querySelector('.form-textarea')
        const body = document.querySelector('.nachrichten-body')
        const msgObj = @json($messages);
        const csrfToken = @json(csrf_token());
        const currentUserId = @json(auth()->id());
        let chatpartnerName 
        let objIDchat


        //SAVE TIMESTAMP LAST VISITED MESSAGE UI FOR RED DOT ON ICON
        function lastTimeVisitedMessageUI(){
          const now = new Date().toISOString();
          localStorage.setItem('last_seen_messages', now);
        }
        lastTimeVisitedMessageUI()
         
        
        //MESSAGE UI CONSTRUCTOR
        function warperAppend(warper, justify, div, timeDiv){
          warper.classList.add(justify)
          warper.appendChild(timeDiv)
          warper.appendChild(div, timeDiv)
        }

        function scrollToBottomConversation() {
          conversationContainer.scrollTop = conversationContainer.scrollHeight;
        }
        
        function scrollToBottomMessage() {
          messageContainer.scrollTop = messageContainer.scrollHeight;
        }

        function createMessages(input){
            const div = document.createElement('div')
            const timeDiv = document.createElement('div')
            div.classList.add('bg-gray-300', 'text-black', 'p-2', 'rounded')
            timeDiv.classList.add('text-[0.7rem]', 'text-gray-400', 'p-2', 'rounded')
            div.textContent = input.text
            
            const date = new Date(input.timestamp);
            timeDiv.textContent = `${date.getHours().toString().padStart(2,'0')}:${date.getMinutes().toString().padStart(2,'0')}`

            const warper = document.createElement('div')
            warper.classList.add('flex', 'mb-2')
            
            
            if(input.sender === currentUserId){
              warperAppend(warper, 'justify-end', div, timeDiv)
              div.classList.add('bg-green-200')
            } else {
              warperAppend(warper, 'justify-start', timeDiv, div)
            }

    
            if(window.innerWidth < 768) {
                if (messageContainer) 
                messageContainer.appendChild(warper)
                textarea.value = ''
              } else {
                if (conversationContainer) 
                conversationContainer.appendChild(warper)
                textarea.value = ''
              }  
        }

        function createSubmitButton(){
            const btnFormSubmit = document.createElement('button');
            btnFormSubmit.type = 'submit';
            btnFormSubmit.classList.add('btn-form-submit', 'block', 'rounded-full', 'bg-white', 'flex', 'items-center', 'justify-center');
                  
            const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svg.setAttribute('class', 'absolute top-[88%] md:top-[88%] md:left-[94%] left-[87%] bg-gray-200 rounded-full h-10 w-10 z-50');
            svg.setAttribute('viewBox', '0 0 640 640');
          
            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', 'M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z');
            svg.appendChild(path);
            btnFormSubmit.appendChild(svg);

            return btnFormSubmit
        }

        function createZuruckButton(){
          const btnZuruck = document.createElement('a');
            btnZuruck.href = "{{route('nachrichten.index')}}"
            btnZuruck.classList.add('absolute', 'z-50', 'top-2', 'left-4')
                        
            const svg2 = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svg2.setAttribute('class', 'bg-white rounded-full h-8 w-8');
            svg2.setAttribute('viewBox', '0 0 640 640');

            const path2 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path2.setAttribute('d', 'M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352H544C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288H173.3L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z');

            return btnZuruck
        }

        function createChatpartnerNamefiels(){
            const charpartnerNameField = document.createElement('div')
            const chatpartnerNameElement = document.createElement('p')
            chatpartnerNameElement.textContent = chatpartnerName
            charpartnerNameField.appendChild(chatpartnerNameElement)
            charpartnerNameField.className = 'md:hidden bg-inherit text-white rounded-sm absolute px-2 top-3 left-20 font-bold text-lg text-gray-800';
            messageContainer.appendChild(charpartnerNameField);
            const btnZuruck = createZuruckButton()


            if (window.innerWidth < 768) {
              messageContainer.appendChild(btnZuruck);
              svg2.appendChild(path2);
              btnZuruck.appendChild(svg2);
            } else {
              conversationContainer.appendChild(btnZuruck);
            }
        }

        function createInputfieldMessage(form){
            const textarea = document.createElement('textarea')
            textarea.name = 'comment';
            textarea.id = 'textarea';
            textarea.classList.add('textarea','fixed', 'md:h-[20%]', 'h-[15%]', 'md:bottom-5', 'bottom-7', 'right-1', 'md:w-[69%]', 'w-[98%]', 'border', 'rounded-lg', 'focus:outline-none', 'focus:ring-0', 'focus:outline-none', 'no-focus')
            form.appendChild(textarea)

            return textarea
        }


        /*
        async function createChatpartner(){
          const res = await fetch('{{route('getChatPartner')}}')
          if(!res.ok) return 
          const data = await res.json()

          console.log(data);

          
          const markup = data.map(doc => {
            return `
            <a data-userId="${doc.id}" class="user-message-preview mb-2 cursor-pointer hover:bg-gray-300 flex items-center grid grid-cols-[2fr_8fr] gap-1 p-2 border rounded-lg items-center">
              <div>
                <img class="h-7 w-7 rounded-full border border-black" src="{{ asset('imgs/User/avatarBgremove.png') }}" alt="User Avatar">
              </div>
              <div>
                <p>${doc.chatPartner}</p>
              </div>
            </a>`
              }).join(' ')

        }
              */
        

        //CREATE CHATS (LEFT SIDE CHAT PARTNER)
        messageContainer.addEventListener('click',  function(e){
          const click = e.target
          if(!click) return
          
          const {userid} = click.closest('.user-message-preview').dataset
          if(!userid) return
          objIDchat = userid
          const chat = msgObj.filter(obj => obj._id.$oid === userid.trim())
          chatpartnerName = chat[0].chatPartner
          
          conversationContainer.textContent = ''
          if(window.innerWidth < 768) {
          messageContainer.innerHTML = ''}

          


        //CREATE MESSAGING FUNKTION TEXTAREA FULLFUNKTION
        function createTextarea(){
            const form = document.createElement('form')

            //CREATE TEXTAREA
            const textarea = createInputfieldMessage(form)

            //CREATE SUBMIT BUTTON
            const btnFormSubmit = createSubmitButton()

            //CREATE ZURÜCK BUTTON
            const btnZuruck = createZuruckButton()
            
            //CREATE CHATPARTNER NAME FIELD
            createChatpartnerNamefiels()

            //APPEND TO FORM
            form.appendChild(btnFormSubmit);


            //MOBILE & DESKTOP CHECK
            if(window.innerWidth < 768) {
                if (messageContainer){
                  messageContainer.appendChild(form)
                  messageContainer.classList.add('pb-32')
                  scrollToBottomMessage()
                }
            } else {
                if (conversationContainer) {
                  conversationContainer.appendChild(form)
                  scrollToBottomConversation()
                }
            }

            //CREATE MESSAGES LOOP
            chat[0].messages.forEach(msg => {
              createMessages(msg)
              scrollToBottomConversation()
              
            }) 
            

              
            //SEND MESSAGE & UPDATE UI
            btnFormSubmit.addEventListener('click', async function(e){
                e.preventDefault()
                const click = e.target
                const formData = new FormData(form);
                formData.append('objIDchat', objIDchat);
                const currentUserId = @json(auth()->id());
                const fetchUrl = `nachrichten/store/${currentUserId}`


                if(!click) return


                const res = await fetch(fetchUrl, {
                  method: 'POST',
                  body: formData,
                  headers: {
                    'accept' : 'application/json',
                    'X-CSRF-TOKEN' : csrfToken
                  }
                })
                const data = await res.json()
              
                createMessages(data.data)
                scrollToBottomConversation()

              })
            }
            createTextarea()
          })


          //CREATE CHATPARTNER
          createChatpartner()
      })
      </script>
  </body>
</x-app-layout>
