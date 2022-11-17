var mcolor=0; ///0,1,2
var material=0;
var legs=0;
var lcolor=0;
//var materialImages = new Array[[0,0]];
let materialImages = [
    ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg"],//plastic
    ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg"],
    ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg"]
];
let legImages = [
    ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg"],
    ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg"],
    ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg"]
];

// materialImages[0][0]="testTable1.jpg";
// materialImages[0][1]="testTable2.jpg";
// materialImages[0][2]="testChair1.jpg";


function materialType(type){
    //material=parseInt(type);
    material=parseInt(document.getElementById(type).value);

    //onclick "wood" image should change to wood + var color
    // callimage
    callImage("chairM");

}
function materialColor(color1){
    mcolor=parseInt(document.getElementById(color1).value);

    //onclick change var color and summons a new image
    // callimage
    callImage("chairM");
}


function legType(leg){
    legs = parseInt(document.getElementById(leg).value);

    callImage("chairL");
}

function legColor(color2){
    lcolor=parseInt(document.getElementById(color2).value);

    callImage("chairL");
}


function callImage(whichImage){
    //call image with arr[color][material]
    
    if(whichImage=="chairM"){
        document.getElementById(whichImage).src= materialImages[material][mcolor];
        console.log(material);
        console.log(materialImages[0][0]);
        console.log(materialImages[0][1]);
        console.log(materialImages[0][2]);
        console.log(materialImages[1][0]);
        console.log(materialImages[1][1]);
        console.log(materialImages[1][2]);
        console.log(materialImages[2][0]);
        console.log(materialImages[2][1]);
        console.log(materialImages[2][2]);
    }
    if(whichImage=="chairL"){
        document.getElementById(whichImage).src= legImages[legs][lcolor];
    }

}

// function saveChair(){
//     var chairSave = new Array=[material, mcolor, legs, lcolor];
//     var nameOfSave = "name";
// }

// images names 00 01 02 10 11 12 