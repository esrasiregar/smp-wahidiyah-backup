@php
    use App\Filament\Pages\MyProfile;
    $u = auth()->user();
@endphp
<x-filament-widgets::widget class="w-full">
    <div
        class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 w-full">
        <div class="h-24 bg-gradient-to-r from-emerald-500 to-teal-600"></div>

        <div class="p-6 -mt-10 flex items-center justify-between">
            {{-- Foto Profil --}}
            <div class="flex items-center space-x-8">
                <div
                    class="w-20 h-20 overflow-hidden rounded-lg shadow-md border-2 border-white dark:border-gray-800 bg-gray-200">
                    <img src="{{ $u->photo_path ? asset('storage/' . $u->photo_path) : asset('images/default-user.jpg') }}"
                        alt="{{ $u->name }}" class="w-full h-full object-cover">
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $u->name }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ ucfirst($u->role) }} • {{ $u->position ?? '-' }}
                    </p>
                </div>
            </div>

            {{-- Tombol --}}
            <a href="{{ MyProfile::getUrl() }}"
                class="px-5 py-2 text-sm font-medium bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition-all">
                Kelola Profil
            </a>
        </div>
    </div>
</x-filament-widgets::widget>
