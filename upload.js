(function(){
  window.onload = function(){
    var upload_submit = document.getElementById("upload_submit");
    var percent_upload = document.getElementById("percent_upload");
    var link_download = document.getElementById("link_download"); // NOi chua link download
    var loader = document.getElementById("loader"); // Loader cho dep

    upload_submit.onclick = function(event){
      event.preventDefault();

      //Reset Form
      percent_upload.innerHTML = ""; // Reset phan tram upload
      link_download.value = ""; // Reset link download
      //loader.style.display = "block";

      var upload_form = document.getElementById("upload_form");
      var form_data = new FormData(upload_form);

      form_data.append("file_submit", upload_submit); // Nut submit

      var xhr = new XMLHttpRequest();

      xhr.open('POST', 'compress.php');

      xhr.upload.onprogress = function(e){
        if(e.lengthComputable){
          var percent =  parseInt((e.loaded / e.total) * 100);
          percent += "%";
          percent_upload.innerHTML = percent;

          if(percent == "100%"){
            loader.style.display = "inline-block";
          }
        }
      }

      xhr.onreadystatechange = function(){
        if(xhr.status === 200 && xhr.readyState === 4){
          //console.log(xhr.status + " - " + xhr.readyState + " - " + xhr.response);
          var js = JSON.parse(xhr.response);

          link_download.value = js.Link; // Hien thi link len form
          loader.style.display = "none"; // Xoa loader sau khi xong cong viec
        }
      }

      xhr.send(form_data);
    }

  }
})()
