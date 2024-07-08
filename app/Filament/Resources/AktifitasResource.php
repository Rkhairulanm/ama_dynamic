<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Aktifitas;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AktifitasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AktifitasResource\RelationManagers;

class AktifitasResource extends Resource
{
    protected static ?string $model = Aktifitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Media';

    public static function getNavigationLabel(): string
    {
        return 'Aktifitas';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('FormTabs')
                    ->tabs([
                        Tabs\Tab::make('Details')
                            ->schema([
                                Grid::make(2) // Using a grid with 2 columns
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->label('    Aktifitas')
                                            ->maxLength(255),
                                        Forms\Components\FileUpload::make('image')
                                            ->disk('public')
                                            ->required()
                                            ->directory('aktifitas')
                                    ]),
                            ]),

                        Tabs\Tab::make('Content')
                            ->schema([
                                Card::make()
                                    ->schema([
                                        Forms\Components\RichEditor::make('content')
                                            ->required()
                                            ->label('Isi Aktifitas')
                                            ->columnSpanFull(), // Takes up the full column below the first row
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Acara Kegiatan')
                    ->searchable(),
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
            'index' => Pages\ListAktifitas::route('/'),
            'create' => Pages\CreateAktifitas::route('/create'),
            'edit' => Pages\EditAktifitas::route('/{record}/edit'),
        ];
    }
}
