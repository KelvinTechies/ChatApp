list= document.querySelector(' .Chats')
search= document.querySelector('.search')
xhr=new XMLHttpRequest

search.onclick=()=>{
    search.value=""
}

search.onkeyup=()=>{
    searchTerm=search.value
    if (searchTerm!="") {
        search.classList.add('.myActive')
    }else{
        search.classList.remove('.myActive')        
    }
    xhr.open('POST', '../search.php', true)

    xhr.onload=()=>{
        if (xhr.readyState==XMLHttpRequest.DONE) {
            if (xhr.status==200) {
                dat=xhr.response
                console.log(dat);
                list.innerHTML=dat
            }
        }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.send('searchTerm='+searchTerm)
}



setInterval(()=>{
    xhr=new XMLHttpRequest
    xhr.open('GET', './users.php', true)

    xhr.onload=()=>{
        if (xhr.readyState==XMLHttpRequest.DONE) {
            if (xhr.status==200) {
                dat=xhr.response
                // console.log(dat);
                if (!search.classList.contains('myActive')) {
                list.innerHTML=dat
                    
                }
            }
        }
    }
    xhr.send()
}, 500)