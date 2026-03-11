<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('patient.billing') }}"
                class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] hover:border-blue-100 hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="text-xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Invoice <span
                    class="text-[hsl(var(--hospital-primary))]">Detail</span></h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12">
        <div class="bg-white rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-slate-50 overflow-hidden">
            <!-- Header -->
            <div class="p-12 border-b border-slate-50 flex justify-between items-start bg-slate-50/30">
                <div class="space-y-4">
                    <div class="w-16 h-16 bg-[hsl(var(--hospital-primary))] rounded-2xl flex items-center justify-center text-white text-2xl font-black">
                        H
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Hospital System</h1>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Medical Center Invoice</p>
                    </div>
                </div>
                <div class="text-right space-y-2">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest ring-1 shadow-sm
                        {{ $invoice->status === 'pending' ? 'bg-orange-50 text-orange-600 ring-orange-100' : '' }}
                        {{ $invoice->status === 'paid' ? 'bg-green-50 text-green-600 ring-green-100' : '' }}
                        {{ $invoice->status === 'cancelled' ? 'bg-red-50 text-red-600 ring-red-100' : '' }}
                    ">
                        {{ $invoice->status }}
                    </span>
                    <h2 class="text-xl font-black text-slate-900 tracking-tighter">{{ $invoice->invoice_number }}</h2>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic tracking-tight">Issued: {{ $invoice->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <!-- Details -->
            <div class="p-12 grid grid-cols-2 gap-12 border-b border-slate-50">
                <div class="space-y-4">
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Patient Information</h3>
                    <div class="space-y-1">
                        <p class="font-black text-slate-900 text-base tracking-tight">{{ Auth::user()->name }}</p>
                        <p class="text-sm font-medium text-slate-500 italic">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="text-right space-y-4">
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Billing Information</h3>
                    <div class="space-y-1">
                        <p class="font-black text-slate-900 text-base tracking-tight">Dr. {{ $invoice->doctor->user?->name ?? 'Unknown' }}</p>
                        <p class="text-sm font-medium text-slate-500 italic">{{ $invoice->doctor->specialization }}</p>
                    </div>
                </div>
            </div>

            <!-- Items -->
            <div class="p-12">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="pb-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Description</th>
                            <th class="pb-6 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest">Qty</th>
                            <th class="pb-6 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Price</th>
                            <th class="pb-6 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($invoice->items as $item)
                            <tr>
                                <td class="py-8">
                                    <p class="font-black text-slate-900 text-sm tracking-tight">{{ $item->description }}</p>
                                </td>
                                <td class="py-8 text-center text-sm font-bold text-slate-600">{{ $item->quantity }}</td>
                                <td class="py-8 text-right text-sm font-bold text-slate-600">${{ number_format($item->unit_price, 2) }}</td>
                                <td class="py-8 text-right font-black text-slate-900 text-sm tracking-tight">${{ number_format($item->total_price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="p-12 bg-slate-50/50 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="space-y-2">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.1em]">Payment Due By</p>
                    <p class="font-black text-slate-900 text-lg tracking-tight">{{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</p>
                </div>
                <div class="flex items-center gap-12">
                    <div class="text-right space-y-1">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Amount</p>
                        <p class="text-4xl font-black text-[hsl(var(--hospital-primary))] tracking-tighter">${{ number_format($invoice->total_amount, 2) }}</p>
                    </div>
                    @if($invoice->status === 'pending')
                        <button class="bg-slate-900 text-white px-10 py-5 rounded-[2rem] font-black text-xs uppercase tracking-widest shadow-2xl shadow-slate-900/40 hover:-translate-y-1 transition-all duration-300">
                            Pay Now
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
