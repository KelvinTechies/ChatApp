function className(params){
    return document.getElementsByClassName(params)
}

fields = className('form-control')
loginbtn = className('btn-primary')

xhr = new XMLHttpRequest
formdatas = document.getElementsByTagName('form')[0]
formdatas.onsubmit = (e)=>{
    e.preventDefault()
    formdata = new FormData()
   formdata.append(fields[0].name,fields[0].value)
   formdata.append(fields[1].name,fields[1].value)
   formdata.append(loginbtn[0].name,loginbtn[0].value)
   xhr.open('POST','./server.php')
    xhr.onreadystatechange = (e)=>{
      if (e.target.status==200 && e.target.readyState==4) {
		  res = e.target.response
		  if (res=='redir') {
			  window.location='index.php';
		  }else{
}
}
}
xhr.send(formdata)
 
}