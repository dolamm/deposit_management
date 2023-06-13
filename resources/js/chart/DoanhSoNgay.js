import Chart from "chart.js/auto";
var api = "/api/bc-doanh-so";

fetch(api)
    .then((res) => {
        return res.json();
    })
    .then((data) => {
        let key = Object.keys(data);
        console.log(data)
        for (let i = 0; i < key.length; i++) {
            tongchi = [];
            tongthu = [];
            label = [];
            for (let j = 0; j < data[key[i]].length; j++) {
                tongchi.push(data[key[i]][j].tongchi);
                tongthu.push(data[key[i]][j].tongthu);
                //format ngaytao
                let date = new Date(data[key[i]][j].ngaytao);
                let day = date.getDate();
                let month = date.getMonth();
                let year = date.getFullYear();
                data[key[i]][j].ngaytao = new Date(year, month, day).toLocaleDateString();
                label.push(data[key[i]][j].ngaytao);
            }
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
                type: "line",
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "top",
                        },
                        title: {
                            display: true,  
                            text: "Tổng số lãi chi trả",
                        },
                    },
                },
            };
            var myChart = new Chart(
                document.getElementById("myChart-" + key[i]),
                config
            );
        }
    });
