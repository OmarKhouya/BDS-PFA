class Form {
  
  CEF(inputCEF, errorCEF) {
    const RegexCEF = /^\d{13}$/;
    inputCEF.addEventListener('keyup', function() {
      if (!RegexCEF.test(inputCEF.value)) {
        inputCEF.classList.add("border-danger");
        errorCEF.classList.add("text-danger");
        errorCEF.innerHTML = "Le CEF devrait contenir 13 chiffres";
      } else {
        inputCEF.classList.remove("border-danger");
        inputCEF.classList.add("border-success");
        errorCEF.innerHTML = "";
      }
    });

    inputCEF.addEventListener('blur', () => {
      if (inputCEF.value == '') {
        inputCEF.classList.add("border-danger");
        inputCEF.classList.remove("border-success");
      }
    });
    return () => RegexCEF.test(inputCEF.value);
  }

  casualInput(input) {
    input.addEventListener('blur', () => {
      if (input.value == '') {
        input.classList.add("border-danger");
        input.classList.remove("border-success");
      } else {
        input.classList.add("border-success");
        input.classList.remove("border-danger");
      }
    });
    return () => input.value !== '';
  }

  Email_scolaire(inputEmail_scolaire, errorEmail) {
    const EmailVerify = /^\d{13}@ofppt-edu\.ma$/;
    inputEmail_scolaire.addEventListener('keyup', () => {
      if (!EmailVerify.test(inputEmail_scolaire.value)) {
        errorEmail.innerHTML = "CEF@ofppt-edu.ma";
        errorEmail.classList.add("text-danger");
        errorEmail.classList.add("border-danger");
        inputEmail_scolaire.classList.remove("border-success");
      } else {
        errorEmail.innerHTML = "C'est bien";
        errorEmail.classList.add("text-success");
        errorEmail.classList.remove("text-danger");
        inputEmail_scolaire.classList.add("border-success");
        inputEmail_scolaire.classList.remove("border-danger");
      }
      if (inputEmail_scolaire.value == "") {
        errorEmail.innerHTML = "";
        inputEmail_scolaire.classList.remove("border-success");
        inputEmail_scolaire.classList.add("border-danger");
      }
    });
    return () => EmailVerify.test(inputEmail_scolaire.value);
  }

  /* telephone(inputTelephone) {
    inputTelephone.addEventListener('blur', () => {
      if (inputTelephone.value == '') {
        inputTelephone.classList.add("border-danger");
        inputTelephone.classList.remove("border-success");
      } else {
        inputTelephone.classList.add("border-success");
        inputTelephone.classList.remove("border-danger");
      }
    });
    return () => inputTelephone.value !== '';
  } */

  telephone(inputTelephone,telephoneError) {
    inputTelephone.addEventListener('blur', () => {
      if (inputTelephone.value == '') {
        inputTelephone.classList.add("border-danger");
        inputTelephone.classList.remove("border-success");
      } else {
        var phoneNumber = inputTelephone.value
        if (/^(?:\+212|0)\d{9}$/.test(phoneNumber)) {
          inputTelephone.classList.add("border-success");
          inputTelephone.classList.remove("border-danger");
          telephoneError.innerHTML = 'C\'est parfait !'
          telephoneError.style.color = 'green'
        } else {
          telephoneError.innerHTML = "Le numéro de téléphone doit commencer par \"+212\" ou \"0\", suivi de 9 autres chiffres"
          telephoneError.style.color = 'red'
          inputTelephone.classList.add("border-danger");
          inputTelephone.classList.remove("border-success");
        }
      }
    });
  
    return () => inputTelephone.value !== '';
  }
  

  passwordSign(inputpassword, rule1, rule2, rule3, buttonShow) {
    const PassStrenghtMid = /((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))/;
    const PassStrenghtHigh = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;

    inputpassword.addEventListener('keydown', () => {
      if (PassStrenghtHigh.test(inputpassword.value)) {
        rule1.style.backgroundColor = "green";
        rule2.style.backgroundColor = "green";
        rule3.style.backgroundColor = "green";
      } else if (PassStrenghtMid.test(inputpassword.value)) {
        rule1.style.backgroundColor = "yellow";
        rule2.style.backgroundColor = "yellow";
        rule3.style.removeProperty('background-color');
      } else {
        rule1.style.backgroundColor = "red";
        rule2.style.removeProperty('background-color');
        rule3.style.removeProperty('background-color');
      }
    });

    inputpassword.addEventListener('keyup', () => {
      if (!PassStrenghtHigh.test(inputpassword.value)) {
        rule3.style.removeProperty('background-color');
      } else if (!PassStrenghtMid.test(inputpassword.value)) {
        rule2.style.removeProperty('background-color');
        rule3.style.removeProperty('background-color');
      }
      if (inputpassword.value == "") {
        rule1.style.removeProperty('background-color');
        rule2.style.removeProperty('background-color');
        rule3.style.removeProperty('background-color');
      }
    });

    inputpassword.addEventListener('blur', function() {
      if (inputpassword.value == '') {
        inputpassword.classList.add("border-danger");
        inputpassword.classList.remove("border-success");
        buttonShow.classList.add("border-danger");
        buttonShow.classList.remove("border-success");
      } else {
        inputpassword.classList.add("border-success");
        inputpassword.classList.remove("border-danger");
        buttonShow.classList.add("border-success");
        buttonShow.classList.remove("border-danger");
      }
    });
    return () => true;
  }

  passwordLog(inputPassword, buttonShow) {
    inputPassword.addEventListener('blur', function() {
      if (inputPassword.value == '') {
        inputPassword.classList.add("border-danger");
        inputPassword.classList.remove("border-success");
        buttonShow.classList.add("border-danger");
        buttonShow.classList.remove("border-success");
      } else {
        inputPassword.classList.add("border-success");
        inputPassword.classList.remove("border-danger");
        buttonShow.classList.add("border-success");
        buttonShow.classList.remove("border-danger");
      }
    });

    inputPassword.addEventListener('keyup', function() {
      inputPassword.classList.remove("border-danger");
    });
    return () => inputPassword.value !== '';
  }

  buttonShow(buttonShow, inputpassword) {
    buttonShow.addEventListener('mousedown', () => {
      if (inputpassword.type == "text") {
        inputpassword.type = "password";
        buttonShow.innerHTML = "<i class='fa-regular fa-eye'></i>";
      } else {
        inputpassword.type = "text";
        buttonShow.innerHTML = "<i class='fa-regular fa-eye-slash'></i>";
      }
    });

    buttonShow.addEventListener('mouseup', () => {
      inputpassword.type = "password";
      buttonShow.innerHTML = "<i class='fa-regular fa-eye'></i>";
    });

    buttonShow.addEventListener('touchstart', () => {
      if (inputpassword.type == "text") {
        inputpassword.type = "password";
        buttonShow.innerHTML = "<i class='fa-regular fa-eye'></i>";
      } else {
        inputpassword.type = "text";
        buttonShow.innerHTML = "<i class='fa-regular fa-eye-slash'></i>";
      }
    });

    buttonShow.addEventListener('touchend', () => {
      inputpassword.type = "password";
      buttonShow.innerHTML = "<i class='fa-regular fa-eye'></i>";
    });
  }

  password_verify(inputpassword, inputpassword_verify, errorSpan) {
    inputpassword_verify.addEventListener('keyup', function() {
      if (inputpassword.value != inputpassword_verify.value) {
        inputpassword_verify.classList.add("border-danger");
        inputpassword_verify.classList.remove("border-success");
        errorSpan.innerHTML = "Le mot de passe saisi ne correspond pas au mot de passe en haut";
        errorSpan.classList.add("text-danger");
        errorSpan.classList.remove("text-success");
      } else {
        inputpassword_verify.classList.add("border-success");
        inputpassword_verify.classList.remove("border-danger");
        errorSpan.innerHTML = "Le mot de passe saisi correspond au mot de passe en haut";
        errorSpan.classList.add("text-success");
        errorSpan.classList.remove("text-danger");
      }
    });
    return () => inputpassword.value === inputpassword_verify.value;
  }
}


