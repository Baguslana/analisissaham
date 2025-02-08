<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id_saham = intval($_GET["id"]); // Pastikan ID saham adalah angka

    // Query untuk mengambil data harga saham berdasarkan id_saham
    $query = mysqli_query($con, "SELECT * 
    FROM harga 
    WHERE id_saham = $id_saham
    AND tanggal >= DATE_SUB((SELECT MAX(tanggal) FROM harga WHERE id_saham = $id_saham), INTERVAL 8 DAY)
    ORDER BY tanggal ASC;");

    $labels = [];
    $data = [];
    $data2 = [];

    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $labels[] = $row['tanggal'];
            $data[] = $row['close'];
            $data2[] = $row['volume'];
        }
    }

    $labels_json = json_encode($labels);
    $data_json = json_encode($data);
    $data2_json = json_encode($data2);
} else {
    echo "ID saham tidak ditemukan.";
    exit;
}
?>

<div>
    <canvas id="myChart"></canvas>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    let labels = <?php echo $labels_json; ?>;
    let data = <?php echo $data_json; ?>; // Data Close Price
    let data2 = <?php echo $data2_json; ?>; // Data Volume

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Close Price',
                data: data,
                borderColor: 'rgb(75, 192, 192)', // Warna garis hijau kebiruan
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                tension: 0.4,
                yAxisID: 'y', // Gunakan sumbu Y utama
            }, {
                label: 'Volume',
                data: data2,
                borderColor: 'rgb(255, 99, 132)', // Warna garis merah
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2,
                tension: 0.4,
                yAxisID: 'y1', // Gunakan sumbu Y kedua
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Close Price'
                    }
                },
                y1: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Volume'
                    },
                    grid: {
                        drawOnChartArea: false // Hindari tumpang tindih grid dengan sumbu Y utama
                    }
                }
            }
        }
    });
</script>