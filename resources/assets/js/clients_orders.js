      
      const resolveChart = new Promise((resolve, reject) => {
          // do something asynchronous which eventually calls either:
          getData();
          resolve(chartsDraw()); // fulfilled
          // or
           reject(console.log(error)); // rejected
      });

      var chartData = [];

      function getData (){

         if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {

                      myObj = JSON.parse(this.responseText);
                      console.log(myObj);
                      for(let value of myObj.data){
                        // chartData.push([value.activity, parseFloat(value.totalUnits),]);
                        chartData.push([value.category, value.academic_level,value.instructions, value.urgency, value.created_at]);
                        console.log(chartData);
                      }
                      // pluckingMode = myObj.pluckingMode;
                      // for(let value of pluckingMode){
                      //   createTable(value)
                      // }
                  }
              };
              xmlhttp.open("GET",dataUri, true);
              xmlhttp.send();
          
      }
      

      function chartsDraw(){
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Category');
          data.addColumn('string', 'Academic Level');
          data.addColumn('string', 'Instructions');
          data.addColumn('string', 'urgency');
          data.addColumn('string', 'Date Created');
         
          data.addRows(chartData);

          var table = new google.visualization.Table(document.getElementById('table_div'));

          table.draw(data, {showRowNumber: true, width: '100%', height: '100%',allowHtml:true});
        }
      
      }

      