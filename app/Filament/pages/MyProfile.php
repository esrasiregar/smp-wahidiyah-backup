<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;

class MyProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $title = 'Profil Saya';
    protected static ?string $navigationLabel = 'Profil Saya';
    protected static ?string $slug = 'my-profile';
    protected static string $view = 'filament.pages.my-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();

        $this->form->fill([
            'email' => $user->email,
            'name' => $user->name,
            'position' => $user->position,
            // 'photo_path' => $user->photo_path,
        ]);
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->disabled(),

            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required(),

            Forms\Components\TextInput::make('position')
                ->label('Jabatan'),

            Forms\Components\FileUpload::make('photo_path')
                ->label('Foto Profil')
                ->image()
                ->directory('users/photos')
                ->imageEditor() // aktifkan editor Filament
                ->imageResizeMode('cover')
                ->imageResizeTargetWidth('300')
                ->imageResizeTargetHeight('400'),

                Forms\Components\TextInput::make('password')
                    ->label('Password Baru')
                    ->password()
                    ->nullable()
                    ->minLength(6) // ✅ minimal 6 karakter
                    ->dehydrated(fn ($state) => filled($state)), 
        ])->statePath('data');
    }

    public function save(): void
    {
        $user = auth()->user();
        $data = $this->form->getState();

        $user->update([
            'name' => $data['name'],
            'position' => $data['position'],
            'photo_path' => $data['photo_path'],
            'password' => !empty($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        Notification::make()
            ->title('Profil berhasil diperbarui.')
            ->success()
            ->send();

    }
}
