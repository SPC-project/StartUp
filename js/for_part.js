particlesJS("particles-js", {
	/*"particles": {
		"number": {
			"value": 200,
			"density": {
				"enable": true,
				"value_area": 800
			}
		},
		"color": {
			"value": "#fff"
		},
		"shape": {
			"type": "circle",
			"stroke": {
				"width": 0,
				"color": "#000000"
			},
			"polygon": {
				"nb_sides": 5
			},
			"image": {
				"src": "img/github.svg",
				"width": 100,
				"height": 100
			}
		},
		"opacity": {
			"value": 0.5,
			"random": false,
			"anim": {
				"enable": true,
				"speed": 10,
				"opacity_min": 0.1,
				"sync": false
			}
		},
		"size": {
			"value": 3,
			"random": true,
			"anim": {
				"enable": true,
				"speed": 10,
				"size_min": 0.1,
				"sync": false
			}
		},
		"line_linked": {
			"enable": true,
			"distance": 80,
			"color": "#fff",
			"opacity": 0.9,
			"width": 1
		},
		"move": {
			"enable": true,
			"speed": 2,
			"direction": "none",
			"random": false,
			"straight": false,
			"out_mode": "out",
			"bounce": false,
			"attract": {
				"enable": true,
				"rotateX": 600,
				"rotateY": 1200
			}
		}
	},
	"interactivity": {
		"detect_on": "canvas",
		"events": {
			"onhover": {
				"enable": true,
				"mode": "grab"
			},
			"onclick": {
				"enable": true,
				"mode": "push"
			},
			"resize": true
		},
		"modes": {
			"grab": {
				"distance": 140,
				"line_linked": {
					"opacity": 1
				}
			},
			"bubble": {
				"distance": 400,
				"size": 40,
				"duration": 2,
				"opacity": 8,
				"speed": 30
			},
			"repulse": {
				"distance": 40,
				"duration": 0.4
			},
			"push": {
				"particles_nb": 4
			},
			"remove": {
				"particles_nb": 2
			}
		}
	},
	"retina_detect": true*/
	particles: {


		"number": {
			"value": 200,
			"density": {
				"enable": true,
				"value_area": 800
			}
		},
		"color": {
			"value": "#fff"
		},
		"shape": {
			"type": "circle",
			"stroke": {
				"width": 0,
				"color": "#000000"
			},
			"polygon": {
				"nb_sides": 5
			},
			"image": {
				"src": "img/github.svg",
				"width": 100,
				"height": 100
			}
		},
		"opacity": {
			opacity: 0.8,
			anim: {
				enable: true,
				speed: 1.5,
				opacity_min: 0,
				sync: false
			}
			/*
						"value": 0.5,
						"random": false,
						"anim": {
							"enable": true,
							"speed": 10,
							"opacity_min": 0.1,
							"sync": false
						}*/
		},
		"size": {
			"value": 3,
			"random": true,
			"anim": {
				"enable": true,
				"speed": 10,
				"size_min": 0.1,
				"sync": false
			}
		},
		"line_linked": {
			/*"enable": true,
			"distance": 80,
			"color": "#fff",
			"opacity": 0.9,
			"width": 1*/
			enable_auto: true,
			distance: 130,
			color: '#D3D3D3',
			opacity: 1,
			width: 1,
			condensed_mode: {
				enable: true,
				rotateX: 600,
				rotateY: 600
			}
		},
		"move": {
			"enable": true,
			"speed": 2,
			"direction": "none",
			"random": false,
			"straight": false,
			"out_mode": "out",
			"bounce": false,
			"attract": {
				"enable": true,
				"rotateX": 600,
				"rotateY": 1200
			}
		}
	},
	interactivity: {

		"detect_on": "canvas",
		"events": {
			"onhover": {
				"enable": true,
				"mode": "grab"
			},
			"onclick": {
				"enable": true,
				"mode": "push"
			},
			"resize": true
		},
		"modes": {
			"grab": {
				"distance": 140,
				"line_linked": {
					"opacity": 1
				}
			},
			"bubble": {
				"distance": 400,
				"size": 40,
				"duration": 2,
				"opacity": 8,
				"speed": 30
			},
			"repulse": {
				"distance": 40,
				"duration": 0.4
			},
			"push": {
				"particles_nb": 4
			},
			"remove": {
				"particles_nb": 2
			}
		}
	},
	/* Retina Display Support */
	retina_detect: true
});
