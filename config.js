form= document.getElementById('form')
user  = document.getElementById('uid')
mail=document.getElementById('mail')
fone=document.getElementById('fone')
pwd=document.getElementById('pwd')
repwd=document.getElementById('repwd')
code=document.getElementById('code')
btn=document.getElementById('btn')
msg=document.getElementById('msg')



xhr= new XMLHttpRequest()




form.addEventListener('submit', (e)=>{
        e.preventDefault()

        data= new FormData()

        data.append('reg', '')
        data.append('username', form.username.value)
        data.append('email', form.email.value)
        data.append('fone', form.fone.value)
        data.append('pwd', form.pwd.value)
        data.append('re_pwd', form.repwd.value)

		xhr.open('POST','../configuration.php', true)

     xhr.onreadystatechange=(e)=>{
            if (e.target.status ==200 && e.target.readyState == 4) {
                
                res=e.target.response

                if (res == 'success') {
                    window.location='chat.php';

                }else{
                    msg.innerHTML=`<div class='alert alert-danger'>${res}</div>`

                }
            }
            
     }
     xhr.send(data)

})


window.onload=()=>{
    xhr.open('POST','../configuration.php', true)
    xhr.onreadystatechange =(e)=>{
      if (e.target.status==200 && e.target.readyState==4) {
          res = e.target.response
          if (res=='success') {
              window.location='chat.php';
          }
      }
    }
    xhr.send()
    
}



// logInForm=document.getElementById('logInForm')
// uid=document.getElementById('uid')
// pwd=document.getElementById('pwd')


// logInForm.addEventListener('submit', (reLoad)=>{
//             reLoad.preventDefault()
// })
