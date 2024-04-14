<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
//                    ->live()
                    ->required()
                    ->minLength(3)
                    ->maxLength(150)
                    ->afterStateUpdated(function (string $operation, $state, $set) {
                        if ($operation === 'create') {
                            $slug = Str::slug($state);
                            $set('slug', $slug);
                        }
                        if ($operation === 'edit') {
                            return;
                        }

                    })
                    ->placeholder('Enter the title of the category')
//                    ->hint('The title of the category')
                ,
                TextInput::make('slug')
                    ->required()->minLength(1)
                    ->unique(ignoreRecord: true)
                    ->maxLength(150)
                    ->placeholder('Enter the slug of the category')
//                    ->hint('The slug of the category')
                ,
                TextInput::make('text_color')
                    ->nullable()
                    ->placeholder('Enter the text color of the category')
//                    ->hint('The text color of the category')
                ,
                TextInput::make('bg_color')
                    ->nullable()
                    ->placeholder('Enter the background color of the category')
//                    ->hint('The background color of the category')
                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
                TextColumn::make('text_color')->sortable()->searchable(),
                TextColumn::make('bg_color')->sortable()->searchable(),

            ])
            ->filters([
                //
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
