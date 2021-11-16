function get_imagen(id_file, id_img)
{
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById(id_file).files[0]);
    reader.onload = function (e) {
        document.getElementById(id_img).src = e.target.result;
    };
}