/* Sign Up */

const form_check = document.querySelector('form');
if (form_check != null && form_check.classList.contains('sign-up')) {

  const form = new Form();

  const myForm = document.getElementById('signupForm');

  const inputCEF = myForm.querySelector('input[name="CEF"]');
  const errorCEF = myForm.querySelector('#errorCEF');
  var isCEFValid = form.CEF(inputCEF, errorCEF);

  const inputNom = myForm.querySelector('input[name="Nom"]');
  const inputPrenom = myForm.querySelector('input[name="prenom"]');
  const inputOption = myForm.querySelector('input[name="option"]');
  var isInputNomvalid = form.casualInput(inputNom);
  var isInputPrenomvalid = form.casualInput(inputPrenom);
  var isInputOptionvalid = form.casualInput(inputOption);

  const inputEmail_scolaire = myForm.querySelector('input[name="email_scolaire"]');
  const errorEmail = myForm.querySelector('#errorEmail');
  var isEmailValid = form.Email_scolaire(inputEmail_scolaire, errorEmail);
  
  const telephoneError = myForm.querySelector("#telephoneError")
  const inputTelephone = myForm.querySelector('input[name="Telephone"]');
  var isTeleValid = form.telephone(inputTelephone,telephoneError);

  const inputPassword = myForm.querySelector('input[name="password"]');
  const rule1 = myForm.querySelector('#rule1');
  const rule2 = myForm.querySelector('#rule2');
  const rule3 = myForm.querySelector('#rule3');
  const buttonShow = myForm.querySelector('.password-show-btn');
  form.buttonShow(buttonShow,inputPassword)
  var isPasswordValid = form.passwordSign(inputPassword, rule1, rule2, rule3, buttonShow);

  const inputPasswordVerify = myForm.querySelector('input[name="password_verify"]');
  const errorSpan = myForm.querySelector('#No_match');
  var isPasswordVerifyValid = form.password_verify(inputPassword, inputPasswordVerify, errorSpan);

  myForm.addEventListener('submit', (event) => {
    event.preventDefault();
console.log(isCEFValid() , isInputNomvalid() , isInputPrenomvalid() , isInputOptionvalid() , isEmailValid() , isTeleValid() ,isPasswordValid(),isPasswordVerifyValid())
    if(isCEFValid() && isInputNomvalid() && isInputPrenomvalid() && isInputOptionvalid() && isEmailValid() && isTeleValid() && isPasswordValid() && isPasswordVerifyValid()){
      myForm.submit()
    }else{
      alert('Entrées du formulaire invalides');
    }
  });


}
/* Log in */

