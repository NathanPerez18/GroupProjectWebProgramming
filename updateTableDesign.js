var tcolor=0; ///0,1,2
var Top=0; //table top type
var bottom=0; // table bottom (legs) type
var bcolor = 0;

let clicked = false;

let tableTPic = ["B_SquareTable.png", "B_CircleTable.png", "B_SlatedTable.png",
    "G_SquareTable.png", "G_CircleTable.png", "G_SlatedTable.png",
    "P_SquareTable.png", "P_CircleTable.png", "P_SlatedTable.png"];
//mat 0 1 2  col 0 3 6  mat+col=index
// 0  0 1 2
// 3  3 4 5
// 6  6 7 8

let tableBPic = ["B_OneLeg.png", "B_OneColunm4Leg.png", "B_Wheels.png", 
    "G_OneLeg.png", "G_OneColunm4Leg.png", "G_Wheels.png",
    "P_OneLeg.png", "P_OneColunm4Leg.png", "P_Wheels.png"];

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

function saveClick() {
    let name = prompt("Name your design: ");
    let cleanName = name.replaceAll(" ", "");
    if (name != null) {
        document.cookie = "saveCookie=" + cleanName + "; SameSite=None; Secure";
    }
}


function updateDropdown() {

    if (!clicked) {
        clicked = true;

        for (let i = 0; i < document.cookie.split("; ").length; i++) {
            var cookieValue = document.cookie.split("; ");

            var name = cookieValue[i].split("=");
            if (name[0].includes("tableCookie")) {

                var option = document.createElement('option');
                option.text = option.value = name[1];
                document.getElementById("saveDropdown").appendChild(option);

            }
        }
    }
}
function updateDisplay() {

    var options = new Array();
    for (let i = 0; i < document.cookie.split("; ").length; i++) {
        var cookieValue = document.cookie.split("; ");
        var name = cookieValue[i].split("=");
        if (name[0].includes("formContentTable")) {

            options.push(name[1]);  

        }

    }
    var topPic = Number(options[0]) + Number(options[1]*3);
    var botPic = Number(options[2]) + Number(options[3]*3);

    document.getElementById('tableT').src = tableTPic[topPic];
    document.getElementById('tableB').src = tableBPic[botPic];

    document.getElementById('topShape').selectedIndex = Number(options[0]);

    switch (Number(options[1])){
        case 0:
            document.getElementById('twhite').checked = true;
            break;
        case 1:
            document.getElementById('tgrey').checked = true;
            break;
        case 2:
            document.getElementById('tblack').checked = true;
            break;
    }

    document.getElementById('legShape').selectedIndex = Number(options[2]);

    switch (Number(options[3])) {
        case 0:
            document.getElementById('bwhite').checked = true;
            break;
        case 1:
            document.getElementById('bgrey').checked = true;
            break;
        case 2:
            document.getElementById('bblack').checked = true;
            break;
    }
}