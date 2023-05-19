<div>
    <div class="row">
        <!-- Area Chart -->

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="background-color: blue">
                    <h6 class="m-0 font-weight-bold text-white">Informasi Anggota</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form wire:submit.prevent="filter" class="mb-3">
                        <div class="mb-3">

                            <label for="formFile" class="form-label">Filter Data</label>
                            <input class="form-control" type="month" id="formFile" wire:model="bulan">

                        </div>

                        <button class="btn btn-primary btn-icon-split btn-sm" type="submit">
                            <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span wire:loading.remove>Cari</span>
                            <span wire:loading>Searching...</span>
                        </button>
                    </form>
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>No Urut</td>
                                <td>:</td>
                                <td>{{ isset($data['rekap']) ? @$data['rekap']->rekap_id : '' }}</td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{ isset($data['rekap']) ? @$data['rekap']->nip_id : '' }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ isset($data['rekap']) ? @$data['rekap']->pegawai->nama : '' }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="background-color: blue">
                    <h6 class="m-0 font-weight-bold text-white">Informasi Saldo Simpanan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>Simpanan Pokok</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['wajib']) ? 'Rp. ' . number_format(@$data['wajib']->total_simpanan_pokok) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Simpanan Wajib</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['wajib']) ? 'Rp. ' . number_format(@$data['wajib']->total_simpanan_wajib) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Simpanan Khusus</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['wajib']) ? 'Rp. ' . number_format(@$data['wajib']->total_simpanan_khusus) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr style="background-color: yellow">
                                <td class="text-bold">Total Saldo Simpanan</td>
                                <td>:</td>
                                <td>{{ isset($data['wajib']) ? 'Rp. ' . number_format(@$data['wajib']->total_simpanan_pokok + @$data['wajib']->total_simpanan_wajib + @$data['wajib']->total_simpanan_khusus) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="background-color: blue">
                    <h6 class="m-0 font-weight-bold text-white">Potongan Simpin KUB</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>Simpanan Wajib</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_simpanan_wajib) : 'Rp. 0.00' }}
                                </td>
                                <td style="background-color: blue" class="text-white text-center" colspan="3">Sisa
                                    Pokok Pinjaman</td>
                            </tr>
                            <tr>
                                <td>Pinjaman Reguler</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_reguler) : 'Rp. 0.00' }}
                                </td>
                                <td>{{ isset($data['reguler']) ? 'Rp. ' . number_format(@$data['reguler']->saldo_pokok) : 'Rp. 0.00' }}</td>
                                <td>Potongan Ke- {{ isset($data['reguler']) ? 'Rp. ' .@$data['reguler']->pot_ke : '0' }}</td>
                                <td>Dari {{ isset($data['reguler']) ? 'Rp. ' .@$data['reguler']->tenor : '0' }}</td>
                            </tr>
                            <tr>
                                <td>Pinjaman Jatim Syariah</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_bjs) : 'Rp. 0.00' }}
                                </td>
                                <td>{{ isset($data['bjs']) ? 'Rp. ' . number_format(@$data['bjs']->saldo_pokok) : 'Rp. 0.00' }}</td>
                                <td>Potongan Ke- {{ isset($data['bjs']) ? 'Rp. ' .@$data['bjs']->pot_ke : '0' }}</td>
                                <td>Dari {{ isset($data['bjs']) ? 'Rp. ' .@$data['bjs']->tenor : '0' }}</td>
                            </tr>
                            <tr>
                                <td>Pinjaman Khusus</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_khusus) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Toko</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_toko) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Titipan PI</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_pi) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Titipan PP</td>
                                <td>:</td>
                                <td style="background-color: yellow">
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format(@$data['rekap']->pot_sosial) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                            <tr style="background-color: yellow">
                                <td>Total Potongan</td>
                                <td>:</td>
                                <td>
                                    {{ isset($data['rekap']) ? 'Rp. ' . number_format((@$data['rekap']->pot_sosial + @$data['rekap']->pot_pi + @$data['rekap']->pot_toko + @$data['rekap']->pot_khusus + @$data['rekap']->pot_bjs + @$data['rekap']->pot_reguler + @$data['rekap']->pot_simpanan_wajib )) : 'Rp. 0.00' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
