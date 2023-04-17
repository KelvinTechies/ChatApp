function classname(params) {
    return document.getElementsByClassName(params)
}


login = classname('form-control')
button = classname("btn-primary")

xhr = new XMLHttpRequest
 formdatas = document.getElementsByTagName('form')[0]
 formdatas.onsubmit = (e)=>{
    e.preventDefault()
    formdata = new FormData()
    for (let i = 0; i < fields.length; i++) {
        const elem = fields[i];
    formdata.append(elem.name,elem.value)
    }
    formdata.append(loginbtn[0].name,loginbtn[0].value)
 
     xhr.open('POST','./configuration.php')
     xhr.onreadystatechange =(e)=>{
       if (e.target.status==200 && e.target.readyState==4) {
           reg = e.target.response
           if (reg=='redir') {
               window.location='index.html';
           }else{
 
    //  msg[0].innerHTML=`<div class='alert alert-danger'>${res}</div>`
 }
 }
 }
 xhr.send(formdata)
 
 }