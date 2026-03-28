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
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation === 'create') {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->readOnly()
                    ->dehydrated(true),

                Forms\Components\FileUpload::make('image')
                    ->label('Category Image')
                    ->image()
                    ->disk(env('APP_ENV') === 'production' ? 'cloudinary' : 'public')
                    ->directory('categories')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])
                    ->maxSize(5120) // 5MB for Cloudinary
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('800')
                    ->loadingIndicatorPosition('left')
                    ->helperText('Upload square image (1:1 ratio). Max size: 5MB')
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
                    ->disk(env('APP_ENV') === 'production' ? 'cloudinary' : 'public')
                    ->visibility('public')
                    ->url(function ($record) {
                        if (!$record->image) return null;
                        
                        if (app()->environment('production')) {
                            // Cloudinary stores full URLs
                            return $record->image;
                        }
                        
                        // Local development - use storage path
                        return asset('storage/' . $record->image);
                    })
                    ->circular()
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=Category&background=e5e7eb&color=6b7280&size=50')
                    ->size(50),

                Tables\Columns\TextColumn::make('name')
                    ->label('Category Name')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Category name copied')
                    ->copyMessageDuration(1500),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Slug copied')
                    ->copyMessageDuration(1500),

                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->query(function (Builder $query) {
                        $status = request('status');
                        if ($status !== null && $status !== '') {
                            return $query->where('status', $status);
                        }
                        return $query;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No categories found')
            ->emptyStateDescription('Create your first category to get started.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
