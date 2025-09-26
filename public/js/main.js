// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
         // $('#modal_main').modal("show")
        
        }  else {
          event.preventDefault()
          event.stopPropagation()         
          cerca_nomi()
        }

        form.classList.add('was-validated')
      }, false)
    })

})()

$(document).ready( function () {
})


function cerca_nomi() {
    nome=$("#nome").val()
    cognome=$("#cognome").val()
    data_nascita=$("#data_nascita").val()    
    codfisc=$("#codfisc").val()
    let CSRF_TOKEN = $("#token_csrf").val();
    base_path = $("#url").val();
    $("#div_resp").empty()
    if (cognome.length >= 2) { 
      $("#div_wait").show();
      clearTimeout(this.debounceTimeout);
      this.debounceTimeout = setTimeout(() => {    
        fetch(base_path+"/cerca_nome", {
            method: 'post',
            headers: {
              "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
            body: "_token="+ CSRF_TOKEN+"&cognome="+cognome+"&nome="+nome+"&data_nascita="+data_nascita+"&codfisc="+codfisc,
        })
        .then(response => {
            if (response.ok) {
              return response.json();
            }
        })
        .then(resp=>{
            if (resp.header=="OK") {
                $("#div_wait").hide(120);
                html=""
                if (resp.info.length>0) {
                  sind="Non specificato";
                  colo_sind="secondary"

                  if (resp.info[0].sindacato=="0") {sind=" Non iscritto al sindacato";colo_sind="warning";}
                  if (resp.info[0].sindacato=="1") {sind="Fillea CGIL";colo_sind="danger";}
                  if (resp.info[0].sindacato=="2") {sind="Filca CISL";colo_sind="success";}
                  if (resp.info[0].sindacato=="3") {sind="Feneal UIL";colo_sind="primary";}
                  iscr=""
                  if (resp.info[0].sindacato!="0" && resp.info[0].sindacato!=" " && resp.info[0].sindacato!="") iscr="Iscritto "
                  html+=
                    `<div class="alert alert-`+colo_sind+`" role="alert">
                        <b>`+nome+`</b> risulti `+iscr+sind+`
                    </div>`
                 
                } else {
                  html+=
                    `<div class="alert alert-secondary" role="alert">
                        <b>`+nome+`</b> risulti non presente nei nostri archivi
                    </div>`                
                }
                $("#div_resp").html(html)
               
            }
            else {
            }

        })
        .catch(status, err => {
            return console.log(status, err);
        })     

      }, 800)	
    }
}



