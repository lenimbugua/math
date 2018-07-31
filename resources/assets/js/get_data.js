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
                for(let value of myObj){
                  // chartData.push([value.activity, parseFloat(value.totalUnits),]);
                  chartData.push([value.id, value.category, value.academic_level, value.urgency, value.created_at);
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
getData();