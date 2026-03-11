<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Select <span
                        class="text-[hsl(var(--hospital-primary))]">Specialist</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Expert care tailored to
                    your
                    needs</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative group">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="text" placeholder="Search by name or specialty..."
                        class="pl-12 pr-6 py-3.5 bg-white border-slate-100 rounded-2xl text-sm font-bold text-slate-900 placeholder-slate-300 focus:ring-4 focus:ring-blue-500/5 focus:border-[hsl(var(--hospital-primary))] transition-all duration-300 w-full md:w-80 shadow-sm">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($doctors as $doctor)
            <div
                class="bg-white rounded-[2.5rem] p-10 border border-slate-50 shadow-[0_20px_50px_-15px_rgba(0,0,0,0.03)] hover:shadow-[0_40px_80px_-20px_rgba(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                <div
                    class="absolute -right-6 -top-6 w-32 h-32 bg-blue-50/50 rounded-full blur-3xl group-hover:scale-150 transition-all duration-700">
                </div>

                <div class="relative flex flex-col items-center text-center">
                    <div class="relative mb-8">
                        <div
                            class="w-24 h-24 rounded-[2rem] bg-gradient-to-tr from-blue-50 to-indigo-50 border border-white flex items-center justify-center text-[hsl(var(--hospital-primary))] text-3xl font-black shadow-sm group-hover:rotate-6 transition-all duration-500">
                            {{ substr($doctor->user->name, 0, 1) }}
                        </div>
                        <div class="absolute -right-2 -bottom-2 w-8 h-8 bg-green-500 border-4 border-white rounded-full flex items-center justify-center shadow-lg"
                            title="Active Specialist">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <h3
                        class="text-2xl font-black text-slate-900 tracking-tight leading-tight mb-2 group-hover:text-[hsl(var(--hospital-primary))] transition-colors">
                        Dr. {{ $doctor->user->name }}</h3>
                    <div class="flex flex-col items-center gap-2 mb-8">
                        <span
                            class="text-xs font-black text-[hsl(var(--hospital-primary))] uppercase tracking-[0.2em]">{{ $doctor->specialization }}</span>
                        <span
                            class="inline-flex items-center px-4 py-1.5 rounded-full bg-slate-50 text-slate-500 text-[10px] font-black uppercase tracking-[0.1em] border border-slate-100 shadow-sm">
                            {{ $doctor->department->name }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-4 w-full mb-10 pt-8 border-t border-slate-50">
                        <div class="text-center">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Experience</p>
                            <p class="text-slate-900 font-black text-base tracking-tight leading-none">
                                {{ $doctor->experience }}<span class="text-[10px] ml-1 opacity-40">YRS</span>
                            </p>
                        </div>
                        <div class="text-center border-l border-slate-50">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Consult Fee</p>
                            <p class="text-slate-900 font-black text-base tracking-tighter leading-none">
                                ${{ number_format($doctor->consultation_fee, 0) }}</p>
                        </div>
                    </div>

                    <a href="{{ route('patient.appointments.book', $doctor->id) }}"
                        class="w-full flex items-center justify-center gap-3 bg-slate-50 text-slate-600 border border-slate-100 py-5 rounded-2xl font-black text-sm uppercase tracking-[0.15em] hover:bg-[hsl(var(--hospital-primary))] hover:text-white hover:border-[hsl(var(--hospital-primary))] hover:shadow-xl hover:shadow-blue-500/20 transition-all duration-300 group/btn">
                        <span>Book Visit</span>
                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div
                class="col-span-full py-32 bg-white rounded-[3rem] border border-dashed border-slate-200 text-center flex flex-col items-center gap-6">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center text-slate-200">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2m16-10a4 4 0 11-8 0 4 4 0 018 0zM9 20l-1 1h8l-1-1M12 12V4m0 0L9 7m3-3l3 3">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-black text-slate-400">Expert Registry Empty</h4>
                    <p class="text-slate-300 font-bold text-sm tracking-tight mt-1">No specialists are currently available
                        for clinical booking.</p>
                </div>
            </div>
        @endforelse
    </div>
</x-dashboard-layout>