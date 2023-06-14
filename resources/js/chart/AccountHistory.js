import Chart from "chart.js/auto";
$(document).ready(() => {
    const api = "/api/bien-dong-so-du";

    fetch(api)
        .then((response) => response.json())
        .then((data) => {
            let labels = [];
            let accountData = [];
            data.forEach((element) => {
                //format created_at
                let format_date = new Date(element.created_at);
                let day = format_date.getDate();
                let month = format_date.getMonth();
                let year = format_date.getFullYear();
                element.created_at = new Date(
                    year,
                    month,
                    day
                ).toLocaleDateString();
                labels.push(element.created_at);
                accountData.push(element.new_balance);
            });
            const skipped = (ctx, value) =>
                ctx.p0.skip || ctx.p1.skip ? value : undefined;
            const down = (ctx, value) =>
                ctx.p0.parsed.y > ctx.p1.parsed.y ? value : undefined;
            let chartData = {
                labels: labels,
                datasets: [
                    {
                        label: "Bien Dong So Du",
                        backgroundColor: "rgb(75, 192, 192)",
                        borderColor: "rgb(75, 192, 192)",
                        data: accountData,
                        segment: {
                            borderColor: (ctx) =>
                                skipped(ctx, "rgb(0,0,0,0.2)") ||
                                down(ctx, "rgb(227,28,121)"),
                        },
                        spanGaps: true,
                    },
                ],
            };

            const config = {
                type: "line",
                data: chartData,
                options: {
                    elements: {
                        line: {
                            tension: 0.4,
                        },
                    },
                },
            };

            const myChart = new Chart(
                document.getElementById("chart-bien-dong-so-du"),
                config
            );
        });
});
