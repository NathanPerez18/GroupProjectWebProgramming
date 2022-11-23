var tcolor=0; ///0,1,2
var Top=0; //table top type
var bottom=0; // table bottom (legs) type
var bcolor=0;

let tableTPic = ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg",
    "testTable2.jpg", "testChair1.jpg", "testChair2.jpg",
    "testChair1.jpg", "testChair2.jpg", "testTable1.jpg"];
//mat 0 1 2  col 0 3 6  mat+col=index
// 0  0 1 2
// 3  3 4 5
// 6  6 7 8

let tableBPic = ["testTable1.jpg", "testTable2.jpg", "testChair1.jpg", 
    "testTable2.jpg", "testChair1.jpg", "testChair2.jpg",
    "testChair1.jpg", "testChair2.jpg", "testTable1.jpg"];

// materialImages[0][0]="testTable1.jpg";
// materialImages[0][1]="testTable2.jpg";
// materialImages[0][2]="testChair1.jpg";


function topType(val){
    Top=parseInt(val);
 
    //onclick "wood" image should change to wood + var color
    // callimage
    callImage("tableT");

}
function topColor(color1){
    tcolor=parseInt(document.getElementById(color1).value);
    tcolor=tcolor*3;// variable should be 0 3 or 6

    //onclick change var color and summons a new image
    // callimage
    callImage("tableT");
}


function tLegType(value2){
    bottom = parseInt(value2);

    callImage("tableB");
}

function tLegColor(color2){
    bcolor=parseInt(document.getElementById(color2).value);
    bcolor=bcolor*3;

    callImage("tableB");
}


function callImage(whichImage){
    //call image with arr[color][material]
    
    if(whichImage=="tableT"){

        let pic1 = Top + tcolor;

        document.getElementById(whichImage).src = tableTPic[pic1];

    }
    if(whichImage=="tableB"){

        let pic2 = bottom + bcolor;

        document.getElementById(whichImage).src = tableBPic[pic2];
       
    }

}

function resetClick(name) {
    // document.getElementById("designBox").src = name;
    document.getElementById(name).reset();
    tcolor=0;
    Top=0;
    bottom=0;
    bcolor=0;
    callImage("tableT");
    callImage("tableB");
 }


// function saveChair(){
//     var chairSave = new Array=[material, mcolor, legs, lcolor];
//     var nameOfSave = "name";
// }

// images names 00 01 02 10 11 12 