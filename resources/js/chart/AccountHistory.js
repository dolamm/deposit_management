import Chart from 'chart.js/auto';
var labels = {{Js::from($accountHistory)}};
        var accountData = {{Js::from($accountBlance)}};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Bien Dong So Du',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: accountData,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );