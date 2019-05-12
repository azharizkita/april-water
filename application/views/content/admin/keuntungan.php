<head>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/date-uk.js"></script>
    <script>
        var profit = [];
        <?php foreach ($this->db->get('keuangan')->result() as $key) { ?>
            profit.push({
                "tanggal": "<?php echo $key->timestamp?>",
                "pendapatan": "<?php echo $key->pendapatan?>",
                "pengeluaran": "<?php echo $key->pengeluaran?>",
                "keuntungan": "<?php echo $key->profit?>"
            })
        <?php }?>
        console.log(profit);
        
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {

        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Tanggal');
        data.addColumn('number', 'Pendapatan (IDR)');
        data.addColumn('number', 'Pengeluaran (IDR)');
        data.addColumn('number', 'Keuntungan (IDR)');

        dataPendapatan = []
        profit.forEach(element => {
            tanggal = element.tanggal.split('-');
            dataPendapatan.push([new Date(tanggal[0], tanggal[1], tanggal[2]),  parseInt(element.pendapatan), parseInt(element.pengeluaran), parseInt(element.keuntungan)])
        });

        var tableNew = $('#activityList').DataTable( {
            columnDefs: [
                { type: 'date-uk', targets: 0 }
            ],
            columns: [
                { title: "Tanggal" },
                { title: "Pendapatan (IDR)" },
                { title: "Pengeluaran (IDR)" },
                { title: "Keuntungan (IDR)" }
            ]
        } );

        var dataTable = [];
        var rowId = 0;
        var day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
        var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        let currentMonth = 0;
        dataPendapatan.forEach(element => {

            data.addRows([
                [element[0], element[1], element[2], element[3]]
            ]);
            if (element[3] <= 0) {
                element[3] = '<div style="color: red">'+element[3]+'</div>';
            } else {
                element[3] = '<div style="color: green">'+element[3]+'</div>'
            }
            var syncData = {
                "Tanggal": day[element[0].getDay()]+', '+element[0].getDate()+'/'+element[0].getMonth()+'/'+element[0].getFullYear(),
                "pendapatan": '<div style="color: blue">'+element[1]+'</div>',
                "Pendapatan": '<div style="color: orange">'+element[2]+'</div>',
                "Keuntungan": element[3]
            }
        dataTable[rowId] = Object.values(syncData);
        rowId++;
        currentMonth = month[element[0].getMonth()]
            
        });
        tableNew.clear().draw();
        tableNew.rows.add(dataTable);
        tableNew.columns.adjust().draw();

        var options = {
            title : 'Statistik Pendapatan',
            height: 900,
            seriesType: 'bars',
            series: {
                1: {
                    color: 'orange'
                },
                2: {
                    type: 'line',
                    color: 'red'
                }
            }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart'));
        chart.draw(data, options);
        }
    </script>
    <style>
        div.dataTables_wrapper {
            margin: 0 auto;
            width: 100%;
            text-align: center
        }
        table.dataTable thead {
            background-color:black;
            color: white      
        }
        .pagination > li > a, .pagination > li > span{background-color:white !important; color: black}
        .pagination > li.active > a, .pagination > li.active > span{background-color:black !important; color: white}
    </style>
</head>
<body>
    <br>
    <div class="container">
        <table id="activityList" class="table table-hover table-striped"></table>
    </div>
    
    <div id="chart" style="min-width: 800 !important"></div>
</body>
</html>
