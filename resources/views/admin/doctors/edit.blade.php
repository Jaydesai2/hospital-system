<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="/admin/doctors"
                class="w-12 h-12 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] hover:border-blue-100 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Edit Specialist <span
                    class="text-[hsl(var(--hospital-primary))]">Profile</span></h2>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10">
        <form action="/admin/doctors/{{ $doctor->id }}/update" method="POST"
            class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 p-12 md:p-16 space-y-16">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-slate-50 pb-8">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">Account Sync</h3>
                    <p class="text-sm font-bold text-slate-400 mt-1 uppercase tracking-widest">Linked User Credentials
                        (Read-Only)</p>
                </div>

                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Name (Read-Only) -->
                    <div class="space-y-3 opacity-60">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Display
                            Name</label>
                        <div
                            class="w-full bg-slate-50 border-slate-100 border rounded-[1.5rem] px-8 py-5 font-bold text-slate-500 tracking-tight">
                            {{ $doctor->user->name }}
                        </div>
                    </div>

                    <!-- Email (Read-Only) -->
                    <div class="space-y-3 opacity-60">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">System
                            Email</label>
                        <div
                            class="w-full bg-slate-50 border-slate-100 border rounded-[1.5rem] px-8 py-5 font-bold text-slate-500 tracking-tight">
                            {{ $doctor->user->email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-12">
                <div class="border-b border-slate-50 pb-8">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">Clinical Information</h3>
                    <p class="text-sm font-bold text-slate-400 mt-1 uppercase tracking-widest">Update professional and
                        clinical details</p>
                </div>

                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Department -->
                    <div class="space-y-3">
                        <label for="department_id"
                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Department</label>
                        <select name="department_id" id="department_id" required
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 h-[64px]">
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ $doctor->department_id == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Specialization -->
                    <div class="space-y-3">
                        <label for="specialization"
                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Specialization</label>
                        <input type="text" name="specialization" id="specialization" required
                            value="{{ old('specialization', $doctor->specialization) }}"
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                            placeholder="e.g. Cardiologist">
                    </div>

                    <!-- Phone -->
                    <div class="space-y-3">
                        <label for="phone"
                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Contact
                            Number</label>
                        <input type="text" name="phone" id="phone" required value="{{ old('phone', $doctor->phone) }}"
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                            placeholder="+1 234 567 890">
                    </div>

                    <!-- Experience -->
                    <div class="space-y-3">
                        <label for="experience"
                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Years of
                            Practice</label>
                        <input type="number" name="experience" id="experience" required
                            value="{{ old('experience', $doctor->experience) }}"
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                            placeholder="10">
                    </div>

                    <!-- Consultation Fee -->
                    <div class="space-y-3">
                        <label for="consultation_fee"
                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Consultation
                            Fee ($)</label>
                        <div class="relative">
                            <span
                                class="absolute left-8 top-1/2 -translate-y-1/2 text-slate-300 font-black text-lg">$</span>
                            <input type="number" step="0.01" name="consultation_fee" id="consultation_fee" required
                                value="{{ old('consultation_fee', $doctor->consultation_fee) }}"
                                class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] pl-14 pr-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                                placeholder="500.00">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-8 pt-12 border-t border-slate-50">
                <a href="/admin/doctors"
                    class="text-sm font-black text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-all">Discard
                    Changes</a>
                <button type="submit"
                    class="w-full md:w-auto inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[hsl(var(--hospital-primary))] to-[hsl(var(--hospital-secondary))] text-white px-12 py-5 rounded-[1.5rem] font-black text-sm uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <span>Save Changes</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>