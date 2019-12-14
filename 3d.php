<?php
if(isset($_GET['nombre'])){
$nombre='getdata.php?nombre='.$_GET['nombre'];	
}
else{
	$nombre='getdata.php?nombre=test';
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - OBJLoader + MTLLoader</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link type="text/css" rel="stylesheet" href="main.css">
	</head>

	<body>

		<script type="module">
			var x = 0;
			var y = 0;
			var z = 0;
		function live(){
	setInterval(function (){
		fetch('<?php echo $nombre?>').then(function (response){
			return response.json();
		}).then(function (data) {
			x = data.x;
			y = data.y;
			z = data.z;
			
		}).catch(function (error) {
			console.log(error);
		});
	},500);
	}
	document.addEventListener("DOMContentLoaded", function () {
		live();
	});

			import * as THREE from '../build/three.module.js';

			import { DDSLoader } from './jsm/loaders/DDSLoader.js';
			import { MTLLoader } from './jsm/loaders/MTLLoader.js';
			import { OBJLoader } from './jsm/loaders/OBJLoader.js';

			var container;

			var camera, scene, renderer;

			var mouseX = 0, mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;


			init();
			animate();


			function init() {
				container = document.createElement( 'div' );
				document.body.appendChild( container );

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 2000 );
				camera.position.z = 250;

				// scene

				scene = new THREE.Scene();

				var ambientLight = new THREE.AmbientLight( 0xcccccc, 0.4 );
				scene.add( ambientLight );

				var pointLight = new THREE.PointLight( 0xffffff, 0.8 );
				camera.add( pointLight );
				scene.add( camera );

				// model

				var onProgress = function ( xhr ) {

					if ( xhr.lengthComputable ) {

						var percentComplete = xhr.loaded / xhr.total * 100;
						console.log( Math.round( percentComplete, 2 ) + '% downloaded' );

					}

				};

				var onError = function () { };

				var manager = new THREE.LoadingManager();
				manager.addHandler( /\.dds$/i, new DDSLoader() );

				// comment in the following line and import TGALoader if your asset uses TGA textures
				// manager.addHandler( /\.tga$/i, new TGALoader() );

				new MTLLoader( manager )
					.setPath( 'models/obj/male02/' )
					.load( 'male02_dds.mtl', function ( materials ) {

						materials.preload();

						new OBJLoader( manager )
							.setMaterials( materials )
							.setPath( 'models/obj/male02/' )
							.load( 'male02.obj', function ( object ) {

								object.position.y = -5;
								object.scale.set(0.05,0.05,0.05);
								scene.add( object );

							}, onProgress, onError );

					} );

				//

				renderer = new THREE.WebGLRenderer();
				renderer.setClearColor( 0xffffff, 1 );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );


				//

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				windowHalfX = window.innerWidth / 2;
				windowHalfY = window.innerHeight / 2;

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			//

			function animate() {

				requestAnimationFrame( animate );
				render();

			}

			function render() {
				var radius = 20;
				var angle = Date.now() * 0.00225;
				camera.position.x = radius * Math.cos(x); 
				camera.position.y = radius * Math.cos(y);
				camera.position.z = radius * Math.sin(z);
				
				angle += 0.01;

				camera.lookAt( scene.position );

				renderer.render( scene, camera );

			}

		</script>

	</body>
</html>