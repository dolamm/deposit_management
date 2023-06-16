import Chart from "chart.js/auto";

$(document).ready(() => {
    const api = '/api/bc-sl-so-thang';
    fetch(api)
        .then(res => {
            return res.json()
        })
        .then((data) => {
            let key = Object.keys(data);
            key.forEach((item) => {
                let tempData = data[item];
                let labels = Object.keys(tempData);
                let sl_somoi = [];
                let sl_sodong = [];
                console.log(labels);
                labels.forEach((element) => {
                    sl_somoi.push(tempData[element].sl_somoi);
                    sl_sodong.push(tempData[element].sl_sodong);
                });
                const chartData = {
                    labels: labels,
                    datasets: [
                        {
                            label: "Số lượng mới",
                            data: sl_somoi,
                            backgroundColor: "rgb(54, 162, 235)",
                            borderColor: "rgba(54, 162, 235, 0.2)",
                        },
                        {
                            label: "Số lượng đóng",
                            data: sl_sodong,
                            backgroundColor: "rgb(255, 99, 132)",
                            borderColor: "rgba(255, 99, 132, 0.2)",
                        },
                    ],
                };
                const config = {
                    type: "bar",
                    data: chartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: "top",
                            },
                            title: {
                                display: true,
                                text: "Biểu đồ số lượng sổ theo tháng",
                            },
                        },
                    },
                };
                var myChart = new Chart(
                    document.getElementById("slso-" + item + "-thang"),
                    config
                );
            });
        });
})