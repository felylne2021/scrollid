var controller = new ScrollMagic.Controller();

// var bgm = document.getElementById("bgm");
// bgm.volume = 0.5;
// console.log(bgm.volume);
var info1 = document.getElementById("info1");
var info2 = document.getElementById("info2");
var info3 = document.getElementById("info3");
var mapv = document.getElementById("mapv");
var contagionSound = document.getElementById("contagionSound");
var symptomsSound = document.getElementById("symptomsSound");
var prevent1 = document.getElementById("prevent1");
var prevent2 = document.getElementById("prevent2");
var prevent3 = document.getElementById("prevent3");
var prevent4 = document.getElementById("prevent4");

function playInfo1(){
	info1.play();
}
function playInfo2(){
	info2.play();
}
function playInfo3(){
	info3.play();
}
function playMap(){
	mapv.play();
}
function playContagion(){
	contagionSound.play();
}
function playSymptoms(){
	symptomsSound.play();
}
function playPrevent1(){
	prevent1.play();
}
function playPrevent2(){
	prevent2.play();
}
function playPrevent3(){
	prevent3.play();
}
function playPrevent4(){
	prevent4.play();
}

// scene 1
// title into fade
var intro = new ScrollMagic.Scene({
	triggerElement: '.sceneIntro', 
	triggerHook: 'onEnter', 
	offset: 400
})
.setClassToggle('.sceneIntro', 'show')
.addTo(controller);

// parallax 1
var introPrlx = document.getElementById('prlx1');
var prlx1 = new Parallax(introPrlx);


// scene 2
// motion 2
const virusPath = {
	curviness: 1,
	autoRotate: true,
	values: [
		{x:150, y:100},
		{x:275, y:170},
		{x:300, y:190},
		{x:500, y:240},
		{x:650, y:350}
	]
};
const virusTween = new TimelineLite();
virusTween.add(
	TweenLite.to(".virus", 1, {
		bezier: virusPath,
		ease: Power1.easeInOut
	})
);
const virusScene = new ScrollMagic.Scene({
	triggerElement: '.animation',
	duration: 700,
	triggerHook: 0
})
.setTween(virusTween)
.setPin(".animation")
.addTo(controller);

// virus info motion
var infoTl = new TimelineMax();

infoTl.from("#info-one", .5, {x:200, opacity:0});
infoTl.from("#info-two", .5, {x:-200, opacity:0});
infoTl.from("#info-three", .5, {x:200, opacity:0});

const sceneInfo = new ScrollMagic.Scene({
	triggerElement: ".animation",
	triggerHook: "onLeave",
	duration: "100%"
})
.setPin("animation")
.setTween(infoTl)
.addTo(controller)


// scene 3
// pinning map title
var map = new ScrollMagic.Scene({
	triggerElement: ".map", 
	duration: 300,
	triggerHook: '0'

})
.setPin(".map") 
.addTo(controller);

// warning pin motion
var mapTl = new TimelineMax();

mapTl.to("#text-one", 0.2, {x:-200, opacity:0});
mapTl.from("#text-two", 0.2, {x:200, opacity:0});
mapTl.to("#text-two", 0.2, {x:-200, opacity:0}, "+=3");
mapTl.from("#text-three", 0.2, {x:200, opacity:0});
mapTl.from("#warn1", 0.1, {y:200, opacity:0});
mapTl.from("#warn2", 0.1, {y:200, opacity:0});
mapTl.from("#warn3", 0.1, {y:200, opacity:0});
mapTl.from("#warn4", 0.1, {y:200, opacity:0});
mapTl.from("#warn5", 0.1, {y:200, opacity:0});
mapTl.from("#warn6", 0.1, {y:200, opacity:0});
mapTl.from("#warn7", 0.1, {y:200, opacity:0});
mapTl.from("#warn8", 0.1, {y:200, opacity:0});
mapTl.from("#warn9", 0.1, {y:200, opacity:0});
mapTl.from("#warn10", 0.1, {y:200, opacity:0});
mapTl.from("#warn11", 0.1, {y:200, opacity:0});
mapTl.from("#warn12", 0.1, {y:200, opacity:0});
mapTl.from("#warn13", 0.1, {y:200, opacity:0});
mapTl.from("#warn14", 0.1, {y:200, opacity:0});
mapTl.from("#warn15", 0.1, {y:200, opacity:0});
mapTl.from("#warn16", 0.1, {y:200, opacity:0});
mapTl.from("#warn17", 0.1, {y:200, opacity:0});
mapTl.from("#warn18", 0.1, {y:200, opacity:0});
mapTl.from("#warn19", 0.1, {y:200, opacity:0});
mapTl.from("#warn20", 0.1, {y:200, opacity:0});
mapTl.from("#warn21", 0.1, {y:200, opacity:0});
mapTl.from("#warn22", 0.1, {y:200, opacity:0});

