{{-- resources/views/partials/chatbot.blade.php --}}
<div id="seaweed-ai-bot" class="fixed bottom-6 right-6 z-[100] font-sans antialiased" x-data="chatbot()" x-cloak>
    <!-- Chat Toggle Button -->
    <button id="chatbot-toggle" 
        @click="toggle()"
        class="group relative flex h-16 w-16 items-center justify-center rounded-full bg-upkgreen text-white shadow-2xl transition-all duration-300 hover:scale-110 active:scale-95">
        <div class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-green-500 border-2 border-white"></span>
        </div>
        <svg x-show="!isOpen" class="h-8 w-8 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
        </svg>
        <svg x-show="isOpen" style="display: none;" class="h-8 w-8 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Chat Window -->
    <div id="chat-window" 
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-10"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-10"
        class="absolute bottom-20 right-0 flex max-h-[calc(100vh-120px)] w-[320px] flex-col overflow-hidden rounded-[2rem] border border-gray-100 dark:border-white/10 bg-white dark:bg-slate-900 shadow-2xl backdrop-blur-3xl transition-all sm:w-[380px] md:h-[650px] md:w-[420px] md:max-h-[80vh]">
        
        <!-- Header -->
        <div class="flex items-center justify-between bg-gradient-to-r from-upkgreen via-emerald-600 to-teal-900 p-5 text-white shadow-xl">
            <div class="flex items-center gap-4">
                <div class="relative h-12 w-12 rounded-2xl border border-white/20 bg-white/10 p-2 backdrop-blur-md shadow-inner">
                    <svg class="h-full w-full text-white drop-shadow-sm" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                    </svg>
                    <span class="absolute -bottom-1 -right-1 h-3.5 w-3.5 rounded-full bg-green-400 border-2 border-slate-900 animate-pulse"></span>
                </div>
                <div>
                    <h3 class="text-base font-bold tracking-tight text-white">{{ \App\Models\Setting::get('chatbot_name', 'Seaweed AI') }}</h3>
                    <div class="flex items-center gap-1.5">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-200 opacity-90">Virtual Intelligence</span>
                    </div>
                </div>
            </div>
            <button @click="toggle()" class="group rounded-xl p-2 hover:bg-white/10 transition-all active:scale-90">
                <svg class="h-6 w-6 text-white/70 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <!-- Messages Container -->
        <div id="chat-messages" class="flex-1 space-y-6 overflow-y-auto p-5 scrollbar-thin scrollbar-thumb-white/10 scrollbar-track-transparent">
            <!-- Messages Loop -->
            <template x-for="(msg, index) in messages" :key="index">
                <div class="flex items-start gap-3 animate-fade-in" :class="msg.isUser ? 'justify-end' : ''">
                    <div x-show="!msg.isUser" class="h-8 w-8 shrink-0 rounded-xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 p-2 text-emerald-400 border border-emerald-500/10 shadow-sm">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/></svg>
                    </div>
                    <div class="max-w-[85%]">
                        <div class="chatbot-message prose prose-sm rounded-2xl p-4 shadow-xl ring-1 ring-white/5 transition-colors"
                             :class="msg.isUser ? 'rounded-tr-none bg-gradient-to-br from-upkgreen to-emerald-700 text-white font-medium' : 'rounded-tl-none bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 text-upknavy-900 dark:text-slate-100 backdrop-blur-sm'">
                            <div x-html="renderMarkdown(msg.text)"></div>
                        </div>
                        <div class="mt-1.5 px-1 text-[10px] font-medium tracking-wide uppercase" :class="msg.isUser ? 'text-right text-upkgreen/50 dark:text-white/30' : 'text-gray-400 dark:text-slate-600'" x-text="msg.time"></div>
                    </div>
                </div>
            </template>

            <!-- Typing Indicator -->
            <div x-show="isTyping" class="flex items-start gap-3">
                <div class="h-8 w-8 shrink-0 rounded-xl bg-emerald-500/10 p-2 text-emerald-400 border border-emerald-500/10">
                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/></svg>
                </div>
                <div class="rounded-2xl rounded-tl-none bg-white/5 border border-white/10 p-4 px-6 backdrop-blur-sm">
                    <div class="flex gap-1.5">
                        <div class="h-1.5 w-1.5 animate-bounce rounded-full bg-emerald-400"></div>
                        <div class="h-1.5 w-1.5 animate-bounce rounded-full bg-emerald-400" style="animation-delay: 0.2s"></div>
                        <div class="h-1.5 w-1.5 animate-bounce rounded-full bg-emerald-400" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Menus -->
            <div x-show="!isTyping && options.length > 0" class="mt-8 flex flex-wrap gap-2.5 px-1">
                <template x-for="opt in options" :key="opt.id">
                    <button @click="selectOption(opt)" 
                        class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-2.5 text-[11px] font-bold text-emerald-400 transition-all duration-300 hover:bg-upkgreen hover:text-white hover:scale-105 hover:shadow-[0_0_20px_rgba(16,185,129,0.3)] active:scale-95 md:text-xs">
                        <span x-text="opt.label"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- Input Area -->
        <div class="border-t border-gray-100 dark:border-white/10 bg-gray-50 dark:bg-slate-950/60 p-5 backdrop-blur-3xl transition-colors">
            <form @submit.prevent="sendMessage()" class="flex items-center gap-3">
                <div class="relative flex-1">
                    <input type="text" x-model="userInput" 
                        placeholder="{{ __('messages.bot_placeholder') }}"
                        class="w-full rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 px-5 py-4 text-sm text-upknavy-900 dark:text-white placeholder-gray-400 dark:placeholder-white/20 outline-none ring-upkgreen/30 transition-all focus:bg-white focus:dark:bg-white/10 focus:ring-4">
                </div>
                <button type="submit" 
                    :disabled="!userInput.trim() || isTyping"
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-upkgreen text-white shadow-lg transition-all hover:bg-emerald-500 hover:shadow-[0_0_20px_rgba(16,185,129,0.5)] disabled:opacity-20 disabled:grayscale active:scale-90">
                    <svg class="h-6 w-6 rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>
            <div class="mt-4 flex items-center justify-center gap-2">
                <div class="h-px w-8 bg-slate-800"></div>
                <p class="text-[9px] font-bold tracking-[0.2em] text-slate-600 uppercase">UPK Seaweed Industrial Intelligence</p>
                <div class="h-px w-8 bg-slate-800"></div>
            </div>
        </div>
    </div>
