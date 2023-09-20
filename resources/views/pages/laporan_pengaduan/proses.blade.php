<li class="{{ $status == 'selesai' ? 'active' : '' }}">

    <p class="mb-0"><strong></i>Selesai</strong></p>
    <p class="my-0 text-secondary">
        created at
    </p>
    <p>Data Laporan telah selesai</p>
</li>

<li class="{{ $status == 'pengerjaan' ? 'active' : '' }}">

    <p class="mb-0"><strong>Pengerjan</strong></p>
    <p class="my-0 text-secondary">
        created at
    </p>
    <p>Laporan pengaduan dalam proses pengerjaan</p>
</li>

<li class="{{ $status == 'proses' ? 'active' : '' }}">

    <p class="mb-0"><strong>Proses</strong></p>
    <p class="my-0 text-secondary">
        created at
    </p>
    <p>Laporan pengaduan sementara di proses.</p>
</li>

<li class="{{ $status == 'pending' ? 'active' : '' }}">

    <p class="mb-0"><strong>Pending</strong></p>
    <p class="my-0 text-secondary">
        created at
    </p>
    <p>Pengaduan dalam proses pending.</p>
</li>
