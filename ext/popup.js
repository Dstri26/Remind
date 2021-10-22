function chk() {
    chrome.storage.local.get(['remindActive','remindUser','remindName'], function(result) {
        if (result.remindActive==true) {
            document.getElementById('notactive').style.display="none";
            document.getElementById('active').style.display="block";
            document.getElementById('details').innerHTML=result.remindName;
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
                document.getElementById('response').innerHTML=d.response;
                if (d.status==true) {
                    chrome.storage.local.set({remindActive:d.status,remindUser:d.user,remindName:d.name}, function() {
                        console.log('Value is set to ' + d.status+" and "+d.user);
                        chk();
                    });
                }
            });
    
});

document.getElementById("register").addEventListener("click", () => {
    window.open("https://spectrumcet.com/remind/", "_blank");
});

document.getElementById("logout").addEventListener("click", () => {
    console.log("You have been logged out");
    chrome.storage.local.remove(["remindActive","remindUser"]);
    chk();
    
});