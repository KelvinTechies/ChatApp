function fileUpload(files) {
    var ajax=new XMLHttpRequest
var progress=document.querySelector('.mew')
myMsg=document.querySelector('myMsg')
    var Stuff= new FormData()
        for (var index = 0; index < files.length; index++) { 
            Stuff.append('file'+index, files[index])
            
            
        }
        ajax.addEventListener('readystatechange', function(e) {
          if (ajax.readyState==4 && ajax.status==200) {
             res=ajax.response
             myMsg.innerHTML=res

             ajax.upload.addEventListener('progress', function (e) {
                 
                 percent=Math.round(e.loaded/e.total *100) +"%"
                 progress.style.width=percent
                 progress.innerHTML=percent
             })
          }  
        })
    ajax.open('POST', './profilePic.php', true)
    ajax.send(Stuff)
}