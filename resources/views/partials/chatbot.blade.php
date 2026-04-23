{{-- resources/views/partials/chatbot.blade.php --}}
<div id="seaweed-ai-bot" class="fixed bottom-6 right-6 z-[100] font-sans antialiased">
    <!-- Chat Toggle Button -->
    <button id="chatbot-toggle" 
        class="group relative flex h-16 w-16 items-center justify-center rounded-full bg-upkgreen text-white shadow-2xl transition-all duration-500 hover:scale-110 hover:rotate-12 active:scale-95">
        <div class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-green-500 border-2 border-white"></span>
        </div>
        <svg id="chat-icon" class="h-8 w-8 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
        </svg>
        <svg id="close-icon" class="hidden h-8 w-8 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Chat Window -->
    <div id="chat-window" 
        class="absolute bottom-20 right-0 h-[500px] w-[350px] origin-bottom-right scale-0 overflow-hidden rounded-2xl border border-white/20 bg-slate-900/90 shadow-2xl backdrop-blur-xl transition-all duration-500 md:w-[400px]">
        
        <!-- Header -->
        <div class="flex items-center justify-between bg-gradient-to-r from-upkgreen to-blue-600 p-4 text-white">
            <div class="flex items-center gap-3">
                <div class="relative h-10 w-10 rounded-full border-2 border-white/30 bg-white/20 p-1 backdrop-blur-sm">
                    <svg class="h-full w-full text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold tracking-tight">Seaweed Intelligence</h3>
                    <div class="flex items-center gap-1.5">
                        <span class="h-2 w-2 rounded-full bg-green-400"></span>
                        <span class="text-[10px] uppercase tracking-widest text-green-100 opacity-80">{{ __('messages.bot_online') }}</span>
                    </div>
                </div>
            </div>
            <button id="minimize-chat" class="rounded-lg p-1.5 hover:bg-white/10">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <!-- Messages Container -->
        <div id="chat-messages" class="h-[360px] space-y-4 overflow-y-auto p-4 scrollbar-thin scrollbar-thumb-white/10 scrollbar-track-transparent">
            <!-- Bot Greeting -->
            <div class="flex items-start gap-2 animate-fade-in-up">
                <div class="h-8 w-8 shrink-0 rounded-full bg-upkgreen/20 p-1.5 text-upkgreen">
                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/></svg>
                </div>
                <div class="rounded-2xl rounded-tl-none bg-white/10 p-3 text-sm text-white/90">
                    <p>{{ __('messages.bot_greeting') }}</p>
                    <div class="mt-2 text-[10px] text-white/40">{{ now()->format('H:i') }}</div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="absolute bottom-0 left-0 w-full border-t border-white/10 bg-slate-900/50 p-3 backdrop-blur-md">
            <form id="chat-form" class="flex gap-2">
                <input type="text" id="chat-input" 
                    placeholder="{{ __('messages.bot_placeholder') }}"
                    class="flex-1 rounded-xl border-none bg-white/5 px-4 py-2.5 text-sm text-white placeholder-white/30 focus:ring-2 focus:ring-upkgreen">
                <button type="submit" 
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-upkgreen text-white transition-all hover:bg-green-500 active:scale-90">
                    <svg class="h-5 w-5 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.4s ease-out forwards;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('chatbot-toggle');
    const windowEl = document.getElementById('chat-window');
    const chatIcon = document.getElementById('chat-icon');
    const closeIcon = document.getElementById('close-icon');
    const minimize = document.getElementById('minimize-chat');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    let isOpen = false;

    function toggleChat() {
        isOpen = !isOpen;
        if(isOpen) {
            windowEl.classList.remove('scale-0');
            windowEl.classList.add('scale-100');
            chatIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            windowEl.classList.remove('scale-100');
            windowEl.classList.add('scale-0');
            chatIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    }

    toggle.addEventListener('click', toggleChat);
    minimize.addEventListener('click', toggleChat);

    function addMessage(text, isUser = false) {
        const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const msgHtml = `
            <div class="flex ${isUser ? 'justify-end' : 'items-start'} gap-2 animate-fade-in-up">
                ${!isUser ? `
                    <div class="h-8 w-8 shrink-0 rounded-full bg-upkgreen/20 p-1.5 text-upkgreen">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/></svg>
                    </div>
                ` : ''}
                <div class="rounded-2xl ${isUser ? 'rounded-tr-none bg-upkgreen text-white' : 'rounded-tl-none bg-white/10 text-white/90'} p-3 text-sm">
                    <p>${text}</p>
                    <div class="mt-2 text-[10px] ${isUser ? 'text-white/60' : 'text-white/40'}">${time}</div>
                </div>
            </div>
        `;
        chatMessages.insertAdjacentHTML('beforeend', msgHtml);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const text = chatInput.value.trim();
        if(!text) return;

        addMessage(text, true);
        chatInput.value = '';

        // Simulate AI Thinking
        setTimeout(() => {
            const botResponse = generateAIResponse(text);
            addMessage(botResponse);
        }, 800);
    });

    function generateAIResponse(query) {
        const q = query.toLowerCase();
        
        const responses = {
            shipping: "{{ __('messages.bot_shipping_ans') }}",
            products: "{{ __('messages.bot_products_ans') }}",
            contact: "{{ __('messages.bot_contact_ans') }}",
            default: "{{ __('messages.bot_default_ans') }}"
        };

        if(q.includes('ship') || q.includes('kirim') || q.includes('logistik') || q.includes('ekspor') || q.includes('export')) return responses.shipping;
        if(q.includes('product') || q.includes('produk') || q.includes('alga') || q.includes('seaweed') || q.includes('rumpun')) return responses.products;
        if(q.includes('contact') || q.includes('hubungi') || q.includes('wa') || q.includes('sales') || q.includes('jual')) return responses.contact;
        
        return responses.default;
    }
});
</script>
