<?php

namespace App\Filament\Resources\UsersResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Form;

class UserProjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'projects'; // the relation method on User model

    protected static ?string $recordTitleAttribute = 'name'; // attribute from Project to display

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // define form fields for the related projects if needed
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Project Name'),
                Tables\Columns\TextColumn::make('description')->label('Description'),
            ])
            ->filters([
                //
            ]);
    }
}
