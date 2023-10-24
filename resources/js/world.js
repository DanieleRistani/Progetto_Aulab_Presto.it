
// import di Three.js
import * as THREE from 'three'; 

// decommentare per dare la possibilità all utente di muoreve il mondo come un mappamondo
import {OrbitControls} from 'three/examples/jsm/controls/OrbitControls';

// caricamento dell'immagine che ci servira come texture per la sfera
let texture = new THREE.TextureLoader().load( "/terra.jpg" )

// catturo il contenitore della sfera in questo caso un div
let container = document.getElementById( 'wrapper' )

// creo la scena in quanto alla base di three.js cè la simulazione di quando un oggetto 3d viene ripreso da una telecamera
let scene = new THREE.Scene()
// creo una camera 
let camera = new THREE.PerspectiveCamera( 75, window.innerWidth / container.clientHeight, 0.1, 1000 );

// creo il render ovvero lo spazio nel quale è presento l oggetto e lo delimito con le misure del div e lo lego a esso con container.appendChild( renderer.domElement )
let renderer = new THREE.WebGLRenderer({antialias: true,Color:0xffffff00,alpha:true});
renderer.setClearColor( 0x000000, 0 )
renderer.setSize( container.clientWidth,  container.clientHeight)
container.appendChild( renderer.domElement )

// creo la sfera determinando poligoni,dimensione,geometria e materiale e attacco la map=texture
let geometry = new THREE.SphereGeometry(2, 64, 32 ); 
let material = new THREE.MeshBasicMaterial({map:texture})
let sphere = new THREE.Mesh( geometry, material ); 
// aggiungo alla scena la sfera
scene.add( sphere );
// imposto la posizione della sfera al centro del div
sphere.position.set(0,0,0)


// e posizione la visuale dall alto in modo da vedere tutto l oggetto
camera.position.z = 4;

// decommentare per dare la possibilità all utente di muoreve il mondo come un mappamondo
window.addEventListener('load',()=>{
    if(window.innerWidth >1000){


        let controls=new OrbitControls(camera,renderer.domElement)
        controls.enableZoom =false
        controls.enablePan = false;
        controls.mouseButtons = {
            LEFT: THREE.MOUSE.ROTATE,
               
        }
        controls.update()


    }else{


    }

})




// creo una funzione che a ogni framerate dello schermo aggiunge una rotazione che si somma a quella precedente lungo x e y in modo da avere una rotazione all apparenza casuale
function animate() {
	requestAnimationFrame( animate );
    sphere.rotation.y += 0.003;
	sphere.rotation.x += 0.003;

    
    
    
  // ogni volta che viene aggiunta la rotazione vi è il render della scena e della camera con la nuova posizione
	renderer.render( scene, camera );
}

// funzione dedita per il responsive che si occupa di ridimensionare il div contenitore in base alla dimensione della pagina
window.addEventListener('resize',()=>{

    camera.aspect= window.innerWidth/container.clientHeight
	camera.updateProjectionMatrix()
    
    renderer.setSize( container.clientWidth,  container.clientHeight)
   

})   

// chiamata dell funzione di animazione
animate();



   