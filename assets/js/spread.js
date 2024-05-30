function createPublication() {
    var linkInput = document.getElementById("publicationLink");
    var link = linkInput.value;

    if (link.trim() === "") {
        alert("Veuillez entrer un lien valide.");
        return;
    }

    var publicationElement = document.createElement("div");
    publicationElement.textContent = link;
    publicationElement.classList.add("publication");

    var publicationsContainer = document.getElementById("publicationsContainer");
    publicationsContainer.appendChild(publicationElement);

    linkInput.value = "";

    localStorage.setItem("publication-" + Date.now(), link);
}

var createPublicationBtn = document.getElementById("createPublicationBtn");
createPublicationBtn.addEventListener("click", createPublication);