import Chart from "chart.js/auto";

$(document).ready(function () {
    const api = "/api/account-detail";
    fetch(api)
        .then((response) => response.json())
        .then((data) => {
            // convert object to array
            data = Object.values(data);

            console.log(data);
            let chartData = {
                labels: ["số dư tài khoản", "số dư tiết kiệm"],
                datasets: [
                    {
                        label: "số dư tài khoản",
                        data: [data[0], data[1]],
                        backgroundColor: [
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 105, 180, 0.2)",
                        ],
                        borderColor: [
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 105, 180, 1)",
                        ],
                        borderWidth: 1,
                    },
                ],
            };
            const config = {
                type: "pie",
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "top",
                        },
                        title: {
                            display: true,
                            text: "Tổng tài sản",
                        },
                    },
                },
            };
            const myChart = new Chart(
                document.getElementById("chart-tai-san"),
                config
            );
        });
});
