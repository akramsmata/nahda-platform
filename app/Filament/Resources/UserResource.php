<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'إدارة المستخدمين';
    protected static ?string $navigationLabel = 'المستخدمون';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('الاسم الكامل'),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->label('البريد الإلكتروني'),
            Forms\Components\TextInput::make('password')
                ->password()
                ->label('كلمة المرور')
                ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : null)
                ->required(fn (string $context) => $context === 'create')
                ->label('كلمة المرور'),
            Forms\Components\TextInput::make('father_name')->label('اسم الأب'),
            Forms\Components\TextInput::make('mother_name')->label('اسم الأم'),
            Forms\Components\DatePicker::make('birth_date')->label('تاريخ الميلاد'),
            Forms\Components\TextInput::make('birth_place_wilaya')->label('ولاية الميلاد'),
            Forms\Components\TextInput::make('birth_place_commune')->label('بلدية الميلاد'),
            Forms\Components\TextInput::make('address')->label('العنوان'),
            Forms\Components\TextInput::make('cin_number')->label('رقم بطاقة التعريف'),
            Forms\Components\TextInput::make('vote_card_number')->label('رقم بطاقة الناخب'),
            Forms\Components\TextInput::make('phone')->label('رقم الهاتف'),
            Forms\Components\TextInput::make('profile_picture')->label('رابط الصورة الشخصية'),
            Forms\Components\TextInput::make('cin_photo')->label('رابط صورة بطاقة التعريف'),
            Forms\Components\TextInput::make('vote_card_photo')->label('رابط صورة بطاقة الناخب'),
            Forms\Components\Select::make('marital_status')
                ->options([
                    'أعزب' => 'أعزب',
                    'متزوج' => 'متزوج',
                    'مطلق' => 'مطلق',
                    'أرمل' => 'أرمل',
                ])
                ->label('الحالة الاجتماعية'),
            Forms\Components\TextInput::make('job')->label('الوظيفة'),
            Forms\Components\Textarea::make('admin_notes')->label('ملاحظات إدارية'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->label('الاسم')->searchable(),
            Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني'),
            Tables\Columns\TextColumn::make('phone')->label('رقم الهاتف'),
            Tables\Columns\TextColumn::make('birth_date')->label('تاريخ الميلاد'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