</div>

{{-- Marked.js for Markdown support --}}
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<style>
    [x-cloak] { display: none !important; }
    
    .chatbot-message img {
        border-radius: 8px;
        margin: 8px 0;
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        border: 1px solid rgba(255,255,255,0.05);
    }
    .chatbot-message a {
        color: #10B981;
        text-decoration: underline;
    }
    .chatbot-message p {
        margin-bottom: 0.4rem;
    }
    .chatbot-message p:last-child {
        margin-bottom: 0;
    }
</style>

<script>
function chatbot() {
    return {
        isOpen: false,
        isTyping: false,
        userInput: '',
        messages: [
            {
                text: "{{ \App\Models\Setting::get('chatbot_greeting', __('messages.bot_greeting')) }}",
                isUser: false,
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            }
        ],
        options: [],

        init() {
            this.fetchOptions();
            marked.setOptions({
                breaks: true,
                gfm: true
            });
        },

        renderMarkdown(text) {
            return marked.parse(text);
        },

        toggle() {
            this.isOpen = !this.isOpen;
            if (this.isOpen) {
                this.$nextTick(() => {
                    this.scrollToBottom();
                });
            }
        },

        scrollToBottom() {
            const container = document.getElementById('chat-messages');
            if (container) {
                container.scrollTo({
                    top: container.scrollHeight,
                    behavior: 'smooth'
                });
            }
        },

        async fetchOptions() {
            try {
                const response = await fetch('/api/chatbot/options');
                this.options = await response.json();
            } catch (error) {
                console.error('Failed to fetch chatbot options', error);
            }
        },

        async selectOption(opt) {
            if (opt.type === 'link') {
                window.open(opt.value, '_blank');
                return;
            }

            this.addMessage(opt.label, true);
            this.isTyping = true;

            try {
                const response = await fetch('/api/chatbot/message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ 
                        option_id: opt.id,
                        locale: '{{ app()->getLocale() }}'
                    })
                });
                
                const data = await response.json();
                this.isTyping = false;
                this.addMessage(data.response);
            } catch (error) {
                this.isTyping = false;
                this.addMessage("{{ __('messages.bot_error') }}");
            }
        },

        async sendMessage() {
            const text = this.userInput.trim();
            if (!text) return;

            this.addMessage(text, true);
            this.userInput = '';
            this.isTyping = true;

            try {
                const response = await fetch('/api/chatbot/message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ 
                        message: text,
                        locale: '{{ app()->getLocale() }}'
                    })
                });
                
                const data = await response.json();
                
                if (!response.ok) throw new Error(data.response || 'Server error');

                this.isTyping = false;
                this.addMessage(data.response);
            } catch (error) {
                this.isTyping = false;
                this.addMessage("{{ __('messages.bot_error') }} " + error.message);
            }
        },

        addMessage(text, isUser = false) {
            this.messages.push({
                text: text,
                isUser: isUser,
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            });
            
            this.$nextTick(() => {
                this.scrollToBottom();
            });
        }
    }
}
</script>
