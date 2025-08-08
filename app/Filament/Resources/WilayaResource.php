<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WilayaResource\Pages;
use App\Models\WilayaModel;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;

class WilayaResource extends Resource
{
    protected static ?string $model = WilayaModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-location-marker';
    protected static ?string $navigationLabel = 'الولايات';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('اسم الولاية')->required()->maxLength(255),
            Forms\Components\Textarea::make('notes')->label('ملاحظات')->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label('ID'),
            Tables\Columns\TextColumn::make('name')->label('اسم الولاية')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWilayas::route('/'),
            'create' => Pages\CreateWilaya::route('/create'),
            'edit' => Pages\EditWilaya::route('/{record}/edit'),
        ];
    }
}
