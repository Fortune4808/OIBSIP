<?php if ($page == 'dashboard') { ?>
    <div class="top-div">
        <div class="statistics profile">
            <div class="div-in">
                <div class="profile">
                    <div class="profile-pix" title="Profile Pix">
                        <img id="pictureBox2" alt="">
                    </div>
                    <div>
                        <div><i class="bi bi-speedometer2"></i> Administrative Dashboard</div>
                        <span>👋 Hi, <span id="fullname"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="statistics">
            <div class="div-in">
                <div class="statistics-count">
                    <div>
                        <div class="title">Administrators</div>
                        <div class="bottom-title">Statistics of Administrators</div>
                        <div id="count">0</div>
                    </div>
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="statistics">
            <div class="div-in">
                <div class="statistics-count">
                    <div>
                        <div class="title">Administrators</div>
                        <div class="bottom-title">Statistics of Administrators</div>
                        <div id="count">0</div>
                    </div>
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                </div>
            </div>
        </div>
        <script>getAuthProfile();</script>
    </div>

    <div class="bottom-div">
        <div class="left-div">
            <div id="chartContainer" style="height: 400px; width: 100%;"></div>
        </div>

        <div class="right-div">
            <div class="in-div">
                <div class="header">
                    <strong>Recent Activities</strong>
                    <div style="color: #f00; cursor: pointer;">View</div>
                </div>
                <div class="container">
                    <div class="flex-card">

                    </div>
                    <div class="flex-card">

                    </div>
                    <div class="flex-card">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        backgroundColor: "rgba(255, 255, 255, 0.3)",
        title: {
            text: "Hourly Average CPU Utilization"
        },
        axisX: {
            title: "Time"
        },
        axisY: {
            title: "Percentage",
            suffix: "%",
            includeZero: true
        },
        data: [{
            type: "line",
            name: "CPU Utilization",
            connectNullData: true,
            //nullDataLineDashType: "solid",
            xValueType: "dateTime",
            xValueFormatString: "DD MMM hh:mm TT",
            yValueFormatString: "#,##0.##\"%\"",
            dataPoints: [
                { x: 1501048673000, y: 35.939 },
                { x: 1501052273000, y: 40.896 },
                { x: 1501055873000, y: 56.625 },
                { x: 1501059473000, y: 26.003 },
                { x: 1501063073000, y: 20.376 },
                { x: 1501066673000, y: 19.774 },
                { x: 1501070273000, y: 23.508 },
                { x: 1501073873000, y: 18.577 },
                { x: 1501077473000, y: 15.918 },
                { x: 1501081073000, y: null }, // Null Data
                { x: 1501084673000, y: 10.314 },
                { x: 1501088273000, y: 10.574 },
                { x: 1501091873000, y: 14.422 },
                { x: 1501095473000, y: 18.576 },
                { x: 1501099073000, y: 22.342 },
                { x: 1501102673000, y: 22.836 },
                { x: 1501106273000, y: 23.220 },
                { x: 1501109873000, y: 23.594 },
                { x: 1501113473000, y: 24.596 },
                { x: 1501117073000, y: 31.947 },
                { x: 1501120673000, y: 31.142 }
            ]
        }]
    });
    chart.render();
        document.addEventListener("DOMContentLoaded", function() {
        // renderChart();
    });
</script>