<x-filament-panels::page>
    {{-- FORM FILTER --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div>
            <label class="block text-sm font-medium mb-1">Mata Pelajaran</label>
            <select wire:model="subject_id"
                class="w-full rounded-md border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200">
                <option value="">-- Pilih Mapel --</option>
                @foreach (\App\Models\Subject::all() as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Tanggal</label>
            <input type="date" wire:model="date"
                class="w-full rounded-md border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200" />
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Guru</label>
            <input type="text" value="{{ auth()->user()->name }}"
                class="w-full rounded-md border-gray-200 bg-gray-100 text-gray-600 
                          dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                readonly />
        </div>
    </div>

    {{-- TABEL SISWA --}}
    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm w-full">
        <table class="w-full text-sm table-fixed">
            <thead class="bg-gray-100 dark:bg-gray-800 dark:text-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold w-12">No</th>
                    <th class="px-4 py-2 text-left font-semibold w-32">NISN</th>
                    <th class="px-4 py-2 text-left font-semibold w-full">Nama Siswa</th>
                    <th class="px-4 py-2 text-center font-semibold w-36">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($attendances as $i => $row)
                    <tr class="{{ $i % 2 == 0 ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }}">
                        <td class="px-4 py-2">{{ $i + 1 }}</td>
                        <td class="px-4 py-2">{{ $row['nis'] ?? '-' }}</td>
                        <td class="px-4 py-2 truncate">{{ $row['name'] }}</td>
                        <td class="px-4 py-2 text-center">
                            <select wire:model="attendances.{{ $i }}.status"
                                class="rounded-md border-gray-300 text-sm w-28
                                       dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    {{-- TOMBOL SIMPAN --}}
    <div class="flex justify-end mt-6">
        <x-filament::button wire:click="save" class="bg-emerald-600 hover:bg-emerald-700 text-white">
            Simpan Absensi
        </x-filament::button>
    </div>
</x-filament-panels::page>
