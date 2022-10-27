try {
  let password = document.querySelector("#password");
  let password2 = document.querySelector("#password2");
  let password2Label = document.querySelector("#password2Label");
  let butonSubmit = document.querySelector("[type=submit]");

  password.addEventListener("input", checkpass);
  password2.addEventListener("input", checkpass);
  //cette fonction vérifie le mot de pass
  function checkpass() {
    //on initiallise le score
    let score = 0;
    // on récupère ce qui as été saisi
    // let mdp = this.value;
    let mdp = password.value;
    let mdp2 = password2.value;
    // on vas rechercher les éléments dont on as besoin
    let minuscule = document.querySelector("#minuscule");
    let majuscule = document.querySelector("#majuscule");
    let chiffre = document.querySelector("#chiffre");
    let special = document.querySelector("#speciale");
    let longueur = document.querySelector("#longueur");
    let confirmation = document.querySelector("#password2Label");

    //on vérifie qu'on as une minuscule
    if (mdp != null && /[a-z]/.test(mdp)) {
      //on passe en vert "valid"
      minuscule.classList.replace("invalid", "valid");
      score++;
    } else {
      //on passe en rouge "invalid"
      minuscule.classList.replace("valid", "invalid");
    }
    //on vérifie qu'on as une majuscule
    if (/[A-Z]/.test(mdp)) {
      //on passe en vert "valid"
      majuscule.classList.replace("invalid", "valid");
      score++;
    } else {
      //on passe en rouge "invalid"
      majuscule.classList.replace("valid", "invalid");
    }
    //on vérifie qu'on as une chiffre
    if (/[0-9]/.test(mdp)) {
      //on passe en vert "valid"
      chiffre.classList.replace("invalid", "valid");
      score++;
    } else {
      //on passe en rouge "invalid"
      chiffre.classList.replace("valid", "invalid");
    }
    //on vérifie qu'on as une special
    if (/[$@!%*#&]/.test(mdp)) {
      //on passe en vert "valid"
      special.classList.replace("invalid", "valid");
      score++;
    } else {
      //on passe en rouge "invalid"
      special.classList.replace("valid", "invalid");
    }
    // on vérifie qu'on as une longueur
    if (mdp.length >= 8) {
      //on passe en vert "valid"
      longueur.classList.replace("invalid", "valid");
      score++;
    } else {
      //on passe en rouge "invalid"
      longueur.classList.replace("valid", "invalid");
    }
    // on vérifie qu'on as une longueur
    if (mdp === mdp2) {
      //on passe en vert "valid"
      confirmation.classList.replace("invalid", "valid");
      score++;
    } else {
      //on passe en rouge "invalid"
      confirmation.classList.replace("valid", "invalid");
    }

    if (score === 6) {
      butonSubmit.classList.remove("d-none");
    } else {
      butonSubmit.classList.add("d-none");
    }
  }
} catch (error) {}
