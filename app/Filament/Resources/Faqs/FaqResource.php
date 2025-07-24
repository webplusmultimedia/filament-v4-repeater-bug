<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\ManageFaqs;
use App\Models\Faq;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Components\TextInput::make('title')

                        ->required()
                        ->label('Titre')
                        ->hint('Le titre de la FAQ'),
                    Components\Toggle::make('is_active')
                        ->label('Actif')
                        ->default(true)
                        ->inline()
                        ->hint('Activez ou désactivez cette FAQ'),
                ])->columnSpanFull(),

                Components\Repeater::make('contents')
                    ->minItems(1)
                    ->maxItems(10)
                    ->hint('Vous pouvez ajouter plusieurs questions/réponses.')
                    ->schema([
                        Components\TextInput::make('question')
                            ->required()
                            ->label('Question'),
                        Components\MarkdownEditor::make('reponse')
                            ->required()
                            ->label('Réponse')
                            ->maxLength(1000)
                            ->toolbarButtons([
                                ['bold', 'italic', 'strike'],
                                ['undo', 'redo'],
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('contents.question')
                    ->label('Question')
                    ->bulleted()
                    ->limit(50),
                Columns\CheckboxColumn::make('is_active')
                    ->label('Actif')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFaqs::route('/'),
        ];
    }
}
