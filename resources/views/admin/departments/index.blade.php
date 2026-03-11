<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Hospital <span
                        class="text-[hsl(var(--hospital-primary))]">Departments</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Medical Service Units
                    Management</p>
            </div>
            <a href="{{ route('admin.departments.create') }}"
                class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[hsl(var(--hospital-primary))] to-[hsl(var(--hospital-secondary))] text-white px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add Department</span>
            </a>
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
                    <tr class="bg-white">
                        <th class="px-5 py-6">
                            <span class="px-5 py-3 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Department Name</span>
                        </th>
                        <th class="px-5 py-6">
                            <span class="px-5 py-3 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</span>
                        </th>
                        <th class="px-5 py-6 text-right">
                            <span class="px-5 py-3 text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($departments as $dept)
                        <tr class="hover:bg-slate-50/50 transition-all duration-300 group">
                            <td class="px-10 py-7">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-blue-50 to-indigo-50 border border-white flex items-center justify-center text-[hsl(var(--hospital-primary))] font-black text-lg shadow-sm group-hover:scale-110 transition-transform">
                                        {{ substr($dept->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4 class="font-black text-slate-900 text-base tracking-tight leading-tight">
                                            {{ $dept->name }}</h4>
                                        <p class="text-xs font-medium text-slate-400 mt-1 max-w-xs truncate">
                                            {{ $dept->description ?? 'No description provided' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-7">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.15em] ring-1 shadow-sm
                                    {{ $dept->status === 'active' ? 'bg-emerald-50 text-emerald-600 ring-emerald-100' : 'bg-slate-50 text-slate-400 ring-slate-100' }}">
                                    {{ $dept->status }}
                                </span>
                            </td>
                            <td class="px-10 py-7 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.departments.edit', $dept->id) }}"
                                        class="w-10 h-10 flex items-center justify-center text-blue-500 bg-white border border-slate-100 rounded-xl hover:bg-[hsl(var(--hospital-primary))] hover:text-white hover:border-[hsl(var(--hospital-primary))] hover:shadow-lg hover:shadow-blue-500/20 transition-all duration-300"
                                        title="Edit Department">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.departments.delete', $dept->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this department?');">
                                        @csrf
                                        <button type="submit"
                                            class="w-10 h-10 flex items-center justify-center text-rose-500 bg-white border border-slate-100 rounded-xl hover:bg-rose-500 hover:text-white hover:border-rose-500 hover:shadow-lg hover:shadow-rose-500/20 transition-all duration-300"
                                            title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-10 py-32 text-center text-slate-400 italic">
                                <p class="text-[11px] font-black uppercase tracking-[0.3em]">No Departments Found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
