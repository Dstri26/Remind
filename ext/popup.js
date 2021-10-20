function chk() {
    chrome.storage.local.get(['remindActive','remindUser'], function(result) {
        if (result.remindActive==true) {
            document.getElementById('notactive').style.display="none";
            document.getElementById('active').style.display="block";
            document.getElementById('details').innerHTML=result.remindUser;
        }else{
            document.getElementById('notactive').style.display="block";
            document.getElementById('active').style.display="none";
            document.getElementById('details').innerHTML="";
        }
    });   
}

window.onload = function() {
    chk();
};

document.getElementById("login").addEventListener("click", () => {
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var url = "https://spectrumcet.com/remind/api/login.php?email="+email+"&password="+pass;
    let fetchRes = fetch(url);
    fetchRes.then(res => res.json())
            .then(d => {
                chrome.storage.local.set({remindActive:d.status,remindUser:d.user}, function() {
                    console.log('Value is set to ' + d.status+" and "+d.user);
                    chk();
                });
            });
    
});

document.getElementById("logout").addEventListener("click", () => {
    console.log("You have been logged out");
    chrome.storage.local.remove(["remindActive","remindUser"]);
    chk();
    
});