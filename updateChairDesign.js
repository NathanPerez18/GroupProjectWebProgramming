var mcolor=0; ///0,1,2
var material=0;
var legs=0;
var lcolor=0;

let matPic = ["B_PlasticChair.png", "B_FabricChair.png", "B_MetalChair.png",
    "G_PlasticChair.png", "G_FabricChair.png", "G_MetalChair.png",
    "P_PlasticChair.png", "P_FabricChair.png", "P_MetalChair.png"];
//mat 0 1 2  col 0 3 6  mat+col=index
// 0  0 1 2
// 3  3 4 5
// 6  6 7 8

let legPic = ["B_ShortChairLegs.png", "B_longChairLegs.png", "B_OneLeg.png", 
    "G_ShortChairLegs.png", "G_longChairLegs.png", "G_OneLeg.png",
    "P_ShortChairLegs.png", "P_longChairLegs.png", "P_OneLeg.png"];

// materialImages[0][0]="testTable1.jpg";
// materialImages[0][1]="testTable2.jpg";
// materialImages[0][2]="testChair1.jpg";


function materialType(value1){
    material=parseInt(value1);
 
    //onclick "wood" image should change to wood + var color
    // callimage
    callImage("chairM");

}
function materialColor(color1){
    mcolor=parseInt(document.getElementById(color1).value);
    mcolor=mcolor*3;// variable should be 0 3 or 6

    //onclick change var color and summons a new image
    // callimage
    callImage("chairM");
}


function legType(value2){
    legs = parseInt(value2);

    callImage("chairL");
}

function legColor(color2){
    lcolor=parseInt(document.getElementById(color2).value);
    lcolor=lcolor*3;

    callImage("chairL");
}


function callImage(whichImage){
    //call image with arr[color][material]
    
    if(whichImage=="chairM"){

        let pic1 = material + mcolor;

        document.getElementById(whichImage).src = matPic[pic1];

    }
    if(whichImage=="chairL"){

        let pic2 = legs + lcolor;

        document.getElementById(whichImage).src = legPic[pic2];
       
    }

}

function resetClick(name) {
    // document.getElementById("designBox").src = name;
    document.getElementById(name).reset();
    mcolor=0;
    material=0;
    legs=0;
    lcolor=0;
    callImage("chairM");
    callImage("chairL");
 }


 function saveClick(){
    let name= prompt("Name your design: ");
     document.cookie = "saveCookie=" + name;
     console.log(document.cookie);
}
// function saveChair(){
//     var chairSave = new Array=[material, mcolor, legs, lcolor];
//     var nameOfSave = "name";
// }

// images names 00 01 02 10 11 12 