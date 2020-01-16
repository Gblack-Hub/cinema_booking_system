/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "230px";
    document.getElementById("main").style.marginLeft = "230px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

// $(document).ready(function(){
// 	$("#printTick").click(function(){
// 		alert('clicked');
// 	})
// })
function printTicket(a, b, c){
	console.log(a)
	// $.post("printTicket.php", {})
	// var html = "<html>";
	// html += document.getElementById(divToPrint).innerHTML;
	// html += "</html>";

	// var printWin = window.open('','','left=30,top=30,width=1,height=1,toolbar=0,scrollbars=0,status=0');
	// printWin.document.write(html);
	// printWin.document.close();
	// printWin.focus();
	// printWin.print();
	// printWin.close();
	// window.print();
}