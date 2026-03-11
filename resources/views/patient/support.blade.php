<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Help & <span
                class="text-[hsl(var(--hospital-primary))]">Support</span></h2>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-12">
        <!-- Header Section -->
        <div class="text-center space-y-4">
            <div
                class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-blue-50 text-blue-600 mb-6 shadow-xl shadow-blue-500/10">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">How can we help you today?</h1>
            <p class="text-slate-500 font-medium text-lg">Browse our knowledge base or reach out to our dedicated
                support team directly.</p>
        </div>

        <!-- Contact Options Grid -->
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Call Us -->
            <div
                class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] hover:shadow-xl hover:shadow-slate-200/40 transition-all duration-300 text-center group">
                <div
                    class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Call Us</h3>
                <p class="text-slate-500 text-sm mb-6">Available 24/7 for urgent matters and immediate assistance.</p>
                <a href="tel:1-800-HEALTH"
                    class="inline-flex px-6 py-2.5 rounded-xl bg-slate-50 text-slate-700 font-bold text-sm tracking-wide group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">+1
                    (800) 123-4567</a>
            </div>

            <!-- Email Us -->
            <div
                class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] hover:shadow-xl hover:shadow-slate-200/40 transition-all duration-300 text-center group relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative z-10">
                    <div
                        class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Email Us</h3>
                    <p class="text-slate-500 text-sm mb-6">Drop us a line anytime. We aim to reply within 24 hours.</p>
                    <a href="mailto:support@healthsync.com"
                        class="inline-flex px-6 py-2.5 rounded-xl bg-slate-50 text-slate-700 font-bold text-sm tracking-wide group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">support@healthsync</a>
                </div>
            </div>

            <!-- Live Chat -->
            <div
                class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] hover:shadow-xl hover:shadow-slate-200/40 transition-all duration-300 text-center group">
                <div
                    class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Live Chat</h3>
                <p class="text-slate-500 text-sm mb-6">Connect with a support agent in real-time right now.</p>
                <button onclick="alert('Live chat feature would open here.')"
                    class="inline-flex px-6 py-2.5 rounded-xl bg-[hsl(var(--hospital-primary))] text-white font-bold text-sm tracking-wide shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all">Start
                    Chat</button>
            </div>
        </div>

        <!-- FAQ Section / Ticket Form -->
        <div
            class="bg-white rounded-[2.5rem] p-10 lg:p-12 border border-slate-100 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.04)]">
            <h2 class="text-2xl font-black text-slate-900 tracking-tight mb-8">Submit a Support Ticket</h2>
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="subject" value="Subject" />
                        <x-text-input id="subject"
                            class="block mt-2 w-full bg-slate-50 border-transparent focus:bg-white transition-all duration-300"
                            type="text" name="subject" required autocomplete="off"
                            placeholder="Brief description of the issue" />
                    </div>
                    <div>
                        <x-input-label for="category" value="Category" />
                        <select id="category" name="category"
                            class="block mt-2 w-full bg-slate-50 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 rounded-2xl shadow-sm transition-all duration-300 py-3 px-4 font-medium text-slate-700">
                            <option value="">Select a category</option>
                            <option value="appointment">Appointment Issue</option>
                            <option value="billing">Billing Inquiry</option>
                            <option value="technical">Technical Problem</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div>
                    <x-input-label for="message" value="Detailed Message" />
                    <textarea id="message" name="message" rows="5"
                        class="block mt-2 w-full bg-slate-50 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 rounded-2xl shadow-sm transition-all duration-300 py-4 px-4 font-medium text-slate-700 resize-none"
                        placeholder="Please provide as much detail as possible so we can best assist you..."></textarea>
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-slate-100">
                    <button type="button" onclick="alert('Ticket successfully submitted (demo)')"
                        class="btn-primary-hospital uppercase text-xs font-black tracking-widest px-10 py-4 shadow-xl shadow-blue-500/30 hover:shadow-blue-500/50">
                        Submit Ticket
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center pt-4">
            <p class="text-slate-400 font-bold text-sm tracking-wide">Prefer to find answers yourself? <a href="#"
                    class="text-blue-500 hover:text-blue-600 underline underline-offset-4 decoration-2 decoration-blue-500/30 transition-colors">Visit
                    our Help Center</a></p>
        </div>
    </div>
</x-dashboard-layout>