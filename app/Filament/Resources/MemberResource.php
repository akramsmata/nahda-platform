<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\MemberModel;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;

class MemberResource extends Resource
{
    protected static ?string $model = MemberModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'الأعضاء';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->label('الاسم الكامل')->required()->maxLength(255),
            Forms\Components\TextInput::make('father_name')->label('اسم الأب')->maxLength(255),
            Forms\Components\TextInput::make('mother_name')->label('اسم الأم')->maxLength(255),
            Forms\Components\DatePicker::make('birth_date')->label('تاريخ الميلاد')->required(),
            Forms\Components\Select::make('birth_wilaya_id')
                ->label('مكان الميلاد (الولاية)')
                ->relationship('birthWilaya','name')
                ->preload(),
            Forms\Components\TextInput::make('birth_commune')->label('البلدية/المكان')->maxLength(255),
            Forms\Components\TextInput::make('national_id')->label('رقم بطاقة التعريف الوطنية')->maxLength(100),
            Forms\Components\TextInput::make('voter_id')->label('رقم بطاقة الناخب')->maxLength(100)->nullable(),
            Forms\Components\TextInput::make('phone')->label('رقم الهاتف')->maxLength(50),
            Forms\Components\TextInput::make('email')->label('البريد الإلكتروني')->email()->maxLength(255),
            Forms\Components\FileUpload::make('photo')->label('الصورة الشخصية')->image()->directory('members/photos'),
            Forms\Components\FileUpload::make('id_card_image')->label('صورة بطاقة التعريف')->image()->directory('members/id_cards'),
            Forms\Components\FileUpload::make('voter_card_image')->label('صورة بطاقة الناخب')->image()->directory('members/voter_cards')->nullable(),
            Forms\Components\Select::make('marital_status')->label('الحالة الاجتماعية')->options([
                'single' => 'أعزب/عزباء',
                'married' => 'متزوج/متزوجة',
                'divorced' => 'مطلق/مطلقة',
                'widowed' => 'أرمل/أرملة',
            ])->nullable(),
            Forms\Components\TextInput::make('job')->label('الوظيفة')->maxLength(255)->nullable(),
            Forms\Components\Textarea::make('admin_notes')->label('ملاحظات إدارية')->rows(3)->nullable(),
            Forms\Components\DatePicker::make('joined_at')->label('تاريخ التسجيل')->default(now()),
            Forms\Components\Select::make('wilaya_id')
                ->label('الولاية المسجلة')
                ->relationship('wilaya','name')
                ->preload(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label('ID'),
            Tables\Columns\TextColumn::make('full_name')->label('الاسم الكامل')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('phone')->label('الهاتف')->searchable(),
            Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني')->limit(30),
            Tables\Columns\TextColumn::make('wilaya.name')->label('الولاية'),
            Tables\Columns\TextColumn::make('joined_at')->label('تاريخ التسجيل')->date(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
