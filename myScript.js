    var noOfChairs;
    var viewers = [];
    var seat;
    var viewername;
    var st = true;
    var o;
    function allocateSeat(){
        viewername = v.value;
        seat = s.value;
        noOfChairs[s.value]=v.value;
        userName.value = v.value;
        my.value=s.value;
        arrangeSeats();
    }
    var n="10,000"

    function arrangeSeats(){
      var a = 0;
      if(st)
      {
        noOfChairs = new Array(Number(chairs.value));
        st = false;
      }
      var iHTML = "<table border = 1px solid white;><tr>";
      for(var i = 1; i <= noOfChairs.length; i++)
      {
        a++;
        if( a == seat)
        {
          iHTML += "<td align=center><img width = 180 src='images/chair.jpg'><br />"+noOfChairs[i]+ "</td>";
          seat = 0;
        }
        else
        {
          iHTML += "<td align=center><img width = 180 src='images/chair.jpg'>"+noOfChairs[i]+"</td>";
        }
        if(a == 5)
        {
          iHTML += "</tr><tr>";
          a = 0;
        }

      }
      iHTML += "</tr></table>";
      hall.innerHTML = iHTML;
    }
    function printTicket(layer){
      alert(layer);

      console.log(layer)
      // var generator=window.open('name');
      // var layertext = document.getElementById(layer);
      // generator.document.write(layertext.innerHTML.replace("Print Me"));
      // generator.document.close();
      // generator.print();
      // generator.close();
    }
    function num(){
      o= Math.floor(Math.random()* 900000000)
      var far =o;
      ran.innerHTML+=far+"<br>"

    };