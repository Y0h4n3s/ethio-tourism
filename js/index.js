let images = ["axum.jpg", "nile.jfif", "omo.jfif", "silase.jfif", "chilada.jfif"]

setInterval(() => {
    let imgElement = document.getElementById("images")
    let imgSrc = imgElement.attributes.src.value
    let idx = images.findIndex(image => "images/" + image === imgSrc)


    imgElement.attributes.src.value = "images/" + images[(idx + 1) % (images.length )]
}, 4000)
