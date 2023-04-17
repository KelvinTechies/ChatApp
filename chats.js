form= document.querySelector('.text_form')
InputField=document.querySelector('.input_Field')
btn=document.querySelector('.btn_snd')
chat=document.querySelector('.f')
btnSnd=document.querySelector('.send')
outGoingId=document.querySelector('.outGoingId')
incommingId=document.querySelector('.incommingId')

form.addEventListener('submit', (reLoad)=>{
    reLoad.preventDefault()
xhr=new XMLHttpRequest()

btn.onclick=()=>{

                data=new FormData()
    
                data.append('send', '')
                data.append('input_Field', form.input_Field.value)
                data.append('outGoingId', form.outGoingId.value)
                data.append('incommingId', form.incommingId.value)
    
                xhr.open('POST', '../insertchat.php', true)
    
    
                xhr.onreadystatechange=(e)=>{
    
                    if (e.target.status==200 && e.target.readyState==4) {
    
                        es=e.target.response
                        InputField.value=""
    
                        // if (es=='success') {
                        //         window.location='index.php'
                        // }else{
                        // // msg.innerHTML=`<div class='alert alert-danger'>${es}</div>`
                        // msg.innerHTML=`<div class='alert alert-danger'>${es}</div>`
                        
                            
                        // }
                        
                    }
                }
    
                xhr.send(data)
    }
    
})
    
    window.onload=()=>{
        xhr.open('POST', '../insertchat.php', true)
        xhr.onreadystatechange=(e)=>{
            if (e.target.status==200 && e.target.readyState==4) {
                InputField.value=""
                ScrollToBottom()
                // es=e.target.response
                // if (es=='Success') {
                //         window.location='index.php'
                // }
                
            }
        }
            xhr.send()
    }



setInterval(()=>{
    xhr=new XMLHttpRequest
    xhr.open('POST', '../get_chat.php', true)

    xhr.onload=()=>{
        if (xhr.readyState==XMLHttpRequest.DONE) {
            if (xhr.status==200) {
                dat=xhr.response
                // console.log(dat);
                chat.innerHTML=dat
                ScrollToBottom()
            }
        }
    } 
    data=new FormData(form)
    
    data.append('send', '')
    data.append('input_Field', form.input_Field.value)
    xhr.send(data)
}, 500)


function ScrollToBottom() {
    chat.scrollTop=chat.scrollHeight
}