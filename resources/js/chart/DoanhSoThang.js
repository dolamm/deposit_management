import Chart from "chart.js/auto";

$(document).ready(() => {
    const api = "/api/bc-doanh-so-thang";
    fetch(api)
        .then((res) => {
            return res.json();
        })
        .then((data) => {
            let key = Object.keys(data);
            key.forEach((element) => {
                let tempData = data[element];
                let tongchi = [];
                let tongthu = [];
                let label = Object.keys(tempData);
                label.forEach((item) => {
                    tongchi.push(tempData[item].tongchi);
                    tongthu.push(tempData[item].tongthu);
                });
                let chartData = {
                    labels: label,
                    datasets: [
                        {
                            label: "Tổng chi",
                            backgroundColor: "rgb(255, 99, 132)",
                            borderColor: "rgb(255, 99, 132)",
                            data: tongchi,
                            fill: false,
                        },
                        {
                            label: "Tổng thu",
                            backgroundColor: "rgb(54, 162, 235)",
                            borderColor: "rgb(54, 162, 235)",
                            data: tongthu,
                            fill: false,
                        },
                    ],
                };
                const config = {
                    type: "radar",
                    data: chartData,
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: "Tổng số lãi chi trả mỗi tháng",
                            },
                        },
                    },
                };
                let ctx = document.getElementById("myChart-"+ element + "-thang");
                new Chart(ctx, config);
            });
        });
});
