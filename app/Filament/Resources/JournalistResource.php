<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JournalistResource\Pages;
use App\Models\JournalistModel;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;

class JournalistResource extends Resource
{
    protected static ?string $model = JournalistModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'الصحفيون';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->label('الاسم الكامل')->required()->maxLength(255),
            Forms\Components\TextInput::make('media')->label('وسيلة الإعلام / الجهة')->nullable(),
            Forms\Components\TextInput::make('phone')->label('الهاتف')->nullable(),
            Forms\Components\TextInput::make('email')->label('البريد الإلكتروني')->email()->nullable(),
            Forms\Components\Select::make('wilaya_id')->label('الولاية')->relationship('wilaya','name')->preload(),
            Forms\Components\TextInput::make('press_card_number')->label('رقم بطاقة الصحافة')->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('full_name')->searchable(),
            Tables\Columns\TextColumn::make('media'),
            Tables\Columns\TextColumn::make('phone'),
            Tables\Columns\TextColumn::make('email'),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJournalists::route('/'),
            'create' => Pages\CreateJournalist::route('/create'),
            'edit' => Pages\EditJournalist::route('/{record}/edit'),
        ];
    }
}
