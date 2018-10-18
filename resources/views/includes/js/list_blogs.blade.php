      <script type="text/javascript">
        const resolveChart = new Promise((resolve, reject) => {
          // do something asynchronous which eventually calls either:
          getData();
          resolve(chartsDraw()); // fulfilled
          // or
           reject(console.log(error)); // rejected
      });     
      

      function chartsDraw(){
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Id');
          data.addColumn('string', 'Title');         
          data.addColumn('string', 'Date Created');          
         
          data.addRows(chartData);

          var table = new google.visualization.Table(document.getElementById('table_div'));

          table.draw(data, {showRowNumber: true, width: '100%', height: '100%',allowHtml:true});
        }
      
      }

      </script>
      
      