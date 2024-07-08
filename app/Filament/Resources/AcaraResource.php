<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Acara;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AcaraResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AcaraResource\RelationManagers;

class AcaraResource extends Resource
{
    protected static ?string $model = Acara::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Media';

    public static function getNavigationLabel(): string
    {
        return 'Acara';
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
                                                    ->label('Nama Acara'),

                                                TextInput::make('organizer')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->label('Penyelenggara'),
                                            ])
                                            ->columnSpan(2),

                                        Card::make()
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->disk('public')
                                                    ->required()
                                                    ->directory('acara')
                                                    ->columnSpan('full'),
                                                Toggle::make('ongoing')
                                                    ->required()
                                                    ->label('Sedang Berlangsung'),
                                            ])
                                            ->columnSpan(1),
                                    ]),
                            ]),

                        Tabs\Tab::make('Content')
                            ->schema([
                                Card::make()
                                    ->schema([
                                        RichEditor::make('content')
                                            ->required()
                                            ->columnSpanFull()
                                            ->label('Deskripsi Acara'),
                                    ])
                                    ->columnSpan('full'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organizer')
                    ->searchable(),
                Tables\Columns\IconColumn::make('ongoing')
                    ->boolean(),
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
            'index' => Pages\ListAcaras::route('/'),
            'create' => Pages\CreateAcara::route('/create'),
            'edit' => Pages\EditAcara::route('/{record}/edit'),
        ];
    }
}
