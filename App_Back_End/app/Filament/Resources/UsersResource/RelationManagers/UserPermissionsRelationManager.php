<?php

namespace App\Filament\Resources\UsersResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Form;
use Spatie\Permission\Models\Permission;

class UserPermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions'; // the relation method on User model

    protected static ?string $recordTitleAttribute = 'name'; // attribute from Permission to display

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // define form fields for the related permissions if needed
                Forms\Components\CheckboxList::make('permissions')
                ->label('Toggle Permissions')
                ->options(fn () => Permission::pluck('name', 'id'))
                ->columns(1)
                ->afterStateUpdated(function ($state, $set, $record) {
                    $record->syncPermissions($state);
                }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Permission'),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->recordSelectSearchColumns(['name']),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
            ]);
    }
}