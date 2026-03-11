<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">System <span
                        class="text-[hsl(var(--hospital-primary))]">Invoices</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Financial Records Management</p>
            </div>
            <div class="flex gap-4">
                <button class="px-6 py-4 bg-white border border-slate-100 rounded-2xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-[hsl(var(--hospital-primary))] hover:border-blue-100 transition-all">Export All</button>
            </div>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-2xl font-bold text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div
        class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white border-b border-slate-50">
                        <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Invoice #</th>
                        <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Patient</th>
                        <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Doctor</th>
                        <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Amount</th>
                        <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-10 py-6 text-right text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($invoices as $invoice)
                        <tr class="hover:bg-slate-50/50 transition-all duration-300 group">
                            <td class="px-10 py-7">
                                <span class="font-black text-base text-slate-900 tracking-tight">{{ $invoice->invoice_number }}</span>
                                <p class="text-[10px] font-medium text-slate-400 mt-1">{{ $invoice->created_at->format('d M Y') }}</p>
                            </td>
                            <td class="px-10 py-7">
                                <div class="font-black text-slate-900 text-sm tracking-tight">{{ $invoice->patient->user?->name ?? 'Unknown' }}</div>
                                <div class="text-[10px] font-bold text-slate-400 italic">{{ $invoice->patient->user?->email ?? 'N/A' }}</div>
                            </td>
                            <td class="px-10 py-7">
                                <div class="font-black text-slate-900 text-sm tracking-tight">Dr. {{ $invoice->doctor->user?->name ?? 'Unknown' }}</div>
                                <div class="text-[10px] font-bold text-[hsl(var(--hospital-primary))] uppercase tracking-widest mt-0.5">{{ $invoice->doctor->specialization }}</div>
                            </td>
                            <td class="px-10 py-7">
                                <span class="font-black text-slate-900 text-base tracking-tight">${{ number_format($invoice->total_amount, 2) }}</span>
                            </td>
                            <td class="px-10 py-7">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.15em] ring-1 shadow-sm
                                    {{ $invoice->status === 'pending' ? 'bg-orange-50 text-orange-600 ring-orange-100' : '' }}
                                    {{ $invoice->status === 'paid' ? 'bg-emerald-50 text-emerald-600 ring-emerald-100' : '' }}
                                    {{ $invoice->status === 'cancelled' ? 'bg-rose-50 text-rose-600 ring-rose-100' : '' }}
                                ">
                                    {{ $invoice->status }}
                                </span>
                            </td>
                            <td class="px-10 py-7 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-[hsl(var(--hospital-primary))] hover:text-white transition-all shadow-sm" title="View Detail">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    @if($invoice->status === 'pending')
                                        <form action="{{ route('admin.invoices.paid', $invoice->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="p-2.5 rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all shadow-sm" title="Mark as Paid">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.invoices.delete', $invoice->id) }}" method="POST" onsubmit="return confirm('Delete this invoice?');">
                                        @csrf
                                        <button type="submit" class="p-2.5 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all shadow-sm" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-10 py-32 text-center">
                                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.3em]">No invoices recorded yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
