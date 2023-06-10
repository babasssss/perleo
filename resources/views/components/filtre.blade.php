<div class="jumbotron jumbotron-fluid">
  <div class="p-4">
    <div style="position: relative;">
      <input style="
        border: 2px solid #3574F2;
        border-radius: 8px;
        height: 40px;
        width: 100%;
        padding-left: 5px;"
        type="text"
        id="nameRecherche"
        value=""/>
      <a style="
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 10px;"
        type="button"
        id="valider" 
        value="valider">
        <img src="./img/evenements/loupe.png" alt="Perleo" style="
          height: 20px;
          width: 20px;">
      </a>
    </div>

    <div class="filter-wrapper mt-2">
      <a class="tab-active" onclick="toggleTab(this, 'filtre')">Filtres</a>
      <a class="tab" onclick="toggleTab(this, 'dates-lieu')">Dates & Lieu</a>
    </div>

    <div id="filtersInput" style="display: none;">
      <label for="articlesRadio">Articles</label>
      <input type="radio" id="articlesRadio" name="filter" />

      <label for="eventsRadio">Événements</label>
      <input type="radio" id="eventsRadio" name="filter" />
    </div>

    <div id="dateLieuInput" style="display: none;" class="mt-2">
      <input type="date" id="dateInput" class="date-input" />
    </div>
    
    <div class="pt-2" id="message"></div>
  </div>
</div>



<script>
  var saisies = []; // Variable pour stocker les saisies

  function validerSaisie() {
    var nameRecherche = document.getElementById('nameRecherche').value;

    if (typeof nameRecherche === 'string' && nameRecherche.trim() !== '') {
      saisies.push(nameRecherche); // Ajouter la saisie à la variable 'saisies'

      var messageElement = document.getElementById('message');
      messageElement.innerHTML = ""; // Réinitialisation du contenu de message

      for (var i = 0; i < saisies.length; i++) {
        var searchElement = document.createElement("span");
        searchElement.classList.add("search");
        searchElement.innerHTML = saisies[i] + "<a href='#' onclick='supprimerSaisie(" + i + ")'><svg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7.21669 6.00008L11.8334 10.6167V11.8334H10.6167L6.00002 7.21675L1.38335 11.8334H0.166687V10.6167L4.78335 6.00008L0.166687 1.38341V0.166748H1.38335L6.00002 4.78341L10.6167 0.166748H11.8334V1.38341L7.21669 6.00008Z' fill='#5827B4'/></svg></a>";
        messageElement.appendChild(searchElement);
      }

      document.getElementById('nameRecherche').value = ''; // Réinitialisation du champ de saisie
    }
  }

  function supprimerSaisie(index) {
    saisies.splice(index, 1); // Supprimer la saisie correspondante de la variable 'saisies'

    var messageElement = document.getElementById('message');
    messageElement.innerHTML = ""; // Réinitialisation du contenu de message

    for (var i = 0; i < saisies.length; i++) {
      var searchElement = document.createElement("span");
      searchElement.classList.add("search");
      searchElement.innerHTML = saisies[i] + "<a href='#' onclick='supprimerSaisie(" + i + ")'><svg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7.21669 6.00008L11.8334 10.6167V11.8334H10.6167L6.00002 7.21675L1.38335 11.8334H0.166687V10.6167L4.78335 6.00008L0.166687 1.38341V0.166748H1.38335L6.00002 4.78341L10.6167 0.166748H11.8334V1.38341L7.21669 6.00008Z' fill='#5827B4'/></svg></a>";
      messageElement.appendChild(searchElement);
    }
  }

  function toggleTab(element, nameTab) {
    
    if (element.classList.contains("tab-active")) {
      element.classList.add("tab");
      element.classList.remove("tab-active");

      
    } else if (element.classList.contains("tab")) {
      element.classList.add("tab-active");
      element.classList.remove("tab");
    }
  }



  // Saisie bar de recherche 
  document.getElementById("valider").onclick = validerSaisie;
  document.getElementById("nameRecherche").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      validerSaisie();
    }
  });


</script>


