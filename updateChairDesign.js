var mcolor=0; ///0,1,2
var material=0;
//var materialImages = new Array[[0,0]];
let materialImages = [
    ["testTable1.jpg", "testTable2.jpg", "testChair.jpg"]
];

// materialImages[0][0]="testTable1.jpg";
// materialImages[0][1]="testTable2.jpg";
// materialImages[0][2]="testChair1.jpg";

function materialType(type){
    material=parseInt(document.getElementById(type).value);

    //onclick "wood" image should change to wood + var color
    // callimage
    callImage();

}
function materialColor(color1){
    mcolor=parseInt(document.getElementById(color1).value);

    //onclick change var color and summons a new image
    // callimage
}

function callImage(){
    //call image with arr[color][material]
    document.getElementById("").src= materialImages[material][color];
}

// images names 00 01 02 10 11 12 