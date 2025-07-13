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
use App\Models\User;

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
                        ->content(fn () => Auth::user()->created_at->format('F j, Y, g:i a')),

                    Placeholder::make('last_login')
                        ->label('Last Login')
                        ->content(fn () => optional(Auth::user()->last_login_at)?->diffForHumans() ?? 'Never'),
                ])
                ->columns(2),

            Section::make('Change Password (optional)')
                ->schema([
                    TextInput::make('password')
                        ->label('New Password')
                        ->password()
                        ->revealable()
                        ->minLength(6)
                        ->helperText('Leave blank to keep current password.')
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
        $user = User::find(Auth::id());

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        Notification::make()
            ->title('Profile updated successfully.')
            ->success()
            ->send();

        return redirect()->route('filament.admin.pages.admin-profile');
    }

    public function deleteAccount()
    {
        $user = \App\Models\User::find(Auth::id());

        if ($user) {
            $user->delete();
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
        }

        return redirect()->route('login')->with('message', 'Account deleted successfully.');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('submit')
                ->requiresConfirmation()
                ->modalHeading('Confirm Changes')
                ->modalSubheading('Are you sure you want to save these changes?')
                ->modalButton('Yes, Save'),

            Action::make('cancel')
                ->label('Cancel')
                ->color('gray')
                ->requiresConfirmation()
                ->modalHeading('Cancel Changes')
                ->modalSubheading('Unsaved changes will be lost.')
                ->modalButton('Yes, Cancel')
                ->url(static::getUrl()),

            Action::make('delete')
                ->label('Delete Account')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Delete Account Permanently')
                ->modalSubheading('This action is irreversible. Are you sure?')
                ->modalButton('Yes, Delete')
                ->action(fn () => $this->deleteAccount()),
        ];
    }
}
