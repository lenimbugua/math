 <script >
        function setVisibility(count){

           
            let e = document.getElementById('progressvisibility'+count); 
             
            let x = e.options[e.selectedIndex].value
            
            if (x!='100'){
              console.log(x);
                document.getElementById('visibilityhidden'+count).setAttribute("hidden", false);
            }
            else{
              document.getElementById('visibilityhidden'+count).removeAttribute("hidden");
            }
        }
    </script>