<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Section, Placeholder};

class AdminProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.admin-profile';
    protected static ?string $title = 'Admin Profile';
    protected static ?string $navigationGroup = 'Settings';

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount(): void
    {
        $this->form->fill([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Account Information')
                ->schema([
                    TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->autofocus(),

                    TextInput::make('email')
                        ->email()
                        ->label('Email Address')
                        ->required()
                        ->unique('users', 'email', ignoreRecord: Auth::id()),

                    Placeholder::make('created_at')
                        ->label('Account Created')
                        ->content(fn() => Auth::user()->created_at->format('F j, Y, g:i a')),

                    Placeholder::make('last_login')
                        ->label('Last Login')
                        ->content(fn() => optional(Auth::user()->last_login_at)?->diffForHumans() ?? 'Never'),
                ])
                ->columns(2),

            Section::make('Change Password')
                ->schema([
                    TextInput::make('password')
                        ->label('New Password')
                        ->password()
                        ->revealable()
                        ->helperText('Minimum 6 characters. Leave blank to keep current password.') // ✅ now appears below the label
                        ->minLength(6)
                        ->dehydrated(fn($state) => filled($state))
                        ->required(false),

                    TextInput::make('password_confirmation')
                        ->label('Confirm Password')
                        ->password()
                        ->revealable()
                        ->same('password')
                        ->dehydrated(false)
                        ->helperText('Must match the new password'),
                ])
                ->columns(2),

        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        $this->notify('success', 'Profile updated successfully.');
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Changes')
                ->submit('submit'),
        ];
    }
}