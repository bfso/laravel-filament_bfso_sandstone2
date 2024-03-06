<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcessResource\Pages;
use App\Filament\Resources\ProcessResource\RelationManagers;
use App\Models\Process;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcessResource extends Resource
{
    protected static ?string $model = Process::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
                Select::make('process')->options([
                    'is_active' => 'Active',
                    'is_open' => 'Open',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
               TextColumn::make('title')->label('Title')->searchable(),
                TextColumn::make('status')->label('Status')->sortable(),
                

            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                TextColumn::make('title')
                // ->actions([
                //     Action::make('nextStep')
                //         ->requiresConfirmation()
                //         ->action(function (Process $record): void {
                //             // Your logic to update the status here
                //             // Assuming that 'status' is an enum field
                //             // $currentStatus = $record->status;
                //             // $enumValues = ['is_active', 'is_open', 'is_processing', 'is_late', 'is_successful'];
                        
                //             // Get the index of the current status in the enum values
                //             // $currentIndex = array_search($currentStatus, $enumValues);
                        
                //             // Get the next status, or wrap around to the first if it's the last one
                //             // $nextIndex = ($currentIndex + 1) % count($enumValues);
                //             // $nextStatus = Arr::get($enumValues, $nextIndex);
                        
                //             // Update the record with the next status
                //             // $record->update(['status' => $nextStatus]);
                            
                //             // Example confirmation message
                //             $this->notify('Status updated successfully.');
                //         }),
              //  ])
             
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
            'index' => Pages\ListProcesses::route('/'),
            'create' => Pages\CreateProcess::route('/create'),
            'edit' => Pages\EditProcess::route('/{record}/edit'),
        ];
    }
}
