
logInForm=document.getElementById('logInForm')
uid=document.getElementById('uid')
pwd=document.getElementById('pwd')
msg= document.querySelector('.msg')



        xhr=new XMLHttpRequest()
logInForm.addEventListener('submit', (reLoad)=>{
            reLoad.preventDefault()

            data=new FormData()

            data.append('signin', '')
            data.append('Username', logInForm.Username.value)
            data.append('pwd', logInForm.pwd.value)


            xhr.open('POST', '../configuration.php', true)


            xhr.onreadystatechange=(e)=>{

                if (e.target.status==200 && e.target.readyState==4) {

                    es=e.target.response

                    if (es=='success') {
                            window.location='chat.php'
                    }else{
                    // msg.innerHTML=`<div class='alert alert-danger'>${es}</div>`
                    msg.innerHTML=`<div class='alert alert-danger'>${es}</div>`
                    
                        
                    }
                    
                }
            }

            xhr.send(data)
})


window.onload=()=>{
    xhr.open('POST', '../configuration.php', true)
    xhr.onreadystatechange=(e)=>{
        if (e.target.status==200 && e.target.readyState==4) {
            es=e.target.response
            if (es=='Success') {
                    window.location='chat.php'
            }
            
        }
    }
        xhr.send()
}

