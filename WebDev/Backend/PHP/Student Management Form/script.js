changeBtnColor = (id) => {
    if (document.getElementById(id).style.display = 'block') {
        document.getElementById(id).style.display = 'none';
    }
    // else {
    document.getElementById(id).style.display = 'block';
    // }
}




uname_taken = () => { document.getElementById('uname_taken').style.display = 'inline'; }

// setTimeout(uname_taken1, 1500)

// uname_taken1 = () =>{document.getElementById('uname_taken').style.display = 'none';}



function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("uname_taken").innerHTML = this.responseText;
    }
    xhttp.open("POST", "login.php", true);
    xhttp.send();
}