const sceneMap = new ScrollMagic.Scene({
	triggerElement: ".map",
	triggerHook: "onLeave"
})
.setPin("map")
.setTween(mapTl)
.addTo(controller)


// scene4
// boy pinning
var boyTl = new TimelineMax();

boyTl.to("#thinking", 1, {x:480});

const boy = new ScrollMagic.Scene({
	triggerElement: ".horizontal",
	triggerHook: "onCenter",
	duration: 350
})
.setPin("horizontal")
.setTween(boyTl)
.addTo(controller)

// cloud
var cloud = new TimelineMax();

cloud.from("#contagion", 1, {opacity:0});
cloud.from("#cloud", 0.5, {opacity:0});
cloud.from("#cloud-text", 0.5, {opacity:0});

const cloudFade = new ScrollMagic.Scene({
	triggerElement: ".covid-think",
	triggerHook: "onCenter"
})
.setPin("horizontal")
.setTween(cloud)
.addTo(controller)


// parallax 2
var contPrlx = document.getElementById('contagion');
var prlx2 = new Parallax(contPrlx);

// scene5
var toScene5 = new TimelineMax();


toScene5.to("#thinking", 0.5, {opacity:0});

const boyFade = new ScrollMagic.Scene({
	triggerElement: ".covid-shock",
	triggerHook: "onEnter",
	duration: "100%"
})
.setPin("horizontal")
.setTween(toScene5)
.addTo(controller)

var boyMove = new TimelineMax();

boyMove.to("#shock", 0.5, {opacity: 1});

const boyMoving = new ScrollMagic.Scene({
	triggerElement: ".covid-shock",
	triggerHook: "onEnter",
	reverse: "true"
})
.setPin("covid-shock")
.setTween(boyMove)
.addTo(controller)

var scene5 = new TimelineMax();

toScene5.from("#symptoms", 1, {opacity:0});
toScene5.from("#cloud2", 0.5, {opacity:0});
toScene5.from("#cloud-text2", 0.5, {opacity:0});

const transition = new ScrollMagic.Scene({
	triggerElement: ".covid-shock",
	triggerHook: "onCenter"
})
.setPin("horizontal")
.setTween(toScene5)
.addTo(controller)

// parallax 3
var sympPrlx = document.getElementById('symptoms');
var prlx3 = new Parallax(sympPrlx);

// transition
var toScene6 = new TimelineMax();


toScene6.to("#shock", 5, {y:500});

const boyFade2 = new ScrollMagic.Scene({
	triggerElement: "#t4",
	triggerHook: "onEnter",
	duration: "100%"
})
.setPin("#covid-shock")
.setTween(toScene6)
.addTo(controller)

// scene 6
var preTtl = new ScrollMagic.Scene({
	triggerElement: ".scene6", 
	duration: 1400,
	triggerHook: '0'

})
.setPin(".scene6") 
.addTo(controller);

var preImg = new TimelineMax();


preImg.to("#prevention1", 2, {y: 1000,opacity:0},"+=2");
preImg.to("#prevention2", 2, {y: 1000,opacity:0},"+=2");
preImg.to("#prevention3", 2, {y: 1000,opacity:0},"+=2");

const preImgScene = new ScrollMagic.Scene({
	triggerElement: ".scene6",
	triggerHook: "onLeave",
	duration: "200%"
})
.setPin("scene6")
.setTween(preImg)
.addTo(controller)

