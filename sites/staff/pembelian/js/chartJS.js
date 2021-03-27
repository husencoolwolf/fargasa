        var ctx1 = document.getElementById('chartJmlBeli').getContext('2d');
        var chartJmlBeli = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: 'Jumlah Transaksi Pembelian',
                    data: [],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            // max: <?php echo($dataChart[1] + 10 -($dataChart[1]%10)); ?>,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartJmlHarga = new Chart(document.getElementById('chartJmlHarga').getContext('2d'), {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: 'Jumlah Biaya Pembelian per Bulan',
                    data: [],
                    backgroundColor:'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            // max: <?php echo($dataChart[1] + 10 -($dataChart[1]%10)); ?>,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });