<script >
    function addQuestion()
    {
        let value=parseInt(document.getElementById('numberofquestions').value);
        value = value+1;
        let r =document.getElementById('numberofquestions').value=value;
       
    }
    function minusQuestion()
    {
        var value2=parseInt(document.getElementById('numberofquestions').value);
        value2 = value2-1;
        document.getElementById('numberofquestions').value=value2;
        if (value2 < 1 ){
            
            document.getElementById('numberofquestions').value=1;
        }
        
        
        
        
    }
        function calculateCost(){
            // y = 88x +19;
            let y = 0;
            let e = document.getElementById('academiclevel');   
            let x = e.options[e.selectedIndex].value;

            if (x==='0'){
                document.getElementById('totalcost').innerHTML = "$ 00.00";
            }
            else{
               
                y = (88*x) + 19;
                console.log( '$ '+y);
                document.getElementById('totalcost').innerHTML = "$ "+y+".00";
                document.getElementById("hiddentotalcost").value = y;
            }
        }
    </script>