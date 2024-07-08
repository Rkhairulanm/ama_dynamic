<?php

namespace App\Filament\Resources;

use Tabs\Tab;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Testimoni;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TestimoniResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestimoniResource\RelationManagers;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationGroup = 'Media';

    public static function getNavigationLabel(): string
    {
        return 'Testimoni';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('FormTabs')
                    ->tabs([
                        Tabs\Tab::make('Details')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        Card::make()
                                            ->schema([
                                                TextInput::make('name')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->label('Nama'),

                                                TextInput::make('profession')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->label('Profesi'),
                                            ])
                                            ->columnSpan(2),

                                        Card::make()
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->disk('public')
                                                    ->required()
                                                    ->directory('testimoni')
                                                    ->columnSpan('full'),
                                            ])
                                            ->columnSpan(1),
                                    ]),
                            ]),

                        Tabs\Tab::make('Content')
                            ->schema([
                                Card::make()
                                    ->schema([
                                        TextInput::make('description')
                                            ->required()
                                            ->columnSpanFull()
                                            ->label('Testimoni'),
                                    ])
                                    ->columnSpan('full'),
                            ]),
                    ])->columnSpanFull(),
            ]);
        // ->schema([
        //     Forms\Components\
        //     Forms\Components\TextInput::make('name')
        //         ->required()
        //         ->maxLength(255),
        //     Forms\Components\TextInput::make('profession')
        //         ->required()
        //         ->maxLength(255),
        //     Forms\Components\Textarea::make('description')
        //         ->required()
        //         ->columnSpanFull(),
        // ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profession')
                    ->label('Profesi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Testimoni')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}
