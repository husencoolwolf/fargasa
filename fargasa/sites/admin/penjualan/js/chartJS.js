        var ctx1 = document.getElementById('chartJmlJual').getContext('2d');
        var chartJmlJual = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: 'Jumlah Transaksi Penjualan',
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
                responsive: true,
                maintainAspectRatio: false,
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
                    label: 'Total Profit Bulanan (Juta)',
                    backgroundColor: 'rgba(255, 99, 132, 0)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointHoverBorderWidth: 10,
                    pointBorderWidth: 5,
                    pointHitRadius: 10,
                    data: []
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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