<?php
$query = mysqli_query($con, "SELECT s.id_saham, s.nama, s.code, h1.close AS last_close,
               ROUND(((h1.close - h2.close) / h2.close) * 100, 2) AS percentage_change
FROM saham s
JOIN harga h1 ON s.id_saham = h1.id_saham
LEFT JOIN harga h2 ON s.id_saham = h2.id_saham 
    AND h2.tanggal = (SELECT MAX(h.tanggal) FROM harga h WHERE h.id_saham = s.id_saham AND h.tanggal < h1.tanggal)
WHERE h1.tanggal = (SELECT MAX(h.tanggal) FROM harga h WHERE h.id_saham = s.id_saham);
");

while ($data = mysqli_fetch_array($query)) {
    $saham[] = $data;
}
?>

<div class="saham my-4">

    <div class="daftar-saham">
        <div class="d-flex justify-content-between mt-3">
            <h6 class="fw-semibold">List Saham (<span><?= count($saham); ?></span>)</h6>
        </div>
        <?php
        if (empty($saham)) {
            echo "Tidak ada data";
        } else {
        ?>
            <ol class="m-0 p-0">
                <?php
                foreach ($saham as $data) {
                ?>
                    <li class="list-saham rounded-4 px-3 py-3 my-2 bg-secondary-subtle d-flex justify-content-between align-items-center">
                        <div class="title flex-grow-1">
                            <a href="index.php?page=Saham&id=<?= $data['id_saham']; ?>"><span class="fw-bold"><?= $data['nama']; ?></span></a>
                            <p class="fw-light"><i class="ph-fill ph-map-pin-line"></i> <?= $data['code']; ?></p>

                        </div>
                        <div class="desc d-flex flex-column align-items-end">
                            <p><i class="ph-fill ph-currency-dollar"></i> <?= number_format($data['last_close'], 0, ',', '.'); ?></p>
                            <p><i class="ph-fill ph-currency-dollar"></i> <?= number_format($data['percentage_change'], 2); ?>%</p>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ol>
        <?php
        }
        ?>
    </div>
</div>