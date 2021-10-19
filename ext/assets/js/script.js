
    document.getElementById("myurl").value = document.location.origin;
    function getdetails(i) {

        var link=document.getElementById(i).value;
        if(link!=''){
            console.log(link);
            $.ajax({
                url:"blogscrap.php",
                type:"POST",
                data:{link:link},
                success: function(data){
                    data=JSON.parse(data);
                    console.log(typeof data);
                    var hiddenparts = document.getElementsByClassName('hiddenparts');
                    hiddenparts[0].style.display = 'block';
                    var title = document.getElementById("title").setAttribute('value', data.title);
                    document.getElementById('shortdesc').value = data.shortdesc;
                    var link = document.getElementById("link").setAttribute('value', data.link);
                    
                    
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(errorThrown);
                }
                
            })
        }
    }