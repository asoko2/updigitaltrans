@extends('admin.layout.app')
@section('content')
    <div x-data="{ showModal: false }">
        <div class="font-bold text-2xl text-primary-admin mb-8">Form Merchant</div>
        <div class="flex flex-row gap-4 w-full mb-4 justify-between">
            <div class="flex flex-row gap-4">
                {{-- Modal Tambah Merchant --}}
                <div x-data="{ showModalTambah: false }">
                    <button type="button" @click="showModalTambah = !showModalTambah"
                        class="bg-primary-admin hover:bg-primary-admin-hover rounded-lg text-white py-2 px-5 font-bold transform transition-all ease-linear duration-100">Tambah
                        <span class="mdi mdi-plus-thick"></span>
                    </button>
                    <div x-show="showModalTambah"
                        class="fixed text-primary-admin flex pt-20  justify-center overflow-auto z-50 bg-black bg-opacity-40 inset-0"
                        x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                        <!-- Modal -->
                        <div x-show="showModalTambah"
                            class="bg-gray-100 rounded-lg shadow-2xl sm:w-2/3 mx-10 mb-auto relative"
                            @click.away="showModalTambah = false"
                            x-transition:enter="transition ease duration-150 transform"
                            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease duration-150 transform"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                            <div id="loadingModal"
                                class="flex-col items-center justify-center w-full h-full z-10 absolute hidden bg-primary-white bg-opacity-30">
                                <img src="{{ asset('loading.gif') }}" />
                            </div>
                            <form id="formTambahMerchant">
                                <div class="flex flex-row gap-8 w-full p-6">
                                    <div class="flex flex-col gap-8 w-1/2">
                                        <div class="flex flex-row w-full gap-4 items-center">
                                            <label class="font-semibold w-3/12">Tipe Merchant</label>
                                            <input type="radio" name="tipe_merchant" id="merchant1" value="1"
                                                required />
                                            <label for="merchant1">Up Food</label>
                                            <input type="radio" name="tipe_merchant" id="merchant2" value="2" />
                                            <label for="merchant2">Up Mart</label>
                                        </div>
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="no_hp" placeholder="No. HP" required />
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="nama" placeholder="Nama Merchant" required />
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="no_ktp" placeholder="No. KTP" required />
                                        <input type="email"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="email" placeholder="nama@email.com" required />
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="alamat_rumah" placeholder="Alamat Rumah" required />
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="service" placeholder="Service : Makanan Berat, Makanan Ringan, Kue, Snack"
                                            required />
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="detail" placeholder="Detail" required />
                                        <input type="text"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="lokasi" placeholder="Lokasi Resto" required />
                                        <div class="flex flex-row w-full gap-4 items-center">
                                            <label for="jam_buka" class="font-semibold w-3/12">Jam Buka</label>
                                            <input type="time"
                                                class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                                name="jam_buka" placeholder="No.Kendaraan" value="{{ old('jam_buka') }}"
                                                required />
                                        </div>
                                        <div class="flex flex-row w-full gap-4 items-center">
                                            <label for="jam_tutup" class="font-semibold w-3/12">Jam Tutup</label>
                                            <input type="time"
                                                class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                                name="jam_tutup" placeholder="No.Kendaraan" value="{{ old('jam_tutup') }}"
                                                required />
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-8 h-fit w-1/2">
                                        <input type="password"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="password" placeholder="Password" required />
                                        <input type="password"
                                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                            name="password_confirmation" placeholder="Konfirmasi Password" required />
                                        <div>
                                            <label for="fotoFile">Lampirkan Foto Terbaru</label>
                                            <input type="file"
                                                class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                                                name="fotoFile" required />
                                        </div>
                                        <div>
                                            <label for="fotoFile">Scan KTP</label>
                                            <input type="file"
                                                class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                                                name="ktpFile" required />
                                        </div>
                                        <div>
                                            <label for="fotoFile">Logo atau Foto Usaha</label>
                                            <input type="file"
                                                class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                                                name="usahaFile" required />
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="bg-primary-bg text-primary hover:bg-primary hover:text-primary-bg font-bold text-lg px-3 py-2 rounded-md w-full transform transition-colors ease-out duration-150">DAFTAR</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="filter">
                    Show
                    <select id="perPage" onchange="setPerPage()"
                        class="rounded-lg shadow-lg border-none outline-none focus:ring-transparent focus:outline-none focus:ring focus:border-transparent">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="0">All</option>
                    </select>
                </div>
            </div>
            <div>
                <input type="text" placeholder="Cari Data" id="search"
                    class="rounded-lg outline-none border-none focus:outline-none focus:ring focus:ring-primary-admin transform transition-all ease-in-out duration-100 shadow-lg">
            </div>
        </div>
        <section class="w-full mb-4">
            <div class="w-full overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full z-0 text-primary-admin" id="merchantTable">
                    <thead>
                        <tr
                            class="font-semibold text-sm text-white bg-primary-admin uppercase border-b border-primary-admin">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">NIK</th>
                            <th class="px-4 py-3">Jenis</th>
                            <th class="px-4 py-3">Service</th>
                            <th class="px-4 py-3">Detail</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <div id="loading"
                        class="flex flex-col items-center w-full z-10 absolute bg-primary-white bg-opacity-30">
                        <img src="{{ asset('loading.gif') }}" />
                    </div>
                    <tbody class="bg-white text-sm">
                    </tbody>
                </table>
            </div>
        </section>
        <div id="table-footer" class="flex justify-between">
            <div id="data-info"></div>
            <div id="data-paging" class="flex flex-row gap-2"></div>
        </div>
        <!-- Modal -->

        <!-- Modal Background -->
        <div x-show="showModal"
            class="fixed text-primary-admin flex pt-40  justify-center overflow-auto z-50 bg-black bg-opacity-40 top-0 right-0 bottom-0 left-60"
            x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <!-- Modal -->
            <div x-show="showModal" class="bg-white rounded-lg shadow-2xl p-6 sm:w-1/2 mx-10 mb-auto"
                @click.away="showModal = false" x-transition:enter="transition ease duration-150 transform"
                x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease duration-150 transform"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                <div class="w-full flex justify-end">
                    <button @click="showModal = !showModal"><span
                            class="mdi mdi-close-thick text-primary-admin"></span></button>
                </div>

                <div id="modalLoading" class="flex w-full justify-center">
                    <img src="{{ asset('loading.gif') }}" />
                </div>
                <div id="modalBody" class="hidden w-full flex-col text-lg" hidden>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Nama</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="nama">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Email</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="email">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Alamat</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="alamat">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Nama Merchant</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="nama_merchant">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Jenis Merchant</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="jenis_merchant">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Service</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="service">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Detail Merchant</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="detail">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Alamat Merchant</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="alamat_merchant">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Open Time</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="w-8/12" id="open_time">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">No. KTP</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="flex flex-row justify-between w-8/12" id="no_ktp">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Photo Usaha</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="flex flex-row justify-between w-8/12" id="photo_usaha">Data</div>
                    </div>
                    <div class="flex flex-row w-full mb-3">
                        <div class="w-3/12 font-bold">Photo User</div>
                        <div class="w-1/12 font-bold">:</div>
                        <div class="flex flex-row justify-between w-8/12" id="photo_user">Data</div>
                    </div>
                    <!-- Buttons -->
                    <div id="buttonGroupVerif" class="text-right space-x-5 mt-5">
                        <a href="javascript:void(0)" id="tolak" data-id="" data-name=""
                            class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-red-500 hover:text-white focus:bg-indigo-50 focus:text-indigo">Tolak</a>
                        <a href="javascript:void(0)" id="setuju" data-id="" data-name=""
                            class="px-4 py-2 text-sm bg-white rounded-xl border-2 transition-colors duration-150 ease-linear border-primary-admin text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-primary-admin hover:text-white focus:bg-indigo-50 focus:text-indigo">Verifikasi</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        var isLoading = true;
        var page = 1;
        var perPage = 10;
        var pageLimit;
        var search = ''

        function paging(e) {
            page = parseInt(e)
            fetchData()
        }

        function previousPage() {
            if (page > 1) {
                page--
                fetchData()
            }
        }

        function nextPage() {
            if (page < pageLimit) {
                page++
                fetchData()
            }
        }

        toggleLoading()
        fetchData()

        function setPerPage() {
            page = 1
            perPage = $('#perPage').val()
            fetchData()
        }

        function toggleLoading() {
            if (isLoading) {
                $('#loading').removeClass('hidden')
            } else {
                $('#loading').addClass('hidden')
            }
        }

        function callData(e) {
            $('#modalLoading').show()
            $('#modalBody').addClass('hidden')
            $('#modalBody').removeClass('flex')
            $.ajax({
                url: `{{ url('admin/form-merchant/show') }}/${e}`,
                method: 'GET',
                type: 'ajax',
                dataType: 'json',
                success: function(data) {
                    $('#modalLoading').hide()
                    $('#modalBody').removeClass('hidden')
                    $('#modalBody').addClass('flex')
                    $('#nama').html(data.merchant.name)
                    $('#email').html(data.merchant.email)
                    $('#alamat').html(data.merchant.address)
                    $('#nama_merchant').html(data.merchant.merchant_name)
                    $('#jenis_merchant').html((data.merchant.role === 'food') ? 'Up Food' : 'Up Merchant')
                    $('#service').html(data.merchant.gallery_merchant)
                    $('#detail').html(data.merchant.description)
                    $('#alamat_merchant').html(data.merchant.address_merchant)
                    $('#open_time').html(data.merchant.open_time + ' - ' + data.merchant.close_time)
                    $('#no_ktp').html(data.merchant.nik_number +
                        ` <a href="${data.photo_ktp}" target="_blank"><span class="text-blue-500 text-xl hover:text-blue-300">Lihat KTP <span class="mdi mdi-open-in-new"></span></span></a>`
                    )
                    $('#photo_usaha').html(
                        `<a href="${data.photo_usaha}" target="_blank"><span class="text-blue-500 text-xl hover:text-blue-300">Lihat Foto Usaha <span class="mdi mdi-open-in-new"></span></span></a>`
                    )
                    $('#photo_user').html(
                        `<a href="${data.photo_user}" target="_blank"><span class="text-blue-500 text-xl hover:text-blue-300">Lihat Foto User <span class="mdi mdi-open-in-new"></span></span></a>`
                    );
                    (data.merchant.status == 0) ? $('#buttonGroupVerif').show(): $('#buttonGroupVerif').hide()
                    console.log(data.merchant.id)
                    $('#tolak').attr('data-id', data.merchant.id)
                    $('#tolak').attr('data-name', data.merchant.merchant_name)
                    $('#setuju').attr('data-id', data.merchant.id)
                    $('#setuju').attr('data-name', data.merchant.merchant_name)
                },
                error: function(e) {
                    console.log(e)
                }
            })
        }

        function fetchData() {
            isLoading = true
            toggleLoading()
            $.ajax({
                'url': `{{ url('admin/getMerchantJSON') }}?page=${page}&perPage=${perPage}&search=${search}`,
                'type': 'GET',
                'dataType': 'json',
                success: function(data) {
                    isLoading = false;
                    toggleLoading()
                    pageLimit = data.last_page
                    var html = '';
                    var i = 1;
                    var no = (data.current_page == 1) ? 1 : (((data.current_page - 1) * perPage) + 1)
                    if (data.data.length > 0) {
                        data.data.forEach(e => {
                            html +=
                                `<tr>
                                        <td class="px-4 py-3 border">${no}</td>
                                        <td class="px-4 py-3 border">${e.name}</td>
                                        <td class="px-4 py-3 border">${e.email}</td>
                                        <td class="px-4 py-3 border">${e.address}</td>
                                        <td class="px-4 py-3 border">${e.nik_number}</td>
                                        <td class="px-4 py-3 border">${(e.role === 'food') ? 'Up Food' : 'Up Mart'}</td>
                                        <td class="px-4 py-3 border">${e.gallery_merchant}</td>
                                        <td class="px-4 py-3 border">${e.description}</td>
                                        <td class="px-4 py-3 border">${(e.status == 0 ? 'Belum Diverifikasi' : (e.status == 1) ? 'Diterima' : 'Ditolak')}</td>
                                        <td class="px-4 py-3 border place-items-center">
                                            <a href="javascript:void(0)" id="view" @click="showModal = !showModal; callData(${e.id})"><span class="mdi mdi-eye text-xl"></span></a>
                                        </td>
                                    </tr>`
                            no++
                        });
                    } else {
                        html =
                            '<tr><td colspan="10" class="text-center w-full px-4 py-3">Tidak ada Data</td></tr>'
                    }
                    $('#merchantTable tbody').html(html)
                    var nav = ''
                    data.links.forEach((e, index) => {
                        var active = (e.active) ? 'bg-primary-admin text-white' :
                            'bg-white text-primary-admin hover:bg-primary-admin hover:text-white'
                        var disabled = 'bg-white text-gray-300 cursor-default'
                        nav +=
                            `<button class="px-4 py-3 ${(e.url == null) ? disabled : active} rounded-md shadow-md transform transition-all ease-in-out duration-100" onClick="${index == 0 ? 'previousPage()' : index == (data.links.length - 1) ? 'nextPage()' : `paging(${e.url.split("=")[1]})`}">${e.label}</button>`
                    });
                    $('#data-paging').html(nav)

                    $('#data-info').html(
                        `<span>Showing ${data.from} to ${data.to} from ${data.total} data</span>`
                    )
                },
                error: function(e) {
                    console.log(e)
                }
            })
        }

        $(document).ready(function() {

            $('input[name="no_hp"]').mask('0000000000000')
            $('input[name="no_sim"]').mask('0000000000000')
            $('input[name="no_stnk"]').mask('00000000')
            $('input[name="no_ktp"]').mask('0000000000000000')

            function debounce(callback, wait) {
                let timeout;
                return (...args) => {
                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        callback.apply(this, args);
                    }, wait);
                };
            }

            $('#search').on('input', debounce((e) => {
                search = e.target.value
                fetchData()
            }, 500))

            function toggleModal() {
                $('#merchantModal').toggleClass('hidden')
                $('#merchantModal').toggleClass('flex')
            }

            $('#close-modal').on('click', function() {
                toggleModal()
            })
            $('#modal-bg').on('click', function() {
                toggleModal()
            })

            $('#tolak').on('click', function() {
                const id = $(this).attr('data-id')
                const name = $(this).attr('data-name')
                Swal.fire({
                    title: 'Konfirmasi',
                    text: `Apakah anda yakin akan menolak form pendaftaran merchant ${name}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tolak!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    Swal.showLoading()
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.verifMerchant') }}',
                            type: 'ajax',
                            method: 'post',
                            data: {
                                id: id,
                                status: 2,
                            },
                            success: function(data) {
                                console.log('sukses update');
                                Swal.fire(
                                    'Sukses!',
                                    `Berhasil tolak pendaftaran ${name}`,
                                    'success'
                                )
                                fetchData()
                            },
                            error: function(e) {
                                console.log(e)
                                Swal.hideLoading()
                            }
                        })
                    }
                })
            })

            $('#setuju').on('click', function() {
                const id = $(this).attr('data-id')
                const name = $(this).attr('data-name')
                Swal.fire({
                    title: 'Konfirmasi',
                    text: `Apakah anda yakin akan menerima form pendaftaran merchant ${name}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, terima!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.verifMerchant') }}',
                            type: 'ajax',
                            method: 'post',
                            data: {
                                'id': id,
                                'status': 1,
                            },
                            success: function(data) {
                                console.log('sukses update');
                                Swal.fire(
                                    'Sukses!',
                                    `Berhasil menerima pendaftaran ${name}`,
                                    'success'
                                )
                                fetchData()
                            },
                            error: function(e) {
                                console.log(e)
                                Swal.hideLoading()
                            }
                        })
                    }
                })
            })

            $('#formTambahMerchant').submit(function() {
                var form = $('#formTambahMerchant')[0]
                var data = new FormData(form)
                $('#loadingModal').addClass('flex')
                $('#loadingModal').removeClass('hidden')
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '{{ route('admin.tambahMerchant') }}',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        $('#loadingModal').removeClass('flex')
                        $('#loadingModal').addClass('hidden')
                        $('#formTambahMerchant').trigger('reset')
                        Swal.fire(
                            'Sukses!',
                            `Berhasil tambah data merchant`,
                            'success'
                        )
                        fetchData()
                    },
                    error: function(e) {
                        $('#loadingModal').removeClass('flex')
                        $('#loadingModal').addClass('hidden')
                        $('#formTambahMerchant').trigger('reset')
                        Swal.fire(
                            'Error!',
                            `Error tambah data merchant`,
                            'error'
                        )
                    }
                })
                return false
            })

        })
    </script>
@endsection
