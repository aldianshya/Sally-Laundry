@extends('layout.app')
@section('content')
    <!-- Modal -->
    <!-- Modal -->
    <div id="modalKilo"
        style="
        align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: rgba(0,0,0,0.5);
  display: none;
  
  animation: fadeIn 0.3s ease;
  z-index: 1000;
">
        <div
            style="
    background: #ffe6f0;
    border-radius: 15px;
    padding: 20px;
    width: 90%;
    max-width: 400px;
    border: 2px solid #ffb6c1;
    box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
    animation: zoomIn 0.4s ease;
  ">
            <div style="background-color: #ffc0cb; padding: 10px 15px; border-radius: 12px 12px 0 0; color: white;">
                <h3 style="margin: 0;">Konfirmasi</h3>
            </div>
            <div style="padding: 15px; font-size: 16px; color: #660033;">
                Apakah status <strong id="prosesName">Laundry</strong> sudah selesai?
            </div>

            {{-- @method('PATCH') --}}
            <div style="display: flex; justify-content: flex-end; gap: 10px; padding: 10px 15px;">
                <button onclick="closeModal()"
                    style="background-color: #f5c2c7; border: none; padding: 8px 16px; color: #6c0b2b; border-radius: 6px;">Batal</button>
                <form id="confirmForm" method="POST">
                    @csrf
                    <button type="submit"
                        style="background-color: #ff69b4; border: none; padding: 8px 16px; color: white; border-radius: 6px;">Ya,
                        Selesai</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Animasi -->
    <div style="display: none;">
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes zoomIn {
                from {
                    transform: scale(0.9);
                    opacity: 0;
                }

                to {
                    transform: scale(1);
                    opacity: 1;
                }
            }
        </style>
    </div>


    <div style="text-align: center; margin-top: 30px;">
        <p style="font-weight: bold; font-style: italic;">#{{ $transaksi->struck }}</p>

        <div style="display: flex; justify-content: center; gap: 30px; margin: 30px 0;">
            @php
                $prosesList = [
                    ['key' => 'dicuci', 'label' => 'Dicuci'],
                    ['key' => 'diproses', 'label' => 'Diproses'],
                    ['key' => 'disetrika', 'label' => 'Disetrika'],
                    ['key' => 'dikemas', 'label' => 'Dikemas'],
                    ['key' => 'selesai', 'label' => 'Selesai'],
                ];
            @endphp

            @foreach ($prosesList as $proses)
                @php
                    $status = $transaksi->{$proses['key']};
                    $img = $status ? 'sukses' : $proses['key'];
                @endphp
                <div style="text-align: center;">
                    <img src="/images/{{ $img }}.png" alt="{{ $proses['label'] }}"
                        style="width: 60px; cursor: pointer;" data-proses="{{ $proses['key'] }}"
                        data-label="{{ $proses['label'] }}"
                        onclick="openModalKilo('{{ $proses['key'] }}', '{{ $proses['label'] }}', {{ $transaksi->id }})">
                    <p style="color: #e91e63; font-style: italic; margin-top: 8px;">{{ $proses['label'] }}</p>
                </div>
            @endforeach
        </div>

        <div
            style="background-color: #fce4ec; padding: 20px; border-radius: 10px; width: 300px; margin: auto; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
            <table style="width: 100%; font-size: 14px;">
                <tr>
                    <td style="font-weight: bold;">Nama</td>
                    <td style="text-align: right;">{{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Tanggal</td>
                    <td style="text-align: right;">
                        {{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Waktu</td>
                    <td style="text-align: right;">{{ $transaksi->listharga->waktu ?? '-' }}</td>
                </tr>
            </table>
        </div>

        @if ($transaksi->selesai)
            <button
                style="margin-top: 20px; background-color: #4caf50; color: white; padding: 10px 25px; border: none; border-radius: 12px; font-weight: bold; box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);">
                SELESAI
            </button>
        @else
            <button
                style="margin-top: 20px; background-color: #c2185b; color: white; padding: 10px 25px; border: none; border-radius: 12px; font-weight: bold; box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);">
                ON GOING
            </button>
        @endif

    </div>
    <script>
        function openModalKilo(prosesKey, label, transaksiId) {
            const modal = document.getElementById('modalKilo');
            const prosesName = document.getElementById('prosesName');
            const form = document.getElementById('confirmForm');

            prosesName.innerText = label;
            form.action = `/transaksi/${transaksiId}/${prosesKey}`;

            modal.style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modalKilo').style.display = 'none';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- @include('layout.modal')--}}
@include('layout.script') 
@endsection
