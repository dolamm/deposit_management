import Chart from "chart.js/auto";
$(document).ready(() => {
    const api = "api/bc-sl-so";
    fetch(api)
        .then((res) => {
            return res.json();
        })
        .then((data) => {
            let key = Object.keys(data);
            console.log(data);
            key.forEach((element) => {
                let labels = [];
                let sl_somoi = [];
                let sl_sodong = [];
                let tempData = data[element].reverse();
                tempData.forEach((item) => {
                    let date = new Date(item.ngaytao);
                    let day = date.getDate();
                    let month = date.getMonth();
                    let year = date.getFullYear();
                    let label = new Date(year, month, day).toLocaleDateString();
                    labels.push(label);
                    sl_somoi.push(item.sl_somoi);
                    sl_sodong.push(item.sl_sodong);
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
                                text: "Biểu đồ số lượng sổ theo ngày",
                            },
                        },
                    },
                };
                var myChart = new Chart(
                    document.getElementById("slso-" + element + "-ngay"),
                    config
                );
            });
        });
});
