<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Section, Placeholder};
use Filament\Actions\Action;
use Filament\Notifications\Notification;

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
    public $old_password;

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
                        ->content(fn () => Auth::user()->created_at->format('F j, Y, g:i a')),

                    Placeholder::make('last_login')
                        ->label('Last Login')
                        ->content(fn () => optional(Auth::user()->last_login_at)?->diffForHumans() ?? 'Never'),
                ])
                ->columns(2),

            Section::make('Change Password')
                ->schema([
                    TextInput::make('old_password')
                        ->label('Old Password')
                        ->password()
                        ->required()
                        ->revealable()
                        ->helperText('Enter your current password to confirm identity.')
                        ->dehydrated(false),

                    TextInput::make('password')
                        ->label('New Password')
                        ->password()
                        ->revealable()
                        ->helperText('Minimum 6 characters. Leave blank to keep current password.')
                        ->minLength(6)
                        ->dehydrated(fn ($state) => filled($state))
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

        if (!Hash::check($data['old_password'] ?? '', Auth::user()->password)) {
            Notification::make()
                ->title('Old password is incorrect.')
                ->danger()
                ->send();
            return;
        }

        $user = Auth::user();
        $isSensitiveChange = false;

        if ($data['email'] !== $user->email) {
            $user->email = $data['email'];
            $isSensitiveChange = true;
        }

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
            $isSensitiveChange = true;
        }

        $user->name = $data['name'];
        $user->save();

        if ($isSensitiveChange) {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();

            Session::flash('message', 'You have been logged out due to profile changes. Please log in again.');

            return redirect('/login');
        }

        Notification::make()
            ->title('Profile updated successfully.')
            ->success()
            ->send();
    }

    public function deleteAccount()
    {
        Auth::user()->delete();
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('submit')
                ->requiresConfirmation()
                ->modalHeading('Confirm Changes')
                ->modalSubheading('Are you sure you want to update your profile information?')
                ->modalButton('Yes, Save'),

            Action::make('cancel')
                ->label('Cancel')
                ->color('gray')
                ->requiresConfirmation()
                ->modalHeading('Cancel Changes')
                ->modalSubheading('Are you sure you want to cancel? Unsaved changes will be lost.')
                ->modalButton('Yes, Cancel')
                ->url(route('filament.admin.pages.admin-profile')),

            // ✅ FIXED: comma above!
            Action::make('delete')
                ->label('Delete Account')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Delete Account Permanently')
                ->modalSubheading('Are you sure? This action is irreversible!')
                ->modalButton('Yes, Delete')
                ->action(fn () => $this->deleteAccount()),
        ];
    }
}