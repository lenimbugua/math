<script >
    function addQuestion()
    {
        let value=parseInt(document.getElementById('numberofpages').value);
        value = value+1;
        let r =document.getElementById('numberofpages').value=value;
       
    }
    function minusQuestion()
    {
        var value2=parseInt(document.getElementById('numberofpages').value);
        value2 = value2-1;
        document.getElementById('numberofpages').value=value2;
        if (value2 < 1 ){
            
            document.getElementById('numberofpages').value=1;
        }       
        
    }
    function academicLevel(){
        let e = document.getElementById('academiclevel');   
        let x = e.options[e.selectedIndex].value;
    }
    function paperType(){
        let e = document.getElementById('academiclevel');   
        let x = e.options[e.selectedIndex].value;
    }
    function deadline(){
        let deadline = document.getElementById('deadline');
        console.log(pages);
    }
    function pages(){
        let pages = document.getElementById('numberofpages').value;
        console.log(pages);
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
            //  
        }
        
    }
        
</script>