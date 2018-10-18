      <script type="text/javascript">
        const resolveChart = new Promise((resolve, reject) => {
          // do something asynchronous which eventually calls either:
          getData();
          resolve(chartsDraw()); // fulfilled
          // or
           reject(console.log(error)); // rejected
      });

      // var chartData = [];

      // function getData (){

       
      //                 for(let value of user.data){
      //                   // chartData.push([value.activity, parseFloat(value.totalUnits),]);
      //                   chartData.push([value.category, value.academic_level,value.instructions, value.urgency, value.created_at]);
      //                   console.log(chartData);
      //                 }
      //                 // pluckingMode = myObj.pluckingMode;
      //                 // for(let value of pluckingMode){
      //                 //   createTable(value)
      //                 // }
      //             }
             
              
          
      
      

      function chartsDraw(){
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Category');
          data.addColumn('string', 'Academic Level');
         
          data.addColumn('string', 'urgency');
          data.addColumn('string', 'Date Created');
          data.addColumn('number', 'Cost, USD');
         
          data.addRows(chartData);

          var table = new google.visualization.Table(document.getElementById('table_div'));

          table.draw(data, {showRowNumber: true, width: '100%', height: '100%',allowHtml:true});
        }
      
      }

      </script>
      
      