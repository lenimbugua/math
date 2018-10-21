<script >
    
    function academicLevel(){
        let academic = document.getElementById('academiclevel');   
        let academicLevel = academic.options[academic.selectedIndex].value;

        switch (academicLevel) {
          case 'High School':
            return 0;
            break;
          case 'Undergraduate':
            return 2;
            break;
          case 'Master':
            return 6;            
            break;
          case 'PhD':
            return 11;
            break;
          default:
            console.log('Sorry, we are out of stock');
        }
    }
    function paperType(){

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
        let cost = 8;
        
        
        cost += academicLevel();
        return cost
        // y = 88x +19;
        // let y = 0;
        // let e = document.getElementById('academiclevel');   
        // let x = e.options[e.selectedIndex].value;

        
        // if (x==='0'){
        //     document.getElementById('totalcost').innerHTML = "$ 00.00";
        // }
        // else{
           
            // y = (88*x) + 19;
            // console.log( '$ '+y);
            
            //  
        // }
        
    }
    function onInputCalculateCost(){
        let value=parseInt(document.getElementById('numberofpages').value);
        value *= calculateCost();
        document.getElementById('totalcost').innerHTML = "$ "+value+".00";
    }

    function addQuestion()
    {
        let value=parseInt(document.getElementById('numberofpages').value);
        value = value+1;
        let r =document.getElementById('numberofpages').value=value;


        value *= calculateCost();
        document.getElementById('totalcost').innerHTML = "$ "+value+".00";       
    }
    function minusQuestion()
    {
        var value2=parseInt(document.getElementById('numberofpages').value);
        value2 = value2-1;
        document.getElementById('numberofpages').value=value2;
        if (value2 < 1 ){
            
            document.getElementById('numberofpages').value=1;
            value2 =1;
        }  

         value2 *= calculateCost();
        document.getElementById('totalcost').innerHTML = "$ "+value2+".00";      
        
    }
        
</script>