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

    function deadline(){
        let deadline = document.getElementById('deadline');
        let urgency = deadline.options[deadline.selectedIndex].value;

        switch (urgency) {
          case '6 Hours':
                let value=parseInt(document.getElementById('numberofpages').value);
                if (value>4){
                    value=5;
                    document.getElementById('numberofpages').value=value;
                    document.getElementById('numberofpages').disabled=true;
                    document.getElementById('add').disabled=true;
                    return 32;
                }
                else{
                    document.getElementById('numberofpages').disabled=false;
                    document.getElementById('add').disabled=false;
                    return 32;
                }
                
            
            break;
          case '12 Hours':
            let value1=parseInt(document.getElementById('numberofpages').value);
            if (value1>9){
                value1=10;
                document.getElementById('numberofpages').value=value1;
                return 28;
            }
            return 28;
            break;
          case '24 Hours':
            let value2=parseInt(document.getElementById('numberofpages').value);
            if (value2>17){
                value2=18;
                document.getElementById('numberofpages').value=value2;
                return 24;
            }
            return 24;            
            break;
          case '2 Days':
            return 20;
            break;
          case '3 Days':
            return 16;
            break;
          case '5 Days':
            return 12;
            break;
          case '7 Days':
            return 8;            
            break;
          case '9 Days':
            return 4;
            break;
          case '14 Days':
            return 0;
            break;
          default:
            console.log('Sorry, we are out of stock');
        }
    }
    function pages(){
        let pages = document.getElementById('numberofpages').value;
        console.log(pages);
    }
    function calculateCost(){
        document.getElementById('add').disabled=false;
        let cost = 8;
        
        
        cost += academicLevel() + deadline();
        return cost;        
    }
    function onInputCalculateCost(){
        d=calculateCost();
        let value=parseInt(document.getElementById('numberofpages').value);
        value *= d;
        return value;
    }

    function addQuestion()
    {
        let value=parseInt(document.getElementById('numberofpages').value);
        value = value+1;
        document.getElementById('numberofpages').value=value;

        paperType();
        // value *= calculateCost();
        // document.getElementById('totalcost').innerHTML = "$ "+value+".00";       
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

        paperType();
        //  value2 *= calculateCost();
        // document.getElementById('totalcost').innerHTML = "$ "+value2+".00";       
    }

    function displayCost(){
        let cost = onInputCalculateCost();
        document.getElementById('totalcost').innerHTML = "$ "+cost+".00";
    }

    function calculateCost2(){
        document.getElementById('add').disabled=false;
        let cost = 20;
        
        
        cost += deadline();
        let value=parseInt(document.getElementById('numberofpages').value);
        cost *= value;
        return cost;        
    }

    function paperType(){
        let paper = document.getElementById('papertype');
        let papertype = paper.options[paper.selectedIndex].value;

        switch (papertype) {
          case 'Admission Essay':
            
          case 'Application Letter':
            
          case 'Cover Letter':
            
          case 'Curriculum Vitae':
           
          case 'Personal Statement':
           
          case 'Recommendation Letter':
            
          case 'Resume':
            document.getElementById('totalcost').innerHTML = "$ "+calculateCost2()+".00";
            break;
          default:
            displayCost();
        }

    }
        
</script>