<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $project->name }} Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .chat-messages {
            height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 1rem;
            margin: 1rem 0;
            background-color: #f9f9f9;
        }
        .message {
            margin-bottom: 1rem;
            padding: 0.5rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .message-username {
            font-weight: bold;
            color: #2563eb;
            font-size: 0.875rem;
        }
        .message-content {
            margin: 0.25rem 0;
        }
        .message-time {
            font-size: 0.75rem;
            color: #6b7280;
        }
        #connection-status {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
        }
        .status.connected {
            background-color: #dcfce7;
            color: #166534;
        }
        .status.disconnected {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .sidebar-container {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 220px;
            z-index: 100;
            background: #222;
        }
    </style>
</head>
<body>
<div>
    <div class="flex">
        <div class="sidebar-container">
            <x-sidebar></x-sidebar>
        </div>
        <div class="p-16 w-full h-screen">
            <h1 class="font-bold text-3xl text-black">{{$project -> name}} chat</h1>
            <div class="chat-messages" id="chat-messages">
                @foreach($messages as $message)
                    <div class="message">
                        <div class="message-username">{{ $message->user->firstname ?? 'User' }} {{ $message->user->lastname ?? '' }}</div>
                        <div class="message-content">{{ $message->message_text }}</div>
                        <div class="message-time">{{ $message->created_at->format('H:i:s') }}</div>
                    </div>
                @endforeach
            </div>
            <form id="chat-form" class="mt-4">
                <input type="text" id="message" name="message" placeholder="Type your message..." class="w-full p-2 rounded border" required>
                <button type="submit" id="send-button" class="bg-blue-500 text-white p-2 rounded mt-2">Send</button>
            </form>
            <script>

                
 document.addEventListener('DOMContentLoaded', function() {
        // Set up CSRF token for axios
        if (window.axios) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        const messagesContainer = document.getElementById('chat-messages');
        const chatForm = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');
        const sendButton = document.getElementById('send-button');
        const statusElement = document.getElementById('connection-status');

        function scrollToBottom() {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function addMessage(message) {
            const messageElement = document.createElement('div');
            messageElement.className = 'message';
            const time = new Date(message.created_at).toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
            const username = message.user ? `${message.user.name} ${message.user.lastname}` : 'User';
            messageElement.innerHTML = `
                <div class="message-username">${escapeHtml(username)}</div>
                <div class="message-content">${escapeHtml(message.message_text)}</div>
                <div class="message-time">${time}</div>
            `;
            messagesContainer.appendChild(messageElement);
            scrollToBottom();
        }

        function escapeHtml(unsafe) {
            return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g, "&quot;").replace(/'/g, "&#039;");
        }

        // WebSocket connection - disabled for now since we don't have pusher configured
        // if (window.Echo && window.Echo.connector && window.Echo.connector.pusher) {
        //     window.Echo.connector.pusher.connection.bind('connected', () => {
        //         statusElement.textContent = '🟢 Connected'; statusElement.className = 'status connected';
        //     });
        //     window.Echo.connector.pusher.connection.bind('disconnected', () => {
        //         statusElement.textContent = '🔴 Disconnected'; statusElement.className = 'status disconnected';
        //     });
        //     window.Echo.connector.pusher.connection.bind('error', () => {
        //         statusElement.textContent = '❌ Connection Error'; statusElement.className = 'status disconnected';
        //     });
            window.Echo.channel('chat').listen('MessageSent', (e) =>{ console.log('Received event:', e);addMessage(e);});
        
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const content = messageInput.value.trim();
            if (!content) return;
            sendButton.disabled = true; sendButton.textContent = 'Sending...';
            try {
                const response = await window.axios.post('{{ route("projects.chat.store", $project) }}', { 
                    message: content 
                });
                // Instead of adding message directly, we'll reload or fetch new messages
                messageInput.value = '';
                messageInput.focus();
                // Add the new message to the DOM without reloading
                if (response.data.message) {
                    addMessage(response.data.message);
                }
            } catch (error) {
                console.error('Error sending message:', error);
                alert('Failed to send message.');
            } finally {
                sendButton.disabled = false; sendButton.textContent = 'Send';
            }
        });

        scrollToBottom();
        messageInput.focus();
    });
</script>
        </div>
    </div>
</body>
</html>