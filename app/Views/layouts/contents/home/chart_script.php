<script>
    let myChart;

    function fetchChartData(year) {
        fetch(`/chart/getChartData?year=${year}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Error: ' + data.error);
                } else {
                    const ctx = document.getElementById('myChart').getContext('2d');
                    if (myChart) {
                        myChart.data.labels = data.labels;
                        myChart.data.datasets[0].data = data.datasets[0].data;
                        myChart.update();
                    } else {
                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: data.datasets
                            },
                            options: {
                                plugins: {
                                    datalabels: {
                                        display: true,
                                        color: '#444',
                                        anchor: 'end',
                                        align: 'top'
                                    }
                                },
                                scales: {
                                    x: { title: { display: true, text: 'เดือน' } },
                                    y: { title: { display: true, text: 'จำนวนสมาชิก' }, beginAtZero: true }
                                }
                            },
                            plugins: [ChartDataLabels]
                        });
                    }
                    document.getElementById('totalMembers').innerText = `ยอดรวมทั้งหมดในปี: ${data.total_count} คน`;

                    const currentTime = new Date();
                    document.getElementById('updateTime').innerText = 
                        `อัปเดตล่าสุดเมื่อ: ${currentTime.toLocaleString('th-TH')}`;
                }
            })
            .catch(error => console.error('Error:', error));
    }

    document.getElementById('yearSelect').addEventListener('change', (event) => {
        const year = event.target.value;
        if (year) {
            fetchChartData(year);
        }
    });

    setInterval(() => {
        const year = document.getElementById('yearSelect').value;
        if (year) fetchChartData(year);
    }, 10000);
</script>
