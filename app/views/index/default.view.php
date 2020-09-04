<div class="card-flex">

    <div class="card" style="max-width: 20rem;">
        <div class="card-header">المستخدمين</div>
        <div class="card-body">
            <a href="/users"> عدد اللمستخدمين حاليا : <?= $users ?></a>
        </div>
    </div>

    <div class="card" style="max-width: 20rem;">
        <div class="card-header">العملاء</div>
        <div class="card-body">
            <a href="/clients"> عدد العملاء حاليا : <?= $clients ?></a>
        </div>
    </div>


    <div class="card" style="max-width: 20rem;">
        <div class="card-header">الموردين</div>
        <div class="card-body">
            <a href="/suppliers"> عدد الموردين حاليا : <?= $suppliers ?></a>
        </div>
    </div>

</div>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "العدد", { role: "style" } ],
            ["الموردين", <?= $suppliers ?>, "#1dd1a1"],
            ["العملاء", <?= $clients ?>, "#54a0ff"],
            ["المستخدمين", <?= $users ?>, "#ff6b6b"],

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "بيانات حول مستعملين  التطبيق",
            width: 600,
            height: 400,
            margin: 20,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<div id="columnchart_values" style="
position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    flex-flow: row;
    justify-content: flex-end;
    left: 73px;
    height: 100%;
    width:
"></div>