if (form_check != null && form_check.classList.contains('log-in')) {
  const form = new Form();

  var buttonShow = document.querySelector(".password-show-btn")
  const inputCEF = document.getElementById("CEF");
  const errorCEF = document.getElementById("Error");
  const inputPassword = document.getElementById("password");
  form.buttonShow(buttonShow,inputPassword)

  const isCEFValid = form.CEF(inputCEF, errorCEF);
  const isPasswordValid = form.passwordLog(inputPassword,buttonShow);

  const formElement = document.querySelector("form");
  formElement.addEventListener("submit", function(event) {
    event.preventDefault();

    if (isCEFValid() && isPasswordValid()) {
      formElement.submit();
    } else {
      alert('Entrées du formulaire invalides');
    }
  });

}

/* Contact and question */

if (form_check != null && form_check.classList.contains('contact-question')) {

  const form = new Form();
  const inputCEF = document.querySelector('input[name="CEF"]');
  const errorCEF = document.getElementById('errorCEF');
  const inputNom = document.querySelector('input[name="nom"]');
  const inputEmail = document.querySelector('input[name="email"]');
  const errorEmail = document.getElementById('errorEmail');
  const textArea= document.querySelector('#textArea');
  const isCEFValid = form.CEF(inputCEF, errorCEF);
  const isNomValid = form.casualInput(inputNom)
  const isEmailValid = form.Email_scolaire(inputEmail, errorEmail);
  const isTextAreaValid = form.casualInput(textArea)

  const formElement = document.querySelector('form');
  formElement.addEventListener('submit', function(event) {
    event.preventDefault();

    if (isCEFValid() && isEmailValid() && isNomValid() && isTextAreaValid()) {
      formElement.submit();
    } else {
      alert('Entrées du formulaire invalides');
    }
  });

}

/* Blog */

