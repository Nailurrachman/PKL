<x-filament::page>
    <div class="space-y-8">
        {{-- Header dengan gradient dan shadow --}}
        <div class="p-6 bg-gradient-to-r from-blue-100 to-blue-200 shadow-lg rounded-2xl border border-blue-200">
            <div class="flex items-center space-x-8">
                <div class="bg-white p-2 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-1">{{ $record->nama }}</h1>
                    <p class="text-gray-600 text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        {{ $record->email }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Grid Informasi Pribadi dan Kepegawaian --}}
        <div class="grid md:grid-cols-2 gap-6">
            <x-filament::card class="hover:shadow-lg transition-all duration-300 ease-in-out">
                <h2 class="text-xl font-semibold text-blue-600 border-b pb-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Informasi Pribadi
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">NIK</span>
                        <span class="font-bold text-gray-800">{{ $record->nik }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Jenis Kelamin</span>
                        <span>{{ $record->jenis_kelamin_enum }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Tempat Lahir</span>
                        <span>{{ DB::table('pegawais')
                            ->join('tempat_lahir', 'pegawais.id_tempat_lahir', '=', 'tempat_lahir.id')
                            ->where('pegawais.id_tempat_lahir', $record->id_tempat_lahir)
                            ->value('tempat_lahir.nama_kota') }}
                        </span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Tanggal Lahir</span>
                        <span>{{ \Carbon\Carbon::parse($record->tanggal_lahir_date)->translatedFormat('d F Y') }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Umur</span>
                        <div class="text-right">
                            <span>{{ \Carbon\Carbon::parse($record->tanggal_lahir_date)->age }} Tahun</span>
                        </div>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Jumlah Istri/Suami</span>
                        <span>{{ $record->jumlah_istri_suami }}</span>
                    </div>
                    <div class="flex justify-between pb-2">
                        <span class="font-medium text-gray-600">Jumlah Anak</span>
                        <span>{{ $record->jumlah_anak }}</span>
                    </div>
                </div>
            </x-filament::card>

            <x-filament::card class="hover:shadow-lg transition-all duration-300 ease-in-out">
                <h2 class="text-xl font-semibold text-blue-600 border-b pb-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Kepegawaian
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Status ASN</span>
                        <span class="font-bold">{{ $record->status_asn }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">NIP Baru</span>
                        <span>{{ $record->nip_baru }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Status Pegawai</span>
                        <span class="inline-block px-3 py-1 text-sm font-semibold rounded-lg">
                        <span class="inline-block px-3 py-1 text-sm font-semibold rounded-lg">
                            {{ $record->status_pegawai}}
                        </span>
                        </span>
                    </div>


                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Jabatan</span>
                        <span>{{ DB::table('pegawais')
                            ->join('jabatan', 'pegawais.jabatan_id', '=', 'jabatan.id')
                            ->where('pegawais.id', $record->id)
                            ->value('jabatan.nama_jabatan') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">TMT Golongan</span>
                        <span>{{ $record->tmt_gol_date }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">TMT Jabatan</span>
                        <span>{{ $record->tmt_jabatan_date }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Jabatan</span>
                        <span>{{ DB::table('pegawais')
                            ->join('unit_kerja', 'pegawais.unit_kerja_id', '=', 'unit_kerja.id')
                            ->where('pegawais.id', $record->id)
                            ->value('unit_kerja.nama') }}</span>
                    </div>
                </div>
            </x-filament::card>
        </div>

        {{-- Bagian Footer dengan Pendidikan dan Kontak --}}
        <div class="grid md:grid-cols-2 gap-6">
            <x-filament::card class="hover:shadow-lg transition-all duration-300 ease-in-out">
                <h2 class="text-xl font-semibold text-blue-600 border-b pb-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Pendidikan
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Kualifikasi</span>
                        <span class="font-bold">{{ $record->kualifikasi_pendidikan }}</span>
                    </div>
                    <div class="flex justify-between pb-2">
                        <span class="font-medium text-gray-600">Program Studi</span>
                        <span>{{ $record->nama_prodi }}</span>
                    </div>
                </div>
            </x-filament::card>

            <x-filament::card class="hover:shadow-lg transition-all duration-300 ease-in-out">
                <h2 class="text-xl font-semibold text-blue-600 border-b pb-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    Kontak
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Email</span>
                        <span>{{ $record->email }}</span>
                    </div>
                    <div class="flex justify-between pb-2">
                        <span class="font-medium text-gray-600">No. Telepon</span>
                        <span>{{ $record->nomor_telp_php ?? '-' }}</span>
                    </div>
                </div>
            </x-filament::card>
        </div>

        {{-- Alamat --}}
        <x-filament::card class="hover:shadow-lg transition-all duration-300 ease-in-out">
            <h2 class="text-xl font-semibold text-blue-600 border-b pb-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Alamat
            </h2>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Alamat Rumah</span>
                <span>{{ $record->alamat_rumah }}</span>
            </div>
        </x-filament::card>
    </div>
</x-filament::page>