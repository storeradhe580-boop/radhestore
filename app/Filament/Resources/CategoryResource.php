<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
       
        Forms\Components\TextInput::make('name')
            ->label('Category Name')
            ->required()
            ->live(onBlur: true) 
            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null)
            ->maxLength(255),

        Forms\Components\TextInput::make('slug')
            ->label('Slug')
            ->readOnly() // 🔥 better
            ->dehydrated(true), // ✅ comma mukyu

        Forms\Components\FileUpload::make('image')
            ->label('Category Image')
            ->image()
            ->disk('public')
            ->directory('categories')
            ->visibility('public')
            ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
            ->maxSize(2048)
            ->imageResizeMode('cover')
            ->imageCropAspectRatio('1:1')
            ->imageResizeTargetWidth('800')
            ->loadingIndicatorPosition('left')
            ->nullable(),

        Forms\Components\Toggle::make('status')
            ->label('Active Status')
            ->default(true)
            ->helperText('Enable to show category in frontend'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl('https://res.cloudinary.com/demo/image/upload/v1/default-placeholder.jpg')
                    ->url(fn ($record) => $record->image 
                        ? asset($record->image) 
                        : 'https://res.cloudinary.com/demo/image/upload/v1/default-placeholder.jpg'
                    ),

                Tables\Columns\TextColumn::make('name')
                    ->label('Category Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->filters([
                // Optional: Add status filter if needed
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->query(fn (Builder $query): Builder => $query->where('status', request('status'))),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
