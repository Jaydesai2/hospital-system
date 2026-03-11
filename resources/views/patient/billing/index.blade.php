<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Billing & <span
                    class="text-[hsl(var(--hospital-primary))]">Payments</span></h2>
            <p class="text-[11px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Financial Overview &
                Invoices
            </p>
        </div>
    </x-slot>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content (Left) -->
        <div class="flex-1 space-y-8">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Outstanding Balance -->
                <div
                    class="card-medical !p-6 border-2 border-[hsl(var(--hospital-primary))] relative group overflow-hidden">
                    <div
                        class="absolute -right-4 -top-4 w-20 h-20 bg-blue-50/50 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                    </div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div
                            class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex flex-col text-right ml-auto">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Due</p>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight leading-none">
                                ${{ number_format($stats['outstanding_balance'], 2) }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Last Payment -->
                <div class="card-medical !p-6 group overflow-hidden">
                    <div
                        class="absolute -right-4 -top-4 w-20 h-20 bg-teal-50/50 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                    </div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div
                            class="w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <div class="flex flex-col text-right ml-auto">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Last</p>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight leading-none">
                                ${{ number_format($stats['last_payment'], 2) }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Paid -->
                <div class="card-medical !p-6 group overflow-hidden">
                    <div
                        class="absolute -right-4 -top-4 w-20 h-20 bg-indigo-50/50 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                    </div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div
                            class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col text-right ml-auto">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Total</p>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight leading-none">
                                ${{ number_format($stats['total_paid'], 2) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-[2.5rem] shadow-[0_20px_50px_-15px_rgba(0,0,0,0.03)] border border-slate-50 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 tracking-tight">Recent Invoices</h3>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Order History</p>
                    </div>
                    <button
                        class="text-[10px] font-black text-[hsl(var(--hospital-primary))] uppercase tracking-widest hover:underline">Export
                        Statements</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-white">
                                <th class="px-5 py-6">
                                    <button
                                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                        <span
                                            class="text-[9px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">ID</span>
                                        <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))]"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th class="px-5 py-6">
                                    <button
                                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                        <span
                                            class="text-[9px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Service</span>
                                        <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))]"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th class="px-5 py-6">
                                    <button
                                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                        <span
                                            class="text-[9px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Amount</span>
                                        <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))]"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th class="px-5 py-6">
                                    <button
                                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                        <span
                                            class="text-[9px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Status</span>
                                        <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))]"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th class="px-5 py-6 text-right">
                                    <div
                                        class="px-5 py-3 text-[9px] font-black text-slate-300 uppercase tracking-[0.2em]">
                                        Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($invoices as $invoice)
                                <tr class="hover:bg-slate-50/80 transition-all duration-300 group">
                                    <td class="px-8 py-6">
                                        <span
                                            class="font-black text-slate-900 text-xs tracking-tight">{{ $invoice['id'] }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div>
                                            <p class="font-bold text-slate-900 text-xs leading-tight">
                                                {{ $invoice['description'] }}</p>
                                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mt-1">
                                                {{ \Carbon\Carbon::parse($invoice['date'])->format('d M') }} •
                                                {{ $invoice['type'] }}</p>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span
                                            class="font-black text-slate-900 text-sm tracking-tight">${{ number_format($invoice['amount'], 2) }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.1em] ring-1
                                                {{ $invoice['status'] === 'pending' ? 'bg-orange-50 text-orange-600 ring-orange-100' : '' }}
                                                {{ $invoice['status'] === 'paid' ? 'bg-green-50 text-green-600 ring-green-100' : '' }}
                                                {{ $invoice['status'] === 'failed' ? 'bg-red-50 text-red-600 ring-red-100' : '' }}
                                            ">
                                            {{ $invoice['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <button
                                            class="text-slate-400 hover:text-[hsl(var(--hospital-primary))] transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Content (Right) -->
        <div class="lg:w-80 space-y-8">
            <!-- Add Payment Card -->
            <div
                class="card-medical !p-8 bg-slate-900 text-white relative group overflow-hidden border-0 shadow-2xl shadow-slate-900/20">
                <div
                    class="absolute -right-4 -top-4 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl group-hover:scale-150 transition-all duration-700">
                </div>

                <h3 class="text-lg font-black tracking-tight mb-2 relative z-10">Manage Funds</h3>
                <p class="text-slate-400 text-[11px] font-bold uppercase tracking-widest mb-8 relative z-10">Payment
                    Methods</p>

                <button
                    class="w-full flex items-center justify-center gap-3 bg-white text-slate-900 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] shadow-xl hover:shadow-white/20 hover:-translate-y-1 transition-all duration-300 relative z-10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    <span>Add Payment Method</span>
                </button>

                <div class="mt-10 space-y-4 relative z-10">
                    <div
                        class="p-4 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-4 hover:bg-white/10 transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                            <span class="text-lg">💳</span>
                        </div>
                        <div>
                            <p class="text-[11px] font-black tracking-widest uppercase">Mastercard</p>
                            <p class="text-[10px] text-slate-500 font-bold tracking-widest">•••• 4242</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promotion / Help Card -->
            <div
                class="card-medical !p-8 bg-[hsl(var(--hospital-primary))] text-white relative group overflow-hidden border-0 shadow-xl shadow-blue-500/10">
                <div
                    class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-110 transition-all duration-500">
                </div>
                <h3 class="text-lg font-black tracking-tight mb-4 relative z-10">Need Help?</h3>
                <p class="text-blue-100 text-sm mb-6 relative z-10 font-medium leading-relaxed">Contact our financial
                    support team for billing inquiries.</p>
                <button
                    class="px-6 py-2.5 rounded-xl border-2 border-white/20 hover:border-white font-black text-[10px] uppercase tracking-[0.2em] transition-all relative z-10">
                    Get Support
                </button>
            </div>
        </div>
    </div>
</x-app-layout>