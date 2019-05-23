//to uncheck the burger-menu icon when resizing 
window.addEventListener('resize', (e) => {
	if (window.matchMedia('(min-width: 768px)').matches) {
        document.getElementById('nav-toggle').checked = false;
    }
    });

//MODAL
function hideModal() {
    //hide modal
    document.getElementById("modal").style = "display:none";
    document.getElementById("modal-gamename").innerText = "";
}

function viewGameInfo(gameName){
        //show modal
        document.getElementById("modal").style = "display:block";
        document.getElementById("modal-gamename").innerText = gameName;
        var image;
        var description;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var game = JSON.parse(this.response);
                    document.getElementById("modal-gamedescription").innerText = game.description;
                    document.getElementById("modal-img").src = game.image;
            }
        };
        xmlhttp.open("GET", "ListofAllGames.php?q=" + gameName, true);
        xmlhttp.send();
}

document.getElementById("signout").addEventListener("click", function(e){
    e.preventDefault();
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var res = this.responseText;
            alert("Sign Out "+res);
            if (res === "success") 
                window.location.href = 'signin.php';
            
        }
    };
    xmlhttp.open("GET", "signout.php?q=0", true);
    xmlhttp.send();

});
    