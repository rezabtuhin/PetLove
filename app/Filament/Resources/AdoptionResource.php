<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdoptionResource\Pages;
use App\Filament\Resources\AdoptionResource\RelationManagers;
use App\Models\Adoption;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdoptionResource extends Resource
{
    protected static ?string $model = Adoption::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->disk('public')
                    ->directory(\Auth::user()->id.'-adoptions') // Directory where images will be saved
                    ->required(),
                Forms\Components\TextInput::make('age')
                    ->numeric()
                    ->label('Age')
                    ->nullable(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->nullable(),
            ])
            ->columns(2); // Layout the form fields into two columns
    }

    public static function table(Table $table): Table
    {
        return $table
//            ->query(fn (Builder $query) => $query->where('is_adopted', 0))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('age')
                    ->label('Age'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50), // Limit the description to 50 characters in the table view
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('is_adopted', 0)->where('listed_by', \Auth::user()->id);
            })
            ->filters([
                // Add any filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdoptions::route('/'),
            'create' => Pages\CreateAdoption::route('/create'),
            'edit' => Pages\EditAdoption::route('/{record}/edit'),
        ];
    }
}
