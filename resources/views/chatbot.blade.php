@extends('layouts.app')

@section('title', 'Chatbot')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">AI Chatbot Assistant</h1>

    <div id="chat-container" class="h-96 overflow-y-auto border border-gray-300 rounded-lg p-4 mb-4 bg-gray-50">
        <div id="chat-messages"></div>
    </div>

    <form id="chat-form" class="flex">
        <input type="text" id="message-input" placeholder="Type your message..." class="flex-grow shadow appearance-none border rounded-l py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:shadow-outline">
            Send
        </button>
    </form>
</div>

<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const message = document.getElementById('message-input').value;
    if (message.trim() === '') return;

    // Add user message
    addMessage('You', message, 'user');
    document.getElementById('message-input').value = '';

    // Send to server
    fetch('/chatbot/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        addMessage('AI', data.reply, 'ai');
    })
    .catch(error => {
        addMessage('AI', 'Error: Unable to get response.', 'ai');
    });
});

function addMessage(sender, message, type) {
    const chatMessages = document.getElementById('chat-messages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `mb-4 ${type === 'user' ? 'text-right' : 'text-left'}`;
    messageDiv.innerHTML = `
        <div class="inline-block max-w-xs lg:max-w-md px-4 py-2 rounded-lg ${type === 'user' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-800'}">
            <strong>${sender}:</strong> ${message}
        </div>
    `;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
</script>
@endsection
