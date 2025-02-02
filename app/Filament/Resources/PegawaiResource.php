<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                
                Forms\Components\Select::make('jenis_kelamin_enum')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                
                Forms\Components\Select::make('status_asn')
                    ->label('ASN')
                    ->options([
                        'PNS' => 'PNS',
                        'PPPK' => 'PPPK',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('nip_lama')
                    ->required(),
                
                Forms\Components\TextInput::make('nip_baru')
                    ->required(),

                Forms\Components\TextInput::make('nik')
                    ->required(),

                Forms\Components\Select::make('status_pegawai')
                    ->label('Status Pegawai')
                    ->options([
                        'aktif' => 'Aktif',
                        'pensiun' => 'pensiun',
                        'mutasi' => 'mutasi',
                    ])
                    ->required(),

                Forms\Components\Select::make('id_tempat_lahir')
                    ->relationship('tempat_lahir', 'nama_kota')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_lahir_date')
                    ->required(),

                Forms\Components\Select::make('id_gol_ru')
                    ->relationship('gol_ru', 'nama')
                    ->required(),

                Forms\Components\DatePicker::make('tmt_gol_date')
                    ->required(),

                Forms\Components\Select::make('jabatan_id')
                    ->label('Jabatan')
                    ->relationship('jabatan', 'nama_jabatan')
                    ->required(),

                Forms\Components\DatePicker::make('tmt_jabatan_date')
                    ->required(),

                Forms\Components\DatePicker::make('tmt_pertama_diangkat_dlm_jabatan_s/f_date')
                    ->required(),

                Forms\Components\TextInput::make('tugas_pokok_wilayah_penugasan_tugas_mapel')
                    ->required(),

                Forms\Components\DatePicker::make('tmt_penugasan_date')
                    ->required(),

                Forms\Components\Select::make('unit_kerja_id')
                    ->relationship('unit_kerja', 'nama')
                    ->required(),

                Forms\Components\Select::make('satker_id')
                    ->relationship('satker', 'nama')
                    ->required(),

                Forms\Components\Select::make('kualifikasi_pendidikan')
                    ->options([
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                        'S1' => 'S1',
                        'S2' => 'S2',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('nama_prodi')
                    ->required(),

                Forms\Components\DatePicker::make('tmt_cpns_spm_date')
                    ->required(),

                Forms\Components\DatePicker::make('tmt_pns_date')
                    ->required(),

                Forms\Components\TextInput::make('jumlah_istri_suami')
                    ->required(),

                Forms\Components\TextInput::make('jumlah_anak')
                    ->required(),

                Forms\Components\TextInput::make('alamat_rumah')
                    ->required(),

                Forms\Components\TextInput::make('nomor_telp_php')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nip_baru'),
                Tables\Columns\TextColumn::make('Jabatan.nama_Jabatan')
                    ->label('Jabatan'),

                Tables\Columns\TextColumn::make('status_pegawai')
                    ->label('Status Pegawai')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_pegawai')
                    ->label('Status Pegawai')
                    ->options([
                        'aktif' => 'Aktif',
                        'pensiun' => 'pensiun',
                        'mutasi' => 'mutasi',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
            'view' => Pages\ViewPegawai::route('/{record}/view')
        ];
    }
}