const form1 = document.querySelector(".form1")
const form2 = document.querySelector(".form2")
if ((form1 != null || form2 != null) && (form1.classList.contains('blog-two') || form2.classList.contains('blog-two'))) {

  /* Comment */
  var form = new Form();

  var inputCEF = document.querySelector('input[name="CEF"]');
  var errorCEF = document.getElementById('errorCEF');
  var nom = document.querySelector('input[name=nom]')
  var inputEmail = document.querySelector('input[name="email"]');
  var errorEmail = document.getElementById('errorEmail');
  var textArea = document.querySelector('#textArea')

  var isCEFValid = form.CEF(inputCEF, errorCEF);
  var isNomValid = form.casualInput(nom);
  var isEmailValid = form.Email_scolaire(inputEmail, errorEmail); 
  var isTextAreaValid = form.casualInput(textArea); 

  var formElement = document.querySelector('#formComment');
  formElement.addEventListener('submit', function(event) {
    event.preventDefault();

    if (isCEFValid() && isEmailValid() && isNomValid() && isTextAreaValid()) {
      formElement.submit();
    } else {
      alert('Entrées du formulaire invalides');
    }
  });

  /* participation */

  var formParticipe = new Form();

  var inputNom = document.getElementById('nom');
  var inputFonction = document.getElementById('fonction');
  var inputTitle = document.getElementById('title');
  var textareaContent = document.querySelector('.content');
  var inputImage = document.querySelector('.img');

  var isNomValidPart = formParticipe.casualInput(inputNom);
  var isFonctionValidPart = formParticipe.casualInput(inputFonction);
  var isTitleValidPart = formParticipe.casualInput(inputTitle);
  var isContentValidPart = formParticipe.casualInput(textareaContent);
  var isImageValidPart = formParticipe.casualInput(inputImage);

  var formParticipeElemtent = document.getElementById('formParticipe');
  formParticipeElemtent.addEventListener('submit', function(event) {
    event.preventDefault();

    if (isNomValidPart() && isFonctionValidPart() && isTitleValidPart() && isContentValidPart() && isImageValidPart()) {
      formParticipeElemtent.submit();
    } else {
      alert('Entrées du formulaire invalides');
    }
  });


}

/* Vote  */

if (form_check != null && form_check.classList.contains('vote-section')) {

  var form = new Form();

  var inputCEF = document.querySelector('input[name="CEF"]');
  var errorCEF = document.getElementById('errorCEF');
  var textareaMotivation = document.querySelector('.text-area');
  var selectVoteCandidat = document.querySelector('select[name="voteCandidat"]');

  var isCEFValid = form.CEF(inputCEF, errorCEF);
  var isMotivationValid = form.casualInput(textareaMotivation);
  var isVoteCandidatValid = form.casualInput(selectVoteCandidat);

  var formElement = document.querySelector('form');
  formElement.addEventListener('submit', function(event) {
    event.preventDefault();
    if (isCEFValid() && isMotivationValid() && isVoteCandidatValid()) {
      formElement.submit();
    } else {
      alert('Entrées du formulaire invalides');
    }
  });

}

/* Profile */

var form_update = document.querySelector("#form_update");

if(form_update!=null){

  let form_update_inst = new Form();
/* password */
  let password_input = form_update.querySelector("#password");
  let password_input_showData = form_update.querySelector("#password_input_showData");
  let password_show_btn_data = form_update.querySelector("#password-show-btn-data");
  let password_buttonShow = form_update.querySelector(".password-show-btn");

  let rule1 = form_update.querySelector('#rule1');
  let rule2 = form_update.querySelector('#rule2');
  let rule3 = form_update.querySelector('#rule3');

  let errorSpan = form_update.querySelector('#No_match');
  let password_verify = form_update.querySelector(".password_verify")

  form_update_inst.buttonShow(password_buttonShow,password_input)
  form_update_inst.buttonShow(password_show_btn_data,password_input_showData)

  form_update_inst.passwordSign(password_input, rule1, rule2, rule3, password_buttonShow);
  form_update_inst.password_verify(password_input, password_verify, errorSpan);
  


/* nom prenom */

  let nom_input = form_update.querySelector("input[name='Nom']");
  form_update_inst.casualInput(nom_input)
  let prenom_input = form_update.querySelector("input[name='prenom']");
  form_update_inst.casualInput(prenom_input)

/* Email */

  let inputEmail_scolaire = form_update.querySelector('input[name="email_scolaire"]');
  let errorEmail = form_update.querySelector('#errorEmail');
  var isEmailValid = form_update_inst.Email_scolaire(inputEmail_scolaire, errorEmail);

  const telephoneError = form_update.querySelector("#telephoneError")
  const inputTelephone = form_update.querySelector('input[name="Telephone"]');
  var isTeleValid = form_update_inst.telephone(inputTelephone,telephoneError);
  
}
