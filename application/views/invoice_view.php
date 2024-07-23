<style>
table{
    width: 100%;
}
.mb-5{
    margin-bottom: 50px;
}
.mt-5{
    margin-top: 50px;
}
.mt-10{
    margin-top: 100px;
}
.table-striped tbody tr:nth-child(odd) {
    background-color: #DDDDDD; 
}
.table tr td, .table tr th {
    padding: 10px;
}
.left{
    text-align: left;
}
.center{
    text-align: center;
}
.right{
    text-align: right;
}
.strong{
    font-weight: bold;
}

</style>

<table class="mb-5">
    <tr>
        <td><strong>Invoice No. #<?= $o['kode_order'] ?></strong></td>
        <td><?= ($o['status_order'] == 2 ? tgl_indo($o['confirm_order']) : tgl_indo($o['paid_order'])) ?></td>
        <td align="right"><strong>Status:</strong> <?= $o['nama_os'] ?> </span></td>
    </tr>
</table>

<table class="mb-5">
    <tr>
        <td>
            To :
            <div><strong><?= $o['fname_order']." ".$o['lname_order']?></strong></div>
            <div><?= $o['address_order'] ?></div>
            <div>Email: <?= $o['email_order'] ?></div>
            <div>Phone: <?= $o['phone_order'] ?></div>
        </td>

        <td align="right">
            <img width="100px" src="<?= $qr; ?>" alt="" class="img-fluid width110">
        </td>
    </tr>

</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Room</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="left">
                <strong><?= $o['nama_room'] ?></strong><br>
                <?= date('M d, Y', strtotime($o['ci_order'])).' - '.date('M d, Y', strtotime($o['co_order'])).' ('.$o['durasi_order'].' days)' ?>
            </td>
            <td class="right">Rp<?= number_format($o['price_n_order'], 0, ",", ".") ?></td>
        </tr>
    </tbody>
</table>

<table class="table">
    <tbody>
        <tr>
            <td class="left"><strong>Subtotal</strong></td>
            <td class="right">Rp<?= number_format($o['price_n_order'], 0, ",", ".") ?></td>
        </tr>
        <?php if($o['vip_order'] == 1): ?>
        <tr>
            <td class="left"><strong>VIP ACCESS</strong></td>
            <td class="right">Rp<?= number_format($o['price_n_order']*0.25, 0, ",", ".") ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td class="left"><strong>Total</strong></td>
            <td class="right"><strong>Rp<?= number_format(($o['vip_order'] == 1 ? $o['price_order'] : $o['price_n_order']), 0, ",", ".") ?></strong></td>
        </tr>
    </tbody>
</table>

<div class="mt-10 center">
    <p style="color:#333;margin:0;">Supperior Canggu</p>
    <p style="color:#333;margin:0;">Gg. Anggrek Jl. Pemelisan Agung No.2, Tibubeneng, Kec. Kuta Utara, Kabupaten Badung, Bali 80361</p>
</div>