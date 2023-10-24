let allBigImg = document.querySelectorAll('.bigImg')

let allImg = document.querySelectorAll('.smallImg')

allImg.forEach((img, i) => {

    img.addEventListener('click', () => {
        allBigImg.forEach((bigImg, index) => {
            if (i !== index) {
                bigImg.classList.remove('active', 'show')
            }

        })
    })

})

function animazioneNotifica(id) {

    let element = document.querySelector("#" + id);
   
    element.classList.remove('notifica')
    element.classList.add('notificaFuori')
}
setTimeout(() => {
    animazioneNotifica('articleCreated');
}, 3000)

setTimeout(() => {
    animazioneNotifica('notificaDashboard');
}, 3000)

setTimeout(() => {
    animazioneNotifica('richiestaRevisore');
}, 3000)

setTimeout(() => {
    animazioneNotifica('lavoraConNoi');
}, 3000)

setTimeout(() => {
    animazioneNotifica('reviewSended');
}, 3000)

setTimeout(() => {
    animazioneNotifica('noRevisor');
}, 3000)

setTimeout(() => {
    animazioneNotifica('profileUpdated');
}, 3000)

setTimeout(() => {
    animazioneNotifica('passwordErrata');
}, 3000)

setTimeout(() => {
    animazioneNotifica('emailAlreadyExist');
}, 3000)

setTimeout(() => {
    animazioneNotifica('updatedDescription');
}, 3000)

setTimeout(() => {
    animazioneNotifica('updatedProfileImage');
}, 3000)

setTimeout(() => {
    animazioneNotifica('reviewLogin');
}, 3000)

setTimeout(() => {
    animazioneNotifica('articleAccepted');
}, 3000)

setTimeout(() => {
    animazioneNotifica('articleRefused');
}, 3000)

setTimeout(() => {
    animazioneNotifica('articleRevision');
}, 3000)