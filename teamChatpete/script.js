// function className(params) {
//     return document.getElementsByTagName(params)
// }
// fields = getElementsByTagName('form')

// xhr = new XMLHttpRequest

// formdatas = document.getElementsByTagName('form')[0]
// formdatas.onsubmit = (e) => {
//     e.preventDefault()
//     datas = new FormData()
//     for (let i = 0; i < fields.length; i++) {
//         const names = fields[i];
//     datas.append(names.name,(names.name=='profile'?names.files[0]:names.value))
        
//     } // formd.append("name","peter")
//     xhr.open('POST', 'auth-register.html')
//     xhr.onreadystatechange = (e) => {
//         Response = JSON.parse = (e.target.response)
//         if (e.target.status == 200 && e.target.readyState == 4) {
//             console.log(Response)
//         }
//     }
//     xhr.send(formdatas)
// }
function className(params) {
    return document.getElementsByClassName(params)
 }
 
 fields = className("form-control")
 loginbtn = className('btn-primary')
 
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