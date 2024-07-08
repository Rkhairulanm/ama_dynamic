<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Artikel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArtikelResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArtikelResource\RelationManagers;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Media';


    public static function getNavigationLabel(): string
    {
        return 'Artikel';
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
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->label('    Aktifitas')
                                            ->maxLength(255),
                                        Forms\Components\FileUpload::make('image')
                                            ->disk('public')
                                            ->required()
                                            ->directory('artikel'),
                                        Toggle::make('published')
                                            ->required()
                                            ->label('Publish'),
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\IconColumn::make('published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Konten')
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
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
