
/* overlay blog cards */

var button = document.querySelectorAll('.btnBlog')
var body = document.body

button.forEach(butt => {
    butt.addEventListener('click',()=>{
        var showUpPage = document.querySelectorAll('.showUpPage')
        var Page = '';
        showUpPage.forEach(page => {
          if(page.id == butt.value){
            Page = page;
          }
        });
        Page.classList.remove('d-none')
        body.classList.add('no-scroll');
        var returnBtn = Page.querySelector('#returnBtn')
        returnBtn.addEventListener('click',()=>{
          Page.classList.add('d-none')
          body.classList.remove('no-scroll');
        })
        var overLay = document.querySelectorAll('.overlay')
        overLay.forEach(ol => {
          ol.addEventListener('click', () => {
          Page.classList.add('d-none')
          body.classList.remove('no-scroll');
        });
        });
    })
});


/* image input show  */

const imageInput = document.querySelector("#imageInput");
const imageContainer = document.querySelector("#imageContainer");
if(imageInput != null){
  imageInput.addEventListener('change',(event)=>{
    document.getElementById('imageContainer').innerHTML=''
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
      var dataURL = reader.result;
      var image = document.createElement('img');
      image.src = dataURL;
      image.style.maxWidth = '100%';
      document.getElementById('imageContainer').appendChild(image);
    };
    reader.readAsDataURL(input.files[0]);
  })
}

/* notification */

var table = document.querySelector(".notification");
if(table != null){
  var rowCount = table.getElementsByTagName("tr").length;
  var notification_count=document.querySelector("#notification_count")
  notification_count.innerHTML= rowCount

}