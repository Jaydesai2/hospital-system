<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('doctor.appointments.show', $appointment->id) }}"
                class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] hover:border-blue-100 hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Add <span
                        class="text-[hsl(var(--hospital-primary))]">Prescription</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Medical Record for Appointment #{{ $appointment->id }}</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto py-8">
        <form method="POST" action="{{ route('doctor.prescription.store', $appointment->id) }}">
            @csrf
            
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Record Section -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-50">
                        <h3 class="text-xs font-black text-slate-900 uppercase tracking-widest mb-6 flex items-center gap-2">
                             <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                             Clinical Notes
                        </h3>
                        
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Diagnosis</label>
                                <textarea name="diagnosis" required 
                                    class="w-full bg-slate-50 border-slate-100 border focus:border-blue-500 focus:bg-white rounded-2xl px-6 py-4 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 min-h-[120px]"
                                    placeholder="Enter patient diagnosis..."></textarea>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Internal Notes</label>
                                <textarea name="notes" 
                                    class="w-full bg-slate-50 border-slate-100 border focus:border-blue-500 focus:bg-white rounded-2xl px-6 py-4 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 min-h-[120px]"
                                    placeholder="Any additional observations..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Medication Section -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-50">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-xs font-black text-slate-900 uppercase tracking-widest flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                                Medication List
                            </h3>
                            <button type="button" onclick="addMedicine()" 
                                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-indigo-600 hover:text-white transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add Medicine
                            </button>
                        </div>

                        <div id="medicine-container" class="space-y-6">
                            <!-- Initial Row -->
                            <div class="medicine-row p-6 bg-slate-50/50 rounded-3xl border border-slate-50 group transition-all duration-300 hover:bg-white hover:shadow-xl hover:shadow-slate-200/50">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                                    <div class="lg:col-span-2 space-y-1">
                                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Medicine Name</label>
                                        <input type="text" name="medicine_name[]" required 
                                            class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm"
                                            placeholder="e.g. Paracetamol">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Dosage</label>
                                        <input type="text" name="dosage[]" required 
                                            class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm"
                                            placeholder="e.g. 500mg">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Frequency</label>
                                        <input type="text" name="frequency[]" required 
                                            class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm"
                                            placeholder="e.g. 1-0-1">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Duration</label>
                                        <div class="flex items-center gap-2">
                                            <input type="text" name="duration[]" required 
                                                class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm"
                                                placeholder="e.g. 5 Days">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-slate-100/50 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="space-y-1">
                                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Medicine Cost ($)</label>
                                            <div class="relative">
                                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">$</span>
                                                <input type="number" name="cost[]" step="0.01" required 
                                                    class="w-40 bg-white border-slate-100 border focus:border-emerald-500 rounded-xl pl-8 pr-4 py-3 font-bold text-slate-900 text-sm"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="this.closest('.medicine-row').remove()" 
                                        class="text-[10px] font-black text-rose-400 uppercase tracking-widest hover:text-rose-600 opacity-0 group-hover:opacity-100 transition-all">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 pt-8 border-t border-slate-100">
                            <button type="submit" 
                                class="w-full bg-slate-900 text-white py-6 rounded-3xl font-black uppercase tracking-[0.2em] shadow-2xl shadow-slate-900/20 hover:-translate-y-1 transition-all duration-300">
                                Finalize Prescription & Generate Bill
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addMedicine(){
            const container = document.getElementById('medicine-container');
            const html = `
                <div class="medicine-row p-6 bg-slate-50/50 rounded-3xl border border-slate-50 group transition-all duration-300 hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 animate-in fade-in slide-in-from-top-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <div class="lg:col-span-2 space-y-1">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Medicine Name</label>
                            <input type="text" name="medicine_name[]" required class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Dosage</label>
                            <input type="text" name="dosage[]" required class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Frequency</label>
                            <input type="text" name="frequency[]" required class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Duration</label>
                            <input type="text" name="duration[]" required class="w-full bg-white border-slate-100 border focus:border-blue-500 rounded-xl px-4 py-3 font-bold text-slate-900 text-sm">
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100/50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Medicine Cost ($)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">$</span>
                                    <input type="number" name="cost[]" step="0.01" required class="w-40 bg-white border-slate-100 border focus:border-emerald-500 rounded-xl pl-8 pr-4 py-3 font-bold text-slate-900 text-sm">
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="this.closest('.medicine-row').remove()" class="text-[10px] font-black text-rose-400 uppercase tracking-widest hover:text-rose-600 transition-all">Remove</button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
</x-dashboard-layout>