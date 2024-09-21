<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Page
{

    use InteractsWithForms;

    public ?array $data = [];
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.profile';

    protected static ?string $title = 'Update Profile';

    public User $user;

    public string $name;
    public string $email;
    public string $password;
    public string $role;
    public string $avatar;

    public function mount()
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
        $this->avatar = $this->user->avatar;
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->label('Name'),

            TextInput::make('email')
                ->required()
                ->label('Email')
                ->email()
                ->disabled(),

            TextInput::make('role')
                ->required()
                ->label('Role')
                ->disabled(),

            TextInput::make('avatar')
                ->required()
                ->label('Avatar'),

            TextInput::make('password')
                ->label('New Password')
                ->password()
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->dehydrated(fn ($state) => filled($state))
                ->nullable(),
        ])->columns();
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save')
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $this->user->name = $data['name'];
            $this->user->avatar = $data['avatar'];
            if (isset($data['password'])){
                $this->user->password = $data['password'];
            }
            $this->user->save();
        } catch (Halt $th){}
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }

    public static function canAccess(): bool
    {
        return Auth::user()->role == 'NGO' || Auth::user()->role == 'CLINIC' || Auth::user()->role == 'VENDOR';
    }
}
