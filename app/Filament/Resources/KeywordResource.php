<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Keyword;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KeywordResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeywordResource\RelationManagers;

class KeywordResource extends Resource
{
    protected static ?string $model = Keyword::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationLabel = 'Keyword';
    protected static ?string $navigationGroup = 'Web Control';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('keyword')
                            ->required()
                            ->label('Keyword')
                            ->maxLength(255),
                        Select::make('page')
                            ->required()
                            ->options([
                                'Beranda' => 'Beranda',
                                'Tentang' => 'Tentang',
                                'Aktifitas' => 'Aktifitas',
                                'Artikel' => 'Artikel',
                                'Acara' => 'Acara',
                                'Acara Sebelumnya' => 'Acara Sebelumnya',
                                'Testimoni' => 'Testimoni',
                                'Kontak' => 'Kontak',
                            ])
                            ->label('Pilih Halaman'),
                    ]),

                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keyword')
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
                SelectFilter::make('Page')
                    ->options([
                        'Beranda' => 'Beranda',
                        'Tentang' => 'Tentang',
                        'Aktifitas' => 'Aktifitas',
                        'Artikel' => 'Artikel',
                        'Acara' => 'Acara',
                        'Acara Sebelumnya' => 'Acara Sebelumnya',
                        'Testimoni' => 'Testimoni',
                        'Kontak' => 'Kontak',
                    ])
                    ->multiple()
                    ->searchable()
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
            'index' => Pages\ListKeywords::route('/'),
            'create' => Pages\CreateKeyword::route('/create'),
            'edit' => Pages\EditKeyword::route('/{record}/edit'),
        ];
    }
}
