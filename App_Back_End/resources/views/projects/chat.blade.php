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

                
 document.addEventListener('DOMContentLoaded', function() {
        // Set up CSRF token for axios
        if (window.axios) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        const messagesContainer = document.getElementById('chat-messages');
        const chatForm = document.getElementById('chat-form');
        const usernameInput = document.getElementById('username');
        const messageInput = document.getElementById('message');
        const sendButton = document.getElementById('send-button');
        const statusElement = document.getElementById('connection-status');

        // Store username in localStorage
        const savedUsername = localStorage.getItem('chat-username');
        if (savedUsername) {
            usernameInput.value = savedUsername;
        }
        usernameInput.addEventListener('input', () => {
            localStorage.setItem('chat-username', usernameInput.value);
        });

        function scrollToBottom() {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function addMessage(message) {
            const messageElement = document.createElement('div');
            messageElement.className = 'message';
            const time = new Date(message.created_at).toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
            messageElement.innerHTML = `
                <div class="message-username">${escapeHtml(message.username)}</div>
                <div class="message-content">${escapeHtml(message.content)}</div>
                <div class="message-time">${time}</div>
            `;
            messagesContainer.appendChild(messageElement);
            scrollToBottom();
        }

        function escapeHtml(unsafe) {
            return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g, "&quot;").replace(/'/g, "&#039;");
        }

        // WebSocket connection
        if (window.Echo && window.Echo.connector && window.Echo.connector.pusher) {
            window.Echo.connector.pusher.connection.bind('connected', () => {
                statusElement.textContent = '🟢 Connected'; statusElement.className = 'status connected';
            });
            window.Echo.connector.pusher.connection.bind('disconnected', () => {
                statusElement.textContent = '🔴 Disconnected'; statusElement.className = 'status disconnected';
            });
            window.Echo.connector.pusher.connection.bind('error', () => {
                statusElement.textContent = '❌ Connection Error'; statusElement.className = 'status disconnected';
            });

            window.Echo.channel('chat').listen('MessageSent', (e) => addMessage(e));
        }

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = usernameInput.value.trim();
            const content = messageInput.value.trim();
            if (!username || !content) return;
            sendButton.disabled = true; sendButton.textContent = 'Sending...';
            try {
                const response = await window.axios.post('/messages', { username, content });
                addMessage(response.data);
                messageInput.value = '';
                messageInput.focus();
            } catch {
                alert('Failed to send message.');
            } finally {
                sendButton.disabled = false; sendButton.textContent = 'Send';
            }
        });

        scrollToBottom();
        if (usernameInput.value) messageInput.focus(); else usernameInput.focus();
    });
</script>
        </div>
</div>