function priviewImg() {
  const foto = document.querySelector("#foto");
  const fotoLabel = document.querySelector(".custom-file-label");
  const imgPreview = document.querySelector(".img-preview");

  fotoLabel.textContent = foto.files[0].name;

  const fileFoto = new FileReader();
  fileFoto.readAsDataURL(foto.files[0]);

  fileFoto.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}

var d = new Date();
var time = d.getHours();
if (time < 12) {
  let greet = true;
} else if (time > 12) {
  let greet = false;
}
