@vite('resources/js/app.js')

<div>
    <div class="flex">
        <div>
            <x-sidebar></x-sidebar>
        </div>
        <div class="p-16 w-full h-screen">
            <h1 class="font-bold text-3xl text-black">{{$project -> name}} chat</h1>
            <div class="chat-messages" id="chat-messages">
                @foreach($messages as $message)
                    <div class="message">
                        <div class="message-username">{{ $message->username }}</div>
                        <div class="message-content">{{ $message->content }}</div>
                        <div class="message-time">{{ $message->created_at->format('H:i:s') }}</div>
                    </div>
                @endforeach
            </div>
            <form id="chat-form" class="mt-4">
                <input type="text" id="message" name="message" placeholder="Type your message..." class="w-full p-2 rounded border" required>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-2">Send</button>
            </form>
            <script>

const projectId = {{ $project->id }};
const currentUserId = {{ auth()->id() }};

if (window.Echo) {
    window.Echo.channel(`chat.${projectId}`)
        .listen('MessageSent', (e) => {
            // handle event
        });
} else {
    console.warn('Echo is not loaded!');
}

function fetchMessages() {
    fetch(`/projects/${projectId}/chat/messages`)
        .then(res => res.json())
        .then(data => {
            const chat = document.getElementById('chat');
            chat.innerHTML = '';
            data.messages.forEach(msg => {
                const isMe = msg.user_id === currentUserId;
                chat.innerHTML += `<div style="text-align:${isMe ? 'right' : 'left'};">
                    <strong>${isMe ? 'Me' : msg.user.lastname}:</strong> ${msg.message_text}
                    <span style="font-size:0.8em;color:gray;">${msg.created_at}</span>
                </div>`;
            });
        });
}

document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const message = document.getElementById('message').value;
    fetch(`/projects/${projectId}/chat`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message })
    })
    .then(res => res.json())
    .then(() => {
        document.getElementById('message').value = '';
        fetchMessages();
    });
});

fetchMessages();
</script>
        </div>
</div>