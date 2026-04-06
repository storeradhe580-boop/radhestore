<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')
                ->required()
                ->label('Slider Title'),

            TextInput::make('line_1')
                ->label('Line 1')
                ->nullable()
                ->helperText('First line of text (optional)'),

            TextInput::make('line_2')
                ->label('Line 2')
                ->nullable()
                ->helperText('Second line of text (optional)'),

            FileUpload::make('image')
                ->label('Slider Image')
                ->image()
                ->disk('public')
                ->directory('sliders')
                ->visibility('public')
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])
                ->maxSize(5120)
                ->helperText('Upload slider banner image. Max size: 5MB')
                ->required()
                ->preserveFilenames(),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ૧. આઈડી
            TextColumn::make('id')->label('ID')->sortable(),

            ImageColumn::make('image')
                ->label('Image')
                ->disk('public')
                ->size(60),

            TextColumn::make('title')
                ->label('Title')
                ->searchable(),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
