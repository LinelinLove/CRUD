let listP = document.querySelector("ol")
// let info = document.querySelectorAll(".info")
let prenom = document.querySelectorAll(".prenom")
let nom = document.querySelectorAll(".nom")
let buttonUpdate = document.querySelectorAll(".update")
let divPUD = document.querySelectorAll(".pUD")

var elements = listP.childNodes;
// listP.addEventListener('click', function (e) {
//     console.log(`This is ${[...elements].indexOf(e.target)} element`)
// })

// console.log(elements[1])

// console.log(info)


// console.log(elements)
// console.log(listP.length)


// container.addEventListener('click', function (e) {
//     console.log(`This is ${[...elements].indexOf(e.target)} element`)

for (i = 0; i < elements.length - 2; i++) {

    //     // console.log(buttonUpdate[i])
    buttonUpdate[i].addEventListener("click", function (e) {
        //         // let j = [...elements].indexOf(e.target)
        // console.log("coucou")



            // console.log(prenom[j].innerHTML, nom[j].innerHTML)
            console.log("prenom")
        


        //         // console.log(elements[1], prenom[0].innerHTML, nom[0].innerHTML)
        //         // console.log(elements[2], prenom[1].innerHTML, nom[1].innerHTML)
        //         // console.log(elements[3], prenom[2].innerHTML, nom[2].innerHTML)
        //         // console.log(elements[4], prenom[3].innerHTML, nom[3].innerHTML)
        //         // console.log(elements[5], prenom[4].innerHTML, nom[4].innerHTML)

        //         // console.log(info[0])
        //         // console.log(i)
        //         // console.log(`This is ${[...elements].indexOf(e.target)} element`)

        //         // console.log(i)
    })
}

donnee = {
    "libelle": "Une table",
    "description": "Une jolie table",
    "prix": 60.75,
    "note": 45
}

// let container = document.getElementById("container")

// let pLibelle = document.createElement("p")
// pLibelle.innerHTML = donnee["libelle"]

// let pDescription = document.createElement("p")
// pDescription.innerHTML = donnee["description"]

// let pPrix = document.createElement("p")
// pPrix.innerHTML = donnee["prix"]

// let pNote = document.createElement("p")
// pNote.innerHTML = donnee["note"]

// container.appendChild(pLibelle)
// container.appendChild(pDescription)
// container.appendChild(pPrix)
// container.appendChild(pNote)

// fetch("api.php", { method: 'get', })
//     .then(response => response.json())
//     .then(data => {
//         let apiLibelle = document.createElement("p")
//         apiLibelle.innerHTML = data["libelle"]

//         let apiDescription = document.createElement("p")
//         apiDescription.innerHTML = data["description"]

//         let apiPrix = document.createElement("p")
//         apiPrix.innerHTML = data["prix"]

//         let apiNote = document.createElement("p")
//         apiNote.innerHTML = data["note"]

//         container.appendChild(apiLibelle)
//         container.appendChild(apiDescription)
//         container.appendChild(apiPrix)
//         container.appendChild(apiNote)
//     })

// partie 1 exo 1
// let personne = {
//     "prenom": "Line",
//     "nom": "Lin",
//     "tel": ["00 00 00 00 00", "11 11 11 11 11", "22 22 22 22 22"],
//     "mail": ["abc@de.fr", "ghi@jk.fr", "lmn@op.fr"]
// }

// console.log(personne)

// let button = document.getElementById("button")

// button.addEventListener("click", function () {
//     create($personne)
// })