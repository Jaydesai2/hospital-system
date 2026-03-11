<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.departments.index') }}"
                class="w-12 h-12 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] hover:border-blue-100 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Edit <span
                    class="text-[hsl(var(--hospital-primary))]">Department</span></h2>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10">
        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST"
            class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 p-12 md:p-16 space-y-16">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-slate-50 pb-8">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">Update Information</h3>
                    <p class="text-sm font-bold text-slate-400 mt-1 uppercase tracking-widest">Modify the department details</p>
                </div>

                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Name -->
                    <div class="md:col-span-2 space-y-3">
                        <label for="name" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Department Name</label>
                        <input type="text" name="name" id="name" required value="{{ old('name', $department->name) }}"
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                            placeholder="e.g. Cardiology">
                        @error('name')
                            <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Description -->
                    <div class="md:col-span-2 space-y-3">
                        <label for="description" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Description (Optional)</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                            placeholder="Briefly describe the department's focus...">{{ old('description', $department->description) }}</textarea>
                        @error('description')
                            <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-8 pt-12 border-t border-slate-50">
                <a href="{{ route('admin.departments.index') }}"
                    class="text-sm font-black text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-all">Discard Changes</a>
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
