<x-app-layout>




    <div class="max-w-6xl mx-auto flex flex-col lg:grid lg:grid-cols-12 gap-10 py-6">


        <div class="lg:col-span-4 space-y-8 h-fit lg:sticky lg:top-8 order-2 lg:order-1">

            <div
                class="bg-white rounded-[2.5rem] p-10 border border-slate-50 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] text-center">

                <div
                    class="w-28 h-28 rounded-[2rem] bg-gradient-to-tr from-blue-50 to-indigo-50 border border-white flex items-center justify-center text-[hsl(var(--hospital-primary))] text-4xl font-black mx-auto mb-8">
                    {{ substr($doctor->user->name ?? 'U', 0, 1) }}
                </div>

                    Dr. {{ $doctor->user->name ?? 'Unknown Doctor' }}

                <div class="flex flex-col items-center gap-2 mb-8">

                    <span class="text-xs font-black text-[hsl(var(--hospital-primary))] uppercase tracking-[0.2em]">
                        {{ $doctor->specialization }}
                    </span>

                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full bg-teal-50 text-teal-600 text-[10px] font-black uppercase tracking-[0.1em] border border-teal-100">
                        {{ $doctor->department->name }}
                    </span>

                </div>

                <div class="space-y-6 pt-10 border-t border-slate-50">

                    <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">
                        Availability Schedule
                    </h4>

                    <div class="flex flex-wrap gap-2">

                        @foreach($schedules as $schedule)

                            <span
                                class="px-4 py-2 bg-slate-50 rounded-xl text-[11px] font-black text-slate-600 border border-slate-100">
                                {{ $schedule->day }} {{ $schedule->start_time }} - {{ $schedule->end_time }}
                            </span>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>



        <div class="lg:col-span-8 order-1 lg:order-2">

            @if ($errors->any())

                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif


            @if(session('error'))

                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>

            @endif


            @if(session('success'))

                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif


            <form action="{{ route('patient.appointments.store') }}" method="POST"
                class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 p-10 md:p-16 space-y-16">

                @csrf

                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                <input type="hidden" name="appointment_time" id="selected_time">


                <div class="space-y-12">


                    <div class="border-b border-slate-50 pb-8">
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">Clinical Details</h3>
                    </div>


                    <div class="grid md:grid-cols-2 gap-10">

                        <div class="space-y-3">

                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">
                                Preferred Date
                            </label>

                            <input type="date" name="appointment_date" id="appointment_date" required
                                min="{{ date('Y-m-d') }}" class="w-full bg-slate-50 border rounded-xl px-6 py-4">

                        </div>

                    </div>


                    <div class="space-y-3">

                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">
                            Available Time Slots
                        </label>

                        <div id="time-slots" class="grid grid-cols-3 gap-3 mt-3"></div>

                    </div>


                    <div class="space-y-3">

                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">
                            Reason
                        </label>

                        <textarea name="reason" rows="4"
                            class="w-full bg-slate-50 border rounded-xl px-6 py-4"></textarea>

                    </div>

                </div>


                <div class="pt-12 border-t border-slate-50 flex items-center justify-between">

                    <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold">
                        Book Appointment
                    </button>

                </div>

            </form>

        </div>

    </div>


    <script>

        document.getElementById('appointment_date').addEventListener('change', function () {

            let date = this.value
            let doctor = "{{ $doctor->id }}"

            fetch(`/patient/available-slots/${doctor}/${date}`)

                .then(res => res.json())

                .then(data => {

                    let container = document.getElementById('time-slots')

                    container.innerHTML = ""

                    data.slots.forEach(slot => {

                        let booked = data.booked.includes(slot)

                        let btn = document.createElement('button')

                        btn.innerText = slot
                        btn.type = "button"

                        btn.className = "px-4 py-3 rounded-xl border font-bold"

                        if (booked) {

                            btn.disabled = true
                            btn.classList.add("bg-red-100", "text-red-500")

                        } else {

                            btn.classList.add("bg-green-50", "hover:bg-green-100")

                            btn.onclick = function () {

                                document.getElementById("selected_time").value = slot

                                document.querySelectorAll("#time-slots button")
                                    .forEach(b => b.classList.remove("bg-blue-500", "text-white"))

                                btn.classList.add("bg-blue-500", "text-white")

                            }

                        }

                        container.appendChild(btn)

                    })

                })

        })

    </script>


</x-app-layout>